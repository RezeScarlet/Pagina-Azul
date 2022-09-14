-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 13-Set-2022 às 13:17
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
  `CNPJ` char(18) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `idPlano` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `imgPerfil` varchar(50) DEFAULT NULL,
  `imgAnuncioP` varchar(50) DEFAULT NULL,
  `imgAnuncioG` varchar(50) DEFAULT NULL,
  `whatsapp` varchar(60) NULL,
  `facebook` varchar(60) NULL,
  `instagram` varchar(60) NULL,
  `telefone` varchar(15) NULL,
  `rua` varchar(30) NOT NULL,
  `numero` varchar(4) NOT NULL,
  `bairro` varchar(20) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `estado` char(2) NOT NULL,
  `CEP` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `anunciante`
--

INSERT INTO `anunciante` 
(`idAnunciante`, `nome`, `CNPJ`, `email`, `senha`, `idPlano`, `idCategoria`, `descricao`, `imgPerfil`, `imgAnuncioP`, `imgAnuncioG`, `whatsapp`, `facebook`, `instagram`, `telefone`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `CEP`) VALUES
(1, 'DJ BOOMKITTY', '03.778.130/0001-48', 'a@a', 'c4ca4238a0b923820dcc509a6f75849b', 2, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'djboomkittyP.png', 'djboomkittyP.png', 'djboomkitty.png', 'whatsapp.com/DJBOOMKITTY', 'facebook.com/DJBOOMKITTY', 'intagram.com/DJBOOMKITTY', '19 99229-8435', 'Nicolau Paione', '403', 'Descanço', 'Mococa', 'SP', '6789-635'),
(2, 'Fire Design', '03.778.130/0001-48', 'a@a', 'c4ca4238a0b923820dcc509a6f75849b', 2, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'firedesignP.png', 'firedesignP.png', 'firedesign.png', 'whatsapp.com/firedesign', 'facebook.com/firedesign', 'intagram.com/firedesign', '19 99229-8435', 'Nicolau Paione', '403', 'Descanço', 'Mococa', 'SP', '6789-635'),
(3, 'Ghost Dash', '03.778.130/0001-48', 'a@a', 'c4ca4238a0b923820dcc509a6f75849b',3, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'ghostdashP.png', 'ghostdashP.png', 'ghostdash.png', 'whatsapp.com/ghostdash', 'facebook.com/ghostdash', 'intagram.com/ghostdash', '19 99229-8435', 'Nicolau Paione', '403', 'Descanço', 'Mococa', 'SP', '6789-635'),
(4, 'Hill Top Co-op', '03.778.130/0001-48', 'a@a', 'c4ca4238a0b923820dcc509a6f75849b', 3, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'hilltopcoopP.png', 'hilltopcoopP.png', 'hilltopcoop.png', 'whatsapp.com/hilltopcoop', 'facebook.com/hilltopcoop', 'intagram.com/hilltopcoop', '19 99229-8435', 'Nicolau Paione', '403', 'Descanço', 'Mococa', 'SP', '6789-635'),
(5, 'Museum', '03.778.130/0001-48', 'a@a', 'c4ca4238a0b923820dcc509a6f75849b', 3, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'museumP.png', 'museumP.png', 'museum.png', 'whatsapp.com/museum', 'facebook.com/museum', 'intagram.com/museum', '19 99229-8435', 'Nicolau Paione', '403', 'Descanço', 'Mococa', 'SP', '6789-635'),
(6, 'Orland Groves', '03.778.130/0001-48', 'a@a', 'c4ca4238a0b923820dcc509a6f75849b', 3, 6, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'orlandgrovesP.png', 'orlandgrovesP.png', 'orlandgroves.png', 'whatsapp.com/orlandgroves', 'facebook.com/orlandgroves', 'intagram.com/orlandgroves', '19 99229-8435', 'Nicolau Paione', '403', 'Descanço', 'Mococa', 'SP', '6789-635'),
(7, 'Ryan Keller Pharmacy', '03.778.130/0001-48', 'a@a', 'c4ca4238a0b923820dcc509a6f75849b', 3, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'ryankellerpharmacyP.png', 'ryankellerpharmacyP.png', 'ryankellerpharmacy.png', 'whatsapp.com/ryankellerpharmacy', 'facebook.com/ryankellerpharmacy', 'intagram.com/ryankellerpharmacy', '19 99229-8435', 'Nicolau Paione', '403', 'Descanço', 'Mococa', 'SP', '6789-635'),
(8, 'The Atomic Club', '03.778.130/0001-48', 'a@a', 'c4ca4238a0b923820dcc509a6f75849b', 3, 5, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'theatomicclubP.png', 'theatomicclubP.png', 'theatomicclub.png', 'whatsapp.com/theatomicclub', 'facebook.com/theatomicclub', 'intagram.com/theatomicclub', '19 99229-8435', 'Nicolau Paione', '403', 'Descanço', 'Mococa', 'SP', '6789-635'),
(9, 'Uncle Louies Pizeri', '03.778.130/0001-48', 'a@a', 'c4ca4238a0b923820dcc509a6f75849b', 3, 9, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'unclelouiespizzeriaP.png', 'unclelouiespizzeriaP.png', 'unclelouiespizzeria.png', 'whatsapp.com/unclelouiespizzeria', 'facebook.com/unclelouiespizzeria', 'intagram.com/unclelouiespizzeria', '19 99229-8435', 'Nicolau Paione', '403', 'Descanço', 'Mococa', 'SP', '6789-635'),
(10, 'Yurt', '03.778.130/0001-48', 'a@a', 'c4ca4238a0b923820dcc509a6f75849b', 3, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'yurtP.png', 'yurtP.png', 'yurt.png', 'whatsapp.com/yurt', 'facebook.com/yurt', 'intagram.com/yurt', '19 99229-8435', 'Nicolau Paione', '403', 'Descanço', 'Mococa', 'SP', '6789-635');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `icone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nome`, `icone`) VALUES
(1, 'Alimentação', 'alimentacao.svg'),
(2, 'Educação', 'educacao.svg'),
(3, 'Saúde', 'saude.svg'),
(4, 'Construção', 'construcao.svg'),
(5, 'Imobiliária', 'imobiliaria.svg'),
(6, 'Automotivo', 'automotivo.svg'),
(7, 'Moda', 'moda.svg'),
(8, 'Pet', 'pet.svg'),
(9, 'Turismo', 'turismo.svg'),
(10, 'Perfumaria', 'perfumaria.svg'),
(11, 'Esportes', 'esporte.svg'),
(12, 'Floricultura', 'floricultura.svg');

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
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `planos`
--
ALTER TABLE `planos`
  MODIFY `idPlano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
