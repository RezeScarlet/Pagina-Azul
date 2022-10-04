-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 04-Out-2022 às 14:51
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
-- Estrutura da tabela `administradores`
--

DROP TABLE IF EXISTS `administradores`;
CREATE TABLE `administradores` (
  `idAdmin` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `administradores`
--

INSERT INTO `administradores` (`idAdmin`, `nome`, `senha`) VALUES
(1, 'guilherme', '$2y$10$bdXjw14Xjx/rJiFhsHd06uwRU3wM0hW5oKWrYsvm22an0UrpoQqIe'),
(2, 'thiago', '$2y$10$bdXjw14Xjx/rJiFhsHd06uwRU3wM0hW5oKWrYsvm22an0UrpoQqIe');

-- --------------------------------------------------------

--
-- Estrutura da tabela `anunciante`
--

DROP TABLE IF EXISTS `anunciante`;
CREATE TABLE `anunciante` (
  `idAnunciante` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `CNPJ` char(18) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `idPlano` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `descricao` varchar(1000) DEFAULT NULL,
  `imgAnuncioP` varchar(50) NOT NULL,
  `imgAnuncioG` varchar(50) DEFAULT NULL,
  `facebook` varchar(60) DEFAULT NULL,
  `instagram` varchar(60) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `whatsapp` varchar(15) DEFAULT NULL,
  `rua` varchar(30) DEFAULT NULL,
  `numero` varchar(3) DEFAULT NULL,
  `bairro` varchar(20) DEFAULT NULL,
  `cidade` varchar(20) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `CEP` char(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `anunciante`
--

INSERT INTO `anunciante` (`idAnunciante`, `nome`, `CNPJ`, `email`, `idPlano`, `idCategoria`, `descricao`, `imgAnuncioP`, `imgAnuncioG`, `facebook`, `instagram`, `telefone`, `celular`, `whatsapp`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `CEP`) VALUES
(1, 'DJ BOOMKITTY', '01.778.130/1000-48', 'a@a', 2, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'djboomkittyP.png', 'djboomkitty.png', 'facebook.com/DJBOOMKITTY', 'intagram.com/DJBOOMKITTY', '92298435', '19992298435', '19992298435', 'Nicolau Paione', '403', 'Descanço', 'Mococa', 'SP', '6789-635'),
(2, 'Fire Design', '02.778.130/2000-48', 'a@a', 2, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'firedesignP.png', 'firedesign.png', 'facebook.com/firedesign', 'intagram.com/firedesign', '92298435', '19992298435', '19992298435', 'Nicolau Paione', '403', 'Descanço', 'Mococa', 'SP', '6789-635'),
(3, 'Ghost Dash', '03.778.130/3000-48', 'a@a', 3, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'ghostdashP.png', 'ghostdash.png', 'facebook.com/ghostdash', 'intagram.com/ghostdash', '92298435', '19992298435', '19992298435', 'Nicolau Paione', '403', 'Descanço', 'Mococa', 'SP', '6789-635'),
(4, 'Hill Top Co-op', '04.778.130/0001-48', 'a@a', 3, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'hilltopcoopP.png', 'hilltopcoop.png', 'facebook.com/hilltopcoop', 'intagram.com/hilltopcoop', '92298435', '19992298435', '19992298435', 'Nicolau Paione', '403', 'Descanço', 'Mococa', 'SP', '6789-635'),
(5, 'Museum', '05.778.130/0001-48', 'a@a', 1, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'museumP.png', 'museum.png', 'facebook.com/museum', 'intagram.com/museum', '92298435', '19992298435', '19992298435', 'Nicolau Paione', '403', 'Descanço', 'Mococa', 'SP', '6789-635'),
(6, 'Orland Groves', '06.778.130/0001-48', 'a@a', 3, 6, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'orlandgrovesP.png', 'orlandgroves.png', 'facebook.com/orlandgroves', 'intagram.com/orlandgroves', '92298435', '19992298435', '19992298435', 'Nicolau Paione', '403', 'Descanço', 'Mococa', 'SP', '6789-635'),
(7, 'Ryan Keller Pharmacy', '07.778.130/0001-48', 'a@a', 3, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'ryankellerpharmacyP.png', 'ryankellerpharmacy.png', 'facebook.com/ryankellerpharmacy', 'intagram.com/ryankellerpharmacy', '92298435', '19992298435', '19992298435', 'Nicolau Paione', '403', 'Descanço', 'Mococa', 'SP', '6789-635'),
(8, 'The Atomic Club', '08.778.130/0001-48', 'a@a', 3, 5, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'theatomicclubP.png', 'theatomicclub.png', 'facebook.com/theatomicclub', 'intagram.com/theatomicclub', '92298435', '19992298435', '19992298435', 'Nicolau Paione', '403', 'Descanço', 'Mococa', 'SP', '6789-635'),
(9, 'Uncle Louies Pizeri', '09.778.130/0001-48', 'a@a', 3, 9, 'Nós da pizzaria Uncle Louies fazemos as melhores pizzas de Mococa e região. As pizzas são feitas a mão pelos nosso melhores chefes e assadas no forno a lenha. Está com fome? Então venha nos conhecer. § pizza pizzaria restaurante comida alimentação alimento garimpo  ', 'unclelouiespizzeriaP.png', 'unclelouiespizzeria.png', 'facebook.com/unclelouiespizzeria', 'intagram.com/unclelouiespizzeria', '92298435', '19992298435', '19992298435', 'Nicolau Paione', '403', 'Descanço', 'Mococa', 'SP', '6789-635'),
(10, 'Yurt', '10.778.130/0001-48', 'a@a', 3, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'yurtP.png', 'yurt.png', 'facebook.com/yurt', 'intagram.com/yurt', '92298435', '19992298435', '19992298435', 'Nicolau Paione', '403', 'Descanço', 'Mococa', 'SP', '6789-635'),
(11, 'Ponto Barato', '10.778.130/0001-48', 'a@a', 3, 7, 'Loja do Rafael e Artur', 'pontobaratoP.png', 'pontobarato.png', 'Trocas e vendas mococa', 'Luksin', '', '35997733094', '35997733094', 'Rua da boa', '000', 'Bairro muito legal', 'Mococa', 'SP', '0000-000'),
(12, 'Amigos Caridosos', NULL, 'amigoscaridosos@a.com', 3, 13, 'Organização de caridade. § ONG caridade doação doar', 'amigoscaridosos.jpg', 'amigoscaridososG.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(12, 'Floricultura', 'floricultura.svg'),
(13, 'ONG', 'ong.svg');

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
  MODIFY `idAnunciante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
