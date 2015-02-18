-- MySQL Script generated by MySQL Workbench
-- 02/18/15 11:08:37
-- Model: New Model    Version: 1.0
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema it111_exercise1
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `it111_exercise1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `it111_exercise1` ;

-- -----------------------------------------------------
-- Table `it111_exercise1`.`Region`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `it111_exercise1`.`Region` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `region_code` VARCHAR(32) NULL,
  `region_description` VARCHAR(32) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `it111_exercise1`.`Province`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `it111_exercise1`.`Province` (
  `id` INT NOT NULL,
  `province_code` VARCHAR(32) NULL,
  `province_description` VARCHAR(32) NULL,
  `Region_id` INT NOT NULL,
  PRIMARY KEY (`id`, `Region_id`),
  INDEX `fk_Province_Region_idx` (`Region_id` ASC),
  CONSTRAINT `fk_Province_Region`
    FOREIGN KEY (`Region_id`)
    REFERENCES `it111_exercise1`.`Region` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `it111_exercise1`.`City`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `it111_exercise1`.`City` (
  `id` INT NOT NULL,
  `city_code` VARCHAR(32) NULL,
  `city_description` VARCHAR(32) NULL,
  `Province_id` INT NOT NULL,
  `Province_Region_id` INT NOT NULL,
  PRIMARY KEY (`id`, `Province_id`, `Province_Region_id`),
  INDEX `fk_City_Province1_idx` (`Province_id` ASC, `Province_Region_id` ASC),
  CONSTRAINT `fk_City_Province1`
    FOREIGN KEY (`Province_id` , `Province_Region_id`)
    REFERENCES `it111_exercise1`.`Province` (`id` , `Region_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
