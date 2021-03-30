-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-09-2018 a las 19:44:02
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `abastecer`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atencion`
--

CREATE TABLE `atencion` (
  `idAtencion` int(11) NOT NULL,
  `fechaAtencion` date NOT NULL,
  `observacion` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `tipoAtencion` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atencion_familia`
--

CREATE TABLE `atencion_familia` (
  `idAtencionFamilia` int(11) NOT NULL,
  `idAtencion` int(11) NOT NULL,
  `idFamilia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo_clap`
--

CREATE TABLE `cargo_clap` (
  `idCargo` int(11) NOT NULL,
  `cargoRol` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clap`
--

CREATE TABLE `clap` (
  `idClap` int(11) NOT NULL,
  `codigoClap` varchar(24) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codigoSala` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombreClap` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `rifClap` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `parroquia` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `emailClap` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `tlfClap` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `nombreComunidad` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `limiteNorteComunidad` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `limiteSurComunidad` varchar(40) NOT NULL,
  `limiteOesteComunidad` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `limiteEsteComunidad` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `nombreConsejoComunal` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `rifConsejoComunal` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `zonaSilencio` tinyint(1) NOT NULL,
  `cantManzaneros` int(11) NOT NULL,
  `eje` int(11) NOT NULL,
  `revisadoEnlace` tinyint(1) NOT NULL,
  `cantViviendas` int(11) NOT NULL,
  `cantFamilias` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `idEnlace` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denuncias`
--

CREATE TABLE `denuncias` (
  `idDenuncia` int(11) NOT NULL,
  `nControl` int(11) NOT NULL,
  `fechaDenuncia` date NOT NULL,
  `motivo` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `statusDenuncia` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `idIntegrante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_distribuidora`
--

CREATE TABLE `empresa_distribuidora` (
  `idEmpresa` int(11) NOT NULL,
  `nombreEmpresa` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `rifEmpresa` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `emailEmpresa` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `tlfEmpresa` varchar(12) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enlace_politico`
--

CREATE TABLE `enlace_politico` (
  `idEnlace` int(11) NOT NULL,
  `nombreEnlace` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidoEnlace` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `parroquiaEncargado` varchar(20) UNIQUE COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupofamiliar`
--

CREATE TABLE `grupofamiliar` (
  `idFamilia` int(11) NOT NULL,
  `grupoFamiliar` varchar(10) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellidoFamilia` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccionFamilia` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `numVivienda` varchar(10) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `numManzana` int(11) NOT NULL,
  `cantMercadosAsignados` int(11) NOT NULL,
  `idCLAP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembrofamilia`
--

CREATE TABLE `miembrofamilia` (
  `idIntegrante` int(11) NOT NULL,
  `cedulaIntegrante` varchar(8) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombreIntegrante` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellidoIntegrante` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `sexoIntegrante` varchar(1) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `telefonoIntegrante` varchar(12) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `emailIntegrante` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `rolPersona` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `codigoCarnetPatria` varchar(12) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `serialCarnetPatria` varchar(12) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `manzanero` varchar(2) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `idFamilia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_clap`
--

CREATE TABLE `rol_clap` (
  `idRol` int(11) NOT NULL,
  `statusRol` tinyint(1) NOT NULL,
  `fechaEleccion` date NOT NULL,
  `idCargo` int(11) NOT NULL,
  `idIntegrante` int(11) NOT NULL,
  `idClap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `idSolicitud` int(11) NOT NULL,
  `nOficio` int(11) NOT NULL,
  `fechaSolicitud` date NOT NULL,
  `beneficioSolicitud` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `statusSolicitud` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `idIntegrante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellidoUsuario` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cedulaUsuario` varchar(8) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefonoUsuario` varchar(12) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `emailUsuario` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `rolUsuario` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `passwordUsuario` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atencion`
--
ALTER TABLE `atencion`
  ADD PRIMARY KEY (`idAtencion`);

--
-- Indices de la tabla `atencion_familia`
--
ALTER TABLE `atencion_familia`
  ADD PRIMARY KEY (`idAtencionFamilia`),
  ADD KEY `idAtencion` (`idAtencion`),
  ADD KEY `idFamilia` (`idFamilia`);

--
-- Indices de la tabla `cargo_clap`
--
ALTER TABLE `cargo_clap`
  ADD PRIMARY KEY (`idCargo`);

--
-- Indices de la tabla `clap`
--
ALTER TABLE `clap`
  ADD PRIMARY KEY (`idClap`),
  ADD KEY `idEnlace` (`idEnlace`),
  ADD KEY `idEmpresa` (`idEmpresa`);

--
-- Indices de la tabla `denuncias`
--
ALTER TABLE `denuncias`
  ADD PRIMARY KEY (`idDenuncia`),
  ADD KEY `idIntegrante` (`idIntegrante`);

--
-- Indices de la tabla `empresa_distribuidora`
--
ALTER TABLE `empresa_distribuidora`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Indices de la tabla `enlace_politico`
--
ALTER TABLE `enlace_politico`
  ADD PRIMARY KEY (`idEnlace`);

--
-- Indices de la tabla `grupofamiliar`
--
ALTER TABLE `grupofamiliar`
  ADD PRIMARY KEY (`idFamilia`),
  ADD KEY `idCLAP` (`idCLAP`);

--
-- Indices de la tabla `miembrofamilia`
--
ALTER TABLE `miembrofamilia`
  ADD PRIMARY KEY (`idIntegrante`),
  ADD UNIQUE KEY `cedulaIntegrante` (`cedulaIntegrante`) USING BTREE,
  ADD KEY `idFamilia` (`idFamilia`);

--
-- Indices de la tabla `rol_clap`
--
ALTER TABLE `rol_clap`
  ADD PRIMARY KEY (`idRol`),
  ADD KEY `idCargo` (`idCargo`),
  ADD KEY `idIntegrante` (`idIntegrante`),
  ADD KEY `idClap` (`idClap`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`idSolicitud`),
  ADD KEY `idIntegrante` (`idIntegrante`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `cedulaUsuario` (`cedulaUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `atencion`
--
ALTER TABLE `atencion`
  MODIFY `idAtencion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `atencion_familia`
--
ALTER TABLE `atencion_familia`
  MODIFY `idAtencionFamilia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargo_clap`
--
ALTER TABLE `cargo_clap`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clap`
--
ALTER TABLE `clap`
  MODIFY `idClap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `denuncias`
--
ALTER TABLE `denuncias`
  MODIFY `idDenuncia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa_distribuidora`
--
ALTER TABLE `empresa_distribuidora`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `enlace_politico`
--
ALTER TABLE `enlace_politico`
  MODIFY `idEnlace` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupofamiliar`
--
ALTER TABLE `grupofamiliar`
  MODIFY `idFamilia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `miembrofamilia`
--
ALTER TABLE `miembrofamilia`
  MODIFY `idIntegrante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol_clap`
--
ALTER TABLE `rol_clap`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `idSolicitud` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `atencion_familia`
--
ALTER TABLE `atencion_familia`
  ADD CONSTRAINT `atencion_familia_ibfk_1` FOREIGN KEY (`idAtencion`) REFERENCES `atencion` (`idAtencion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `atencion_familia_ibfk_2` FOREIGN KEY (`idFamilia`) REFERENCES `grupofamiliar` (`idFamilia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clap`
--
ALTER TABLE `clap`
  ADD CONSTRAINT `clap_ibfk_1` FOREIGN KEY (`idEnlace`) REFERENCES `enlace_politico` (`idEnlace`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clap_ibfk_2` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa_distribuidora` (`idEmpresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `denuncias`
--
ALTER TABLE `denuncias`
  ADD CONSTRAINT `denuncias_ibfk_1` FOREIGN KEY (`idIntegrante`) REFERENCES `miembrofamilia` (`idIntegrante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupofamiliar`
--
ALTER TABLE `grupofamiliar`
  ADD CONSTRAINT `grupofamiliar_ibfk_1` FOREIGN KEY (`idCLAP`) REFERENCES `clap` (`idClap`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `miembrofamilia`
--
ALTER TABLE `miembrofamilia`
  ADD CONSTRAINT `miembrofamilia_ibfk_1` FOREIGN KEY (`idFamilia`) REFERENCES `grupofamiliar` (`idFamilia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rol_clap`
--
ALTER TABLE `rol_clap`
  ADD CONSTRAINT `rol_clap_ibfk_1` FOREIGN KEY (`idCargo`) REFERENCES `cargo_clap` (`idCargo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rol_clap_ibfk_2` FOREIGN KEY (`idIntegrante`) REFERENCES `miembrofamilia` (`idIntegrante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rol_clap_ibfk_3` FOREIGN KEY (`idClap`) REFERENCES `clap` (`idClap`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`idIntegrante`) REFERENCES `miembrofamilia` (`idIntegrante`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
