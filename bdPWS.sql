-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 16, 2022 at 04:51 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rafael`
--

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designacaosocial` varchar(65) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` int(9) NOT NULL,
  `nif` int(11) NOT NULL,
  `morada` varchar(100) NOT NULL,
  `codigopostal` varchar(100) NOT NULL,
  `localidade` varchar(50) NOT NULL,
  `capitalsocial` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `empresas`
--

INSERT INTO `empresas` (`id`, `designacaosocial`, `email`, `telefone`, `nif`, `morada`, `codigopostal`, `localidade`, `capitalsocial`) VALUES
(1, 'Tecnologia Digital', 'tecnologiadigital@hotmail.com', 262123842, 231574967, 'Rua das Lampreias, nº12', '2450-521', 'Lisboa', 20);

-- --------------------------------------------------------

--
-- Table structure for table `faturas`
--

DROP TABLE IF EXISTS `faturas`;
CREATE TABLE IF NOT EXISTS `faturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` int(4) NOT NULL,
  `total` int(4) NOT NULL,
  `ivatotal` int(4) NOT NULL,
  `data` date NOT NULL,
  `estado` enum('lancamento','emitida') NOT NULL,
  `empresa_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `funcionario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_empresa_idx` (`empresa_id`),
  KEY `fk_cliente_idx` (`cliente_id`),
  KEY `fk_funcionario_idx` (`funcionario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faturas`
--

INSERT INTO `faturas` (`id`, `valor`, `total`, `ivatotal`, `data`, `estado`, `empresa_id`, `cliente_id`, `funcionario_id`) VALUES
(1, 12, 22, 11, '2022-05-12', 'lancamento', 1, 1, 4),
(2, 33, 33, 33, '2022-05-22', 'lancamento', 1, 1, 4),
(3, 31, 44, 44, '2022-01-22', 'emitida', 1, 1, 4),
(4, 11, 12, 55, '2022-05-19', 'emitida', 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `ivas`
--

DROP TABLE IF EXISTS `ivas`;
CREATE TABLE IF NOT EXISTS `ivas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `percentagem` int(2) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `vigor` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ivas`
--

INSERT INTO `ivas` (`id`, `percentagem`, `descricao`, `vigor`) VALUES
(1, 23, 'Taxa Normal', 3),
(2, 13, 'Taxa Intermédia', 4),
(3, 6, 'Taxa Reduzida', 1),
(4, 20, 'Taxa especial', 2);

-- --------------------------------------------------------

--
-- Table structure for table `linhafaturas`
--

DROP TABLE IF EXISTS `linhafaturas`;
CREATE TABLE IF NOT EXISTS `linhafaturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(2) NOT NULL,
  `valor` int(2) NOT NULL,
  `valorIVA` int(2) NOT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `fatura_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fatura_idx` (`fatura_id`),
  KEY `fk_produto_idx` (`produto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `linhafaturas`
--

INSERT INTO `linhafaturas` (`id`, `quantidade`, `valor`, `valorIVA`, `produto_id`, `fatura_id`) VALUES
(1, 2, 33, 12, 1, 1),
(2, 3, 11, 11, 1, 1),
(3, 4, 22, 1, 2, 1),
(4, 5, 4, 23, 2, 1),
(5, 6, 56, 22, 3, 1),
(6, 7, 6, 44, 3, 2),
(7, 8, 7, 22, 4, 2),
(8, 9, 89, 11, 4, 2),
(9, 1, 99, 22, 5, 2),
(10, 12, 9, 33, 5, 2),
(11, 33, 11, 4, 6, 3),
(12, 44, 2, 5, 6, 3),
(13, 55, 3, 6, 7, 3),
(14, 11, 4, 7, 7, 3),
(15, 22, 5, 8, 8, 3),
(16, 33, 6, 11, 8, 4),
(17, 44, 78, 2, 9, 4),
(18, 22, 8, 3, 9, 4),
(19, 11, 8, 4, 10, 4),
(20, 11, 9, 5, 10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` int(5) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `stock` int(2) NOT NULL,
  `preco` int(4) NOT NULL,
  `iva_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iva_idx` (`iva_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produtos`
--

INSERT INTO `produtos` (`id`, `referencia`, `descricao`, `stock`, `preco`, `iva_id`) VALUES
(1, 12345, 'processador', 4, 80, 1),
(2, 54321, 'gráfica', 10, 120, 2),
(3, 67293, 'motherboard', 8, 100, 3),
(4, 19273, 'rato', 25, 30, 1),
(5, 25183, 'teclado', 40, 40, 2),
(6, 52713, 'tapete', 55, 15, 3),
(7, 18273, 'memória ram', 32, 40, 1),
(8, 63723, 'caixa', 18, 35, 2),
(9, 23138, 'cooler', 43, 23, 3),
(10, 35212, 'fonte de alimentação', 14, 35, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` int(9) NOT NULL,
  `nif` int(11) NOT NULL,
  `morada` varchar(100) NOT NULL,
  `codigopostal` varchar(100) NOT NULL,
  `localidade` varchar(50) NOT NULL,
  `role` enum('admin','cliente','funcionario') DEFAULT NULL,
  `empresa_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_empresa_user_idx` (`empresa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `telefone`, `nif`, `morada`, `codigopostal`, `localidade`, `role`, `empresa_id`) VALUES
(1, 'rafa', '123', 'rafa@gmail.com', 987222222, 241593271, 'Rua do Mosteiro nº23', '2304-231', 'Bemposta', 'cliente', 1),
(2, 'joao', '123', 'joao@gmail.com', 968279555, 212348123, 'Travessa do Leitão nº2', '3421-123', 'boavista', 'cliente', 1),
(3, 'tiago', '123', 'tiago@gmail.com', 987654321, 222912123, 'Oliveira dos Nomes nº2', '2341-234', 'alcobaca', 'cliente', 1),
(4, 'miguel', '1234', 'miguel@gmail.com', 932165478, 271231123, 'Largo do Tonto', '4590-123', 'maiorga', 'funcionario', 1),
(5, 'nuno', '123', 'nuno@gmail.com', 931245678, 231958573, 'Rua do Pinhão', '1932-123', 'nazare', 'admin', 1),
(6, 'gui', '123', 'gui.naosei@homtail.com', 912389523, 228361745, 'Venda das Raparigas', '2133-123', 'Santarém', 'funcionario', 1),
(7, 'dario', '123', 'dario@homtail.com', 912389523, 228361745, 'rua123', '2133-123', 'etubal', 'cliente', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faturas`
--
ALTER TABLE `faturas`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empresa` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_funcionario` FOREIGN KEY (`funcionario_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `linhafaturas`
--
ALTER TABLE `linhafaturas`
  ADD CONSTRAINT `fk_fatura` FOREIGN KEY (`fatura_id`) REFERENCES `faturas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produto` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_iva` FOREIGN KEY (`iva_id`) REFERENCES `ivas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_empresa_user` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
