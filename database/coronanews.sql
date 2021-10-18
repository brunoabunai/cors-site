-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 15, 2021 at 02:45 PM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `coronanews`
--
CREATE DATABASE IF NOT EXISTS `coronanews` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `coronanews`;

-- --------------------------------------------------------




--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `pos_idPk` int(11) NOT NULL AUTO_INCREMENT,
  `use_idFk` int(11) NOT NULL,
  `pos_title` varchar(50) NOT NULL,
  `pos_description` varchar(5000) NOT NULL,
  `pos_data` datetime DEFAULT NULL,
  `pos_dataEdit` datetime DEFAULT NULL,
  PRIMARY KEY (`pos_idPk`),
  KEY `use_idFk` (`use_idFk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `use_idPk` int(11) NOT NULL AUTO_INCREMENT,
  `use_name` varchar(125) NOT NULL,
  `use_password` varchar(30) NOT NULL,
  `use_avatar` varchar(300) NOT NULL,
  PRIMARY KEY (`use_idPk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`use_idPk`, `use_name`, `use_password`, `use_avatar`) VALUES
(1, 'educalixto', '123', 'https://avatars.githubusercontent.com/u/71821586?v=4'),
(2, 'admins', 'bum', 'https://media.discordapp.net/attachments/827960392802238495/864954495142592522/unknown.png');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`use_idFk`) REFERENCES `users` (`use_idPk`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;












-- https://img-16.ccm2.net/_SqzzXVDSG50FWb_UBrCl3XwV78=/440x/1685e17045e747a899925aa16189c7c6/ccm-encyclopedia/99776312_s.jpg AVATAR

-- https://img-16.ccm2.net/_SqzzXVDSG50FWb_UBrCl3XwV78=/440x/1685e17045e747a899925aa16189c7c6/ccm-encyclopedia/99776312_s.jpg POST
