-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Nov-2020 às 01:12
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pacientes_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes`
--

CREATE TABLE `pacientes` (
  `Id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `foto` text DEFAULT NULL,
  `nome_mae` varchar(200) NOT NULL,
  `data_nasc` datetime NOT NULL,
  `CPF` varchar(20) NOT NULL,
  `CNS` varchar(20) NOT NULL,
  `endereco` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pacientes`
--

INSERT INTO `pacientes` (`Id`, `nome`, `foto`, `nome_mae`, `data_nasc`, `CPF`, `CNS`, `endereco`) VALUES
(51, 'Larissa Moro', 'arquivos/user_51/Screenshot_2020-11-03_Larissa_Moro_Curriculo_-_Larissa_Moro_Curriculo_1__pdf.png', 'Lori Moro', '1998-03-09 00:00:00', '000.000.000-00', '654 5645 6456 4646', 'Rua  - Bairro , Osório - RS'),
(54, 'Paciente Novo', 'arquivos/user_54/54962550.jpg', 'Maria Aparecida', '1998-07-05 00:00:00', '000.000.000-00', '654 5645 6456 4646', 'Rua  - Bairro , Osório - RS');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
