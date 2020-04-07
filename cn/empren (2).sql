-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-04-2020 a las 22:59:42
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empren`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assignment_prices_material`
--

CREATE TABLE `assignment_prices_material` (
  `id_apm` int(11) NOT NULL,
  `id_mat` int(11) DEFAULT NULL,
  `id_prices` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assignment_prices_object`
--

CREATE TABLE `assignment_prices_object` (
  `id_prices` int(11) NOT NULL,
  `id_pro` int(11) DEFAULT NULL,
  `id_color` int(11) DEFAULT NULL,
  `pur_price` float DEFAULT NULL,
  `sal_price` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `state_prices_pro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assignment_prices_sizes`
--

CREATE TABLE `assignment_prices_sizes` (
  `id_aps` int(11) NOT NULL,
  `id_size` int(11) DEFAULT NULL,
  `id_prices` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assignment_probus`
--

CREATE TABLE `assignment_probus` (
  `id_assprob` int(11) NOT NULL,
  `id_bus` int(11) DEFAULT NULL,
  `id_pro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `assignment_probus`
--

INSERT INTO `assignment_probus` (`id_assprob`, `id_bus`, `id_pro`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `business`
--

CREATE TABLE `business` (
  `id_bus` int(11) NOT NULL,
  `name_bus` varchar(250) DEFAULT NULL,
  `pic_logo_bus` varchar(500) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `state_bus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `business`
--

INSERT INTO `business` (`id_bus`, `name_bus`, `pic_logo_bus`, `id_user`, `state_bus`) VALUES
(1, 'LARIBE', 'mar-bajo-niebla_5472x3648_xtrafondos.com.jpg', 1, 0),
(2, 'CLARIBE', 'ballena-en-el-oceano_3838x2160_xtrafondos.com.jpg', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_cat` int(11) NOT NULL,
  `name_cat` varchar(250) DEFAULT NULL,
  `state_cat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id_cat`, `name_cat`, `state_cat`) VALUES
(1, 'Calzado', 0),
(2, 'Moda', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `id_color` int(11) NOT NULL,
  `code_color` varchar(16) DEFAULT NULL,
  `name_color` varchar(150) DEFAULT NULL,
  `state_color` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`id_color`, `code_color`, `name_color`, `state_color`) VALUES
(1, '#191919', 'Negro', 1),
(2, '#004080', 'Azul', 1),
(3, '#ff0000', 'Rojo', 1),
(4, '#ff0080', 'Rosado', 1),
(5, '#ffff00', 'Amarillo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `id_mat` int(11) NOT NULL,
  `name_mat` varchar(150) DEFAULT NULL,
  `state_mat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`id_mat`, `name_mat`, `state_mat`) VALUES
(1, 'Tela', 1),
(2, 'Algodon', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id_pro` int(11) NOT NULL,
  `name_pro` varchar(250) DEFAULT NULL,
  `descr_pro` varchar(300) DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `id_tpro` int(11) DEFAULT NULL,
  `state_pro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id_pro`, `name_pro`, `descr_pro`, `id_cat`, `id_tpro`, `state_pro`) VALUES
(1, 'Nike', 'Año: 2020', 1, 3, 1),
(2, 'MIKE', 'GRANDE', 1, 3, 1),
(3, 'sadasd', 'sadasdasd', 1, 3, 1),
(4, 'lllllllllll', 'dsfdsfddsfdfdsf', 1, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_type`
--

CREATE TABLE `product_type` (
  `id_tpro` int(11) NOT NULL,
  `name_tpro` varchar(250) DEFAULT NULL,
  `state_tpro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `product_type`
--

INSERT INTO `product_type` (`id_tpro`, `name_tpro`, `state_tpro`) VALUES
(1, 'Ferreteria', 1),
(2, 'Comida', 1),
(3, 'Objetos', 1),
(4, 'asdasd', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sizes`
--

CREATE TABLE `sizes` (
  `id_size` int(11) NOT NULL,
  `number_size` float DEFAULT NULL,
  `name_size` varchar(150) DEFAULT NULL,
  `state_size` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sizes`
--

INSERT INTO `sizes` (`id_size`, `number_size`, `name_size`, `state_size`) VALUES
(1, 12, 'USA', 1),
(2, 14, 'UKA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `fullname_user` varchar(500) DEFAULT NULL,
  `phone_user` varchar(15) DEFAULT NULL,
  `imagen` varchar(500) DEFAULT NULL,
  `email_user` varchar(150) DEFAULT NULL,
  `user_user` varchar(30) DEFAULT NULL,
  `pass_user` varchar(30) DEFAULT NULL,
  `id_ustp` int(11) DEFAULT NULL,
  `state_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `fullname_user`, `phone_user`, `imagen`, `email_user`, `user_user`, `pass_user`, `id_ustp`, `state_user`) VALUES
(1, 'Juan Perez', '(503) 2257-7777', '11834734_1143605288989355_8211990350207519370_o.jpg', 'kmb124@live.com', 'pepe1236', '1232', 1, 1),
(2, 'Juanes', '(503) 2215-4556', 'omar.jpg', 'moisesrivera2012@hotmail.com', '123', '123', 3, 1),
(3, 'Juanes', '(503) 2215-4556', 'derecho.jpg', 'moisesrivera@hotmail.com', '123', '123', 3, 1),
(4, 'Momo153', '(503) 1234-4312', '740314_584256098257613_1968960693_o.jpg', 'moisesrivera2010@hotmail.com', '12333', '123', 3, 1),
(14, '11', '(503) 7777-7777', '12301738_1209656965717520_3414937646955594641_n.jpg', '11@gmail.com', '11', '11', 1, 1),
(15, 'Pedro Jose Alvarez Prudencio', '(503) 2257-6600', 'gray-bridge-and-trees-814499.jpg', 'pepe@gmail.com', 'pepe1', '123', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_type`
--

CREATE TABLE `user_type` (
  `id_ustp` int(11) NOT NULL,
  `name_ustp` varchar(250) DEFAULT NULL,
  `state_ustp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user_type`
--

INSERT INTO `user_type` (`id_ustp`, `name_ustp`, `state_ustp`) VALUES
(1, 'Supervisor', 0),
(2, 'Asistente', 1),
(3, 'Empleado', 1),
(4, 'Usuario', 1),
(5, 'Admin', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `assignment_prices_material`
--
ALTER TABLE `assignment_prices_material`
  ADD PRIMARY KEY (`id_apm`),
  ADD KEY `id_mat` (`id_mat`),
  ADD KEY `id_prices` (`id_prices`);

--
-- Indices de la tabla `assignment_prices_object`
--
ALTER TABLE `assignment_prices_object`
  ADD PRIMARY KEY (`id_prices`),
  ADD KEY `id_pro` (`id_pro`),
  ADD KEY `id_color` (`id_color`);

--
-- Indices de la tabla `assignment_prices_sizes`
--
ALTER TABLE `assignment_prices_sizes`
  ADD PRIMARY KEY (`id_aps`),
  ADD KEY `id_size` (`id_size`),
  ADD KEY `id_prices` (`id_prices`);

--
-- Indices de la tabla `assignment_probus`
--
ALTER TABLE `assignment_probus`
  ADD PRIMARY KEY (`id_assprob`),
  ADD KEY `id_bus` (`id_bus`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Indices de la tabla `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id_bus`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_color`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_mat`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_pro`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `id_tpro` (`id_tpro`);

--
-- Indices de la tabla `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id_tpro`);

--
-- Indices de la tabla `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id_size`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email_user_UNIQUE` (`email_user`),
  ADD KEY `id_ustp` (`id_ustp`);

--
-- Indices de la tabla `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id_ustp`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `assignment_prices_material`
--
ALTER TABLE `assignment_prices_material`
  MODIFY `id_apm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `assignment_prices_object`
--
ALTER TABLE `assignment_prices_object`
  MODIFY `id_prices` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `assignment_prices_sizes`
--
ALTER TABLE `assignment_prices_sizes`
  MODIFY `id_aps` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `assignment_probus`
--
ALTER TABLE `assignment_probus`
  MODIFY `id_assprob` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `business`
--
ALTER TABLE `business`
  MODIFY `id_bus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `id_mat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id_tpro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id_ustp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `assignment_prices_material`
--
ALTER TABLE `assignment_prices_material`
  ADD CONSTRAINT `assignment_prices_material_ibfk_1` FOREIGN KEY (`id_mat`) REFERENCES `material` (`id_mat`),
  ADD CONSTRAINT `assignment_prices_material_ibfk_2` FOREIGN KEY (`id_prices`) REFERENCES `assignment_prices_object` (`id_prices`);

--
-- Filtros para la tabla `assignment_prices_object`
--
ALTER TABLE `assignment_prices_object`
  ADD CONSTRAINT `assignment_prices_object_ibfk_1` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id_pro`),
  ADD CONSTRAINT `assignment_prices_object_ibfk_2` FOREIGN KEY (`id_color`) REFERENCES `color` (`id_color`);

--
-- Filtros para la tabla `assignment_prices_sizes`
--
ALTER TABLE `assignment_prices_sizes`
  ADD CONSTRAINT `assignment_prices_sizes_ibfk_1` FOREIGN KEY (`id_size`) REFERENCES `sizes` (`id_size`),
  ADD CONSTRAINT `assignment_prices_sizes_ibfk_2` FOREIGN KEY (`id_prices`) REFERENCES `assignment_prices_object` (`id_prices`);

--
-- Filtros para la tabla `assignment_probus`
--
ALTER TABLE `assignment_probus`
  ADD CONSTRAINT `assignment_probus_ibfk_1` FOREIGN KEY (`id_bus`) REFERENCES `business` (`id_bus`),
  ADD CONSTRAINT `assignment_probus_ibfk_2` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id_pro`);

--
-- Filtros para la tabla `business`
--
ALTER TABLE `business`
  ADD CONSTRAINT `business_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`id_cat`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_tpro`) REFERENCES `product_type` (`id_tpro`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_ustp`) REFERENCES `user_type` (`id_ustp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
