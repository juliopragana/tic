-- MySQL Script generated by MySQL Workbench
-- Sat Jan  5 22:50:50 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema ocomon
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ocomon
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ocomon` DEFAULT CHARACTER SET utf8 ;
USE `ocomon` ;

-- -----------------------------------------------------
-- Table `tb_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tb_user` ;

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(45) NOT NULL,
  `e-mail` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  `dataregistro` TIMESTAMP NULL,
  PRIMARY KEY (`id_user`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tb_funcionarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tb_funcionarios` ;

CREATE TABLE IF NOT EXISTS `tb_funcionarios` (
  `id_funcionario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `unidade` VARCHAR(45) NOT NULL,
  `setor` VARCHAR(45) NOT NULL,
  `funcao` VARCHAR(45) NOT NULL,
  `e-mail` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(45) NULL,
  `skype` VARCHAR(45) NULL,
  `ramal` VARCHAR(45) NULL,
  PRIMARY KEY (`id_funcionario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tb_equipamentos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tb_equipamentos` ;

CREATE TABLE IF NOT EXISTS `tb_equipamentos` (
  `id_equipamento` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL,
  `marca` VARCHAR(45) NOT NULL,
  `modelo` VARCHAR(45) NOT NULL,
  `configuracao` LONGTEXT NOT NULL,
  `tombo` VARCHAR(45) NOT NULL,
  `status` INT NOT NULL,
  PRIMARY KEY (`id_equipamento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tb_emprestimo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tb_emprestimo` ;

CREATE TABLE IF NOT EXISTS `tb_emprestimo` (
  `id_emprestimo` INT NOT NULL AUTO_INCREMENT,
  `num_chamado` INT NOT NULL,
  `id_funcionario` INT NOT NULL,
  `id_equipamento` INT NOT NULL,
  `data_entrega` DATETIME NOT NULL,
  `data_receber` DATETIME NOT NULL,
  `status` INT NOT NULL,
  PRIMARY KEY (`id_emprestimo`),
  CONSTRAINT `fk_tb_emprestimo_tb_equipamentos`
    FOREIGN KEY (`id_equipamento`)
    REFERENCES `tb_equipamentos` (`id_equipamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_emprestimo_tb_funcionarios1`
    FOREIGN KEY (`id_funcionario`)
    REFERENCES `tb_funcionarios` (`id_funcionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_tb_emprestimo_tb_equipamentos_idx` ON `tb_emprestimo` (`id_equipamento` ASC) VISIBLE;

CREATE INDEX `fk_tb_emprestimo_tb_funcionarios1_idx` ON `tb_emprestimo` (`id_funcionario` ASC) VISIBLE;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
