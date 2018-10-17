-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `livros`;
CREATE TABLE `livros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cod_livro` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `livros` (`id`, `nome`, `cod_livro`, `autor`) VALUES
(9,	'Programando em PHP',	'12345',	'PHP'),
(10,	'ProgramaÃ§Ã£o Para Adolescentes Para Leigos',	'9348186',	'McCue,Camille'),
(11,	'ProgramaÃ§Ã£o de Jogos Android - Estruturas Fundamentais - 2Âª Ed. 2016',	'9329402',	'Damiani,Edgard B.');

-- 2018-10-17 19:06:00
