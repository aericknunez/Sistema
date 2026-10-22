# Hallazgos de bugs — sistema (Laravel 8 / Livewire 2 / PHP 8.3)

- **Fecha de auditoría:** 2026-10-21
- **Alcance:** rutas, middleware, controladores, `app/System`, componentes Livewire principales. Lectura de código + `php -l` (sin errores de sintaxis) + PHPUnit.
- **Nota:** los hallazgos se basan en lectura de código; solo se verificaron ejecutando el `DivisionByZeroError` de PHP 8 y el estado de las pruebas.

## Leyenda

| Estado | Significado |
|---|---|
| ✅ | Solucionado / inhabilitado |
| 🟨 | Parcial (parte resuelta, ver detalle) |
| ⬜ | Pendiente |

## Resumen de avance

| Sección | Total | ✅ | ⬜ |
|---|---|---|---|
| 1. Seguridad crítica | 13 | 2 | 11 |
| 2. Dinero / datos fiscales | 15 | 0 | 15 |
| 3. Errores 500 | 4 | 4 | 0 |
| 4. Lógica media | 16 | 1 | 15 |
| 5. Deuda técnica | 7 | 0 | 7 |

---

## 🔴 1. Seguridad crítica

| # | Estado | Dónde | Problema |
|---|---|---|---|
| S1 | ✅ | `routes/api.php` → `SyncController::processSync` | Endpoint sin autenticación que hace `DELETE`/`INSERT` en tablas arbitrarias con `FOREIGN_KEY_CHECKS=0`. Permite borrar tablas o insertar un usuario Root. |
| S2 | ⬜ | `app/System/Config/CreaIconosMenuPrincipal.php:30` (y similares) | Nombres de producto concatenados sin escapar dentro de archivos Blade que se compilan → RCE (`@php ... @endphp`, `{{ }}`) y XSS. |
| S3 | ⬜ | Todas las rutas de `routes/rutas/*.php` | Sin autorización por rol; `isAdmin()` solo oculta el menú. Cualquier usuario accede por URL o llamando acciones Livewire. |
| S4 | ⬜ | `app/Http/Livewire/Config/UsuariosEditar.php:47` `changeUser` / `addUser` | `userId` y `tipo` vienen del cliente sin validar → cualquiera se asciende o crea usuarios Root. |
| S5 | ⬜ | `routes/rutas/config.php:39` `Route::resource('roles')` | Sin middleware: crear/eliminar roles con cualquier permiso. `index` truena sin usuario. |
| S6 | ⬜ | `config/fortify.php` | Registro público (`/register`) y "accountDeletion" activos. |
| S7 | ✅ | `routes/web.php`: `/set-td/{td}`, `/set-latam`, `/optimize` | Rutas `guest` que reescriben `td` en todas las tablas, reinician licencia, cambian branding, ejecutan `optimize:clear`. |
| S8 | ⬜ | `routes/web.php` `/status` + `.env` | Expone `env`/`debug`/URL públicamente; `APP_DEBUG=true` muestra stack traces. |
| S9 | ⬜ | `routes/rutas/product.php:83` `reporte-pdf/...` | Reporte fiscal mensual descargable sin login. |
| S10 | ⬜ | `routes/api.php` `/impresiones` (GET/POST) | Sin autenticación: leer/vaciar la cola de impresión o inyectar trabajos. |
| S11 | ⬜ | `app/Http/Livewire/Config/Opciones.php:173` | `exec()` de `.bat` y `Artisan::call('migrate')` desde la web, accesible por cualquier usuario (ver S3). |
| S12 | ⬜ | `Helpers::CodigoValidacionHora` / `Encrypt` | Código de autorización = `sha1("d-m-Y-H")`, calculable por cualquiera. Licencia con IV fijo y `FlashCode` de 5 caracteres. |
| S13 | ⬜ | `app/Services/Push.php` | La sincronización envía tablas tipo 2 (incluida `users` con hashes) al endpoint de S1. |

### Registro de soluciones

| # | Rama | Commit | Qué se hizo |
|---|---|---|---|
| S1 | `fix/seguridad` | `82f4ac1` | Ruta `POST /api/process-sync` comentada (no borrada). `SyncController` se conserva. Para reactivarla primero hay que protegerla (token + lista blanca de tablas). |
| S7 | `fix/seguridad` | `82f4ac1` | Rutas `/set-td`, `/set-latam`, `/optimize` comentadas (no borradas). Controladores se conservan. |

