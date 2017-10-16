-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Out-2017 às 21:25
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lp22`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `Id_cargo` int(11) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`Id_cargo`, `Nome`) VALUES
(1, 'Presidente'),
(2, 'Supervisor'),
(3, 'Gerente'),
(4, 'Colaborador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `Id_funcionario` int(11) NOT NULL,
  `Id_cargo` int(11) DEFAULT NULL,
  `Id_supervisor` int(11) DEFAULT NULL,
  `Id_gerente` int(11) DEFAULT NULL,
  `Id_usuario` int(11) DEFAULT NULL,
  `Nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`Id_funcionario`, `Id_cargo`, `Id_supervisor`, `Id_gerente`, `Id_usuario`, `Nome`) VALUES
(1, 4, 2, 1, 4, 'Peao da Silva'),
(2, 1, NULL, NULL, 1, 'Carlysson Andrey de Oliveira'),
(3, 3, 1, 1, 3, 'Marcelho Chisté');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gerente`
--

CREATE TABLE `gerente` (
  `Id_gerente` int(11) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `gerente`
--

INSERT INTO `gerente` (`Id_gerente`, `Nome`) VALUES
(1, 'Marcelho Chisté'),
(2, 'Fernando Donizete');

-- --------------------------------------------------------

--
-- Estrutura da tabela `supervisor`
--

CREATE TABLE `supervisor` (
  `Id_supervisor` int(11) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `supervisor`
--

INSERT INTO `supervisor` (`Id_supervisor`, `Nome`) VALUES
(1, 'Joao Vidotti'),
(2, 'Carlos Tiberio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `Id_usuario` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`Id_usuario`, `email`, `senha`) VALUES
(1, 'Presidente', '210596ca'),
(2, 'Supervisor', '210596ca'),
(3, 'Gerente', '210596ca'),
(4, 'Colaborador', '210596ca');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`Id_cargo`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`Id_funcionario`),
  ADD KEY `Id_cargo` (`Id_cargo`),
  ADD KEY `Id_gerente` (`Id_gerente`),
  ADD KEY `Id_supervisor` (`Id_supervisor`),
  ADD KEY `Id_usuario` (`Id_usuario`);

--
-- Indexes for table `gerente`
--
ALTER TABLE `gerente`
  ADD PRIMARY KEY (`Id_gerente`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`Id_supervisor`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `Id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `Id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `gerente`
--
ALTER TABLE `gerente`
  MODIFY `Id_gerente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `Id_supervisor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`Id_cargo`) REFERENCES `cargo` (`Id_cargo`),
  ADD CONSTRAINT `funcionario_ibfk_2` FOREIGN KEY (`Id_gerente`) REFERENCES `gerente` (`Id_gerente`),
  ADD CONSTRAINT `funcionario_ibfk_3` FOREIGN KEY (`Id_supervisor`) REFERENCES `supervisor` (`Id_supervisor`),
  ADD CONSTRAINT `funcionario_ibfk_4` FOREIGN KEY (`Id_usuario`) REFERENCES `usuario` (`Id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
