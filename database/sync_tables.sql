CREATE TABLE IF NOT EXISTS `sync_tables` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tabla` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla template.sync_tables: ~35 rows (aproximadamente)
DELETE FROM `sync_tables`;
/*!40000 ALTER TABLE `sync_tables` DISABLE KEYS */;
INSERT INTO `sync_tables` (`id`, `tabla`, `tipo`) VALUES
	(1, 'users', 2),
	(2, 'config_app', 1),
	(3, 'config_impresion', 1),
	(4, 'config_monedas', 1),
	(5, 'config_paneles', 1),
	(6, 'config_principal', 1),
	(7, 'config_root', 1),
	(8, 'corte_de_cajas', 1),
	(9, 'cuentas_pagars', 1),
	(10, 'cuentas_pagar_abonos', 1),
	(11, 'efectivo_cuenta_bancos', 1),
	(12, 'efectivo_gastos_categorias', 1),
	(13, 'efectivo_gastos', 1),
	(14, 'efectivo_gastos_images', 1),
	(15, 'efectivo_remesas', 1),
	(16, 'efectivo_transferencias_historials', 1),
	(17, 'images', 1),
	(18, 'image_categories', 1),
	(19, 'image_tags', 1),
	(20, 'numero_cajas', 1),
	(21, 'opciones', 1),
	(22, 'opciones_productos', 1),
	(23, 'opciones_subs', 1),
	(24, 'order_imgs', 1),
	(25, 'productos', 1),
	(26, 'producto_categorias', 1),
	(27, 'producto_precios', 1),
	(28, 'proveedors', 1),
	(29, 'repartidors', 1),
	(30, 'ticket_deliveries', 1),
	(31, 'ticket_nums', 1),
	(32, 'ticket_opcions', 1),
	(33, 'ticket_ordens', 1),
	(34, 'ticket_productos', 1),
	(35, 'clientes', 1);
