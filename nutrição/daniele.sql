-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/01/2026 às 21:10
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `daniele`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `admin`
--

INSERT INTO `admin` (`id_admin`, `nome`, `email`, `senha`) VALUES
(1, 'Daniele', 'daniryangrygor2016@gmail.com', '2703'),
(2, 'Ryan', 'rkryanx7209@gmail.com', '27032009');

-- --------------------------------------------------------

--
-- Estrutura para tabela `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data_agendamento` date NOT NULL,
  `horario` time NOT NULL,
  `nome_servico` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `idade` int(11) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `fk_id_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `nome`, `data_agendamento`, `horario`, `nome_servico`, `telefone`, `idade`, `genero`, `fk_id_cliente`) VALUES
(1, 'ryan', '2026-01-08', '14:30:00', 'Tratamento nutricional para pessoas com diabetes', '12934858110', 16, 'Masculino', NULL),
(2, 'Sonia Aparecida Inacio', '1983-12-01', '18:32:00', 'Atendimento nutricional com foco em emagrecimento feminino e geral', '12934858110', 42, 'Feminino', NULL),
(3, 'ygor', '2026-01-10', '16:00:00', 'Reeducação alimentar e composição corporal', '12934858110', 12, 'Masculino', NULL),
(4, 'Ana Maria', '2026-01-12', '09:00:00', 'Emagrecimento feminino e geral', '12934858110', 66, 'Feminino', NULL),
(5, 'Livia', '2026-01-20', '15:00:00', 'Emagrecimento feminino e geral', '12934858110', 15, 'Feminino', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `id_avaliacao` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `comentario` text NOT NULL,
  `nota` int(11) NOT NULL CHECK (`nota` between 1 and 5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`id_avaliacao`, `nome`, `comentario`, `nota`) VALUES
(1, 'ryan', 'mtooo bommm', 5),
(3, 'Sonia Aparecida Inacio', 'Atendimento humano, explica corretamente, faz uma dieta dentro da minha rotina, preferencia.\r\nExcelente profissional', 5),
(4, 'ygor', 'sistema muito bom atendimento maravilhoso', 5),
(5, 'Ana Maria', 'Ótima profissional.', 4),
(6, 'Livia', 'Muito bom atendimento, fui bem atendida muito bem trata ótima profissional', 5);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Índices de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id_avaliacao`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
