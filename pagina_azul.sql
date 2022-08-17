-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 17-Ago-2022 às 14:55
-- Versão do servidor: 5.6.34
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pagina_azul`
--
CREATE DATABASE IF NOT EXISTS `pagina_azul` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pagina_azul`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `anunciante`
--

CREATE TABLE `anunciante` (
  `idAnunciante` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `idPlano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `anunciante`
--

INSERT INTO `anunciante` (`idAnunciante`, `nome`, `idPlano`) VALUES
(1, 'DJ BOOMKITTY', 1),
(2, 'Fire Design', 2),
(3, 'Ghost Dash', 3),
(4, 'Hill Top Co-op', 3),
(5, 'Museum', 3),
(6, 'Orland Groves', 3),
(7, 'Ryan Keller Pharmacy', 3),
(8, 'The Atomic Club', 3),
(9, 'Uncle Louies Pizeri', 3),
(10, 'Yurt', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncio`
--

CREATE TABLE `anuncio` (
  `idAnuncio` int(11) NOT NULL,
  `idPlano` int(11) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `imagemP` varchar(100) DEFAULT NULL,
  `nome` varchar(20) NOT NULL,
  `idAnunciante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `anuncio`
--

INSERT INTO `anuncio` (`idAnuncio`, `idPlano`, `imagem`, `imagemP`, `nome`, `idAnunciante`) VALUES
(1, 1, 'djboomkitty.png', 'djboomkittyP.png', 'DJ BOOMKITTY', 1),
(2, 2, 'firedesign.png', 'firedesignP.png', 'Fire Design', 2),
(3, 3, 'ghostdash.png', 'ghostdashP.png', 'Ghost Dash', 3),
(4, 3, 'hilltopcoop.png', 'hilltopcoopP.png', 'Hill Top Co-op', 4),
(5, 3, 'museum.png', 'museumP.png', 'Museum', 5),
(6, 3, 'orlandgroves.png', 'orlandgrovesP.png', 'Orland Groves', 6),
(7, 3, 'ryankellerpharmacy.png', 'ryankellerpharmacyP.png', 'Ryan Keller Pharmacy', 7),
(8, 3, 'theatomicclub.png', 'theatomicclubP.png', 'The Atomic Club', 8),
(9, 3, 'unclelouiespizzeria.png', 'unclelouiespizzeriaP.png', 'Uncle Louies Pizeri', 9),
(10, 3, 'yurt.png', 'yurtP.png', 'Yurt', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `nomeCategoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `paginaanunciante` (
  `idPagina` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `idPlano` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `imagemPerfil` varchar(100) DEFAULT NULL,
  `idAnunciante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `paginaanunciante`
--

INSERT INTO `paginaanunciante` (`idPagina`, `nome`, `idPlano`, `descricao`, `imagemPerfil`, `idAnunciante`) VALUES
(1, 'DJ BOOMKITTY', 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'djboomkittyP.png', 1),
(2, 'Fire Design', 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',  'firedesignP.png', 2),
(3, 'Ghost Dash', 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'ghostdashP.png', 3),
(4, 'Hill Top Co-op', 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'hilltopcoopP.png', 4),
(5, 'Museum', 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'museumP.png', 5),
(6, 'Orland Groves', 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'orlandgrovesP.png', 6),
(7, 'Ryan Keller Pharmacy', 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'ryankellerpharmacyP.png', 7),
(8, 'The Atomic Club', 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'theatomicclubP.png', 8),
(9, 'Uncle Louies Pizeri', 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'unclelouiespizzeriaP.png', 9),
(10, 'Yurt', 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'yurtP.png', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos`
--

CREATE TABLE `planos` (
  `idPlano` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `tamanho` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `planos`
--

INSERT INTO `planos` (`idPlano`, `nome`, `tamanho`) VALUES
(1, 'Gratuito', 'Pequeno'),
(2, 'Pago 1', 'Grande'),
(3, 'Pago 2', 'Grande e pequeno');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anunciante`
--
ALTER TABLE `anunciante`
  ADD PRIMARY KEY (`idAnunciante`),
  ADD UNIQUE KEY `Nome` (`nome`),
  ADD KEY `idPlano` (`idPlano`);

--
-- Indexes for table `anuncio`
--
ALTER TABLE `anuncio`
  ADD PRIMARY KEY (`idAnuncio`),
  ADD KEY `fk_anuncio_planos` (`idPlano`),
  ADD KEY `idAnunciante` (`idAnunciante`),
  ADD KEY `Nome` (`nome`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indexes for table `paginaanunciante`
--
ALTER TABLE `paginaanunciante`
  ADD PRIMARY KEY (`idPagina`),
  ADD KEY `fk_pagina_anunciante_planos` (`idPlano`),
  ADD KEY `nome` (`nome`),
  ADD KEY `idAnunciante` (`idAnunciante`);

--
-- Indexes for table `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`idPlano`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anunciante`
--
ALTER TABLE `anunciante`
  MODIFY `idAnunciante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `anuncio`
--
ALTER TABLE `anuncio`
  MODIFY `idAnuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `paginaanunciante`
--
ALTER TABLE `paginaanunciante`
  MODIFY `idPagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `planos`
--
ALTER TABLE `planos`
  MODIFY `idPlano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `idAnunciante` FOREIGN KEY (`idAnunciante`) REFERENCES `anunciante` (`idAnunciante`),
  ADD CONSTRAINT `idPlano` FOREIGN KEY (`idPlano`) REFERENCES `anunciante` (`idPlano`),
  ADD CONSTRAINT `nome` FOREIGN KEY (`nome`) REFERENCES `anunciante` (`nome`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
