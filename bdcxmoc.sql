-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Nov-2017 às 12:05
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdcxmoc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos_clube`
--

CREATE TABLE `fotos_clube` (
  `id` int(11) NOT NULL,
  `imagem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fotos_clube`
--

INSERT INTO `fotos_clube` (`id`, `imagem`) VALUES
(1, '4.jpg'),
(2, '1.jpg'),
(4, '3.jpg'),
(5, '5.jpg'),
(6, '2.jpg'),
(7, '6.jpg'),
(8, '7.jpg'),
(9, '8.jpg'),
(10, '9.jpg'),
(11, '10.jpg'),
(12, '11.jpg'),
(13, '12.jpg'),
(14, '13.jpg'),
(15, '14.jpg'),
(16, '15.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `descricao`, `imagem`) VALUES
(2, 'Campeonato de xadrez Xeque Mate Santo Agostinho', 'Venha participar do primeiro campeonato de xadrez realizada pelas faculdades santo agostinho!', '4.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fotos_clube`
--
ALTER TABLE `fotos_clube`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fotos_clube`
--
ALTER TABLE `fotos_clube`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
