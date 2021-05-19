-- -----------------------------------------------------
-- Schema daintree_db
-- -----------------------------------------------------

-- This file is a simple select statement to verify the tables are working properly

SELECT cst.username, c.quantity, p.name 
FROM customer cst INNER JOIN cart c ON (cust_id = cart_cust_id)
INNER JOIN product p ON (cart_prod_id = prod_id);