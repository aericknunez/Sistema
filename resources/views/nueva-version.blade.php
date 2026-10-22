@php
    $mensajeWa = rawurlencode('Hola, quiero cambiarme a la nueva versión de mi sistema.');
    $whatsapp = 'https://wa.me/50374880240?text=' . $mensajeWa;
    $whatsappAlterno = 'https://wa.me/50366917170?text=' . $mensajeWa;

    $funciones = [
        ['Punto de venta de restaurante', 'Venta rápida, servicio a mesa y delivery. Menú por categorías con imágenes, platillos con modificadores, pre-cuenta, varios comensales por mesa y división de cuenta.', 'M3 3h18v4H3zM5 7v14h14V7M9 11h6'],
        ['Mapa de mesas', 'Mesas por zona con estado disponible u ocupada y tiempo transcurrido. Nombre y cliente por mesa, guardar y volver con la cuenta abierta.', 'M4 6h16M6 6v12M18 6v12M9 18h6'],
        ['Cocina en tiempo real', 'Comandas separadas por estación (cocina, bar, preparación), pantalla de cocina y de despacho que se actualizan al instante, y app para Android TV.', 'M12 2v4M4 10h16v10H4zM8 14h8'],
        ['Delivery con repartidor propio', 'Busca o registra al cliente en segundos, asigna repartidor y sigue cada pedido: pendiente, preparando, en camino y entregado.', 'M3 7h11v10H3zM14 10h4l3 3v4h-7M7 17a2 2 0 1 0 0 .1M17 17a2 2 0 1 0 0 .1'],
        ['Menú, recetas e inventario', 'Cada platillo descuenta sus insumos al venderse. Ingresos con costo promedio, mermas, kardex, conteo físico con la cámara y alertas de existencias bajas o vencimientos.', 'M4 4h16v16H4zM4 9h16M9 9v11'],
        ['Caja y efectivo', 'Varias cajas a la vez con su responsable, cortes por forma de pago con diferencias, gastos con foto del comprobante, remesas, cuentas bancarias y flujo de efectivo.', 'M2 7h20v12H2zM2 11h20M6 15h4'],
        ['Cuentas por cobrar y por pagar', 'Crédito a clientes con abonos y estado de cuenta, cuentas con proveedores y notas de crédito y débito que rebajan saldos automáticamente.', 'M4 4h12l4 4v12H4zM8 12h8M8 16h5'],
        ['Directorio de contactos', 'Clientes, proveedores, empleados y repartidores en una sola ficha con datos fiscales, cumpleaños e importación masiva.', 'M16 11a4 4 0 1 0-8 0 4 4 0 0 0 8 0zM4 21c1-4 4-6 8-6s7 2 8 6'],
        ['Panel, reportes e historiales', 'Panel en tiempo real con ventas por hora, semana contra semana, métodos de pago y platillos más vendidos. Historiales y reportes exportables a Excel y PDF.', 'M4 20V10M10 20V4M16 20v-7M22 20H2'],
        ['Anexos fiscales para el contador', 'Anexos de IVA mensuales, libro de compras desde los JSON de proveedores, descarga masiva de DTE en ZIP y rol Contador con acceso solo a lo fiscal.', 'M6 2h9l5 5v15H6zM9 13h6M9 17h6'],
        ['Multisucursal', 'Vincula sucursales, cámbiate entre ellas sin cerrar sesión y traslada insumos con solicitud, aceptación y PDF.', 'M3 21V9l6-4 6 4v12M15 21V13h6v8M7 13h4'],
        ['Apps y equipos', 'Funciona en el navegador de cualquier dispositivo, con app nativa para Android, app de cocina para Android TV y el Facturador para imprimir comandas y tickets en impresoras térmicas.', 'M7 2h10v20H7zM11 18h2'],
    ];
