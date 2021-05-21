-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema daintree_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema daintree_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `daintree_db` DEFAULT CHARACTER SET utf8 ;
USE `daintree_db` ;

-- -----------------------------------------------------
-- Table `daintree_db`.`customer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `daintree_db`.`customer` (
  `cust_id` INT(11) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cust_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `daintree_db`.`product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `daintree_db`.`product` (
  `prod_id` INT(11) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `price` DECIMAL(5,2) NOT NULL,
  `units` INT(11) NOT NULL,
  `description` VARCHAR(100) NULL,
  `image` VARCHAR(45) NULL,
  PRIMARY KEY (`prod_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `daintree_db`.`cart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `daintree_db`.`cart` (
  `cart_cust_id` INT(11) NOT NULL,
  `cart_prod_id` INT(11) NOT NULL,
  `quantity` INT(11) NOT NULL,
  PRIMARY KEY (`cart_cust_id`, `cart_prod_id`),
  INDEX `fk_Cart_Customer_idx` (`cart_cust_id` ASC) ,
  INDEX `fk_Cart_Product_idx` (`cart_prod_id` ASC) ,
  CONSTRAINT `fk_Cart_Customer`
    FOREIGN KEY (`cart_cust_id`)
    REFERENCES `daintree_db`.`customer` (`cust_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cart_Product`
    FOREIGN KEY (`cart_prod_id`)
    REFERENCES `daintree_db`.`product` (`prod_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