> Si producción usa `php artisan route:cache`, hay que regenerar el caché al desplegar.

### Registro de soluciones — crashes y lógica

| # | Rama | Commit | Qué se hizo |
|---|---|---|---|
| E4 | `fix/crashes` | `c299d24` | `agregarOrden()` usa `session('clientes') ?: 1`; la orden se crea aunque la sesión no traiga clientes. |
| E2 (1/2) | `fix/crashes` | `c299d24` | Nuevo `limpiarOrdenInactiva()` (Ventas): quita de la sesión órdenes inexistentes o con `edo != 1`. `AddProducto::mount` regresa a mesas/delivery, `Comandero/Venta::mount` a mesas del comandero, `Cambios::mount` a mesas. `detallesMesa()` tolera orden inexistente. `inicioCorte()` devuelve `NULL` sin caja abierta y `sinCajaAbierta()` bloquea `btnGasto`/`btnRemesa`/`btnEntrada` con mensaje. |
| E2 (2/2) | `fix/crashes` | `d7d3e1d` | Venta/Comandero: producto eliminado con icono en caché (aviso "El producto ya no esta disponible"), producto ya borrado, tipo de pago inexistente (también en `Cambios`), agregar cliente sin orden. `Ventas`: `agregarProducto`, `getDeliveryData`, `clientSessionFactura` toleran producto/cliente eliminado. `Imprimir`: cliente o pago no encontrado se imprime con campos vacíos. Mesas/Comandero/Delivery: orden cobrada o sin datos de delivery. Corte: usuario sin cortes propios ("sin registros"), corte sin caja (alerta `sincaja`), cajero eliminado. Inventario: producto/insumo eliminado no bloquea ni rompe. Login: sin moneda de efectivo activa toma otra activa. `Rango` salta huecos; `IsPantallaSelect` → 401; `NombreUsuario` nulo; 8 `find()->delete()` → `destroy()` + `FacturasUltimas`. Listeners de aviso agregados en `corte/index` y `comandero/cambios`. |
| L1 | `fix/crashes` | `c299d24` | `session(['llevar_aqui' => $x])` en `Cambios` y `Comandero/Venta`. |
| E1 | `fix/crashes` | `39c23f5` | `Porcentaje()` sin ventas devuelve `"0/0"`; `propinaPorcentaje`, `PorcentajeDescuento`, `calculaDescuentoCantidad` devuelven 0 con divisor 0; relación de inventario `numeric\|gt:0`. `pagar()` (venta/cambios), `btnPropina` (venta/comandero/cambios) y `btnCambiarCantidad` (entero) avisan con `mensaje` si el monto no es válido (vacío en `pagar` sigue cobrando el total). Regla `numeric` en gastos, remesas, movimientos, corte, cuentas por pagar, abonos, otras ventas e inventario sumar/restar (este último también tolera insumo eliminado). |
| E3 | `fix/crashes` | `39c23f5` | `Siapertura`: `redirect()->route('venta.rapida')`. |

> Verificado con tinker contra BD local (solo lecturas): 12 casos de registros inexistentes sin error; vistas editadas compilan. Pendiente probar en navegador: primer producto en venta rápida, abrir mesa ya cobrada por otra caja, entrar a Gastos sin caja, tocar producto eliminado, corte con doble clic.

---

## 🔴 2. Dinero y datos fiscales

