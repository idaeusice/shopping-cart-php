-- -----------------------------------------------------
-- Schema daintree_db
-- -----------------------------------------------------

-- This file is a simple select statement to verify the tables are working properly

SELECT cst.first_name, c.quantity, p.name 
FROM customer cst INNER JOIN cart c USING (cust_id)
INNER JOIN product p USING (prod_id);

SELECT c.first_name, o.order_id, p.name, d.amount
FROM customer c INNER JOIN order_history o USING (cust_id)
INNER JOIN order_detail d USING (order_id)
INNER JOIN product p USING (prod_id);
