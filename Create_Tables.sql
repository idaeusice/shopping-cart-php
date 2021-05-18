-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema daintree_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema daintree_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `daintree_db` DEFAULT CHARACTER SET utf8 ;
USE `daintree_db` ;

-- -----------------------------------------------------
-- Table `daintree_db`.`Customer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `daintree_db`.`Customer` (
  `cust_id` INT NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cust_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `daintree_db`.`Products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `daintree_db`.`Products` (
  `prod_id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `price` VARCHAR(45) NOT NULL,
  `units` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`prod_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `daintree_db`.`Cart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `daintree_db`.`Cart` (
  `cart_cust_id` INT NOT NULL,
  `cart_prod_id` INT NOT NULL,
  `quantity` INT NOT NULL,
  INDEX `fk_Cart_Customer_idx` (`cart_cust_id` ASC) ,
  INDEX `fk_Cart_Products1_idx` (`cart_prod_id` ASC) ,
  PRIMARY KEY (`cart_cust_id`, `cart_prod_id`),
  CONSTRAINT `fk_Cart_Customer`
    FOREIGN KEY (`cart_cust_id`)
    REFERENCES `daintree_db`.`Customer` (`cust_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cart_Products1`
    FOREIGN KEY (`cart_prod_id`)
    REFERENCES `daintree_db`.`Products` (`prod_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
