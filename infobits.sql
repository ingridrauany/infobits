-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 27-Dez-2018 às 01:40
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infobits`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `tipo_cliente` int(1) NOT NULL DEFAULT '1',
  `razaosocial` varchar(255) NOT NULL,
  `email_empresa` varchar(255) NOT NULL,
  `telefone_empresa` varchar(255) NOT NULL,
  `cep_empresa` varchar(255) NOT NULL,
  `rua_empresa` varchar(255) NOT NULL,
  `bairro_empresa` varchar(255) NOT NULL,
  `numero_empresa` int(11) NOT NULL,
  `complemento_empresa` varchar(255) NOT NULL,
  `cidade_empresa` varchar(255) NOT NULL,
  `estado_empresa` varchar(255) NOT NULL,
  `cnpj` varchar(255) NOT NULL,
  `nome_representante` varchar(255) NOT NULL,
  `email_representante` varchar(255) NOT NULL,
  `cpf_representante` varchar(255) NOT NULL,
  `tel_representante` varchar(255) NOT NULL,
  `estado_civil` varchar(255) NOT NULL,
  `cep_representante` varchar(255) NOT NULL,
  `rua_representante` varchar(255) NOT NULL,
  `numero_representante` int(11) NOT NULL,
  `bairro_representante` varchar(255) NOT NULL,
  `cidade_representante` varchar(255) NOT NULL,
  `complemento_representante` varchar(255) NOT NULL,
  `estado_representante` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `tipo_cliente`, `razaosocial`, `email_empresa`, `telefone_empresa`, `cep_empresa`, `rua_empresa`, `bairro_empresa`, `numero_empresa`, `complemento_empresa`, `cidade_empresa`, `estado_empresa`, `cnpj`, `nome_representante`, `email_representante`, `cpf_representante`, `tel_representante`, `estado_civil`, `cep_representante`, `rua_representante`, `numero_representante`, `bairro_representante`, `cidade_representante`, `complemento_representante`, `estado_representante`) VALUES
(2, 2, 'Empresa Teste', 'teste@email.com', '(38) 32168-445', '39.402-547', 'Campo Azul', 'Santo Antônio', 280, '', 'Montes Claros', 'MG', '70.617.339/0001-17', 'João', 'joao@email.com', '111.254.564-65', '(38) 65456-4545', 'Casado', '39.402-547', 'Campo Azul', 280, 'Santo Antônio', 'Montes Claros', '', 'MG'),
(4, 1, '', '', '', '', '', '', 0, '', '', '', '', 'Maria', 'maria@email.com', '528.865.429-89', '(38) 99999-9999', 'Casado', '39.402-547', 'Rua Campo Azul', 280, 'Santo Antônio', 'Montes Claros', '', 'MG'),
(5, 2, 'Empresa Teste 1', 'teste@empresa.com', '(38) 99999-9999', '39.402-547', 'Rua Campo Azul', 'Santo Antônio', 280, '', 'Montes Claros', 'MG', '84.828.067/0001-09', 'José', 'jose@email.com', '628.668.842-05', '(38) 99190-0797', 'Separado judicialmente', '39.402-547', 'Rua Campo Azul', 280, 'Santo Antônio', 'Montes Claros', '', 'MG'),
(6, 1, '', '', '', '', '', '', 0, '', '', '', '', 'Ana Paula Dias', 'anapaula@email.com', '334.146.271-67', '(38) 95965-5454', 'Casado', '39.402-547', 'Rua Campo Azul', 280, 'Santo Antônio', 'Montes Claros', '', 'MG'),
(7, 1, '', '', '', '', '', '', 0, '', '', '', '', 'João', 'joao@email.com', '121.171.286-96', '(38) 99190-0797', 'Divorciado', '39.402-547', 'Rua Campo Azul', 280, 'Santo Antônio', 'Montes Claros', '', 'MG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contratos`
--

