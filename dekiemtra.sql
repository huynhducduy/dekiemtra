-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 05, 2014 at 04:55 PM
-- Server version: 5.5.36-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dekiemtr_dekiemtra`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer_parts`
--

CREATE TABLE IF NOT EXISTS `answer_parts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `it` int(10) NOT NULL,
  `gdocid` text NOT NULL,
  `download` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `answer_parts`
--

INSERT INTO `answer_parts` (`id`, `it`, `gdocid`, `download`) VALUES
(1, 1, '0B1lZQd8-Yga_U1VDQ29VNXhqUUE', 0),
(2, 2, '0B1lZQd8-Yga_MFJvRWxKOGhaNlE', 0),
(3, 3, '0B1lZQd8-Yga_MUhBNlVzZE9RSWs', 0),
(4, 4, '0B1lZQd8-Yga_c0VQR0dTbmxjOU0', 1),
(19, 19, '0B1lZQd8-Yga_SWR0cV9ScFhBT0E', 0),
(18, 18, '0B1lZQd8-Yga_cklBNUtFYXFreFk', 0),
(13, 13, '0B-SM9EDYAS5NVmJ1aVB0NTZIXzg', 0),
(14, 14, '0B1lZQd8-Yga_NjFZOU02Y2FvM2M', 0),
(15, 15, '0B1lZQd8-Yga_bzNLbUk3TUIyd28', 0),
(16, 16, '0B1lZQd8-Yga_ZmoxWmVuc1ZlUEk', 0),
(17, 17, '0B1lZQd8-Yga_MHVQU0gtWkVZb2s', 0),
(20, 20, '0B1lZQd8-Yga_YVRqUkVuSlhHaUU', 0),
(21, 21, '0B1lZQd8-Yga_ZlFhc01yeHRvYkE', 0),
(22, 22, '0B1lZQd8-Yga_d0FpZTFLV2JCanc', 0),
(23, 23, '0B1lZQd8-Yga_ZzNxVGVOZFdsdXM', 0),
(34, 34, '0B1lZQd8-Yga_c0FIS2dCTUtxcU0', 0),
(24, 24, '0B1lZQd8-Yga_OEs2ZkZBNlJjcDA', 0),
(25, 25, '0B1lZQd8-Yga_M09LQnYxdXlpR1E', 0),
(26, 26, '0B1lZQd8-Yga_dzVnSW5VZDRzaEk', 0),
(27, 27, '0B1lZQd8-Yga_X0VjMVVteV9vUW8', 0),
(28, 28, '0B1lZQd8-Yga_Ykk4bFJzUGptZ28', 0),
(29, 29, '0B1lZQd8-Yga_OEs2ZkZBNlJjcDA', 0),
(30, 30, '0B1lZQd8-Yga_MnFGdFFTVW9TMGs', 0),
(31, 31, '0B1lZQd8-Yga_T2ZydndjYVBKbE', 0),
(32, 32, '0B1lZQd8-Yga_OVhuUmhiZVdGREE', 0),
(33, 33, '0B1lZQd8-Yga_NGsyVWUyaDVWdE0', 0),
(35, 35, '0B1lZQd8-Yga_bk9CRWV0cTB0RGM', 0),
(36, 36, '0B1lZQd8-Yga_dmFvNk1lTGJkSjA', 0),
(37, 37, '0B1lZQd8-Yga_MV93Nmt4cmNxaVk', 0),
(38, 38, '0B1lZQd8-Yga_RmNON2J4anRXWFk', 0),
(39, 39, '0B1lZQd8-Yga_dEwtQmdpVldXelk', 0),
(40, 40, '0B1lZQd8-Yga_R1BDaEx3X3NHLVU', 0),
(41, 41, '0B1lZQd8-Yga_djhRcEllb3dHS0E', 0),
(42, 42, '0B1lZQd8-Yga_WHFTMGJvRXhPZ2c', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cate1`
--

