-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 28/05/2025 às 13:36
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
  `data_aluguel` datetime DEFAULT NULL,
  `id_usuario` int DEFAULT NULL,
  `data_devolucao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `Aluguel`
--

INSERT INTO `Aluguel` (`codigo`, `data_aluguel`, `id_usuario`, `data_devolucao`) VALUES
(5, '2025-05-28 09:39:00', 10, '2025-05-30'),
(13, '1212-12-12 12:12:00', 11, '4444-04-12');

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
(4, 'Persona', 'Ingmar Bergman', 4),
(5, 'Up - Altas Aventuras', 'Tarantino', 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Fita_Aluguel`
--

CREATE TABLE `Fita_Aluguel` (
  `codigo_fita` int NOT NULL,
  `codigo_aluguel` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `Fita_Aluguel`
--

INSERT INTO `Fita_Aluguel` (`codigo_fita`, `codigo_aluguel`) VALUES
(4, 5),
(5, 13);

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
(4, 'Drama', '13a'),
(5, 'Aventura', '15a'),
(6, 'Suspense', '13b');

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
(10, 'Miguel Sousa', 'reversesousa@gmail.com', 'rua jose charles', '359993837723737'),
(11, 'Otávio Cabral', 'otavio@gmail.com', 'rua charlinhas', '3485474747845');

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
-- AUTO_INCREMENT de tabela `Aluguel`
--
ALTER TABLE `Aluguel`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `Fita`
--
ALTER TABLE `Fita`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `Sessao`
--
ALTER TABLE `Sessao`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
