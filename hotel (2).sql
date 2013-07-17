-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-07-2013 a las 18:24:51
-- Versión del servidor: 5.5.20
-- Versión de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `hotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acumulador`
--

CREATE TABLE IF NOT EXISTS `acumulador` (
  `id_cont` int(11) NOT NULL AUTO_INCREMENT,
  `id_hab` int(11) NOT NULL,
  `id_cli` int(11) NOT NULL,
  PRIMARY KEY (`id_cont`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_hab`
--

CREATE TABLE IF NOT EXISTS `asignacion_hab` (
  `id_asig` int(11) NOT NULL AUTO_INCREMENT,
  `id_hab` int(11) NOT NULL,
  `id_cli` int(11) NOT NULL,
  `fecha_ent` date NOT NULL,
  `fecha_sal` date NOT NULL,
  `num_dias` int(11) NOT NULL,
  `costo_total` int(11) NOT NULL,
  `estado_asig_hab` varchar(20) NOT NULL,
  `num_asig` int(11) NOT NULL,
  PRIMARY KEY (`id_asig`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `asignacion_hab`
--

INSERT INTO `asignacion_hab` (`id_asig`, `id_hab`, `id_cli`, `fecha_ent`, `fecha_sal`, `num_dias`, `costo_total`, `estado_asig_hab`, `num_asig`) VALUES
(2, 1, 2, '2013-07-14', '2013-07-15', 1, 50, 'CANCELADO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cli` int(11) NOT NULL AUTO_INCREMENT,
  `ap_cli` varchar(200) NOT NULL,
  `nom_cli` varchar(200) NOT NULL,
  `tipo_docu` varchar(100) NOT NULL,
  `nro_doc_cli` varchar(50) NOT NULL,
  `celular_cli` varchar(20) NOT NULL,
  `procedencia_cli` varchar(100) NOT NULL,
  `fecha_nac_cli` date NOT NULL,
  `estado_cli` varchar(20) NOT NULL,
  PRIMARY KEY (`id_cli`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cli`, `ap_cli`, `nom_cli`, `tipo_docu`, `nro_doc_cli`, `celular_cli`, `procedencia_cli`, `fecha_nac_cli`, `estado_cli`) VALUES
(1, 'ROBERT', 'ARBEN', 'PASAPORTE', '65987456', '78761623', 'HOLANDA', '1983-07-19', 'NO'),
(2, 'SEBASTIAN', 'JHON', 'CI', '789654258', '12568948', 'MEXICO', '1965-04-12', 'NO'),
(3, 'SOLIZ', 'MARCA ANTONIO', 'PASAPORTE', '89562113', '89564512', 'MEXICO', '1960-10-15', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE IF NOT EXISTS `habitacion` (
  `id_hab` int(11) NOT NULL AUTO_INCREMENT,
  `num_habi` varchar(20) NOT NULL,
  `piso` varchar(30) NOT NULL,
  `costo` varchar(20) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `num_camas` int(11) NOT NULL,
  `estado_asig` varchar(20) NOT NULL,
  PRIMARY KEY (`id_hab`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`id_hab`, `num_habi`, `piso`, `costo`, `id_tipo`, `num_camas`, `estado_asig`) VALUES
(1, '10', '1re piso', '50', 1, 1, 'LIBRE'),
(2, '10', '3 piso', '60', 2, 2, 'LIBRE'),
(3, '12', '4to piso', '50', 1, 1, 'LIBRE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
  `id_per` int(11) NOT NULL AUTO_INCREMENT,
  `ci_per` varchar(9) NOT NULL,
  `apellidos_per` varchar(100) NOT NULL,
  `nombres_per` varchar(100) NOT NULL,
  `celular_per` varchar(12) NOT NULL,
  `direccion_per` varchar(70) NOT NULL,
  `estado_per` varchar(15) NOT NULL,
  `email_per` varchar(50) NOT NULL,
  `est_user` varchar(5) NOT NULL,
  PRIMARY KEY (`id_per`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_per`, `ci_per`, `apellidos_per`, `nombres_per`, `celular_per`, `direccion_per`, `estado_per`, `email_per`, `est_user`) VALUES
(6, '2356849', 'MENDEZ ROCA', 'ROGER', '76176338', 'ANCELMO TAPIA', 'ACTIVO', 'roger.mendez.r@gmail.com', 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `id_res` int(11) NOT NULL AUTO_INCREMENT,
  `id_hab` int(11) NOT NULL,
  `id_cli` int(11) NOT NULL,
  `fecha_in` int(11) NOT NULL,
  `fecha_fin` int(11) NOT NULL,
  `estado_res` int(11) NOT NULL,
  PRIMARY KEY (`id_res`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

CREATE TABLE IF NOT EXISTS `reservacion` (
  `id_res` int(11) NOT NULL AUTO_INCREMENT,
  `id_hab` int(11) NOT NULL,
  `id_cli` int(11) NOT NULL,
  `fecha_in` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado_res` varchar(20) NOT NULL,
  PRIMARY KEY (`id_res`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` (`id_res`, `id_hab`, `id_cli`, `fecha_in`, `fecha_fin`, `estado_res`) VALUES
(29, 1, 1, '2013-07-14', '2013-07-14', 'POSITIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE IF NOT EXISTS `servicios` (
  `id_ser` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_ser` varchar(100) NOT NULL,
  `descripcion_ser` varchar(150) NOT NULL,
  `costo_ser` float(10,0) NOT NULL,
  `ent_ser` int(11) NOT NULL,
  `sal_ser` int(11) NOT NULL,
  `saldo_ser` int(11) NOT NULL,
  PRIMARY KEY (`id_ser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_ser`, `nombre_ser`, `descripcion_ser`, `costo_ser`, `ent_ser`, `sal_ser`, `saldo_ser`) VALUES
(1, 'CERVECITA', 'LATA DE 450 C', 9, 24, 2, 22),
(2, 'DESAYUNO', 'DESAYUNO COMPLETO', 6, 20, 1, 19),
(3, 'SODA', 'COLA COLA MINI', 1, 48, 0, 48),
(4, 'SODA', 'FANTA MINI', 2, 48, 0, 48),
(5, 'SHAMPO', 'SEDAL SACHET', 4, 15, 0, 15),
(6, 'HAMBURGUESAS', 'SIMPLE DE CARNE', 6, 15, 0, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ser_hab`
--

CREATE TABLE IF NOT EXISTS `ser_hab` (
  `id_ser_hab` int(11) NOT NULL AUTO_INCREMENT,
  `id_hab` int(11) NOT NULL,
  `id_ser` int(11) NOT NULL,
  `cant_ser` int(11) NOT NULL,
  `costo_ser` decimal(10,0) NOT NULL,
  `costo_total` float NOT NULL,
  `num_asig_ser` int(11) NOT NULL,
  `estado_ser` varchar(20) NOT NULL,
  PRIMARY KEY (`id_ser_hab`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `ser_hab`
--

INSERT INTO `ser_hab` (`id_ser_hab`, `id_hab`, `id_ser`, `cant_ser`, `costo_ser`, `costo_total`, `num_asig_ser`, `estado_ser`) VALUES
(1, 1, 2, 1, '6', 6, 1, 'CANCELADO'),
(4, 1, 1, 2, '8', 16, 1, 'CANCELADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_habi`
--

CREATE TABLE IF NOT EXISTS `tipo_habi` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo` varchar(100) NOT NULL,
  `descrip_tipo` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipo_habi`
--

INSERT INTO `tipo_habi` (`id_tipo`, `nombre_tipo`, `descrip_tipo`) VALUES
(1, 'Simple', 'CON UNA SOLA CAMA TELEVISION Y BAÑO PRIVADO'),
(2, 'BOBLE BAÑO PRIVADO', 'baño privado television');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_user` varchar(30) DEFAULT NULL,
  `id_per` int(11) DEFAULT NULL,
  `estado_user` varchar(20) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `clave` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_pol` (`id_per`),
  KEY `id_pol_2` (`id_per`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `tipo_user`, `id_per`, `estado_user`, `username`, `clave`) VALUES
(6, 'ADMINISTRADOR', 6, 'HABILITADO', 'roger', '81dc9bdb52d04dc20036dbd8313ed055');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