CREATE TABLE IF NOT EXISTS `cate1` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id2` int(10) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `keyword` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=126 ;

--
-- Dumping data for table `cate1`
--

INSERT INTO `cate1` (`id`, `id2`, `title`, `description`, `keyword`) VALUES
(1, 1, 'Khối A', 'Khối A', 'khoia'),
(2, 1, 'Khối A1', 'Khối A1', 'khoia1'),
(3, 1, 'Khối B', 'Khối B', 'khoib'),
(4, 1, 'Khối C', 'Khối C', 'khoic'),
(5, 1, 'Khối D', 'Khối D', 'khoid'),
(6, 2, 'Khối A', 'Khối A', 'khoia'),
(7, 2, 'Khối A1', 'Khối A1', 'khoia1'),
(8, 2, 'Khối B', 'Khối B', 'khoib'),
(9, 2, 'Khối C', 'Khối C', 'khoic'),
(10, 2, 'Khối D', 'Khối D', 'khoid'),
(11, 2, 'Thi thử', 'Thi thử', 'thithu'),
(12, 3, 'Khối A', 'Khối A', 'khoia'),
(13, 3, 'Khối A1', 'Khối A1', 'khoia1'),
(14, 3, 'Khối B', 'Khối B', 'khoib'),
(15, 3, 'Khối C', 'Khối C', 'khoic'),
(16, 3, 'Khối D', 'Khối D', 'khoid'),
(17, 3, 'Thi thử', 'Thi thử', 'thithu'),
(18, 4, 'Ngữ văn', 'Ngữ văn', 'nguvan'),
(19, 4, 'Toán học', 'Toán học', 'toanhoc'),
(20, 4, 'Anh văn', 'Anh văn', 'anhvan'),
(21, 4, 'Thi thử', 'Thi thử', 'thithu'),
(22, 5, 'Ngữ văn', 'Ngữ văn', 'nguvan'),
(23, 5, 'Toán học', 'Toán học', 'toanhoc'),
(24, 5, 'Anh văn', 'Anh văn', 'anhvan'),
(25, 5, 'Thi thử', 'Thi thử', 'thithu'),
(26, 6, 'Ngữ văn', 'Ngữ văn', 'nguvan'),
(27, 6, 'Toán học', 'Toán học', 'toanhoc'),
(28, 6, 'Vật lí', 'Vật lí', 'vatli'),
(29, 6, 'Hóa học', 'Hóa học', 'hoahoc'),
(30, 6, 'Sinh học', 'Sinh học', 'sinhhoc'),
(31, 6, 'Lịch sử', 'Lịch sử', 'lichsu'),
(32, 6, 'Địa lý', 'Địa Lý', 'dialy'),
(33, 6, 'Tin học', 'Tin học', 'tinhoc'),
(34, 6, 'Ngoại ngữ', 'Ngoại ngữ', 'ngoaingu'),
(35, 6, 'GDCD – GDNGLL – GD Hướng nghiệp', 'GDCD – GDNGLL – GD Hướng nghiệp', 'gccd-gdngll-gdhn'),
(36, 6, 'Giáo dục Quốc phòng', 'Giáo dục Quốc phòng', 'GDQP'),
(37, 7, 'Ngữ văn', 'Ngữ văn', 'nguvan'),
(38, 7, 'Toán học', 'Toán học', 'toanhoc'),
(39, 7, 'Vật lí', 'Vật lí', 'vatli'),
(40, 7, 'Hóa học', 'Hóa học', 'hoahoc'),
(41, 7, 'Sinh học', 'Sinh học', 'sinhhoc'),
(42, 7, 'Lịch sử', 'Lịch sử', 'lichsu'),
(43, 7, 'Địa lý', 'Địa Lý', 'dialy'),
(44, 7, 'Tin học', 'Tin học', 'tinhoc'),
(45, 7, 'Ngoại ngữ', 'Ngoại ngữ', 'ngoaingu'),
(46, 7, 'GDCD – GDNGLL – GD Hướng nghiệp', 'GDCD – GDNGLL – GD Hướng nghiệp', 'gccd-gdngll-gdhn'),
(47, 7, 'Giáo dục Quốc phòng', 'Giáo dục Quốc phòng', 'GDQP'),
(48, 8, 'Ngữ văn', 'Ngữ văn', 'nguvan'),
(49, 8, 'Toán học', 'Toán học', 'toanhoc'),
(50, 8, 'Vật lí', 'Vật lí', 'vatli'),
(51, 8, 'Hóa học', 'Hóa học', 'hoahoc'),
(52, 8, 'Sinh học', 'Sinh học', 'sinhhoc'),
(53, 8, 'Lịch sử', 'Lịch sử', 'lichsu'),
(54, 8, 'Địa lý', 'Địa Lý', 'dialy'),
(55, 8, 'Tin học', 'Tin học', 'tinhoc'),
(56, 8, 'Ngoại ngữ', 'Ngoại ngữ', 'ngoaingu'),
(57, 9, 'Ngữ văn', 'Ngữ văn', 'nguvan'),
(58, 9, 'Toán học', 'Toán học', 'toanhoc'),
(59, 9, 'Vật lí', 'Vật lí', 'vatli'),
(60, 9, 'Hóa học', 'Hóa học', 'hoahoc'),
(61, 9, 'Sinh học', 'Sinh học', 'sinhhoc'),
(62, 9, 'Lịch sử', 'Lịch sử', 'lichsu'),
(63, 9, 'Địa lý', 'Địa Lý', 'dialy'),
(64, 9, 'Tin học', 'Tin học', 'tinhoc'),
(65, 9, 'Ngoại ngữ', 'Ngoại ngữ', 'ngoaingu'),
(66, 9, 'GDCD – GDNGLL – GD Hướng nghiệp', 'GDCD – GDNGLL – GD Hướng nghiệp', 'gccd-gdngll-gdhn'),
(67, 9, 'Giáo dục Quốc phòng', 'Giáo dục Quốc phòng', 'GDQP'),
(68, 10, 'Ngữ văn', 'Ngữ văn', 'nguvan'),
(69, 10, 'Toán học', 'Toán học', 'toanhoc'),
(70, 10, 'Ngoại ngữ', 'Ngoại ngữ', 'ngoaingu'),
(71, 11, 'Ngữ văn', 'Ngữ văn', 'nguvan'),
(72, 11, 'Toán học', 'Toán học', 'toanhoc'),
(73, 11, 'Vật lí', 'Vật lí', 'vatli'),
(74, 11, 'Hóa học', 'Hóa học', 'hoahoc'),
(75, 11, 'Sinh học', 'Sinh học', 'sinhhoc'),
(76, 11, 'Lịch sử', 'Lịch sử', 'lichsu'),
(77, 11, 'Địa lý', 'Địa Lý', 'dialy'),
(78, 11, 'Tin học', 'Tin học', 'tinhoc'),
(79, 11, 'Ngoại ngữ', 'Ngoại ngữ', 'ngoaingu'),
(88, 12, 'Ngoại ngữ', 'Ngoại ngữ', 'ngoaingu'),
(87, 12, 'Tin học', 'Tin học', 'tinhoc'),
(86, 12, 'Địa lý', 'Địa Lý', 'dialy'),
(85, 12, 'Lịch sử', 'Lịch sử', 'lichsu'),
(84, 12, 'Sinh học', 'Sinh học', 'sinhhoc'),
(83, 12, 'Hóa học', 'Hóa học', 'hoahoc'),
(82, 12, 'Vật lí', 'Vật lí', 'vatli'),
(81, 12, 'Toán học', 'Toán học', 'toanhoc'),
(80, 12, 'Ngữ văn', 'Ngữ văn', 'nguvan'),
(89, 12, 'Âm nhạc', 'Âm nhạc', 'amnhac'),
(90, 12, 'Mỹ thuật', 'Mỹ thuật', 'mythuat'),
(91, 12, 'GDCD', 'GDCD', 'gdcd'),
(92, 13, 'Ngữ văn', 'Ngữ văn', 'nguvan'),
(93, 13, 'Toán học', 'Toán học', 'toanhoc'),
(94, 13, 'Vật lí', 'Vật lí', 'vatli'),
(95, 13, 'Hóa học', 'Hóa học', 'hoahoc'),
(96, 13, 'Sinh học', 'Sinh học', 'sinhhoc'),
(97, 13, 'Lịch sử', 'Lịch sử', 'lichsu'),
(98, 13, 'Địa lý', 'Địa Lý', 'dialy'),
(99, 13, 'Tin học', 'Tin học', 'tinhoc'),
(100, 13, 'Ngoại ngữ', 'Ngoại ngữ', 'ngoaingu'),
(101, 13, 'Âm nhạc', 'Âm nhạc', 'amnhac'),
(102, 13, 'Mỹ thuật', 'Mỹ thuật', 'mythuat'),
(103, 13, 'GDCD', 'GDCD', 'gdcd'),
(104, 14, 'Ngữ văn', 'Ngữ văn', 'nguvan'),
(105, 14, 'Toán học', 'Toán học', 'toanhoc'),
(106, 14, 'Vật lí', 'Vật lí', 'vatli'),
(107, 14, 'Hóa học', 'Hóa học', 'hoahoc'),
(108, 14, 'Sinh học', 'Sinh học', 'sinhhoc'),
(109, 14, 'Lịch sử', 'Lịch sử', 'lichsu'),
(110, 14, 'Địa lý', 'Địa Lý', 'dialy'),
(111, 14, 'Tin học', 'Tin học', 'tinhoc'),
(112, 14, 'Ngoại ngữ', 'Ngoại ngữ', 'ngoaingu'),
(113, 14, 'Âm nhạc', 'Âm nhạc', 'amnhac'),
(114, 14, 'Mỹ thuật', 'Mỹ thuật', 'mythuat'),
(115, 14, 'GDCD', 'GDCD', 'gdcd'),
(116, 15, 'Khối A', 'Khối A', 'khoia'),
(117, 15, 'Khối A1', 'Khối A1', 'khoia1'),
(118, 15, 'Khối B', 'Khối B', 'khoib'),
(119, 15, 'Khối C', 'Khối C', 'khoic'),
(120, 15, 'Khối D', 'Khối D', 'khoid'),
(121, 5, 'Vật lý', 'Vật lý', 'vatly'),
(122, 5, 'Hóa học', 'Hóa học', 'hoahoc'),
(123, 5, 'Sinh học', 'Sinh học', 'sinhhoc'),
(124, 5, 'Địa lý', 'Địa lý', 'dialy'),
(125, 5, 'Lịch sử', 'Lịch sử', 'lichsu');

-- --------------------------------------------------------

--
-- Table structure for table `cate2`
--

CREATE TABLE IF NOT EXISTS `cate2` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id3` int(10) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `keyword` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `cate2`
--

