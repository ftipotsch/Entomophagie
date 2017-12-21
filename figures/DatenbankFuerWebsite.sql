-- MySQL Script generated by MySQL Workbench
-- Wed Dec 20 11:01:30 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema projektentomophagie
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema projektentomophagie
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `projektentomophagie` DEFAULT CHARACTER SET utf8 ;
USE `projektentomophagie` ;

-- -----------------------------------------------------
-- Table `projektentomophagie`.`Seriennummer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projektentomophagie`.`Seriennummer` (
  `idSeriennummer` INT NOT NULL,
  `Seriennummern` INT NOT NULL,
  `SeriennumerAktiviert` TINYINT NULL,
  PRIMARY KEY (`idSeriennummer`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projektentomophagie`.`migration`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projektentomophagie`.`migration` (
  `version` VARCHAR(180) NOT NULL,
  `apply_time` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`version`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projektentomophagie`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projektentomophagie`.`user` (
  `id` INT(11) NOT NULL,
  `username` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `auth_key` VARCHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `password_hash` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `password_reset_token` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `email` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `status` SMALLINT(6) NOT NULL DEFAULT '10',
  `created_at` INT(11) NOT NULL,
  `updated_at` INT(11) NOT NULL,
  `Seriennummer_idSeriennummer` INT NOT NULL,
  PRIMARY KEY (`id`, `Seriennummer_idSeriennummer`),
  UNIQUE INDEX `username` (`username` ASC),
  UNIQUE INDEX `email` (`email` ASC),
  UNIQUE INDEX `password_reset_token` (`password_reset_token` ASC),
  INDEX `fk_user_Seriennummer_idx` (`Seriennummer_idSeriennummer` ASC),
  CONSTRAINT `fk_user_Seriennummer`
    FOREIGN KEY (`Seriennummer_idSeriennummer`)
    REFERENCES `projektentomophagie`.`Seriennummer` (`idSeriennummer`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;