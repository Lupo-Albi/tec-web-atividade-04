-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Nov-2018 às 19:05
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
CREATE DATABASE IF NOT EXISTS `tecweb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tecweb`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

DROP TABLE IF EXISTS `contatos`;
CREATE TABLE IF NOT EXISTS `contatos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `membros`
--

DROP TABLE IF EXISTS `membros`;
CREATE TABLE IF NOT EXISTS `membros` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `datanascimento` date DEFAULT NULL,
  `bio` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `membros`
--

INSERT INTO `membros` (`id`, `nome`, `sobrenome`, `email`, `telefone`, `datanascimento`, `bio`) VALUES
(1, 'Luanderson', 'Martins de Albuquerque', 'luanderson-albuquerque@hotmail.com', '88996354532', '1997-05-07', 'é estudante de Engenharia de Computação na Universidade Federal do Ceará - Campus Sobral. Tem afinidade com programação e quer seguir pela vertente de Ciências da Computação no curso. Tem bastante interesse na área de desenvolvimento de jogos, por isso escolheu seguir essa carreira. Gosta de jogar video game no tempo livre.'),
(2, 'Júlio', 'César Rodrigues de Oliveira', 'jc_96@hotmail.com', '88996662256', '1996-01-05', 'é estudante de engenharia na Universidade Federal do Ceará, Campus Sobral. Dentre as vertentes tem afinidade com a área de telecomunicações. Formado pela EEEP Isaias Gonçalves Damasceno de São Benedito-CE como técnico em Redes de Computadores.'),
(3, 'Igor', 'Linhares', 'frigfeli@gmail.com', '8899936384', '1997-09-08', NULL),
(4, 'Amanda', 'Lima Sousa', 'just.amaanda@gmail.com', '994602740', '1994-02-21', 'é estudante de Engenharia de Computação, viciada em filmes e aspirante em fotografia e design.'),
(5, 'Ricardo', 'de Souza Silva', 'ricardosouza@alu.ufc.br', '88997354640', '1996-12-07', 'é estudante de Engenharia de Computação desde o primeiro semestre de 2015 na Universidade Federal do Ceará – Campus Sobral, dentre as vertentes do curso em questão, tem uma certa afinidade com Ciências da Computação, área escolhida para atuação, inclusive. Até o momento não apresenta qualquer experiência na área profissional, resumindo-se apenas à vida acadêmica.</p>\r\n<p>Dentre as linguagens da área, tem mais afinidade/habilidade com MATLAB, além de ter preferência pelo estudo relacionado à Inteligência Computacional, principalmente no ramo denominado Morfologia Matemática. Embora também tenha interesse pela área de Tecnologias Web.'),
(6, 'Rayon', 'Lindraz Nunes', 'rayonnunes@hotmail.com', '85997488646', '1995-05-15', 'é estudante da Engenharia da Computação - Semestre 2015.1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `membro_has_mensagem`
--

DROP TABLE IF EXISTS `membro_has_mensagem`;
CREATE TABLE IF NOT EXISTS `membro_has_mensagem` (
  `fk_idMembro` int(10) UNSIGNED NOT NULL,
  `fk_idMensagem` int(10) UNSIGNED NOT NULL,
  KEY `fk_idMensagem` (`fk_idMensagem`),
  KEY `fk_idMembro` (`fk_idMembro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

DROP TABLE IF EXISTS `mensagem`;
CREATE TABLE IF NOT EXISTS `mensagem` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `conteudo` varchar(1000) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fk_idContato` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idContato` (`fk_idContato`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vermensagens`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vermensagens`;
CREATE TABLE IF NOT EXISTS `vermensagens` (
`Recebido em` timestamp
,`Remetente` varchar(50)
,`E-mail` varchar(50)
,`Destinatário` varchar(20)
,`Mensagem` varchar(1000)
);

-- --------------------------------------------------------

--
-- Structure for view `vermensagens`
--
DROP TABLE IF EXISTS `vermensagens`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vermensagens`  AS  select `mensagem`.`data` AS `Recebido em`,`contatos`.`nome` AS `Remetente`,`contatos`.`email` AS `E-mail`,`membros`.`nome` AS `Destinatário`,`mensagem`.`conteudo` AS `Mensagem` from (((`contatos` join `mensagem` on((`contatos`.`id` = `mensagem`.`fk_idContato`))) join `membro_has_mensagem` on((`mensagem`.`id` = `membro_has_mensagem`.`fk_idMensagem`))) join `membros` on((`membro_has_mensagem`.`fk_idMembro` = `membros`.`id`))) ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `membro_has_mensagem`
--
ALTER TABLE `membro_has_mensagem`
  ADD CONSTRAINT `fk_idMensagem` FOREIGN KEY (`fk_idMensagem`) REFERENCES `mensagem` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `membro_has_mensagem_ibfk_1` FOREIGN KEY (`fk_idMembro`) REFERENCES `membros` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD CONSTRAINT `fk_idContato` FOREIGN KEY (`fk_idContato`) REFERENCES `contatos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
