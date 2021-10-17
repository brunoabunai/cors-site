SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `coronaN`
--
CREATE DATABASE IF NOT EXISTS `coronaN` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `coronaN`;

-- ----------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `pos_idPk` int(11) NOT NULL AUTO_INCREMENT,
  `use_idFk` int(11) NOT NULL,
  `pos_title` varchar(200) NOT NULL,
  `pos_description` varchar(65.535) NOT NULL,
  `pos_image` varchar(150) NOT NULL DEFAULT ('https://img-16.ccm2.net/_SqzzXVDSG50FWb_UBrCl3XwV78=/440x/1685e17045e747a899925aa16189c7c6/ccm-encyclopedia/99776312_s.jpg'),
  `pos_date` datetime NOT NULL,
  `pos_dateEdit` datetime NOT NULL,
  PRIMARY KEY (`pos_idPk`),
  KEY `use_idFk` (`use_idFk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- ----------------------------------------------------------

--
-- Table structure for table `recommendations`
--

CREATE TABLE IF NOT EXISTS `recommendations` (
  `rec_idPk` int(11) NOT NULL AUTO_INCREMENT,
  `use_idFk` int(11) NOT NULL,
  `rec_title` varchar(200) NOT NULL,
  `rec_description` varchar(65.535) NOT NULL,
  `rec_date` datetime NOT NULL,
  `rec_response` bit(1) DEFAULT 0 NOT NULL,
  PRIMARY KEY (`rec_idPk`),
  KEY `use_idFk` (`use_idFk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- ----------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `use_idPk` int(11) NOT NULL AUTO_INCREMENT,
  `typ_idFk` int(11) NOT NULL DEFAULT 1,
  `use_name` varchar(150) NOT NULL,
  `use_email` varchar(150) NOT NULL,
  `use_password` varchar(32) NOT NULL,
  `use_avatar` varchar(150) NOT NULL DEFAULT ('https://img-16.ccm2.net/_SqzzXVDSG50FWb_UBrCl3XwV78=/440x/1685e17045e747a899925aa16189c7c6/ccm-encyclopedia/99776312_s.jpg'),
  PRIMARY KEY (`use_idPk`),
  KEY `typ_idFk` (`typ_idFk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- ----------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `typ_idPk` int(11) NOT NULL AUTO_INCREMENT,
  `typ_name` varchar(30) NOT NULL,
  PRIMARY KEY (`typ_idPk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- -----------------------------------------------------------------------------

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`typ_name`) VALUES
('user'),
('writer'),
('admin');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`typ_idFk`, `use_email`, `use_name`, `use_password`) VALUES
((SELECT typ_idPk from types WHERE typ_name='admin'), 'admin', 'admin@gmail.com', 'c3284d0f94606de1fd2af172aba15bf3');

--
-- Dumping data for table `posts`
--

-- -----------------------------------------------------------------------------

--
-- FOREIGN KEY for table `posts`
--

ALTER TABLE `posts`
  ADD FOREIGN KEY (`use_idFk`) REFERENCES `users` (`use_idPk`);

--
-- FOREIGN KEY for table `recommendations`
--

ALTER TABLE `recommendations`
  ADD FOREIGN KEY (`use_idFk`) REFERENCES `users` (`use_idPk`);

--
-- FOREIGN KEY for table `users`
--

ALTER TABLE `users`
  ADD FOREIGN KEY (`typ_idFk`) REFERENCES `types` (`typ_idPk`);

--
-- FOREIGN KEY for table `types`
--
