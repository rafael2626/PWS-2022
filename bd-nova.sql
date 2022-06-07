-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema rafael
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema rafael
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `rafael` DEFAULT CHARACTER SET utf8 ;
USE `rafael` ;

-- -----------------------------------------------------
-- Table `rafael`.`empresas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rafael`.`empresas` (
  `id` INT NOT NULL AUTO_INCREMENT,
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
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rafael`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rafael`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `telefone` INT(9) NOT NULL,
  `nif` INT(11) NOT NULL,
  `morada` VARCHAR(100) NOT NULL,
  `codigopostal` VARCHAR(100) NOT NULL,
  `localidade` VARCHAR(50) NOT NULL,
  `role` ENUM('admin', 'cliente', 'funcionario') NULL DEFAULT NULL,
  `empresa_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_empresa_user_idx` (`empresa_id` ASC),
  CONSTRAINT `fk_empresa_user`
    FOREIGN KEY (`empresa_id`)
    REFERENCES `rafael`.`empresas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

  insert into  users values
  (1,'rafa','123','rafa@gmail.com','987222222','123456789','rua123','123','bemposta','cliente', NULL),
  (2,'joao','123','joao@gmail.com','968279555','123456789','rua123','456','boavista','cliente', NULL),
  (3,'tiago','123','tiago@gmail.com','987654321','123456789','rua123','789','alcobaca','cliente', NULL),
  (4,'miguel','123','miguel@gmail.com','932165478','123456789','rua123','123','maiorga','cliente', NULL),
  (5,'nuno','123','nuno@gmail.com','931245678','123456789','rua123','123','nazare','admin', NULL),
  (6,'ricardo','123','ricardo@gmail.com','985746321','123456789','rua123','123','leiria','funcionario', NULL),
  (7,'pedro','123','pedro@gmail.com','912345678','123456789','rua123','123','coz','funcionario', NULL);


-- -----------------------------------------------------
-- Table `rafael`.`faturas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rafael`.`faturas` (
  `id` INT NOT NULL AUTO_INCREMENT,

    `valor` INT(4) NOT NULL,
  `total` INT(4) NOT NULL,
  `ivatotal` INT(4) NOT NULL,
  `data` DATE NOT NULL,
  `estado` ENUM('lancamento', 'emitida') NOT NULL,

  `empresa_id` INT NULL,
  `cliente_id` INT NULL,
  `funcionario_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_empresa_idx` (`empresa_id` ASC),
  INDEX `fk_cliente_idx` (`cliente_id` ASC),
  INDEX `fk_funcionario_idx` (`funcionario_id` ASC),
  CONSTRAINT `fk_empresa`
    FOREIGN KEY (`empresa_id`)
    REFERENCES `rafael`.`empresas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `rafael`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_funcionario`
    FOREIGN KEY (`funcionario_id`)
    REFERENCES `rafael`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rafael`.`ivas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rafael`.`ivas` (
  `id` INT NOT NULL AUTO_INCREMENT,
    `percentagem` INT(2) NOT NULL,
  `descricao` VARCHAR(50) NOT NULL,
  `vigor` DATE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rafael`.`produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rafael`.`produtos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `referencia` INT(5) NOT NULL,
  `descricao` VARCHAR(50) NOT NULL,
  `stock` INT(2) NOT NULL,
  `preco` INT(4) NOT NULL,
  `iva_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_iva_idx` (`iva_id` ASC),
  CONSTRAINT `fk_iva`
    FOREIGN KEY (`iva_id`)
    REFERENCES `rafael`.`ivas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rafael`.`linhafaturas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rafael`.`linhafaturas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `quantidade` INT(2) NOT NULL,
  `valor` INT(2) NOT NULL,
  `valorIVA` INT(2) NOT NULL,
  `produto_id` INT NULL,
  `fatura_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_fatura_idx` (`fatura_id` ASC),
  INDEX `fk_produto_idx` (`produto_id` ASC),
  CONSTRAINT `fk_fatura`
    FOREIGN KEY (`fatura_id`)
    REFERENCES `rafael`.`faturas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produto`
    FOREIGN KEY (`produto_id`)
    REFERENCES `rafael`.`produtos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
