-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 20/05/2025 às 15:14
-- Versão do servidor: 8.0.41-0ubuntu0.22.04.1
-- Versão do PHP: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `locadora`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `Aluguel`
--

CREATE TABLE `Aluguel` (
  `codigo` int NOT NULL,
  `data_hora` datetime DEFAULT NULL,
  `id_usuario` int DEFAULT NULL,
  `data_devolucao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Fita`
--

CREATE TABLE `Fita` (
  `codigo` int NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `diretor` varchar(100) DEFAULT NULL,
  `codigo_sessao` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Fita_Aluguel`
--

CREATE TABLE `Fita_Aluguel` (
  `codigo_fita` int NOT NULL,
  `codigo_aluguel` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Sessao`
--

CREATE TABLE `Sessao` (
  `codigo` int NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `localizacao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Usuario`
--

CREATE TABLE `Usuario` (
  `id` int NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `Usuario`
--

INSERT INTO `Usuario` (`id`, `nome`, `email`, `endereco`, `telefone`) VALUES
(2, 'otavio', 'as@gmail.com', 'av dos imigrant', '359993434555');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `Aluguel`
--
ALTER TABLE `Aluguel`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `Fita`
--
ALTER TABLE `Fita`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `codigo_sessao` (`codigo_sessao`);

--
-- Índices de tabela `Fita_Aluguel`
--
ALTER TABLE `Fita_Aluguel`
  ADD PRIMARY KEY (`codigo_fita`,`codigo_aluguel`),
  ADD KEY `codigo_aluguel` (`codigo_aluguel`);

--
-- Índices de tabela `Sessao`
--
ALTER TABLE `Sessao`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `Aluguel`
--
ALTER TABLE `Aluguel`
  ADD CONSTRAINT `Aluguel_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `Usuario` (`id`);

--
-- Restrições para tabelas `Fita`
--
ALTER TABLE `Fita`
  ADD CONSTRAINT `Fita_ibfk_1` FOREIGN KEY (`codigo_sessao`) REFERENCES `Sessao` (`codigo`);

--
-- Restrições para tabelas `Fita_Aluguel`
--
ALTER TABLE `Fita_Aluguel`
  ADD CONSTRAINT `Fita_Aluguel_ibfk_1` FOREIGN KEY (`codigo_fita`) REFERENCES `Fita` (`codigo`),
  ADD CONSTRAINT `Fita_Aluguel_ibfk_2` FOREIGN KEY (`codigo_aluguel`) REFERENCES `Aluguel` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
