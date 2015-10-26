-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2015 a las 13:44:53
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_botiga_animals`
--
CREATE DATABASE IF NOT EXISTS `bd_botiga_animals` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bd_botiga_animals`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_anunci`
--

CREATE TABLE IF NOT EXISTS `tbl_anunci` (
  `anu_id` int(11) NOT NULL,
  `anu_contingut` varchar(255) NOT NULL,
  `anu_nom` varchar(25) NOT NULL,
  `anu_data` date NOT NULL,
  `anu_foto` varchar(50) NOT NULL,
  `raca_id` int(11) NOT NULL,
  `mun_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `anu_tipus` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_anunci`
--

INSERT INTO `tbl_anunci` (`anu_id`, `anu_contingut`, `anu_nom`, `anu_data`, `anu_foto`, `raca_id`, `mun_id`, `contact_id`, `anu_tipus`) VALUES
(1, 'Perdido perro de raza beagle en la playa del Prat de Llobreat (Zona del aeropuerto). Responde al nombre de "Tacat".', 'Perdido Beagle en el Prat', '2015-10-11', 'tacat.jpg', 14, 4, 2, 'Perdut'),
(2, 'Desaparecido gato con collar y placa con nombre de Ratlletes. Es de tipo Común a la Rambla del Badal (Barcelona)', 'Perdido Gato', '2015-10-15', 'gato_comun.jpg', 17, 1, 6, 'Perdut'),
(3, 'Perdido perro en parque al lado de un colegio cerca Hospitalet del LLobregat', 'Perdido Perro Hospitalet', '2015-09-11', 'perro_husky.jpg', 11, 5, 1, 'Perdut'),
(4, 'Perdido Canario por Martorell. Creemos que tiene una ala rota.', 'Perdido Canario Martorell', '2015-10-02', 'canario.jpg', 20, 6, 3, 'Perdut'),
(5, 'Perdido Gato Persa cerca de Castellbisbal. Lleva ya 3 días desaparecido', 'Perdido Gato Persa', '2015-10-18', 'gato_persa.jpg', 15, 11, 4, 'Perdut'),
(6, 'Perdido Golden Retriever en la Playa de Viladecans', 'Perdido Golden Retriever', '2015-10-07', 'golden_retriever.jpg', 10, 9, 7, 'Perdut'),
(7, 'Perdido Pato en Zoológico de Begues. Es agresivo tener cuidado.', 'Perdido Pato', '2015-09-11', 'pato.jpg', 26, 10, 8, 'Perdut'),
(8, 'Perdido Conejo, se escapo por la ventana y salto. Luego salio corriendo dirección a la Avenida.', 'Perdido Conejo', '2015-10-11', 'conejo.jpg', 23, 15, 5, 'Perdut'),
(9, 'Perdido Gato Abisinio, cerca del metro de Sant Joan d''Espí', 'Perdido Abisinio', '2015-10-03', 'gato_abisinio.jpg', 18, 3, 9, 'Perdut'),
(10, 'Perdido Hamster en Rubí, tened cuidado porque muerde.', 'Perdido Hamster', '2015-10-12', 'no_disponible.png', 24, 13, 10, 'Perdut'),
(11, 'Perdido Periquito. Requiere de cuidados especiales, tened cuidado si lo encontráis.', 'Perdido Periquito', '2015-09-07', 'periquito.jpg', 21, 8, 11, 'Perdut'),
(12, 'Perdido Perro de tipo Cruzado, es muy bueno y cariñoso.', 'Perdido Cruzado', '2015-10-03', 'perro_cruzado.jpg', 13, 4, 12, 'Perdut'),
(13, 'Perdido Gato Siamés en Begues, cerca del Barrio la Marina.', 'Perdido Siamés', '2015-10-07', 'gato_siames.jpg', 16, 10, 14, 'Perdut'),
(14, 'Perdido Hamster. Tened cuidado que es desconfiado y muerde.', 'Perdido Hamster', '2015-09-06', 'no_disponible.png', 24, 4, 13, 'Perdut'),
(15, 'Perdido Pato de una granja cerca de El Prat. Es de color Blanco y con una mancha marrón.', 'Perdido Pato', '2015-09-28', 'no_disponible.png', 26, 4, 15, 'Perdut'),
(16, 'Perdido Periquito de color Azul con mancha naranjas.', 'Perdido Periquito', '2015-10-06', 'no_disponible.png', 21, 5, 18, 'Perdut'),
(17, 'Perdido Tejón peligroso, se asusta con facilidad.', 'Perdido Tejón', '2015-10-01', 'tejon.jpg', 25, 14, 23, 'Perdut');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contacte`
--

