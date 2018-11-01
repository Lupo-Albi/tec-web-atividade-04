-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Nov-2018 às 16:47
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tecweb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE `contatos` (
  `idContato` int(10) UNSIGNED NOT NULL,
  `nome` varchar(20) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `membros`
--

CREATE TABLE `membros` (
  `idMembro` int(10) UNSIGNED NOT NULL,
  `nome` varchar(20) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `datanascimento` date DEFAULT NULL,
  `bio` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `membro_has_mensagem`
--

CREATE TABLE `membro_has_mensagem` (
  `fk_idMembro` int(10) UNSIGNED NOT NULL,
  `fk_idMensagem` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `idMensagem` int(10) UNSIGNED NOT NULL,
  `conteudo` varchar(500) NOT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fk_idContato` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vermensagem`
-- (See below for the actual view)
--
CREATE TABLE `vermensagem` (
`data` timestamp
,`Remetente` varchar(20)
,`Sobrenome` varchar(50)
,`Email` varchar(50)
,`Destinatário` varchar(20)
,`Mensagem` varchar(500)
);

-- --------------------------------------------------------

--
-- Structure for view `vermensagem`
--
DROP TABLE IF EXISTS `vermensagem`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vermensagem`  AS  select `mensagem`.`data` AS `data`,`contatos`.`nome` AS `Remetente`,`contatos`.`sobrenome` AS `Sobrenome`,`contatos`.`email` AS `Email`,`membros`.`nome` AS `Destinatário`,`mensagem`.`conteudo` AS `Mensagem` from (((`contatos` join `mensagem` on((`contatos`.`idContato` = `mensagem`.`fk_idContato`))) join `membro_has_mensagem` on((`mensagem`.`idMensagem` = `membro_has_mensagem`.`fk_idMensagem`))) join `membros` on((`membro_has_mensagem`.`fk_idMembro` = `membros`.`idMembro`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`idContato`);

--
-- Indexes for table `membros`
--
ALTER TABLE `membros`
  ADD PRIMARY KEY (`idMembro`);

--
-- Indexes for table `membro_has_mensagem`
--
ALTER TABLE `membro_has_mensagem`
  ADD KEY `fk_idMembro` (`fk_idMembro`),
  ADD KEY `fk_idMensagem` (`fk_idMensagem`);

--
-- Indexes for table `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`idMensagem`),
  ADD KEY `fk_idContato` (`fk_idContato`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contatos`
--
ALTER TABLE `contatos`
  MODIFY `idContato` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membros`
--
ALTER TABLE `membros`
  MODIFY `idMembro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `idMensagem` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `membro_has_mensagem`
--
ALTER TABLE `membro_has_mensagem`
  ADD CONSTRAINT `fk_idMembro` FOREIGN KEY (`fk_idMembro`) REFERENCES `membros` (`idMembro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idMensagem` FOREIGN KEY (`fk_idMensagem`) REFERENCES `mensagem` (`idMensagem`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD CONSTRAINT `fk_idContato` FOREIGN KEY (`fk_idContato`) REFERENCES `contatos` (`idContato`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
