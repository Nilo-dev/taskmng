-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Abr-2021 às 20:42
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

CREATE SCHEMA `taskmng`;
USE `taskmng`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `taskmng`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_atividades`
--

CREATE TABLE `tbl_atividades` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `finalizada` tinyint(4) NOT NULL,
  `tbl_projetos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_atividades`
--

INSERT INTO `tbl_atividades` (`id`, `nome`, `data_inicio`, `data_fim`, `finalizada`, `tbl_projetos_id`) VALUES
(1, 'Atividade em Aberto 1', '2021-04-01', '2022-03-30', 1, 1),
(2, 'Atividade em Aberto 2', '2021-04-01', '2021-04-09', 1, 1),
(3, 'Atividade em Aberto 3', '2021-04-01', '2022-04-28', 0, 1),
(4, 'Atividade em Aberto 1', '2021-04-01', '2022-03-30', 1, 2),
(5, 'Atividade em Aberto 2', '2021-04-01', '2021-04-20', 1, 2),
(6, 'Atividade em Aberto 3', '2021-04-01', '2022-04-28', 0, 2),
(7, 'Atividade em Aberto 1', '2021-04-01', '2022-03-30', 1, 3),
(8, 'Atividade em Aberto 2', '2021-04-01', '2021-04-27', 1, 3),
(9, 'Atividade em Aberto 3', '2021-04-01', '2022-04-28', 0, 3),
(10, 'Atividade em Aberto 1', '2021-04-01', '2022-03-30', 1, 4),
(11, 'Atividade em Aberto 2', '2021-04-01', '2021-04-28', 1, 4),
(12, 'Atividade em Aberto 3', '2021-04-01', '2022-04-28', 0, 4),
(13, 'Atividade em Aberto 1', '2021-04-01', '2022-03-30', 1, 5),
(14, 'Atividade em Aberto 2', '2021-04-01', '2021-04-26', 1, 5),
(15, 'Atividade em Aberto 3', '2021-04-01', '2022-04-28', 0, 5),
(16, 'Atividade em Atraso 1', '2021-04-01', '2022-03-30', 1, 6),
(17, 'Atividade em Atraso 2', '2021-04-01', '2021-04-29', 1, 6),
(18, 'Atividade em Atraso 3', '2021-04-01', '2022-04-28', 0, 6),
(19, 'Atividade em Atraso 1', '2021-04-01', '2022-03-30', 1, 7),
(20, 'Atividade em Atraso 2', '2021-04-01', '2021-04-18', 1, 7),
(21, 'Atividade em Atraso 3', '2021-04-01', '2022-04-28', 0, 7),
(22, 'Atividade em Atraso 1', '2021-04-01', '2022-03-30', 1, 8),
(23, 'Atividade em Atraso 2', '2021-04-01', '2021-04-29', 1, 8),
(24, 'Atividade em Atraso 3', '2021-04-01', '2022-04-28', 0, 8),
(25, 'Atividade em Atraso 1', '2021-04-01', '2022-03-30', 1, 9),
(26, 'Atividade em Atraso 2', '2021-04-01', '2021-04-20', 1, 9),
(27, 'Atividade em Atraso 3', '2021-04-01', '2022-04-28', 0, 9),
(28, 'Atividade em Atraso 1', '2021-04-01', '2022-03-30', 1, 10),
(29, 'Atividade em Atraso 2', '2021-04-01', '2021-04-16', 1, 10),
(30, 'Atividade em Atraso 3', '2021-04-01', '2022-04-28', 0, 10),
(31, 'Atividade Finalizada 1', '2021-04-01', '2021-01-30', 1, 11),
(32, 'Atividade Finalizada 2', '2021-04-01', '2021-01-30', 1, 11),
(33, 'Atividade Finalizada 3', '2021-04-01', '2021-01-28', 1, 11),
(34, 'Atividade Finalizada 1', '2021-04-01', '2021-01-30', 1, 12),
(35, 'Atividade Finalizada 2', '2021-04-01', '2021-01-30', 1, 12),
(36, 'Atividade Finalizada 3', '2021-04-01', '2021-01-28', 1, 12),
(37, 'Atividade Finalizada 1', '2021-04-01', '2021-01-30', 1, 13),
(38, 'Atividade Finalizada 2', '2021-04-01', '2021-01-30', 1, 13),
(39, 'Atividade Finalizada 3', '2021-04-01', '2021-01-28', 1, 13),
(40, 'Atividade Finalizada 1', '2021-04-01', '2021-01-30', 1, 14),
(41, 'Atividade Finalizada 2', '2021-04-01', '2021-01-30', 1, 14),
(42, 'Atividade Finalizada 3', '2021-04-01', '2021-01-28', 1, 14),
(43, 'Atividade Finalizada 1', '2021-04-01', '2021-01-30', 1, 15),
(44, 'Atividade Finalizada 2', '2021-04-01', '2021-01-30', 1, 15),
(45, 'Atividade Finalizada 3', '2021-04-01', '2021-01-28', 1, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_projetos`
--

CREATE TABLE `tbl_projetos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_projetos`
--

INSERT INTO `tbl_projetos` (`id`, `nome`, `data_inicio`, `data_fim`) VALUES
(1, 'Projeto em Aberto 1', '2021-04-01', '2022-04-30'),
(2, 'Projeto em Aberto 2', '2021-04-02', '2022-05-29'),
(3, 'Projeto em Aberto 3', '2021-04-03', '2022-06-28'),
(4, 'Projeto em Aberto 4', '2021-04-04', '2022-07-27'),
(5, 'Projeto em Aberto 5', '2021-04-05', '2022-08-26'),
(6, 'Projeto em Atraso 1', '2020-04-01', '2020-05-30'),
(7, 'Projeto em Atraso 2', '2020-04-02', '2020-05-02'),
(8, 'Projeto em Atraso 3', '2020-04-03', '2021-02-28'),
(9, 'Projeto em Atraso 4', '2020-04-04', '2021-02-27'),
(10, 'Projeto em Atraso 5', '2020-04-05', '2021-02-26'),
(11, 'Projeto Finalizado 1', '2020-04-01', '2020-06-02'),
(12, 'Projeto Finalizado 2', '2020-04-02', '2020-07-19'),
(13, 'Projeto Finalizado 3', '2020-04-03', '2021-02-28'),
(14, 'Projeto Finalizado 4', '2020-04-04', '2021-02-27'),
(15, 'Projeto Finalizado 5', '2020-04-05', '2021-02-26');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbl_atividades`
--
ALTER TABLE `tbl_atividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_atividades_tbl_projetos_idx` (`tbl_projetos_id`);

--
-- Índices para tabela `tbl_projetos`
--
ALTER TABLE `tbl_projetos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_atividades`
--
ALTER TABLE `tbl_atividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `tbl_projetos`
--
ALTER TABLE `tbl_projetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbl_atividades`
--
ALTER TABLE `tbl_atividades`
  ADD CONSTRAINT `fk_tbl_atividades_tbl_projetos` FOREIGN KEY (`tbl_projetos_id`) REFERENCES `tbl_projetos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
