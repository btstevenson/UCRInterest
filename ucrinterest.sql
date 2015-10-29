-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Oct 16, 2015 at 04:54 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `UCInterest`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `user` int(11) NOT NULL COMMENT 'This is the user id of the user',
  `following` int(11) NOT NULL COMMENT 'This is the user id of the user being followed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pins`
--

CREATE TABLE `pins` (
  `pin_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pic_dir` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about_you` text COLLATE utf8_unicode_ci,
  `location` text COLLATE utf8_unicode_ci,
  `website` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_pic` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DOB` date DEFAULT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nick_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pins`
--
ALTER TABLE `pins`
  ADD PRIMARY KEY (`pin_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pins`
--
ALTER TABLE `pins`
  MODIFY `pin_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;