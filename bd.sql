
CREATE SCHEMA IF NOT EXISTS `fatura` DEFAULT CHARACTER SET latin1 ;
USE `fatura` ;

CREATE TABLE IF NOT EXISTS `fatura`.`empresas` (
  `id` INT(2) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `telefone` INT(9) NOT NULL,
  `nif` INT(11) NOT NULL,
  `morada` VARCHAR(100) NOT NULL,
  `codigopostal` VARCHAR(100) NOT NULL,
  `localidade` VARCHAR(50) NOT NULL,
  `capitalsocial` INT(2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `fatura`.`users` (
  `iduser` INT(2) NOT NULL AUTO_INCREMENT,
  `idempresa` INT(2) NOT NULL,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `telefone` INT(9) NOT NULL,
  `nif` INT(11) NOT NULL,
  `morada` VARCHAR(100) NOT NULL,
  `codigopostal` VARCHAR(100) NOT NULL,
  `localidade` VARCHAR(50) NOT NULL,
  `role` ENUM('admin', 'cliente', 'funcionario') NULL DEFAULT NULL,
  PRIMARY KEY (`iduser`),
  INDEX `FK_iduser_empresa` (`idempresa` ASC) VISIBLE)
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;
insert into  users values
(1,1,'rafa','123','rafa@gmail.com','987222222','123456789','rua123','123','bemposta','cliente'),
(2,2,'joao','123','joao@gmail.com','968279555','123456789','rua123','456','boavista','cliente'),
(3,3,'tiago','123','tiago@gmail.com','987654321','123456789','rua123','789','alcobaca','cliente'),
(4,4,'miguel','123','miguel@gmail.com','932165478','123456789','rua123','123','maiorga','cliente'),
(5,5,'nuno','123','nuno@gmail.com','931245678','123456789','rua123','123','nazare','admin'),
(6,6,'ricardo','123','ricardo@gmail.com','985746321','123456789','rua123','123','leiria','funcionario'),
(7,7,'pedro','123','pedro@gmail.com','912345678','123456789','rua123','123','coz','funcionario');

CREATE TABLE IF NOT EXISTS `fatura`.`faturas` (
  `id` INT(2) NOT NULL,
  `id_empresa` INT(2) NOT NULL,
  `valor` INT(4) NOT NULL,
  `total` INT(4) NOT NULL,
  `ivatotal` INT(4) NOT NULL,
  `data` DATE NOT NULL,
  `estado` ENUM('lancamento', 'emitida') NOT NULL,
  `id_cliente` INT(2) NOT NULL,
  `id_funcionario` INT(2) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `FK_idfatura_empresa` (`id_empresa` ASC) VISIBLE,
  INDEX `FK_clientes_idx` (`id_cliente` ASC) VISIBLE,
  INDEX `FK_funcionario_idx` (`id_funcionario` ASC) VISIBLE,
  CONSTRAINT `FK_idfatura_empresa`
    FOREIGN KEY (`id_empresa`)
    REFERENCES `fatura`.`empresas` (`id`),
  CONSTRAINT `FK_clientes`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `fatura`.`users` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_funcionario`
    FOREIGN KEY (`id_funcionario`)
    REFERENCES `fatura`.`users` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `fatura`.`ivas` (
  `id` INT(2) NOT NULL,
  `percentagem` INT(2) NOT NULL,
  `descricao` VARCHAR(50) NOT NULL,
  `vigor` DATE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `fatura`.`produtos` (
  `id` INT(2) NOT NULL,
  `referencia` INT(5) NOT NULL,
  `descricao` VARCHAR(50) NOT NULL,
  `stock` INT(2) NOT NULL,
  `preco` INT(4) NOT NULL,
  `id_iva` INT(2) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_iva_idx` (`id_iva` ASC) VISIBLE,
  CONSTRAINT `fk_iva`
    FOREIGN KEY (`id_iva`)
    REFERENCES `fatura`.`ivas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `fatura`.`linhafaturas` (
  `id` INT(2) NOT NULL,
  `quantidade` INT(2) NOT NULL,
  `valor` INT(2) NOT NULL,
  `valorIVA` INT(2) NOT NULL,
  `id_fatura` INT(2) NOT NULL,
  `id_produto` INT(2) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_produto_idx` (`id_produto` ASC) VISIBLE,
  INDEX `fk_fatura_idx` (`id_fatura` ASC) VISIBLE,
  CONSTRAINT `fk_produto`
    FOREIGN KEY (`id_produto`)
    REFERENCES `fatura`.`produtos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fatura`
    FOREIGN KEY (`id_fatura`)
    REFERENCES `fatura`.`faturas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8