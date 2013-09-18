DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminName` varchar(20) NOT NULL,
  `adminEmail` varchar(20) NOT NULL,
  `adminAddress` varchar(20) NOT NULL,
  `adminPhone` varchar(20) NOT NULL,
  `password` varchar(16) NOT NULL,
  `avatar` varchar(200) NOT NULL DEFAULT 'images/avatar/admin.jpg',
  PRIMARY KEY (`adminEmail`),
  UNIQUE KEY `adminPhone` (`adminPhone`)
)

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
 `u_id` int(4) NOT NULL auto_increment,
  `userName` varchar(20) NOT NULL,
  `userEmail` varchar(20) NOT NULL,
  `userAddress` varchar(20) NOT NULL,
  `userPhone` varchar(20) NOT NULL,
  `userBday` date NOT NULL,
  `sex` varchar(20) NOT NULL,
  `password` varchar(16) NOT NULL,
  `avatar` varchar(200) NOT NULL DEFAULT 'images/avatar/default_avatar.jpg',
  `capture` varchar(5) NOT NULL,
  PRIMARY KEY (`userEmail`),
  UNIQUE KEY `userPhone` (`userPhone`)
)

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `c_id` int(4) NOT NULL auto_increment,
  `c_name` varchar(20) NOT NULL,
  `userEmail` varchar(20) NOT NULL,
  `c_title` varchar(20) NOT NULL,
  `c_date` date NOT NULL,
  `c_desc` varchar(16) NOT NULL,
  PRIMARY KEY (`c_id`),
  FOREIGN KEY (`userEmail`) REFERENCES `user`(`userEmail`)
)

INSERT INTO `weborganizer`.`admin` (`adminName`, `adminEmail`, `adminAddress`, `adminPhone`, `password`, `avatar`) VALUES ('Admin', 'admin@mail.ru', 'AdminLand', '+77777777777', 'admin', 'images/avatar/admin.jpg');

