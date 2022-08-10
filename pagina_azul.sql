-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 03-Ago-2022 às 15:01
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pagina azul`
--
DROP DATABASE IF EXISTS `pagina azul`; 

CREATE DATABASE IF NOT EXISTS `pagina azul` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pagina azul`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `anunciante`
--

DROP TABLE IF EXISTS `anunciante`;
CREATE TABLE IF NOT EXISTS `anunciante` (
  `idAnunciante` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `idPlano` int(11) NOT NULL,
  PRIMARY KEY (`idAnunciante`),
  UNIQUE KEY `Nome` (`nome`),
  KEY `idPlano` (`idPlano`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `anunciante`
--

INSERT INTO `anunciante` (`idAnunciante`, `nome`, `idPlano`) VALUES
(1, 'Batata', 3),
(2, 'Boi', 3),
(3, 'Burg', 3),
(4, 'Controle', 3),
(5, 'Dragão', 3),
(6, 'Esporte', 3),
(7, 'Folha', 3),
(8, 'Gato', 3),
(9, 'Macaco', 3),
(10, 'Montanha', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncio`
--

DROP TABLE IF EXISTS `anuncio`;
CREATE TABLE IF NOT EXISTS `anuncio` (
  `idAnuncio` int(11) NOT NULL AUTO_INCREMENT,
  `idPlano` int(11) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `imagemP` varchar(100) DEFAULT NULL,
  `link` varchar(100) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `idAnunciante` int(11) NOT NULL,
  PRIMARY KEY (`idAnuncio`),
  KEY `fk_anuncio_planos` (`idPlano`),
  KEY `idAnunciante` (`idAnunciante`),
  KEY `Nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `anuncio`
--

INSERT INTO `anuncio` (`idAnuncio`, `idPlano`, `imagem`, `imagemP`, `link`, `nome`, `idAnunciante`) VALUES
(1, 3, 'assets/img/img-anunciante/batata.png', 'assets/img/img-anunciante/batataP.png', '', 'Batata', 1),
(2, 3, 'assets/img/img-anunciante/boi.png', 'assets/img/img-anunciante/boiP.png', '', 'Boi', 2),
(3, 3, 'assets/img/img-anunciante/burg.png', 'assets/img/img-anunciante/burgP.png', '', 'Burg', 3),
(4, 3, 'assets/img/img-anunciante/controle.png', 'assets/img/img-anunciante/controleP.png', '', 'Controle', 4),
(5, 3, 'assets/img/img-anunciante/dragao.png', 'assets/img/img-anunciante/dragaoP.png', '', 'Dragão', 5),
(6, 3, 'assets/img/img-anunciante/esporte.png', 'assets/img/img-anunciante/esporteP.png', '', 'Esporte', 6),
(7, 3, 'assets/img/img-anunciante/folha.png', 'assets/img/img-anunciante/folhaP.png', '', 'Folha', 7),
(8, 3, 'assets/img/img-anunciante/gato.png', 'assets/img/img-anunciante/gatoP.png', '', 'Gato', 8),
(9, 3, 'assets/img/img-anunciante/macaco.png', 'assets/img/img-anunciante/macacoP.png', '', 'Macaco', 9),
(10, 3, 'assets/img/img-anunciante/montanha.png', 'assets/img/img-anunciante/montanhaP.png', '', 'Montanha', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCategoria` varchar(30) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nomeCategoria`) VALUES
(1, 'Alimentacao'),
(2, 'Educacao'),
(3, 'Saude'),
(4, 'Construcao'),
(5, 'Imobiliaria'),
(6, 'Automotivo'),
(7, 'Moda'),
(8, 'Pet'),
(9, 'Turismo'),
(10, 'Perfumaria'),
(11, 'Esportes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paginaanunciante`
--

DROP TABLE IF EXISTS `paginaanunciante`;
CREATE TABLE IF NOT EXISTS `paginaanunciante` (
  `idPagina` int(11) NOT NULL AUTO_INCREMENT,
  `nomeLoja` varchar(100) NOT NULL,
  `idPlano` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `contato` varchar(100) DEFAULT NULL,
  `imagemBanner` varchar(100) DEFAULT NULL,
  `imagemLoja` varchar(100) DEFAULT NULL,
  `imagemPerfil` varchar(100) DEFAULT NULL,
  `social` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idPagina`),
  KEY `fk_pagina_anunciante_planos` (`idPlano`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos`
--

DROP TABLE IF EXISTS `planos`;
CREATE TABLE IF NOT EXISTS `planos` (
  `idPlano` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `tamanho` varchar(100) NOT NULL,
  PRIMARY KEY (`idPlano`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `planos`
--

INSERT INTO `planos` (`idPlano`, `nome`, `tamanho`) VALUES
(1, 'Gratuito', 'Pequeno'),
(2, 'Pago 1', 'Grande'),
(3, 'Pago 2', 'Grande e pequeno');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `anunciante`
--
ALTER TABLE `anunciante`
  ADD CONSTRAINT `anunciante_ibfk_1` FOREIGN KEY (`idPlano`) REFERENCES `planos` (`idPlano`);

--
-- Limitadores para a tabela `anuncio`
--
ALTER TABLE `anuncio`
  ADD CONSTRAINT `anuncio_ibfk_1` FOREIGN KEY (`idPlano`) REFERENCES `anunciante` (`idPlano`),
  ADD CONSTRAINT `anuncio_ibfk_2` FOREIGN KEY (`idAnunciante`) REFERENCES `anunciante` (`idAnunciante`),
  ADD CONSTRAINT `anuncio_ibfk_3` FOREIGN KEY (`nome`) REFERENCES `anunciante` (`nome`);

--
-- Limitadores para a tabela `paginaanunciante`
--
ALTER TABLE `paginaanunciante`
  ADD CONSTRAINT `idPlano` FOREIGN KEY (`idPlano`) REFERENCES `anunciante` (`idPlano`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
