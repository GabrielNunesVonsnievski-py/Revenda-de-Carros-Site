-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 14/03/2024 às 19h14min
-- Versão do Servidor: 5.5.20
-- Versão do PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `revenda`
--
CREATE DATABASE `revenda` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `revenda`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`codigo`, `nome`) VALUES
(1, 'fiat'),
(2, 'ford'),
(3, 'honda');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo`
--

CREATE TABLE IF NOT EXISTS `modelo` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `codmarca` int(5) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codmarca` (`codmarca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `modelo`
--

INSERT INTO `modelo` (`codigo`, `nome`, `codmarca`) VALUES
(1, 'Uno', 1),
(2, 'Fiesta', 2),
(3, 'Civic', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(10) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codigo`, `nome`, `login`, `senha`) VALUES
(1, 'aaa', 'aaa', '123'),
(2, 'bbb', 'bbb', '123'),
(3, 'bbb', 'bbb', '123'),
(5, 'cris', 'cris', '12345'),
(10, 'aaa', 'aaa', '123'),
(13, 'Stefany', 'aaa', 'aaa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE IF NOT EXISTS `veiculo` (
  `codigo` int(5) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `codmodelo` int(5) NOT NULL,
  `ano` int(5) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `placa` varchar(50) NOT NULL,
  `opcional` varchar(50) NOT NULL,
  `valor` float(10,2) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codmodelo` (`codmodelo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`codigo`, `descricao`, `codmodelo`, `ano`, `cor`, `placa`, `opcional`, `valor`) VALUES
(1, 'vidro eletrico', 1, 2020, 'Branco', '123ABC', 'Escada', 2000000.00),
(2, '3 portas', 2, 2023, 'Preto', '456DEF', 'Parabrisa', 300000.00),
(3, 'Kleber', 3, 2024, 'Preto', '456DEF', 'Putamerda', 500000.00);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`codmarca`) REFERENCES `marca` (`codigo`);

--
-- Restrições para a tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD CONSTRAINT `veiculo_ibfk_1` FOREIGN KEY (`codmodelo`) REFERENCES `modelo` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
