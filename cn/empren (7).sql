-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-08-2020 a las 01:09:56
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
-- Estructura de tabla para la tabla `address`
--

CREATE TABLE `address` (
  `id_add` int(11) NOT NULL,
  `id_cl` int(11) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `department` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `streetdir` varchar(500) DEFAULT NULL,
  `numberdir` varchar(45) DEFAULT NULL,
  `reference` varchar(500) DEFAULT NULL,
  `activestate` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `address`
--

INSERT INTO `address` (`id_add`, `id_cl`, `contact`, `department`, `city`, `streetdir`, `numberdir`, `reference`, `activestate`, `state`) VALUES
(1, 3, '(503) 7487-9715', 'San Miguel', 'San Miguel', 'Calle San Salvador', 'Casa #44', '', 1, 1),
(2, 3, '(503) 7487-9715', 'San Miguel', 'Chinameca', 'Calle Bolivar', 'Casa #5', 'Frente pizza huty', 0, 1);

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

--
-- Volcado de datos para la tabla `assignment_details_general`
--

INSERT INTO `assignment_details_general` (`id_prices`, `id_color`, `id_material`, `id_size`, `img`, `quantity`, `extraprice`, `discount`, `state`) VALUES
(1, 1, 2, 1, 'planeta-tierra-con-destello-de-luz_7251x4018_xtrafondos.com.jpg', 0, 2, 0.25, 1),
(1, 1, 2, 2, 'noche-cielo-estrellas-y-cometa_3840x2160_xtrafondos.com.jpg', 5, 1, 0.25, 1),
(2, 1, 1, 1, 'mar-bajo-niebla_5472x3648_xtrafondos.com.jpg', 84, 0, 0, 1),
(2, 1, 2, 1, 'gasadalur-islas-feroe_2560x1600_xtrafondos.com.jpg', 100, 1, 0, 1),
(2, 2, 1, 1, 'ballena-en-el-oceano_3838x2160_xtrafondos.com.jpg', 100, 1, 0, 1),
(3, 2, 1, 1, 'tierra-desde-el-espacio_3840x2160_xtrafondos.com.jpg', 72, 5, 0, 1),
(3, 3, 2, 2, 'gasadalur-islas-feroe_2560x1600_xtrafondos.com.jpg', 13, 34, 0.25, 1),
(4, 1, 1, 2, '4x4-desert-dust-golden-hour-1149066.jpg', 53, 23.23, 0, 1),
(9, 2, 2, 2, 'planeta-en-el-espacio_3840x2160_xtrafondos.com.jpg', 1, 23, 0.5, 1),
(3, 3, 4, 4, 'tierra-desde-el-espacio_3840x2160_xtrafondos.com.jpg', 25, 5, 0.2, 1),
(1, 3, 1, 1, '11834734_1143605288989355_8211990350207519370_o.jpg', 0, 0, 0.2, 1),
(3, 4, 2, 3, '740314_584256098257613_1968960693_o.jpg', 5, 0, 0.33, 1),
(1, 5, 2, 1, '736277_584256111590945_817041861_o.jpg', 1, 0, 0.2, 1),
(1, 5, 2, 3, '736277_584256111590945_817041861_o.jpg', 1, 0, 0.31, 1);

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
(1, 2, 2, 3, 1),
(2, 4, 25, 30, 1),
(3, 3, 5, 10, 1),
(4, 7, 23, 23, 1),
(5, 13, 23, 23, 1),
(6, 14, 23, 12, 1),
(7, 15, 23, 23, 1),
(8, 16, 23, 54, 1),
(9, 17, 23, 34, 1),
(10, 18, 23, 24, 1),
(11, 19, 23, 42, 1),
(12, 1, 25.55, 30, 1),
(13, 8, 5, 6, 1);

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
(2, 2, 2),
(3, 3, 4),
(4, 3, 3),
(5, 4, 5),
(6, 4, 6),
(7, 20, 7),
(8, 20, 13),
(9, 20, 14),
(10, 20, 15),
(11, 20, 16),
(12, 20, 17),
(13, 20, 18),
(14, 20, 19),
(15, 1, 8),
(16, 1, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `business`
--

CREATE TABLE `business` (
  `id_bus` int(11) NOT NULL,
  `name_bus` varchar(250) DEFAULT NULL,
  `pic_logo_bus` varchar(500) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `state_bus` int(11) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `business`
--

INSERT INTO `business` (`id_bus`, `name_bus`, `pic_logo_bus`, `id_user`, `state_bus`, `description`) VALUES
(1, 'SERTRACEN', 'tarjeta.jpg', 1, 1, 'asdasdasdasd'),
(2, 'Tipicos', 'noucamp.JPG', 1, 1, 'adsasdasd'),
(3, 'LARIBE', 'planeta-en-el-espacio_3840x2160_xtrafondos.com.jpg', 3, 1, 'dfsfdsfsdfsd dsfsdfsd sdfsdfdsfsdfdsf 234sqdasd'),
(4, 'MMMM', 'ballena-en-el-oceano_3838x2160_xtrafondos.com.jpg', 2, 1, 'dfsfdsfsdfsd dsfsdfsd sdfsdfdsfsdfdsf 234sqdasd'),
(20, 'RIOT3', 'tierra-desde-el-espacio_3840x2160_xtrafondos.com.jpg', 3, 1, 'dfsfdsfsdfsd dsfsdfsd sdfsdfdsfsdfdsf'),
(21, 'Fornite', 'tierra-desde-el-espacio_3840x2160_xtrafondos.com.jpg', 3, 1, 'dfsfdsfsdfsd dsfsdfsd sdfsdfdsfasdasd asdasdasd'),
(22, 'Warzone', '4x4-desert-dust-golden-hour-1149066.jpg', 3, 1, 'war'),
(23, 'Activision', 'ballena-en-el-oceano_3838x2160_xtrafondos.com.jpg', 3, 1, 'dfsfdsfsdfsd dsfsdfsd sdfsdfdsfasdasd asdasdasd'),
(24, 'wwwww', 'planeta-en-el-espacio_3840x2160_xtrafondos.com.jpg', 3, 1, 'sadasdasd asdasdasdsad'),
(25, 'larive v2 ds', 'noche-cielo-estrellas-y-cometa_3840x2160_xtrafondos.com.jpg', 4, 1, 'LARIVE ASDASD 123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_cat` int(11) NOT NULL,
  `name_cat` varchar(250) DEFAULT NULL,
  `state_cat` int(11) DEFAULT NULL,
  `logo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id_cat`, `name_cat`, `state_cat`, `logo`) VALUES
(1, 'Calzado', 1, 'shos.PNG'),
(2, 'Bisuteria', 1, 'limpieza.PNG'),
(3, 'KKKK', 1, 'ring.PNG');

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

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id_cl`, `fullname_cl`, `imagen`, `email_cl`, `user_cl`, `pass_cl`, `state_cl`, `idservices`, `services`) VALUES
(1, 'cliente potencial', 'tierra-desde-el-espacio_3840x2160_xtrafondos.com.jpg', 'cliente@gmail.com', 'client', '1234', 1, '', ''),
(2, 'COMPRADOR', 'estrellas-en-el-universo-morado_3000x2000_xtrafondos.com.jpg', 'compra@todo.com', 'compra', '123', 1, '', ''),
(3, 'Masizo', '10669042_918121591546126_1889247225428879342_o.jpg', 'kmb124@live.com', 'masize', '123', 1, '', '');

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
(3, '#0d0d0d', 'Negro', 1),
(4, '#ffd500', 'Amarillo', 1),
(5, '#f50000', 'rojo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact`
--

CREATE TABLE `contact` (
  `id_con` int(11) NOT NULL,
  `id_cl` int(11) DEFAULT NULL,
  `contac` varchar(15) DEFAULT NULL,
  `activestate` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL
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
(2, 'Madera', 1),
(3, 'asdasdasd', 1),
(4, 'Plastico', 1);

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
(2, 'Pastelitos', 'Deliciosos', 2, 2, 1),
(3, 'Cadenas', 'Bonitas buena calidad', 2, 1, 1),
(4, 'Juego de aritos', 'Totalmente hechos a mano', 2, 1, 1),
(5, 'asdasdasd2323', 'asdsadasdsad', 1, 1, 1),
(6, 'adasdasd2444', 'asdasdasdsa', 1, 2, 1),
(7, 'sadas32323', 'asdasd', 1, 1, 1),
(8, 'LLLLLL', 'sdsadasd', 1, 2, 1),
(9, 'asdasd', 'asdasdas', 1, 1, 1),
(10, 'asdasd', 'asdasdas', 1, 1, 1),
(11, 'asdasd', 'asdasdas', 1, 1, 1),
(12, 'asdasd', 'asdasdas', 1, 1, 1),
(13, 'asdasdasd', 'asdasdasdsa', 2, 2, 1),
(14, 'mmmmmm', 'aaaaaaaaa', 1, 2, 1),
(15, 'kkkkk', 'sdaasdasdasd', 1, 2, 1),
(16, 'ssssssss', 'sssssss', 1, 2, 1),
(17, 'cxxzczxczxc', 'asdasdasdasd', 1, 2, 1),
(18, 'A2', 'asdasdasd', 1, 2, 1),
(19, 'vvvvv', 'xxxxxxxx', 2, 2, 1),
(20, 'Calzones', 'Comodos', 2, 1, 1);

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

--
-- Volcado de datos para la tabla `product_rating`
--

INSERT INTO `product_rating` (`id_prra`, `id_cl`, `id_pro`, `rating`) VALUES
(1, 1, 4, 4.5),
(2, 1, 4, 2),
(3, 1, 4, 1.7),
(4, 2, 4, 4.8),
(5, 2, 4, 0.4),
(6, 2, 4, 0.5),
(7, 2, 4, 1.9),
(8, 1, 3, 4.1),
(9, 1, 3, 2.4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id_prev` int(11) NOT NULL,
  `id_cl` int(11) DEFAULT NULL,
  `id_pro` int(11) DEFAULT NULL,
  `coment` varchar(250) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `state_prev` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product_reviews`
--

INSERT INTO `product_reviews` (`id_prev`, `id_cl`, `id_pro`, `coment`, `likes`, `state_prev`) VALUES
(1, 1, 4, 'asdasdasdasdasd', 0, 1),
(2, 1, 4, 'COMA MIERDA GRAN CULERO', 0, 1),
(3, 1, 4, 'COMA MIERDA', 0, 1),
(4, 2, 4, 'QUE WUEN PRODUCTO', 0, 1),
(5, 2, 4, 'VALE VERGA QUE ASCO', 0, 1),
(6, 2, 4, 'asdasdsadsadsadasd', 0, 1),
(7, 2, 4, 'dsadsadasdasdasd', 0, 1),
(8, 1, 3, 'asdasdsad', 0, 1),
(9, 1, 3, 'Fuck you man', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_type`
--

CREATE TABLE `product_type` (
  `id_tpro` int(11) NOT NULL,
  `name_tpro` varchar(250) DEFAULT NULL,
  `state_tpro` int(11) DEFAULT NULL,
  `logo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product_type`
--

INSERT INTO `product_type` (`id_tpro`, `name_tpro`, `state_tpro`, `logo`) VALUES
(1, 'Objeto', 1, 'obj.PNG'),
(2, 'Comida', 1, 'comida.PNG'),
(3, 'xzzzzz', 1, 'shos.PNG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id_shp_c` int(11) NOT NULL,
  `id_cl` int(11) DEFAULT NULL,
  `total_amount` float DEFAULT NULL,
  `state` int(11) NOT NULL,
  `datesold` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `shopping_cart`
--

INSERT INTO `shopping_cart` (`id_shp_c`, `id_cl`, `total_amount`, `state`, `datesold`) VALUES
(6, 1, 0, 1, '2020-07-25 15:40:27'),
(7, 1, 0, 1, '2020-07-25 15:43:08'),
(8, 1, 0, 1, '2020-07-25 15:47:39'),
(9, 1, 0, 1, '2020-07-25 15:49:16'),
(10, 1, 0, 1, '2020-07-25 15:52:48'),
(11, 1, 0, 1, '2020-07-25 15:53:24'),
(12, 1, 0, 1, '2020-07-25 15:54:35'),
(13, 1, 0, 1, '2020-07-25 15:58:51'),
(14, 1, 0, 1, '2020-07-25 16:00:33'),
(15, 1, 0, 1, '2020-07-25 16:02:04'),
(16, 1, 0, 1, '2020-07-25 16:05:50'),
(17, 1, 0, 1, '2020-07-27 19:01:28'),
(18, 1, 0, 1, '2020-07-27 19:44:27'),
(19, 1, 0, 1, '2020-07-27 19:45:34'),
(20, 1, 0, 1, '2020-07-27 19:46:52'),
(21, 1, 0, 1, '2020-07-27 19:47:54'),
(22, 1, 0, 1, '2020-07-27 19:54:34'),
(23, 1, 0, 1, '2020-07-27 20:51:07'),
(24, 1, 0, 1, '2020-07-27 20:51:43'),
(25, 1, 0, 1, '2020-07-28 00:07:54'),
(26, 1, 0, 1, '2020-07-28 00:15:02'),
(27, 1, 0, 1, '2020-07-28 00:16:02'),
(28, 1, 0, 1, '2020-07-28 12:13:27'),
(29, 1, 0, 1, '2020-07-28 12:13:55'),
(30, 2, 0, 1, '2020-07-30 20:19:43'),
(31, 1, 0, 1, '2020-07-31 12:23:16'),
(32, 1, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shopping_cart_details`
--

CREATE TABLE `shopping_cart_details` (
  `id_shp_c_d` int(11) NOT NULL,
  `id_shp_c` int(11) DEFAULT NULL,
  `id_prices` int(11) DEFAULT NULL,
  `id_color` int(11) DEFAULT NULL,
  `id_mat` int(11) DEFAULT NULL,
  `id_size` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `descuento` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `shopping_cart_details`
--

INSERT INTO `shopping_cart_details` (`id_shp_c_d`, `id_shp_c`, `id_prices`, `id_color`, `id_mat`, `id_size`, `quantity`, `precio`, `descuento`) VALUES
(19, 6, 3, 3, 2, 2, 2, 33, 0.25),
(20, 6, 2, 1, 1, 1, 5, 30, 0),
(21, 6, 2, 2, 1, 1, 1, 29.45, 0.05),
(22, 7, 3, 3, 2, 2, 1, 33, 0.25),
(23, 7, 3, 2, 1, 1, 1, 15, 0),
(24, 8, 3, 2, 1, 1, 1, 15, 0),
(25, 9, 3, 2, 1, 1, 1, 15, 0),
(26, 10, 3, 2, 1, 1, 1, 15, 0),
(27, 11, 3, 2, 1, 1, 1, 15, 0),
(28, 12, 3, 2, 1, 1, 1, 15, 0),
(29, 13, 3, 2, 1, 1, 1, 15, 0),
(30, 14, 3, 2, 1, 1, 1, 15, 0),
(31, 15, 3, 2, 1, 1, 1, 15, 0),
(32, 16, 3, 2, 1, 1, 1, 15, 0),
(33, 17, 4, 1, 1, 2, 1, 46.23, 0),
(34, 17, 9, 2, 2, 2, 1, 28.5, 0.5),
(35, 17, 1, 1, 2, 1, 1, 3.75, 0.25),
(36, 17, 1, 3, 1, 1, 1, 2.4, 0.2),
(37, 18, 4, 1, 1, 2, 9, 46.23, 0),
(38, 19, 4, 1, 1, 2, 11, 46.23, 0),
(39, 20, 4, 1, 1, 2, 5, 46.23, 0),
(40, 21, 3, 2, 1, 1, 20, 15, 0),
(45, 22, 1, 1, 2, 1, 11, 3.75, 0.25),
(46, 23, 2, 1, 1, 1, 20, 30, 0),
(47, 24, 3, 3, 2, 2, 4, 33, 0.25),
(49, 25, 9, 2, 2, 2, 21, 28.5, 0.5),
(50, 26, 4, 1, 1, 2, 17, 46.23, 0),
(51, 27, 4, 1, 1, 2, 1, 46.23, 0),
(52, 28, 2, 1, 1, 1, 20, 30, 0),
(53, 29, 3, 2, 1, 1, 40, 15, 0),
(55, 30, 3, 2, 1, 1, 28, 15, 0),
(56, 31, 2, 1, 1, 1, 16, 30, 0),
(57, 32, 3, 2, 1, 1, 7, 15, 0);

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
(2, 42, 'XL', 1),
(3, 23, 'XL', 1),
(4, 8, 'M', 1);

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
(1, 'Moises Rivera', '22577777', '736277_584256111590945_817041861_o.jpg', 'moisesrivera796@gmail.com', 'moises796', '123', 1, 1, NULL, NULL),
(2, 'Gerardo landos', '(503) 2204-0845', 'planeta-tierra-con-destello-de-luz_7251x4018_xtrafondos.com.jpg', 'landos112@gmail.com', 'admin', '123', 1, 1, '', ''),
(3, 'Gerardo Erazo', '(503) 2222-2222', 'mar-bajo-niebla_5472x3648_xtrafondos.com.jpg', 'landos110@gmail.com', 'user', '123', 2, 1, '', ''),
(4, 'eeeee', '(503) 2222-2222', 'ballena-en-el-oceano_3838x2160_xtrafondos.com.jpg', 'asdasd@asdasdsad.com', 'user1', '123', 2, 1, '', '');

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
(1, 'Administrador', 1),
(2, 'Usuario', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wish_list`
--

CREATE TABLE `wish_list` (
  `id_w_l` int(11) NOT NULL,
  `id_cl` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `wish_list`
--

INSERT INTO `wish_list` (`id_w_l`, `id_cl`, `state`) VALUES
(1, 1, 0),
(2, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wish_list_details`
--

CREATE TABLE `wish_list_details` (
  `id_w_l_d` int(11) NOT NULL,
  `id_w_l` int(11) DEFAULT NULL,
  `id_prices` int(11) DEFAULT NULL,
  `id_color` int(11) DEFAULT NULL,
  `id_mat` int(11) DEFAULT NULL,
  `id_size` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `wish_list_details`
--

INSERT INTO `wish_list_details` (`id_w_l_d`, `id_w_l`, `id_prices`, `id_color`, `id_mat`, `id_size`) VALUES
(1, 1, 3, 2, 1, 1),
(2, 1, 3, 3, 4, 4),
(3, 1, 3, 3, 2, 2);

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
  ADD KEY `id_prices` (`id_prices`),
  ADD KEY `id_color` (`id_color`),
  ADD KEY `id_mat` (`id_mat`),
  ADD KEY `id_size` (`id_size`);

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
  ADD KEY `id_prices` (`id_prices`),
  ADD KEY `id_color` (`id_color`),
  ADD KEY `id_mat` (`id_mat`),
  ADD KEY `id_size` (`id_size`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `address`
--
ALTER TABLE `address`
  MODIFY `id_add` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `assignment_prices_object`
--
ALTER TABLE `assignment_prices_object`
  MODIFY `id_prices` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `assignment_probus`
--
ALTER TABLE `assignment_probus`
  MODIFY `id_assprob` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `business`
--
ALTER TABLE `business`
  MODIFY `id_bus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id_cl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `contact`
--
ALTER TABLE `contact`
  MODIFY `id_con` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `id_mat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `product_rating`
--
ALTER TABLE `product_rating`
  MODIFY `id_prra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id_prev` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id_tpro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id_shp_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `shopping_cart_details`
--
ALTER TABLE `shopping_cart_details`
  MODIFY `id_shp_c_d` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id_ustp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id_w_l` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `wish_list_details`
--
ALTER TABLE `wish_list_details`
  MODIFY `id_w_l_d` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `shopping_cart_details_ibfk_2` FOREIGN KEY (`id_prices`) REFERENCES `assignment_prices_object` (`id_prices`),
  ADD CONSTRAINT `shopping_cart_details_ibfk_3` FOREIGN KEY (`id_color`) REFERENCES `color` (`id_color`),
  ADD CONSTRAINT `shopping_cart_details_ibfk_4` FOREIGN KEY (`id_mat`) REFERENCES `material` (`id_mat`),
  ADD CONSTRAINT `shopping_cart_details_ibfk_5` FOREIGN KEY (`id_size`) REFERENCES `sizes` (`id_size`);

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
  ADD CONSTRAINT `wish_list_details_ibfk_2` FOREIGN KEY (`id_prices`) REFERENCES `assignment_prices_object` (`id_prices`),
  ADD CONSTRAINT `wish_list_details_ibfk_3` FOREIGN KEY (`id_color`) REFERENCES `color` (`id_color`),
  ADD CONSTRAINT `wish_list_details_ibfk_4` FOREIGN KEY (`id_mat`) REFERENCES `material` (`id_mat`),
  ADD CONSTRAINT `wish_list_details_ibfk_5` FOREIGN KEY (`id_size`) REFERENCES `sizes` (`id_size`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
