-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2025 a las 01:15:53
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ferregestionsys`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administracion`
--

CREATE TABLE `administracion` (
  `id_administracion` int(11) NOT NULL,
  `Empresa` varchar(255) NOT NULL,
  `Nit` varchar(255) NOT NULL,
  `Direccion` varchar(255) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `fo_id_contabilidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administracion`
--

INSERT INTO `administracion` (`id_administracion`, `Empresa`, `Nit`, `Direccion`, `Telefono`, `fo_id_contabilidad`) VALUES
(1, 'Sede Ferreteria Modelia', '89654412-2', 'Cr 81 # 24 D - 32', '725 4583', NULL),
(2, 'Securitas Colombia S.A', '95264466-6', 'Calle 26 # 92 - 32', '965 8325', NULL),
(3, 'Ferreteria la 383', '123456789', 'Calle 38 # 38-38', '389087', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_clientes` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Identificacion` varchar(255) NOT NULL,
  `Correo` varchar(255) NOT NULL,
  `Telefono` varchar(50) NOT NULL,
  `Ciudad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_clientes`, `Nombre`, `Identificacion`, `Correo`, `Telefono`, `Ciudad`) VALUES
(1, 'Yemail Arquitectura .SAS', '900815595', 'compras@yemailarq.com', '200 98 68', 'Bogotá DC'),
(4, 'Summa Constructora .SAS', '32667', 'comercial@constructorasumma.com', '383 0300', 'Bogotá DC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compras` int(11) NOT NULL,
  `Unidades` int(50) NOT NULL,
  `Valor_compra` decimal(10,0) NOT NULL,
  `Proveedor` varchar(255) NOT NULL,
  `Producto` varchar(255) NOT NULL,
  `Referencia` varchar(50) NOT NULL,
  `fo_id_contabilidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compras`, `Unidades`, `Valor_compra`, `Proveedor`, `Producto`, `Referencia`, `fo_id_contabilidad`) VALUES
(2, 25, 4000, 'Grupo ferretero GENMAR .LTDA', 'Disco de corte para concreto 4 1/2\"', 'DIS-002', NULL),
(3, 25, 32000, 'Ferrestar de Colombia .SAS', 'Martillo de bola 24 oz', 'MAR-002', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contabilidad`
--

CREATE TABLE `contabilidad` (
  `id_contabilidad` int(11) NOT NULL,
  `Ingresos` double(18,2) NOT NULL,
  `Egresos` double(18,2) NOT NULL,
  `Activos` double(18,2) NOT NULL,
  `Pasivos` double(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contabilidad`
--

INSERT INTO `contabilidad` (`id_contabilidad`, `Ingresos`, `Egresos`, `Activos`, `Pasivos`, `fo_id_ventas`) VALUES
(1, 555555.00, 586936.00, 25634.00, 256455.00, NULL),
(2, 500000.00, 623000.00, 1160000.00, 10000000.00, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Apellido` varchar(255) NOT NULL,
  `Direccion` varchar(255) NOT NULL,
  `Telefono` varchar(255) NOT NULL,
  `Correo` varchar(255) NOT NULL,
  `fo_id_administracion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `Nombre`, `Apellido`, `Direccion`, `Telefono`, `Correo`, `fo_id_administracion`) VALUES
(1, 'Shirley', 'Buitrago', 'calle 33 # 12 - 34 ', '231 3625', 'shir@gmail.com', NULL),
(2, 'Wilson', 'Ortiz', 'calle 21 sur # 72 - 89', '312374690', 'Wilson_ort@gmail.com', NULL),
(3, 'Ana Maria', 'Martinez Benjumea', 'calle 81 # 56 - 25', '344 5656', 'anma_benju@hot.com', NULL),
(4, 'Maria Cecilia', 'Vanegas Moreno', 'Carrera 68 # 36 - 59 ', '711 8596', 'mavanmo@outlook.com', NULL),
(14, 'Ferreteria ', 'Ferreteria jiji', '123456789', '3838', 'ferreteria@ferreteria.com', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_inventario` int(11) NOT NULL,
  `Producto` varchar(255) NOT NULL,
  `Cantidad` varchar(50) NOT NULL,
  `Precio` decimal(11,0) NOT NULL,
  `Referencia` varchar(255) NOT NULL,
  `Proveedor` varchar(255) NOT NULL,
  `fo_id_soporte` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_inventario`, `Producto`, `Cantidad`, `Precio`, `Referencia`, `Proveedor`, `fo_id_soporte`) VALUES
(1, 'Alicate universal', '2', 25000, 'ALI-001', 'Ferretek .SAS', NULL),
(2, 'Broca para concreto 6 mm', '15', 3500, 'BRO-001', 'Ferrestar de Colombia .SAS', NULL),
(3, 'Cinta métrica 5m', '20', 18000, 'CIN-001', 'Grupo ferretero GENMAR .LTDA', NULL),
(4, 'Compresor de aire 50L', '10', 850000, 'COM-001', 'Ferretek .SAS', NULL),
(5, 'Disco de corte para concreto 4 1/2\"', '12', 4200, 'DIS-002', 'Grupo ferretero GENMAR .LTDA', NULL),
(15, 'cepillos', '13', 2000, '177', 'oxxo', NULL),
(16, 'pala', '52', 25000, 'de construccion', 'duccker', NULL),
(17, 'esferos', '100', 1500, 'azul', 'vic', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Telefono` varchar(50) NOT NULL,
  `Correo` varchar(255) NOT NULL,
  `Direccion` varchar(255) NOT NULL,
  `Nit` varchar(255) NOT NULL,
  `fo_id_inventario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `Nombre`, `Telefono`, `Correo`, `Direccion`, `Nit`, `fo_id_inventario`) VALUES
(1, 'Ferrestar de Colombia .SAS', '605 4845', 'comercial1@ferrestardecolombia.com', 'Cra 28 #11-67 of 708', '900171128', NULL),
(2, 'FerreteriaJRC .Cia .LTDA', '201 2585', 'ventas@ferreteriajrc.com', 'Carrera 22 No. 18 - 43\r\n', '155454-5', NULL),
(3, 'Grupo ferretero GENMAR .LTDA', '653 4585', 'ventas@grupoferreterogenmar.com', 'Av. Nacional 40 # 52 - 63', '9016351249', NULL),
(4, 'Ferretek .SAS', '988 8580', 'comercial@ferretek.com.co', 'CARRERA 33 # 19 A - 35', '9002652410', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soporte_tecnico`
--

CREATE TABLE `soporte_tecnico` (
  `id_soporte` int(11) NOT NULL,
  `Incidencia` varchar(255) NOT NULL,
  `Tecnico` varchar(255) NOT NULL,
  `Solucion` varchar(255) NOT NULL,
  `fo_id_administracion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `soporte_tecnico`
--

INSERT INTO `soporte_tecnico` (`id_soporte`, `Incidencia`, `Tecnico`, `Solucion`, `fo_id_administracion`) VALUES
(3, 'Sistema caido', 'Wilson Ortiz', 'Reinicio forzado', NULL),
(5, 'Falla General', 'Maria Vanegas', 'Reinicio y reinstalación de controladores', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(10) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Telefono` int(15) NOT NULL,
  `Cargo` varchar(50) NOT NULL,
  `Documento` int(15) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `fo_id_administracion` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `Nombre`, `Apellido`, `Correo`, `Telefono`, `Cargo`, `Documento`, `clave`, `fo_id_administracion`) VALUES
(1, 'Shirley', 'Buitrago', 'shir@gmail.com', 1234568, 'Administrador', 12304, '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL),
(2, 'Wilson', 'Ortiz', 'wil82@gmail.com', 1234567, 'Tecnico Soporte', 7932564, '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL),
(3, 'Maria ', 'Vanegas', 'mavanmo@outlook.com', 5645263, 'Técnico Soporte', 125633654, '69c5fcebaa65b560eaf06c3fbeb481ae44b8d618', NULL),
(17, 'wilson ', 'ortiz', 'wilsonao@hotmail.com', 312364, 'tecnico', 789456123, '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_ventas` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Productos` varchar(255) NOT NULL,
  `Cantidad` varchar(255) NOT NULL,
  `Precio` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_ventas`, `Fecha`, `Productos`, `Cantidad`, `Precio`) VALUES
(25, '2025-03-05', 'esferos,cepillos,pala,Broca para concreto 6 mm,Compresor de aire 50L', '5', 5000),
(26, '2025-03-08', 'pala', '23', 7800),
(29, '2025-03-08', 'metro', '3', 6000),
(30, '2025-03-08', 'pala', '1', 0),
(31, '2025-03-08', 'Alicate universal', '1', 0),
(32, '2025-03-10', 'Alicate universal', '1', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administracion`
--
ALTER TABLE `administracion`
  ADD PRIMARY KEY (`id_administracion`),
  ADD KEY `fo_id_contabilidad` (`fo_id_contabilidad`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_clientes`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compras`),
  ADD KEY `fo_id_contabilidad` (`fo_id_contabilidad`);

--
--
-- Indices de la tabla `contabilidad`
--
ALTER TABLE `contabilidad`
  ADD PRIMARY KEY (`id_contabilidad`);
--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `fo_id_administracion` (`fo_id_administracion`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_inventario`),
  ADD KEY `fo_id_soporte` (`fo_id_soporte`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD KEY `fo_id_inventario` (`fo_id_inventario`);

--
-- Indices de la tabla `soporte_tecnico`
--
ALTER TABLE `soporte_tecnico`
  ADD PRIMARY KEY (`id_soporte`),
  ADD KEY `fo_id_administracion` (`fo_id_administracion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`),
  ADD KEY `fo_id_administracion` (`fo_id_administracion`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_ventas`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administracion`
--
ALTER TABLE `administracion`
  MODIFY `id_administracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_clientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `contabilidad`
--
ALTER TABLE `contabilidad`
  MODIFY `id_contabilidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `soporte_tecnico`
--
ALTER TABLE `soporte_tecnico`
  MODIFY `id_soporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_ventas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administracion`
--
ALTER TABLE `administracion`
  ADD CONSTRAINT `fk_administracion_contabilidad` FOREIGN KEY (`fo_id_contabilidad`) REFERENCES `contabilidad` (`id_contabilidad`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_compras_contabilidad` FOREIGN KEY (`fo_id_contabilidad`) REFERENCES `contabilidad` (`id_contabilidad`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_empleado_administracion` FOREIGN KEY (`fo_id_administracion`) REFERENCES `administracion` (`id_administracion`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `fk_inventario_soporte` FOREIGN KEY (`fo_id_soporte`) REFERENCES `soporte_tecnico` (`id_soporte`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `fk_proveedor_inventario` FOREIGN KEY (`fo_id_inventario`) REFERENCES `inventario` (`id_inventario`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `soporte_tecnico`
--
ALTER TABLE `soporte_tecnico`
  ADD CONSTRAINT `fk_soporte_administracion` FOREIGN KEY (`fo_id_administracion`) REFERENCES `administracion` (`id_administracion`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_administracion` FOREIGN KEY (`fo_id_administracion`) REFERENCES `administracion` (`id_administracion`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
