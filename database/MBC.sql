SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`events`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`events` (
  `id` INT NOT NULL ,
  `events_date`  NULL ,
  `events_location` VARCHAR(100) NULL ,
  `events_prioritylevel` INT NULL ,
  `no_of_attendees` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`member`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`member` (
  `id` INT NOT NULL ,
  `member_lastname` VARCHAR(45) NULL ,
  `member_firstname` VARCHAR(45) NULL ,
  `member_contactno` VARCHAR(45) NULL ,
  `member_homeadd` VARCHAR(45) NULL ,
  `member_emailadd` VARCHAR(45) NULL ,
  `member_actministry` VARCHAR(45) NULL ,
  `member_attendance` VARCHAR(100) NULL ,
  `Membercol` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`member_has_events`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`member_has_events` (
  `id` INT NOT NULL ,
  `events_id` INT NOT NULL ,
  `member_id` INT NOT NULL ,
  PRIMARY KEY (`events_id`, `member_id`, `id`) ,
  INDEX `fk_Member_has_Events_Member1_idx` (`member_id` ASC) ,
  CONSTRAINT `fk_Member_has_Events_Events`
    FOREIGN KEY (`events_id` )
    REFERENCES `mydb`.`events` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Member_has_Events_Member1`
    FOREIGN KEY (`member_id` )
    REFERENCES `mydb`.`member` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tithe`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`tithe` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `tithe_date`  NULL ,
  `tithe_envno` VARCHAR(45) NULL ,
  `tithe_amount` INT NULL ,
  `tithe_total` INT NULL ,
  `member_ID` INT NOT NULL ,
  PRIMARY KEY (`id`, `member_ID`) ,
  INDEX `fk_Tithe_Member1_idx` (`member_ID` ASC) ,
  CONSTRAINT `fk_Tithe_Member1`
    FOREIGN KEY (`member_ID` )
    REFERENCES `mydb`.`member` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`prayerrequest`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`prayerrequest` (
  `id` INT NOT NULL ,
  `prayerrequest_code` INT NULL ,
  `prayerrequest_type` VARCHAR(45) NULL ,
  `prayerrequest_description` VARCHAR(100) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`member_gives_prayerrequest`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`member_gives_prayerrequest` (
  `id` INT NOT NULL ,
  `prayerrequest_id` INT NOT NULL ,
  `member_id` INT NOT NULL ,
  PRIMARY KEY (`prayerrequest_id`, `member_id`, `id`) ,
  INDEX `fk_Member_gives_PrayerRequest_Member1_idx` (`member_id` ASC) ,
  CONSTRAINT `fk_Member_gives_PrayerRequest_PrayerRequest1`
    FOREIGN KEY (`prayerrequest_id` )
    REFERENCES `mydb`.`prayerrequest` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Member_gives_PrayerRequest_Member1`
    FOREIGN KEY (`member_id` )
    REFERENCES `mydb`.`member` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`admin`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`admin` (
  `id` INT NOT NULL ,
  `admin_filterprayer` TINYINT(1) NULL ,
  `admin_postprayer` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`filtered_prayerrequest`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`filtered_prayerrequest` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `prayerrequest_id` INT NOT NULL ,
  `admin_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `prayerrequest_id`, `admin_id`) ,
  INDEX `fk_Filtered_PrayerRequest_Admin1_idx` (`admin_id` ASC) ,
  CONSTRAINT `fk_Filtered_PrayerRequest_PrayerRequest1`
    FOREIGN KEY (`prayerrequest_id` )
    REFERENCES `mydb`.`prayerrequest` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Filtered_PrayerRequest_Admin1`
    FOREIGN KEY (`admin_id` )
    REFERENCES `mydb`.`admin` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
