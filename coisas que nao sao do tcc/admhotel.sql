-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Jan-2017 às 02:44
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admhotel`
--
CREATE DATABASE IF NOT EXISTS `admhotel` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `admhotel`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `admhotel`
--

DROP TABLE IF EXISTS `admhotel`;
CREATE TABLE `admhotel` (
  `id` int(11) NOT NULL,
  `nome_tipo` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `admhotel`:
--   `hotel_id`
--       `hotel` -> `id`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta_de_usuario`
--

DROP TABLE IF EXISTS `conta_de_usuario`;
CREATE TABLE `conta_de_usuario` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` char(64) NOT NULL,
  `administrador` tinyint(1) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `conta_de_usuario`:
--

--
-- Extraindo dados da tabela `conta_de_usuario`
--

INSERT INTO `conta_de_usuario` (`id`, `username`, `password`, `administrador`, `email`) VALUES
(1, 'alemarotti', '51bd61aa53c31c64197ff06fac754d7c47b242602034046335063df31a420aea', 1, 'pvp_marotti@hotmail.com.br'),
(3, 'joao', '51bd61aa53c31c64197ff06fac754d7c47b242602034046335063df31a420aea', 0, 'joaoputao@gmail.com'),
(4, 'cath', '91a8d6026c0b611df4458e86b68a27fc061b8275f3a741186f7904b901cc663c', 0, 'cath.ferreira@hotmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hospedagem`
--

