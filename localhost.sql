-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 05-Nov-2022 às 23:42
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
(2, 'thiago', '$2y$10$bdXjw14Xjx/rJiFhsHd06uwRU3wM0hW5oKWrYsvm22an0UrpoQqIe'),
(3, 'matheus', '$2y$10$bdXjw14Xjx/rJiFhsHd06uwRU3wM0hW5oKWrYsvm22an0UrpoQqIe'),
(4, 'guif', '$2y$10$bdXjw14Xjx/rJiFhsHd06uwRU3wM0hW5oKWrYsvm22an0UrpoQqIe');

-- --------------------------------------------------------

--
-- Estrutura da tabela `anunciante`
--

DROP TABLE IF EXISTS `anunciante`;
CREATE TABLE `anunciante` (
  `idAnunciante` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `CNPJ` char(18) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `website` varchar(1000) DEFAULT NULL,
  `descricao` varchar(1000) DEFAULT NULL,
  `idPlano` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `facebook` varchar(60) DEFAULT NULL,
  `instagram` varchar(60) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) NOT NULL,
  `whatsapp` varchar(15) DEFAULT NULL,
  `idCidade` int(11) DEFAULT NULL,
  `CEP` char(9) DEFAULT NULL,
  `bairro` varchar(1000) DEFAULT NULL,
  `rua` varchar(1000) DEFAULT NULL,
  `numero` varchar(3) DEFAULT NULL,
  `imgAnuncioP` varchar(50) NOT NULL,
  `imgAnuncioG` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `anunciante`
--