| # | Estado | Dónde | Problema |
|---|---|---|---|
| D1 | ⬜ | `app/System/Ventas/Ventas.php:633` `copiarDatosTablaProductos(1)` | Copia a `ticket_productos_saves` filtrando solo por `num_fact` sin `tipo_venta`; ticket #5 y factura #5 se mezclan → productos duplicados, reportes inflados. |
| D2 | ⬜ | `app/System/Corte/Corte.php:240-241` `diferencia()` | `;` sobrante: `- $this->abonos(...)` es una sentencia muerta, los abonos a proveedores no se restan. |
| D3 | ⬜ | `app/System/Corte/Corte.php:115,150,159` | `where('tipo_pago', [1, 7])` usa solo el primer valor → tipo de pago 7 fuera del efectivo; su propina cuenta como no efectivo. |
| D4 | ⬜ | `app/System/Corte/Corte.php:62` | El corte de un cajero borra `TicketProducto` pagados de todos los cajeros. |
| D5 | ⬜ | `pagar()` en `AddProducto`, `Cambios`, `Comandero/Venta` | Número de factura `MAX+1` sin transacción, bloqueo ni índice único → duplicados con cajas concurrentes. |
| D6 | ⬜ | `pagar()` + `app/System/Imprimir/Imprimir.php:64` | Sin transacción; si falla la impresora/Pusher (sin try/catch) la venta queda a medias y el siguiente cobro duplica factura. |
| D7 | ⬜ | `app/Http/Livewire/Facturacion/FacturasUltimas.php:55` `destroy` | Borra físicamente el documento fiscal; no revierte inventario ni cuenta por cobrar; nunca genera `edo=2` que esperan los reportes. |
| D8 | ⬜ | `app/System/Facturacion/Facturacion.php` | Conteo por `TicketNum.created_at` (pago) pero montos por `saves.created_at` (cuando se agregó el producto) → descuadre entre días. |
| D9 | ⬜ | `app/Http/Livewire/Cuentas/PorCobrar.php:131,185` | Llama métodos de `EfectivoCuentas` sin usar el trait → error fatal al abonar con banco. Signo invertido (debería sumar). |
| D10 | ⬜ | `app/Http/Livewire/Efectivo/Gastos.php:46` `updated()` | Resetea `idbanco = 1` en cada cambio → el gasto siempre se carga a la cuenta 1. |
| D11 | ⬜ | Gastos / Remesas / abonos (`destroy`, `delAbono`) | No validan si ya estaba eliminado → doble acreditación. Saldos con leer-modificar-escribir sin bloqueo. |
| D12 | ⬜ | `app/Http/Livewire/Corte/Index.php:118` `deleteCorte` | `apertura_caja = numero_caja` (caja 2 → modo "solo órdenes"); reapertura a nombre del usuario actual. |
| D13 | ⬜ | `app/Http/Livewire/Config/Configuracion.php:342` `storePrincipal` | Borra y recrea cajas con `edo=0` al guardar config, liberando cajas con corte abierto. |
| D14 | ⬜ | Corte y efectivo en general | Rangos por `tiempo`, que se reescribe en cada edición y es `VARCHAR` → registros migran de corte. |
| D15 | ⬜ | Sincronización (`SyncData`, `Push.php`) | `saveDelete()` nunca se llama (borrados no se sincronizan); `env('URL_SYNC')` es null con config cacheada; `lastUpdate()` truena en la primera ejecución. |

---

## 🟠 3. Errores 500 en flujos normales

| # | Estado | Dónde | Problema |
|---|---|---|---|
| E1 | ✅ | `app/System/Ventas/Ventas.php:541` `Porcentaje()` y otras divisiones | PHP 8: `@` no evita `DivisionByZeroError` (verificado). Pantalla de venta truena para td 10/11 sin ventas del día. También `propinaPorcentaje`, `Inventario/Productos.php:78` (`1 / relacion`), `PorcentajeDescuento`. Efectivo `"10,50"` → excepción. **Nota:** las cajas son `type="number"`, así que la coma casi no llega; el crash real era el campo **vacío** en propina y cantidad de producto. |
| E2 | 🟨 | Varios | **Resuelto:** `getAqui()`/`mount`/`detallesMesa()` con orden borrada; `Gastos`/`Remesas`/`Ingreso` → `inicioCorte()` sin caja. **Pendiente:** el resto de esta lista. Accesos a null: ~~`getAqui()`/`mount`/`detallesMesa()` con orden borrada~~; `agregarProducto`, `RestriccionInventario`, `ContarProductoVendido` con producto eliminado; `Corte/Index.php:89`; ~~`Gastos`/`Remesas` → `inicioCorte()` sin caja~~; `Rango.php:41` con hueco; `Mesas`/`Delivery::ordenSelect`; `btnTipoPago`; `btnAddClient` sin orden; `IniciarController` sin moneda activa; `NombreUsuario`/`getDatosCorte` con usuario borrado; `IsPantallaSelect`; `find($id)->delete()` en Livewire. |
| E3 | ✅ | `app/Http/Middleware/Siapertura.php:20` | `redirect('venta.rapida')` usa nombre de ruta como URL → 404. |
| E4 | ✅ | `AddProducto.php:505` `asignarOrden()` → `Ventas.php:21` `agregarOrden()` | **Confirmado en log (2026-10-21 19:55, 4 veces):** `Column 'clientes' cannot be null` al agregar el primer producto. `agregarOrden()` lee `session('clientes')` *antes* de que `asignarOrden()` la inicialice; si la sesión no la trae (p. ej. `mount` con tipo de servicio 2), la orden no se crea y el producto no se agrega. |

