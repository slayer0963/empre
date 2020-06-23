-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2020 a las 20:12:27
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

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
-- Estructura de tabla para la tabla `address`
--

CREATE TABLE `address` (
  `id_add` int(11) NOT NULL,
  `id_cl` int(11) DEFAULT NULL,
  `addr` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assignment_details_general`
--

CREATE TABLE `assignment_details_general` (
  `id_prices` int(11) DEFAULT NULL,
  `id_color` int(11) DEFAULT NULL,
  `id_material` int(11) DEFAULT NULL,
  `id_size` int(11) DEFAULT NULL,
  `img` varchar(150) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `extraprice` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `state` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assignment_prices_object`
--

CREATE TABLE `assignment_prices_object` (
  `id_prices` int(11) NOT NULL,
  `id_pro` int(11) DEFAULT NULL,
  `pur_price` float DEFAULT NULL,
  `sal_price` float DEFAULT NULL,
  `state_prices_pro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `assignment_prices_object`
--

INSERT INTO `assignment_prices_object` (`id_prices`, `id_pro`, `pur_price`, `sal_price`, `state_prices_pro`) VALUES
(1, 2, 2, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assignment_probus`
--

CREATE TABLE `assignment_probus` (
  `id_assprob` int(11) NOT NULL,
  `id_bus` int(11) DEFAULT NULL,
  `id_pro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `assignment_probus`
--

INSERT INTO `assignment_probus` (`id_assprob`, `id_bus`, `id_pro`) VALUES
(1, 1, 1),
(2, 2, 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `business`
--

INSERT INTO `business` (`id_bus`, `name_bus`, `pic_logo_bus`, `id_user`, `state_bus`) VALUES
(1, 'SERTRACEN', 'tarjeta.jpg', 1, 1),
(2, 'Tipicos', 'noucamp.JPG', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_cat` int(11) NOT NULL,
  `name_cat` varchar(250) DEFAULT NULL,
  `state_cat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id_cat`, `name_cat`, `state_cat`) VALUES
(1, 'Calzado', 1),
(2, 'Bisuteria', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id_cl` int(11) NOT NULL,
  `fullname_cl` varchar(500) DEFAULT NULL,
  `imagen` varchar(500) DEFAULT NULL,
  `email_cl` varchar(150) DEFAULT NULL,
  `user_cl` varchar(30) DEFAULT NULL,
  `pass_cl` varchar(30) DEFAULT NULL,
  `state_cl` int(11) DEFAULT NULL,
  `idservices` varchar(250) DEFAULT NULL,
  `services` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `id_color` int(11) NOT NULL,
  `code_color` varchar(16) DEFAULT NULL,
  `name_color` varchar(150) DEFAULT NULL,
  `state_color` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`id_color`, `code_color`, `name_color`, `state_color`) VALUES
(1, '#2a8d5f', 'Verde', 1),
(2, '#17159e', 'Azul', 1),
(3, '#0d0d0d', 'Negro', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact`
--

CREATE TABLE `contact` (
  `id_con` int(11) NOT NULL,
  `id_cl` int(11) DEFAULT NULL,
  `contac` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `id_mat` int(11) NOT NULL,
  `name_mat` varchar(150) DEFAULT NULL,
  `state_mat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`id_mat`, `name_mat`, `state_mat`) VALUES
(1, 'Cuero', 1),
(2, 'Madera', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id_pro`, `name_pro`, `descr_pro`, `id_cat`, `id_tpro`, `state_pro`) VALUES
(1, 'Zapatos', 'Buen zapato de gran calidad', 1, 1, 1),
(2, 'Pastelitos', 'Deliciosos', 2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_rating`
--

CREATE TABLE `product_rating` (
  `id_prra` int(11) NOT NULL,
  `id_cl` int(11) DEFAULT NULL,
  `id_pro` int(11) DEFAULT NULL,
  `rating` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id_prev` int(11) NOT NULL,
  `id_cl` int(11) DEFAULT NULL,
  `id_pro` int(11) DEFAULT NULL,
  `coment` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_type`
--

CREATE TABLE `product_type` (
  `id_tpro` int(11) NOT NULL,
  `name_tpro` varchar(250) DEFAULT NULL,
  `state_tpro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product_type`
--

INSERT INTO `product_type` (`id_tpro`, `name_tpro`, `state_tpro`) VALUES
(1, 'Objeto', 1),
(2, 'Comida', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id_shp_c` int(11) NOT NULL,
  `id_cl` int(11) DEFAULT NULL,
  `total_amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shopping_cart_details`
--

CREATE TABLE `shopping_cart_details` (
  `id_shp_c_d` int(11) NOT NULL,
  `id_shp_c` int(11) DEFAULT NULL,
  `id_prices` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sizes`
--

CREATE TABLE `sizes` (
  `id_size` int(11) NOT NULL,
  `number_size` float DEFAULT NULL,
  `name_size` varchar(150) DEFAULT NULL,
  `state_size` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sizes`
--

INSERT INTO `sizes` (`id_size`, `number_size`, `name_size`, `state_size`) VALUES
(1, 40, 'L', 1),
(2, 42, 'XL', 1);

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
  `state_user` int(11) DEFAULT NULL,
  `idservices` varchar(250) DEFAULT NULL,
  `services` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `fullname_user`, `phone_user`, `imagen`, `email_user`, `user_user`, `pass_user`, `id_ustp`, `state_user`, `idservices`, `services`) VALUES
(1, 'Moises Rivera', '22577777', '736277_584256111590945_817041861_o.jpg', 'moisesrivera796@gmail.com', 'moises796', '123', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_type`
--

CREATE TABLE `user_type` (
  `id_ustp` int(11) NOT NULL,
  `name_ustp` varchar(250) DEFAULT NULL,
  `state_ustp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_type`
--

INSERT INTO `user_type` (`id_ustp`, `name_ustp`, `state_ustp`) VALUES
(1, 'Administrador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wish_list`
--

CREATE TABLE `wish_list` (
  `id_w_l` int(11) NOT NULL,
  `id_cl` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wish_list_details`
--

CREATE TABLE `wish_list_details` (
  `id_w_l_d` int(11) NOT NULL,
  `id_w_l` int(11) DEFAULT NULL,
  `id_prices` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id_add`),
  ADD KEY `id_cl` (`id_cl`);

--
-- Indices de la tabla `assignment_details_general`
--
ALTER TABLE `assignment_details_general`
  ADD KEY `id_prices` (`id_prices`),
  ADD KEY `id_color` (`id_color`),
  ADD KEY `id_material` (`id_material`),
  ADD KEY `id_size` (`id_size`);

--
-- Indices de la tabla `assignment_prices_object`
--
ALTER TABLE `assignment_prices_object`
  ADD PRIMARY KEY (`id_prices`),
  ADD KEY `id_pro` (`id_pro`);

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
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_cl`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_color`);

--
-- Indices de la tabla `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_con`),
  ADD KEY `id_cl` (`id_cl`);

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
-- Indices de la tabla `product_rating`
--
ALTER TABLE `product_rating`
  ADD PRIMARY KEY (`id_prra`),
  ADD KEY `id_cl` (`id_cl`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Indices de la tabla `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id_prev`),
  ADD KEY `id_cl` (`id_cl`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Indices de la tabla `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id_tpro`);

--
-- Indices de la tabla `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id_shp_c`),
  ADD KEY `id_cl` (`id_cl`);

--
-- Indices de la tabla `shopping_cart_details`
--
ALTER TABLE `shopping_cart_details`
  ADD PRIMARY KEY (`id_shp_c_d`),
  ADD KEY `id_shp_c` (`id_shp_c`),
  ADD KEY `id_prices` (`id_prices`);

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
  ADD KEY `id_ustp` (`id_ustp`);

--
-- Indices de la tabla `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id_ustp`);

--
-- Indices de la tabla `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`id_w_l`),
  ADD KEY `id_cl` (`id_cl`);

--
-- Indices de la tabla `wish_list_details`
--
ALTER TABLE `wish_list_details`
  ADD PRIMARY KEY (`id_w_l_d`),
  ADD KEY `id_w_l` (`id_w_l`),
  ADD KEY `id_prices` (`id_prices`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `address`
--
ALTER TABLE `address`
  MODIFY `id_add` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `assignment_prices_object`
--
ALTER TABLE `assignment_prices_object`
  MODIFY `id_prices` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `assignment_probus`
--
ALTER TABLE `assignment_probus`
  MODIFY `id_assprob` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id_cl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `contact`
--
ALTER TABLE `contact`
  MODIFY `id_con` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `id_mat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `product_rating`
--
ALTER TABLE `product_rating`
  MODIFY `id_prra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id_prev` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id_tpro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id_shp_c` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `shopping_cart_details`
--
ALTER TABLE `shopping_cart_details`
  MODIFY `id_shp_c_d` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id_ustp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id_w_l` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `wish_list_details`
--
ALTER TABLE `wish_list_details`
  MODIFY `id_w_l_d` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`id_cl`) REFERENCES `clients` (`id_cl`);

