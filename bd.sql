



-- Volcando estructura de base de datos para crudalumno

CREATE DATABASE IF NOT EXISTS `crudalumno` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `crudalumno`;



-- Volcando estructura para tabla crudalumno.alumnos

CREATE TABLE IF NOT EXISTS `alumnos` (

  `Id` int(11) NOT NULL AUTO_INCREMENT,

  `Nombres` varchar(50) NOT NULL,

  `Direccion` varchar(50) NOT NULL,

  PRIMARY KEY (`Id`)

) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;



-- Volcando datos para la tabla crudalumno.alumnos: ~3 rows (aproximadamente)

DELETE FROM `alumnos`;

/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;

INSERT INTO `alumnos` (`Id`, `Nombres`, `Direccion`) VALUES

	(18, 'Cristian rojas', 'lima'),

	(20, 'cristian ', 'puente piedra'),

	(21, 'Yesenia Chavez', 'los olivos');

