-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2022 a las 00:02:33
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `infobdn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `code` int(15) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `name` varchar(10) NOT NULL,
  `surname` varchar(15) NOT NULL,
  `passwd` varchar(30) NOT NULL,
  `photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`code`, `dni`, `name`, `surname`, `passwd`, `photo`) VALUES
(1, '53998259D', 'adri', 'diaz', '1234', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `courses`
--

CREATE TABLE `courses` (
  `code` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `description` varchar(20) NOT NULL,
  `hours` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `teacherID` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `courses`
--

INSERT INTO `courses` (`code`, `name`, `description`, `hours`, `startDate`, `endDate`, `teacherID`) VALUES
(14, 'Curso js', 'es para to', 50, '2022-10-04', '2022-10-04', 13),
(15, 'Curso php', 'copiado ol', 200, '2022-10-10', '2022-12-16', 13),
(16, 'hji', 'bjb', 56, '2022-11-08', '2022-11-17', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marks`
--

CREATE TABLE `marks` (
  `courses_code` int(11) NOT NULL,
  `student_id` varchar(9) NOT NULL,
  `mark` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marks`
--

INSERT INTO `marks` (`courses_code`, `student_id`, `mark`) VALUES
(15, '55555555A', 0),
(16, '55555555A', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `id` varchar(9) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `name` varchar(15) NOT NULL,
  `surname` varchar(15) NOT NULL,
  `passwd` varchar(30) NOT NULL,
  `born_date` date NOT NULL,
  `photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`id`, `dni`, `name`, `surname`, `passwd`, `born_date`, `photo`) VALUES
('', '77777777D', 'ADRI', 'DIAaz', '1234', '2022-11-08', ''),
('55555555A', '55555555A', 'adri', 'diaz', '1234', '2003-11-03', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teachers`
--

CREATE TABLE `teachers` (
  `id` int(9) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `name` varchar(10) NOT NULL,
  `surname` varchar(15) NOT NULL,
  `passwd` varchar(30) NOT NULL,
  `title` varchar(15) NOT NULL,
  `photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `teachers`
--

INSERT INTO `teachers` (`id`, `dni`, `name`, `surname`, `passwd`, `title`, `photo`) VALUES
(4, '', 'adrfsdafds', 'cortes', '12234', 'inigineria', 'fdasfw'),
(6, '', 'dadsa', 'sdads', '231321', 'deaqsd', ''),
(7, '', 'dadsa', 'sdads', '231321', 'deaqsd', ''),
(8, '', 'carlora', 'fds', '1234', 'dentista', 'img/1664619641-IMG_0342.JPG '),
(9, '', 'adsad', 'carlora', 'fds', '1234', 'img/1664619754-IMG_0342.JPG '),
(10, '', 'carlora', 'fds', '1234', 'dentista', 'img/1664619757-IMG_0342.JPG '),
(11, '3421421d', '', 'da', 's12', 'wss', 'img/1664955583-IMG_0339.JPG '),
(13, '24324243D', 'oscar', 'rodriguez', '1234', 'ingeniero', 'img/1666081319-tiktok_transparente.png ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `email`, `password`) VALUES
('', '', ''),
('asda', 'adri@gmail.com', '1234'),
('adri', 'adrin@gmail.com', '2344'),
('adridia', 'diazldaskjs@gmail.com', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`code`);

--
-- Indices de la tabla `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`code`) USING BTREE,
  ADD KEY `teacher_id` (`teacherID`);

--
-- Indices de la tabla `marks`
--
ALTER TABLE `marks`
  ADD KEY `courses_code` (`courses_code`),
  ADD KEY `student_id` (`student_id`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `code` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `courses`
--
ALTER TABLE `courses`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `teacher_id` FOREIGN KEY (`teacherID`) REFERENCES `teachers` (`id`);

--
-- Filtros para la tabla `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `courses_code` FOREIGN KEY (`courses_code`) REFERENCES `courses` (`code`),
  ADD CONSTRAINT `student_id` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