--
-- Filtros para la tabla `assignment_details_general`
--
ALTER TABLE `assignment_details_general`
  ADD CONSTRAINT `assignment_details_general_ibfk_1` FOREIGN KEY (`id_prices`) REFERENCES `assignment_prices_object` (`id_prices`),
  ADD CONSTRAINT `assignment_details_general_ibfk_2` FOREIGN KEY (`id_color`) REFERENCES `color` (`id_color`),
  ADD CONSTRAINT `assignment_details_general_ibfk_3` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_mat`),
  ADD CONSTRAINT `assignment_details_general_ibfk_4` FOREIGN KEY (`id_size`) REFERENCES `sizes` (`id_size`);

--
-- Filtros para la tabla `assignment_prices_object`
--
ALTER TABLE `assignment_prices_object`
  ADD CONSTRAINT `assignment_prices_object_ibfk_1` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id_pro`);

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
-- Filtros para la tabla `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`id_cl`) REFERENCES `clients` (`id_cl`);

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`id_cat`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_tpro`) REFERENCES `product_type` (`id_tpro`);

--
-- Filtros para la tabla `product_rating`
--
ALTER TABLE `product_rating`
  ADD CONSTRAINT `product_rating_ibfk_1` FOREIGN KEY (`id_cl`) REFERENCES `clients` (`id_cl`),
  ADD CONSTRAINT `product_rating_ibfk_2` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id_pro`);

--
-- Filtros para la tabla `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_ibfk_1` FOREIGN KEY (`id_cl`) REFERENCES `clients` (`id_cl`),
  ADD CONSTRAINT `product_reviews_ibfk_2` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id_pro`);

