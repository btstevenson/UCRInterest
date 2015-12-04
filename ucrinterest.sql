-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 04, 2015 at 05:28 PM
-- Server version: 5.5.42-log
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ucrinterest`
--

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE `boards` (
  `uid` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `private` tinyint(1) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `browse_history`
--

CREATE TABLE `browse_history` (
  `uid` int(11) NOT NULL,
  `label` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `pin_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `content` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `fid` int(11) NOT NULL,
  `user` int(11) NOT NULL COMMENT 'This is the user id of the user',
  `following` int(11) NOT NULL COMMENT 'This is the user id of the user being followed',
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`fid`, `user`, `following`, `status`) VALUES
(5, 2, 1, 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `uid` int(11) NOT NULL,
  `label` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `pin_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pins`
--

CREATE TABLE `pins` (
  `pin_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `b_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
  `label` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`pid`, `uid`, `title`, `pic_dir`, `content`, `label`, `date_created`) VALUES
(2, 1, 'Proin aliquet libero non scelerisque blandit.', '/assets/img/1736285468563975a5b6238.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus et lobortis mi. Pellentesque efficitur lacinia libero, ac fermentum augue feugiat vitae. In dapibus aliquam tortor, accumsan tincidunt nisl porttitor vitae. Nam at aliquet ante. Donec a purus vitae neque dapibus cursus. Praesent a dapibus eros. Vivamus viverra nibh nec justo placerat, ac lacinia mi rutrum. Aliquam euismod justo in erat rhoncus, ac tempus magna luctus.', '', '2015-11-04 03:04:05'),
(3, 1, 'Curabitur vulputate nulla id fringilla efficitur.', '/assets/img/303177129563975cb75917.png', 'Maecenas consequat dolor et nulla rhoncus posuere. Phasellus vitae lorem non urna sollicitudin mattis. Duis cursus viverra justo in placerat. Mauris facilisis massa sed tellus ullamcorper, ac mollis tellus gravida. Curabitur nec ullamcorper sapien, eget ultricies eros. Ut facilisis erat ac lorem venenatis convallis. Donec dapibus est ac quam ornare eleifend.', '', '2015-11-04 03:04:43'),
(4, 1, 'Bears Fighting!', '/assets/img/1447513348563975e81c5c9.jpg', 'Proin mi lectus, lacinia id tortor et, efficitur bibendum mauris. Etiam bibendum elit arcu, sed elementum mauris consequat et. Praesent tincidunt lectus elit, vitae pretium massa ornare id. Maecenas ut ultrices elit. Nullam dignissim justo ex, eget viverra arcu accumsan at. Phasellus eget tempus erat. Morbi a nisl nec libero pretium luctus. Suspendisse dapibus lacus a lorem vestibulum, vitae ullamcorper lacus lobortis. Mauris vitae consequat quam. Sed viverra, felis a venenatis finibus, mi tellu', '', '2015-11-06 03:08:31'),
(5, 1, 'Quisque sit amet leo lacinia, vulputate nibh vel, dictum enim.', '/assets/img/17204251555639760432a08.jpg', 'Donec fermentum, tellus eget auctor vestibulum, risus neque molestie magna, ut dapibus mauris mauris quis sem. Sed nec fringilla tortor. Ut dictum facilisis augue, dapibus malesuada eros. Vivamus auctor dictum lorem. Donec pellentesque laoreet metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse purus justo, varius eu dui nec, rutrum efficitur augue. Vestibulum nec est ultrices, vehicula mi id, fermentum justo. Maecenas nibh turpis, cursus non consectetur a, ultrices vel o', '', '2015-11-04 03:05:40'),
(6, 3, 'Proin nec nunc tempus, laoreet dui at, aliquam diam.', '/assets/img/14068888415639763f9798f.jpg', 'Maecenas lectus ipsum, sodales eu auctor in, egestas non eros. Maecenas nec urna lobortis, finibus massa eu, cursus nisl. Maecenas at cursus tortor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc bibendum tempus aliquet. Cras eget porta sem. Nullam tempus sed orci quis imperdiet.', '', '2015-11-04 03:06:39'),
(7, 3, 'Duis efficitur lorem vitae quam semper fringilla.', '/assets/img/122314572856397678922a6.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultrices pretium nunc, nec vulputate quam aliquam in. Nulla a gravida massa, ut luctus sem. Nulla vitae tincidunt velit. Duis tempus tincidunt neque in mollis. Sed pharetra id justo sit amet rhoncus. Proin posuere mi erat, vel dignissim turpis gravida efficitur. Sed pretium ultrices rhoncus.', '', '2015-11-04 03:07:36'),
(8, 3, 'Praesent ornare justo eu nisl porttitor, sed suscipit felis consectetur.', '/assets/img/243065730563976bebf181.jpg', 'Pellentesque tincidunt cursus convallis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis cursus leo. Ut a libero id ligula commodo cursus. Suspendisse fringilla semper purus, a sodales lectus dapibus vel. Etiam venenatis dignissim odio nec consectetur. Sed vel elit id justo efficitur efficitur. Mauris sagittis sem vitae egestas dapibus. Fusce eu metus venenatis, euismod leo vel, sagittis lacus. Donec venenatis consequat molestie. Duis non vehicula metus.', '', '2015-11-04 03:08:46'),
(9, 3, 'Vestibulum dictum neque dignissim lorem fermentum dictum.', '/assets/img/1990477562563976e52691a.jpg', 'Phasellus rutrum sapien ac ex convallis tempus. Ut consequat dictum diam, ac posuere ipsum varius vitae. Maecenas sagittis imperdiet dui elementum dictum. Proin eget urna at lectus iaculis vestibulum vel vel tellus. Ut mi erat, sagittis in felis eu, vehicula fringilla odio. Suspendisse imperdiet, elit non imperdiet luctus, eros est vulputate nibh, id mattis nisl mi tempor diam. Suspendisse elementum fermentum imperdiet. Phasellus congue ligula dui, vel elementum elit bibendum sit amet. Etiam acc', '', '2015-11-04 03:09:25'),
(10, 2, 'Aenean feugiat libero sed ultricies tristique.', '/assets/img/290277806563977fca0b4a.jpg', 'Sed ut sollicitudin dolor. Vivamus ornare in metus scelerisque sodales. Nam elementum eleifend tellus vitae egestas. Quisque orci nisl, porta ut lorem a, accumsan consectetur massa. Cras volutpat porta bibendum. Pellentesque purus nisl, faucibus ut viverra sit amet, laoreet ut quam. Sed dapibus a nibh sed condimentum. Donec varius ullamcorper felis, quis eleifend orci tristique ac. Maecenas sapien mi, consequat non euismod ac, aliquet nec ligula. Nunc quis quam ut ex pharetra pharetra quis at ne', '', '2015-11-04 03:14:04'),
(11, 2, 'Nunc eget mi varius, iaculis ligula sit amet, fringilla massa', '/assets/img/672269485639781f5e234.jpeg', 'Pellentesque sit amet pharetra nisl. Duis convallis, enim sit amet dignissim feugiat, quam velit vulputate massa, at facilisis massa mauris ut mi. Vestibulum malesuada nisl eget augue fermentum, eu venenatis eros dictum. Sed tempor posuere felis, sit amet pretium massa hendrerit a. Vivamus commodo rutrum efficitur. Pellentesque vitae porta orci. Aliquam non mi nec justo tristique imperdiet vel ac augue. Donec vel tincidunt sapien, ut blandit arcu. Morbi leo orci, porttitor id euismod lacinia, ve', '', '2015-11-04 03:14:39'),
(12, 2, 'Morbi at metus dictum, venenatis urna eu, gravida ipsum.', '/assets/img/126951222556397842a71eb.jpg', 'Curabitur commodo risus eget auctor gravida. Phasellus tincidunt mauris libero, eu sagittis risus ultricies vel. Maecenas blandit, eros vel placerat convallis, nulla dolor scelerisque libero, eu tincidunt ligula felis faucibus nisl. Nunc et magna ligula. Duis sed molestie mauris, pretium accumsan ligula. Proin augue diam, laoreet eget velit quis, aliquam venenatis eros. Vivamus in finibus risus. Vivamus posuere at sapien non iaculis. Nam id velit sapien. Donec convallis urna nec venenatis dignis', '', '2015-11-04 03:15:14'),
(13, 2, 'Donec eleifend dui ac nisl mollis ullamcorper.', '/assets/img/2005199273563978a7e491d.jpg', 'Etiam malesuada vel risus quis convallis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam semper venenatis eleifend. Etiam tristique dui venenatis euismod tincidunt. Sed et rhoncus ligula, in euismod ligula. Sed bibendum, neque a vehicula aliquet, tortor lectus molestie diam, vitae blandit metus lorem scelerisque leo. Curabitur rutrum pharetra ex eu placerat. Suspendisse consequat tincidunt lacus dapibus ullamcorper. Quisque consectetur odio nec mi accumsan, id tristique sapien t', '', '2015-11-04 03:16:55'),
(14, 5, 'Maecenas tincidunt odio sed velit maximus, a consequat mauris faucibus.', '/assets/img/1428936324563999d29cc0d.jpg', 'Phasellus vitae ante sapien. Sed suscipit purus eros, quis eleifend mi sagittis vitae. Nunc a ultrices massa. Suspendisse porta augue varius turpis ultricies, non pellentesque eros pulvinar. Pellentesque non quam sit amet sapien tincidunt tincidunt ac eget quam. Proin a enim risus. Etiam tincidunt auctor arcu. Etiam ac velit non erat ornare lacinia vel non magna. Aliquam lacus ex, malesuada sed nunc nec, rutrum placerat nisl. Etiam eget venenatis enim.', '', '2015-11-04 05:38:26'),
(15, 5, 'Aenean placerat ligula vitae ante bibendum pellentesque.', '/assets/img/545918013563999f1dcfcf.jpg', 'Nulla ornare viverra sem nec placerat. Curabitur lacinia ipsum in ipsum aliquet placerat. Ut in nisl tempor ipsum hendrerit ultrices nec non lacus. Nunc porttitor, erat ac egestas semper, est massa imperdiet turpis, sit amet rhoncus nunc turpis ut elit. Maecenas nec ligula quis metus porttitor interdum vel sed ante. Nulla sed tincidunt dui. Nulla et nisl eget diam rutrum lacinia id ac nisl. Mauris ultrices venenatis convallis. Suspendisse interdum sapien orci, vitae pulvinar leo bibendum eget. E', '', '2015-11-04 05:38:57'),
(16, 5, 'Sed sit amet ante ac nibh pellentesque volutpat nec non urna.', '/assets/img/86484353556399a25c1827.jpg', 'Vivamus imperdiet ligula metus, sed dictum nisi dictum eu. Ut ultricies metus et consequat consequat. Nunc ac arcu at enim consectetur congue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam consectetur ac diam eu blandit. Nunc id sapien mauris. Nunc malesuada sollicitudin urna in ultricies. Nunc at porttitor ligula. Etiam mollis enim eget lacus hendrerit, ut dapibus velit volutpat. Quisque mi ante, facilisis non lacinia et, tincidunt a est. Mauris nulla tortor, tincidunt eg', '', '2015-11-04 05:39:49'),
(17, 5, 'Duis ullamcorper augue nec ex sodales, sed bibendum massa sodales.', '/assets/img/199569924556399a517c80b.jpg', 'Nullam lobortis velit accumsan, tincidunt velit eget, luctus magna. Cras id suscipit nulla. Sed in scelerisque leo. Praesent vitae hendrerit velit. Pellentesque eget nunc lacinia, aliquam ipsum ac, vehicula risus. Sed efficitur pellentesque augue, vel sollicitudin dolor facilisis at. Duis in ex semper, vestibulum dui at, ultrices turpis. Mauris accumsan fermentum magna. Fusce ultricies rutrum quam vitae finibus. Suspendisse id viverra lorem. Mauris auctor, lacus eu tristique mollis, lorem justo ', '', '2015-11-04 05:40:33'),
(18, 4, 'Sed venenatis ipsum vel massa tristique sollicitudin.', '/assets/img/198026405956399a9e1604a.jpg', 'Quisque placerat ultricies ex sit amet fringilla. Vivamus euismod risus non mi auctor gravida. Nulla facilisi. Aliquam quis ligula ac orci facilisis tempor. Proin eleifend mattis metus, ac ultricies tellus faucibus ut. Cras non massa pulvinar erat finibus pulvinar. Suspendisse posuere nibh id luctus hendrerit. Fusce maximus justo quis euismod sodales. Nunc rhoncus enim vehicula pharetra rhoncus. Maecenas interdum nibh non tellus finibus hendrerit. Nunc convallis porta augue, ut auctor neque blan', '', '2015-11-04 05:41:50'),
(19, 4, 'Curabitur convallis ex vitae rutrum ornare.', '/assets/img/205137598256399abeb5575.jpg', 'Curabitur ornare quam in arcu ultricies auctor. Vestibulum dapibus sem arcu, vehicula iaculis elit varius eget. Aliquam imperdiet odio in metus dignissim, nec iaculis diam maximus. Vivamus tortor lectus, suscipit id dui vitae, porttitor condimentum purus. In cursus diam neque, vel sodales enim iaculis vitae. Duis in lorem neque. Aenean facilisis mi et cursus imperdiet. Duis porttitor posuere nunc et accumsan. Vivamus ac nisl lorem. Nam sed purus vitae lorem sollicitudin pretium. Aenean pretium i', '', '2015-11-04 05:42:22'),
(20, 4, 'Ut in augue eget mi scelerisque dignissim.', '/assets/img/174445865756399ada2304d.jpg', 'Ut sed neque in mi suscipit blandit. Pellentesque nec ligula et sapien rhoncus laoreet sed sed libero. Integer blandit tellus ac semper aliquam. Phasellus sed neque arcu. Ut sodales ac tortor a rutrum. Ut hendrerit accumsan mauris, vitae porta mauris malesuada id. Sed feugiat luctus arcu, vitae tristique ex. Duis laoreet sapien ut lacinia viverra. Nam porttitor turpis id eros fringilla maximus. Curabitur ac convallis lorem. In consequat dolor vitae nisl maximus viverra. Quisque nec massa ac lect', '', '2015-11-04 05:42:50');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `email`, `password`, `username`, `first_name`, `last_name`, `about_you`, `location`, `website`, `profile_pic`, `creation_date`, `DOB`, `gender`, `nick_name`) VALUES
(1, 'jalma003@ucr.edu', '5f4dcc3b5aa765d61d8327deb882cf99', 'jalma003', 'John', 'Almaraz', 'My name is John and I am a CS major.', NULL, '', 'assets/img/1405957121563b0f87917b2.png', '2015-11-04 02:57:00', '1993-10-20', NULL, 'jalma003'),
(2, 'mtobo001@ucr.edu', '5f4dcc3b5aa765d61d8327deb882cf99', 'mtobo001', 'Marco', 'Tobon', '', '', '', 'assets/img/default.jpg', '2015-11-04 02:57:47', '1993-10-20', '', 'mtobo001'),
(3, 'wkeid001@ucr.edu', '5f4dcc3b5aa765d61d8327deb882cf99', 'wkeid001', 'William', 'Keidel', '', '', '', 'assets/img/default.jpg', '2015-11-04 02:59:26', '1993-10-20', '', 'wkeid001'),
(4, 'afull004@ucr.edu', '5f4dcc3b5aa765d61d8327deb882cf99', 'afull004', 'Alex', 'Fuller', '', '', '', 'assets/img/default.jpg', '2015-11-04 03:18:12', '1993-10-20', '', 'afull004'),
(5, 'bstev002@ucr.edu', '5f4dcc3b5aa765d61d8327deb882cf99', 'bstev002', 'Brandon', 'Stevenson', '', '', '', 'assets/img/default.jpg', '2015-11-04 05:35:05', '1993-10-20', '', 'bstev002'),
(6, 'test@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Test', 'Test', 'This', '', '', '', 'assets/img/default.jpg', '2015-11-20 23:22:40', '1993-10-20', '', 'Test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`name`,`uid`) USING BTREE,
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `pins`
--
ALTER TABLE `pins`
  ADD PRIMARY KEY (`b_name`),
  ADD UNIQUE KEY `pin_id` (`pin_id`) USING BTREE;

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
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pins`
--
ALTER TABLE `pins`
  MODIFY `pin_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `boards`
--
ALTER TABLE `boards`
  ADD CONSTRAINT `Foreign Key` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `pins`
--
ALTER TABLE `pins`
  ADD CONSTRAINT `Board_Key` FOREIGN KEY (`b_name`) REFERENCES `boards` (`name`) ON DELETE CASCADE;
