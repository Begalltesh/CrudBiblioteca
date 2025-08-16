-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/08/2025 às 22:46
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
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `genero` varchar(100) DEFAULT NULL,
  `ano_publicacao` int(4) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livros`
--

INSERT INTO `livros` (`id`, `titulo`, `autor`, `genero`, `ano_publicacao`, `data_cadastro`) VALUES
(2, 'Dom Casmurro', 'Machado de Assis', 'Romance', 1899, '2025-08-16 19:52:38'),
(3, 'A Culpa é das Estrelas', 'John Green', 'Romance', 2012, '2025-08-16 19:52:38'),
(4, '1984', 'George Orwell', 'Ficção Distópica', 1949, '2025-08-16 19:52:38'),
(5, 'O Senhor dos Anéis: A Sociedade do Anel', 'J.R.R. Tolkien', 'Fantasia', 1954, '2025-08-16 19:52:38'),
(6, 'Harry Potter e a Pedra Filosofal', 'J.K. Rowling', 'Fantasia', 1997, '2025-08-16 19:52:38'),
(7, 'O Pequeno Príncipe', 'Antoine de Saint-Exupéry', 'Fábula', 1943, '2025-08-16 19:52:38'),
(8, 'Grande Sertão: Veredas', 'João Guimarães Rosa', 'Romance', 1956, '2025-08-16 19:52:38'),
(9, 'Cem Anos de Solidão', 'Gabriel García Márquez', 'Realismo Mágico', 1967, '2025-08-16 19:52:38'),
(10, 'Vidas Secas', 'Graciliano Ramos', 'Romance', 1938, '2025-08-16 19:52:38'),
(11, 'Torto Arado', 'Itamar Vieira Junior', 'Romance', 2019, '2025-08-16 19:52:38'),
(12, 'Sapiens: Uma Breve História da Humanidade', 'Yuval Noah Harari', 'Não-Ficção', 2011, '2025-08-16 19:52:38'),
(13, 'O Poder do Hábito', 'Charles Duhigg', 'Autoajuda', 2012, '2025-08-16 19:52:38'),
(14, 'Duna', 'Frank Herbert', 'Ficção Científica', 1965, '2025-08-16 19:52:38'),
(15, 'Fahrenheit 451', 'Ray Bradbury', 'Ficção Distópica', 1953, '2025-08-16 19:52:38'),
(16, 'Capitães da Areia', 'Jorge Amado', 'Romance', 1937, '2025-08-16 19:52:38'),
(17, 'O Guia do Mochileiro das Galáxias', 'Douglas Adams', 'Ficção Científica', 1979, '2025-08-16 19:52:38'),
(18, 'A Revolução dos Bichos', 'George Orwell', 'Sátira Política', 1945, '2025-08-16 19:52:38'),
(19, 'Ensaio sobre a Cegueira', 'José Saramago', 'Romance', 1995, '2025-08-16 19:52:38'),
(20, 'O Nome do Vento', 'Patrick Rothfuss', 'Fantasia', 2007, '2025-08-16 19:52:38'),
(21, 'Memórias Póstumas de Brás Cubas', 'Machado de Assis', 'Romance', 1881, '2025-08-16 19:52:38');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
