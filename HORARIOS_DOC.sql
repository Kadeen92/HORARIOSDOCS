-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-08-2015 a las 16:17:32
-- Versión del servidor: 5.5.43-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `HORARIOS_DOC`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `añosestudio`
--

CREATE TABLE IF NOT EXISTS `añosestudio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `anoc` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE IF NOT EXISTS `carreras` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `carrera` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `codcarrera` varchar(4) DEFAULT NULL,
  `idfacultad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=197 ;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `carrera`, `created_at`, `updated_at`, `codcarrera`, `idfacultad`) VALUES
(1, 'Construcción', NULL, NULL, '0107', 1),
(2, 'Curso de Investigación', NULL, NULL, '0827', 1),
(3, 'Diplomado en Auditorías Amb.', NULL, NULL, '0885', 1),
(4, 'Doctorado en Ing. de Proyectos', NULL, NULL, '0872', 1),
(5, 'Estructuras y Carreteras', NULL, NULL, '0103', 1),
(6, 'Hidráulica', NULL, NULL, '0102', 1),
(7, 'Ingeniería Agrícola', NULL, NULL, '0110', 1),
(8, 'Ingeniería Civil', NULL, NULL, '0100', 1),
(9, 'Lic. en Ingeniería Geológica', NULL, NULL, '0108', 1),
(10, 'Lic. en Dibujo Automatizado', NULL, NULL, '0121', 1),
(11, 'Lic. en Ing. Maritima Portuaria', NULL, NULL, '0124', 1),
(12, 'Lic. en Ingeniería Geomatica', NULL, NULL, '0119', 1),
(13, 'Lic. en Oper. Maritimas', NULL, NULL, '0117', 1),
(14, 'Lic. en Saneamiento y Ambiente', NULL, NULL, '0122', 1),
(15, 'Lic. en Ing. Ambiental', NULL, NULL, '0118', 1),
(16, 'Lic. Tecnología de Dibujo', NULL, NULL, '0115', 1),
(17, 'Lic. Tecnología Edificaciones', NULL, NULL, '0114', 1),
(18, 'Lic. Tecnología Sanitaria', NULL, NULL, '0113', 1),
(19, 'Lic. Tecnología Topográfica', NULL, NULL, '0112', 1),
(20, 'Lic. Tecn. de Riego y Drenaje', NULL, NULL, '0116', 1),
(21, 'Lic. Tecn. Sanitaria y Ambiente', NULL, NULL, '0111', 1),
(22, 'Licenciatura en Edificaciones', NULL, NULL, '0120', 1),
(23, 'Licenciatura en Topografía', NULL, NULL, '0123', 1),
(24, 'Maest. en Gestión y Aud. Amb.', NULL, NULL, '0853', 1),
(25, 'Maest. en Planif. y Gest. Port.', NULL, NULL, '0902', 1),
(26, 'Mest. y Post. Sist. Inf. Geog.', NULL, NULL, '0903', 1),
(27, 'Maest. Direc. Emp. Const. e Inmob', NULL, NULL, '0871', 1),
(28, 'Maest. en Admon. de Proy. Constr.', NULL, NULL, '0832', 1),
(29, 'Maest. en Desarrollo Urb/Reg', NULL, NULL, '0836', 1),
(30, 'Maestría en Ciencias', NULL, NULL, '0860', 1),
(31, 'Maestría en Ciencias Ambient.', NULL, NULL, '0818', 1),
(32, 'Maestría en Ciencias Básicas', NULL, NULL, '0801', 1),
(33, 'Maestría en Ing. Estructural', NULL, NULL, '0805', 1),
(34, 'Maestría en Ing. Geotécnica', NULL, NULL, '0822', 1),
(35, 'Maestría en Ingeniería Civil', NULL, NULL, '0859', 1),
(36, 'maestría Ing. Ambiental', NULL, NULL, '0813', 1),
(37, 'Postg. en Admon. de Proyectos', NULL, NULL, '0825', 1),
(38, 'Postg. en Desarrollo Urb/Reg', NULL, NULL, '0837', 1),
(39, 'Postgrado Ciencias Ambient.', NULL, NULL, '0826', 1),
(40, 'Postgrado en Ing. Ambiental', NULL, NULL, '0814', 1),
(41, 'Postgrado en Ing. Estructural', NULL, NULL, '0823', 1),
(42, 'Postgrado en Ing. Geotécnica', NULL, NULL, '0824', 1),
(43, 'Postgrado en Sist. Inf. Geogr.', NULL, NULL, '0812', 1),
(44, 'Téc. Operaciones Portuarias', NULL, NULL, '1109', 1),
(45, 'Téc. Saneamiento y Ambiente', NULL, NULL, '1111', 1),
(46, 'Técnico en Carreteras', NULL, NULL, '1103', 1),
(47, 'Técnico en Dibujo', NULL, NULL, '1104', 1),
(48, 'Técnico en Edificaciones', NULL, NULL, '1101', 1),
(49, 'Técnico en Geología', NULL, NULL, '1105', 1),
(50, 'Técnico en materiales', NULL, NULL, '1108', 1),
(51, 'Técnico en Riego y Drenaje', NULL, NULL, '1106', 1),
(52, 'Técnico en Topografía', NULL, NULL, '1102', 1),
(53, 'Técnico Portuario', NULL, NULL, '1112', 1),
(54, 'Tend. Sanitaria', NULL, NULL, '0101', 1),
(55, 'Curso de Postgrado', NULL, NULL, '0800', 2),
(56, 'Doctorado en Ing. de Proyectos', NULL, NULL, '0873', 2),
(57, 'Ing. Eléctrica y Electrónica', NULL, NULL, '0605', 2),
(58, 'Ingeniería Electromecánica', NULL, NULL, '0601', 2),
(59, 'Lic. Electrónica y Sist. Com.', NULL, NULL, '0607', 2),
(60, 'Lic. en Elect. Dig. Contr. Aut.', NULL, NULL, '0609', 2),
(61, 'Lic. en Electrónica y Sist. Com.', NULL, NULL, '0610', 2),
(62, 'Lic. en Sist. Elect. y Automat.', NULL, NULL, '0611', 2),
(63, 'Lic. en Sist. Eléctricos y Aut.', NULL, NULL, '0608', 2),
(64, 'Lic. en Ing. Electron. y Telecom.', NULL, NULL, '0606', 2),
(65, 'Lic. Tecnología Eléctrica', NULL, NULL, '0604', 2),
(66, 'Lic. Tecnología Electrónica', NULL, NULL, '0603', 2),
(67, 'Maestría en Ing. Eléctrica', NULL, NULL, '0862', 2),
(68, 'Postg. Eléctricsa Industrial', NULL, NULL, '0828', 2),
(69, 'Postg. Ing. Electrónica Digital', NULL, NULL, '0819', 2),
(70, 'Postgrado en Telecomunicac.', NULL, NULL, '0850', 2),
(71, 'Técnico en Electricidad', NULL, NULL, '1202', 2),
(72, 'Técnico en Electrónica', NULL, NULL, '1201', 2),
(73, 'Cursos de Postgrado', NULL, NULL, '0908', 3),
(74, 'Dipl. en Desarr. Emprendedores', NULL, NULL, '0905', 3),
(75, 'Doctorado en Ing. de Proyectos', NULL, NULL, '0865', 3),
(76, 'Ing. Ind. Tend. Producción', NULL, NULL, '0302', 3),
(77, 'Ing. Mecánica Industrial', NULL, NULL, '0303', 3),
(78, 'Ing. Ind. Tend. Inv. Operaciones', NULL, NULL, '0301', 3),
(79, 'Ingeniería Industrial', NULL, NULL, '0304', 3),
(80, 'Lic. Logística y Transp. Mult.', NULL, NULL, '0312', 3),
(81, 'Lic. en gestión Administrativa', NULL, NULL, '0310', 3),
(82, 'Lic. en Rec. Humanos y G.', NULL, NULL, '0308', 3),
(83, 'Lic. Gestión Prod. Industrial', NULL, NULL, '0311', 3),
(84, 'Lic. Tecnología Admtiva', NULL, NULL, '0306', 3),
(85, 'Lic. Tecnología Industrial', NULL, NULL, '0305', 3),
(86, 'Lic. en Merc. Com. Int.', NULL, NULL, '0309', 3),
(87, 'Maest. Cienc. Ing. de Cad. Sum.', NULL, NULL, '0890', 3),
(88, 'Maest. Ciencias Esp. Admón. Ind.', NULL, NULL, '0806', 3),
(89, 'Maest. Dirc. Neg. Esp. Admón. Sist.', NULL, NULL, '0867', 3),
(90, 'Maest. Dirc. Neg. Espe. Estr. Ger.', NULL, NULL, '0870', 3),
(91, 'Maest. Direc. Neg. Esp. Econ. Emp.', NULL, NULL, '0868', 3),
(92, 'Maest. Direc. Neg. Esp. Merc. Estr.', NULL, NULL, '0866', 3),
(93, 'Maest. Sist. Log. y Oper. Esp. Pl.', NULL, NULL, '0897', 3),
(94, 'Maestría en Agronegocios', NULL, NULL, '0898', 3),
(95, 'Maestría en Gestión de Proy.', NULL, NULL, '0851', 3),
(96, 'Maestría en Ing. Industrial', NULL, NULL, '0802', 3),
(97, 'Maestría en Sist. Log. Oper. Cent.', NULL, NULL, '0852', 3),
(98, 'Maest. Dirc. Neg. Esp. Ger. Rec. Hum.', NULL, NULL, '0869', 3),
(99, 'Post. en Gestión de Proy.', NULL, NULL, '0831', 3),
(100, 'Postgr. Gerencia Agroindustrial', NULL, NULL, '0863', 3),
(101, 'Postgrado en Alta Gerencia', NULL, NULL, '0808', 3),
(102, 'Téc. en Ing. Esp. Admón', NULL, NULL, '1305', 3),
(103, 'Téc. en Tecn. Industrial', NULL, NULL, '1301', 3),
(104, 'Postg. en Energía Renov. y', NULL, NULL, '0894', 4),
(105, 'Dipl. en Admón Eficiente', NULL, NULL, '0888', 4),
(106, 'Doct. en Automática y Robótica', NULL, NULL, '0892', 4),
(107, 'Doct. Tecnol. Avanzada Indust.', NULL, NULL, '0844', 4),
(108, 'Doctorado en Energía y Ambiente', NULL, NULL, '0904', 4),
(109, 'Doctorado en Ing. de Proyectos', NULL, NULL, '0874', 4),
(110, 'Esp. en mantenim. Industrial', NULL, NULL, '0829', 4),
(111, 'Esp. en Manufactura y Automat.', NULL, NULL, '0810', 4),
(112, 'Esp. Adm. Ener. / Prot. Ambient.', NULL, NULL, '0830', 4),
(113, 'Ingeniería Mecánica', NULL, NULL, '0401', 4),
(114, 'Lic. en Ing. de mantenimiento', NULL, NULL, '0409', 4),
(115, 'Lic. en Ing. de Energía y Amb.', NULL, NULL, '0411', 4),
(116, 'Lic. en Ingeniería Aeronáutica', NULL, NULL, '0410', 4),
(117, 'Lic. en Ingeniería Naval', NULL, NULL, '0412', 4),
(118, 'Lic. en mecánica Automotriz', NULL, NULL, '0406', 4),
(119, 'Lic. en mecánica Industrial', NULL, NULL, '0407', 4),
(120, 'Lic. en Téc. Mec. Esp. Ref. A/A', NULL, NULL, '0405', 4),
(121, 'Lic. Admón. de Aviación', NULL, NULL, '0403', 4),
(122, 'Lic. Admón Opc. Vuelo', NULL, NULL, '0404', 4),
(123, 'Lic. en refrigeración y A/A', NULL, NULL, '0408', 4),
(124, 'Lic. Tecn. Mec. Ind', NULL, NULL, '0402', 4),
(125, 'Licenciatura en Soldadura', NULL, NULL, '0413', 4),
(126, 'maest. Cienc. Ing. Mec. Esp. Mat', NULL, NULL, '0878', 4),
(127, 'Maest. Ciencias Esp. Aut. Rob.', NULL, NULL, '0891', 4),
(128, 'Maest. en Ciencias de la Ing.', NULL, NULL, '0893', 4),
(129, 'Maest. Post. Energ. Ren. Amb.', NULL, NULL, '0849', 4),
(130, 'Maest. Cienc. Ing. Mec. Esp. Ener', NULL, NULL, '0877', 4),
(131, 'Maest. Cienc. Téc. Avanz. Indus.', NULL, NULL, '0845', 4),
(132, 'maest. Cienc. Mec. Esp. Aut. y Rob.', NULL, NULL, '0879', 4),
(133, 'Maest. Fuentes Renov. Energ.', NULL, NULL, '0839', 4),
(134, 'Maest. en Ing. Mecánica', NULL, NULL, '0804', 4),
(135, 'Maestría en Mant. de Planta', NULL, NULL, '0816', 4),
(136, 'Maestría en Planta', NULL, NULL, '0807', 4),
(137, 'Postg. en Ing. de Planta', NULL, NULL, '0809', 4),
(138, 'Postg. Fuentes Renov. Energ.', NULL, NULL, '0840', 4),
(139, 'Postgrado Manten. de Planta', NULL, NULL, '0817', 4),
(140, 'Téc. en Avionica y Fuselaje', NULL, NULL, '1403', 4),
(141, 'Téc. en Motores y Fuselaje', NULL, NULL, '1404', 4),
(142, 'Téc. Mecánica Industrial', NULL, NULL, '1401', 4),
(143, 'Téc. Refrigeración y A/A', NULL, NULL, '1402', 4),
(144, 'Téc. Despacho de Vuelo', NULL, NULL, '1405', 4),
(145, 'Téc. en Servicios de Aerolíneas', NULL, NULL, '1406', 4),
(146, 'Diplomado Técn. Inf. E-Commerce', NULL, NULL, '0856', 5),
(147, 'Doctorado en Ing. de Proyectos', NULL, NULL, '0875', 5),
(148, 'Esp. en Técn. Inf. E-Bussines', NULL, NULL, '0855', 5),
(149, 'Ing. Sistemas Computacionales', NULL, NULL, '0500', 5),
(150, 'Lic. en Ingeniería de Software', NULL, NULL, '0507', 5),
(151, 'Lic. Tecnología Programación', NULL, NULL, '0501', 5),
(152, 'Lic. en Inf. Aplica. Educación', NULL, NULL, '0506', 5),
(153, 'Lic. Redes Informáticas', NULL, NULL, '0502', 5),
(154, 'Lic. Desarr. Softw.', NULL, NULL, '0503', 5),
(155, 'Lic. Ing. Sist. Inform.', NULL, NULL, '0504', 5),
(156, 'Lic. Ing. Sist. y Comp.', NULL, NULL, '0505', 5),
(157, 'Maest. y Postg. en Ing. Softw.', NULL, NULL, '0922', 5),
(158, 'Maest. en Auditoria y Evaluac.', NULL, NULL, '0838', 5),
(159, 'Maest. en Cienc. Tecn. Inf. y Com.', NULL, NULL, '0880', 5),
(160, 'Maest. en Redes Comun. Datos', NULL, NULL, '0833', 5),
(161, 'Maestría en Ciencias Comput.', NULL, NULL, '0803', 5),
(162, 'Maestría en Dir. Tecn. Inf.', NULL, NULL, '0854', 5),
(163, 'Maestría en Gestión Servicios', NULL, NULL, '0848', 5),
(164, 'Maestría en Inform. Educat.', NULL, NULL, '0847', 5),
(165, 'Maestría en Seguridad Informát.', NULL, NULL, '0907', 5),
(166, 'Maestría Ing. Soft. Aplic.', NULL, NULL, '0841', 5),
(167, 'Postg. en Comercio Electrónico', NULL, NULL, '0835', 5),
(168, 'Postg. Inf. Aplicada Educac.', NULL, NULL, '0815', 5),
(169, 'Postg. en Redes Comun. Datos', NULL, NULL, '0834', 5),
(170, 'Postg. Ing. Softw. Aplic.', NULL, NULL, '0842', 5),
(171, 'Postgrado Auditoria de Sist.', NULL, NULL, '0811', 5),
(172, 'Téc. en Inform. Gestión Empr.', NULL, NULL, '1502', 5),
(173, 'Téc. programación y Análisis', NULL, NULL, '1501', 5),
(174, 'Cursos de Postgrado', NULL, NULL, '0896', 6),
(175, 'Dipl. en Med. Énf. C. y T.', NULL, NULL, '0886', 6),
(176, 'Dipl. en Med. Énf. Org. Salud', NULL, NULL, '0887', 6),
(177, 'Diplomado en Facilitadores', NULL, NULL, '0881', 6),
(178, 'Doct. Reng. Ciencias Físicas', NULL, NULL, '0906', 6),
(179, 'Doctorado en Ing. de Proyectos', NULL, NULL, '0876', 6),
(180, 'Lic. en Com. Ejec. Bilingüe', NULL, NULL, '0650', 6),
(181, 'Lic. en Ing. en Alimentos', NULL, NULL, '0651', 6),
(182, 'Lic. en Ingeniería Forestal', NULL, NULL, '0652', 6),
(183, 'Maest. Doc. Sup. Esp. Tecn.', NULL, NULL, '0883', 6),
(184, 'Maest. en Cienc. ,Prom. Desarr.', NULL, NULL, '0899', 6),
(185, 'Maest. Ciencias en Prom. y Des.', NULL, NULL, '0889', 6),
(186, 'Maest. en Mediac. Neg. y Arbit.', NULL, NULL, '0857', 6),
(187, 'Maestría en Ciencias Físicas', NULL, NULL, '0901', 6),
(188, 'Maestría en Ingeniería Matemát.', NULL, NULL, '0900', 6),
(189, 'Post. Ciencias materiales', NULL, NULL, '0843', 6),
(190, 'Postg. en Mediación y Arbitraje', NULL, NULL, '0861', 6),
(191, 'Postg. Indag. Aprend. Ciencias', NULL, NULL, '0864', 6),
(192, 'Postgrad. en Mediación y Negoc.', NULL, NULL, '0858', 6),
(193, 'Postgrado en Docencia Superior', NULL, NULL, '0882', 6),
(194, 'Prof. Educ. Media y Premed. Cien.', NULL, NULL, '0846', 6),
(195, 'Sist. Ingr. Univ. Lic', NULL, NULL, '0707', 7),
(196, 'Sistema de Ingreso Univ. Ing.', NULL, NULL, '0706', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE IF NOT EXISTS `departamentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `departamento` varchar(60) NOT NULL,
  `updated_at` varchar(60) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `departamento`, `updated_at`, `created_at`) VALUES
(1, 'LIDS', '2015-06-19 19:15:28', '2015-06-19 19:15:28'),
(3, 'REDES', '2015-07-03 21:59:03', '2015-07-03 21:58:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias`
--

CREATE TABLE IF NOT EXISTS `dias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dia` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edificios`
--

CREATE TABLE IF NOT EXISTS `edificios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `edificio` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `edificios`
--

INSERT INTO `edificios` (`id`, `edificio`, `updated_at`, `created_at`) VALUES
(1, 'EDIFICIO-A', '2015-07-16 14:54:39', '2015-07-16 14:54:39'),
(2, 'EDIFICIO-B', '2015-07-16 14:55:38', '2015-07-16 14:55:38'),
(3, 'EDIFICIO-C', '2015-07-16 17:52:49', '2015-07-16 17:52:49'),
(4, 'EDIFICIO-D', '2015-07-16 17:53:20', '2015-07-16 17:53:20'),
(5, 'EDIFICIO-E', '2015-07-16 17:53:57', '2015-07-16 17:53:57'),
(6, 'EDIFICIO-M', '2015-07-16 17:55:53', '2015-07-16 17:55:53'),
(7, 'CAFETÍN', '2015-07-16 17:58:00', '2015-07-16 17:57:25'),
(8, 'CAFETERÍA', '2015-07-16 17:57:47', '2015-07-16 17:57:34'),
(9, 'LIBRERIA', '2015-07-16 17:58:25', '2015-07-16 17:58:25'),
(10, 'BIBLIOTECA', '2015-07-16 17:58:35', '2015-07-16 17:58:35'),
(11, 'GIMNASIO', '2015-07-16 18:05:53', '2015-07-16 18:05:53'),
(12, 'RANCHO', '2015-07-16 18:06:23', '2015-07-16 18:06:23'),
(13, 'AREAS VERDES', '2015-07-16 18:07:10', '2015-07-16 18:07:10'),
(14, 'ESTACIONAMIENTOS', '2015-07-16 18:07:54', '2015-07-16 18:07:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE IF NOT EXISTS `especialidades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `espicialidad` varchar(65) NOT NULL,
  `updated_at` varchar(60) DEFAULT NULL,
  `created_at` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id`, `espicialidad`, `updated_at`, `created_at`) VALUES
(1, 'Director(a)', '2015-07-15 16:21:30', '2015-07-14 20:59:48'),
(2, 'Sud-Director(a)', '2015-07-14 21:02:27', '2015-07-14 21:00:07'),
(3, 'Coordinador(a) de Fac.', '2015-07-14 21:00:28', '2015-07-14 21:00:28'),
(4, 'Jefe de Departamento', '2015-07-14 21:08:02', '2015-07-14 21:02:55'),
(5, 'Profesor(a)', '2015-07-15 16:39:10', '2015-07-15 16:39:10'),
(6, 'Administrativo', '2015-07-15 16:43:07', '2015-07-15 16:43:07'),
(7, 'Secretario(a)', '2015-07-17 22:59:58', '2015-07-15 16:43:25'),
(8, 'Trabajador Manual', '2015-07-15 16:43:41', '2015-07-15 16:43:41'),
(9, 'Soporte Técnico', '2015-07-15 16:45:04', '2015-07-15 16:45:04'),
(10, 'Técnico en Redes', '2015-07-15 16:45:29', '2015-07-15 16:45:29'),
(11, 'Operador', '2015-07-15 16:46:09', '2015-07-15 16:46:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultades`
--

CREATE TABLE IF NOT EXISTS `facultades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `facultad` varchar(45) DEFAULT NULL,
  `created_ad` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `grupo` varchar(45) DEFAULT NULL,
  `idfacultad` int(11) DEFAULT NULL,
  `idcarreras` int(11) DEFAULT NULL,
  `idedificio` int(11) DEFAULT NULL,
  `idsalon` int(11) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horariogrupo`
--

CREATE TABLE IF NOT EXISTS `horariogrupo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idhoras` int(11) DEFAULT NULL,
  `iddia` int(11) DEFAULT NULL,
  `idmateria` int(11) DEFAULT NULL,
  `idsalones` int(11) DEFAULT NULL,
  `idfacultades` int(11) DEFAULT NULL,
  `idcarreras` int(11) DEFAULT NULL,
  `idjornada` int(11) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idhora` int(11) DEFAULT NULL,
  `iddia` int(11) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `idmateria` int(11) DEFAULT NULL,
  `idgrupos` int(11) DEFAULT NULL,
  `idanoestudio` int(11) DEFAULT NULL,
  `idfacultad` int(11) DEFAULT NULL,
  `idcarreras` int(11) DEFAULT NULL,
  `idjornada` int(11) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas`
--

CREATE TABLE IF NOT EXISTS `horas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hora` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornadas`
--

CREATE TABLE IF NOT EXISTS `jornadas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `jornada` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiaqpdud`
--

CREATE TABLE IF NOT EXISTS `materiaqpdud` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idmateria` varchar(45) DEFAULT NULL,
  `iduser` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE IF NOT EXISTS `materias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `materia` varchar(45) DEFAULT NULL,
  `codigomateria` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pais` varchar(45) DEFAULT NULL,
  `isocodigo` varchar(3) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=235 ;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `pais`, `isocodigo`, `updated_at`, `created_at`) VALUES
(1, 'Panamá', 'PAN', NULL, NULL),
(2, 'Afganistán', 'AFG', NULL, NULL),
(3, 'Antillas Neerlandesas', 'AHO', NULL, NULL),
(4, 'Albania', 'ALB', NULL, NULL),
(5, 'Argelia', 'ALG', NULL, NULL),
(6, 'Andorra', 'AND', NULL, NULL),
(7, 'Angola ', 'ANG', NULL, NULL),
(8, 'Antigua y Barbuda', 'ANT', NULL, NULL),
(9, 'Australasia', 'ANZ', NULL, NULL),
(10, 'Argentina', 'ARG', NULL, NULL),
(11, 'Armenia', 'ARM', NULL, NULL),
(12, 'Aruba', 'ARU', NULL, NULL),
(13, 'Samoa Americana', 'ASA', NULL, NULL),
(14, 'Australia', 'AUS', NULL, NULL),
(15, 'Austria', 'AUT', NULL, NULL),
(16, 'Azerbaiyán ', 'AZE', NULL, NULL),
(17, 'Las Bahamas Bahamas', 'BAH', NULL, NULL),
(18, 'Bangladés', 'BAN', NULL, NULL),
(19, 'Barbados', 'BAR', NULL, NULL),
(20, 'Burundi', 'BDI', NULL, NULL),
(21, 'Bélgica', 'BEL', NULL, NULL),
(22, 'Benín ', 'BEN', NULL, NULL),
(23, 'Bermuda', 'BER', NULL, NULL),
(24, 'Bután', 'BHU', NULL, NULL),
(25, 'Bosnia y Herzegovina', 'BIH', NULL, NULL),
(26, 'Birmania', 'MYA', NULL, NULL),
(27, 'Belice', 'BIZ', NULL, NULL),
(28, 'Bielorrusia', 'BLR', NULL, NULL),
(29, 'Bohemia', 'BOH', NULL, NULL),
(30, 'Bolivia', 'BOL', NULL, NULL),
(31, 'Borneo', 'BOR', NULL, NULL),
(32, 'Botsuana', 'BOT', NULL, NULL),
(33, 'Brasil', 'BRA', NULL, NULL),
(34, 'Baréin', 'BRN', NULL, NULL),
(35, 'Brunéi', 'BRU', NULL, NULL),
(36, 'Bulgaria', 'BUL', NULL, NULL),
(37, 'Burkina Faso', 'BUR', NULL, NULL),
(38, 'Indias Occidentales', 'BWI', NULL, NULL),
(39, 'República Centroafricana', 'CAF', NULL, NULL),
(40, 'Camboya', 'CAM', NULL, NULL),
(41, 'Canadá', 'CAN', NULL, NULL),
(42, 'Islas Caimán', 'CAY', NULL, NULL),
(43, 'República del Congo', 'CGO', NULL, NULL),
(44, 'Ceilán', 'CEY', NULL, NULL),
(45, 'Chad', 'CHA', NULL, NULL),
(46, 'Chile', 'CHI', NULL, NULL),
(47, 'República Popular China ', 'CHN', NULL, NULL),
(48, 'Costa de Marfil', 'CIV', NULL, NULL),
(49, 'Camerún', 'CMR', NULL, NULL),
(50, 'Congo-Brazzaville', 'COB', NULL, NULL),
(51, 'República Democrática del Congo ', 'COD', NULL, NULL),
(52, 'Islas Cook', 'COK', NULL, NULL),
(53, 'Colombia', 'COL', NULL, NULL),
(54, 'Comoras', 'COM', NULL, NULL),
(55, 'Congo-Kinshasa', 'CON', NULL, NULL),
(56, 'Cabo Verde', 'CPV', NULL, NULL),
(57, 'Costa Rica', 'CRC', NULL, NULL),
(58, 'Croacia', 'CRO', NULL, NULL),
(59, 'Cuba', 'CUB', NULL, NULL),
(60, 'Chipre', 'CYP', NULL, NULL),
(61, 'República Checa', 'CZE', NULL, NULL),
(62, 'Dahomey', 'DAH', NULL, NULL),
(63, 'Dinamarca', 'DEN', NULL, NULL),
(64, 'Yibuti', 'DJI', NULL, NULL),
(65, 'Dominica', 'DMA', NULL, NULL),
(66, 'República Dominicana', 'DOM', NULL, NULL),
(67, 'Ecuador', 'ECU', NULL, NULL),
(68, 'Egipto', 'EGY', NULL, NULL),
(69, 'Eritrea', 'ERI', NULL, NULL),
(70, 'El Salvador', 'ESA', NULL, NULL),
(71, 'España', 'ESP', NULL, NULL),
(72, 'Estonia', 'EST', NULL, NULL),
(73, 'Etiopía', 'ETH', NULL, NULL),
(74, 'Equipo Alemán Unificado', 'EUA', NULL, NULL),
(75, 'Equipo Unificado', 'EUN', NULL, NULL),
(76, 'Fiyi', 'FIJ', NULL, NULL),
(77, 'Finlandia', 'FIN', NULL, NULL),
(78, 'Francia', 'FRA', NULL, NULL),
(79, 'Germany R.F.A.', 'FRG', NULL, NULL),
(80, 'Estados Federados de Micronesia ', 'FSM', NULL, NULL),
(81, 'Gabón', 'GAB', NULL, NULL),
(82, 'Gambia', 'GAM', NULL, NULL),
(83, 'Reino Unido', 'GBR', NULL, NULL),
(84, 'Guinea-Bisáu', 'GBS', NULL, NULL),
(85, 'Georgia', 'GEO', NULL, NULL),
(86, 'Guinea Ecuatorial', 'GEQ', NULL, NULL),
(87, 'Alemania', 'GER', NULL, NULL),
(88, 'Ghana', 'GHA', NULL, NULL),
(89, 'Grecia', 'GRE', NULL, NULL),
(90, 'Granada', 'GRN', NULL, NULL),
(91, 'Guatemala', 'GUA', NULL, NULL),
(92, 'Guinea', 'GUI', NULL, NULL),
(93, 'Guam', 'GUM', NULL, NULL),
(94, 'Guyana', 'GUY', NULL, NULL),
(95, 'Haití', 'HAI', NULL, NULL),
(96, 'Honduras Británica', 'HBR', NULL, NULL),
(97, 'Hong Kong Hong Kong', 'HKG', NULL, NULL),
(98, 'Holanda  ', 'HOL', NULL, NULL),
(99, 'Honduras', 'HON', NULL, NULL),
(100, 'Hungría', 'HUN', NULL, NULL),
(101, 'Indias Orientales Neerlandesas', 'IHO', NULL, NULL),
(102, 'Indonesia Indonesia', 'INA', NULL, NULL),
(103, 'India', 'IND', NULL, NULL),
(104, 'Irán', 'IRI', NULL, NULL),
(105, 'Irlanda', 'IRL', NULL, NULL),
(106, 'Irak', 'IRQ', NULL, NULL),
(107, 'Islandia', 'ISL', NULL, NULL),
(108, 'Israel', 'ISR', NULL, NULL),
(109, 'Islas Vírgenes de los Estados Unidos', 'ISV', NULL, NULL),
(110, 'Italia', 'ITA', NULL, NULL),
(111, 'Islas Vírgenes Británicas', 'IVB', NULL, NULL),
(112, 'Jamaica', 'JAM', NULL, NULL),
(113, 'Jordania', 'JOR', NULL, NULL),
(114, 'Japón', 'JPN', NULL, NULL),
(115, 'Kazajistán', 'KAZ', NULL, NULL),
(116, 'Kenia', 'KEN', NULL, NULL),
(117, 'Kirguistán', 'KGZ', NULL, NULL),
(118, 'Kiribati', 'KIR', NULL, NULL),
(119, 'Korea del Sur', 'KOR', NULL, NULL),
(120, 'Arabia Saudita', 'KSA', NULL, NULL),
(121, 'Kuwait', 'KUW', NULL, NULL),
(122, 'Laos', 'LAO', NULL, NULL),
(123, 'Letonia', 'LAT', NULL, NULL),
(124, 'Libia', 'LBA', NULL, NULL),
(125, 'Liberia', 'LBR', NULL, NULL),
(126, 'Santa Lucía', 'LCA', NULL, NULL),
(127, 'Lesoto', 'LES', NULL, NULL),
(128, 'Líbano', 'LIB', NULL, NULL),
(129, 'Liechtenstein', 'LIE', NULL, NULL),
(130, 'Lituania', 'LTU', NULL, NULL),
(131, 'Luxemburgo', 'LUX', NULL, NULL),
(132, 'Madagascar', 'MAD', NULL, NULL),
(133, 'Marruecos', 'MAR', NULL, NULL),
(134, 'Malasia', 'MAS', NULL, NULL),
(135, 'Malaui', 'MAW', NULL, NULL),
(136, 'Moldavia', 'MDA', NULL, NULL),
(137, 'Maldivas', 'MDV', NULL, NULL),
(138, 'México', 'MEX', NULL, NULL),
(139, 'Mongolia', 'MGL', NULL, NULL),
(140, 'Islas Marshall', 'MHL', NULL, NULL),
(141, 'Macedonia', 'MKD', NULL, NULL),
(142, 'Malí', 'MLI', NULL, NULL),
(143, 'Malta', 'MLT', NULL, NULL),
(144, 'Montenegro', 'MNE', NULL, NULL),
(145, 'Mónaco', 'MON', NULL, NULL),
(146, 'Mozambique', 'MOZ', NULL, NULL),
(147, 'Mauricio', 'MRI', NULL, NULL),
(148, 'Mauritania', 'MTN', NULL, NULL),
(150, 'Namibia', 'NAM', NULL, NULL),
(151, 'Nicaragua', 'NCA', NULL, NULL),
(152, 'Países Bajos Holanda', 'NED', NULL, NULL),
(153, 'Nepal', 'NEP', NULL, NULL),
(154, 'Nigeria', 'NGR', NULL, NULL),
(155, 'Níger', 'NIG', NULL, NULL),
(156, 'Noruega', 'NOR', NULL, NULL),
(157, 'Nauru', 'NRU', NULL, NULL),
(158, 'Nueva Zelanda ', 'NZL', NULL, NULL),
(159, 'Omán', 'OMA', NULL, NULL),
(160, 'Pakistán', 'PAK', NULL, NULL),
(161, 'Paraguay', 'PAR', NULL, NULL),
(162, 'Perú', 'PER', NULL, NULL),
(163, 'Filipinas', 'PHI', NULL, NULL),
(164, 'Palestina', 'PLE', NULL, NULL),
(165, 'Palaos', 'PLW', NULL, NULL),
(166, 'Papúa Nueva Guinea', 'PNG', NULL, NULL),
(167, 'Polonia', 'POL', NULL, NULL),
(168, 'Portugal', 'POR', NULL, NULL),
(169, 'Corea del Norte', 'PRK', NULL, NULL),
(170, 'Puerto Rico', 'PUR', NULL, NULL),
(171, 'Catar', 'QAT', NULL, NULL),
(172, 'Rodesia del Norte', 'RHN', NULL, NULL),
(173, 'Rodesia', 'RHO', NULL, NULL),
(174, 'Rodesia del Sur', 'RHS', NULL, NULL),
(175, 'Republic of China', 'ROC', NULL, NULL),
(176, 'Rumanía', 'ROU', NULL, NULL),
(177, 'Sudáfrica', 'RSA', NULL, NULL),
(178, 'Imperio Ruso', 'RU1', NULL, NULL),
(179, 'Rusia', 'RUS', NULL, NULL),
(180, 'Ruanda', 'RWA', NULL, NULL),
(181, 'Sarre', 'SAA', NULL, NULL),
(183, 'Samoa', 'SAM', NULL, NULL),
(184, 'Serbia y Montenegro', 'SCG', NULL, NULL),
(185, 'Senegal', 'SEN', NULL, NULL),
(186, 'Seychelles', 'SEY', NULL, NULL),
(187, 'Singapur', 'SIN', NULL, NULL),
(188, 'San Cristóbal y Nieves', 'SKN', NULL, NULL),
(189, 'Sierra Leona ', 'SLE', NULL, NULL),
(190, 'Eslovenia', 'SLO', NULL, NULL),
(191, 'San Marino', 'SMR', NULL, NULL),
(192, 'Islas Salomón', 'SOL', NULL, NULL),
(193, 'Somalia', 'SOM', NULL, NULL),
(194, 'Serbia', 'SRB', NULL, NULL),
(195, 'Sri Lanka ', 'SRI', NULL, NULL),
(196, 'Santo Tomé y Príncipe', 'STP', NULL, NULL),
(197, 'Sudán', 'SUD', NULL, NULL),
(198, 'Suiza', 'SUI', NULL, NULL),
(199, 'Surinam', 'SUR', NULL, NULL),
(200, 'Eslovaquia', 'SVK', NULL, NULL),
(201, 'Suecia', 'SWE', NULL, NULL),
(202, 'Suazilandia', 'SWZ', NULL, NULL),
(203, 'Siria', 'SYR', NULL, NULL),
(204, 'Tanganica', 'TAG', NULL, NULL),
(205, 'República de China', 'TAI', NULL, NULL),
(206, 'Tanzania', 'TAN', NULL, NULL),
(207, 'Checoslovaquia', 'TCH', NULL, NULL),
(208, 'Tonga', 'TGA', NULL, NULL),
(209, 'Tailandia', 'THA', NULL, NULL),
(210, 'Turkmenistán', 'TKM', NULL, NULL),
(211, 'Timor Oriental', 'TLS', NULL, NULL),
(212, 'Togo', 'TOG', NULL, NULL),
(213, 'China Taipéi', 'TPE', NULL, NULL),
(214, 'Trinidad y Tobago', 'TRI', NULL, NULL),
(215, 'Túnez', 'TUN', NULL, NULL),
(216, 'Turquía', 'TUR', NULL, NULL),
(217, 'Tuvalu', 'TUV', NULL, NULL),
(218, 'Emiratos Árabes Unidos', 'UAE', NULL, NULL),
(219, 'República Árabe Unida', 'UAR', NULL, NULL),
(220, 'Uganda', 'UGA', NULL, NULL),
(221, 'Ucrania', 'UKR', NULL, NULL),
(222, 'Uruguay', 'URU', NULL, NULL),
(223, 'Estados Unidos', 'USA', NULL, NULL),
(224, 'Uzbekistán', 'UZB', NULL, NULL),
(225, 'Vanuatu', 'VAN', NULL, NULL),
(226, 'Venezuela', 'VEN', NULL, NULL),
(227, 'Vietnam ', 'VIE', NULL, NULL),
(228, 'San Vicente y las Granadinas', 'VIN', NULL, NULL),
(229, 'Alto Volta', 'VOL', NULL, NULL),
(230, 'República Árabe del Yemen', 'YAR', NULL, NULL),
(231, 'Yemen', 'YEM', NULL, NULL),
(232, 'Zaire', 'ZAI', NULL, NULL),
(233, 'Zambia', 'ZAM', NULL, NULL),
(234, 'Zimbabue', 'ZIM', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE IF NOT EXISTS `provincias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `provincia` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id`, `provincia`, `updated_at`, `created_at`) VALUES
(1, 'Bocas del Toro', NULL, NULL),
(2, 'Coclé', NULL, NULL),
(3, 'Colón', NULL, NULL),
(4, 'Chiriquí', NULL, NULL),
(5, 'Darién', NULL, NULL),
(6, 'Herrera', NULL, NULL),
(7, 'Los Santos', NULL, NULL),
(8, 'Panamá', NULL, NULL),
(9, 'Veraguas', NULL, NULL),
(10, 'Panamá Oeste', NULL, NULL),
(11, 'Emberá Wounaan', NULL, NULL),
(12, 'Guna Yala', NULL, NULL),
(13, 'Ngäbe Buglé', NULL, NULL),
(14, 'Madugandí', NULL, NULL),
(15, 'Wargandí', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rol` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`, `updated_at`, `created_at`) VALUES
(1, 'PROFESOR', '2015-08-13 17:51:59', '2015-08-13 17:51:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salones`
--

CREATE TABLE IF NOT EXISTS `salones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `salon` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE IF NOT EXISTS `sedes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sede` varchar(45) DEFAULT NULL,
  `idprovincia` int(11) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id`, `sede`, `idprovincia`, `updated_at`, `created_at`) VALUES
(1, 'UTP-CENTRO REGIONAL', 0, '2015-07-17 22:11:41', '2015-06-19 16:16:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestres`
--

CREATE TABLE IF NOT EXISTS `semestres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `semestres` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `cedula` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(90) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `idsede` int(11) DEFAULT NULL,
  `idrol` int(11) DEFAULT NULL,
  `idpais` int(11) DEFAULT NULL,
  `idespecialidad` int(11) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `remember_token` varchar(90) DEFAULT NULL,
  `fecha_nac` varchar(45) DEFAULT NULL,
  `iddepartamento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `cedula`, `email`, `password`, `telefono`, `celular`, `idsede`, `idrol`, `idpais`, `idespecialidad`, `updated_at`, `created_at`, `remember_token`, `fecha_nac`, `iddepartamento`) VALUES
(1, 'Anthony', 'Castillo', '4-768-371', 'anthony.castillo@utp.ac.pa', '$2y$10$A9RPacK75aPT2Rc65Z4RQ.CE5lGlcsjtrfwQNlSDnYmJh3cjsmVoW', '730-1470', '6638-0082', 1, 1, 1, 0, '2015-07-20 23:29:07', '2015-07-09 19:10:22', 'a7gFo4VJXdttKwrgi23C6gM2AL0W3gmb8iUeuyrQEiZ3WxPxtNuWx6IJNr4m', '17/09/1992', NULL),
(4, 'Jonathan', 'Castro', '8-776-1571', 'jonathan.castro@utp.ac.pa', '$2y$10$rOyKAZoh5pn8YebvOfL3yuA/3sQiHDfFaRT.EgMH.yF0QYt.t7hD.', '1410', '6776-5745', 1, 3, 3, NULL, '2015-07-14 19:39:47', '2015-07-14 19:39:47', '', '10/07/1984', NULL),
(5, 'Edgardo', 'Pittí', '4-759-372', 'edgardo.pitti@utp.ac.pa', '$2y$10$E4zHKqtFXqyq9H894zvdpupUIi0pgCbCtcUVE1c04It53w0zfbWly', '1234', '----', 1, 2, 1, 6, '2015-07-15 16:48:20', '2015-07-15 16:48:20', '', '28/10/1991', NULL),
(6, 'lobito', 'Palacios', '4-760-3', 'lobito@utp.ac.pa', '$2y$10$LYYGExF84zfnBic3t.MdJO9QB1WSrCk7Z4Jt8oxXDesBhvn/lagJW', '2222221', '55555553', 1, 3, 1, 11, '2015-07-24 15:18:28', '2015-07-24 14:52:55', 'jpizzXS7vRu71LOmvApXiPJ1INWOacNlI6XKiX9dmZmeXMlPVrUmj7T4oqdC', '24/12/1992', NULL),
(7, 'jaime', 'Palacios', '4-760-3', 'jaime.palacios@utp.ac.pa', '$2y$10$2JcgGh3lHtooB52qb5dEIOEbZAnh7SZklVDttxhr2fSY6IJoSBYQm', NULL, '5555555', 1, NULL, 1, 1, '2015-08-13 17:42:48', '2015-08-13 17:42:48', NULL, '24/12/1991', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
