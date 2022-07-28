-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-06-15 15:37:51
-- 伺服器版本： 10.4.19-MariaDB
-- PHP 版本： 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `myorder`
--

CREATE TABLE `myorder` (
  `myorder_id` int(50) NOT NULL,
  `user_id` int(5) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_photo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` int(5) NOT NULL,
  `order_number` int(20) NOT NULL,
  `order_price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `myorder`
--

INSERT INTO `myorder` (`myorder_id`, `user_id`, `product_id`, `product_photo`, `product_type`, `product_price`, `order_number`, `order_price`) VALUES
(22, 0, 1, 'Car_1653548558.png', 'TOYOTA YARIS S', 5000, 1, 5000),
(24, 0, 1, 'Car_1653548558.png', 'TOYOTA YARIS S', 5000, 1, 5000);

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `product_photo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_number` int(20) NOT NULL,
  `product_remainnumber` int(10) NOT NULL,
  `product_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`product_id`, `product_photo`, `product_type`, `product_number`, `product_remainnumber`, `product_price`) VALUES
(1, 'Car_1653548558.png', 'TOYOTA YARIS S', 35, 24, 5000),
(2, 'Car_1653548947.png', 'BMW X6', 15, 11, 20000),
(3, 'Car_1653550059.png', 'BMW X4', 10, 7, 50000),
(4, 'Car_1653550100.png', 'TOYOTA YARIS CROSSOVER', 30, 20, 9000);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_role` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_account` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_birth` date NOT NULL,
  `user_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` int(20) NOT NULL,
  `user_photo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`user_id`, `user_role`, `user_name`, `user_account`, `user_password`, `user_birth`, `user_address`, `user_email`, `user_phone`, `user_photo`, `user_date`) VALUES
(1, 'user', 'cindy', 'user123', '123456', '2022-05-03', 'å°ä¸­å¸‚', '123@gmail.com', 933333333, 'Photo_1654154501.jfif', '2022-06-02'),
(3, 'user', 'cindy', 'user123', 'sfre', '2022-05-22', 'å°ä¸­å¸‚', 'cindy83392@gmail.com', 933333333, 'Photo_1654154514.jfif', '2022-06-02'),
(4, 'admin', 'admin', 'admin123', 'admin123', '2022-05-18', 'é«˜é›„å¸‚æ¥ æ¢“å€é«˜é›„å¤§å­¸è·¯700è™Ÿ', 'admin@gmail.com', 91234567, 'Photo_1654154611.jpg', '2022-06-02'),
(5, 'user', 'z', 'user456', '123456', '2022-05-13', 'é«˜é›„å¸‚', '456@gmail.com', 93646546, 'Photo_1654154585.jfif', '2022-06-02'),
(6, 'user', 'test', 'user789', '123456', '2022-05-02', 'å°åŒ—å¸‚', '789@gmail.com', 2147483647, 'Photo_1654154593.jfif', '2022-06-02'),
(8, 'user', 'afsdf', 'user1234', '123456', '2022-06-03', 'å°åŒ—å¸‚', '123654@gmail.com', 2147483647, 'Photo_1655295528.jfif', '2022-06-15');

-- --------------------------------------------------------

--
-- 資料表結構 `userorder`
--

CREATE TABLE `userorder` (
  `userorder_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_photo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `order_number` int(20) NOT NULL,
  `order_price` int(10) NOT NULL,
  `order_starttime` datetime NOT NULL,
  `order_endtime` datetime NOT NULL,
  `order_date` date NOT NULL,
  `order_return` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `userorder`
--

INSERT INTO `userorder` (`userorder_id`, `user_id`, `user_name`, `product_id`, `product_photo`, `product_type`, `order_number`, `order_price`, `order_starttime`, `order_endtime`, `order_date`, `order_return`) VALUES
(8, 1, 'cindy', 2, 'Car_1653548947.png', 'BMW X6', 1, 20000, '2022-06-18 12:30:00', '2022-06-27 13:30:00', '2022-05-30', 'æœªå–è»Š'),
(9, 1, 'cindy', 3, 'Car_1653550059.png', 'BMW X4', 1, 50000, '2022-05-11 12:30:00', '2022-05-27 13:30:00', '2022-05-30', 'æœªæ­¸é‚„'),
(10, 1, 'cindy', 1, 'Car_1653548558.png', 'TOYOTA YARIS S', 1, 5000, '2022-05-23 08:30:00', '2022-06-30 13:30:00', '2022-05-30', 'æœªæ­¸é‚„'),
(11, 6, 'test', 2, 'Car_1653548947.png', 'BMW X6', 1, 20000, '2022-05-29 12:30:00', '2022-06-01 13:30:00', '2022-05-31', 'å·²é‚„è»Š'),
(12, 6, 'test', 4, 'Car_1653550100.png', 'TOYOTA YARIS CROSSOVER', 1, 9000, '2022-06-15 08:30:00', '2022-06-29 13:30:00', '2022-05-31', 'æœªæ­¸é‚„'),
(13, 6, 'test', 2, 'Car_1653548947.png', 'BMW X6', 1, 20000, '2022-06-01 08:30:00', '2022-06-01 13:30:00', '2022-05-31', 'æœªå–è»Š'),
(14, 6, 'test', 1, 'Car_1653548558.png', 'TOYOTA YARIS S', 1, 5000, '2022-06-01 08:30:00', '2022-06-01 13:30:00', '2022-05-31', 'æœªå–è»Š'),
(15, 1, 'cindy', 2, 'Car_1653548947.png', 'BMW X6', 1, 20000, '2022-06-01 08:30:00', '2022-06-01 13:30:00', '2022-06-01', 'æœªå–è»Š'),
(16, 1, 'cindy', 1, 'Car_1653548558.png', 'TOYOTA YARIS S', 1, 5000, '2022-06-17 08:30:00', '2022-06-17 13:30:00', '2022-06-02', 'æœªå–è»Š'),
(17, 1, 'cindy', 2, 'Car_1653548947.png', 'BMW X6', 1, 20000, '2022-06-17 08:30:00', '2022-06-17 13:30:00', '2022-06-02', 'æœªå–è»Š'),
(18, 1, 'cindy', 1, 'Car_1653548558.png', 'TOYOTA YARIS S', 1, 5000, '2022-06-17 08:30:00', '2022-06-17 13:30:00', '2022-06-02', 'æœªå–è»Š'),
(19, 1, 'cindy', 1, 'Car_1653548558.png', 'TOYOTA YARIS S', 1, 5000, '2022-06-17 08:30:00', '2022-06-17 13:30:00', '2022-06-09', 'æœªå–è»Š'),
(20, 1, 'cindy', 1, 'Car_1653548558.png', 'TOYOTA YARIS S', 1, 5000, '2022-06-20 08:30:00', '2022-06-30 17:30:00', '2022-06-15', 'æœªå–è»Š'),
(21, 1, 'cindy', 2, 'Car_1653548947.png', 'BMW X6', 1, 20000, '2022-06-20 08:30:00', '2022-06-30 17:30:00', '2022-06-15', 'æœªå–è»Š'),
(22, 1, 'cindy', 1, 'Car_1653548558.png', 'TOYOTA YARIS S', 1, 5000, '2022-06-17 08:30:00', '2022-06-17 13:30:00', '2022-06-15', 'æœªå–è»Š');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `myorder`
--
ALTER TABLE `myorder`
  ADD PRIMARY KEY (`myorder_id`),
  ADD KEY `product_id` (`product_id`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- 資料表索引 `userorder`
--
ALTER TABLE `userorder`
  ADD PRIMARY KEY (`userorder_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `myorder`
--
ALTER TABLE `myorder`
  MODIFY `myorder_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `userorder`
--
ALTER TABLE `userorder`
  MODIFY `userorder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `myorder`
--
ALTER TABLE `myorder`
  ADD CONSTRAINT `myorder_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- 資料表的限制式 `userorder`
--
ALTER TABLE `userorder`
  ADD CONSTRAINT `userorder_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `userorder_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
