-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 14-Jul-2021 às 17:27
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_trabalho`
--
CREATE DATABASE IF NOT EXISTS `bd_trabalho` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bd_trabalho`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

DROP TABLE IF EXISTS `tb_cliente`;
CREATE TABLE IF NOT EXISTS `tb_cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_cliente` varchar(250) NOT NULL,
  `nome_cliente` varchar(50) NOT NULL,
  `telefone_cliente` int(11) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `numero` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`id`, `email_cliente`, `nome_cliente`, `telefone_cliente`, `bairro`, `rua`, `numero`) VALUES
(2, '123', '2', 3, '4', '5', 6),
(3, '1', '2', 3, '4', '5', 6),
(4, '11', '2', 233, '4', '5', 566),
(5, '11', '22', 33, '4', '45', 66),
(6, '1', '2', 33, '4444', '556', 778),
(8, '1', '2', 3, '4', '5', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto`
--

DROP TABLE IF EXISTS `tb_produto`;
CREATE TABLE IF NOT EXISTS `tb_produto` (
  `codigo_produto` int(3) NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(30) NOT NULL,
  `preco_produto` float NOT NULL,
  `descricao_produto` varchar(300) NOT NULL,
  PRIMARY KEY (`codigo_produto`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_produto`
--

INSERT INTO `tb_produto` (`codigo_produto`, `nome_produto`, `preco_produto`, `descricao_produto`) VALUES
(2, 'X burger', 12.99, 'Pão, bife, queijo, maionese, alface e tomate.'),
(3, '1', 2, '3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
