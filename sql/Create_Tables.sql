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
-- Table `daintree_db`.`Customer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `daintree_db`.`Customer` (
  `cust_id` INT(11) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `admin` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`cust_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `daintree_db`.`Category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `daintree_db`.`Category` (
  `catagory_id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`catagory_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `daintree_db`.`Product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `daintree_db`.`Product` (
  `prod_id` INT(11) NOT NULL,
  `catagory_id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  `units` INT(11) NOT NULL,
  `description` VARCHAR(100) NULL DEFAULT NULL,
  `image` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`prod_id`),
  INDEX `fk_Product_Category1_idx` (`catagory_id` ASC) ,
  CONSTRAINT `fk_Product_Category1`
    FOREIGN KEY (`catagory_id`)
    REFERENCES `daintree_db`.`Category` (`catagory_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `daintree_db`.`Cart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `daintree_db`.`Cart` (
  `cust_id` INT(11) NOT NULL,
  `prod_id` INT(11) NOT NULL,
  `quantity` INT(11) NOT NULL,
  PRIMARY KEY (`cust_id`, `prod_id`),
  INDEX `fk_Cart_Customer_idx` (`cust_id` ASC) ,
  INDEX `fk_Cart_Product_idx` (`prod_id` ASC) ,
  CONSTRAINT `fk_Cart_Customer`
    FOREIGN KEY (`cust_id`)
    REFERENCES `daintree_db`.`Customer` (`cust_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cart_Product`
    FOREIGN KEY (`prod_id`)
    REFERENCES `daintree_db`.`Product` (`prod_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `daintree_db`.`Order_History`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `daintree_db`.`Order_History` (
  `order_id` INT NOT NULL,
  `cust_id` INT(11) NOT NULL,
  `date` DATE NOT NULL,
  PRIMARY KEY (`order_id`, `cust_id`),
  INDEX `fk_Order_customer1_idx` (`cust_id` ASC) ,
  CONSTRAINT `fk_Order_customer1`
    FOREIGN KEY (`cust_id`)
    REFERENCES `daintree_db`.`Customer` (`cust_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `daintree_db`.`Order_Detail`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `daintree_db`.`Order_Detail` (
  `order_id` INT NOT NULL,
  `prod_id` INT(11) NOT NULL,
  `amount` INT NOT NULL,
  INDEX `fk_Order_Detail_Order1_idx` (`order_id` ASC) ,
  PRIMARY KEY (`order_id`, `prod_id`),
  INDEX `fk_Order_Detail_Product1_idx` (`prod_id` ASC) ,
  CONSTRAINT `fk_Order_Detail_Order1`
    FOREIGN KEY (`order_id`)
    REFERENCES `daintree_db`.`Order_History` (`order_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Order_Detail_Product1`
    FOREIGN KEY (`prod_id`)
    REFERENCES `daintree_db`.`Product` (`prod_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
