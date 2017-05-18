-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 23, 2015 at 06:53 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Table structure for table `friendlist`
--

CREATE TABLE IF NOT EXISTS `friendlist` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `friend` varchar(100) DEFAULT NULL,
  `loginuser` varchar(100) DEFAULT NULL,
  `friendid` int(100) DEFAULT NULL,
  `loginuserid` int(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `friendlist`
--

INSERT INTO `friendlist` (`id`, `friend`, `loginuser`, `friendid`, `loginuserid`, `date`, `time`, `status`) VALUES
(27, 'Rahul', 'abhi', 1, 16, '21-07-2015', '02-37-05', 'Friends'),
(28, 'John', 'Rahul', 15, 1, '23-07-2015', '10-38-45', 'Friends');

-- --------------------------------------------------------

--
-- Table structure for table `friendrequest`
--

CREATE TABLE IF NOT EXISTS `friendrequest` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `requestfrom` varchar(100) DEFAULT NULL,
  `requestto` varchar(100) DEFAULT NULL,
  `requestfromid` int(100) DEFAULT NULL,
  `requesttoid` int(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE IF NOT EXISTS `information` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `PhoneNo` varchar(100) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=696 ;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `FirstName`, `LastName`, `EmailId`, `PhoneNo`, `Address`) VALUES
(1, 'rahul', 'Ganorkar', 'rahul@gmail.com', '12345412', 'dadfsf'),
(144, 'rahul', 'Ganorkar', 'rahul@gmail.com', '131232442', 'cxzcxcc'),
(695, 'n m', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `password`, `email`) VALUES
(1, 'Rahul', '123', 'rahul@gmail.com'),
(15, 'John', '4567', 'john@gmail.com'),
(16, 'abhi', '789', 'abhi@gmail.com'),
(17, 'Amol', '123', 'amol@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `message` varchar(100) DEFAULT NULL,
  `fromfriend` varchar(100) DEFAULT NULL,
  `tofriend` varchar(100) DEFAULT NULL,
  `fromid` int(100) DEFAULT NULL,
  `toid` int(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `message`, `fromfriend`, `tofriend`, `fromid`, `toid`, `date`, `time`) VALUES
(33, '<p>hi</p>', 'John', 'Rahul', 15, 1, '14-07-2015', '03-43-19'),
(34, '<p>bye</p>', 'John', 'Rahul', 15, 1, '14-07-2015', '03-43-29'),
(37, '<p>hi john</p>', 'Rahul', 'John', 1, 15, '15-07-2015', '12-26-56');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `imgfile` varchar(100) DEFAULT NULL,
  `submissiondate` varchar(100) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `imgfile`, `submissiondate`, `user_id`) VALUES
(5, 'upload/22-07-2015-1437564883.jpg', '2015-07-22', '1'),
(6, 'upload/22-07-2015-1437626878.jpg', '2015-07-22', '15'),
(7, 'upload/22-07-2015-1437627426.jpg', '2015-07-22', '15'),
(8, 'upload/23-07-2015-1437627609.jpg', '2015-07-23', '16'),
(9, 'upload/23-07-2015-1437627698.jpg', '2015-07-23', '1'),
(10, 'upload/23-07-2015-1437641720.jpg', '2015-07-23', '1'),
(11, 'upload/23-07-2015-1437651167.jpg', '2015-07-23', '17'),
(12, 'upload/23-07-2015-1437651729.jpg', '2015-07-23', '1'),
(13, 'upload/23-07-2015-1437651974.jpg', '2015-07-23', '1');

-- --------------------------------------------------------

--
-- Table structure for table `uploadcover`
--

CREATE TABLE IF NOT EXISTS `uploadcover` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `imgfile` varchar(100) DEFAULT NULL,
  `submissiondate` varchar(100) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `uploadcover`
--

INSERT INTO `uploadcover` (`id`, `imgfile`, `submissiondate`, `user_id`) VALUES
(1, 'uploadcoverphoto/22-07-2015-1437566263.jpg', '2015-07-22', '1'),
(2, 'uploadcoverphoto/22-07-2015-1437626336.jpg', '2015-07-22', '1'),
(3, 'uploadcoverphoto/22-07-2015-1437626798.jpg', '2015-07-22', '15'),
(4, 'uploadcoverphoto/22-07-2015-1437626828.jpg', '2015-07-22', '15'),
(5, 'uploadcoverphoto/22-07-2015-1437626863.png', '2015-07-22', '15'),
(6, 'uploadcoverphoto/22-07-2015-1437627533.jpg', '2015-07-22', '16'),
(7, 'uploadcoverphoto/23-07-2015-1437627681.jpg', '2015-07-23', '1'),
(8, 'uploadcoverphoto/23-07-2015-1437627719.jpg', '2015-07-23', '1'),
(9, 'uploadcoverphoto/23-07-2015-1437628025.jpg', '2015-07-23', '1'),
(10, 'uploadcoverphoto/23-07-2015-1437641701.jpg', '2015-07-23', '1'),
(11, 'uploadcoverphoto/23-07-2015-1437651179.png', '2015-07-23', '17'),
(12, 'uploadcoverphoto/23-07-2015-1437651714.jpg', '2015-07-23', '1'),
(13, 'uploadcoverphoto/23-07-2015-1437651753.jpg', '2015-07-23', '1'),
(14, 'uploadcoverphoto/23-07-2015-1437651934.jpg', '2015-07-23', '1'),
(15, 'uploadcoverphoto/23-07-2015-1437651963.jpg', '2015-07-23', '1');

-- --------------------------------------------------------

--
-- Table structure for table `userfriendlist`
--

CREATE TABLE IF NOT EXISTS `userfriendlist` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `loginuser` varchar(100) DEFAULT NULL,
  `friend` varchar(100) NOT NULL,
  `loginuserid` int(100) DEFAULT NULL,
  `friendid` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `userfriendlist`
--

INSERT INTO `userfriendlist` (`id`, `loginuser`, `friend`, `loginuserid`, `friendid`) VALUES
(7, 'abhi', 'Rahul', 16, 1),
(8, 'Rahul', 'abhi', 1, 16),
(9, 'Rahul', 'John', 1, 15),
(10, 'John', 'Rahul', 15, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