CREATE TABLE IF NOT EXISTS `tbl_contacte` (
  `contact_id` int(11) NOT NULL,
  `contact_nom` varchar(25) NOT NULL,
  `contact_telf` varchar(9) NOT NULL,
  `contact_adre` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_contacte`
--

INSERT INTO `tbl_contacte` (`contact_id`, `contact_nom`, `contact_telf`, `contact_adre`) VALUES
(1, 'Carles Martín', '934534236', ''),
(2, 'Antonio Gámez', '667542343', 'Carrer del Mig, 76 3r 1a'),
(3, 'Carlos Martínez', '654583454', ''),
(4, 'Isabel Vázquez', '698722284', ''),
(5, 'Pedro Santiesteban', '656989931', 'Avinguda Carrilet, 54 3r'),
(6, 'Sònia Gómez', '688341009', 'Gran Via de les Corts Catalanes, 12 Esc. A 3r 2a'),
(7, 'Patricia Martín', '932124654', ''),
(8, 'Arnau Roca', '665970756', 'Av.Catalunya nº4 1ª 2ª'),
(9, 'Pedro Sánchez', '657789562', ''),
(10, 'Jose Luis', '675521398', 'Calle del Paraiso nº154 4ª 5ª'),
(11, 'Nuria Roca', '933343478', 'Calle Mesa nº98 Bajos 1ª'),
(12, 'Felipe Gónzalez', '674532211', 'Av. Rambla Fribola nº189 8ª 1ª'),
(13, 'Nuria Roca', '933343478', 'Calle Mesa nº98 Bajos 1ª'),
(14, 'Felipe Gónzalez', '674532211', 'Av. Rambla Fribola nº189 8ª 1ª'),
(15, 'Miguel Bose', '934467856', ''),
(16, 'David Férnandez', '675548998', ''),
(17, 'Florentino Férnandez', '934568899', 'Rambla Medina nº32 2ª2ª'),
(18, 'Dani Martin', '667544912', 'Calle Pizzarro nº38 4ª2ª'),
(19, 'Rocio Durcal', '665789789', ''),
(20, 'Marina Lázaro', '665970756', ''),
(21, 'Juan Ramírez', '677861209', 'Calle Franca nº89 5ª4ª'),
(22, 'Lina Morgan', '665970756', 'Rambla Meseta nº12 3ª2ª'),
(23, 'Pablo Iglesias', '934456731', ''),
(24, 'Berto Romero', '667546689', ''),
(25, 'Ana Morgade', '655645478', 'Av. Columna nª54 1ª3ª'),
(26, 'Juan Ramón', '932234213', ''),
(27, 'Miley Cyrys', '655867433', 'Calle Brenda nº238 3ª1ª'),
(28, 'Dani Martinez', '667898925', 'Avenida la Coruña nº132 5ª3ª');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_municipi`
--

CREATE TABLE IF NOT EXISTS `tbl_municipi` (
  `municipi_id` int(11) NOT NULL,
  `municipi_nom` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_municipi`
--

INSERT INTO `tbl_municipi` (`municipi_id`, `municipi_nom`) VALUES
(1, 'Barcelona'),
(2, 'Sant Feliu de Llobregat'),
(3, 'Sant Joan d''Espí'),
(4, 'El Prat de Llobregat'),
(5, 'L''Hospitalet de Llobregat'),
(6, 'Martorell'),
(7, 'Cornellà de Llobregat'),
(8, 'Castelldefels'),
(9, 'Viladecans'),
(10, 'Begues'),
(11, 'Castellbisbal'),
(12, 'Sant Sadurní d''Anoia'),
(13, 'Rubí'),
(14, 'Sant Cugat del Vallès'),
(15, 'Sitges');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_raca`
--

CREATE TABLE IF NOT EXISTS `tbl_raca` (
  `raca_id` int(11) NOT NULL,
  `raca_nom` varchar(25) NOT NULL,
  `tipus_anim_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_raca`
--

INSERT INTO `tbl_raca` (`raca_id`, `raca_nom`, `tipus_anim_id`) VALUES
(8, 'Bòxer', 1),
(9, 'Pastor alemany', 1),
(10, 'Golden retriever', 1),
(11, 'Husky', 1),
(12, 'Border collie', 1),
(13, 'Creuat', 1),
(14, 'Beagle', 1),
(15, 'Persa', 2),
(16, 'Siamés', 2),
(17, 'Comú', 2),
(18, 'Abisini', 2),
(19, 'Bobtail', 2),
(20, 'Canari', 3),
(21, 'Periquito', 3),
(22, 'Fura', 4),
(23, 'Conill', 4),
(24, 'Hàmster', 4),
(25, 'Teixó', 4),
(26, 'Ànec', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipus_animal`
--

CREATE TABLE IF NOT EXISTS `tbl_tipus_animal` (
  `tipus_anim_id` int(11) NOT NULL,
  `tipus_anim_nom` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_tipus_animal`
--

INSERT INTO `tbl_tipus_animal` (`tipus_anim_id`, `tipus_anim_nom`) VALUES
(1, 'Gos'),
(2, 'Gat'),
(3, 'Ocell'),
(4, 'Altres');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_anunci`
--
ALTER TABLE `tbl_anunci`
  ADD PRIMARY KEY (`anu_id`),
  ADD KEY `FK_ANU_RACA` (`raca_id`),
  ADD KEY `FK_MUN_ANU` (`mun_id`),
  ADD KEY `FK_CONTACT_ANU` (`contact_id`);

--
-- Indices de la tabla `tbl_contacte`
--
ALTER TABLE `tbl_contacte`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indices de la tabla `tbl_municipi`
--
ALTER TABLE `tbl_municipi`
  ADD PRIMARY KEY (`municipi_id`);

--
-- Indices de la tabla `tbl_raca`
--
ALTER TABLE `tbl_raca`
  ADD PRIMARY KEY (`raca_id`),
  ADD KEY `FK_RACA_TIPUS_A` (`tipus_anim_id`);

--
-- Indices de la tabla `tbl_tipus_animal`
--
ALTER TABLE `tbl_tipus_animal`
  ADD PRIMARY KEY (`tipus_anim_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_anunci`
--
ALTER TABLE `tbl_anunci`
  MODIFY `anu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `tbl_contacte`
--
ALTER TABLE `tbl_contacte`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `tbl_municipi`
--
ALTER TABLE `tbl_municipi`
  MODIFY `municipi_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `tbl_raca`
--
ALTER TABLE `tbl_raca`
  MODIFY `raca_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `tbl_tipus_animal`
--
ALTER TABLE `tbl_tipus_animal`
  MODIFY `tipus_anim_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_anunci`
--
ALTER TABLE `tbl_anunci`
  ADD CONSTRAINT `RELACIO_ANU_CONTACT` FOREIGN KEY (`contact_id`) REFERENCES `tbl_contacte` (`contact_id`),
  ADD CONSTRAINT `RELACIO_ANU_MUN` FOREIGN KEY (`mun_id`) REFERENCES `tbl_municipi` (`municipi_id`),
  ADD CONSTRAINT `RELACIO_ANU_RACA` FOREIGN KEY (`raca_id`) REFERENCES `tbl_raca` (`raca_id`);

--
-- Filtros para la tabla `tbl_raca`
--
ALTER TABLE `tbl_raca`
  ADD CONSTRAINT `tbl_raca_ibfk_1` FOREIGN KEY (`tipus_anim_id`) REFERENCES `tbl_tipus_animal` (`tipus_anim_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
