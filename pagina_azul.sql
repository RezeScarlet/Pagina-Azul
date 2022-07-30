-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 30-Jul-2022 às 00:14
-- Versão do servidor: 5.7.36
-- versão do PHP: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pagina azul`
--
CREATE DATABASE IF NOT EXISTS `pagina azul` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pagina azul`;

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
(1, 'Microsoft', 3),
(2, 'Netflix', 3),
(3, 'Meta', 3),
(4, 'Crunchyroll', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncio`
--

CREATE TABLE `anuncio` (
  `idAnuncio` int(11) NOT NULL,
  `idPlano` int(11) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `idAnunciante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `anuncio`
--

INSERT INTO `anuncio` (`idAnuncio`, `idPlano`, `imagem`, `link`, `nome`, `idAnunciante`) VALUES
(1, 3, 'assets/img-anunciante/microsoft/microsoft.png', '', 'Microsoft', 1),
(3, 3, 'assets/img-anunciante/netflix/netflix.png', '', 'Netflix', 2),
(2, 3, 'assets/img-anunciante/meta/meta.png', '', 'Meta', 3),
(4, 3, 'assets/img-anunciante/crunchyroll/crunchyroll.png', '', 'Crunchyroll', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paginaanunciante`
--

CREATE TABLE `paginaanunciante` (
  `idPagina` int(11) NOT NULL,
  `nomeLoja` varchar(100) NOT NULL,
  `idPlano` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `contato` varchar(100) DEFAULT NULL,
  `imagemBanner` varchar(100) DEFAULT NULL,
  `imagemLoja` varchar(100) DEFAULT NULL,
  `imagemPerfil` varchar(100) DEFAULT NULL,
  `social` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

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
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anunciante`
--
ALTER TABLE `anunciante`
  ADD PRIMARY KEY (`idAnunciante`),
  ADD UNIQUE KEY `Nome` (`nome`),
  ADD KEY `idPlano` (`idPlano`);

--
-- Índices para tabela `anuncio`
--
ALTER TABLE `anuncio`
  ADD PRIMARY KEY (`idAnuncio`),
  ADD KEY `fk_anuncio_planos` (`idPlano`),
  ADD KEY `idAnunciante` (`idAnunciante`),
  ADD KEY `Nome` (`nome`);

--
-- Índices para tabela `paginaanunciante`
--
ALTER TABLE `paginaanunciante`
  ADD PRIMARY KEY (`idPagina`),
  ADD KEY `fk_pagina_anunciante_planos` (`idPlano`);

--
-- Índices para tabela `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`idPlano`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anunciante`
--
ALTER TABLE `anunciante`
  MODIFY `idAnunciante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `anuncio`
--
ALTER TABLE `anuncio`
  MODIFY `idAnuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `paginaanunciante`
--
ALTER TABLE `paginaanunciante`
  MODIFY `idPagina` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `planos`
--
ALTER TABLE `planos`
  MODIFY `idPlano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
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
