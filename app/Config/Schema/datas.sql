SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `datas` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `datas` ;

-- -----------------------------------------------------
-- Table `datas`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `datas`.`users` (
  `id` INT NOT NULL ,
  `username` VARCHAR(255) NOT NULL ,
  `password` CHAR(40) NOT NULL ,
  `role` VARCHAR(20) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `datas`.`source_types`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `datas`.`source_types` (
  `id` INT NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `description` TEXT NULL ,
  `init_params` TEXT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `datas`.`sources`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `datas`.`sources` (
  `id` INT NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `description` TEXT NULL ,
  `params` TEXT NOT NULL ,
  `source_type_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `source_type_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `datas`.`data_apps`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `datas`.`data_apps` (
  `id` INT NOT NULL ,
  `name` VARCHAR(45) NULL ,
  `description` VARCHAR(45) NULL ,
  `source_id` INT NOT NULL ,
  `secret` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`, `source_id`) )
ENGINE = InnoDB
COMMENT = 'ret';


-- -----------------------------------------------------
-- Table `datas`.`data_collections`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `datas`.`data_collections` (
  `id` INT NOT NULL ,
  `name` VARCHAR(45) NULL ,
  `description` TEXT NULL ,
  `data_app_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `data_app_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `datas`.`method_types`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `datas`.`method_types` (
  `id` INT NOT NULL ,
  `name` VARCHAR(45) NULL ,
  `alias` VARCHAR(45) NULL ,
  `http_methods` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
COMMENT = 'p_method\n';


-- -----------------------------------------------------
-- Table `datas`.`methods`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `datas`.`methods` (
  `id` INT NOT NULL ,
  `name` VARCHAR(45) NULL ,
  `description` VARCHAR(45) NULL ,
  `command` TEXT NULL ,
  `http_methods` TEXT NULL ,
  `data_collections_id` INT NOT NULL ,
  `method_type_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `data_collections_id`, `method_type_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `datas`.`method_params`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `datas`.`method_params` (
  `id` INT NOT NULL ,
  `name` VARCHAR(45) NULL ,
  `description` VARCHAR(45) NULL ,
  `validation` TEXT NULL ,
  `is_required` TINYINT(1) NULL ,
  `expression` TEXT NULL ,
  `methods_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `methods_id`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
