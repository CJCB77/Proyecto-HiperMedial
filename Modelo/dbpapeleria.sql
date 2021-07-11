-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 11-07-2021 a las 19:02:02
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbpapeleria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcategoria`
--

DROP TABLE IF EXISTS `tbcategoria`;
CREATE TABLE IF NOT EXISTS `tbcategoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbcategoria`
--

INSERT INTO `tbcategoria` (`id_categoria`, `categoria`) VALUES
(1, 'Boligrafos'),
(2, 'Lapices'),
(3, 'Marcadores'),
(4, 'Cuadernos'),
(5, 'Calculadoras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbciudad`
--

DROP TABLE IF EXISTS `tbciudad`;
CREATE TABLE IF NOT EXISTS `tbciudad` (
  `id_ciudad` int(11) NOT NULL AUTO_INCREMENT,
  `ciudad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_ciudad`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbciudad`
--

INSERT INTO `tbciudad` (`id_ciudad`, `ciudad`) VALUES
(1, 'Guayaquil'),
(2, 'Quito'),
(3, 'Cuenca'),
(4, 'Manta'),
(5, 'Ambato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tborden`
--

DROP TABLE IF EXISTS `tborden`;
CREATE TABLE IF NOT EXISTS `tborden` (
  `id_orden` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `fecha_compra` date NOT NULL,
  `fecha_entrega` date NOT NULL,
  `ciudad` int(11) NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` double NOT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_orden`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tborden`
--

INSERT INTO `tborden` (`id_orden`, `id_usuario`, `fecha_compra`, `fecha_entrega`, `ciudad`, `direccion`, `nombre`, `total`, `estado`) VALUES
(15, 1, '2021-07-11', '2021-07-14', 1, 'barrio centenario', 'Johnny Coral', 0.33, 'pendiente'),
(13, 1, '2021-07-11', '2021-07-14', 1, 'barrio centenario', 'Johnny Coral', 3.3, 'pendiente'),
(14, 11, '2021-07-11', '2021-07-14', 1, 'la saiba', 'Lourdes Alejandro', 3.5, 'pendiente'),
(12, 1, '2021-07-11', '2021-07-14', 1, 'barrio centenario', 'Johnny Coral', 0.25, 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproducto`
--

DROP TABLE IF EXISTS `tbproducto`;
CREATE TABLE IF NOT EXISTS `tbproducto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `precio` double NOT NULL,
  `stock` int(11) NOT NULL,
  `marca` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbproducto`
--

INSERT INTO `tbproducto` (`id_producto`, `nombre`, `descripcion`, `id_categoria`, `precio`, `stock`, `marca`, `img`) VALUES
(1, 'Lapiz Bic Evolution', 'lapiz bic con borrador incluido', 2, 0.25, 100, 'BIC', 'UploadImgs/lapiz1.jpg'),
(2, 'Lapiz Simbalion HB', 'lapiz HB ', 2, 0.18, 50, 'Simbalion', 'UploadImgs/lapiz2.jpg'),
(3, 'Boligrafo BIC Negro', 'boligrafo BIC punta fina negro', 1, 0.33, 70, 'BIC', 'UploadImgs/boligrafo1.jpg'),
(4, 'Resaltador Stabilo Verde', 'Resaltador escolar color verde', 3, 0.75, 25, 'Stabilo', 'UploadImgs/marcador1.jpg'),
(5, 'Set Marcadores Sharpie', 'Set de 12 marcadores Sharpie, colores variados', 3, 10, 20, 'Sharpie', 'UploadImgs/marcador2.jpg'),
(6, 'Cuaderno Estilo 100 pags.', 'Cuaderno de a cuadros 100 hojas universitario', 4, 2, 15, 'Estilo', 'UploadImgs/cuaderno1.jpg'),
(7, 'Boligrafo Stadler negro', 'boligrafo tinta negra stadler, punta fina', 1, 1, 0, 'Stadler', 'UploadImgs/boligrafo2.jpg'),
(8, 'Cuaderno lineas Norma', 'Cuaderno universitario de 100 pags. Norma', 4, 2.37, 30, 'Norma', 'UploadImgs/cuaderno2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbusuario`
--

DROP TABLE IF EXISTS `tbusuario`;
CREATE TABLE IF NOT EXISTS `tbusuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `celular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbusuario`
--

INSERT INTO `tbusuario` (`id_usuario`, `usuario`, `contrasena`, `nombre`, `apellido`, `email`, `direccion`, `id_ciudad`, `celular`) VALUES
(1, 'cjcb', '123456', 'Johnny', 'Coral', 'johnny@gmail.com', 'barrio centenario', 1, '0978238743'),
(5, 'admin', 'admin123456789', 'admin', 'admin', 'admin@gmail.com', 'servidor', 3, '099374643'),
(6, 'andrew', 'andrew123', 'Andrew', 'Acosta', 'andrew@gmail.com', 'acacias', 4, '0897348734'),
(11, 'lulusita99', 'lulu123456', 'Lourdes', 'Alejandro', 'lulu@hotmail.com', 'la saiba', 1, '099863424345');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