INSERT INTO `anunciante` (`idAnunciante`, `nome`, `slug`, `CNPJ`, `email`, `website`, `descricao`, `idPlano`, `idCategoria`, `facebook`, `instagram`, `telefone`, `celular`, `whatsapp`, `idCidade`, `CEP`, `bairro`, `rua`, `numero`, `imgAnuncioP`, `imgAnuncioG`) VALUES
(1, 'DJ BOOMKITTY', 'dj-boomkitty', '01.778.130/1000-48', 'djboomkitty@gmail.com', 'https://djboomkitty.com.br', 'DJ BOOMKITTY, o maior e melhor DJ da região. Agendamos festas e eventos. Com mais de 15 anos de trabalho, somos especializados em som e iluminação. Contate-nos para um momento inesquecível. § festa dj música evento ', 3, 14, 'facebook.com/DJBOOMKITTY', 'instagram.com/DJBOOMKITTY', '1936752857', '19992298435', '19992298435', 1, '6789-635', 'Descanso', 'Rua Nicolau Paione', '403', 'djboomkittyP.png', 'djboomkitty.png'),
(2, 'Fire Design', 'fire-design', '02.778.130/2000-48', 'contato@firedesign.com', 'https://firedesign.com.br', 'Atuamos no mercado a mais de 15 anos. Nosso objetivo é simplificar e tornar acessível o aspecto digital do Marketing através do design. Contate-nos se deseja renovar o visual de sua marca com planos em conta, ou se preferir, aprender mais sobre o mundo do desenho industrial.', 1, 15, 'facebook.com/firedesign', 'instagram.com/firedesign', '1936752857', '19992298435', '19992298435', 2, '6789-635', 'Jardim Renascer', 'Avenida Gerson Pereira de Souza', '34', 'firedesignP.png', 'firedesign.png'),
(3, 'Ghost Dash', 'ghost-dash', '03.778.130/3000-48', 'ghostdash@gmail.com', NULL, 'Parque temático de terror no centro de Arceburgo. Apavore-se com atrações de arrepiar os cabelos: mais de 12 brinquedos para viver um outubro como nenhum outro. Entradas a partir de R$40,00. § susto Halloween assustador medo horror', 2, 14, 'facebook.com/ghostdash', 'instagram.com/ghostdash', '1936752857', '19992298435', '19992298435', 3, '6789-635', 'Centro', 'Rua Afonso Pena', '247', 'ghostdashP.png', 'ghostdash.png'),
(4, 'Hill Top Co-op', 'hill-top-coop', '04.778.130/0001-48', 'sac@hilltopcoop.com', 'https://hilltopcoop.com.br', 'A Hill Top Co-op trabalha com alimentos frescos e naturais, sem conservantes e agrotóxicos. Prezamos pela alimentação saudável da população brasileira e atuamos em diversas fazendas da região para garantir a saúde de sua família. § cenoura comida', 3, 1, 'facebook.com/hilltopcoop', 'instagram.com/hilltopcoop', '1936752857', '19992298435', '19992298435', 1, '6789-635', 'Jardim São Francisco', 'Rua Adolfo Fernandes Pinheiro', '45', 'hilltopcoopP.png', 'hilltopcoop.png'),
(5, 'Museum', 'museum', '05.778.130/0001-48', 'museum@outlook.com', 'http://museum.org.br', 'O novo museu de conservação histórica da cidade de Mococa apresenta exposições sobre a época do café com leite e grandes barões do café. Agende sua visita em nosso site e experiencie uma viagem ao passado. § exposição', 1, 2, 'facebook.com/museum', 'instagram.com/museum', '1936752857', '19992298435', '19992298435', 1, '6789-635', 'Centro', 'Rua Alferes Pedrosa', '89', 'museumP.png', 'museum.png'),
(6, 'Orland Groves', 'orland-groves', '06.778.130/0001-48', 'orlandgroves@gmail.com', 'https://orlandgroves.net', 'Lanchonete tradicional da cidade, fundada em 1964, tem como principal item do cardápio as deliciosas sobremesas de laranja, mas também sucos e batidas, além de tudo que uma lanchonete tradicional oferece. Venha conhecer e se refrescar com a tradição cítrica de Mococa! § restaurante limonada refresco refrescos suco bebida bebidas comida', 2, 1, 'facebook.com/orlandgroves', 'instagram.com/orlandgroves', '1936752857', '19992298435', '19992298435', 1, '6789-635', 'Jardim São Domingos', 'Rua Adalberto S. Figueiredo', '112', 'orlandgrovesP.png', 'orlandgroves.png'),
(7, 'Ryan Keller Pharmacy', 'ryan-keller-pharmacy', '07.778.130/0001-48', 'sac@ryankeller.com', 'https://ryankellerpharmacy.com.br', 'Rede de farmácias com maior qualidade e melhores preços da cidade. Criada em 2015 por profissionais com experiência em drogarias, com a missão de levar saúde e bem-estar à população, em um ambiente acolhedor e com atendimento profissional. § remédio remédios drogaria farmácia genéricos ', 2, 3, 'facebook.com/ryankellerpharmacy', 'instagram.com/ryankellerpharmacy', '1936752857', '19992298435', '19992298435', 1, '6789-635', 'Jardim Riachuelo', 'Rua Agustinho Baptistela', '306', 'ryankellerpharmacyP.png', 'ryankellerpharmacy.png'),
(8, 'The Atomic Club', 'the-atomic-club', '08.778.130/0001-48', 'atomiclub@hotmail.com', 'https://atomiclub.net', 'A The Atomic Club atua no segmento imobiliário, especializada na compra e venda, aluguel, financiamento, loteamentos e lançamentos imobiliários, e ainda, imóveis rurais e lazer. § casa casas terrenos ', 2, 5, 'facebook.com/theatomicclub', 'instagram.com/theatomicclub', '1936752857', '19992298435', '19992298435', 1, '6789-635', 'Loteamento Pôr do Sol I', 'Rua Antônio Felippe Nery', '5', 'theatomicclubP.png', 'theatomicclub.png'),
(9, 'Uncle Louies Pizzeria', 'uncle-louies-pizzeria', '09.778.130/0001-48', 'unclelouiespizza@gmail.com', NULL, 'Nós da Pizzaria Uncle Louies preparamos as melhores pizzas de Mococa e região. As pizzas são feitas a mão pelos nosso melhores chefes e assadas no forno a lenha. Está com fome? Então venha nos conhecer. § pizza pizzaria restaurante comida alimentação alimento ', 2, 1, 'facebook.com/unclelouiespizzeria', 'instagram.com/unclelouiespizzeria', '1936752857', '19992298435', '19992298435', 1, '6789-635', 'Conjunto Habitacional Gilberto Rossetti', 'Rua Mariano Niero', '81', 'unclelouiespizzeriaP.png', 'unclelouiespizzeria.png'),
(10, 'Yurt', 'yurt', '10.778.130/0001-48', 'sac@yurt.com', 'https://yurt.com.br', 'Trabalhamos com laticínios em toda região. Sediados em Mococa, nos destacamos na produção de leite e derivados, mas principalmente nosso delicioso iogurte, vencedor de diversos prêmios nacionais e internacionais. Venha conferir nossos produtos! § danone queijo yogurt yoghurt bebidas láctea comida', 3, 1, 'facebook.com/yurt', 'instagram.com/yurt', '1936752857', '19992298435', '19992298435', 1, '6789-635', 'Distrito Industrial II', 'Rua Algemiro Lopes', '158', 'yurtP.png', 'yurt.png'),
(11, 'Ponto Barato', 'ponto-barato', NULL, 'arthurrafaeltcc00@gmail.com', 'http://rafael.projetosfreelancer.com.br', 'O Ponto Barato é um E-Commerce com os preços mais acessíveis possíveis do mercado. Fazemos isso trabalhando com fornecedores nacionais de extrema confiança que trabalham com os melhores materiais usados hoje em dia em peças de vestuário. Venha conhecer nosso site! § moda calçado camisetas camisas tênis jaqueta roupa estilo look ', 3, 7, NULL, 'instagram.com/rafael_henriquee2004', NULL, '35997733094', '35997733094', NULL, NULL, NULL, NULL, NULL, 'pontobaratoP.png', 'pontobarato.png'),
(12, 'Amigos Caridosos', 'amigos-caridosos', NULL, 'amigoscaridososs@gmail.com', 'http://amigoscaridosos.projetosetim.com.br', 'A Amigos Caridosos é uma plataforma de doações online, cujo proposito é ajudar pessoas carentes e que necessitam de ajuda por meio de parcerias com instituições filantrópicas, arrecadando recursos para doar de forma prática e eficiente. § ONG caridade doação doar org instituição doações instituições', 3, 13, NULL, NULL, '1936560052', '19998154427', '19998154427', NULL, NULL, NULL, NULL, NULL, 'amigoscaridososP.png', 'amigoscaridosos.png'),
(13, 'Medic On', 'medic-on', NULL, 'tccgigikemmy@gmail.com', 'http://medicon.projetosetim.com.br', 'A Medic On é um ambiente virtual que oferece um espaço aos usuários do serviço particular de saúde para agendar e realizar consultas on-line, retornos, bem como consultar seus compromissos com o estabelecimento de saúde. § medicina medico saúde terapia', 3, 3, NULL, NULL, NULL, '19997389790', '19997389790', NULL, NULL, NULL, NULL, NULL, 'mediconP.png', 'medicon.png'),
(15, 'Rota 66', 'rota-66', NULL, 'rota66@teste.com.br', 'http://rota66.projetosetim.com.br', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum nulla nobis amet facere nemo exercitationem, expedita, nisi cupiditate impedit temporibus accusantium provident enim pariatur rem nihil! Facere odio corrupti similique culpa tempore. § roupa moda camiseta calça loja manto esportiva acessórios bermudas shorts futebol ', 3, 7, NULL, NULL, NULL, '19997389790', '19997389790', NULL, NULL, NULL, NULL, NULL, 'rota66P.png', 'rota66.png'),
(17, 'Vetclin PetShop', 'vetclin-petshop', NULL, 'etecgrupo9tcc@gmail.com', 'http://petshoplive.projetosetim.com.br', 'A Vetclin PetShop existe com o intuito de ser um ambiente virtual que permite aos tutores de animais domésticos encontrar os produtos necessários para criação e conforto de seus melhores amigos, em um ambiente seguro e de fácil utilização. Visite nosso site e confira nosso catálogo! § pet veterinário animal ração cachorro gato petshop pet shop', 3, 8, NULL, NULL, NULL, '19981335387', '19981335387', NULL, NULL, NULL, NULL, NULL, 'vetclinP.png', 'vetclin.png');

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
(13, 'ONG', 'ong.svg'),
(14, 'Entretenimento', 'entretenimento.svg'),
(15, 'Design', 'design.svg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

DROP TABLE IF EXISTS `cidades`;
CREATE TABLE `cidades` (
  `idCidade` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `estado` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`idCidade`, `nome`, `estado`) VALUES
(1, 'Mococa', 'SP'),
(2, 'Tapiratiba', 'SP'),
(3, 'Arceburgo', 'MG');

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
(1, 'Gratuito', 'Plano padrão'),
(2, 'Médio', 'Pago que da acesso ás imagens'),
(3, 'Destaque', 'Pago que da acesso ás imagens');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `anunciante`
--
ALTER TABLE `anunciante`
  ADD PRIMARY KEY (`idAnunciante`),
  ADD UNIQUE KEY `nome` (`nome`),
  ADD KEY `idPlano` (`idPlano`),
  ADD KEY `idCategoria` (`idCategoria`),
  ADD KEY `idCidade` (`idCidade`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indexes for table `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`idCidade`);

--
-- Indexes for table `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`idPlano`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administradores`
--
ALTER TABLE `administradores`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `anunciante`
--
ALTER TABLE `anunciante`
  MODIFY `idAnunciante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cidades`
--
ALTER TABLE `cidades`
  MODIFY `idCidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `idCidade` FOREIGN KEY (`idCidade`) REFERENCES `cidades` (`idCidade`),
  ADD CONSTRAINT `idPlano` FOREIGN KEY (`idPlano`) REFERENCES `planos` (`idPlano`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
