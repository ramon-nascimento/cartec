-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Dez-2022 às 13:27
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cartec`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `plate` varchar(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `version` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cars`
--

INSERT INTO `cars` (`id`, `name`, `plate`, `model`, `version`, `type`, `owner_id`) VALUES
(1, 'Onix', 'AAA-0000', 'CHEVY / ONIX', 'Joy', 1, 1),
(2, 'Moto', 'AAA-1111', 'HONDA / CG 150', '150', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `car_type`
--

CREATE TABLE `car_type` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `car_type`
--

INSERT INTO `car_type` (`id`, `description`) VALUES
(1, 'Automóvel'),
(2, 'Motocicleta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `maintenances`
--

CREATE TABLE `maintenances` (
  `id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `car_owner` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `maintenances`
--

INSERT INTO `maintenances` (`id`, `car_id`, `car_owner`, `description`, `date`) VALUES
(1, 1, 1, 'Troca de óleo', '2022-12-23'),
(2, 2, 1, 'Troca de Filtro', '2023-01-05'),
(3, 2, 1, 'Troca de Cabos', '2022-12-29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Ramon Nascimento', 'ramon@email.com', '$2y$10$1PBt4wQpLBr6wO9WS2Dt.egmE.UaKB.vOGo8NjxqaxTUNY.24seSO');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `car_type`
--
ALTER TABLE `car_type`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `maintenances`
--
ALTER TABLE `maintenances`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `car_type`
--
ALTER TABLE `car_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `maintenances`
--
ALTER TABLE `maintenances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