DROP TABLE IF EXISTS `hospedagem`;
CREATE TABLE `hospedagem` (
  `id` int(11) NOT NULL,
  `id_quarto` int(11) NOT NULL,
  `id_hospede` int(11) NOT NULL,
  `data_entrada` datetime NOT NULL,
  `data_saida` datetime DEFAULT NULL,
  `valor` decimal(10,2) NOT NULL,
  `ultima_procedencia` varchar(100) NOT NULL,
  `proximo_destino` varchar(100) NOT NULL,
  `motivo_da_viagem` enum('Lazer-Ferias','Negócios','Congreço-Feira','Parentes-Amigos','Estudos-Curso','Religião','Saúde','Compras','Outros') NOT NULL,
  `meio_de_transporte` enum('Avião','Automovel','Ônibus','Moto','Navio-Barco','Trem','Outro') NOT NULL,
  `numero_de_hospedes` int(2) NOT NULL,
  `estado_hospedagem` enum('ativa','finalizada') NOT NULL DEFAULT 'ativa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `hospedagem`:
--   `id_quarto`
--       `quarto` -> `id`
--   `id_hospede`
--       `hospede` -> `id`
--

--
-- Extraindo dados da tabela `hospedagem`
--

INSERT INTO `hospedagem` (`id`, `id_quarto`, `id_hospede`, `data_entrada`, `data_saida`, `valor`, `ultima_procedencia`, `proximo_destino`, `motivo_da_viagem`, `meio_de_transporte`, `numero_de_hospedes`, `estado_hospedagem`) VALUES
(1, 1, 1, '2017-01-03 13:30:00', NULL, '66.00', 'Rio de Janeiro', 'Lumiar', 'Saúde', 'Automovel', 2, 'ativa'),
(2, 2, 2, '2017-01-03 18:30:10', NULL, '66.00', 'Nova Friburgo', 'Rio de Janeiro', 'Negócios', 'Ônibus', 1, 'ativa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hospede`
--

DROP TABLE IF EXISTS `hospede`;
CREATE TABLE `hospede` (
  `id` int(11) NOT NULL,
  `nome` varchar(90) NOT NULL,
  `cpf` char(11) DEFAULT NULL,
  `identidade` char(15) DEFAULT NULL,
  `cep` char(8) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cidade` varchar(90) DEFAULT NULL,
  `estado` varchar(90) DEFAULT NULL,
  `pais` varchar(90) DEFAULT NULL,
  `telefone` varchar(11) NOT NULL,
  `sexo` enum('masculino','feminino') DEFAULT NULL,
  `data_nascimento` varchar(8) DEFAULT NULL,
  `profissao` varchar(90) DEFAULT NULL,
  `nacionalidade` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `hospede`:
--

--
-- Extraindo dados da tabela `hospede`
--

INSERT INTO `hospede` (`id`, `nome`, `cpf`, `identidade`, `cep`, `endereco`, `cidade`, `estado`, `pais`, `telefone`, `sexo`, `data_nascimento`, `profissao`, `nacionalidade`) VALUES
(1, 'Alexandre Marotti da Fonseca Temporal', '06218100707', '272174251', '28610015', 'Praca getulio vargas 171, apto 502', 'Nova Friburgo', 'Rio de Janeiro', 'Brasil', '22998474849', 'masculino', '26041999', 'Estudante', 'Brasileiro'),
(2, 'Silviane Marotti', '89963032753', '137529053', '28610005', 'Rua Dante Laginestra 89', 'Nova Friburgo', 'Rio de janeiro', 'Brasil', '22999353736', 'feminino', '24101964', 'Administradora', 'Brasileira');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hotel`
--

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `cnpj` varchar(14) DEFAULT NULL,
  `nome` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `hotel`:
--

--
-- Extraindo dados da tabela `hotel`
--

INSERT INTO `hotel` (`id`, `cnpj`, `nome`) VALUES
(1, '15157069000109', 'Hotel Ale ltda me'),
(2, '30906085000132', 'S M Fonseca - ME');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hotel_usuario`
--

DROP TABLE IF EXISTS `hotel_usuario`;
CREATE TABLE `hotel_usuario` (
  `id` varchar(45) NOT NULL,
  `id_conta_de_usuario` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `hotel_usuario`:
--   `id_conta_de_usuario`
--       `conta_de_usuario` -> `id`
--   `id_hotel`
--       `hotel` -> `id`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_de_consumo`
--

DROP TABLE IF EXISTS `item_de_consumo`;
CREATE TABLE `item_de_consumo` (
  `id` int(11) NOT NULL,
  `id_hospedagem` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `item_de_consumo`:
--   `id_hospedagem`
--       `hospedagem` -> `id`
--   `id_produto`
--       `produto` -> `id`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `precoPadrao` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `produto`:
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `quarto`
--

DROP TABLE IF EXISTS `quarto`;
CREATE TABLE `quarto` (
  `id` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `id_tipo_quarto` int(11) NOT NULL,
  `numeroQuarto` varchar(40) NOT NULL,
  `capacidade_de_pessoas` int(11) DEFAULT NULL,
  `numeroDeCamas` int(11) DEFAULT NULL,
  `precoPadrao` decimal(10,2) DEFAULT NULL,
  `estado` enum('livre','limpando','ocupado','indisponível') NOT NULL DEFAULT 'livre'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `quarto`:
--   `id_tipo_quarto`
--       `tipo_quarto` -> `id`
--   `id_hotel`
--       `hotel` -> `id`
--

--
-- Extraindo dados da tabela `quarto`
--

INSERT INTO `quarto` (`id`, `id_hotel`, `id_tipo_quarto`, `numeroQuarto`, `capacidade_de_pessoas`, `numeroDeCamas`, `precoPadrao`, `estado`) VALUES
(1, 1, 1, '200', 2, 2, '110.00', 'ocupado'),
(2, 1, 1, '201', 2, 2, '110.00', 'ocupado'),
(3, 1, 1, '202', 2, 2, '110.00', 'livre'),
(4, 1, 1, '203', 2, 2, '110.00', 'livre'),
(6, 1, 1, '204', 2, 2, '110.00', 'livre'),
(7, 1, 1, '205', 2, 2, '110.00', 'livre'),
(14, 1, 2, '206', 2, 1, '186.00', 'livre'),
(15, 1, 2, '207', 2, 1, '186.00', 'livre'),
(16, 1, 7, '208', 3, 2, '252.00', 'livre'),
(17, 1, 2, '209', 2, 1, '186.00', 'livre'),
(18, 1, 4, '210', 2, 2, '170.00', 'livre'),
(19, 1, 4, '211', 2, 2, '170.00', 'livre'),
(20, 1, 5, '212', 3, 3, '170.00', 'livre'),
(21, 1, 2, '213', 2, 1, '186.00', 'livre'),
(22, 1, 4, '214', 2, 2, '170.00', 'livre'),
(23, 1, 3, '215', 1, 1, '80.00', 'livre'),
(24, 1, 3, '216', 1, 1, '80.00', 'livre'),
(25, 1, 3, '217', 1, 1, '80.00', 'livre'),
(26, 1, 2, '218', 2, 1, '186.00', 'livre'),
(27, 1, 2, '219', 2, 1, '186.00', 'livre'),
(28, 1, 1, '300', 1, 1, '66.00', 'livre'),
(29, 1, 1, '301', 2, 2, '110.00', 'livre'),
(30, 1, 1, '302', 1, 1, '66.00', 'livre'),
(31, 1, 1, '303', 2, 2, '110.00', 'livre'),
(32, 1, 1, '304', 2, 2, '110.00', 'livre'),
(33, 1, 1, '305', 2, 2, '110.00', 'livre'),
(34, 1, 2, '306', 2, 1, '186.00', 'livre'),
(35, 1, 2, '307', 2, 1, '186.00', 'livre'),
(36, 1, 7, '308', 3, 2, '252.00', 'livre'),
(37, 1, 2, '309', 2, 1, '186.00', 'livre'),
(38, 1, 5, '310', 3, 3, '170.00', 'livre'),
(39, 1, 5, '311', 3, 3, '170.00', 'livre'),
(42, 1, 2, '312', 2, 1, '186.00', 'livre'),
(43, 1, 2, '313', 2, 1, '186.00', 'livre'),
(44, 1, 2, '318', 2, 1, '186.00', 'livre'),
(45, 1, 2, '319', 2, 1, '186.00', 'livre');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

DROP TABLE IF EXISTS `reservas`;
CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `id_hospede` int(11) NOT NULL,
  `data_chegada` datetime NOT NULL,
  `data_prevista_saida` datetime NOT NULL,
  `id_tipo_quarto` int(11) NOT NULL,
  `estadoReserva` tinyint(1) NOT NULL,
  `observacoes` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `reservas`:
--   `id_hospede`
--       `hospede` -> `id`
--   `id_tipo_quarto`
--       `tipo_quarto` -> `id`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_quarto`
--

DROP TABLE IF EXISTS `tipo_quarto`;
CREATE TABLE `tipo_quarto` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `tipo_quarto`:
--

--
-- Extraindo dados da tabela `tipo_quarto`
--

INSERT INTO `tipo_quarto` (`id`, `nome`) VALUES
(1, 'Hostel'),
(2, 'Casal'),
(3, 'Solteiro'),
(4, 'Duplo'),
(5, 'Triplo'),
(6, 'Quintuplo'),
(7, 'Casal + Solteiro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admhotel`
--
ALTER TABLE `admhotel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `conta_de_usuario`
--
ALTER TABLE `conta_de_usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `hospedagem`
--
ALTER TABLE `hospedagem`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hospedagem` (`id_quarto`,`id_hospede`,`data_entrada`),
  ADD KEY `id_hospede` (`id_hospede`);

--
-- Indexes for table `hospede`
--
ALTER TABLE `hospede`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `telefone` (`telefone`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_usuario`
--
ALTER TABLE `hotel_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_conta_de_usuario` (`id_conta_de_usuario`),
  ADD KEY `id_hotel` (`id_hotel`);

--
-- Indexes for table `item_de_consumo`
--
ALTER TABLE `item_de_consumo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produto` (`id_produto`),
  ADD KEY `item_de_consumo_ibfk_1` (`id_hospedagem`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quarto`
--
ALTER TABLE `quarto`
  ADD PRIMARY KEY (`id`,`id_hotel`),
  ADD KEY `id_hotel` (`id_hotel`),
  ADD KEY `fk_id_tipo_quarto` (`id_tipo_quarto`);

--
-- Indexes for table `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_hospede` (`id_hospede`),
  ADD KEY `fk_id_tipo_quarto` (`id_tipo_quarto`);

--
-- Indexes for table `tipo_quarto`
--
ALTER TABLE `tipo_quarto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admhotel`
--
ALTER TABLE `admhotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `conta_de_usuario`
--
ALTER TABLE `conta_de_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `hospedagem`
--
ALTER TABLE `hospedagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hospede`
--
ALTER TABLE `hospede`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quarto`
--
ALTER TABLE `quarto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipo_quarto`
--
ALTER TABLE `tipo_quarto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `admhotel`
--
ALTER TABLE `admhotel`
  ADD CONSTRAINT `admhotel_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`);

--
-- Limitadores para a tabela `hospedagem`
--
ALTER TABLE `hospedagem`
  ADD CONSTRAINT `hospedagem_ibfk_1` FOREIGN KEY (`id_quarto`) REFERENCES `quarto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hospedagem_ibfk_2` FOREIGN KEY (`id_hospede`) REFERENCES `hospede` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `hotel_usuario`
--
ALTER TABLE `hotel_usuario`
  ADD CONSTRAINT `hotel_usuario_ibfk_1` FOREIGN KEY (`id_conta_de_usuario`) REFERENCES `conta_de_usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hotel_usuario_ibfk_2` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `item_de_consumo`
--
ALTER TABLE `item_de_consumo`
  ADD CONSTRAINT `item_de_consumo_ibfk_1` FOREIGN KEY (`id_hospedagem`) REFERENCES `hospedagem` (`id`),
  ADD CONSTRAINT `item_de_consumo_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `quarto`
--
ALTER TABLE `quarto`
  ADD CONSTRAINT `fk_tipo_quarto_id` FOREIGN KEY (`id_tipo_quarto`) REFERENCES `tipo_quarto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quarto_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `fk_hospede` FOREIGN KEY (`id_hospede`) REFERENCES `hospede` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tipo_quarto` FOREIGN KEY (`id_tipo_quarto`) REFERENCES `tipo_quarto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
