-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Nov-2017 às 18:48
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
  `Supervisor` varchar(50) DEFAULT NULL,
  `Gerente` varchar(50) DEFAULT NULL,
  `Id_usuario` int(11) DEFAULT NULL,
  `Nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`Id_funcionario`, `Id_cargo`, `Supervisor`, `Gerente`, `Id_usuario`, `Nome`) VALUES
(1, 4, 'Joao Vidotti', 'Marcelo Chiste', 4, 'Peao da Silva'),
(2, 1, NULL, NULL, 1, 'Carlysson Andrey de Oliveira'),
(3, 3, 'Joao Vidotti', NULL, 3, 'Marcelo Chisté'),
(4, 1, NULL, 'Marcelo Chisté', 2, 'Joao Vidotti'),
(6, 4, 'Carlos Tiberio', 'Fernando Donizete', 8, 'Ashton Kutcher'),
(7, 2, '', 'Fernando Donizete', 6, 'Carlos Tiberio'),
(8, 3, 'Carlos Tiberio', NULL, 7, 'Fernando Donizete'),
(9, 1, NULL, NULL, 5, 'Kalgros Andrey de Oliveira');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `Id_tarefa` int(11) NOT NULL,
  `Id_funcionario` int(11) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `DataLimite` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tarefas`
--

INSERT INTO `tarefas` (`Id_tarefa`, `Id_funcionario`, `descricao`, `DataLimite`) VALUES
(1, 1, 'Botar o lixo pra fora', '2017-10-29'),
(2, 1, 'Varrer a frente do prédio', '2017-10-29');

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
(1, 'Presidente1@gmail.com', '210596ca'),
(2, 'Supervisor1@gmail.com', '210596ca'),
(3, 'Gerente1@gmail.com', '210596ca'),
(4, 'Colaborador1@gmail.com', '210596ca'),
(5, 'Presidente2@gmail.com', '210596ca'),
(6, 'Supervisor2@gmail.com', '210596ca'),
(7, 'Gerente2@gmail.com', '210596ca'),
(8, 'Colaborador2@gmail.com', '210596ca');

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
  ADD KEY `Id_usuario` (`Id_usuario`);

--
-- Indexes for table `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`Id_tarefa`),
  ADD KEY `Id_funcionario` (`Id_funcionario`);

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
  MODIFY `Id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `Id_tarefa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`Id_cargo`) REFERENCES `cargo` (`Id_cargo`),
  ADD CONSTRAINT `funcionario_ibfk_4` FOREIGN KEY (`Id_usuario`) REFERENCES `usuario` (`Id_usuario`);

--
-- Limitadores para a tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD CONSTRAINT `tarefas_ibfk_1` FOREIGN KEY (`Id_funcionario`) REFERENCES `funcionario` (`Id_funcionario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
