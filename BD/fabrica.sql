-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-12-2020 a las 18:07:06
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fabrica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` float NOT NULL,
  `medida` varchar(45) NOT NULL,
  `categorias_id` int(11) NOT NULL,
  `descripcion_corta` varchar(255) NOT NULL,
  `descripcion_larga` varchar(1500) NOT NULL,
  `destacados` tinyint(1) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `imagen1` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `codigo`, `nombre`, `precio`, `medida`, `categorias_id`, `descripcion_corta`, `descripcion_larga`, `destacados`, `stock`, `slug`, `imagen1`, `created_at`, `updated_at`) VALUES
(1, 'CV490X190', 'Colchón V4 Clásico', 190, '90X190', 1, 'Colchón con 4cm de viscolástica', '<h4><strong>CARACTERÍSTICAS:</strong></h4>\r\n					<ul>\r\n						<li>4 cm de viscolástica de alta densidad.</li>\r\n						<li>20 cm de altura total (4 cm visco + 16 cm núcleo de HR).</li>\r\n						<li>Funda interior para la protección del núcleo.</li>\r\n						<li>Funda exterior FL1: con cremallera y logo 3D en cara inferior.</li>\r\n						<li>Tejidos desenfundables para permitir su lavado.</li>\r\n						<li>Lavable en frío.</li>\r\n					</ul>\r\n					<h4><strong>Beneficios</strong></h4>\r\n					<ul>\r\n						<li>Ergonómico y anatómico, se adapta perfectamente a la estructura corporal.</li>\r\n						<li>Transpirable, termorregulador y electrobiológico.</li>\r\n						<li>Máxima firmeza.</li>\r\n						<li>Mejora la circulación sanguínea al aliviar presión sobre el cuerpo</li>\r\n						<li>Antiácaros, antiescaras, antimoho.</li>\r\n						<li>Calido en invierno y fresco en verano.</li>\r\n					</ul>', 1, 5, 'colchon-v4-clasico', 'Clasico.jpg', '2020-11-02 07:56:59', '2020-11-26 15:57:05'),
(2, 'CV890X190', 'Colchón V8 Confort', 250, '90X190', 1, 'Colchón Viscolástica Confort', '<h4><strong>CARACTERÍSTICAS:</strong></h4>\r\n    					<ul>\r\n    						<li>8 cm de viscolástica de alta densidad.</li>\r\n    						<li>26 cm de altura total (8 cm visco + 18 cm núcleo de HR).</li>\r\n    						<li>Funda interior para la protección del núcleo.</li>\r\n    						<li>Funda exterior María: con strecth gris en la tapa superior y el lateral, cremallera y 3D en cara inferior.</li>\r\n    						<li>Tejidos desenfundables para permitir su lavado.</li>\r\n    						<li>Lavable en frío.</li>\r\n    					</ul>\r\n					   <h4><strong>Beneficios</strong></h4>\r\n    					<ul>\r\n    						<li>Ergonómico y anatómico, se adapta perfectamente a la estructura corporal.</li>\r\n    						<li>Transpirable, termorregulador y electrobiológico.</li>\r\n    						<li>Máxima firmeza.</li>\r\n    						<li>Mejora la circulación sanguínea al aliviar presión sobre el cuerpo</li>\r\n    						<li>Antiácaros, antiescaras, antimoho.</li>\r\n    						<li>Calido en invierno y fresco en verano.</li>\r\n    					</ul>	', 0, 0, 'colchon-v8-clasico', 'Confort.jpg', '2020-11-02 19:58:25', '2020-11-26 15:08:42'),
(3, 'S15LAM90X190', 'Somier 15 Lamas', 115, '90X190', 2, 'Somier 15 Lamas', '<h4><strong>CARACTERÍSTICAS:</strong></h4>\r\n              				<ul>\r\n              					<li>Somier láminas de haya natural.</li>\r\n              					<li>Bastidor 40x30 mm</li>\r\n              					<li>Láminas de haya natural de 53x9 mm</li>\r\n              					<li>Altura total del somier con patas: 33 cm.</li>\r\n              					<li>Patas con sistema de abrazaderas.</li>\r\n              					<li>Medidas de 80/90 sin barra central.</li>\r\n              					<li>Medidas de 105/135/150 con barra central.</li>\r\n              				</ul>', 1, 5, 'somier-15-lamas', '15Lamas.jpg', '2020-11-07 17:40:08', '2020-11-26 16:01:57'),
(5, 'CM135X190', 'Canapé Madera', 350, '135x190', 3, 'Canapé de Madera, disponible en 4 colores.', '<h4><strong>CARACTERÍSTICAS:</strong></h4>\r\n    					<ul>\r\n    						<li>Altura total: 35 cm.</li>\r\n    						<li>Capacidad: 27 cm.</li>\r\n    						<li>Fondo melanina blanca de 8 mm.</li>\r\n    						<li>Base estructura de tubo de 30x30, y tablero aglomerado de 8 mm.</li>\r\n    						<li>Disponible en cuatro colores.</li>\r\n    					</ul>                       \r\n				        <h4><strong>COLORES</strong></h4>\r\n					    <img class=\"img-fluid rounded d-block\" src=\"../img/articulos/Colores-Canape.jpg\" alt=\"Colores Canapé\">', 1, 5, 'canape-madera', 'Canape-Madera.jpg', '2020-11-26 21:18:38', '2020-11-26 21:18:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atributos`
--

