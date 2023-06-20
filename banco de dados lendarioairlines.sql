-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Jun-2023 às 07:40
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dblendarioairlines`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `passagens`
--

CREATE TABLE `passagens` (
  `passagemId` int(11) NOT NULL,
  `usuarioId` int(11) NOT NULL,
  `statusPassagem` text NOT NULL,
  `vooId` int(11) NOT NULL,
  `numeroCadeira` int(11) NOT NULL,
  `codPassagem` text NOT NULL,
  `validaCheckin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reclamacao`
--

CREATE TABLE `reclamacao` (
  `reclamacaoId` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `reclamacaoTexto` text NOT NULL,
  `codPassagem` varchar(6) NOT NULL,
  `statusReclamacao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nome` text NOT NULL,
  `cpf` text NOT NULL,
  `email` text NOT NULL,
  `dataNascimento` date NOT NULL,
  `senha` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `voos`
--

CREATE TABLE `voos` (
  `vooId` int(11) NOT NULL,
  `numeroVoo` text NOT NULL,
  `valor` int(11) NOT NULL,
  `dataHoraPartida` datetime NOT NULL,
  `dataHoraChegada` datetime NOT NULL,
  `tipoVoo` text NOT NULL,
  `codPassagem` varchar(6) NOT NULL,
  `origem` text NOT NULL,
  `destino` text NOT NULL,
  `qtdPassagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `voos`
--

INSERT INTO `voos` (`vooId`, `numeroVoo`, `valor`, `dataHoraPartida`, `dataHoraChegada`, `tipoVoo`, `codPassagem`, `origem`, `destino`, `qtdPassagem`) VALUES
(1, '111', 123, '2023-06-18 08:00:00', '2023-06-18 10:00:00', 'economica', 'XPTO56', 'Salvador', 'Recife', 146),
(3, '112', 123, '2023-06-18 08:00:00', '2023-06-18 10:00:00', 'economica', 'XPTO57', 'Recife', 'Salvador', 146),
(4, '113', 123, '2023-06-25 08:00:00', '2023-06-25 10:00:00', 'economica', 'XPTO57', 'Salvador', 'Paris', 150),
(5, '114', 123, '2023-06-28 08:00:00', '2023-06-29 10:00:00', 'economica', 'XPTO58', 'Paris', 'Salvador', 150),
(6, '115', 123, '2023-06-27 08:00:00', '2023-06-28 10:00:00', '1classe', 'XPTO59', 'Recife', 'Belo Horizonte', 146),
(7, '116', 123, '2023-06-29 08:00:00', '2023-06-30 10:00:00', 'economica', 'XPTO60', 'Belo Horizonte', 'Recife', 150),
(8, '117', 123, '2023-06-29 08:00:00', '2023-06-30 10:00:00', '1classe', 'XPTO61', 'Recife', 'Natal', 150),
(9, '118', 123, '2023-06-29 08:00:00', '2023-06-30 10:00:00', 'economica', 'XPTO62', 'Natal', 'Recife', 150);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `passagens`
--
ALTER TABLE `passagens`
  ADD PRIMARY KEY (`passagemId`),
  ADD KEY `idUsuario` (`usuarioId`),
  ADD KEY `vooId` (`vooId`);

--
-- Índices para tabela `reclamacao`
--
ALTER TABLE `reclamacao`
  ADD PRIMARY KEY (`reclamacaoId`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Índices para tabela `voos`
--
ALTER TABLE `voos`
  ADD PRIMARY KEY (`vooId`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `passagens`
--
ALTER TABLE `passagens`
  MODIFY `passagemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `reclamacao`
--
ALTER TABLE `reclamacao`
  MODIFY `reclamacaoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `voos`
--
ALTER TABLE `voos`
  MODIFY `vooId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
