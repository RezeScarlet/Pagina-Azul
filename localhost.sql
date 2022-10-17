-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.24-log
-- Versão do PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `pagina_azul`
--
DROP DATABASE `pagina_azul`;
CREATE DATABASE `pagina_azul` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pagina_azul`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE IF NOT EXISTS `administradores` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `senha` varchar(100) NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `administradores`
--

INSERT INTO `administradores` (`idAdmin`, `nome`, `senha`) VALUES
(1, 'guilherme', '$2y$10$bdXjw14Xjx/rJiFhsHd06uwRU3wM0hW5oKWrYsvm22an0UrpoQqIe'),
(2, 'thiago', '$2y$10$bdXjw14Xjx/rJiFhsHd06uwRU3wM0hW5oKWrYsvm22an0UrpoQqIe'),
(3, 'matheus', '$2y$10$bdXjw14Xjx/rJiFhsHd06uwRU3wM0hW5oKWrYsvm22a...\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `anunciante`
--

CREATE TABLE IF NOT EXISTS `anunciante` (
  `idAnunciante` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `CNPJ` char(18) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `website` varchar(1000) DEFAULT NULL,
  `descricao` varchar(1000) DEFAULT NULL,
  `idPlano` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `facebook` varchar(60) DEFAULT NULL,
  `instagram` varchar(60) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `whatsapp` varchar(15) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `cidade` varchar(20) DEFAULT NULL,
  `CEP` char(9) DEFAULT NULL,
  `bairro` varchar(20) DEFAULT NULL,
  `rua` varchar(30) DEFAULT NULL,
  `numero` varchar(3) DEFAULT NULL,
  `imgAnuncioP` varchar(50) NOT NULL,
  `imgAnuncioG` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idAnunciante`),
  UNIQUE KEY `nome` (`nome`),
  KEY `idPlano` (`idPlano`),
  KEY `idCategoria` (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `anunciante`
--

INSERT INTO `anunciante` (`idAnunciante`, `nome`, `CNPJ`, `email`, `website`, `descricao`, `idPlano`, `idCategoria`, `facebook`, `instagram`, `telefone`, `celular`, `whatsapp`, `estado`, `cidade`, `CEP`, `bairro`, `rua`, `numero`, `imgAnuncioP`, `imgAnuncioG`) VALUES
(1, 'DJ BOOMKITTY', '01.778.130/1000-48', 'djboomkitty@gmail.com', NULL, 'DJ BOOMKITTY, o maior e melhor DJ da região. Agendamos festas e eventos. Com mais de 15 anos de trabalho, somos especializados em som e iluminação. Contate-nos para um momento inesquecível. § festa dj música evento ', 3, 1, 'facebook.com/DJBOOMKITTY', 'intagram.com/DJBOOMKITTY', '92298435', '19992298435', '19992298435', 'SP', 'Mococa', '6789-635', 'Descanço', 'Nicolau Paione', '403', 'djboomkittyP.png', 'djboomkitty.png'),
(2, 'Fire Design', '02.778.130/2000-48', 'firedesign@contato.com', NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 1, 1, 'facebook.com/firedesign', 'intagram.com/firedesign', '92298435', '19992298435', '19992298435', 'SP', 'Tapiratiba', '6789-635', 'Descanço', 'Nicolau Paione', '403', 'firedesignP.png', 'firedesign.png'),
(3, 'Ghost Dash', '03.778.130/3000-48', 'ghostdash@gmail.com', NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 2, 1, 'facebook.com/ghostdash', 'intagram.com/ghostdash', '92298435', '19992298435', '19992298435', 'SP', 'Arceburgo', '6789-635', 'Descanço', 'Nicolau Paione', '403', 'ghostdashP.png', 'ghostdash.png'),
(4, 'Hill Top Co-op', '04.778.130/0001-48', 'hilltopcoop@contato.com', NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 2, 1, 'facebook.com/hilltopcoop', 'intagram.com/hilltopcoop', '92298435', '19992298435', '19992298435', 'SP', 'Mococa', '6789-635', 'Descanço', 'Nicolau Paione', '403', 'hilltopcoopP.png', 'hilltopcoop.png'),
(5, 'Museum', '05.778.130/0001-48', 'museum@outlook.com', NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 1, 2, 'facebook.com/museum', 'intagram.com/museum', '92298435', '19992298435', '19992298435', 'SP', 'Mococa', '6789-635', 'Descanço', 'Nicolau Paione', '403', 'museumP.png', 'museum.png'),
(6, 'Orland Groves', '06.778.130/0001-48', 'orlandgroves@gmail.com', NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 2, 12, 'facebook.com/orlandgroves', 'intagram.com/orlandgroves', '92298435', '19992298435', '19992298435', 'SP', 'Mococa', '6789-635', 'Descanço', 'Nicolau Paione', '403', 'orlandgrovesP.png', 'orlandgroves.png'),
(7, 'Ryan Keller Pharmacy', '07.778.130/0001-48', 'ryankellerpharmacy@sac.com', NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 2, 3, 'facebook.com/ryankellerpharmacy', 'intagram.com/ryankellerpharmacy', '92298435', '19992298435', '19992298435', 'SP', 'Mococa', '6789-635', 'Descanço', 'Nicolau Paione', '403', 'ryankellerpharmacyP.png', 'ryankellerpharmacy.png'),
(8, 'The Atomic Club', '08.778.130/0001-48', 'atomicclub@hotmail.com', NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 2, 5, 'facebook.com/theatomicclub', 'intagram.com/theatomicclub', '92298435', '19992298435', '19992298435', 'SP', 'Mococa', '6789-635', 'Descanço', 'Nicolau Paione', '403', 'theatomicclubP.png', 'theatomicclub.png'),
(9, 'Uncle Louies Pizzeria', '09.778.130/0001-48', 'unclelouiespizza@gmail.com', NULL, 'Nós da Pizzaria Uncle Louies fazemos as melhores pizzas de Mococa e região. As pizzas são feitas a mão pelos nosso melhores chefes e assadas no forno a lenha. Está com fome? Então venha nos conhecer. § pizza pizzaria restaurante comida alimentação alimento  ', 3, 1, 'facebook.com/unclelouiespizzeria', 'intagram.com/unclelouiespizzeria', '92298435', '19992298435', '19992298435', 'SP', 'Mococa', '6789-635', 'Descanço', 'Nicolau Paione', '403', 'unclelouiespizzeriaP.png', 'unclelouiespizzeria.png'),
(10, 'Yurt', '10.778.130/0001-48', 'sac@yurt.com', NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 3, 1, 'facebook.com/yurt', 'intagram.com/yurt', '92298435', '19992298435', '19992298435', 'SP', 'Mococa', '6789-635', 'Descanço', 'Nicolau Paione', '403', 'yurtP.png', 'yurt.png'),
(11, 'Ponto Barato', NULL, 'arthurrafaeltcc00@gmail.com', 'rafael.projetosfreelancer.com.br', 'O Ponto Barato é um E-Commerce com os preços mais acessíveis possíveis do mercado. Fazemos isso Trabalhando Com Fornecedores Nacionais de Extrema Confiança que trabalham com os melhores materiais usados hoje em dia em Peças de Vestuário, Venha Conhecer nosso Catálogo no Botão abaixo. § moda calçado camisetas camisas ténis jaqueta roupa estilo look ', 3, 7, NULL, NULL, '', '35997733094', '35997733094', NULL, NULL, NULL, NULL, NULL, NULL, 'pontobaratoP.png', 'pontobarato.png'),
(12, 'Amigos Caridosos', NULL, 'amigoscaridososs@gmail.com', 'amigoscaridosos.projetosetim.com.br', 'A Amigos Caridosos é uma plataforma de doações online, cujo proposito é ajudar pessoas carentes e que necessitam de ajuda por meio de parcerias com instituições filantrópicas, arrecadando recursos para doar de forma prática e eficiente. § ONG caridade doação doar org instituição doações instituições', 3, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'amigoscaridososP.png', 'amigoscaridosos.png'),
(13, 'Medic On', NULL, 'a@a', NULL, ' § medicina medico saúde terapia ', 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mediconP.png', 'medicon.png'),
(15, 'Rota 66', NULL, 'a@a', NULL, ' § roupa moda camiseta calça loja manto esportiva acessórios bermudas shorts futebol ', 3, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rota66P.png', 'rota66.png'),
(17, 'Vetclin PetShop', NULL, 'etecgrupo9tcc@gmail.com', NULL, ' § pet veterinário animal ração cachorro gato petshop pet shop', 3, 8, NULL, NULL, NULL, '19981335387', '19981335387', NULL, NULL, NULL, NULL, NULL, NULL, 'vetclinP.png', 'vetclin.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `icone` varchar(50) NOT NULL,
  PRIMARY KEY (`idCategoria`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

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

CREATE TABLE IF NOT EXISTS `planos` (
  `idPlano` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(15) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  PRIMARY KEY (`idPlano`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `planos`
--

INSERT INTO `planos` (`idPlano`, `nome`, `descricao`) VALUES
(1, 'Gratuito', 'Plano padrão'),
(2, 'Médio', 'Pago que da acesso ás imagens'),
(3, 'Destaque', 'Pago que da acesso ás imagens');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `anunciante`
--
ALTER TABLE `anunciante`
  ADD CONSTRAINT `idCategoria` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`),
  ADD CONSTRAINT `idPlano` FOREIGN KEY (`idPlano`) REFERENCES `planos` (`idPlano`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
