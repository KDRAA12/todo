-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2020 at 09:42 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todoapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `Name` varchar(150) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `ID` int(11) NOT NULL,
  `TItle` varchar(256) NOT NULL,
  `CreationDate` date NOT NULL DEFAULT current_timestamp(),
  `CreatorID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `fullname` varchar(60) NOT NULL,
  `ID` int(11) NOT NULL,
  `email` varchar(65) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`fullname`, `ID`, `email`, `password`) VALUES
('abdel kader', 1, 'abdel@rimlines.com', '$2y$10$7ES6.vsqlDEBCUHGOyMGCOM222vjBVi5C.165k7sVflNTStOXilKe'),
('sss', 2, 'aaa@qq.com', '$2y$10$Zb3z5kk1WcE5xgzJDf9TOOqrMXQy6bZ8L4lXXhaUKU7AzoClTvGgW'),
('lafdal Abdel Kader', 3, 'sp66@rimlines.com', '$2y$10$nMxdBS0ryy1K7.LKKhAoU.T15ZetdxJuAv2JNKwtud18y9qYZCcx.'),
('ssk', 4, 'k2k@rimlines.com', '$2y$10$pGCoUHQ3964UjFIKp4fN4.93GE6NUSGSQQZ2.p2.qToucIwMxM0Mm'),
('ee', 5, '1', '$2y$10$nwYZoWaejduC77RQfz8bxe/4Y8vB5h5GXGodm3zh/q.7HNwPLjl6y'),
('3', 6, '3', '$2y$10$RqlgAa7k2PYGeViKCwK25eACLuL.KRdek0g6IQmjkdc/3XJhv1ZDq'),
('4', 7, '4', '$2y$10$y2vcejgaPztAI3BKmg2cpeHZIQHVx6X.3/O1YRVa67ORjfzxgIGDa'),
('5', 8, '5', '$2y$10$eIkPSOIfX6ef3sQC2xvtRe0BgS1L/qDRbqU6hyJ93YSsUpVBQAp9y'),
('6', 9, '6', '$2y$10$Dd6bTIsjvVI1B959nKaUZ.r2.9jOHynBeYKvmBHn2FZEwtcgKXk0K'),
('7', 10, '7', '$2y$10$YYg6pGkLlLp58pP3kQEjFeWVq3y1csOlS4pCRdIgnXPb8syWwvFby'),
('9', 11, '9', '$2y$10$qlKXyiGvrK5q1v1AJf0Gy.bCsfN1NKvlDetSvVewo1u0861olILZ2'),
('11', 12, '11', '$2y$10$upTFY8.4j.CDsQKQ3XVKRuhPYEhrgFcDU6XInB.iHcNs48fFqS38S'),
('aa', 13, 'aa', '$2y$10$FtXAb30VGhmloTdStPZD4ONeDVKGmcjiP7f6oXpdzxwMduYfh6sr6'),
('kaa', 14, 'll@rimlines.com', '$2y$10$5tLHIQIUl960EGVpujyYseIYWOZDlY9WvOOkTLbI1v5IGAVFlmdii'),
('lafdal Abdel Kader', 15, '6@rimlines.com', '$2y$10$4quRK0SmE6pxPlEkeoBEluUlpVB1rndbWQ/U7qm977l9nA04StwiG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CreatorId_fk` (`CreatorID`),
  ADD KEY `ProjectId_fk` (`ProjectID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `CreatorId_fk` FOREIGN KEY (`CreatorID`) REFERENCES `user` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `ProjectId_fk` FOREIGN KEY (`ProjectID`) REFERENCES `project` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