INSERT INTO `cate2` (`id`, `id3`, `title`, `description`, `keyword`) VALUES
(1, 1, 'Cấu trúc đề thi', 'Cấu trúc đề thi', 'cautrucdethi'),
(2, 1, 'Đề thi tuyển sinh', 'Đề thi tuyển sinh', 'dethituyensinh'),
(3, 1, 'Đề thi tốt nghiệp', 'Đề thi tốt nghiệp', 'dethitotnghiep'),
(4, 2, 'Đề thi tuyển sinh', 'Đề thi tuyển sinh', 'dethituyensinh'),
(5, 2, 'Đề thi tốt nghiệp', 'Đề thi tốt nghiệp', 'dethitotnghiep'),
(6, 2, 'Đề kiểm tra học kỳ', 'Đề kiểm tra học kỳ', 'dekiemtrahocky'),
(7, 2, 'Đề kiểm tra khác', 'Đề kiểm tra khác', 'dekiemtrakhac'),
(8, 2, 'Đề thi học sinh giỏi', 'Đề thi học sinh giỏi', 'dethihocsinhgioi'),
(9, 2, 'Đề cương', 'Đề cương', 'decuong'),
(10, 3, 'Đề thi tuyển sinh', 'Đề thi tuyển sinh', 'dethituyensinh'),
(11, 3, 'Đề thi học sinh giỏi', 'Đề thi học sinh giỏi', 'dethihocsinhgioi'),
(12, 3, 'Đề kiểm tra học kỳ', 'Đề kiểm tra học kỳ', 'dekiemtrahochocky'),
(13, 3, 'Đề kiểm tra khác', 'Đề kiểm tra khác', 'dekiemtrakhac'),
(14, 3, 'Đề cương', 'Đề cương', 'decuong'),
(15, 1, 'Đề cương', 'Đề cương', 'decuong');

-- --------------------------------------------------------

--
-- Table structure for table `cate3`
--

CREATE TABLE IF NOT EXISTS `cate3` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `keyword` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cate3`
--

INSERT INTO `cate3` (`id`, `title`, `description`, `keyword`) VALUES
(1, 'ĐH-CĐ', 'Đại học – Cao Đẳng', 'daihoccaodang'),
(2, 'THPT', 'Trung Học Phổ Thông', 'trunghocphothong'),
(3, 'THCS', 'Trung Học Cơ Sở', 'trunghoccoso');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `it` int(10) NOT NULL,
  `tid` int(10) NOT NULL,
  `content` text NOT NULL,
  `time` text NOT NULL,
  `uid` int(10) NOT NULL,
  `liked` int(10) NOT NULL,
  `uid_liked` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `it`, `tid`, `content`, `time`, `uid`, `liked`, `uid_liked`) VALUES
(1, 4, 0, '<p>Đề n&agrave;y h&igrave;nh như dễ qu&aacute; :D</p>', '1404828303', 1, 1, '1'),
(2, 0, 1, '<p>Đề dễ như thế n&agrave;y m&agrave; m&igrave;nh vẫn chưa l&agrave;m đ&uacute;ng hết sao :((</p>', '1404828468', 1, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `contributions`
--

CREATE TABLE IF NOT EXISTS `contributions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `source` text CHARACTER SET utf8 NOT NULL,
  `origin` text CHARACTER SET utf8 NOT NULL,
  `uploader` int(10) NOT NULL,
  `cg1` int(10) NOT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE IF NOT EXISTS `online` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `time` int(10) NOT NULL,
  `ip` text CHARACTER SET utf8 NOT NULL,
  `local` text CHARACTER SET utf8 NOT NULL,
  `userid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11404 ;

--
-- Dumping data for table `online`
--

INSERT INTO `online` (`id`, `time`, `ip`, `local`, `userid`) VALUES
(11395, 1407232235, '14.165.80.191', '/admin/posttest.php', 0),
(11396, 1407232237, '14.165.80.191', '/admin/testlist.php', 0),
(11397, 1407232252, '14.165.80.191', '/de-thi-tot-nghiep-thpt-2013-mon-ngu-van.42.php', 0),
(11398, 1407232259, '173.252.110.113', '/de-thi-tot-nghiep-thpt-2013-mon-ngu-van.42.php', 0),
(11399, 1407232285, '14.165.80.191', '/admin/index2.php', 0),
(11400, 1407232353, '14.165.80.191', '/latest', 0),
(11401, 1407232363, '14.165.80.191', '/admin/index2.php', 0),
(11402, 1407232373, '14.165.80.191', '/de-thi-tot-nghiep-thpt-2013-mon-ngu-van.42.php', 0),
(11403, 1407232388, '14.165.80.191', '/latest', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ques_history`
--

CREATE TABLE IF NOT EXISTS `ques_history` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tid` int(10) NOT NULL,
  `qid` int(10) NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `tf` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `ques_history`
--

INSERT INTO `ques_history` (`id`, `tid`, `qid`, `content`, `tf`) VALUES
(1, 1, 1, '', 0),
(2, 1, 2, '1', 1),
(3, 1, 3, '3', 0),
(4, 1, 4, '3', 1),
(5, 1, 5, '3', 1),
(6, 1, 6, '<ul><li>a. Kh&ocirc;ng biết</li><li>b. AH = 4,8</li><li>c. B =&nbsp;<img alt="37^{o}" src="http://latex.codecogs.com/gif.latex?37%5E%7Bo%7D" /></li><li>&nbsp; &nbsp; C =&nbsp;<img alt="53^{o}" src="http://latex.codecogs.com/gif.latex?53%5E%7Bo%7D" /></li><li>d. AHC = 8,64(đvdt)</li></ul><p>&nbsp;</p>', 3),
(7, 1, 7, '<p>=&nbsp;<img alt="\\frac{68}{25}" src="http://latex.codecogs.com/gif.latex?%5Cfrac%7B68%7D%7B25%7D" /></p>', 3),
(8, 1, 8, '<p>Kh&ocirc;ng biết l&agrave;m</p>', 3),
(9, 2, 1, '1', 0),
(10, 2, 2, '3', 0),
(11, 2, 3, '3', 0),
(12, 2, 4, '3', 1),
(13, 2, 5, '3', 1),
(14, 2, 6, '', 3),
(15, 2, 7, '', 3),
(16, 2, 8, '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ques_parts`
--

CREATE TABLE IF NOT EXISTS `ques_parts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `it` int(10) NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `answer` text CHARACTER SET utf8 NOT NULL,
  `tf` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ques_parts`
--

