-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Jul-2021 às 20:09
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dados1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluguel`
--

CREATE TABLE `aluguel` (
  `idaluguel` int(11) NOT NULL,
  `datalocacao` date NOT NULL,
  `idfuncionario` int(11) NOT NULL,
  `combustivelatual` text COLLATE utf8mb4_bin NOT NULL,
  `desconto` text COLLATE utf8mb4_bin NOT NULL,
  `troco` text COLLATE utf8mb4_bin NOT NULL,
  `total` text COLLATE utf8mb4_bin NOT NULL,
  `pago` text COLLATE utf8mb4_bin NOT NULL,
  `diaria` text COLLATE utf8mb4_bin NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `aluguel`
--

INSERT INTO `aluguel` (`idaluguel`, `datalocacao`, `idfuncionario`, `combustivelatual`, `desconto`, `troco`, `total`, `pago`, `diaria`, `idusuario`) VALUES
(892, '2021-07-08', 10, 'combustivel123', '0', 'sthefany', '7867', 'eqeqwe', '800', 119);

-- --------------------------------------------------------

--
-- Estrutura da tabela `devolucao`
--

CREATE TABLE `devolucao` (
  `iddevolucao` int(11) NOT NULL,
  `avaria` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `idaluguel` int(11) NOT NULL,
  `datadevolucao` date NOT NULL,
  `combustiveldevolucao` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `devolucao`
--

INSERT INTO `devolucao` (`iddevolucao`, `avaria`, `extra`, `idaluguel`, `datadevolucao`, `combustiveldevolucao`) VALUES
(30, 'sem dano', '90', 892, '2021-06-30', 'combustivel-devolucao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idfuncionario` int(11) NOT NULL,
  `cpf` text COLLATE utf8mb4_bin NOT NULL,
  `nome` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idfuncionario`, `cpf`, `nome`) VALUES
(10, '088.978.395-09', 'luana sthefany');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemaluguel`
--

CREATE TABLE `itemaluguel` (
  `itemaluguel` int(11) NOT NULL,
  `idaluguel` int(11) NOT NULL,
  `idveiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `seguro`
--

CREATE TABLE `seguro` (
  `idseguro` int(11) NOT NULL,
  `datafinal` date NOT NULL,
  `datainicio` date NOT NULL,
  `valor` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `seguro`
--

INSERT INTO `seguro` (`idseguro`, `datafinal`, `datainicio`, `valor`) VALUES
(5, '2021-07-08', '2021-07-08', '200');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nome` text COLLATE utf8mb4_bin NOT NULL,
  `endereco` text COLLATE utf8mb4_bin NOT NULL,
  `email` text COLLATE utf8mb4_bin NOT NULL,
  `telefone` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `endereco`, `email`, `telefone`) VALUES
(119, 'luana souza', 'rua dos viajantes, centro', 'lsthefany036@gmail.com', '77991700471');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `idveiculo` int(11) NOT NULL,
  `ano` text COLLATE utf8mb4_bin NOT NULL,
  `cor` text COLLATE utf8mb4_bin NOT NULL,
  `modelo` text COLLATE utf8mb4_bin NOT NULL,
  `tipoveiculo` text COLLATE utf8mb4_bin NOT NULL,
  `placa` text COLLATE utf8mb4_bin NOT NULL,
  `idseguro` int(11) NOT NULL,
  `chassin` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`idveiculo`, `ano`, `cor`, `modelo`, `tipoveiculo`, `placa`, `idseguro`, `chassin`) VALUES
(510, '2010', 'placa', 'rosa', 'carro', 'chassin', 5, 'modelo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluguel`
--
ALTER TABLE `aluguel`
  ADD PRIMARY KEY (`idaluguel`),
  ADD KEY `idfuncionario` (`idfuncionario`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indexes for table `devolucao`
--
ALTER TABLE `devolucao`
  ADD PRIMARY KEY (`iddevolucao`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idfuncionario`);

--
-- Indexes for table `itemaluguel`
--
ALTER TABLE `itemaluguel`
  ADD PRIMARY KEY (`itemaluguel`),
  ADD KEY `idveiculo` (`idveiculo`),
  ADD KEY `idaluguel` (`idaluguel`);

--
-- Indexes for table `seguro`
--
ALTER TABLE `seguro`
  ADD PRIMARY KEY (`idseguro`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indexes for table `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`idveiculo`),
  ADD KEY `idseguro` (`idseguro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluguel`
--
ALTER TABLE `aluguel`
  MODIFY `idaluguel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=893;

--
-- AUTO_INCREMENT for table `devolucao`
--
ALTER TABLE `devolucao`
  MODIFY `iddevolucao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idfuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `itemaluguel`
--
ALTER TABLE `itemaluguel`
  MODIFY `itemaluguel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seguro`
--
ALTER TABLE `seguro`
  MODIFY `idseguro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `idveiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=511;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluguel`
--
ALTER TABLE `aluguel`
  ADD CONSTRAINT `aluguel_ibfk_1` FOREIGN KEY (`idfuncionario`) REFERENCES `funcionario` (`idfuncionario`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `aluguel_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `itemaluguel`
--
ALTER TABLE `itemaluguel`
  ADD CONSTRAINT `itemaluguel_ibfk_1` FOREIGN KEY (`idveiculo`) REFERENCES `veiculo` (`idveiculo`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `itemaluguel_ibfk_2` FOREIGN KEY (`idaluguel`) REFERENCES `aluguel` (`idaluguel`) ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD CONSTRAINT `veiculo_ibfk_1` FOREIGN KEY (`idseguro`) REFERENCES `seguro` (`idseguro`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
