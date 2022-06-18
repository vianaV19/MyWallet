-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Jun-2022 às 08:24
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mywallet`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `email`, `password`) VALUES
(3, 'Clare Noel', 'tempus.lorem@outlook.com', 'daa632ba5b4cad54805b7b08e2e01ba9'),
(5, 'Isaiah Castaneda', 'vulputate.eu.odio@outlook.edu', 'de9e98c534f06aecabd60f1ba5a86b1c'),
(11, 'Gustavo Henrique', 'gusBocaVeludo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(12, 'joasim_tenten', 'juju123@yahoo.com', 'a611cd7a13c94591f49e3bb7b2b41f77'),
(16, 'marcos', 'marcos@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(26, 'carlos', 'carlos@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(28, 'matheus', 'matheus@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_wallet`
--

CREATE TABLE `tb_wallet` (
  `id` int(11) NOT NULL,
  `money` decimal(5,2) NOT NULL,
  `fk_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_wallet`
--

INSERT INTO `tb_wallet` (`id`, `money`, `fk_user`) VALUES
(3, '432.00', 3),
(5, '132.00', 5),
(7, '32.00', 11),
(8, '832.00', 12),
(11, '0.00', 16),
(20, '0.00', 26),
(22, '0.00', 28);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_wallet`
--
ALTER TABLE `tb_wallet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`fk_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `tb_wallet`
--
ALTER TABLE `tb_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_wallet`
--
ALTER TABLE `tb_wallet`
  ADD CONSTRAINT `tb_wallet_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
