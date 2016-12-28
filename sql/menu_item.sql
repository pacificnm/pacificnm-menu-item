-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 26, 2016 at 10:32 AM
-- Server version: 10.0.28-MariaDB-0+deb8u1
-- PHP Version: 5.6.27-0+deb8u1

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `camper`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE IF NOT EXISTS `menu_item` (
`menu_item_id` int(20) unsigned NOT NULL,
  `menu_id` int(20) unsigned NOT NULL,
  `menu_item_name` varchar(100) NOT NULL,
  `menu_item_icon` varchar(100) NOT NULL,
  `menu_item_route` varchar(100) NOT NULL,
  `menu_item_order` int(3) NOT NULL,
  `menu_item_active` int(3) NOT NULL
) ENGINE=InnoDB;

--
-- RELATIONS FOR TABLE `menu_item`:
--   `menu_id`
--       `menu` -> `menu_id`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_item`
--
ALTER TABLE `menu_item`
 ADD PRIMARY KEY (`menu_item_id`), ADD KEY `menu_id` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_item`
--
ALTER TABLE `menu_item`
MODIFY `menu_item_id` int(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu_item`
--
ALTER TABLE `menu_item`
ADD CONSTRAINT `fk_menu_item_menu_id` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`);
SET FOREIGN_KEY_CHECKS=1;
