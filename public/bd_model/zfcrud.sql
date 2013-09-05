-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 05-Set-2013 às 20:13
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `zfcrud`
--
CREATE DATABASE IF NOT EXISTS `zfcrud` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `zfcrud`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_produtos`
--

CREATE TABLE IF NOT EXISTS `tbl_produtos` (
  `produto_id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_nome` varchar(200) NOT NULL,
  `produto_preco` float(9,2) NOT NULL,
  `produto_foto` varchar(200) NOT NULL,
  `produto_descricao` text NOT NULL,
  `produto_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`produto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
