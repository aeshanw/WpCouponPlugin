rresources :tasks
n SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 26, 2011 at 06:42 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `wordpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_coupon_referals`
--

CREATE TABLE `wp_coupon_referals` (
  `coupon_referal_id` mediumint(3) NOT NULL,
  `friend_id` mediumint(3) NOT NULL,
  `referer_id` mediumint(3) NOT NULL,
  `friend_coupon` varchar(255) NOT NULL,
  `referer_coupon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
esources :tasks

