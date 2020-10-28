-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2019 at 04:14 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zakat_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets_liabilities`
--

CREATE TABLE `assets_liabilities` (
  `ID` int(11) NOT NULL,
  `Gold_Silver` double DEFAULT '0',
  `Home_Amount` double DEFAULT '0',
  `Bank_Amount` double DEFAULT '0',
  `Shares_Amount` double DEFAULT '0',
  `Merchandise_Amount` double DEFAULT '0',
  `Property_Amount` double DEFAULT '0',
  `Other_Amount` double DEFAULT '0',
  `User_ID` int(11) NOT NULL,
  `Update_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assets_liabilities`
--

INSERT INTO `assets_liabilities` (`ID`, `Gold_Silver`, `Home_Amount`, `Bank_Amount`, `Shares_Amount`, `Merchandise_Amount`, `Property_Amount`, `Other_Amount`, `User_ID`, `Update_Date`) VALUES
(1, 1000, 1000, 1000, 1000, 2000, 200, 300, 1, '2018-12-27'),
(2, 120000, 120000, 120000, 0, 0, 0, 0, 3, '2018-12-27'),
(3, 3435, 2342, 1299, 0, 2999, 0, 3434, 1, '2019-05-31'),
(4, 1000, 2000, 20000, 0, 200, 3000, 300, 1, '2019-07-27'),
(5, 30000, 400000, 300000, 0, 4000, 0, 500, 1, '2019-08-11'),
(6, 30000, 400000, 300000, 6000, 4000, 69999, 500, 11, '2019-08-14');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Conmment` varchar(200) DEFAULT NULL,
  `Post_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `Name`, `Conmment`, `Post_ID`) VALUES
(1, 'shakib', 'good jpb', 3),
(2, 'shovon', 'jhgj jhhkbk jbjk', 3);

-- --------------------------------------------------------

--
-- Table structure for table `donated_zakat`
--

CREATE TABLE `donated_zakat` (
  `ID` int(11) NOT NULL,
  `Amount` double DEFAULT '0',
  `Payment_Date` date DEFAULT NULL,
  `User_ID` int(11) NOT NULL,
  `Post_ID` int(11) DEFAULT NULL,
  `Foundation_ID` int(11) DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donated_zakat`
--

INSERT INTO `donated_zakat` (`ID`, `Amount`, `Payment_Date`, `User_ID`, `Post_ID`, `Foundation_ID`, `comment`) VALUES
(45, 50, '2019-08-14', 1, NULL, NULL, 'djnfkn'),
(46, 100, '2019-08-14', 1, NULL, NULL, 'to local area'),
(47, 2000, '2019-08-14', 1, 7, NULL, NULL),
(48, 1000, '2019-08-14', 1, NULL, 3, NULL),
(49, 100, '2019-08-14', 11, 6, NULL, NULL),
(50, 2000, '2019-08-14', 11, NULL, 2, NULL),
(51, 1000, '2019-08-14', 11, NULL, NULL, 'j yg iu iui ffd fu fyu hu\r\nhh h uiyi y y fyiti yioyuo'),
(52, 100, '2019-08-18', 1, NULL, 1, NULL),
(53, 300, '2019-08-18', 1, 5, NULL, NULL),
(54, 30, '2019-08-18', 1, NULL, 2, NULL),
(55, 30, '2019-08-19', 1, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `ID` int(11) NOT NULL,
  `susername` varchar(40) NOT NULL,
  `dusername` varchar(40) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `msg` varchar(400) NOT NULL,
  `red` varchar(10) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`ID`, `susername`, `dusername`, `title`, `msg`, `red`, `User_ID`) VALUES
