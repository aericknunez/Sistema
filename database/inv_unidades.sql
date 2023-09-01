CREATE TABLE IF NOT EXISTS `inv_unidades` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `unidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clave` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiempo` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `td` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `inv_unidades`;
INSERT INTO `inv_unidades` (`id`, `unidad`, `abreviacion`, `clave`, `tiempo`, `td`, `created_at`, `updated_at`) VALUES
	(1, 'Unidad', 'U', '3b95a3f753', '1644426698', 0, '2022-02-09 11:11:38', '2022-02-09 11:11:38'),
	(2, 'Libra', 'Lb', '6c773f07bc', '1644426698', 0, '2022-02-09 11:11:38', '2022-02-09 11:11:38'),
	(3, 'Kilogramo', 'Kg', '7e104e3037', '1644426698', 0, '2022-02-09 11:11:38', '2022-02-09 11:11:38'),
	(4, 'Botella', 'Bot', '33097f8cc1', '1644426698', 0, '2022-02-09 11:11:38', '2022-02-09 11:11:38'),
	(5, 'Caja', 'Caj', '48f532140e', '1644426698', 0, '2022-02-09 11:11:38', '2022-02-09 11:11:38'),
	(6, 'Galon', 'Gal', '63e50073e2', '1644426698', 0, '2022-02-09 11:11:38', '2022-02-09 11:11:38'),
	(7, 'Litro', 'Lt', '63e5007333', '1644426698', 0, '2022-02-09 18:15:49', '2022-02-09 18:15:50'),
	(9, 'Bolsa', 'Bol', '6c789f07bc', '1644426698', 0, '2022-02-09 18:18:14', '2022-02-09 18:18:15');

