-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 14-Jun-2023 às 00:54
-- Versão do servidor: 8.0.27
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_pw2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabelaimg`
--

DROP TABLE IF EXISTS `tabelaimg`;
CREATE TABLE IF NOT EXISTS `tabelaimg` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `produto` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descricao` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `data` date NOT NULL,
  `imagem` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `valor` decimal(15,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tabelaimg`
--

INSERT INTO `tabelaimg` (`id`, `codigo`, `produto`, `descricao`, `data`, `imagem`, `valor`) VALUES
(4, '112', 'nova foto', 'deosnondsondon', '2023-05-01', 'note11.jpg', '123.00'),
(5, '6666s', 'novo not', 'azsa', '2023-04-30', 'note12.jpg', '2500.50'),
(6, '11222', 'novo not1', 'aushaushas aushuash uahsu343333 .....dgdgd', '2023-04-30', 'note13.jpg', '3254.00'),
(18, '11111', 'Google Glasses 2', 'asas asasasas wewewe', '2012-06-04', 'galeria-04.jpg', '11545.00'),
(21, 'dhf', 'fghALTERAR', '', '2023-05-10', '', '123.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_usuarios`
--

DROP TABLE IF EXISTS `tabela_usuarios`;
CREATE TABLE IF NOT EXISTS `tabela_usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `permissao` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tabela_usuarios`
--

INSERT INTO `tabela_usuarios` (`id`, `usuario`, `senha`, `email`, `permissao`) VALUES
(2, 'thiago', '2f7b52aacfbf6f44e13d27656ecb1f59', 'julio@gmail.com', 'usuario'),
(24, 'ola', '202cb962ac59075b964b07152d234b70', 'ola@gmail.com', 'usuario'),
(22, 'thiago1', '202cb962ac59075b964b07152d234b70', 'tffjauds@gmail.com', 'administrador'),
(23, 'alterad', '30cd2f99101cdd52cc5fda1e996ee137', 'tffjauds13245124123@gmail.com', 'usuario'),
(30, 'adm', '1cc39ffd758234422e1f75beadfc5fb2', 'teste@adm.com', 'administrador'),
(31, 'as', 'bd93fa0c90c617fa38d6eda313a6cd09', 'as@teste', 'usuario'),
(32, 'thiago2', '202cb962ac59075b964b07152d234b70', 'tf@gmail.com', 'administrador');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
