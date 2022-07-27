-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 27-Jul-2022 às 15:03
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
CREATE DATABASE IF NOT EXISTS `pagina azul` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pagina azul`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncio`
--

DROP TABLE IF EXISTS `anuncio`;
CREATE TABLE IF NOT EXISTS `anuncio` (
  `idAnuncio` int(11) NOT NULL AUTO_INCREMENT,
  `idPlano` int(11) NOT NULL,
  `idLoja` int(11) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `textoAuxiliar` varchar(100) NOT NULL,
  PRIMARY KEY (`idAnuncio`),
  KEY `fk_anuncio_planos` (`idPlano`),
  KEY `fk_anuncio_pagina_anunciante` (`idLoja`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagina_anunciante`
--

DROP TABLE IF EXISTS `pagina_anunciante`;
CREATE TABLE IF NOT EXISTS `pagina_anunciante` (
  `idLoja` int(11) NOT NULL AUTO_INCREMENT,
  `nomeLoja` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `contato` varchar(100) NOT NULL,
  `imagemBanner` varchar(100) NOT NULL,
  `imagemLoja` varchar(100) NOT NULL,
  `imagemPerfil` varchar(100) NOT NULL,
  `social` varchar(100) NOT NULL,
  `idPlano` int(11) NOT NULL,
  PRIMARY KEY (`idLoja`),
  KEY `fk_pagina_anunciante_planos` (`idPlano`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos`
--

DROP TABLE IF EXISTS `planos`;
CREATE TABLE IF NOT EXISTS `planos` (
  `idPlano` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `tamanho` varchar(100) NOT NULL,
  PRIMARY KEY (`idPlano`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `planos`
--

INSERT INTO `planos` (`idPlano`, `descricao`, `tamanho`) VALUES
(1, 'Gratuito', 'Pequeno'),
(2, 'Pago 1', 'Grande'),
(3, 'Pago 2', 'Grande e pequeno');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
