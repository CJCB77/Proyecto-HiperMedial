-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 26-06-2021 a las 07:49:22
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbcategoria`
--

INSERT INTO `tbcategoria` (`id_categoria`, `categoria`) VALUES
(1, 'boligrafos'),
(2, 'lapices'),
(3, 'marcadores'),
(4, 'cuadernos');

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(8, 'Cuaderno lineas Norma', 'Cuaderno universitario de 100 pags. Norma', 4, 2.37, 30, 'Norma', 'UploadImgs/cuaderno2.jpg'),
(13, 'lapiz 2b', 'lapiz 2b grueso', 2, 0.21, 100, 'BIC', 'UploadImgs/lapiz1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbusuario`
--

DROP TABLE IF EXISTS `tbusuario`;
CREATE TABLE IF NOT EXISTS `tbusuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contraseña` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
