-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2021 at 09:09 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `connect`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `ctime` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentid`, `postid`, `username`, `comment`, `ctime`) VALUES
(9, 16, 'pfumi', 'Yes man I will be', '0:08, 09 Oct 20'),
(12, 19, 'joe', 'It is Interesting my friend...', '0:38, 10 Oct 20'),
(13, 19, 'emma', 'nhi there', '10:07, 26 Dec 20');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `friendid` int(11) NOT NULL,
  `userOne` varchar(50) NOT NULL,
  `userTwo` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`friendid`, `userOne`, `userTwo`, `status`) VALUES
(5, '23', '19', 1),
(6, '23', '20', 1),
(8, '23', '22', 1),
(9, '22', '19', 1),
(10, '24', '19', 1),
(11, '22', '20', 1),
(12, '22', '21', 1),
(13, '20', '24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inboxes`
--

CREATE TABLE `inboxes` (
  `inboxid` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiverid` int(11) NOT NULL,
  `message` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `postid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `likedate` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`postid`, `username`, `likedate`) VALUES
(9, 'pfumi', '16:29, 08 Oct 20'),
(2, 'joe', '17:48, 08 Oct 20'),
(2, 'alistair', '17:49, 08 Oct 20'),
(16, 'pfumi', '0:08, 09 Oct 20'),
(17, 'shaun', '0:27, 09 Oct 20'),
(16, 'shaun', '0:28, 09 Oct 20'),
(19, 'joe', '0:37, 10 Oct 20');

-- --------------------------------------------------------

--
-- Table structure for table `moreinfo`
--

CREATE TABLE `moreinfo` (
  `infoid` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `dp` int(11) NOT NULL,
  `job` varchar(50) DEFAULT NULL,
  `employer` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `moreinfo`
--

INSERT INTO `moreinfo` (`infoid`, `username`, `bio`, `dp`, `job`, `employer`) VALUES
(3, 'alistair', 'Bussinessman', 1, 'PHP developer', 'Richfield'),
(4, 'pfumi', 'Student', 1, 'Intern', 'Vocadom'),
(5, 'ntshuxeko', NULL, 1, NULL, NULL),
(6, 'joe', 'CEO77', 1, 'Software Engineer', 'EA Sports'),
(7, 'shaun', NULL, 1, NULL, NULL),
(8, 'nikiwe', 'Developer | Travel | Lifestyle', 1, 'Systems Analyst', 'FNB'),
(9, 'emma', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postid` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `postdate` varchar(25) DEFAULT NULL,
  `status` text DEFAULT NULL,
  `postpic` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postid`, `username`, `postdate`, `status`, `postpic`) VALUES
(16, 'alistair', '0:04, 09 Oct 20', 'Hey guys, you coming', 'uploads/post5f7f8cea453a5.jpeg'),
(17, 'shaun', '0:21, 09 Oct 20', 'This is interesting', NULL),
(18, 'alistair', '22:36, 09 Oct 20', 'I have just logged in a different browser', 'uploads/post5f80c9b672e41.jpg'),
(19, 'nikiwe', '23:04, 09 Oct 20', 'How is PHP guys?', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `profileid` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(7) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`profileid`, `username`, `name`, `surname`, `birthdate`, `gender`, `address`, `city`, `phone`, `email`) VALUES
(19, 'alistair', 'Alistair', 'Kayyz', '1996-10-07', 'Male', '38 Van Beek St.', 'Johannesburg', '0846468960', 'alistairkhosa@gmail.com'),
(20, 'pfumi', 'Ripfumelo', 'Mabunda', '1996-10-07', 'Male', 'Stand 116 Jopi Village', 'Tzaneen', '0846468960', 'pfumi@gmail.com'),
(21, 'ntshuxeko', 'Ntshuxeko', 'Malmela', '1996-11-07', 'Female', '12 Thabo Mbeki St.', 'Polokwane', '07184659723', 'ntshuxeko@gmail.com'),
(22, 'joe', 'Joe CJ', 'Nukeri', '1998-08-31', 'Male', 'Stand 116 Jopi Village', 'Tzaneen', '08752785', 'nukeri@gmail.com'),
(23, 'shaun', 'Shaun', 'Mabunda', '1999-05-21', 'Male', '56 Charles St.', 'PLK', '0785462152', 'shaun@gmail.com'),
(24, 'nikiwe', 'Nikiwe', 'Nyambi', '1990-08-23', 'Female', '767 Elm St.', 'Soweto', '07584625423', 'nikiwe@gmail.com'),
(25, 'emma', 'Emma', 'MOogwe', '1990-11-26', 'Male', 'Mandlakazi', 'Tzaeen', '07545522111', 'alistairkhosa@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('alistair', '12345'),
('emma', '12345'),
('joe', 'NewPassword'),
('nikiwe', 'Changed'),
('ntshuxeko', '12345'),
('pfumi', '12345'),
('shaun', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`friendid`);

--
-- Indexes for table `inboxes`
--
ALTER TABLE `inboxes`
  ADD PRIMARY KEY (`inboxid`);

--
-- Indexes for table `moreinfo`
--
ALTER TABLE `moreinfo`
  ADD PRIMARY KEY (`infoid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`profileid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `friendid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `inboxes`
--
ALTER TABLE `inboxes`
  MODIFY `inboxid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `moreinfo`
--
ALTER TABLE `moreinfo`
  MODIFY `infoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `profileid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
