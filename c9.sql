-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Skapad: 14 dec 2016 kl 04:01
-- Serverversion: 5.5.53-0ubuntu0.14.04.1
-- PHP-version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `c9`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumpning av Data i tabell `cart`
--

INSERT INTO `cart` (`id`, `userid`, `productid`, `amount`) VALUES
(52, 1, 1, 4),
(53, 1, 3, 3),
(54, 1, 6, 1),
(55, 1, 10, 5),
(56, 1, 15, 2);

-- --------------------------------------------------------

--
-- Tabellstruktur `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `productid` int(10) NOT NULL,
  `orderid` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `totalprice` int(10) NOT NULL,
  `status` int(11) NOT NULL,
  `shippingname` varchar(45) NOT NULL,
  `shippingaddress` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL,
  `state` varchar(45) NOT NULL,
  `zip` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `productcategory`
--

CREATE TABLE IF NOT EXISTS `productcategory` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `url` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumpning av Data i tabell `productcategory`
--

INSERT INTO `productcategory` (`id`, `name`, `url`) VALUES
(1, 'Mice', 'mice.php'),
(2, 'Keyboards', 'keyboards.php'),
(3, 'Monitors', 'monitors.php'),
(4, 'Mouse Pads', 'mousepads.php'),
(5, 'Headsets', 'headsets.php');

-- --------------------------------------------------------

--
-- Tabellstruktur `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `categoryid` int(2) NOT NULL,
  `stock` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `imageurl` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumpning av Data i tabell `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `categoryid`, `stock`, `description`, `imageurl`) VALUES
(1, 'Razer Deathadder Chroma', '699', 1, '50+', 'babbe', 'http://images.maxgaming.se/data/product/445f356/razer_deathadder_elite.jpg'),
(2, 'SteelSeries Sensei RAW', '599', 1, 'oändligtxd', 'xdeee', 'http://images.maxgaming.se/data/product/445f356/steelseries_sensei_raw_rubberized_laser_mouse__wristband_1.jpg'),
(3, 'Corsair Gaming K55 RGB', '599', 2, '1231', '123123123', 'http://images.maxgaming.se/data/product/445f356/corsair_gaming_k55_rgb.jpg'),
(4, 'Razer Blackwidow Chroma', '1799', 2, '123123', '123123', 'http://images.maxgaming.se/data/product/445f356/razer_blackwidow_chroma_1.jpg'),
(5, 'Ducky Shine 5 (MX Blue)', '1999', 2, 'niklasbur', 'niklasbur', 'http://images.maxgaming.se/data/product/445f356/ducky_shine5_rgb_nordic_mx_blue_2.jpg'),
(6, 'Azer Predator 34" Curved LED', '12999', 3, 'xdeeee', 'najs skärm haHAA', 'http://images.maxgaming.se/data/product/215f172/acer_34_predator_curved_led_g-sync_x34a.jpg'),
(7, 'Azer Predator 24" LED XB240H', '2999', 3, 'ha', 'ha', 'http://images.maxgaming.se/data/product/215f172/benq_24_led_freesync_xf240h.jpg'),
(8, 'BenQ 24" XL2411 144Hz', '2999', 3, 'asd', 'asd', 'http://images.maxgaming.se/data/product/215f172/zowie_by_benq_24_xl2411z_144hz_12.jpg'),
(9, 'QPad CT Large Black 4mm', '279', 4, 'q224165314', '1645365', 'http://images.maxgaming.se/data/product/445f356/3881_large.jpg'),
(10, 'Razer Goliathus Large (Control)', '249', 4, '1231', '1231', 'http://images.maxgaming.se/data/product/215f172/razer_goliathus_gravity_large_control.jpg'),
(11, 'Xtrfy Friberg Large', '349', 4, '123', 'ingen för vem fan vill ha denna skit', 'http://images.maxgaming.se/data/product/215f172/xtrfy_friberg_king_of_banana_teampad_-_large.jpg'),
(12, 'SteelSeries Qck+ Black', '119', 4, '213123', '123123', 'http://images.maxgaming.se/data/product/445f356/wgueqi04.dpo-0s7sb-0s7sb.jpg'),
(13, 'Razer Kraken Pro 2015 Green', '799', 5, 'asd', 'qw', 'http://images.maxgaming.se/data/product/215f172/razer_kraken_pro_gaming_headset_-_green.jpg'),
(14, 'Astro A50 Gen3 Blue', '3299', 5, '123', '123', 'http://images.maxgaming.se/data/product/215f172/astro_gamingheadset_a50_ps4pc.jpg'),
(15, 'SteelSeries Siberia 200 Red', '599', 5, '1231', '1231', 'http://images.maxgaming.se/data/product/445f356/steelseries_siberia_200_gaming_headset_-_red.png'),
(16, 'Xtrfy GP3 HeatoN Large', '399', 4, 'finns på B', 'hjälp heaton hitta vägen till B', 'http://images.maxgaming.se/data/product/445f356/xtrfy_gp3_hard_mousepad_-_heaton_ed.jpg');

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `firstname` varchar(10) DEFAULT NULL,
  `lastname` varchar(12) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `country` varchar(15) DEFAULT NULL,
  `zip` int(5) DEFAULT NULL,
  `phonenumber` varchar(10) DEFAULT NULL,
  `usertype` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumpning av Data i tabell `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `firstname`, `lastname`, `age`, `country`, `zip`, `phonenumber`, `usertype`) VALUES
(1, 'jesper.ohman.1@gmail.com', '960d1d942c46503c67c03ccc7de5a28b', 'Jesper', 'Öhman', 21, 'Sweden', 97451, '0725865535', 'Admin'),
(2, 'hammas95@outlook.com', '88525dfa04a892586fd9125acb258af4', 'Johan', 'Hammas', 12, 'Zimbabwe', 95441, '0730876346', 'Customer'),
(3, 'test@test.test', '964fe6242ca987d24f0fdfd851983c68', 'Test', 'Test', 12, 'Whahili', 1337, '1337133713', 'Customer'),
(4, 'dude@swag.com', '4fded1464736e77865df232cbcb4cd19', 'daskj', 'dalksjd', 2, 'Swahili', 95442, '0701333713', 'Customer'),
(5, 'dada@swag.com', 'b01abf84324066bdb4eed4d5bf20f887', 'dada', 'dada', 12, 'dada', 1337, '&quot;; SE', 'Customer'),
(6, 'reppe@suger.com', '964fe6242ca987d24f0fdfd851983c68', 'ayy', 'fam', 19, 'dont', 81, 'hate', 'Customer'),
(7, 'kitti@is.the.worst', '964fe6242ca987d24f0fdfd851983c68', 'Emil', 'Kitti', 19, 'dont', 81, 'hate', 'Customer'),
(10, 'testaccount@test.123', 'cc03e747a6afbbcbf8be7668acfebee5', 'FirstName', 'LastName', 99, 'Nigeria', 97451, '0720000000', 'Customer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
