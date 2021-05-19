-- -----------------------------------------------------
-- Schema daintree_db
-- -----------------------------------------------------

-- This file inserts all of the test data

INSERT INTO `daintree_db`.`product` (`prod_id`, `name`, `price`, `units`) VALUES ('1', 'Test Product', '10', '50');
INSERT INTO `daintree_db`.`product` (`prod_id`, `name`, `price`, `units`) VALUES ('2', 'Test Product 2', '20', '100');
INSERT INTO `daintree_db`.`product` (`prod_id`, `name`, `price`, `units`) VALUES ('3', 'Test Product 3', '15', '390');
INSERT INTO `daintree_db`.`product` (`prod_id`, `name`, `price`, `units`) VALUES ('4', 'Test Product 4', '4', '10');

INSERT INTO `daintree_db`.`customer` (`cust_id`, `username`, `first_name`, `last_name`, `email`) VALUES ('1', 'DummyName', 'Test', 'McCustomer', 'test@example.com');
INSERT INTO `daintree_db`.`customer` (`cust_id`, `username`, `first_name`, `last_name`, `email`) VALUES ('2', 'NotARealPerson', 'Fake', 'Person', 'notreal@fake.email');
INSERT INTO `daintree_db`.`customer` (`cust_id`, `username`, `first_name`, `last_name`, `email`) VALUES ('3', 'Aliveman', 'Jhon', 'Doe', 'aliveman@email.com');

INSERT INTO `daintree_db`.`cart` (`cart_cust_id`, `cart_prod_id`, `quantity`) VALUES ('1', '1', '5');
INSERT INTO `daintree_db`.`cart` (`cart_cust_id`, `cart_prod_id`, `quantity`) VALUES ('1', '2', '1');
INSERT INTO `daintree_db`.`cart` (`cart_cust_id`, `cart_prod_id`, `quantity`) VALUES ('2', '3', '5');
INSERT INTO `daintree_db`.`cart` (`cart_cust_id`, `cart_prod_id`, `quantity`) VALUES ('2', '4', '1');
INSERT INTO `daintree_db`.`cart` (`cart_cust_id`, `cart_prod_id`, `quantity`) VALUES ('3', '1', '10');
INSERT INTO `daintree_db`.`cart` (`cart_cust_id`, `cart_prod_id`, `quantity`) VALUES ('3', '2', '15');
INSERT INTO `daintree_db`.`cart` (`cart_cust_id`, `cart_prod_id`, `quantity`) VALUES ('3', '3', '5');
INSERT INTO `daintree_db`.`cart` (`cart_cust_id`, `cart_prod_id`, `quantity`) VALUES ('3', '4', '1');
