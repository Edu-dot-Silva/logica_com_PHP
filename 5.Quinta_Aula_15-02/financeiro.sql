-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/03/2025 às 12:07
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `financeiro`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `cpf_cnpj` varchar(25) NOT NULL,
  `telefone_fixo` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `eh_whatsapp` tinyint(1) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `logradouro` varchar(70) NOT NULL,
  `numero_endereco` varchar(15) NOT NULL,
  `complemento` varchar(15) NOT NULL,
  `bairro` varchar(40) NOT NULL,
  `cidade` varchar(40) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `email` varchar(100) NOT NULL,
  `oculto` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome`, `cpf_cnpj`, `telefone_fixo`, `celular`, `eh_whatsapp`, `cep`, `logradouro`, `numero_endereco`, `complemento`, `bairro`, `cidade`, `estado`, `email`, `oculto`) VALUES
(1, 'Kalunga 223', '11.111.111/0001-01', '(11) 2222-2222', '(11) 99999-9999', 1, '05051-000', 'Rua Tito', '54', '', 'Lapa', 'São Paulo', 'SP', 'sac@kalunga.com.br', 0),
(2, 'Carrefour', '22.222.222/0002-02', '(11) 3333-3344', '(11) 99999-9999', 1, '05051-000', 'Avenida Sobe e Desce', '546', '', 'Sapobempa', 'São Paulo', 'SP', 'atendimento@carrefour.com.br', 0),
(4, 'Cliente 274', '98765432100', '2345-6789', '99876-5432', 0, '67890-123', 'Avenida Aleatória 58', '456', 'Casa 202', 'Bairro das Flores', 'Cidade Modelo', 'RJ', 'cliente274@email.com', 0),
(8, 'SAMSUNG MODIFICADA', '00.280.273/0002-18', '(11) 40759654', '(11) 986364702', 0, '13097105', 'RUA THOMAS NILSEN JUNIOR', '4521', 'PARTE A', 'PARQUE IMPERADOR', 'CAMPINAS', 'SP', 'samsung@gmail.com', 0),
(11, 'CARREFOUR COMERCIO E INDUSTRIA LTDA', '45.543.915/0001-81', '', '', 0, '09950640', 'AVENIDA TUCUNARE', '125', 'BLOCO C SALA 1 ', 'TAMBORE', 'BARUERI', 'SP', '', 0),
(12, 'SAMSUNG ELETRONICA DA AMAZONIA LTDA', '00.280.273/0002-18', '', '', 0, '13097105', 'RUA THOMAS NILSEN JUNIOR', '150', 'PARTE A', 'PARQUE IMPERADOR', 'CAMPINAS', 'SP', '', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `recebimentos`
--

CREATE TABLE `recebimentos` (
  `id_recebimento` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL DEFAULT 0,
  `data_vencimento` date NOT NULL,
  `valor` decimal(10,0) NOT NULL DEFAULT 0,
  `data_pagamento` date NOT NULL,
  `valor_pagamento` decimal(10,0) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `recebimentos`
--

INSERT INTO `recebimentos` (`id_recebimento`, `id_cliente`, `data_vencimento`, `valor`, `data_pagamento`, `valor_pagamento`, `descricao`, `id_tipo`) VALUES
(1, 1, '2025-02-08', 100, '2025-02-07', 100, 'Primeiro pagamento', 1),
(2, 2, '2025-02-08', 50, '2025-02-08', 50, 'Salgadinhos', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_recebimento`
--

CREATE TABLE `tipo_recebimento` (
  `id_tipo` int(11) NOT NULL,
  `descricao_tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tipo_recebimento`
--

INSERT INTO `tipo_recebimento` (`id_tipo`, `descricao_tipo`) VALUES
(1, 'recebimento de alunos'),
(2, 'recebimentos_bolsa'),
(3, 'recebimento de venda de livros'),
(4, 'recebimento cantina');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices de tabela `recebimentos`
--
ALTER TABLE `recebimentos`
  ADD PRIMARY KEY (`id_recebimento`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices de tabela `tipo_recebimento`
--
ALTER TABLE `tipo_recebimento`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `recebimentos`
--
ALTER TABLE `recebimentos`
  MODIFY `id_recebimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tipo_recebimento`
--
ALTER TABLE `tipo_recebimento`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `recebimentos`
--
ALTER TABLE `recebimentos`
  ADD CONSTRAINT `id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
