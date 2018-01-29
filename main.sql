CREATE DATABASE php_db;
USE php_db;
CREATE TABLE `caja_chica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor_inicial` float DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `detalle_caja_chica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_caja_chica` int(11) DEFAULT NULL,
  `tipo_documento` varchar(45) DEFAULT NULL,
  `valor_documento` float DEFAULT NULL,
  `nota` text,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


