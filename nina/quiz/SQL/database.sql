-- phpMyAdmin SQL Dump
-- version 3.4.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 14, 2011 at 08:44 AM
-- Server version: 5.0.92
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `victor_demoquiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE IF NOT EXISTS `Admin` (
  `admin_id` int(11) NOT NULL auto_increment,
  `admin_user` text character set utf8 NOT NULL,
  `admin_pass` text character set utf8 NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`admin_id`, `admin_user`, `admin_pass`) VALUES
(1, 'admin', '90792e5ca806bb476f67f4c49af01260');

-- --------------------------------------------------------

--
-- Table structure for table `Answers`
--

CREATE TABLE IF NOT EXISTS `Answers` (
  `answer_id` int(11) NOT NULL auto_increment,
  `question_id` int(11) NOT NULL,
  `answer_text` text character set utf8 NOT NULL,
  `answer_correct` int(1) NOT NULL,
  PRIMARY KEY  (`answer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `Answers`
--

INSERT INTO `Answers` (`answer_id`, `question_id`, `answer_text`, `answer_correct`) VALUES
(31, 1, 'Tomato sauce and green grocery', 0),
(30, 1, 'Vegetables and chesse', 0),
(19, 2, 'Yes, if the pizza is made of defatted flour and vegetables', 0),
(18, 2, 'Yes', 0),
(17, 2, 'No (this is the correct answer)', 1),
(15, 3, '2-3 hours', 0),
(14, 3, 'I dont know, because im not a cook (this is the correct answer)', 1),
(16, 3, '1-2 hours', 0),
(29, 1, 'Mushroom and corn', 0),
(28, 1, 'Bacon and egg (this is the correct answer)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Metadata`
--

CREATE TABLE IF NOT EXISTS `Metadata` (
  `metaid` int(11) NOT NULL,
  `title` text collate utf8_unicode_ci NOT NULL,
  `description` text collate utf8_unicode_ci NOT NULL,
  `keywords` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`metaid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Metadata`
--

INSERT INTO `Metadata` (`metaid`, `title`, `description`, `keywords`) VALUES
(1, 'Facebook Quiz Application', 'This is a facebook quiz app.', 'facebook, facebook application, facebook quiz');

-- --------------------------------------------------------

--
-- Table structure for table `Player`
--

CREATE TABLE IF NOT EXISTS `Player` (
  `player_id` int(11) NOT NULL auto_increment,
  `player_uid` bigint(11) NOT NULL,
  `player_name` text character set utf8 NOT NULL,
  `player_email` text character set utf8 NOT NULL,
  `player_age` int(11) NOT NULL,
  `player_sex` tinyint(1) NOT NULL COMMENT '1 - férfi',
  `player_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `player_win` int(1) default NULL,
  `player_percent` int(3) NOT NULL,
  PRIMARY KEY  (`player_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `Player`
--

INSERT INTO `Player` (`player_id`, `player_uid`, `player_name`, `player_email`, `player_age`, `player_sex`, `player_date`, `player_win`, `player_percent`) VALUES
(1, 1707482327, 'Arthur Frigyes Viktor', 'arthurfv@gmail.com', 24, 1, '2011-09-13 15:46:14', 0, 33),
(2, 1707482327, 'Arthur Frigyes Viktor', 'arthurfv@gmail.com', 24, 1, '2011-09-13 15:46:42', 0, 33),
(3, 1707482327, 'Arthur Frigyes Viktor', 'arthurfv@gmail.com', 24, 1, '2011-09-13 17:15:25', 0, 0),
(4, 1707482327, 'Arthur Frigyes Viktor', 'arthurfv@gmail.com', 24, 1, '2011-09-13 17:15:54', 0, 0),
(5, 1707482327, 'Arthur Frigyes Viktor', 'arthurfv@gmail.com', 24, 1, '2011-09-13 17:19:07', 0, 33),
(6, 1707482327, 'Arthur Frigyes Viktor', 'arthurfv@gmail.com', 24, 1, '2011-09-13 17:20:17', 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `Questions`
--

CREATE TABLE IF NOT EXISTS `Questions` (
  `question_id` int(11) NOT NULL auto_increment,
  `question_text` text character set utf8 NOT NULL,
  PRIMARY KEY  (`question_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Questions`
--

INSERT INTO `Questions` (`question_id`, `question_text`) VALUES
(1, 'Which is the fattest kind of pizza from these examples?'),
(2, 'Is it healthy to eat pizza every day?'),
(3, 'How long does it take to make pizza at home?');

-- --------------------------------------------------------

--
-- Table structure for table `Texts`
--

CREATE TABLE IF NOT EXISTS `Texts` (
  `id` int(11) NOT NULL,
  `start` text character set utf8 NOT NULL,
  `rules_label` text character set utf8 NOT NULL,
  `rules` text character set utf8 NOT NULL,
  `winners_label` text character set utf8 NOT NULL,
  `winners` text character set utf8 NOT NULL,
  `share_label` text character set utf8 NOT NULL,
  `share` text character set utf8 NOT NULL,
  `share_title` text character set utf8 NOT NULL,
  `fail_text` text character set utf8 NOT NULL,
  `win_text` text character set utf8 NOT NULL,
  `win_text_like` text character set utf8 NOT NULL,
  `fbfanpage` text character set utf8 NOT NULL,
  `fbapp` text character set utf8 NOT NULL,
  `post_name_win` text character set utf8 NOT NULL,
  `post_name_failed` text character set utf8 NOT NULL,
  `post_msg` text character set utf8 NOT NULL,
  `post_caption` text character set utf8 NOT NULL,
  `post_desc` text character set utf8 NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `Texts`
--

INSERT INTO `Texts` (`id`, `start`, `rules_label`, `rules`, `winners_label`, `winners`, `share_label`, `share`, `share_title`, `fail_text`, `win_text`, `win_text_like`, `fbfanpage`, `fbapp`, `post_name_win`, `post_name_failed`, `post_msg`, `post_caption`, `post_desc`) VALUES
(0, 'Start game', 'Rules', '<h3>Rules</h3>\r\n<p>Here are the <em>rules</em> of the game.</p>\r\n<p>&nbsp;</p>', 'Winners', '<p>They have already played with the quiz:</p>', 'Share', 'I would like to share this app on Facebook', 'Instant Facebook Quiz', '<p>Your result is (%)%.</p>\r\n<p>Please click the</p>\r\n<p>(like)</p>\r\n<p>button.</p>', '<p>Congratulations, you won!</p>\r\n<p>Your result is (%)%.</p>\r\n<p>Please click the</p>\r\n<p>(like)</p>\r\n<p>button.</p>', '<p>Thank you for filling out the quiz.</p>\r\n<p>&nbsp;</p>\r\n<p>Follow us on Facebook!</p>', 'www.facebook.com/pages/AwTheme/201373699916708', 'apps.facebook.com/instantfbquiz/', '(name) played and won.', '(name) played and failed.', 'short message', 'long message', 'description');

-- --------------------------------------------------------

--
-- Table structure for table `WinLimit`
--

CREATE TABLE IF NOT EXISTS `WinLimit` (
  `wl_id` int(11) NOT NULL auto_increment,
  `wl_value` int(11) NOT NULL default '100',
  PRIMARY KEY  (`wl_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `WinLimit`
--

INSERT INTO `WinLimit` (`wl_id`, `wl_value`) VALUES
(1, 67);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