INSERT INTO `ques_parts` (`id`, `it`, `content`, `answer`, `tf`, `score`) VALUES
(1, 4, '<p>Kết quả n&agrave;o sau đ&acirc;y l&agrave; đ&uacute;ng?</p>', '<p><img alt="sin37^{o}=cos53^{o}" src="http://latex.codecogs.com/gif.latex?sin37%5E%7Bo%7D%3Dcos53%5E%7Bo%7D" />|-|<img alt="tan30^{o}.cos30^{o}=1" src="http://latex.codecogs.com/gif.latex?tan30%5E%7Bo%7D.cos30%5E%7Bo%7D%3D1" />|-|<img alt="\\frac{cos18^{o}}{cos72^{o}}=cot18^{o}" src="http://latex.codecogs.com/gif.latex?%5Cfrac%7Bcos18%5E%7Bo%7D%7D%7Bcos72%5E%7Bo%7D%7D%3Dcot18%5E%7Bo%7D" />|-|&nbsp;Cả 3 c&acirc;u tr&ecirc;n</p>', 4, 1),
(2, 4, '<p>Cho tam giac ABC vu&ocirc;ng tại A,&nbsp;AC = 24mm, B = <img alt="60^{o}" src="http://latex.codecogs.com/gif.latex?60%5E%7Bo%7D" />&nbsp;. Kẻ đường cao AH. Độ d&agrave;i đường cao AH&nbsp;<br />l&agrave;:</p>', '<p>12mm|-|<img alt="6\\sqrt3" src="http://latex.codecogs.com/gif.latex?6%5Csqrt3" />mm|-|<img alt="12\\sqrt3" src="http://latex.codecogs.com/gif.latex?12%5Csqrt3" />mm|-|Đ&aacute;p &aacute;n kh&aacute;c</p>', 1, 1),
(3, 4, '<p>Cho tam gi&aacute;c ABC c&oacute; AB=75cm, AC=85cm, BC=40cm.&nbsp;Tam gi&aacute;c ABC c&oacute; dạng g&igrave; ?</p>', '<p>Vu&ocirc;ng tại A|-|Vu&ocirc;ng tại B|-|Vu&ocirc;ng tại C|-|Nhọn</p>', 2, 1),
(4, 4, '<p>Cho tam gi&aacute;c ABC vu&ocirc;ng tại A, c&oacute; AB=20cm,BC=29cm, gi&aacute; trị của tanB l&agrave;</p>', '<p><img alt="\\frac{20}{11}" src="http://latex.codecogs.com/gif.latex?%5Cfrac%7B20%7D%7B11%7D" />|-|<img alt="\\frac{20}{29}" src="http://latex.codecogs.com/gif.latex?%5Cfrac%7B20%7D%7B29%7D" />|-|<img alt="\\frac{21}{20}" src="http://latex.codecogs.com/gif.latex?%5Cfrac%7B21%7D%7B20%7D" />|-|<img alt="\\frac{21}{29}" src="http://latex.codecogs.com/gif.latex?%5Cfrac%7B21%7D%7B29%7D" /></p>', 3, 1),
(5, 4, '<p>Biết sinA ~ 0.4568. Gi&aacute; trị số đo g&oacute;c A (l&agrave;m tr&ograve;n đến ph&uacute;t) l&agrave;:</p>', '<p><img alt="27^{o}13''" src="http://latex.codecogs.com/gif.latex?27%5E%7Bo%7D13%27" />|-|<img alt="27^{o}10''" src="http://latex.codecogs.com/gif.latex?27%5E%7Bo%7D10%27" />|-|<img alt="27^{o}11''" src="http://latex.codecogs.com/gif.latex?27%5E%7Bo%7D11%27" />|-|<img alt="27^{o}23''" src="http://latex.codecogs.com/gif.latex?27%5E%7Bo%7D23%27" /></p>', 3, 1),
(6, 4, '<p>Cho tam gi&aacute;c ABC c&oacute; AB=8, AC=6, BC=10&nbsp;v&agrave; đường cao AH</p><ul><li>a.&nbsp;Chứng minh tam gi&aacute;c ABC vu&ocirc;ng</li><li>b. T&iacute;nh AH</li><li>c. T&iacute;nh B v&agrave; C</li><li>d. Tinh diện t&iacute;ch tam gi&aacute;c AHC</li></ul>', '', 0, 0),
(7, 4, '<p>Kh&ocirc;ng d&ugrave;ng bảng lượng gi&aacute;c hoặc m&aacute;y t&iacute;nh bỏ t&uacute;i. H&atilde;y t&iacute;nh:<img alt="3\\cos ^{2}\\alpha -4\\sin ^{2}\\alpha" src="http://latex.codecogs.com/gif.latex?3%5Ccos%20%5E%7B2%7D%5Calpha%20-4%5Csin%20%5E%7B2%7D%5Calpha" />, biết&nbsp;<img alt="\\sin \\alpha = \\frac{1}{5}" src="http://latex.codecogs.com/gif.latex?%5Csin%20%5Calpha%20%3D%20%5Cfrac%7B1%7D%7B5%7D" /></p>', '', 0, 0),
(8, 4, '<p>R&uacute;t gọn biểu thức sau:&nbsp;<img alt="\\frac{2\\cos ^{2}\\alpha -1}{\\sin \\alpha +\\cos \\alpha }" src="http://latex.codecogs.com/gif.latex?%5Cfrac%7B2%5Ccos%20%5E%7B2%7D%5Calpha%20-1%7D%7B%5Csin%20%5Calpha%20+%5Ccos%20%5Calpha%20%7D" /></p>', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `testid` int(10) NOT NULL,
  `error` int(10) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `title` text NOT NULL,
  `description` text NOT NULL,
  `intro` longtext NOT NULL,
  `keyword` text NOT NULL,
  `author` text NOT NULL,
  `maintenance` int(1) NOT NULL DEFAULT '0',
  `url` text NOT NULL,
  `domain` text NOT NULL,
  `ads_1` text NOT NULL,
  `ads_2` text NOT NULL,
  `ads_3` text NOT NULL,
  `ads_4` text NOT NULL,
  `ads_5` text NOT NULL,
  `add_code` longtext NOT NULL,
  `fb_id_admin` bigint(20) NOT NULL,
  `fb_id_mod` bigint(20) NOT NULL,
  `fb_id_app` bigint(20) NOT NULL,
  `fb_id_page` bigint(20) NOT NULL,
  `gcseid` text NOT NULL,
  `admin_mail` text NOT NULL,
  `admin_phone` text NOT NULL,
  `admin_fb` text NOT NULL,
  `admin_yahoo` text NOT NULL,
  `logo` text NOT NULL,
  `view` int(10) NOT NULL,
  `download` int(10) NOT NULL,
  `lol` int(1) NOT NULL,
  PRIMARY KEY (`maintenance`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`title`, `description`, `intro`, `keyword`, `author`, `maintenance`, `url`, `domain`, `ads_1`, `ads_2`, `ads_3`, `ads_4`, `ads_5`, `add_code`, `fb_id_admin`, `fb_id_mod`, `fb_id_app`, `fb_id_page`, `gcseid`, `admin_mail`, `admin_phone`, `admin_fb`, `admin_yahoo`, `logo`, `view`, `download`, `lol`) VALUES
('Đề Kiểm Tra', 'Thư viện đề kiểm tra trực tuyến miễn phí cho mọi người', '<p>X&atilde; hội ng&agrave;y c&agrave;ng ph&aacute;t triển, nhu cầu học tập của con người ng&agrave;y c&agrave;ng cao. C&ugrave;ng với sự b&ugrave;ng nổ của CNTT v&agrave; truyền th&ocirc;ng đ&atilde; k&eacute;o theo sự h&igrave;nh th&agrave;nh một loại h&igrave;nh học tập mới l&agrave; học trực tuyến. H&agrave;ng loạt website gi&aacute;o dục trực tuyến đ&atilde; ra đời nhằm đ&aacute;p ứng nhu cầu đ&oacute;.<br /><br />Cũng thuộc loại h&igrave;nh website gi&aacute;o dục trực tuyến, ĐềKiểmTra.Net chia sẻ những đề thi thuộc c&aacute;c h&igrave;nh thức tự luận, trắc nghiệm được sưu tầm v&agrave; lưu trữ qua c&aacute;c k&igrave; thi lớn nhỏ tr&ecirc;n khắp cả nước, từ đ&oacute; người d&ugrave;ng c&oacute; thể chủ động hơn trong việc &ocirc;n tập, thử sức v&agrave; kiểm tra khả năng của m&igrave;nh th&ocirc;ng qua những đề thi m&agrave; trang web cung cấp KH&Ocirc;NG GIỚI HẠN v&agrave; HO&Agrave;N TO&Agrave;N MIỄN PH&Iacute;.<br /><br />C&aacute;c bạn c&oacute; thể t&igrave;m kiếm, xem trước đề thi v&agrave; download về m&aacute;y để lưu trữ. B&ecirc;n cạnh đ&oacute;, đối với những đề thi thuộc h&igrave;nh thức trắc nghiệm c&aacute;c bạn c&oacute; thể l&agrave;m b&agrave;i trực tuyến th&ocirc;ng qua website. Bạn sẽ nhận được kết quả l&agrave;m b&agrave;i của bạn theo thang điểm từ 0 đến 10 ngay sau khi bạn ho&agrave;n th&agrave;nh b&agrave;i thi v&agrave; nộp b&agrave;i trong khoảng thời gian quy định.<br /><br />Tất cả những đề thi m&agrave; website chia sẻ đều được lấy nguồn từ c&aacute;c trang uy t&iacute;n như Edu.Go.Vn, Moet.Gov.VN, ..v..v.. n&ecirc;n khi sử dụng c&aacute;c bạn c&oacute; thể ho&agrave;n to&agrave;n y&ecirc;n t&acirc;m về chất lượng v&agrave; độ tin cậy của đề thi.<br /><br />Hy vọng với những g&igrave; m&agrave; ĐềKiểmTra.Net mang lại sẽ gi&uacute;p cho c&aacute;c bạn &ocirc;n tập, củng cố kiến thức trước c&aacute;c k&igrave; thi để đạt được kết quả tốt nhất.<br /><br />Rất mong nhận được sự ủng hộ v&agrave; c&aacute;c &yacute; kiến đ&oacute;ng g&oacute;p từ c&aacute;c bạn để website ng&agrave;y một ho&agrave;n thiện hơn. Xin ch&acirc;n th&agrave;nh cảm ơn!</p>', 'đề kiểm tra,web đề kiểm tra,đề kiểm tra online,kiểm tra online,đề kiểm tra trực tuyến,kiểm tra trực tuyến,Thư viện đề kiểm tra trực tuyến miễn phí cho mọi người,de kiem tra,web de kiem tra,web kiem tra,de thi online,web de thi,de kiem tra online,kiem tra online,de kiem tra truc tuyen,kiem tra truc tuyen,thu vien de kiem tra truc tuyen mien phi cho moi nguoi', 'Huỳnh Đức Duy', 0, 'http://dektra.net', 'dektra.net', 'dplogo.png|www.datapool.vn|Nhà tài trợ Hosting DataPool', 'ads_2.png|mailto:ads@dektra.net|Liên hệ quảng cáo', 'ads_3.png|mailto:ads@dektra.net|Liên hệ quảng cáo', 'ads_3.png|mailto:ads@detra.net|Liên hệ quảng cáo', 'ads_3.png|mailto:ads@dektra.net|Liên hệ quảng cáo', '', 100003215206208, 100003215206208, 130123813864778, 299143020234466, '007237548770725891920:9dfv5e4c6ge', 'h2dvnnet@gmail.com', '01216843849', 'http://fb.com/huynhducduy', 'del.itvn', '../admin/upload/9f7c270f0d2ffdb607ed7ba42ab54e8f69a5c366686f5a900122f4febef68869.jpg', 11095, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subs`
--

CREATE TABLE IF NOT EXISTS `subs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE IF NOT EXISTS `tests` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `time` int(10) NOT NULL,
  `id1` int(10) NOT NULL,
  `view` int(10) NOT NULL,
  `title` text NOT NULL,
  `contribution` int(10) NOT NULL,
  `description` text NOT NULL,
  `keyword` text NOT NULL,
  `thumb` text NOT NULL,
  `time2` int(10) NOT NULL,
  `fnum` int(10) NOT NULL,
  `rt` int(10) NOT NULL,
  `liked` int(10) NOT NULL,
  `uid_liked` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `time`, `id1`, `view`, `title`, `contribution`, `description`, `keyword`, `thumb`, `time2`, `fnum`, `rt`, `liked`, `uid_liked`) VALUES
(1, 1404816509, 93, 19, 'Đề luyện tập kiểm tra 1 tiết toán số 1 lớp 6 - Chuyên đề SỐ TỰ NHIÊN', 0, '', 'Đề luyện tập kiểm tra 1 tiết toán số 1 lớp 6 - Chuyên đề SỐ TỰ NHIÊN,De luyen tap kiem tra 1 tiet toan so 1 lop 6 - Chuyen de SO TU NHIEN', '../admin/upload/84c139d0f3ab9801d17a94473da93a2c2359969549a3e14c843ac872db09217a.jpg', 0, 0, 0, 0, ''),
(2, 1404816757, 93, 11, 'Đề luyện tập kiểm tra 1 tiết toán số 1 lớp 6 - Chuyên đề GÓC VÀ TIA', 0, '', 'De luyen tap kiem tra 1 tiet toan so 1 lop 6 - Chuyen de GOC VA TIA', '../admin/upload/77d3d631087b0b4787b146d2d546ae4a8dc1202f9a681812d430c9334fbc4d34.jpg', 0, 0, 0, 0, ''),
(3, 1404816950, 82, 15, 'Đề kiểm tra học kì I môn vật lý lớp 6', 0, '', 'Đề kiểm tra học kì I môn vật lý lớp 6,De kiem tra hoc ki I mon vat ly lop 6', '../admin/upload/62ea50ccea17f3d9232ecd2448c7e12092cd84e399a513f3cccdfb9f5859ba07.jpg', 0, 0, 0, 0, ''),
(4, 1404817185, 93, 50, 'Đề kiểm tra 1 tiết môn toán lớp 9 - Chuyên đề HỆ THỨC LƯỢNG TRONG TAM GIÁC', 0, '', 'Đề kiểm tra 1 tiết môn toán lớp 9 - Chuyên đề HỆ THỨC LƯỢNG TRONG TAM GIÁC,De kiem tra 1 tiet mon toan lop 9 - Chuyen de HE THUC LUONG TRONG TAM GIAC', '../admin/upload/08fe240d1ef30fc0ff6e4cf2e3ab8a0dec073b9e3e9d888925a92bd0e4a36a06.jpg', 45, 2, 1, 1, '1'),
(5, 1404817961, 100, 15, 'Đề kiểm tra Tiếng Anh 6 - kỳ 1', 0, '', 'Đề kiểm tra Tiếng Anh 6 - kỳ 1,De kiem tra Tieng Anh 6 - ky 1', '../admin/upload/4f3ddfdcc15cf2917b52a4c96a99437da4cfe80d0315414543950cba63651252.jpg', 0, 0, 0, 0, ''),
(6, 1404818303, 88, 44, 'ĐỀ KIỂM TRA HỌC KỲ II  MÔN TIẾNG ANH LỚP 9 - TRƯỜNG THCS TRẦN HƯNG ĐẠO  BIÊN HÒA - ĐỒNG NAI', 0, '', 'ĐỀ KIỂM TRA HỌC KỲ II  MÔN TIẾNG ANH LỚP 9 - TRƯỜNG THCS TRẦN HƯNG ĐẠO  BIÊN HÒA – ĐỒNG NAI,DE KIEM TRA HOC KY II MON TIENG ANH LOP 9 - TRUONG THCS TRAN HUNG DAO BIEN HOA – DONG NAI', '../admin/upload/5218af6d31190cf5607e94c951dbb94aea52543db63ee8812ef0d115b0a7c316.jpg', 0, 0, 0, 0, ''),
(7, 1404819376, 80, 11, 'ĐỀ KIỂM TRA MÔN NGỮ VĂN, HỌC KÌ 1, LỚP 6', 0, '', 'ĐỀ KIỂM TRA MÔN NGỮ VĂN, HỌC KÌ 1, LỚP 6,DE KIEM TRA MON NGU VAN, HOC KI 1, LOP 6', '../admin/upload/bfc1c5f928f0a23da20fb93585fb8ca870bd718b798de2645397b9dff080274e.jpg', 0, 0, 0, 0, ''),
(8, 1404819521, 86, 14, 'ĐỀ KIỂM TRA MÔN ĐỊA LÍ, HỌC KÌ I, LỚP 8', 0, '', 'ĐỀ KIỂM TRA MÔN ĐỊA LÍ, HỌC KÌ I, LỚP 8,DE KIEM TRA MON DIA LI, HOC KI I, LOP 8', '../admin/upload/1cae7061b1cfa1e8c6e26b3ccf0d58f9715e73be3a7beb7b18c60701b3922b2e.jpg', 0, 0, 0, 0, ''),
(9, 1404823545, 6, 10, 'Đề thi đại học môn Hóa Khối A năm 2014', 0, '', 'Đề thi đại học môn Hóa Khối A năm 2014,De thi dai hoc mon Hoa Khoi A nam 2014', '../admin/upload/e45d506dcb68b3d0d305c5e5731a5d49909a1fb4c9b1c1e77d9c1b7b26c213c8.jpg', 0, 0, 0, 0, ''),
(10, 1404823640, 7, 18, 'Đề thi đại học môn Tiếng Anh Khối A1 năm 2014', 0, '', 'Đề thi đại học môn Tiếng Anh Khối A1 năm 2014,De thi dai hoc mon Tieng Anh Khoi A1 nam 2014', '../admin/upload/fb909c14e3b4ee6ac5b179a06b4a048aa1c790be86d1320f00e8adf8ff3ea542.jpg', 0, 0, 0, 0, ''),
(11, 1404823716, 6, 11, 'Đề thi đại học môn Vật Lí khối A A1 năm 2014', 0, '', 'Đề thi đại học môn Vật Lí khối A A1 năm 2014,De thi dai hoc mon Vat Li khoi A A1 nam 2014', '../admin/upload/32e68e8a2e406171ca7e57586c86b3e04de4cbbd05d389ef69539e70f6faea53.jpg', 0, 0, 0, 0, ''),
(12, 1404823811, 7, 10, 'Đề thi đại học môn Toán khối A, A1 năm 2014', 0, '', 'Đề thi đại học môn Toán khối A, A1 năm 2014,De thi dai hoc mon Toan khoi A, A1 nam 2014', '../admin/upload/1a252f9abbabd4823d2f802c910893372c933ef3d46c50adce4c0250ccffba1f.jpg', 0, 0, 0, 0, ''),
(13, 1404823914, 10, 12, 'Đề thi cao đẳng môn Tiếng Nhật khối D năm 2013', 0, '', 'Đề thi cao đẳng môn Tiếng Nhật khối D năm 2013,De thi cao dang mon Tieng Nhat khoi D nam 2013', '../admin/upload/28c50ed184024509b40be69fce5457009b751b69b50ce74c00f459f7d3f68fb9.jpg', 0, 0, 0, 0, ''),
(14, 1404824178, 22, 11, 'Đề thi tốt nghiệp THPT 2013 môn Ngữ văn', 0, '', 'Đề thi tốt nghiệp THPT 2013 môn Ngữ văn,De thi tot nghiep THPT 2013 mon Ngu van', '../admin/upload/af3c66da2c4ec8db58ad261198f33530f63341a7bf95147105d73640cdd872e9.jpg', 0, 0, 0, 0, ''),
(15, 1404824462, 23, 10, 'Đề thi tốt nghiệp THPT môn Toán 2003', 0, '', 'Đề thi tốt nghiệp THPT môn Toán 2003,De thi tot nghiep THPT mon Toan 2003', '../admin/upload/1c98dbbc01224b9675c879f01cab1de8f106f620fed2ebdafb9a0f14fe77c781.jpg', 0, 0, 0, 0, ''),
(16, 1404824614, 19, 13, 'Đề thi vào lớp 10 môn Toán thành phố Hồ Chí Minh năm 2013', 0, '', 'Đề thi vào lớp 10 môn Toán thành phố Hồ Chí Minh năm 2013,De thi vao lop 10 mon Toan thanh pho Ho Chi Minh nam 2013', '../admin/upload/902b2e6140f14614b1e2f367bf96bc2fb36963db736e2d1b186c956a984cf108.jpg', 0, 0, 0, 0, ''),
(17, 1404824769, 18, 34, 'Đề thi vào lớp 10 môn Văn thành phố Hồ Chí Minh năm 2013', 0, '', 'Đề thi vào lớp 10 môn Văn thành phố Hồ Chí Minh năm 2013,De thi vao lop 10 mon Van thanh pho Ho Chi Minh nam 2013', '../admin/upload/139bc53164d538492fd65c247da8bbf32d21c4c622a20e89ba5a438ee38a1e81.jpg', 0, 0, 0, 0, ''),
(18, 1406953273, 11, 1, 'Đề THI THỬ ĐẠI HỌC THÁNG 6-2014 (Đợt 4) môn Toán', 0, '', 'Đề THI THỬ ĐẠI HỌC THÁNG 6-2014 (Đợt 4) môn Toán,De THI THU DAI HOC THANG 6-2014 (Dot 4) mon Toan', '../admin/upload/328ae1bdf4d48a5d8b7fa2e860fc73bff87157d63433042ed0e3a87469b01002.jpg', 0, 0, 0, 0, ''),
(19, 1406953856, 11, 4, 'Đề thi thử ĐH 2014 tỉnh Hải Dương THPT Tứ Kỳ khối A', 0, '', 'Đề thi thử ĐH 2014 tỉnh Hải Dương THPT Tứ Kỳ khối A,De thi thu DH 2014 tinh Hai Duong THPT Tu Ky khoi A', '../admin/upload/1f4d1f89f4231fbed21667eea24e41d6983c1005eb19ecfbf9833f51dd138a25.jpg', 0, 0, 0, 0, ''),
(20, 1406954046, 11, 2, 'Đề thi thử ĐH 2014 tỉnh Hải Dương THPT Tứ Kỳ khối D', 0, '', 'Đề thi thử ĐH 2014 tỉnh Hải Dương THPT Tứ Kỳ khối D,De thi thu DH 2014 tinh Hai Duong THPT Tu Ky khoi D', '../admin/upload/d5a6158adcfca102ca83b59d69ca07cf331694a02c2ef5ec203b027f01fb3a77.jpg', 0, 0, 0, 0, ''),
(21, 1406954241, 11, 3, 'Đề thi thử ĐH 2014 tỉnh Bắc Ninh lần 2 THPT Ngô Gia Tự khối D', 0, '', 'Đề thi thử ĐH 2014 tỉnh Bắc Ninh lần 2 THPT Ngô Gia Tự khối D,De thi thu DH 2014 tinh Bac Ninh lan 2 THPT Ngo Gia Tu khoi D', '../admin/upload/cf53e6d84967f2969cb25b61b3872793c22b02f9504f783a0dead516c1113a18.jpg', 0, 0, 0, 0, ''),
(22, 1406954439, 11, 4, 'Đề thi thử ĐH 2014 tỉnh Bắc Ninh lần 2 THPT Ngô Gia Tự khối B', 0, '', 'Đề thi thử ĐH 2014 tỉnh Bắc Ninh lần 2 THPT Ngô Gia Tự khối B,De thi thu DH 2014 tinh Bac Ninh lan 2 THPT Ngo Gia Tu khoi B', '../admin/upload/60f26a471c3f098fbc54602db10f71dba7b148c5304d6a8e9cb15f7b6d1ab031.jpg', 0, 0, 0, 0, ''),
(23, 1406954616, 11, 3, 'Đề thi thử ĐH 2014 tỉnh Vĩnh Phúc THPT Ngô Gia Tự khối A', 0, '', 'Đề thi thử ĐH 2014 tỉnh Vĩnh Phúc THPT Ngô Gia Tự khối A,De thi thu DH 2014 tinh Vinh Phuc THPT Ngo Gia Tu khoi A', '../admin/upload/a49c3f107cbbbbd66f364f763d25b26f4cc4eee0ed21454c1389215a89e5adfb.jpg', 0, 0, 0, 0, ''),
(24, 1406954725, 11, 4, 'Đề thi thử ĐH 2014 tỉnh Thái Bình THPT Lê Quý Đôn', 0, '', 'Đề thi thử ĐH 2014 tỉnh Thái Bình THPT Lê Quý Đôn,De thi thu DH 2014 tinh Thai Binh THPT Le Quy Don', '../admin/upload/fb5d0bbabbca23acb4e16403cd1d3d9699237c3d7bc2b1ce8e313c8b67fa3406.jpg', 0, 0, 0, 0, ''),
(25, 1406955105, 11, 3, 'Đề thi thử ĐH 2014 tỉnh Bắc Ninh THPT Lý Thái Tổ', 0, '', 'Đề thi thử ĐH 2014 tỉnh Bắc Ninh THPT Lý Thái Tổ,De thi thu DH 2014 tinh Bac Ninh THPT Ly Thai To', '../admin/upload/5ec11aa8091121035def1c6f62a8176ee61dfd2cae80495e86bab0517291460e.jpg', 0, 0, 0, 0, ''),
(26, 1406955283, 11, 3, 'Đề thi thử ĐH 2014 tỉnh Bắc Ninh THPT Hàn Thuyên', 0, '', 'Đề thi thử ĐH 2014 tỉnh Bắc Ninh THPT Hàn Thuyên,De thi thu DH 2014 tinh Bac Ninh THPT Han Thuyen', '../admin/upload/d0cf4050fe8076b6c354dd58e2332734be88632f48fd7a021d6c01356e1bdfef.jpg', 0, 0, 0, 0, ''),
(27, 1406955419, 11, 7, 'Đề thi thử ĐH 2014 THPT Hà Nội - Amsterdam', 0, '', 'Đề thi thử ĐH 2014 THPT Hà Nội - Amsterdam,De thi thu DH 2014 THPT Ha Noi - Amsterdam', '../admin/upload/78ea7e0fede9660472f13444fedd3a00bae70867c0dfb6e3c5d39b09e7abbf5d.jpg', 0, 0, 0, 0, ''),
(28, 1406955718, 11, 3, 'Đề thi thử ĐH 2014 chuyên Vĩnh Phúc lần 2 khối A B', 0, '', 'Đề thi thử ĐH 2014 chuyên Vĩnh Phúc lần 2 khối A B,De thi thu DH 2014 chuyen Vinh Phuc lan 2 khoi A B', '../admin/upload/16c786115f1ccd9b734736e6d69a5585e102279caa93731ce9c46fd2af2eedc7.jpg', 0, 0, 0, 0, ''),
(29, 1406956374, 11, 2, 'Đề thi thử ĐH 2014 tỉnh Thanh Hóa THPT Tống Duy Tân', 0, '', 'Đề thi thử ĐH 2014 tỉnh Thanh Hóa THPT Tống Duy Tân,De thi thu DH 2014 tinh Thanh Hoa THPT Tong Duy Tan', '../admin/upload/2acda0e9c5ac9cbb0cd8a5d7e3aab6a8535cfec8efe3c56c357b7c6d79372256.jpg', 0, 0, 0, 0, ''),
(30, 1406956680, 11, 4, 'Đề thi thử ĐH 2014 tỉnh Thanh Hóa THPT Lê Lợi', 0, '', 'Đề thi thử ĐH 2014 tỉnh Thanh Hóa THPT Lê Lợi,De thi thu DH 2014 tinh Thanh Hoa THPT Le Loi', '../admin/upload/ea0ddf8d809a6347335b606ee0bbcddad95f230cb1624253bb8b833dd591f860.jpg', 0, 0, 0, 0, ''),
(31, 1406956817, 11, 3, 'Đề thi thử ĐH 2014 chuyên Hùng Vương', 0, '', 'Đề thi thử ĐH 2014 chuyên Hùng Vương,De thi thu DH 2014 chuyen Hung Vuong', '../admin/upload/11c1518ca9f5ac20db1c6a35aafc08e0f7866ea1722506f0c0457b5fac595033.jpg', 0, 0, 0, 0, ''),
(32, 1406974503, 6, 3, 'Đề thi Đại học môn Vật Lý khối A, A1 năm 2013', 0, '', 'Đề thi Đại học môn Vật Lý khối A - A1 năm 2013,De thi Dai hoc mon Vat Ly khoi A - A1 nam 2013', '../admin/upload/b48fb96ac932248e2d8f2fd342ae7c915a0b3a607814a491fce1531c359bbbbd.jpg', 0, 0, 0, 0, ''),
(33, 1406974719, 6, 7, 'Đề thi Đại học môn Hóa khối A năm 2013', 0, '', 'Đề thi Đại học môn Hóa khối A năm 2013,De thi Dai hoc mon Hoa khoi A nam 2013', '../admin/upload/2e018aedab52d7045fecfb3943f1efe8f1d84f033660ab2854fff5f5ba90396b.jpg', 0, 0, 0, 0, ''),
(34, 1407229730, 11, 2, 'Đề THI THỬ ĐẠI HỌC THÁNG 6-2014 (Đợt 4) môn Ngữ Văn', 0, '', 'Đề THI THỬ ĐẠI HỌC THÁNG 6-2014 (Đợt 4) môn Ngữ Văn,De THI THU DAI HOC THANG 6-2014 (Dot 4) mon Ngu Van', '../admin/upload/bf5b8d0fbaf2952cd98575f6ef3abf9f9660b33d6298718370b7acefc2bf1bb6.jpg', 0, 0, 0, 0, ''),
(35, 1407229955, 11, 2, 'Đề thi thử Đại học môn Văn năm 2014, Sở Giáo dục & Đào tạo Phú Thọ', 0, '', 'Đề thi thử Đại học môn Văn năm 2014, Sở Giáo dục & Đào tạo Phú Thọ,De thi thu Dai hoc mon Van nam 2014, So Giao duc', '../admin/upload/68988724de9050c8bd3cee4fa74f471e6a082d3d69b7f4d8197fb880366ceba8.jpg', 0, 0, 0, 0, ''),
(36, 1407230135, 11, 2, 'Đề thi thử Đại học môn Văn năm 2014, THPT Trần phú, Hà Tĩnh', 0, '', 'Đề thi thử Đại học môn Văn năm 2014, THPT Trần phú, Hà Tĩnh,De thi thu Dai hoc mon Van nam 2014, THPT Tran phu, Ha Tinh', '../admin/upload/73921d9cc6ecfbca318a1a414247cb36722c141878978981320beecfa4076033.jpg', 0, 0, 0, 0, ''),
(37, 1407230290, 11, 2, 'Đề thi thử Đại học môn Văn năm 2014, THPT chuyên Lương Văn Chánh, Phú Yên', 0, '', 'Đề thi thử Đại học môn Văn năm 2014, THPT chuyên Lương Văn Chánh, Phú Yên,De thi thu Dai hoc mon Van nam 2014, THPT chuyen Luong Van Chanh, Phu Yen', '../admin/upload/3f092a8fa234fba2520a2100139d98d37543a970bc51e036ffed16054b82538a.jpg', 0, 0, 0, 0, ''),
(38, 1407230953, 23, 2, 'Đáp án chính thức Bộ GD-ĐT Môn Toán Học Tốt nghiệp THPT (03/06/2014)', 0, '', 'Đáp án chính thức Bộ GD-ĐT Môn Toán Học Tốt nghiệp THPT (03/06/2014),Dap an chinh thuc Bo GD-DT Mon Toan Hoc Tot nghiep THPT (03/06/2014)', '../admin/upload/6063adb0e70ecd09fc9a54ebf3106e3ab70f7456e5d1b8c0b9995994dec2bdf5.jpg', 0, 0, 0, 0, ''),
(39, 1407231380, 121, 2, 'Đáp án chính thức Bộ GD-ĐT Môn Vật Lý Tốt nghiệp THPT (02/06/2014)', 0, '', 'Đáp án chính thức Bộ GD-ĐT Môn Vật Lý Tốt nghiệp THPT (02/06/2014),Dap an chinh thuc Bo GD-DT Mon Vat Ly Tot nghiep THPT (02/06/2014)', '../admin/upload/30076c7a363ac89d43dce9f1e8d83c07765a1c473840b7e017e8fc75ccac1963.jpg', 0, 0, 0, 0, ''),
(40, 1407231768, 122, 2, 'Đáp án chính thức Bộ GD-ĐT Môn Hóa Học Tốt nghiệp THPT (03/06/2014)', 0, '', 'Đáp án chính thức Bộ GD-ĐT Môn Hóa Học Tốt nghiệp THPT (03/06/2014),Dap an chinh thuc Bo GD-DT Mon Hoa Hoc Tot nghiep THPT (03/06/2014)', '../admin/upload/cc290e777eeb5241571cc4b5a0d41aa757f0a5d46f1eb44007daea2c8237af2e.jpg', 0, 0, 0, 0, ''),
(41, 1407232015, 22, 2, 'Đáp án chính thức Bộ GD-ĐT Môn Ngữ Văn Tốt nghiệp THPT (02/06/2014)', 0, '', 'Đáp án chính thức Bộ GD-ĐT Môn Ngữ Văn Tốt nghiệp THPT (02/06/2014),Dap an chinh thuc Bo GD-DT Mon Ngu Van Tot nghiep THPT (02/06/2014)', '../admin/upload/4920246e23f87870a2802b02a1e87c74f632ece4dae463eb2844870acda2d309.jpg', 0, 0, 0, 0, ''),
(42, 1407232235, 22, 3, 'Đề thi tốt nghiệp THPT 2013 môn Ngữ văn', 0, '', 'Đề thi tốt nghiệp THPT 2013 môn Ngữ văn,De thi tot nghiep THPT 2013 mon Ngu van', '../admin/upload/6b9266ac90a3d91ffc5f67980a836be07c57436a7c8108474f5192e938053535.jpg', 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `test_history`
--

CREATE TABLE IF NOT EXISTS `test_history` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `it` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `score` int(10) NOT NULL,
  `comp` int(10) NOT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `test_history`
--

INSERT INTO `test_history` (`id`, `it`, `uid`, `score`, `comp`, `time`) VALUES
(1, 4, 1, 3, 3, 1404827938),
(2, 4, 1, 2, 0, 1404832718);

-- --------------------------------------------------------

--
-- Table structure for table `test_parts`
--

CREATE TABLE IF NOT EXISTS `test_parts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `it` int(10) NOT NULL,
  `gdocid` text NOT NULL,
  `download` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `test_parts`
--

INSERT INTO `test_parts` (`id`, `it`, `gdocid`, `download`) VALUES
(1, 1, '0B1lZQd8-Yga_cE5hWHBmbXlyU3c', 0),
(2, 2, '0B1lZQd8-Yga_OHZjTGF3YVRsRlU', 0),
(3, 3, '0B1lZQd8-Yga_Zk9VNjk5MXdyR1E', 0),
(4, 4, '0B1lZQd8-Yga_Y1c4TWlrenBJSUU', 1),
(5, 5, '0B1lZQd8-Yga_NlNxLUtrenE5dWs', 0),
(6, 6, '0B1lZQd8-Yga_QnBROXpVeXRlcFk', 0),
(7, 7, '0B1lZQd8-Yga_N1JEcDRKRWhLekU', 0),
(8, 8, '0B1lZQd8-Yga_M0lYOVJ3NEc0Nm8', 0),
(9, 9, '0B-SM9EDYAS5NRW45emlhVEE4Q0k', 0),
(10, 10, '0B-SM9EDYAS5NUFJqSlZRbmJnM3M', 3),
(11, 11, '0B-SM9EDYAS5NdHRNOThycGpBN3c', 0),
(12, 12, '0B-SM9EDYAS5NVzJjSldCRU5kdTQ', 0),
(13, 13, '0B-SM9EDYAS5NUEE1R2ppd29MM2s', 0),
(14, 14, '0B1lZQd8-Yga_MlFnb0RiN3RHRUE', 0),
(15, 15, '0B1lZQd8-Yga_cGJrZzlFTWEwV28', 0),
(16, 16, '0B1lZQd8-Yga_TDlSdzA4ZkkwTjA', 0),
(17, 17, '0B1lZQd8-Yga_NWdLM0RnM0pZLWs', 0),
(18, 18, '0B1lZQd8-Yga_QWtJdEU1VV82RE0', 0),
(19, 19, '0B1lZQd8-Yga_Sm9FdDdrNERCQ1E', 0),
(20, 20, '0B1lZQd8-Yga_UE5MRFFsOEhHT0U', 0),
(21, 21, '0B1lZQd8-Yga_N1dUZjZaSXNYYnc', 0),
(22, 22, '0B1lZQd8-Yga_YW1aUDVwX1RKWkU', 0),
(23, 23, '0B1lZQd8-Yga_YW1aUDVwX1RKWkU', 0),
(24, 24, '0B1lZQd8-Yga_cFFhYzRCVUpCLU0', 0),
(25, 25, '0B1lZQd8-Yga_NlpNYkw5dXZabXc', 0),
(26, 26, '0B1lZQd8-Yga_aWJPMjNwTzlLVUk', 0),
(27, 27, '0B1lZQd8-Yga_ZTgwQ0lna0U0ams', 0),
(28, 28, '0B1lZQd8-Yga_V3RZWkFVM3J0UEE', 0),
(29, 29, '0B1lZQd8-Yga_cFFhYzRCVUpCLU0', 0),
(30, 30, '0B1lZQd8-Yga_TE9RU0JpWk51M1k', 0),
(31, 31, '0B1lZQd8-Yga_d0dZM3Z4LTVEMHM', 0),
(32, 32, '0B1lZQd8-Yga_ZFNjMTE0UUxyMjA', 0),
(33, 33, '0B1lZQd8-Yga_bnVIZjU3eW9HbFE', 0),
(34, 34, '0B1lZQd8-Yga_UzJLbnZTaElfUkE', 0),
(35, 35, '0B1lZQd8-Yga_Z21TWGdUYVZBQWs', 0),
(36, 36, '0B1lZQd8-Yga_dnBZbXV4LTVackk', 0),
(37, 37, '0B1lZQd8-Yga_M3hkbjdTUlB0X3c', 0),
(38, 38, '0B1lZQd8-Yga_a25hNWZvU3RXZkU', 0),
(39, 39, '0B1lZQd8-Yga_U3JPY241Mnlwajg', 0),
(40, 40, '0B1lZQd8-Yga_ZGxXWUNPU00zN2M', 0),
(41, 41, '0B1lZQd8-Yga_YmEyWlMyNGk4bmM', 0),
(42, 42, '0B1lZQd8-Yga_VllNWEItQ3FuWmM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `birthday` text COLLATE utf8_unicode_ci NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `pass2` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `sex` int(1) NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `yahoo` text COLLATE utf8_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8_unicode_ci NOT NULL,
  `up` longtext COLLATE utf8_unicode_ci NOT NULL,
  `down` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `birthday`, `username`, `password`, `pass2`, `name`, `sex`, `address`, `phone`, `email`, `yahoo`, `avatar`, `up`, `down`) VALUES
(1, '', 'del.itvn', '42c6199c327263c84b74c1c4d832f193', 'e10adc3949ba59abbe56e057f20f883e', '', 0, '', '', 'h2dvnnet@gmail.com', '', '', '', '10,10,10,10,4,4'),
(2, '', 'testing', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '', 0, '', '', 'del.itvn@gmail.com', '', '', '', ''),
(3, '', 'Huynh Minh Tu', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '', 0, '', '', 'admin@vn2tech.net', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