@endphp
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Actualización de tu sistema</title>
    <meta name="description" content="Actualiza gratis tu sistema: más rápida, más segura, más fácil de usar y con facturación electrónica.">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <style>
        :root {
            --noche: #160a1c; --noche-2: #241030; --ciruela: #3a1747; --ink: #1d1720; --texto: #5e5260; --suave: #8a7d88;
            --linea: #eee4dc; --fondo: #fbf6f1; --crema: #fffaf5; --brasa: #f2542d; --brasa-2: #d93a16; --coral: #ff8a5c;
            --oro: #ffb547; --menta: #2ec4a0; --radio: 18px;
            --sombra: 0 24px 60px -24px rgba(58, 23, 71, .28);
            --salida: cubic-bezier(.16, 1, .3, 1);
        }
        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { margin: 0; font-family: "Segoe UI", -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", Arial, sans-serif;
            color: var(--ink); background: var(--crema); line-height: 1.6; -webkit-font-smoothing: antialiased; }
        ::selection { background: var(--oro); color: var(--noche); }
        :focus-visible { outline: 3px solid var(--oro); outline-offset: 3px; border-radius: 6px; }
        a { color: inherit; text-underline-offset: .2em; }
        .contenedor { max-width: 1160px; margin: 0 auto; padding: 0 20px; }
        h1, h2, h3 { line-height: 1.12; margin: 0; letter-spacing: -.025em; text-wrap: balance; }
        p { margin: 0; }

        .boton { display: inline-flex; align-items: center; justify-content: center; gap: 10px; font-weight: 700; font-size: 16px;
            padding: 16px 28px; border-radius: 999px; text-decoration: none; transition: transform .3s var(--salida), box-shadow .3s var(--salida), background .2s; }
        .boton:hover { transform: translateY(-2px); }
        .boton:active { transform: translateY(1px); }
        .boton-wa { background: linear-gradient(135deg, var(--coral), var(--brasa) 55%, var(--brasa-2)); color: #fff; box-shadow: 0 14px 30px -10px rgba(242, 84, 45, .7); }
        .boton-wa:hover { box-shadow: 0 20px 40px -12px rgba(242, 84, 45, .85); }
        .boton-borde { color: #fff; border: 1.5px solid rgba(255, 255, 255, .28); }
        .boton-borde:hover { background: rgba(255, 255, 255, .08); border-color: rgba(255, 255, 255, .5); }
        .boton svg { width: 20px; height: 20px; flex: none; }

        /* Hero */
        .hero { position: relative; color: #fff; padding: 28px 0 120px; overflow: hidden;
            background: radial-gradient(900px 520px at 88% 0%, rgba(242, 84, 45, .38), transparent 62%),
                radial-gradient(700px 420px at 0% 100%, rgba(255, 181, 71, .16), transparent 60%),
                linear-gradient(160deg, var(--noche) 0%, var(--noche-2) 55%, var(--ciruela) 100%); }
        .hero::before { content: ""; position: absolute; inset: 0; pointer-events: none; opacity: .5;
            background-image: radial-gradient(rgba(255, 255, 255, .09) 1px, transparent 1px); background-size: 26px 26px;
            mask-image: linear-gradient(180deg, #000 0%, transparent 85%); -webkit-mask-image: linear-gradient(180deg, #000 0%, transparent 85%); }
        .hero .contenedor { position: relative; }
        .barra { display: flex; align-items: center; justify-content: space-between; gap: 16px; margin-bottom: 64px; }
        .barra .marca { font-weight: 700; font-size: 16px; letter-spacing: .02em; display: inline-flex; align-items: center; gap: 10px; }
        .barra .marca::before { content: ""; width: 10px; height: 10px; border-radius: 3px; background: linear-gradient(135deg, var(--oro), var(--brasa)); transform: rotate(45deg); }
        .barra a.mini { font-size: 14px; font-weight: 600; color: #f3e6ee; text-decoration: none; padding: 8px 14px; border-radius: 999px; border: 1px solid rgba(255, 255, 255, .18); }
        .barra a.mini:hover { background: rgba(255, 255, 255, .08); }
        .hero-grid { display: grid; grid-template-columns: minmax(0, 1.15fr) minmax(0, .85fr); gap: 56px; align-items: center; }
        .insignia { display: inline-flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 700; color: var(--oro);
            background: rgba(255, 181, 71, .1); border: 1px solid rgba(255, 181, 71, .32); padding: 7px 14px; border-radius: 999px; margin-bottom: 26px; }
        .hero h1 { font-size: clamp(36px, 5.4vw, 64px); font-weight: 800; max-width: 760px; }
        .hero h1 span { color: var(--oro); }
        .hero .bajada { font-size: clamp(17px, 1.7vw, 19px); color: #e4d3de; max-width: 620px; margin: 24px 0 36px; }
        .acciones { display: flex; flex-wrap: wrap; gap: 14px; }
        .contacto { margin-top: 20px; color: #c9b5c3; font-size: 15px; }
        .contacto a { color: var(--oro); font-weight: 700; white-space: nowrap; }
        .aviso a { color: var(--brasa-2); font-weight: 600; }

        /* Ilustracion del hero: un ticket que recibe el sello */
        .escena { position: relative; height: 440px; }
        .ticket { position: absolute; left: 50%; top: 24px; width: 260px; transform: translateX(-50%) rotate(-3deg); background: #fffaf5; color: var(--ink);
            border-radius: 6px 6px 0 0; padding: 26px 24px 30px; box-shadow: 0 40px 80px -30px rgba(0, 0, 0, .65); animation: flotar 7s ease-in-out infinite; }
        .ticket::after { content: ""; position: absolute; left: 0; right: 0; bottom: -12px; height: 12px;
            background: linear-gradient(-45deg, transparent 6px, #fffaf5 0) 0 0 / 12px 12px, linear-gradient(45deg, transparent 6px, #fffaf5 0) 0 0 / 12px 12px; }
        .ticket .t-lin { height: 9px; border-radius: 5px; background: #e9dcd2; margin-bottom: 12px; }
        .ticket .t-lin.oscura { background: var(--ink); width: 55%; height: 12px; margin-bottom: 20px; }
        .ticket .t-lin.corta { width: 70%; } .ticket .t-lin.media { width: 85%; }
        .ticket .t-corte { border-top: 2px dashed #e0d0c4; margin: 18px 0; }
        .ticket .t-total { display: flex; justify-content: space-between; align-items: center; }
        .ticket .t-total i { display: block; height: 14px; width: 40%; background: var(--brasa); border-radius: 6px; }
        .ticket .t-total b { display: block; height: 18px; width: 30%; background: var(--ink); border-radius: 6px; }
        .sello { position: absolute; right: -26px; bottom: 34px; width: 108px; height: 108px; border-radius: 50%; border: 4px solid var(--menta); color: var(--menta);
            display: grid; place-items: center; transform: rotate(-14deg); background: rgba(46, 196, 160, .08); animation: sellar 7s var(--salida) infinite; }
        .sello svg { width: 46px; height: 46px; }
        .sello::before { content: ""; position: absolute; inset: 8px; border-radius: 50%; border: 1.5px dashed currentColor; }
        .ficha { position: absolute; display: flex; align-items: center; gap: 10px; padding: 12px 16px; border-radius: 14px; font-size: 14px; font-weight: 600;
            background: rgba(36, 16, 48, .72); border: 1px solid rgba(255, 255, 255, .16); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 20px 40px -20px rgba(0, 0, 0, .7); color: #fff; }
        .ficha i { width: 30px; height: 30px; border-radius: 9px; display: grid; place-items: center; flex: none; }
        .ficha i svg { width: 17px; height: 17px; }
        .ficha.f1 { left: -6px; top: 70px; animation: aparecer-f 7s var(--salida) infinite; }
        .ficha.f1 i { background: rgba(46, 196, 160, .2); color: var(--menta); }
        .ficha.f2 { right: -8px; top: 6px; animation: aparecer-f 7s var(--salida) infinite 1.2s; }
        .ficha.f2 i { background: rgba(255, 181, 71, .2); color: var(--oro); }
        .ficha.f3 { left: 6px; bottom: 34px; animation: aparecer-f 7s var(--salida) infinite 2.4s; }
        .ficha.f3 i { background: rgba(242, 84, 45, .22); color: var(--coral); }
        .escena small { position: absolute; right: 0; bottom: 0; font-size: 11px; letter-spacing: .08em; text-transform: uppercase; color: #a8909f; }
        @keyframes flotar { 0%, 100% { transform: translateX(-50%) rotate(-3deg) translateY(0); } 50% { transform: translateX(-50%) rotate(-2deg) translateY(-10px); } }
        @keyframes sellar { 0%, 30% { opacity: 0; transform: rotate(-30deg) scale(1.8); } 38% { opacity: 1; transform: rotate(-14deg) scale(.94); } 42%, 88% { opacity: 1; transform: rotate(-14deg) scale(1); } 96%, 100% { opacity: 0; transform: rotate(-14deg) scale(1); } }
        @keyframes aparecer-f { 0% { opacity: 0; transform: translateY(14px); } 10%, 82% { opacity: 1; transform: none; } 92%, 100% { opacity: 0; transform: translateY(-6px); } }

        .pilares { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-top: 72px; }
        .pilar { background: linear-gradient(180deg, rgba(255, 255, 255, .07), rgba(255, 255, 255, .02)); border: 1px solid rgba(255, 255, 255, .12); border-radius: var(--radio); padding: 24px;
            transition: transform .4s var(--salida), border-color .3s; }
        .pilar:hover { transform: translateY(-4px); border-color: rgba(255, 181, 71, .45); }
        .pilar b { display: block; font-size: 19px; margin-bottom: 6px; }
        .pilar span { color: #cdb9c6; font-size: 15px; }
        .pilar svg { width: 28px; height: 28px; color: var(--oro); margin-bottom: 14px; }

        /* Aviso de soporte */
        .aviso { margin-top: -56px; position: relative; }
        .aviso .caja { background: #fff; border: 1px solid #f6d3c6; border-radius: var(--radio); padding: 24px 28px; display: flex; gap: 18px; align-items: flex-start;
            box-shadow: var(--sombra); position: relative; overflow: hidden; }
        .aviso .caja::before { content: ""; position: absolute; left: 0; top: 0; bottom: 0; width: 6px; background: linear-gradient(180deg, var(--oro), var(--brasa)); }
        .aviso svg { width: 30px; height: 30px; color: var(--brasa); flex: none; margin-top: 2px; }
        .aviso b { display: block; font-size: 18px; margin-bottom: 4px; }
        .aviso p { color: var(--texto); }

        section.bloque { padding: 104px 0; }
        .encabezado { max-width: 740px; margin-bottom: 52px; }
        .encabezado .pre { font-size: 13px; font-weight: 800; letter-spacing: .1em; text-transform: uppercase; color: var(--brasa); margin-bottom: 12px; }
        .encabezado h2 { font-size: clamp(30px, 3.8vw, 44px); font-weight: 800; }
        .encabezado p { color: var(--texto); font-size: 18px; margin-top: 14px; }

        /* Comparacion */
        .comparacion { border: 1px solid var(--linea); border-radius: var(--radio); overflow: hidden; max-width: 900px; background: #fff; box-shadow: var(--sombra); }
        .fila { display: grid; grid-template-columns: 1.4fr 1fr 1fr; gap: 12px; padding: 15px 24px; border-top: 1px solid var(--linea); align-items: center; }
        .fila:first-child { border-top: 0; }
        .fila:nth-child(even):not(.cabecera) { background: var(--fondo); }
        .fila.cabecera { background: var(--noche-2); color: #fff; font-weight: 700; font-size: 14px; }
        .fila .mal { color: #a8322a; font-weight: 600; }
        .fila .mal::before { content: "✕ "; }
        .fila .bien { color: #13866b; font-weight: 700; }
        .fila .bien::before { content: "✓ "; }
        .fila.cabecera span::before { content: none; }
        .fila.cabecera span:last-child { color: var(--oro); }
        .razones { display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; margin-top: 32px; }
        .razones div { background: #fff; border: 1px solid var(--linea); border-radius: var(--radio); padding: 24px; }
        .razones b { display: block; font-size: 19px; margin-bottom: 6px; color: var(--ciruela); }
        .razones span { color: var(--texto); font-size: 15px; }

        /* Factura electronica */
        .dte { background: var(--fondo); }
        .dte-grid { display: grid; grid-template-columns: 1.1fr .9fr; gap: 48px; align-items: start; }
        .lista { list-style: none; padding: 0; margin: 0; display: grid; gap: 18px; }
        .lista li { display: flex; gap: 14px; }
        .lista li svg { width: 24px; height: 24px; color: #fff; background: var(--menta); border-radius: 50%; padding: 4px; flex: none; margin-top: 2px; }
        .lista li b { display: block; }
        .lista li span { color: var(--texto); font-size: 15px; }
        .tarjeta-dte { background: linear-gradient(160deg, var(--noche-2), var(--ciruela)); color: #fff; border-radius: 24px; padding: 34px; position: relative; overflow: hidden; box-shadow: var(--sombra); }
        .tarjeta-dte::after { content: ""; position: absolute; width: 300px; height: 300px; right: -110px; top: -110px;
            background: radial-gradient(circle, rgba(242, 84, 45, .45), transparent 70%); }
        .tarjeta-dte h3 { font-size: 20px; margin-bottom: 18px; position: relative; z-index: 1; }
        .docs { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 26px; position: relative; z-index: 1; }
        .docs span { font-size: 13px; font-weight: 600; padding: 7px 13px; border-radius: 999px; background: rgba(255, 255, 255, .08); border: 1px solid rgba(255, 255, 255, .14); }
        .flujo { display: grid; gap: 12px; margin-bottom: 26px; position: relative; z-index: 1; }
        .flujo div { display: flex; align-items: center; gap: 12px; font-size: 15px; color: #e4d3de; }
        .flujo i { font-style: normal; width: 28px; height: 28px; border-radius: 50%; background: var(--oro); color: var(--noche);
            display: grid; place-items: center; font-size: 13px; font-weight: 800; flex: none; }
        .nota-opcional { font-size: 14px; color: #ffe2b8; background: rgba(255, 181, 71, .12); border: 1px solid rgba(255, 181, 71, .3);
            border-radius: 14px; padding: 13px 15px; position: relative; z-index: 1; }

        /* Asistente IA */
        .ia-grid { display: grid; grid-template-columns: .9fr 1.1fr; gap: 56px; align-items: center; }
        .chat { background: linear-gradient(180deg, #efe6dc, #e8dccf); border-radius: 26px; padding: 24px; display: grid; gap: 10px; max-width: 420px; box-shadow: var(--sombra); }
        .burbuja { max-width: 86%; padding: 11px 15px; border-radius: 16px; font-size: 15px; box-shadow: 0 1px 2px rgba(0, 0, 0, .06); }
        .burbuja.yo { background: #d9fdd3; justify-self: end; border-bottom-right-radius: 4px; }
        .burbuja.bot { background: #fff; border-bottom-left-radius: 4px; }
        .chips { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 24px; }
        .chips span { font-size: 14px; font-weight: 600; padding: 7px 14px; border-radius: 999px; background: #fff; border: 1px solid var(--linea); color: var(--ciruela); }

        /* Apps */
        .apps-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 22px; }
        .app { border-radius: 24px; padding: 34px; border: 1px solid var(--linea); background: #fff; box-shadow: var(--sombra); }
        .app.oscura { background: linear-gradient(160deg, var(--noche-2), var(--ciruela)); color: #fff; border-color: transparent; }
        .app .icono-app { width: 54px; height: 54px; border-radius: 16px; display: grid; place-items: center; margin-bottom: 20px; background: #fdeae3; }
        .app.oscura .icono-app { background: rgba(255, 181, 71, .16); }
        .app .icono-app svg { width: 26px; height: 26px; color: var(--brasa); }
        .app.oscura .icono-app svg { color: var(--oro); }
        .app h3 { font-size: 23px; margin-bottom: 8px; }
        .app > p { color: var(--texto); margin-bottom: 20px; }
        .app.oscura > p { color: #e4d3de; }
        .app ul { list-style: none; padding: 0; margin: 0; display: grid; gap: 10px; }
        .app li { display: flex; gap: 10px; font-size: 15px; }
        .app li::before { content: "✓"; color: var(--brasa); font-weight: 800; }
        .app.oscura li::before { color: var(--oro); }

        /* Funciones */
        .funciones { background: var(--fondo); }
        .rejilla { display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; }
        .func { background: #fff; border: 1px solid var(--linea); border-radius: var(--radio); padding: 26px; transition: transform .4s var(--salida), box-shadow .4s var(--salida), border-color .3s; }
        .func:hover { transform: translateY(-4px); box-shadow: var(--sombra); border-color: #f6c3b1; }
        .func .icono { width: 46px; height: 46px; border-radius: 14px; background: linear-gradient(135deg, #fff1e6, #fde0d4); display: grid; place-items: center; margin-bottom: 16px; }
        .func .icono svg { width: 22px; height: 22px; color: var(--brasa-2); }
        .func h3 { font-size: 17px; margin-bottom: 6px; }
        .func p { color: var(--texto); font-size: 15px; }

        /* Seguridad */
        .seg-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 18px; }
        .seg { display: flex; gap: 16px; padding: 24px; border: 1px solid var(--linea); border-radius: var(--radio); background: #fff; }
        .seg svg { width: 28px; height: 28px; color: var(--ciruela); flex: none; }
        .seg b { display: block; margin-bottom: 4px; }
        .seg span { color: var(--texto); font-size: 15px; }

        /* Precio */
        .planes { display: grid; grid-template-columns: 1fr 1fr; gap: 22px; max-width: 900px; }
        .plan { border: 1px solid var(--linea); border-radius: 24px; padding: 34px; background: #fff; }
        .plan.destacado { border: 0; color: #fff; background: linear-gradient(150deg, var(--brasa), var(--brasa-2) 60%, #a52a10); box-shadow: 0 30px 60px -24px rgba(217, 58, 22, .6); }
        .plan .nombre { font-weight: 800; color: var(--suave); font-size: 13px; text-transform: uppercase; letter-spacing: .08em; }
        .plan.destacado .nombre, .plan.destacado .detalle, .plan.destacado ul { color: #ffe6dc; }
        .plan .precio { font-size: 48px; font-weight: 800; margin: 8px 0 4px; letter-spacing: -.03em; }
        .plan .detalle { color: var(--texto); margin-bottom: 20px; }
        .plan ul { margin: 0; padding-left: 20px; color: var(--texto); display: grid; gap: 6px; }

        /* Pasos */
        .pasos { display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; counter-reset: paso; }
        .paso { padding: 28px; border-radius: var(--radio); background: var(--fondo); border: 1px solid var(--linea); position: relative; }
        .paso .num { font-size: 13px; font-weight: 800; letter-spacing: .08em; color: var(--brasa); margin-bottom: 10px; }
        .paso b { display: block; font-size: 19px; margin-bottom: 6px; }
        .paso span { color: var(--texto); }
        .paso a { color: var(--brasa-2); font-weight: 700; }

        /* Preguntas */
        .faq { max-width: 840px; }
        details { border-bottom: 1px solid var(--linea); padding: 20px 0; }
        summary { font-weight: 700; font-size: 17px; cursor: pointer; list-style: none; display: flex; justify-content: space-between; gap: 16px; }
        summary::-webkit-details-marker { display: none; }
        summary::after { content: "+"; color: var(--brasa); font-size: 24px; line-height: 1; transition: transform .3s var(--salida); }
        details[open] summary::after { transform: rotate(45deg); }
        details p { color: var(--texto); margin-top: 10px; }

        /* Cierre */
        .cierre { position: relative; overflow: hidden; color: #fff; text-align: center; padding: 110px 0;
            background: radial-gradient(700px 340px at 50% 0%, rgba(242, 84, 45, .42), transparent 70%), linear-gradient(180deg, var(--noche-2), var(--noche)); }
        .cierre h2 { font-size: clamp(32px, 4.4vw, 50px); font-weight: 800; max-width: 780px; margin: 0 auto; }
        .cierre p { color: #e4d3de; font-size: 18px; max-width: 620px; margin: 16px auto 36px; }
        .cierre p a { color: var(--oro); font-weight: 700; }
        .cierre .acciones { justify-content: center; }
        .pie { background: var(--noche); color: #8f7a89; font-size: 13px; text-align: center; padding: 0 16px 34px; }

        .wa-flotante { position: fixed; right: 20px; bottom: 20px; width: 60px; height: 60px; border-radius: 50%; background: #25d366;
            display: grid; place-items: center; box-shadow: 0 14px 30px -8px rgba(37, 211, 102, .6); z-index: 50; transition: transform .3s var(--salida); }
        .wa-flotante:hover { transform: scale(1.08); }
        .wa-flotante svg { width: 30px; height: 30px; color: #fff; }

        /* Aparicion al hacer scroll */
        .revelar { opacity: 0; transform: translateY(24px); transition: opacity .8s var(--salida), transform .8s var(--salida); }
        .revelar.visible { opacity: 1; transform: none; }

        @media (max-width: 900px) {
            .hero-grid, .dte-grid, .ia-grid, .planes, .apps-grid { grid-template-columns: 1fr; }
            .escena { height: 400px; max-width: 420px; width: 100%; margin: 0 auto; }
            .rejilla { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 640px) {
            .pilares, .rejilla, .seg-grid, .pasos, .razones { grid-template-columns: 1fr; }
            .fila { padding: 12px 14px; font-size: 14px; grid-template-columns: 1.3fr 1fr 1fr; }
            .barra { margin-bottom: 44px; }
            .acciones .boton { width: 100%; }
            section.bloque { padding: 76px 0; }
            .aviso .caja { flex-direction: column; gap: 10px; }
            .escena { height: 360px; }
            .ticket { width: 220px; }
            .sello { width: 90px; height: 90px; right: -12px; }
            .ficha { font-size: 13px; padding: 10px 12px; }
        }
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { animation: none !important; transition: none !important; }
            .revelar { opacity: 1; transform: none; }
            html { scroll-behavior: auto; }
        }
    </style>
</head>
<body>

@php $iconoWa = '<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.47 14.38c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.48-.89-.79-1.49-1.77-1.66-2.07-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.67-1.62-.92-2.22-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48s1.07 2.88 1.21 3.08c.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.69.63.71.23 1.36.2 1.87.12.57-.09 1.76-.72 2.01-1.41.25-.7.25-1.29.17-1.41-.07-.13-.27-.2-.57-.35zM12.04 21.5h-.01a9.45 9.45 0 0 1-4.82-1.32l-.35-.21-3.58.94.96-3.49-.23-.36a9.43 9.43 0 0 1-1.45-5.04c0-5.22 4.25-9.47 9.48-9.47a9.4 9.4 0 0 1 6.7 2.78 9.4 9.4 0 0 1 2.77 6.7c0 5.22-4.25 9.47-9.47 9.47zm8.06-17.53A11.33 11.33 0 0 0 12.04.63C5.76.63.65 5.74.65 12.02c0 2.01.52 3.97 1.52 5.7L.55 23.63l6.04-1.58a11.4 11.4 0 0 0 5.45 1.39h.01c6.28 0 11.39-5.11 11.39-11.39 0-3.04-1.18-5.9-3.34-8.05z"/></svg>'; @endphp

<header class="hero">
    <div class="contenedor">
        <div class="barra">
            <span class="marca">Actualización de tu sistema</span>
            <a class="mini" href="{{ $whatsapp }}" target="_blank" rel="noopener">¿Dudas? Escríbenos</a>
        </div>

        <div class="hero-grid">
        <div>
        <div class="insignia">● Actualización importante · Gratis para clientes actuales</div>
        <h1>Existe una nueva versión de tu sistema y <span>es importante que te cambies.</span></h1>
        <p class="bajada">
            La versión que usas hoy quedará sin soporte. La nueva es más rápida, más segura, más fácil de usar y trae
            muchísimas opciones más: facturación electrónica integrada con Hacienda y un asistente con inteligencia
            artificial en tu WhatsApp. No esperes a tener un problema: cámbiate ahora, sin costo.
        </p>
        <div class="acciones">
            <a class="boton boton-wa" href="{{ $whatsapp }}" target="_blank" rel="noopener">{!! $iconoWa !!} Quiero cambiarme ahora</a>
            <a class="boton boton-borde" href="#por-que">¿Por qué debo cambiarme?</a>
        </div>
        <p class="contacto">Para actualizarte, comunícate con <a href="{{ $whatsapp }}" target="_blank" rel="noopener">soporte técnico</a> o, si prefieres, al WhatsApp <a href="{{ $whatsappAlterno }}" target="_blank" rel="noopener">+503 6691-7170</a>.</p>

        </div>
        <div class="escena" aria-hidden="true">
            <div class="ticket">
                <div class="t-lin oscura"></div>
                <div class="t-lin media"></div>
                <div class="t-lin corta"></div>
                <div class="t-lin"></div>
                <div class="t-lin corta"></div>
                <div class="t-corte"></div>
                <div class="t-total"><i></i><b></b></div>
                <div class="sello"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></div>
            </div>
            <div class="ficha f1"><i><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg></i>Sellado por Hacienda</div>
            <div class="ficha f2"><i><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9V2h12v7M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg></i>Comanda impresa en cocina</div>
            <div class="ficha f3"><i><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></i>¿Cuánto vendí hoy?</div>
            <small>Ilustración</small>
        </div>
        </div>

        <div class="pilares">
            <div class="pilar">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2 3 14h9l-1 8 10-12h-9z"/></svg>
                <b>Más rápido</b>
                <span>Comandas, pantallas de cocina y panel que se actualizan al instante, sin recargar.</span>
            </div>
            <div class="pilar">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
                <b>Más seguro</b>
                <span>Permisos por usuario, clave de autorización rotativa y trazabilidad de cada movimiento.</span>
            </div>
            <div class="pilar">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2M9 9h.01M15 9h.01"/></svg>
                <b>Más fácil</b>
                <span>Pensado para pantallas táctiles, tablets y celulares. Tu equipo aprende en minutos.</span>
            </div>
        </div>
    </div>
</header>

<div class="aviso">
    <div class="contenedor">
        <div class="caja">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0zM12 9v4M12 17h.01"/></svg>
            <div>
                <b>Tu versión actual quedará sin soporte</b>
                <p>Dejará de recibir soporte técnico, correcciones, mejoras y actualizaciones de seguridad. Seguir en ella
                    significa operar tu negocio sin respaldo ante cualquier falla. Cambiarte es <strong>gratis</strong> y es el paso
                    necesario para mantener tu restaurante protegido y al día:
                    comunícate con <a href="{{ $whatsapp }}" target="_blank" rel="noopener"><strong>soporte técnico</strong></a>
                    o, si prefieres, al WhatsApp <a href="{{ $whatsappAlterno }}" target="_blank" rel="noopener"><strong>+503 6691-7170</strong></a>.</p>
            </div>
        </div>
    </div>
</div>

<section class="bloque dte" id="factura">
    <div class="contenedor dte-grid">
        <div>
            <div class="encabezado">
                <div class="pre">Facturación electrónica</div>
                <h2>Factura electrónica integrada con el Ministerio de Hacienda</h2>
                <p>La facturación electrónica llegó para quedarse, y la nueva versión ya está preparada. Emite tus DTE desde el mismo punto de venta, con la Normativa DTE V2.0 y sin pasos manuales.</p>
            </div>
            <ul class="lista">
                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                    <div><b>Todo automático</b><span>Validación contra los esquemas oficiales, firma, transmisión y sello en segundos. Si Hacienda no responde, reintenta solo cada 5 minutos.</span></div></li>
                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                    <div><b>Tu cliente lo recibe por correo</b><span>PDF con código QR y el logo de tu negocio, más el JSON. Además, consulta pública del documento.</span></div></li>
                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                    <div><b>Control total</b><span>Documentos emitidos y rechazados con su motivo, reenvío a Hacienda, anulación con documento de reemplazo, nota de crédito total o parcial y retorno al inventario.</span></div></li>
                <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                    <div><b>Listo para el contador</b><span>Anexos de IVA, libro de compras desde JSON, descarga masiva de DTE y respaldo mensual automático.</span></div></li>
            </ul>
        </div>
        <div class="tarjeta-dte">
            <h3>Documentos que puedes emitir</h3>
            <div class="docs">
                <span>Factura</span><span>Crédito Fiscal</span><span>Nota de Crédito</span><span>Factura de Exportación</span>
                <span>Sujeto Excluido</span><span>Evento de Retorno</span><span>Invalidación</span>
            </div>
            <h3>Así funciona</h3>
            <div class="flujo">
                <div><i>1</i> Cobras la cuenta como siempre</div>
                <div><i>2</i> El sistema valida, firma y transmite</div>
                <div><i>3</i> Hacienda sella el documento</div>
                <div><i>4</i> Tu cliente lo recibe por correo</div>
            </div>
            <div class="nota-opcional"><strong>Opcional.</strong> La facturación electrónica es el único componente con costo y solo la activas si la necesitas. El resto de la actualización es gratis.</div>
        </div>
    </div>
</section>

<section class="bloque">
    <div class="contenedor ia-grid">
        <div class="chat" aria-hidden="true">
            <div class="burbuja yo">¿Cuánto vendí hoy?</div>
            <div class="burbuja bot">Hoy llevas <b>$1,284.50</b> en 63 órdenes. Tu hora pico fue de <b>12 a 1 p.m.</b> 🍽️</div>
            <div class="burbuja yo">¿Qué insumos se están agotando?</div>
            <div class="burbuja bot">3 insumos bajo el mínimo: <b>queso mozzarella</b>, <b>pan de hamburguesa</b> y <b>papas</b>.</div>
        </div>
        <div>
            <div class="encabezado" style="margin-bottom: 0">
                <div class="pre">Nuevo · Inteligencia artificial</div>
                <h2>Algo que tu versión actual no puede hacer: tu negocio te responde por WhatsApp</h2>
                <p>Pregúntale a tu asistente por texto o nota de voz y te contesta con cifras reales: ventas, utilidad, platillos más vendidos, inventario, cajas abiertas, cuentas por cobrar y más. Incluso te envía gráficas.</p>
                <p>Cada 6 horas revisa tu restaurante y te avisa si detecta algo raro: caída de ventas, descuadres de caja, descuentos fuera de lo normal o facturas rechazadas. Solo lee la información, nunca modifica nada.</p>
            </div>
            <div class="chips">
                <span>¿Cómo me fue ayer?</span><span>Platillos más vendidos</span><span>¿Quién me debe?</span><span>Proyección de cierre de mes</span><span>Estimado de IVA</span>
            </div>
        </div>
    </div>
</section>

<section class="bloque" id="apps" style="padding-top: 0">
    <div class="contenedor">
        <div class="encabezado">
            <div class="pre">Nuevo · Apps</div>
            <h2>Comandas más rápidas y tickets impresos a tu manera</h2>
            <p>La nueva versión trae herramientas pensadas para que tu equipo trabaje más rápido en el salón y en la caja.</p>
        </div>
        <div class="apps-grid">
            <div class="app oscura">
                <div class="icono-app"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="2" width="12" height="20" rx="2"/><path d="M11 18h2"/></svg></div>
                <h3>App nativa para Android</h3>
                <p>Tus meseros toman las órdenes desde el celular o la tablet, directo en la mesa. Crear comandas es más rápido y más fácil que nunca.</p>
                <ul>
                    <li>Toma de pedidos en la mesa, sin ir a la caja</li>
                    <li>Menú con imágenes y modificadores al alcance de un toque</li>
                    <li>División de cuentas, pantalla de cocina y despacho</li>
                    <li>Acceso con huella</li>
                </ul>
            </div>
            <div class="app">
                <div class="icono-app"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9V2h12v7M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg></div>
                <h3>Facturador: comandas y tickets impresos</h3>
                <p>La app de escritorio Facturador imprime automáticamente tus comandas y tickets en impresoras térmicas, y tú decides cómo se ven.</p>
                <ul>
                    <li>Comandas impresas al instante en cada estación: cocina, bar o preparación</li>
                    <li>Tickets e impresiones configurables a la medida de tu negocio</li>
                    <li>Compatible con impresoras térmicas</li>
                    <li>Aviso a cocina cuando se elimina un platillo ya enviado</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="bloque funciones" id="novedades">
    <div class="contenedor">
        <div class="encabezado">
            <div class="pre">Todo lo que incluye</div>
            <h2>Muchísimas opciones más que te estás perdiendo</h2>
            <p>Cada día en la versión anterior es un día sin estas herramientas. Restaurantes, comida rápida, pupuserías, cafeterías, bares y food trucks: todo lo que tu operación necesita en un solo sistema.</p>
        </div>
        <div class="rejilla">
            @foreach ($funciones as [$titulo, $texto, $ruta])
                <div class="func">
                    <div class="icono"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="{{ $ruta }}"/></svg></div>
                    <h3>{{ $titulo }}</h3>
                    <p>{{ $texto }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="bloque" id="seguridad">
    <div class="contenedor">
        <div class="encabezado">
            <div class="pre">Seguridad</div>
            <h2>Tu dinero y tu información merecen la máxima protección</h2>
            <p>Un sistema sin soporte deja de recibir actualizaciones de seguridad. La nueva versión protege cada venta, cada caja y cada dato: sabrás siempre quién hizo qué, y nadie podrá hacer más de lo que le corresponde.</p>
        </div>
        <div class="seg-grid">
            <div class="seg"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                <div><b>Clave de autorización que cambia cada 10 minutos</b><span>Solo gerencia la ve. Se pide para descuentos, cambios de precio y eliminar platillos ya enviados a cocina.</span></div></div>
            <div class="seg"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM19 8v6M22 11h-6"/></svg>
                <div><b>Roles y permisos por usuario</b><span>Gerencia, Administración, Cajero, Mesero y Contador, con 88 permisos ajustables uno por uno.</span></div></div>
            <div class="seg"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 8v4l3 3"/><circle cx="12" cy="12" r="10"/></svg>
                <div><b>Trazabilidad completa</b><span>Historial de quién eliminó, anuló o cobró, cuándo y por cuánto. Se anula en lugar de borrar.</span></div></div>
            <div class="seg"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                <div><b>Acceso con huella o Face ID</b><span>En la app móvil, y alertas por WhatsApp cuando hay descuadres de caja o descuentos inusuales.</span></div></div>
        </div>
    </div>
</section>

<section class="bloque funciones" id="precio">
    <div class="contenedor">
        <div class="encabezado">
            <div class="pre">Precio</div>
            <h2>No hay ninguna razón para quedarte atrás: cambiarte es gratis</h2>
            <p>No pagas nada por la actualización. Solo si decides facturar electrónicamente, ese servicio tiene un costo.</p>
        </div>
        <div class="planes">
            <div class="plan destacado">
                <div class="nombre">Actualización</div>
                <div class="precio">Gratis</div>
                <div class="detalle">Para todos los clientes actuales.</div>
                <ul>
                    <li>Nueva versión de tu sistema</li>
                    <li>Asistente con IA por WhatsApp</li>
                    <li>Acompañamiento y capacitación</li>
                    <li>Soporte por WhatsApp</li>
                </ul>
            </div>
            <div class="plan">
                <div class="nombre">Facturación electrónica</div>
                <div class="precio" style="font-size: 30px; margin: 18px 0 12px">Opcional</div>
                <div class="detalle">Único componente con costo. Actívala solo si la necesitas.</div>
                <ul>
                    <li>DTE homologados con Hacienda</li>
                    <li>Envío automático por correo</li>
                    <li>Anexos y reportes fiscales</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="bloque" id="por-que">
    <div class="contenedor">
        <div class="encabezado">
            <div class="pre">Por qué debes cambiarte</div>
            <h2>Quedarte en la versión anterior tiene un costo. Cambiarte, no.</h2>
            <p>Compara lo que pierdes si te quedas con lo que ganas al cambiarte.</p>
        </div>
        <div class="comparacion">
            <div class="fila cabecera"><span></span><span>Versión actual</span><span>Nueva versión</span></div>
            @foreach ([
                ['Soporte técnico', 'Termina', 'Incluido'],
                ['Actualizaciones de seguridad', 'No', 'Continuas'],
                ['Correcciones y mejoras', 'No', 'Continuas'],
                ['Nuevas funciones', 'No', 'Muchísimas'],
                ['Facturación electrónica DTE V2.0', 'Sin actualizaciones', 'Al día con Hacienda'],
                ['Asistente con IA por WhatsApp', 'No', 'Incluido'],
                ['Pantallas de cocina en tiempo real', 'No', 'Incluido'],
                ['App nativa para Android', 'No', 'Incluida'],
                ['Facturador para comandas y tickets', 'No', 'Incluido'],
                ['Costo del cambio', '—', 'Gratis'],
            ] as [$concepto, $actual, $nueva])
                <div class="fila"><span>{{ $concepto }}</span><span class="mal">{{ $actual }}</span><span class="bien">{{ $nueva }}</span></div>
            @endforeach
        </div>
        <div class="razones">
            <div><b>1. Seguridad</b><span>Sin soporte, tu versión actual no recibirá protecciones nuevas. La nueva cuida tu dinero con permisos por usuario, clave rotativa y trazabilidad total.</span></div>
            <div><b>2. Características</b><span>Facturación electrónica, asistente con IA, app nativa para Android, cocina en tiempo real, delivery, multisucursal y mucho más.</span></div>
            <div><b>3. Respaldo</b><span>En la nueva versión tienes soporte por WhatsApp, capacitación y mejoras constantes. En la anterior, ya no.</span></div>
        </div>
    </div>
</section>

<section class="bloque">
    <div class="contenedor">
        <div class="encabezado">
            <div class="pre">Cámbiate hoy</div>
            <h2>Cambiarte es fácil: tres pasos y listo</h2>
        </div>
        <div class="pasos">
            <div class="paso"><div class="num">PASO 1</div><b>Comunícate con nosotros</b><span>Escribe a <a href="{{ $whatsapp }}" target="_blank" rel="noopener">soporte técnico</a> o, si prefieres, al WhatsApp +503 6691-7170.</span></div>
            <div class="paso"><div class="num">PASO 2</div><b>Preparamos tu cuenta</b><span>Configuramos la nueva versión para tu restaurante.</span></div>
            <div class="paso"><div class="num">PASO 3</div><b>Te capacitamos</b><span>Te enseñamos a ti y a tu equipo, y empiezas a vender.</span></div>
        </div>
    </div>
</section>

<section class="bloque" style="padding-top: 0">
    <div class="contenedor faq">
        <div class="encabezado">
            <div class="pre">Preguntas frecuentes</div>
            <h2>Resolvemos tus dudas</h2>
        </div>
        <details><summary>¿La actualización tiene costo?</summary>
            <p>No. Cambiarte a la nueva versión es gratis. Lo único con costo es la facturación electrónica, y activarla es opcional.</p></details>
        <details><summary>¿Qué pasará con la versión que uso ahora?</summary>
            <p>Quedará sin soporte técnico, sin correcciones, sin mejoras y sin actualizaciones de seguridad. Si algo falla, no tendrá respaldo. Por eso es importante que te cambies a la nueva versión cuanto antes.</p></details>
        <details><summary>¿Necesito comprar equipo nuevo?</summary>
            <p>No necesariamente. La nueva versión funciona en el navegador de computadoras, tablets y celulares, y es compatible con impresoras térmicas para tickets y comandas.</p></details>
        <details><summary>¿Estoy obligado a facturar electrónicamente?</summary>
            <p>La facturación electrónica es opcional dentro del sistema. Si tu negocio la necesita, la activamos; si no, puedes seguir trabajando con tickets y documentos propios.</p></details>
        <details><summary>¿Puedo esperar y cambiarme después?</summary>
            <p>No te lo recomendamos. Mientras sigas en la versión anterior operas sin soporte y sin las mejoras de seguridad. Además, mientras antes te cambies, antes aprovechas todas las nuevas funciones. El cambio es gratis: no hay razón para esperar.</p></details>
        <details><summary>¿Me van a acompañar en el cambio?</summary>
            <p>Sí. Te ayudamos a configurar tu cuenta y capacitamos a tu equipo. Además, tienes soporte por WhatsApp.</p></details>
    </div>
</section>

<section class="cierre">
    <div class="contenedor">
        <h2>No te quedes en una versión sin soporte. Cámbiate hoy.</h2>
        <p>Más rápido, más seguro, más fácil de usar y gratis. Comunícate con <a href="{{ $whatsapp }}" target="_blank" rel="noopener">soporte técnico</a> y te ayudamos a hacer el cambio.</p>
        <div class="acciones">
            <a class="boton boton-wa" href="{{ $whatsapp }}" target="_blank" rel="noopener">{!! $iconoWa !!} Escribir a soporte técnico</a>
        </div>
        <p class="contacto">También puedes escribirnos al <a href="{{ $whatsappAlterno }}" target="_blank" rel="noopener">+503 6691-7170</a>.</p>
    </div>
</section>
<div class="pie">© {{ date('Y') }} · Algunas funciones avanzadas dependen del plan contratado.</div>

<a class="wa-flotante" href="{{ $whatsapp }}" target="_blank" rel="noopener" aria-label="Escribir por WhatsApp">{!! $iconoWa !!}</a>

<script>
    (function () {
        if (!('IntersectionObserver' in window) || window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
        var piezas = document.querySelectorAll('.encabezado, .func, .seg, .plan, .paso, .app, .razones > div, .comparacion, .tarjeta-dte, .chat, .lista li, .aviso .caja');
        var io = new IntersectionObserver(function (entradas) {
            entradas.forEach(function (e) {
                if (!e.isIntersecting) return;
                e.target.classList.add('visible');
                io.unobserve(e.target);
            });
        }, { threshold: .12, rootMargin: '0px 0px -40px 0px' });
        piezas.forEach(function (el, i) {
            el.classList.add('revelar');
            el.style.transitionDelay = (i % 3) * 80 + 'ms';
            io.observe(el);
        });
    })();
</script>

</body>
</html>
