-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 21/05/2025 às 18:35
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

--
-- Despejando dados para a tabela `Fita`
--

INSERT INTO `Fita` (`codigo`, `titulo`, `diretor`, `codigo_sessao`) VALUES
(1, 'uhulllll', 'sararnha', 2),
(2, 'uhulllll', 'sararnha', 2),
(3, 'rockkkkkk', 'mauricio de souza', 3);

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

--
-- Despejando dados para a tabela `Sessao`
--

INSERT INTO `Sessao` (`codigo`, `descricao`, `localizacao`) VALUES
(2, 'Trash', 'Praeira 5'),
(3, 'rock', 'prateleira 34');

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
(4, 'alisson', 'alisssssonnn@gmail.com', 'rua alisson numero alisson', '359992382327'),
(5, 'alisson', 'alisssssonnn@gmail.com', 'rua alisson numero alisson', '359992382327'),
(6, 'alisson', 'alisssssonnn@gmail.com', 'rua alisson numero alisson', '359992382327'),
(7, 'alissson', 'alisson@alisson.com', 'alisson', '12134235346324'),
(9, 'Sarahhhh', 'eliscsarah@gmail.com', 'rua dos cafes', '734724982749874');

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
-- AUTO_INCREMENT de tabela `Fita`
--
ALTER TABLE `Fita`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `Sessao`
--
ALTER TABLE `Sessao`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  ADD CONSTRAINT `Fita_Aluguel_ibfk_2` FOREIGN KEY (`codigo_aluguel`) REFERENCES `Aluguel` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
