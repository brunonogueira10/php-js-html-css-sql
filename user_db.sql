-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/10/2024 às 16:41
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
-- Banco de dados: `user_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  `observacoes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `consultas`
--

INSERT INTO `consultas` (`id`, `user_id`, `data`, `horario`, `observacoes`) VALUES
(18, 8, '7000-03-12', '13:13:00', 'dor nos olhos'),
(19, 8, '9000-12-21', '13:23:00', 'dor nas vistas'),
(22, 8, '1323-12-21', '12:03:00', 'dor nas costas'),
(24, 10, '2024-12-21', '13:13:00', 'dor'),
(25, 5, '1333-12-21', '13:13:00', 'tste'),
(31, 10, '2024-10-26', '14:14:00', 'Consulta Oftalmologia'),
(33, 10, '1222-12-13', '13:13:00', 'consulta de podologia');

-- --------------------------------------------------------

--
-- Estrutura para tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `resumo` text NOT NULL,
  `conteudo` text NOT NULL,
  `data_publicacao` date DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `resumo`, `conteudo`, `data_publicacao`, `imagem`) VALUES
(1, 'Hollywood', 'Incendio nas florestas', 'lorem aksdfmasdlkfm ksladmflksdmkflamsdfm adslfml asdmkflamsd mdsm klfmsd dsm kladsm fklsdm fklsm klsd lkfmasdkfmaslkdmfl m sadmfksldmflksdm lkfmsad lkmfsadlmfsd mfsadkfl nsmdjfnsdifjs dnofadns foisdnf isad fnidson fadnufasdo fiun', '2900-12-12', ''),
(3, 'Hollywood', 'loucuras e loucuras', ' sadfslfadslfm slkdmfl adsmfladsm flkdsamfnasdflsanflskjfn dsnf lksandf lsdfjksadnfasdn adskjfnasdjfnasjnkldf sadkjsadjfnsl asfsadfslfadslfm slkdmfl adsmfladsm flkdsamfnasdflsanflskjfn dsnf lksandf lsdfjksadnfasdn adskjfnasdjfnasjnkldf sadkjsadjfnsl asfsadfslfadslfm slkdmfl adsmfladsm flkdsamfnasdflsanflskjfn dsnf lksandf lsdfjksadnfasdn adskjfnasdjfnasjnkldf sadkjsadjfnsl asfsadfslfadslfm slkdmfl adsmfladsm flkdsamfnasdflsanflskjfn dsnf lksandf lsdfjksadnfasdn adskjfnasdjfnasjnkldf sadkjsadjfnsl asfsadfslfadslfm slkdmfl adsmfladsm flkdsamfnasdflsanflskjfn dsnf lksandf lsdfjksadnfasdn adskjfnasdjfnasjnkldf sadkjsadjfnsl asfsadfslfadslfm slkdmfl adsmfladsm flkdsamfnasdflsanflskjfn dsnf lksandf lsdfjksadnfasdn adskjfnasdjfnasjnkldf sadkjsadjfnsl asfsadfslfadslfm slkdmfl adsmfladsm flkdsamfnasdflsanflskjfn dsnf lksandf lsdfjksadnfasdn adskjfnasdjfnasjnkldf sadkjsadjfnsl asfsadfslfadslfm slkdmfl adsmfladsm flkdsamfnasdflsanflskjfn dsnf lksandf lsdfjksadnfasdn adskjfnasdjfnasjnkldf sadkjsadjfnsl asfsadfslfadslfm slkdmfl adsmfladsm flkdsamfnasdflsanflskjfn dsnf lksandf lsdfjksadnfasdn adskjfnasdjfnasjnkldf sadkjsadjfnsl asfsadfslfadslfm slkdmfl adsmfladsm flkdsamfnasdflsanflskjfn dsnf lksandf lsdfjksadnfasdn adskjfnasdjfnasjnkldf sadkjsadjfnsl asfsadfslfadslfm slkdmfl adsmfladsm flkdsamfnasdflsanflskjfn dsnf lksandf lsdfjksadnfasdn adskjfnasdjfnasjnkldf sadkjsadjfnsl asfsadfslfadslfm slkdmfl adsmfladsm flkdsamfnasdflsanflskjfn dsnf lksandf lsdfjksadnfasdn adskjfnasdjfnasjnkldf sadkjsadjfnsl asf', '2000-12-13', 'uploads/image3.jpg'),
(4, 'Creatina', 'Bom ou Ruim ?', 'flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn flasfsadfaspfsaifpn ', '3223-02-13', 'uploads/image2.jpg'),
(5, 'react', 'testando', ' mmmmmmmmmmmm mmmmmmmmmmmm mmmmmmmmmmmm mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm  mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm  mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm   mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm  mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmm mmmmmmmmmmmm mmmmmmmmmmmm mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm  mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm  mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm   mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm  mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmm mmmmmmmmmmmm mmmmmmmmmmmm mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm  mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm  mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm   mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm  mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmm mmmmmmmmmmmm mmmmmmmmmmmm mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm  mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm  mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm   mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm  mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm', '2424-12-21', 'uploads/GKV8XXDXUAARKHs.jpg'),
(6, 'Fumaça', '60060', ' mmmmmmmmmmmm mmmmmmmmmmmm mmmmmmmmmmmm mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm  mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm  mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm   mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm  mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmm mmmmmmmmmmmm mmmmmmmmmmmm mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm  mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm  mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm   mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm  mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm', '3333-12-21', 'uploads/0448cc1b39145982fe89fbdca18f52dd.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `projetos`
--

CREATE TABLE `projetos` (
  `id` int(11) NOT NULL,
  `nome_projeto` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `tecnologia` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `data_conclusao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `projetos`
--

INSERT INTO `projetos` (`id`, `nome_projeto`, `descricao`, `tecnologia`, `foto`, `data_conclusao`) VALUES
(1, 'PROJETO 1', 'construçao website', 'python', 'uploads/image1.png', '2024-05-13'),
(8, 'projeto 2', 'contrução de um predio', 'maquinas', 'uploads/Captura de tela 2024-09-18 181936.png', '2004-12-21'),
(9, 'PROJETO 3 ', 'Projeto projetado', 'C++', 'uploads/748c9223-bf51-41b7-bf61-96e75f2a8504.jpg', '1990-12-21'),
(10, 'PROJETO 4', 'PROJETANDO PARA O PROJETO', 'Java', 'uploads/GKV8XXDXUAARKHs.jpg', '3000-09-07');

-- --------------------------------------------------------

--
-- Estrutura para tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `apelido` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('admin','user') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `utilizadores`
--

INSERT INTO `utilizadores` (`id`, `name`, `apelido`, `email`, `password`, `user_type`, `created_at`) VALUES
(5, 'ADM', 'Admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin', '2024-10-09 14:59:03'),
(8, 'gustavo', 'almeida', 'ada123@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', '2024-10-09 16:40:56'),
(9, 'Erica', 'Delatorre', 'erica@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', '2024-10-14 22:05:07'),
(10, 'Bruno', 'Nogueira', 'brunodelnogueira7@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', '2024-10-24 14:48:17'),
(12, 'marco', 'teste', 'mm@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', '2024-10-25 14:37:49');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices de tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `utilizadores` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