---

## 🟡 4. Lógica media

| # | Estado | Dónde | Problema |
|---|---|---|---|
| L1 | ✅ | `Cambios.php:179`, `Comandero/Venta.php:318` `getAqui()` | `session(['llevar_aqui', $x])` sintaxis incorrecta; nunca guarda. |
| L2 | ⬜ | `AddProducto` / `Comandero/Venta` | `validado` y `motivo_borrado` nunca se reinician; `delProductoDetalle` y `btnCambiarCantidad` (reducir) saltan código y registro. |
| L3 | ⬜ | `Ventas.php:207` `eliminarProducto` | Decide borrado físico según cualquier producto de la orden, no el seleccionado. |
| L4 | ⬜ | `verificaCantidad` | Al eliminar con registro el último producto, `eliminarOrden()` borra la orden y se pierde la auditoría. |
| L5 | ⬜ | `Comandero/Venta.php` `BtnVentaEspecial` | Activa precios $0 sin pedir código. |
| L6 | ⬜ | `Facturacion/Rango.php` | Deja `impresion_seleccionado` cambiado en sesión. |
| L7 | ⬜ | `Ventas.php:592` `numeroLineasFactura` | Condición siempre verdadera; usa `lineas_ccf` en vez de `principal_lineas_ccf`. |
| L8 | ⬜ | `Cambios::verificaCantidad` | Cuenta productos eliminados (`edo=2`); la mesa puede no cerrarse. |
| L9 | ⬜ | `Cambios::pagar` | Cliente sin productos genera factura en $0 que consume número. |
| L10 | ⬜ | Búsqueda de clientes (`AddProducto`, `Cambios`, `Delivery`) | `orWhere` rompe filtro `nombre != NULL`; `AddProducto` sin `limit(10)`. |
| L11 | ⬜ | `Ventas::aumentarCantidadCod` | No respeta restricción de inventario ni modal de opciones. |
| L12 | ⬜ | Inventario | No se repone al borrar/anular factura; restricción solo cuenta mismo código, no insumo compartido. |
| L13 | ⬜ | `IniciarController` | `cajaselected` acepta cualquier caja; `aperturar` no valida efectivo inicial. |
| L14 | ⬜ | Usuarios tipo 99 | Usuarios deshabilitados mantienen la sesión activa. |
| L15 | ⬜ | `Ventas::getDescuento`, `Helpers::Descuento` | Descuento sin implementar; `Helpers::Descuento` usa `$_SESSION`. |
| L16 | ⬜ | `Historial/Resumen.php` | Códigos de producto ("pollos") hardcodeados de un cliente. |

---

## 🔵 5. Deuda técnica

| # | Estado | Dónde | Problema |
|---|---|---|---|
| T1 | ⬜ | Pruebas | 32 pruebas: 30 errores, 1 fallo. Migraciones con SQL crudo MySQL (`unsigned`) no corren en SQLite. |
| T2 | ⬜ | `config/database.php` | `strict => false` para permitir `GROUP BY` inválidos (`Historial::ventasUnica`). |
| T3 | ⬜ | `Comandero/Venta.php` | Copia de `AddProducto.php`; cada bug existe 2-3 veces. |
| T4 | ⬜ | `SyncController`, `Push.php` | `ini_set('memory_limit', 9999999999)` a nivel de archivo. |
| T5 | ⬜ | Base de datos | Sin índices ni únicos en `ticket_nums(factura, tipo_venta)` ni en `tiempo`. |
| T6 | ⬜ | `.env` / PHP 8.2 | FTP en texto plano, `APP_DEBUG=true`; propiedades dinámicas en Livewire (solo deprecations). La vista `venta/add-producto.blade.php:47` llama `App\System\Ventas\Ventas::Porcentaje()` estático sobre un trait (deprecated desde PHP 8.1, solo log). |
| T7 | ⬜ | `storage/logs/laravel.log` | Archivo único de 631 MB sin rotación (`LOG_CHANNEL=stack` → `single`). Usar canal `daily`. |

---

## Prioridad sugerida

1. Seguridad explotable sin conocimiento interno: ~~S1~~, S2, S3, S4, ~~S7~~.
2. Integridad del dinero: D1, D2, D3, D5, D6, D9, D10.
3. Crashes PHP 8 y nulls en flujos de venta ~~(E1, E2, E3, E4)~~ ✅ sección completa.
4. Hacer que las pruebas corran (T1) antes de refactorizar.
5. Lógica media y deuda técnica.
