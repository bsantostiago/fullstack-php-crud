-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Nov-2021 às 12:23
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `exemplo_vendas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fabricantes`
--

CREATE TABLE `fabricantes` (
  `id` smallint(6) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fabricantes`
--

INSERT INTO `fabricantes` (`id`, `nome`) VALUES
(1, 'Asus do Brasil'),
(2, 'Dell'),
(3, 'Apple'),
(4, 'LG'),
(5, 'Samsung'),
(7, 'Microsoft'),
(10, 'Philco');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` smallint(6) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `preco` decimal(7,2) NOT NULL,
  `quantidade` tinyint(4) NOT NULL,
  `descricao` text NOT NULL,
  `fabricante_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `quantidade`, `descricao`, `fabricante_id`) VALUES
(1, 'Notebook', '1999.75', 5, 'Notebook de última geração com CPU Intel Core i9 e 16 GB de memória RAM', 1),
(2, 'Tablet Android', '499.90', 4, 'Tablet com Android 9 e tela de 10 polegadas com 128 GB de armazenamento', 5),
(3, 'iPhone', '2500.00', 12, 'Smartphone Apple de última geração com iOS 13 e tela retina', 3),
(4, 'iPad', '2500.00', 6, 'Tablet Apple com 128 GB de memória RAM e processador dual core', 3),
(5, 'Zenfone 7', '2214.78', 8, 'Zenfone geração 7 com tela de 6 polegadas, processador Octa Core', 1),
(6, 'Galaxy Tab', '1450.00', 9, 'Este aparelho da Samsung é um dos tablets de maior qualidade do mercado', 5);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `fabricantes`
--
ALTER TABLE `fabricantes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produtos_fabricantes` (`fabricante_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `fabricantes`
--
ALTER TABLE `fabricantes`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_produtos_fabricantes` FOREIGN KEY (`fabricante_id`) REFERENCES `fabricantes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