CREATE TABLE `atributos` (
  `id` int(11) NOT NULL,
  `sku` varchar(45) NOT NULL,
  `articulos_id` int(11) NOT NULL,
  `medida` varchar(45) NOT NULL,
  `precio` float NOT NULL,
  `precio_oferta` float DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `atributos`
--

INSERT INTO `atributos` (`id`, `sku`, `articulos_id`, `medida`, `precio`, `precio_oferta`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'CV490X180', 1, '90X180', 190, 160, 1, '2020-11-02 16:20:13', '2020-11-08 12:36:56'),
(2, 'CV490X190', 1, '90X190', 190, NULL, 1, '2020-11-02 16:24:28', '2020-11-08 12:36:56'),
(4, 'CV890X180', 2, '90X180', 350, NULL, 1, '2020-11-02 20:07:42', '2020-11-02 20:07:42'),
(5, 'CV890X190', 2, '90X190', 350, NULL, 0, '2020-11-02 20:10:26', '2020-11-02 20:10:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `imagen`, `slug`) VALUES
(1, 'Colchones', 'Colchon_Artesano1.jpg', 'colchones'),
(2, 'Somieres', 'Multilaminas.jpg', 'somieres'),
(3, 'Canapés', 'Canapes.jpg', 'canapes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos`
--

CREATE TABLE `detalle_pedidos` (
  `id` int(11) NOT NULL,
  `pedidos_id` int(11) NOT NULL,
  `articulos_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` int(11) DEFAULT NULL,
  `precio_und` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_pedidos`
--

INSERT INTO `detalle_pedidos` (`id`, `pedidos_id`, `articulos_id`, `cantidad`, `descuento`, `precio_und`) VALUES
(1, 2, 3, 1, NULL, 115),
(2, 3, 5, 1, NULL, 350),
(3, 3, 1, 2, NULL, 190),
(4, 4, 1, 1, NULL, 190),
(5, 5, 1, 1, NULL, 190);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `nombre`) VALUES
(1, 'Confirmado'),
(2, 'Enviado'),
(3, 'Pagado'),
(4, 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pagos`
--

CREATE TABLE `forma_pagos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `imagen` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `forma_pagos`
--

INSERT INTO `forma_pagos` (`id`, `nombre`, `imagen`) VALUES
(1, 'Paypal', 'paypal_3.png'),
(2, 'Tarjeta', 'tarjeta.png'),
(3, 'Contra Reembolso', 'ContraReembolso.png'),
(4, 'Transferencia', 'transferencia-bancaria.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('skarwen@gmail.com', '$2y$10$JeErQtWYNhICSIDsxt5UneQ0iNs3zn7ZQVxUUfj0w3ipzdtdu/XuG', '2020-11-25 22:16:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `iva` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `direccion_envio` varchar(255) DEFAULT NULL,
  `codigopostal` int(5) DEFAULT NULL,
  `poblacion` varchar(45) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `forma_pago_id` int(11) NOT NULL,
  `gastos_envio` int(11) DEFAULT NULL,
  `estado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `users_id`, `iva`, `total`, `direccion_envio`, `codigopostal`, `poblacion`, `fecha`, `forma_pago_id`, `gastos_envio`, `estado_id`) VALUES
(2, 3, 95.04, 115, NULL, NULL, NULL, '2020-11-28 09:21:10', 1, NULL, 3),
(3, 3, 603.31, 730, NULL, NULL, NULL, '2020-11-28 12:54:55', 4, NULL, 1),
(4, 3, 157.02, 190, NULL, NULL, NULL, '2020-11-29 12:14:36', 4, NULL, 1),
(5, 3, 157.02, 190, NULL, NULL, NULL, '2020-11-29 12:38:43', 4, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poblacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provincia` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_postal` int(5) NOT NULL,
  `telefono` int(9) NOT NULL,
  `dni` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `apellidos`, `direccion`, `poblacion`, `provincia`, `cod_postal`, `telefono`, `dni`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `roles_id`) VALUES
(1, 'admin@admin.com', '$2y$10$MXW7jj1cMA5.38.c0QAHN.K7NJLvPkD7H7kupUQVvCft7bWfsdrhC', 'Admin', 'Administrador', 'Ibdes, 6', 'Zaragoza', 'Zaragoza', 50012, 976311255, NULL, NULL, NULL, '2020-11-02 07:00:52', '2020-11-28 07:53:46', 1),
(2, 'tatiabelov@gmail.com', '$2y$10$LMYV07oUvqk8FuSo6vfW6.WJBvjJlWbX5bgdbhdWKrdu7SL4dNMm6', 'Mar', 'Belov', 'Veracruz, 20', 'Zaragoza', 'Zaragoza', 50019, 666999550, NULL, NULL, '3LPEGYaz7j5JVdJA9Wz4zBNYITZYrufr2QnL58eo87VJF4o0akW8FwLyCMYI', '2020-11-02 07:02:30', '2020-11-28 11:29:39', NULL),
(3, 'skarwen@gmail.com', '$2y$10$v74cib8rzBLyk6nPobS.oeWtx1Ti3rvJV1Nilr6YECEnQMI5qEftO', 'Diego', 'Palacios', 'Almagro, 13', 'Zaragoza', 'Zaragoza', 50004, 696542534, NULL, '2020-11-25 21:48:16', NULL, '2020-11-25 21:37:21', '2020-11-28 07:55:32', NULL),
(4, 'marimarasir@gmail.com', '$2y$10$vRqV49XlaqK2EYSBeTCHiechiHwyPtQqr6zpM/E.q.86jOtcpeA/W', 'Test', 'Prueba', 'Prueba 11', 'Zaragoza', 'Zaragoza', 50004, 666555222, NULL, NULL, NULL, '2020-11-27 11:47:44', '2020-11-27 11:47:44', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_UNIQUE` (`codigo`),
  ADD KEY `fk_articulos_categorias1_idx` (`categorias_id`);

--
-- Indices de la tabla `atributos`
--
ALTER TABLE `atributos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku_UNIQUE` (`sku`),
  ADD KEY `fk_atributos_articulos1_idx` (`articulos_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pedidos_has_articulos_articulos1_idx` (`articulos_id`),
  ADD KEY `fk_pedidos_has_articulos_pedidos1_idx` (`pedidos_id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `forma_pagos`
--
ALTER TABLE `forma_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pedidos_users1_idx` (`users_id`),
  ADD KEY `fk_pedidos_forma_pagos1_idx` (`forma_pago_id`),
  ADD KEY `fk_pedidos_estados1_idx` (`estado_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `fk_users_roles1_idx` (`roles_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `atributos`
--
ALTER TABLE `atributos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `forma_pagos`
--
ALTER TABLE `forma_pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `fk_articulos_categorias1` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `atributos`
--
ALTER TABLE `atributos`
  ADD CONSTRAINT `fk_atributos_articulos1` FOREIGN KEY (`articulos_id`) REFERENCES `articulos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD CONSTRAINT `fk_pedidos_has_articulos_articulos1` FOREIGN KEY (`articulos_id`) REFERENCES `articulos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidos_has_articulos_pedidos1` FOREIGN KEY (`pedidos_id`) REFERENCES `pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedidos_estados1` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidos_forma_pagos1` FOREIGN KEY (`forma_pago_id`) REFERENCES `forma_pagos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidos_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_roles1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