(1, 'shovon', 'shakib', 'donation', 'how to donate zakat?                                                \r\n                                            ', 'y1', 1),
(2, 'shakib', 'shovon', 'yy', 'kbkbk                                                \r\n                                            ', 'y', 3),
(3, 'musta', 'shakib', 'yyyvh', 'uhihh kbk                                                \r\n                                            ', 'y1', 2),
(4, 'shovon', 'bayzeed', 'hello', 'qwpoj ,sd ,aiw wdl,asc\r\nxklvxc vxc;lvx;cv xc;nsdnc\r\nxcvxcn xclhfoah knlnxvlj;aj;\r\nn ,nljlccllclpappofprewresn                                                \r\n                                            ', 'y1', 1),
(5, 'bayzeed', 'shovon', 'hi', 'fgd er sryy                                                \r\n                                            ', 'y', 13),
(6, 'bayzeed', 'shovon', 'sdfhsdo', 'kldnlsc czxlv                                                 \r\n                                            ', 'y', 13),
(7, 'shovon', 'bayzeed', 'kbvk', 'xcjkbvjk erten                                                \r\n                                            ', 'y1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mosques_charity_foundation`
--

CREATE TABLE `mosques_charity_foundation` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Contact` varchar(100) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Street_Address` varchar(80) DEFAULT NULL,
  `City` varchar(50) NOT NULL,
  `Country` varchar(60) NOT NULL,
  `Password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mosques_charity_foundation`
--

INSERT INTO `mosques_charity_foundation` (`ID`, `Name`, `Type`, `Contact`, `Email`, `Street_Address`, `City`, `Country`, `Password`) VALUES
(1, 'Zamia', 'Foundation', '01789546976', 'zamia@gmail.com', 'Road 1', 'Dhaka', 'Bangladesh', '1234'),
(2, 'Islamic Foundation', 'Foundation', '01786349274', 'islamic@yahoo.com', 'Badda', 'Dhaka', 'Bangladesh', '1234'),
(3, 'Al Noor', 'Mosque', '01782239274', 'noor@yahoo.com', '3-Badda', 'Dhaka', 'Bangladesh', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `ID` int(11) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Content` varchar(8000) DEFAULT NULL,
  `Upload_Date` date DEFAULT NULL,
  `Amount` double NOT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`ID`, `Title`, `Content`, `Upload_Date`, `Amount`, `User_ID`, `status`) VALUES
(1, 'Need Help', 'sfsdofh sdfsdofhso fsdofhos                                        \r\n                                            ', '2018-12-27', 900, 2, -1),
(2, 'Street Children', 'To survive on the streets children are forced to beg, steal or trafficked into bonded labour or sexual slavery. ‘Rescue a child’ enables our trained outreach workers to find vulnerable children who are either abandoned, lost or assimilated into gangs. They are rescued into our shelter where we start the healing process.', '2018-12-29', 5000, 4, -1),
(3, 'SCHOOL UNDER THE SKY', 'Informal schools are setup on city entry points and areas where children congregate and ply their trade. The school enables the outreach workers and specialist mobile teachers to sign post children to a centralised activity point. There the children can be recorded, tracked and given medical attention. The school works on multiple levels with the children. As a school it generates trust with the children, it enables the children to use it as a centralised point for help and assistance and it acts like a beacon for new children who may have just come onto the streets.', '2019-05-31', 10000, 2, -1),
(4, 'SD SDC', 'dfd dfef etr\r\nfddfg\r\nerer rey \r\ntrr                                                \r\n                                            ', '2019-06-01', 1000, 2, 0),
(5, 'Do more to give the Rohingya refugees a life in dignity', 'A year has gone since hundreds of thousands of Rohingyas were forced to leave their homes after violence broke out in Myanmar. They sought refuge in neighboring Bangladesh leading to the establishment of the largest refugee camp in the world. Visiting the camp this week, Secretary General Christian Friis Bach is impressed with the resistance of the Rohingya refugees despite extreme suffering and losses.', '2019-07-14', 2000, 5, 1),
(6, 'For poor people in our village', 'The urban poor as a community are at the crossroads of two value systems: the folk traditional and the modern. The folk traditional system of values emphasizes social stability, continuity and commitment to normative standards of behaviour. The modern system represents the values of secularism, functional differentiation and innovation. The direction of change is determined by reference models, both traditional and modern, with which the urban poor interact as they seek to make new lives for ', '2019-08-12', 2000, 2, 1),
(7, 'Need help for poor peoples in our city', 'The population of a city grows through birth as well as migration. The economy has not been able to provide employment and an income for the vast majority of rural migrants, including the urban poor. Significantly, a large number of urban poor work in the informal sector as they have less skill, less education and less capital. In many developing countries, including India, due to the fast pace of urbanization, many rural areas are gradually becoming part of urban areas, where urban amenities are lacking and open spaces', '2019-08-13', 2000, 4, 1),
(8, 'iji jonlol oijo jhiojp', 'jojsd jsdov cxojxcvjxc\r\ndfjdfjd dfljdfogjdflgdf dfkgndfjl d dprjeprterlgn ererneron erk erkthnfdfkk erkfnerondjkdkdf dlfertoer dfvekrtnepr fkl neterlnd fdtj erpiterjior', '2019-08-13', 3000, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `First_Name` varchar(55) NOT NULL,
  `Last_Name` varchar(55) NOT NULL,
  `User_Name` varchar(55) NOT NULL,
  `Type` char(10) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Contact` varchar(100) NOT NULL,
  `Street_Address` varchar(80) DEFAULT NULL,
  `City` varchar(50) NOT NULL,
  `Country` varchar(60) NOT NULL,
  `Password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `First_Name`, `Last_Name`, `User_Name`, `Type`, `Date_of_Birth`, `Email`, `Contact`, `Street_Address`, `City`, `Country`, `Password`) VALUES
(1, 'Mirza Ebnul Mahmood', 'Shovon', 'shovon', 'Giver', '1997-08-27', 'shovonmahmood67@gmail.com', '01789546973', 'Road 1', 'Dhaka', 'Bangladesh', '1234'),
(2, 'Mustafizur', 'Rahman', 'musta', 'Receiver', '1996-09-30', 'musta@gmail.com', '01789546343', 'Road 11', 'Dhaka', 'Bangladesh', '1234'),
(3, 'Shakib', 'Khan', 'shakib', 'Imam', '1988-11-29', 'shakib@gmail.com', '01789546912', 'Road 11', 'Dhaka', 'Bangladesh', '1234'),
(4, 'Toukir', 'Ahmed', 'toukir', 'Receiver', '1997-09-29', 'toukir@gmail.com', '01789546343', 'Road 11', 'Dhaka', 'Bangladesh', '1234'),
(5, 'Rafee', 'Ahmed', 'rafee', 'Receiver', '1998-07-04', 'rafee456@gmail.com', '01789553497', 'Badda', 'Dhaka', 'Bangladesh', '1234'),
(8, 'Tarek', 'Ahmed', 'tarek', 'Giver', '1997-07-10', 'tarek@gmail.com', '01678452256', '3-Badda', 'Dhaka', 'Bangladesh', '1234'),
(9, 'Shovon', 'Mahmood', 'admin', 'Admin', '1997-08-20', 'admin@gmail.com', '01678452256', '3-Badda', 'Dhaka', 'Bangladesh', '1234'),
(10, 'Tomal', 'Mojundar', 'tomal', 'Giver', '1988-07-24', 'tomal@gmail.com', '01789654379', '6-Badda', 'Dhaka', 'Bangladesh', '1234'),
(11, 'Rabby', 'Khan', 'rabby', 'Giver', '1998-08-08', 'rabby@gmail.com', '01789654388', '6-Badda', 'Dhaka', 'Bangladesh', '1234'),
(12, 'Al', 'Amin', 'al', 'Imam', '1988-08-07', 'al@yahoo.com', '01484328739', 'Badda', 'Dhaka', 'Bangladesh', '1234'),
(13, 'Bayzeed', 'Ahmed', 'bayzeed', 'Imam', '1988-04-07', 'bayzeed@yahoo.com', '014823358739', 'Badda', 'Dhaka', 'Bangladesh', '1234'),
(14, 'Tamim', 'Ahmed', 'tamim', 'Receiver', '1998-08-07', 'tamim@gmail.com', '01785349824', 'Badda', 'Dhaka', 'Bangladesh', '1234'),
(15, 'Sujan', 'Khan', 'sujan', 'Giver', '1997-08-13', 'sujan@gmail.com', '01785349827', 'Badda', 'Dhaka', 'Bangladesh', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets_liabilities`
--
ALTER TABLE `assets_liabilities`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `u_fk` (`User_ID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `c_fk` (`Post_ID`);

--
-- Indexes for table `donated_zakat`
--
ALTER TABLE `donated_zakat`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `uid_dfk` (`User_ID`),
  ADD KEY `p_fk` (`Post_ID`),
  ADD KEY `f_fk` (`Foundation_ID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `mosques_charity_foundation`
--
ALTER TABLE `mosques_charity_foundation`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `pu_fk` (`User_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `User_Name` (`User_Name`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets_liabilities`
--
ALTER TABLE `assets_liabilities`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donated_zakat`
--
ALTER TABLE `donated_zakat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mosques_charity_foundation`
--
ALTER TABLE `mosques_charity_foundation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets_liabilities`
--
ALTER TABLE `assets_liabilities`
  ADD CONSTRAINT `u_fk` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `c_fk` FOREIGN KEY (`Post_ID`) REFERENCES `post` (`ID`);

--
-- Constraints for table `donated_zakat`
--
ALTER TABLE `donated_zakat`
  ADD CONSTRAINT `f_fk` FOREIGN KEY (`Foundation_ID`) REFERENCES `mosques_charity_foundation` (`ID`),
  ADD CONSTRAINT `p_fk` FOREIGN KEY (`Post_ID`) REFERENCES `post` (`ID`),
  ADD CONSTRAINT `uid_dfk` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `pu_fk` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
