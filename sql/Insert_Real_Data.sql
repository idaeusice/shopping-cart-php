-- -----------------------------------------------------
-- Schema daintree_db
-- -----------------------------------------------------

-- This file inserts the real data into the database


-- All of the starter customer data
INSERT INTO `daintree_db`.`customer` (`email`, `first_name`, `last_name`, `password`, `admin`) VALUES ('admin@daintree.com', 'Admin', 'Account', 'Admin1234', '1');
INSERT INTO `daintree_db`.`customer` (`email`, `first_name`, `last_name`, `password`) VALUES ('gacracco@gmail.com', 'Gino', 'Cracco', 'Gino1234');
INSERT INTO `daintree_db`.`customer` (`email`, `first_name`, `last_name`, `password`) VALUES ('ssonvisen@gmail.com', 'Steven', 'Sonvisen', 'Steven1234');
INSERT INTO `daintree_db`.`customer` (`email`, `first_name`, `last_name`, `password`) VALUES ('jcarder@gmail.com', 'Jeremy', 'Carder', 'Jeremy1234');


-- All of the starter category data
INSERT INTO `daintree_db`.`category` (`name`) VALUES ('Cellphones');
INSERT INTO `daintree_db`.`category` (`name`) VALUES ('Tablets');
INSERT INTO `daintree_db`.`category` (`name`) VALUES ('Earbuds');
INSERT INTO `daintree_db`.`category` (`name`) VALUES ('Headsets');
INSERT INTO `daintree_db`.`category` (`name`) VALUES ('Microphones');
INSERT INTO `daintree_db`.`category` (`name`) VALUES ('Computers');
INSERT INTO `daintree_db`.`category` (`name`) VALUES ('Laptops');
INSERT INTO `daintree_db`.`category` (`name`) VALUES ('Appliances');
INSERT INTO `daintree_db`.`category` (`name`) VALUES ('Cameras');
INSERT INTO `daintree_db`.`category` (`name`) VALUES ('Lights');
INSERT INTO `daintree_db`.`category` (`name`) VALUES ('Outdoor Devices');


-- All of the starter product data
INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('1', 'jPhone 12', '699.99', '200', 'The newest jPhone model made by Pear.', 'includes/resources/images/jPhone12.png', '0', '0');
INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('1', 'B-Droid S6', '499.99', '221', 'The 2021 model of the B-Droid phone.', 'includes/resources/images/BDroid.png', '0', '0');
INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('1', 'Blueberry IX', '349.99', '186', 'Blueberry\'s phone from 2019.', 'includes/resources/images/BlueberryIX.png', '1', '0');
INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('1', 'Piczel 21', '299.99', '253', 'The 2021 model of phone from Goodle.', 'includes/resources/images/Piczel21.png', '0', '0');

INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('2', 'jPad 10', '899.99', '128', 'The newest tablet from Pear.', 'includes/resources/images/jPad.png', '0', '0');
INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('2', 'Macrosoft Window 10', '699.99', '115', 'The latest tablet from Macrosoft.', 'includes/resources/images/Window10.png', '0', '1');
INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('2', 'B-Droid Tablet G3', '599.99', '141', 'The third generation B-Droid tablet.', 'includes/resources/images/BDroidG3.png', '0', '0');

INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('3', 'SweetSkull Ear Buds', '49.99', '206', 'Ear buds made by SweetSkull', 'includes/resources/images/SweetSkullEB.png', '0', '0');
INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('3', 'Tunes Ear Buds', '49.99', '188', 'Ear buds made by Tunes', 'includes/resources/images/TunesEB.png', '0', '0');
INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('3', 'jBuds', '79.99', '79', 'The official ear buds for Pear poducts.', 'includes/resources/images/jBuds.png', '0', '0');
INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('3', 'Piczel Ear Buds', '29.99', '276', 'Ear buds made by Goodle', 'includes/resources/images/PiczelEB.png', '0', '0');

INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('4', 'SweetSkull Headset', '124.99', '97', 'A headset made by SweetSkull.', 'includes/resources/images/SweetSkullHS.png', '0', '0');
INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('4', 'Tunes Headset', '99.99', '78', 'A headset made by Tunes.', 'includes/resources/images/TunesHS.png', '1', '0');
INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('4', 'jSet', '174.99', '58', 'The official headset for Pear products.', 'includes/resources/images/jSet.png', '0', '0');
INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('4', 'Razer Gaming Headset', '99.99', '94', 'The newest gaming headset from Razer.', 'includes/resources/images/RazerHS.png', '0', '0');

INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('5', 'WhiteYeti Microphone', '79.99', '169', 'A relatively affordable microphone from WhiteYeti.', 'includes/resources/images/WhiteYetiMP.png', '0', '1');
INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('5', 'jMic', '129.99', '124', 'The official microphone for Pear products.', 'includes/resources/images/jMic.png', '0', '0');
INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('5', 'Razer Gaming Microphone', '99.99', '125', 'A high quallity mic for gaming by Razer.', 'includes/resources/images/RazerMP.png', '0', '0');

INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('6', 'Aylien Gaming PC', '1999.99', '23', 'A super powerfull pre-built gaming computer assembled by Aylien.', 'includes/resources/images/AylienPC.png', '0', '0');
INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('6', 'Pell Office PC', '899.99', '55', 'A Pell branded computer ready for office work.', 'includes/resources/images/PellPC.png', '0', '0');

INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('7', 'Razer Gaming Laptop', '1299.99', '31', 'A powerfull laptop for gaming away from home.', 'includes/resources/images/RazerLT.png', '0', '0');
INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('7', 'Macrosoft Surfer', '899.99', '39', 'The Surfer is a great laptop for sufing the web.', 'includes/resources/images/SurferLT.png', '0', '0');
INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('7', 'jTop', '1799.99', '52', 'The jTop laptop from Pear.', 'includes/resources/images/jTop.png', '0', '0');

INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('8', 'Super Bullet', '49.99', '30', 'A small but powerfull blender to instantly blend anything.', 'includes/resources/images/SuperBullet.png', '0', '0');
INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('8', 'Waveblaster', '124.99', '29', 'A microwave for cooking food fast.', 'includes/resources/images/Waveblaster.png', '1', '0');
INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('8', 'Ultracool', '249.99', '26', 'A mini fridge for keeping drinks cold without the need of a fullsized fridge.', 'includes/resources/images/Ultracool.png', '0', '0');

INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('9', 'Cam-Master', '499.99', '53', 'A 4K camcorder for documenting your favorite moments.', 'includes/resources/images/CamMaster.png', '0', '0');
INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('9', 'Banshee', '1999.99', '2', 'An powerfull slo-mo camera capable of frame-rates of up to 300 thousand frames per second.', 'includes/resources/images/Banshee.png', '0', '0');
INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('9', 'Kodak 8K', '274.99', '24', 'A camera by Kodak that shoots in 8K.', 'includes/resources/images/Kodak.png', '0', '0');

INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('10', 'Superflash 1000', '29.99', '89', 'A 1000 lumen flashlight.', 'includes/resources/images/Superflash.png', '0', '0');
INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('10', 'Buk Penlight', '19.99', '91', 'A pen/flashlight combo made by Buk.', 'includes/resources/images/BukPL.png', '0', '0');

INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('11', 'Zap Master', '64.99', '35', 'A bug zapper to stop bugs from bothering you.', 'includes/resources/images/ZapMaster.png', '0', '0');
INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('11', 'Hikers\' Long Range Walkie Talkies', '19.99', '40', 'Walkie talkies by Hikers that can communicate from up to 4km away.', 'includes/resources/images/HikersWT.png', '0', '0');
INSERT INTO `daintree_db`.`product` (`catagory_id`, `name`, `price`, `units`, `description`, `image`, `archive`, `feature`) VALUES ('11', 'QuickStart Electric Firestarter', '29.99', '44', 'A battery powered firestarter by QuickStart.', 'includes/resources/images/QuickStartEF.png', '0', '1');


-- All of the starter order history data
INSERT INTO `daintree_db`.`order_history` (`cust_id`, `date`) VALUES ('2', '2021-02-25'); -- Gino
INSERT INTO `daintree_db`.`order_history` (`cust_id`, `date`) VALUES ('3', '2021-03-16'); -- Steven
INSERT INTO `daintree_db`.`order_history` (`cust_id`, `date`) VALUES ('2', '2021-03-20'); -- Gino
INSERT INTO `daintree_db`.`order_history` (`cust_id`, `date`) VALUES ('4', '2021-03-21'); -- Jeremy
INSERT INTO `daintree_db`.`order_history` (`cust_id`, `date`) VALUES ('3', '2021-04-01'); -- Steven
INSERT INTO `daintree_db`.`order_history` (`cust_id`, `date`) VALUES ('4', '2021-04-11'); -- Jeremy


-- All of the starter order detail data
INSERT INTO `daintree_db`.`order_detail` (`order_id`, `prod_id`, `amount`, `price`) VALUES ('1', '2', '1', '499.99');
INSERT INTO `daintree_db`.`order_detail` (`order_id`, `prod_id`, `amount`, `price`) VALUES ('2', '25', '1', '124.99');
INSERT INTO `daintree_db`.`order_detail` (`order_id`, `prod_id`, `amount`, `price`) VALUES ('2', '26', '1', '249.99');
INSERT INTO `daintree_db`.`order_detail` (`order_id`, `prod_id`, `amount`, `price`) VALUES ('3', '19', '1', '1999.99');
INSERT INTO `daintree_db`.`order_detail` (`order_id`, `prod_id`, `amount`, `price`) VALUES ('3', '15', '1', '99.99');
INSERT INTO `daintree_db`.`order_detail` (`order_id`, `prod_id`, `amount`, `price`) VALUES ('3', '18', '1', '99.99');
INSERT INTO `daintree_db`.`order_detail` (`order_id`, `prod_id`, `amount`, `price`) VALUES ('4', '31', '2', '19.99');
INSERT INTO `daintree_db`.`order_detail` (`order_id`, `prod_id`, `amount`, `price`) VALUES ('4', '34', '1', '29.99');
INSERT INTO `daintree_db`.`order_detail` (`order_id`, `prod_id`, `amount`, `price`) VALUES ('5', '24', '2', '49.99');
INSERT INTO `daintree_db`.`order_detail` (`order_id`, `prod_id`, `amount`, `price`) VALUES ('6', '33', '3', '19.99');
INSERT INTO `daintree_db`.`order_detail` (`order_id`, `prod_id`, `amount`, `price`) VALUES ('6', '32', '2', '64.99');


-- All of the starter cart data
INSERT INTO `daintree_db`.`cart` (`cust_id`, `prod_id`, `quantity`) VALUES ('2', '6', '1');
INSERT INTO `daintree_db`.`cart` (`cust_id`, `prod_id`, `quantity`) VALUES ('2', '9', '1');
INSERT INTO `daintree_db`.`cart` (`cust_id`, `prod_id`, `quantity`) VALUES ('3', '20', '1');
INSERT INTO `daintree_db`.`cart` (`cust_id`, `prod_id`, `quantity`) VALUES ('3', '13', '1');
INSERT INTO `daintree_db`.`cart` (`cust_id`, `prod_id`, `quantity`) VALUES ('4', '27', '2');
INSERT INTO `daintree_db`.`cart` (`cust_id`, `prod_id`, `quantity`) VALUES ('4', '22', '1');
