-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Ago-2017 às 20:23
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sippa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `matricula` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `nome`, `usuario`, `senha`, `email`, `matricula`) VALUES
(144, 'adsudd', '', '', '', 'uiashd'),
(145, 'kk', '', '', '', 'kk'),
(146, 'joÃ£o ', '', '', '', '2433435'),
(147, 'Davi', '', '', '', '123456789'),
(148, 'Mayk', '', '', '', '637463543242342434324'),
(149, 'borel', '', '', '', '2424'),
(150, 'Ana Leticia', '', '', '', '283533');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aula`
--

CREATE TABLE `aula` (
  `id` int(11) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `data` datetime NOT NULL,
  `cod_disciplina` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `cod` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`cod`, `nome`) VALUES
(3, 'TÃ©cnico em InformÃ¡tica'),
(7, 'TÃ©cnico em AgroindÃºstria'),
(11, 'TÃ©cnico em MecÃ¢nica');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `cod` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`cod`, `nome`) VALUES
(3, 'LaboratÃ³rio de Software'),
(4, 'LaboratÃ³rio Web'),
(5, 'LaboratÃ³rio de Hardware'),
(6, 'matemÃ¡tica'),
(7, 'Geografia'),
(8, 'Ana Leticia Gata'),
(9, 'Legal'),
(10, 'te amo vocÃªs '),
(11, 'arroz'),
(12, 'pÃ£o');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina_curso`
--

CREATE TABLE `disciplina_curso` (
  `cod` int(11) NOT NULL,
  `ano` varchar(10) DEFAULT NULL,
  `semestre` varchar(20) DEFAULT NULL,
  `cod_curso` int(11) DEFAULT NULL,
  `cod_disciplina` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `cod` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`cod`, `nome`, `usuario`, `senha`, `email`) VALUES
(2, 'Chico Dalker de Oliveira Pinheiro', 'dalkerpinheiro', '123qwe', 'dalkerpinheiro@hotmail.com'),
(3, 'Samuel Nunes', 'samuelnunes', '123qwe', 'samuelnunes@hotmail.com'),
(4, 'Dougras', 'Douglas', 'chuchu', 'douglasGato@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cod_disciplina` (`cod_disciplina`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `disciplina_curso`
--
ALTER TABLE `disciplina_curso`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `cod_curso` (`cod_curso`),
  ADD KEY `cod_disciplina` (`cod_disciplina`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT for table `aula`
--
ALTER TABLE `aula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `disciplina_curso`
--
ALTER TABLE `disciplina_curso`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aula`
--
ALTER TABLE `aula`
  ADD CONSTRAINT `aula_ibfk_1` FOREIGN KEY (`cod_disciplina`) REFERENCES `disciplina` (`cod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `disciplina_curso`
--
ALTER TABLE `disciplina_curso`
  ADD CONSTRAINT `disciplina_curso_ibfk_1` FOREIGN KEY (`cod_curso`) REFERENCES `curso` (`cod`),
  ADD CONSTRAINT `disciplina_curso_ibfk_2` FOREIGN KEY (`cod_disciplina`) REFERENCES `disciplina` (`cod`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
