SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `mbc_rts`.`events`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mbc_rts`.`events` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `events_date` DATE NULL ,
  `events_location` VARCHAR(100) NULL ,
  `events_prioritylevel` INT NULL ,
  `no_of_attendees` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mbc_rts`.`member`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mbc_rts`.`member` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `member_lastname` VARCHAR(45) NULL ,
  `member_firstname` VARCHAR(45) NULL ,
  `member_contactno` VARCHAR(45) NULL ,
  `member_homeadd` VARCHAR(45) NULL ,
  `member_emailadd` VARCHAR(45) NULL ,
  `member_actministry` VARCHAR(45) NULL ,
  `member_attendance` VARCHAR(100) NULL ,
  `membercol` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mbc_rts`.`member_has_events`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mbc_rts`.`member_has_events` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `events_id` INT NOT NULL ,
  `member_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `events_id`, `member_id`) ,
  INDEX `fk_Member_has_Events_Member1_idx` (`member_id` ASC) ,
  CONSTRAINT `fk_Member_has_Events_Events`
    FOREIGN KEY (`events_id` )
    REFERENCES `mbc_rts`.`events` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Member_has_Events_Member1`
    FOREIGN KEY (`member_id` )
    REFERENCES `mbc_rts`.`member` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mbc_rts`.`tithe`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mbc_rts`.`tithe` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `tithe_date` DATE NULL ,
  `tithe_envno` VARCHAR(45) NULL ,
  `tithe_amount` INT NULL ,
  `tithe_total` INT NULL ,
  `member_ID` INT NOT NULL ,
  PRIMARY KEY (`id`, `member_ID`) ,
  INDEX `fk_Tithe_Member1_idx` (`member_ID` ASC) ,
  CONSTRAINT `fk_Tithe_Member1`
    FOREIGN KEY (`member_ID` )
    REFERENCES `mbc_rts`.`member` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mbc_rts`.`prayer`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mbc_rts`.`prayer` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `prayer_code` INT NULL ,
  `prayer_type` VARCHAR(45) NULL ,
  `prayer_description` VARCHAR(100) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mbc_rts`.`member_gives_prayer`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mbc_rts`.`member_gives_prayer` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `prayer_id` INT NOT NULL ,
  `member_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `prayer_id`, `member_id`) ,
  INDEX `fk_Member_gives_PrayerRequest_Member1_idx` (`member_id` ASC) ,
  CONSTRAINT `fk_Member_gives_PrayerRequest_PrayerRequest1`
    FOREIGN KEY (`prayer_id` )
    REFERENCES `mbc_rts`.`prayer` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Member_gives_PrayerRequest_Member1`
    FOREIGN KEY (`member_id` )
    REFERENCES `mbc_rts`.`member` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mbc_rts`.`admin`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mbc_rts`.`admin` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `admin_filterprayer` TINYINT(1) NULL ,
  `admin_postprayer` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mbc_rts`.`filtered_prayer`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mbc_rts`.`filtered_prayer` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `prayer_id` INT NOT NULL ,
  `admin_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `prayer_id`, `admin_id`) ,
  INDEX `fk_Filtered_PrayerRequest_Admin1_idx` (`admin_id` ASC) ,
  CONSTRAINT `fk_Filtered_PrayerRequest_PrayerRequest1`
    FOREIGN KEY (`prayer_id` )
    REFERENCES `mbc_rts`.`prayer` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Filtered_PrayerRequest_Admin1`
    FOREIGN KEY (`admin_id` )
    REFERENCES `mbc_rts`.`admin` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
