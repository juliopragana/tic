-- MySQL Script generated by MySQL Workbench
-- Mon Jan 28 12:36:18 2019
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
-- Table `tb_area`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tb_area` ;

CREATE TABLE IF NOT EXISTS `tb_area` (
  `id_area` INT NOT NULL AUTO_INCREMENT,
  `nome_area` VARCHAR(80) NULL,
  PRIMARY KEY (`id_area`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tb_problema`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tb_problema` ;

CREATE TABLE IF NOT EXISTS `tb_problema` (
  `id_problemba` INT NOT NULL AUTO_INCREMENT,
  `nome_problema` VARCHAR(45) NOT NULL,
  `tb_area_id_area` INT NOT NULL,
  PRIMARY KEY (`id_problemba`),
  CONSTRAINT `fk_tb_problema_tb_area`
    FOREIGN KEY (`tb_area_id_area`)
    REFERENCES `tb_area` (`id_area`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_tb_problema_tb_area_idx` ON `tb_problema` (`tb_area_id_area` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `tb_sub_problema`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tb_sub_problema` ;

CREATE TABLE IF NOT EXISTS `tb_sub_problema` (
  `id_sub_problema` INT NOT NULL AUTO_INCREMENT,
  `nome_sub_problema` VARCHAR(80) NOT NULL,
  `tb_problema_id_problemba` INT NOT NULL,
  PRIMARY KEY (`id_sub_problema`),
  CONSTRAINT `fk_tb_sub_problema_tb_problema1`
    FOREIGN KEY (`tb_problema_id_problemba`)
    REFERENCES `tb_problema` (`id_problemba`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_tb_sub_problema_tb_problema1_idx` ON `tb_sub_problema` (`tb_problema_id_problemba` ASC) VISIBLE;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;