CREATE TABLE `contratos` (
  `id` int(11) NOT NULL,
  `id_proposta` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `envio_contrato` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `data_inicio` varchar(255) NOT NULL,
  `data_fim` varchar(255) NOT NULL,
  `valor` decimal(20,2) NOT NULL,
  `arquivo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contratos`
--

INSERT INTO `contratos` (`id`, `id_proposta`, `id_cliente`, `envio_contrato`, `status`, `data_inicio`, `data_fim`, `valor`, `arquivo`) VALUES
(1, 2, 2, 'Enviada', 'Aceita', '31/12/2018', '31/12/2019', '2000.00', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"text-align: center;\"><strong>Contrato de Presta&ccedil;&atilde;o de Servi&ccedil;o Web a Empresa Teste</strong></p>\r\n<p style=\"text-align: left;\">Pelo presente instrumento particular as partes:</p>\r\n<p>CONTRATANTE: Empresa Teste.</p>\r\n<p>CONTRATADO: INFOBITS Consultoria.</p>\r\n<p>T&ecirc;m entre si ajustado o presente Contrato de Presta&ccedil;&atilde;o de Servi&ccedil;os que se reger&aacute; pelas cl&aacute;usulas e condi&ccedil;&otilde;es seguintes:</p>\r\n<p>CL&Aacute;USULA PRIMEIRA - OBJETO DO CONTRATO</p>\r\n<p>1&ordm; - O objeto do presente instrumento &eacute; a presta&ccedil;&atilde;o dos servi&ccedil;os de desenvolvimento e implanta&ccedil;&atilde;o de um sistema web institucional que ter&aacute; m&oacute;dulos de inscri&ccedil;&otilde;es em eventos e emiss&atilde;o de certificados.</p>\r\n<p>2&ordm; - O resultado final do trabalho prestado dever&aacute; trazer as seguintes informa&ccedil;&otilde;es e caracter&iacute;sticas: Sistema din&acirc;mico com layout responsivo; formul&aacute;rio inscri&ccedil;&atilde;o em evento; &aacute;rea de usu&aacute;rio e administrativa; integra&ccedil;&atilde;o com meios de pagamento; status do pedido; formul&aacute;rio de contato.</p>\r\n<p>CL&Aacute;USULA SEGUNDA &ndash; ETAPAS</p>\r\n<p>1&ordm; - A execu&ccedil;&atilde;o do servi&ccedil;o compreende as seguintes etapas:</p>\r\n<p>1) Desenvolvimento do projeto, defini&ccedil;&atilde;o e detalhamento do conte&uacute;do das se&ccedil;&otilde;es e subse&ccedil;&otilde;es do site e coleta do material pertinente junto &agrave; CONTRATANTE bem como prefer&ecirc;ncias de cores e informa&ccedil;&otilde;es relevantes para cria&ccedil;&atilde;o logotipo.</p>\r\n<p>2) Estrutura&ccedil;&atilde;o das cores do site.</p>\r\n<p>3) Desenvolvimento do layout e implementa&ccedil;&atilde;o do mesmo com base em site modelo apresentado pela CONTRATANTE ou sugerido pela CONTRATADA.</p>\r\n<p>4) Fase de Valida&ccedil;&atilde;o e testes. Aprova&ccedil;&atilde;o final por parte da CONTRATANTE e lan&ccedil;amento do site.</p>\r\n<p>2&ordm; - A aprova&ccedil;&atilde;o de uma etapa pela CONTRATANTE autoriza o CONTRATADO a iniciar imediatamente a etapa seguinte. Eventuais altera&ccedil;&otilde;es nas etapas j&aacute; aprovadas representam servi&ccedil;o adicional e somente poder&atilde;o ser solicitadas mediante acordo entre as partes e acr&eacute;scimo na remunera&ccedil;&atilde;o contratada.</p>\r\n</body>\r\n</html>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrador'),
(2, 'membro', 'Membro INFOBITS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `propostas`
--

CREATE TABLE `propostas` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `titulo` text NOT NULL,
  `data` varchar(11) NOT NULL,
  `envio_proposta` varchar(255) NOT NULL,
  `proposta_conteudo` text NOT NULL,
  `valor` decimal(20,2) NOT NULL,
  `forma_pagamento` varchar(255) NOT NULL,
  `servicos` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `propostas`
--

INSERT INTO `propostas` (`id`, `id_cliente`, `status`, `titulo`, `data`, `envio_proposta`, `proposta_conteudo`, `valor`, `forma_pagamento`, `servicos`) VALUES
(2, 2, 'Aceita', 'Desenvolvimento de Site', '18/01/2018', 'Enviada', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>1. PROPOSTA EMPRESA TESTE</p>\r\n<p>Este projeto tem como objetivo a proposta de aumento de visibilidade da marca.</p>\r\n<p>SERVI&Ccedil;OS INCLUSOS:</p>\r\n<ul>\r\n<li>Cadastro das informa&ccedil;&otilde;es sobre a empresa no Google meu neg&oacute;cio.</li>\r\n</ul>\r\n<p>2. VALORES PROPOSTOS</p>\r\n<p>A INFOBITS tem por bandeira fazer com que o cliente tenha o melhor investimento do mercado, valorizando sempre seu foco, prazos e necessidades.&nbsp;</p>\r\n</body>\r\n</html>', '0.00', '', ''),
(3, 7, 'Aceita', 'Desenvolvimento  web', '25/06/2018', 'Enviada', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Conte&uacute;do da Proposta</p>\r\n</body>\r\n</html>', '1500.00', 'Boleto', 'Desenvolvimento de site instituicional');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `cpf` varchar(255) NOT NULL,
  `matricula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `phone`, `cpf`, `matricula`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1530320522, 1, 'Admin', '(38) 99190-0797', '642.553.928-38', 25721347);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(26, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_proposta` (`id_proposta`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `propostas`
--
ALTER TABLE `propostas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `contratos`
--
ALTER TABLE `contratos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `propostas`
--
ALTER TABLE `propostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `contratos`
--
ALTER TABLE `contratos`
  ADD CONSTRAINT `contratos_ibfk_1` FOREIGN KEY (`id_proposta`) REFERENCES `propostas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `propostas`
--
ALTER TABLE `propostas`
  ADD CONSTRAINT `propostas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
