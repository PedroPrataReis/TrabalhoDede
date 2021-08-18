-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 18-Ago-2021 às 01:30
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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`id`, `email_cliente`, `nome_cliente`, `telefone_cliente`, `bairro`, `rua`, `numero`) VALUES
(10, 'joaozinho@yahoo.com', 'Joao da Silva', 12341234, 'linhares', 'principal', 1234),
(9, 'jose@yahoo.com', 'jose oliveira', 12345678, 'bom jardim', 'principal', 321),
(11, 'joaozinho@gmail.com', 'Joao Silveira', 67452479, 'linhares', 'de cima', 528),
(12, 'carlinhos@gmail.com', 'carlos nogueira', 29434753, 'bom pastor', 'independencia', 3094),
(13, 'joao@gmail.com', 'joao pedro', 39583044, 'centro', 'rio branco', 3494),
(14, 'dede@gmail.com', 'dede', 39482943, 'sao pedro', 'jose da silva', 2049);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_login`
--

DROP TABLE IF EXISTS `tb_login`;
CREATE TABLE IF NOT EXISTS `tb_login` (
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_login`
--

INSERT INTO `tb_login` (`usuario`, `senha`) VALUES
('dede', '12345'),
('jose', '12345'),
('pedro', '12345'),
('admin', 'admin');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_produto`
--

INSERT INTO `tb_produto` (`codigo_produto`, `nome_produto`, `preco_produto`, `descricao_produto`) VALUES
(4, 'X burger', 12.99, 'Pão, bife, queijo, maionese, alface e tomate.'),
(5, 'X egg', 13.99, 'Pão, bife, queijo, ovo, maionese, alface e tomate.'),
(6, 'X egg bacon', 14.99, 'Pão, bife, queijo, ovo, bacon, maionese, alface e tomate.'),
(7, 'Hamburger', 9.99, 'Pão, bife, maionese, alface e tomate.'),
(8, 'X salada', 12.99, 'Pão, queijo, maionese, alface e tomate.'),
(9, 'X tudo', 15.99, 'Pão, dois bifes, queijo, ovo, bacon, maionese, mostarda, batata palha, alface e tomate.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
