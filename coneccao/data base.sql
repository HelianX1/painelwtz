
DROP TABLE IF EXISTS `contador`;
CREATE TABLE `contador` (
  `id_contador` int(11) NOT NULL AUTO_INCREMENT,
  `id_palavra_chave` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT 0,
  `data_atualizacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_contador`),
  KEY `id_palavra_chave` (`id_palavra_chave`),
  CONSTRAINT `contador_ibfk_1` FOREIGN KEY (`id_palavra_chave`) REFERENCES `palavras_chave` (`id_palavra_chave`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `lojas`;
CREATE TABLE `lojas` (
  `id_loja` int(11) NOT NULL AUTO_INCREMENT,
  `nome_fantasia` varchar(255) NOT NULL,
  `cnpj_cpf` varchar(14) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id_loja`),
  UNIQUE KEY `cnpj_cpf` (`cnpj_cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `produtos`;

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `data_time` datetime DEFAULT NULL,
  `foto_produto` text DEFAULT NULL,
  `texto_do_produto` text DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_loja` int(11) DEFAULT NULL,
  `palavra_chave` text NOT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_loja` (`id_loja`),
  CONSTRAINT `produtos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  CONSTRAINT `produtos_ibfk_3` FOREIGN KEY (`id_loja`) REFERENCES `lojas` (`id_loja`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cargo` varchar(30) DEFAULT 'funcionario',
  `id_loja` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_usuario`),
  KEY `id_loja` (`id_loja`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_loja`) REFERENCES `lojas` (`id_loja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
