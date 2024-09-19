-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/06/2024 às 22:39
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_trab_mat`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_funcionarios`
--

CREATE TABLE `tb_funcionarios` (
  `cod` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `salario` varchar(7) NOT NULL,
  `cargo` varchar(40) NOT NULL,
  `identificacao` int(5) NOT NULL,
  `data_nasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_funcionarios`
--

INSERT INTO `tb_funcionarios` (`cod`, `nome`, `email`, `salario`, `cargo`, `identificacao`, `data_nasc`) VALUES
(1, 'Admin', 'admin@gmail.com', '10000', 'Dono', 1000, '1992-05-16'),
(2, 'João', 'joao@gmail.com', '    200', '        Programador júnior    ', 7995, '2005-08-12'),
(4, 'Marcos', 'marcos@gmail.com', '1700', 'Programador php', 8060, '2006-12-01'),
(6, 'Mateus', 'mateus@gmail.com', '1800', 'Programador Junior Php', 2233, '2006-12-01'),
(7, 'Lucius Junior', 'lucius@gmail.com', ' 100000', '  Diretor  ', 4816, '1970-11-11'),
(8, 'Felipe', 'felipe@gmail.com', ' 2500 ', '  Assistente de administração ', 6677, '1999-05-12');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_funcionarios`
--
ALTER TABLE `tb_funcionarios`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_funcionarios`
--
ALTER TABLE `tb_funcionarios`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