--
-- Filtros para la tabla `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`id_cl`) REFERENCES `clients` (`id_cl`);

--
-- Filtros para la tabla `shopping_cart_details`
--
ALTER TABLE `shopping_cart_details`
  ADD CONSTRAINT `shopping_cart_details_ibfk_1` FOREIGN KEY (`id_shp_c`) REFERENCES `shopping_cart` (`id_shp_c`),
  ADD CONSTRAINT `shopping_cart_details_ibfk_2` FOREIGN KEY (`id_prices`) REFERENCES `assignment_prices_object` (`id_prices`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_ustp`) REFERENCES `user_type` (`id_ustp`);

--
-- Filtros para la tabla `wish_list`
--
ALTER TABLE `wish_list`
  ADD CONSTRAINT `wish_list_ibfk_1` FOREIGN KEY (`id_cl`) REFERENCES `clients` (`id_cl`);

--
-- Filtros para la tabla `wish_list_details`
--
ALTER TABLE `wish_list_details`
  ADD CONSTRAINT `wish_list_details_ibfk_1` FOREIGN KEY (`id_w_l`) REFERENCES `wish_list` (`id_w_l`),
  ADD CONSTRAINT `wish_list_details_ibfk_2` FOREIGN KEY (`id_prices`) REFERENCES `assignment_prices_object` (`id_prices`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
