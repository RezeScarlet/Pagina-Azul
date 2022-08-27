-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 24-Ago-2022 às 12:28
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
DROP DATABASE IF EXISTS `pagina_azul`;
CREATE DATABASE IF NOT EXISTS `pagina_azul` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pagina_azul`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `anunciante`
--

DROP TABLE IF EXISTS `anunciante`;
CREATE TABLE `anunciante` (
  `idAnunciante` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `idPlano` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `imgPerfil` varchar(50) DEFAULT NULL,
  `imgAnuncioP` varchar(50) DEFAULT NULL,
  `imgAnuncioG` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `anunciante`
--

INSERT INTO `anunciante` (`idAnunciante`, `nome`, `idPlano`, `idCategoria`, `descricao`, `imgPerfil`, `imgAnuncioP`, `imgAnuncioG`) VALUES
(1, 'DJ BOOMKITTY', 2, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'djboomkittyP.png', 'djboomkittyP.png', 'djboomkitty.png'),
(2, 'Fire Design', 2, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'firedesignP.png', 'firedesignP.png', 'firedesign.png'),
(3, 'Ghost Dash', 3, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'ghostdashP.png', 'ghostdashP.png', 'ghostdash.png'),
(4, 'Hill Top Co-op', 3, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'hilltopcoopP.png', 'hilltopcoopP.png', 'hilltopcoop.png'),
(5, 'Museum', 3, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'museumP.png', 'museumP.png', 'museum.png'),
(6, 'Orland Groves', 3, 6, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'orlandgrovesP.png', 'orlandgrovesP.png', 'orlandgroves.png'),
(7, 'Ryan Keller Pharmacy', 3, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'ryankellerpharmacyP.png', 'ryankellerpharmacyP.png', 'ryankellerpharmacy.png'),
(8, 'The Atomic Club', 3, 5, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'theatomicclubP.png', 'theatomicclubP.png', 'theatomicclub.png'),
(9, 'Uncle Louies Pizeri', 3, 9, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'unclelouiespizzeriaP.png', 'unclelouiespizzeriaP.png', 'unclelouiespizzeria.png'),
(10, 'Yurt', 3, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'yurtP.png', 'yurtP.png', 'yurt.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nome`) VALUES
(1, 'Alimentacao'),
(6, 'Automotivo'),
(4, 'Construcao'),
(2, 'Educacao'),
(11, 'Esportes'),
(5, 'Imobiliaria'),
(7, 'Moda'),
(10, 'Perfumaria'),
(8, 'Pet'),
(3, 'Saude'),
(9, 'Turismo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `idLogin` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`idLogin`, `email`, `senha`) VALUES
(1, 'a@d', '0'),
(2, 'q@a', '8'),
(3, 'o@asd', 'ffa5deff0cd53a933b0917a37e53e33b');

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos`
--

DROP TABLE IF EXISTS `planos`;
CREATE TABLE `planos` (
  `idPlano` int(11) NOT NULL,
  `nome` varchar(15) NOT NULL,
  `descricao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `planos`
--

INSERT INTO `planos` (`idPlano`, `nome`, `descricao`) VALUES
(1, 'Gratuito', 'Plano padrão.'),
(2, 'Pago 1', 'Pago que da acesso ás imagens '),
(3, 'Pago 2', 'Pago que da acesso ás imagens ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anunciante`
--
ALTER TABLE `anunciante`
  ADD PRIMARY KEY (`idAnunciante`),
  ADD UNIQUE KEY `nome` (`nome`),
  ADD KEY `idPlano` (`idPlano`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idLogin`),
  ADD UNIQUE KEY `email` (`email`);

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
  MODIFY `idAnunciante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `idCategoria` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`),
  ADD CONSTRAINT `idPlano` FOREIGN KEY (`idPlano`) REFERENCES `planos` (`idPlano`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
