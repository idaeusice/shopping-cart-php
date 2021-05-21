-- -----------------------------------------------------
-- Schema daintree_db
-- -----------------------------------------------------

-- This file inserts all of the test data

INSERT INTO `daintree_db`.`customer` (`cust_id`, `email`, `first_name`, `last_name`, `password`, `admin`) VALUES ('1', 'admin@email.com', 'Admin', 'Istrator', 'adminpassword', 1);
INSERT INTO `daintree_db`.`customer` (`cust_id`, `email`, `first_name`, `last_name`, `password`) VALUES ('2', 'test@example.com', 'Test', 'McCustomer', 'pass1234');
INSERT INTO `daintree_db`.`customer` (`cust_id`, `email`, `first_name`, `last_name`, `password`) VALUES ('3', 'notreal@fake.email', 'Fake', 'Person', 'strongpassword');
INSERT INTO `daintree_db`.`customer` (`cust_id`, `email`, `first_name`, `last_name`, `password`) VALUES ('4', 'aliveman@email.com', 'Jhon', 'Doe', 'extremelystrongpassword');

INSERT INTO `daintree_db`.`category` (`catagory_id`, `name`) VALUES ('1', 'Cellphones');
INSERT INTO `daintree_db`.`category` (`catagory_id`, `name`) VALUES ('2', 'Computers');
INSERT INTO `daintree_db`.`category` (`catagory_id`, `name`) VALUES ('3', 'Appliances');
INSERT INTO `daintree_db`.`category` (`catagory_id`, `name`) VALUES ('4', 'Devices');

INSERT INTO `daintree_db`.`product` (`prod_id`, `catagory_id`, `name`, `price`, `units`, `description`) VALUES ('1', '1', 'Shmapple', '300', '50', 'A real cellphone');
INSERT INTO `daintree_db`.`product` (`prod_id`, `catagory_id`, `name`, `price`, `units`, `description`) VALUES ('2', '1', 'Cyborg', '250', '40', 'A real cellphone');
INSERT INTO `daintree_db`.`product` (`prod_id`, `catagory_id`, `name`, `price`, `units`, `description`) VALUES ('3', '2', 'Aylien', '2000', '10', 'A super gaming pc');
INSERT INTO `daintree_db`.`product` (`prod_id`, `catagory_id`, `name`, `price`, `units`, `description`) VALUES ('4', '3', 'Super Bullet', '100', '65', 'A compact blender');
INSERT INTO `daintree_db`.`product` (`prod_id`, `catagory_id`, `name`, `price`, `units`, `description`) VALUES ('5', '4', 'Zapmaster', '50', '35', 'A powerful bugzapper');

INSERT INTO `daintree_db`.`cart` (`cust_id`, `prod_id`, `quantity`) VALUES ('1', '1', '5');
INSERT INTO `daintree_db`.`cart` (`cust_id`, `prod_id`, `quantity`) VALUES ('1', '2', '2');
INSERT INTO `daintree_db`.`cart` (`cust_id`, `prod_id`, `quantity`) VALUES ('2', '3', '1');
INSERT INTO `daintree_db`.`cart` (`cust_id`, `prod_id`, `quantity`) VALUES ('2', '4', '1');
INSERT INTO `daintree_db`.`cart` (`cust_id`, `prod_id`, `quantity`) VALUES ('3', '1', '10');
INSERT INTO `daintree_db`.`cart` (`cust_id`, `prod_id`, `quantity`) VALUES ('3', '2', '15');
INSERT INTO `daintree_db`.`cart` (`cust_id`, `prod_id`, `quantity`) VALUES ('3', '3', '5');
INSERT INTO `daintree_db`.`cart` (`cust_id`, `prod_id`, `quantity`) VALUES ('3', '4', '1');

INSERT INTO `daintree_db`.`order_history` (`order_id`, `cust_id`, `date`) VALUES ('1', '2', '2021-05-05');
INSERT INTO `daintree_db`.`order_history` (`order_id`, `cust_id`, `date`) VALUES ('2', '2', '2021-05-06');
INSERT INTO `daintree_db`.`order_history` (`order_id`, `cust_id`, `date`) VALUES ('3', '3', '2021-05-07');
INSERT INTO `daintree_db`.`order_history` (`order_id`, `cust_id`, `date`) VALUES ('4', '3', '2021-05-08');
INSERT INTO `daintree_db`.`order_history` (`order_id`, `cust_id`, `date`) VALUES ('5', '4', '2021-05-09');
INSERT INTO `daintree_db`.`order_history` (`order_id`, `cust_id`, `date`) VALUES ('6', '4', '2021-05-10');

INSERT INTO `daintree_db`.`order_detail` (`order_id`, `prod_id`, `amount`) VALUES ('1', '1', '2');
INSERT INTO `daintree_db`.`order_detail` (`order_id`, `prod_id`, `amount`) VALUES ('1', '2', '2');
INSERT INTO `daintree_db`.`order_detail` (`order_id`, `prod_id`, `amount`) VALUES ('2', '3', '1');
INSERT INTO `daintree_db`.`order_detail` (`order_id`, `prod_id`, `amount`) VALUES ('3', '2', '1');
INSERT INTO `daintree_db`.`order_detail` (`order_id`, `prod_id`, `amount`) VALUES ('4', '4', '1');
INSERT INTO `daintree_db`.`order_detail` (`order_id`, `prod_id`, `amount`) VALUES ('4', '5', '2');
INSERT INTO `daintree_db`.`order_detail` (`order_id`, `prod_id`, `amount`) VALUES ('5', '3', '1');
INSERT INTO `daintree_db`.`order_detail` (`order_id`, `prod_id`, `amount`) VALUES ('5', '1', '1');
INSERT INTO `daintree_db`.`order_detail` (`order_id`, `prod_id`, `amount`) VALUES ('6', '5', '1');
INSERT INTO `daintree_db`.`order_detail` (`order_id`, `prod_id`, `amount`) VALUES ('6', '4', '2');
