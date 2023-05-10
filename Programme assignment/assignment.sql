-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-07-13 08:46:48
-- 伺服器版本： 10.4.19-MariaDB
-- PHP 版本： 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `assignment`
--

-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

CREATE TABLE `account` (
  `user_ID` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `cashpoints` int(10) NOT NULL,
  `administration` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `account`
--

INSERT INTO `account` (`user_ID`, `name`, `email`, `password`, `address`, `cashpoints`, `administration`) VALUES
('', 'test', 'Billy@abcx.com', '123456', 'home2', 50, 0),
('1', 'admin', 'admin@gmail.com', 'admin123', 'home', 50, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `itemlist`
--

CREATE TABLE `itemlist` (
  `Item_image` varchar(50) NOT NULL,
  `item_ID` int(4) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_category` varchar(50) NOT NULL,
  `item_price` int(10) NOT NULL,
  `item_status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `itemlist`
--

INSERT INTO `itemlist` (`Item_image`, `item_ID`, `item_name`, `item_category`, `item_price`, `item_status`) VALUES
('images/car1.jpg', 1, 'model car 1', 'red', 80, 10),
('images/car2.jpg', 2, 'model car 2', 'red', 80, 10),
('images/car3.jpg', 3, 'model car 3', 'red', 80, 10),
('images/car4.jpg', 4, 'model car 4', 'red', 90, 10),
('images/car5.jpg', 5, 'model car 5', 'red', 120, 10),
('images/car12.jpg', 6, 'model car 6', 'red', 90, 10),
('images/car18.jpg', 7, 'model car 7', 'red', 80, 10),
('images/car8.jpg', 8, 'model car 8', 'red', 70, 10),
('images/car9.jpg', 9, 'model car 9', 'red', 85, 10),
('images/car10.jpg', 10, 'model car 10', 'red', 90, 10),
('images/car11.jpg', 11, 'model car 11', 'red', 100, 10),
('images/car14.jpg', 12, 'model car 12', 'red', 70, 10);

-- --------------------------------------------------------

--
-- 資料表結構 `order_history`
--

CREATE TABLE `order_history` (
  `user_ID` varchar(20) NOT NULL,
  `order_ID` varchar(20) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `order_desdcriptions` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 觸發器 `order_history`
--
DELIMITER $$
CREATE TRIGGER `order_date_created` BEFORE INSERT ON `order_history` FOR EACH ROW set new.`order_date` = now()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 資料表結構 `order_history_detail`
--

CREATE TABLE `order_history_detail` (
  `item_ID` int(4) NOT NULL,
  `item_price` int(10) NOT NULL,
  `item_quantity` int(5) NOT NULL,
  `order_ID` varchar(20) NOT NULL,
  `order_status` varchar(15) NOT NULL,
  `order_delivery_plan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`user_ID`);

--
-- 資料表索引 `itemlist`
--
ALTER TABLE `itemlist`
  ADD PRIMARY KEY (`item_ID`);

--
-- 資料表索引 `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `order_history_userID_fk` (`user_ID`);

--
-- 資料表索引 `order_history_detail`
--
ALTER TABLE `order_history_detail`
  ADD PRIMARY KEY (`item_ID`,`order_ID`),
  ADD KEY `order_history_detail_orderID_fk` (`order_ID`);

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `order_history`
--
ALTER TABLE `order_history`
  ADD CONSTRAINT `order_history_userID_fk` FOREIGN KEY (`user_ID`) REFERENCES `account` (`user_ID`) ON UPDATE CASCADE;

--
-- 資料表的限制式 `order_history_detail`
--
ALTER TABLE `order_history_detail`
  ADD CONSTRAINT `order_history_detail_itemID_fk` FOREIGN KEY (`item_ID`) REFERENCES `itemlist` (`item_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_history_detail_orderID_fk` FOREIGN KEY (`order_ID`) REFERENCES `order_history` (`order_ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
