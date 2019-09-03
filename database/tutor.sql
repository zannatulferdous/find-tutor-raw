-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2019 at 04:35 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutor`
--

-- --------------------------------------------------------

--
-- Table structure for table `parentcircular`
--

CREATE TABLE `parentcircular` (
  `PARENT_ID` int(100) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Circular_Title` varchar(100) NOT NULL,
  `student_Subject` varchar(100) NOT NULL,
  `Area` varchar(100) NOT NULL,
  `Tuition_Schedule` varchar(100) NOT NULL,
  `week` varchar(100) NOT NULL,
  `Student_number` varchar(100) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `Details` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parentcircular`
--

INSERT INTO `parentcircular` (`PARENT_ID`, `User_ID`, `Circular_Title`, `student_Subject`, `Area`, `Tuition_Schedule`, `week`, `Student_number`, `salary`, `Details`) VALUES
(1, 2, 'Home tutor wanted ', 'English', 'Dhanmondi', 'Afternoon', '2Day/Week', '8', '8000-9000', 'dnnfd'),
(3, 0, 'Home tutor wanted ', 'English', 'Dhanmondi', 'Afternoon', '2Day/Week', '8', '8000-9000', 'mnzmxn');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `User_ID` int(11) NOT NULL,
  `Full_Name` varchar(30) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Phone_Number` varchar(15) NOT NULL,
  `District` varchar(20) NOT NULL,
  `Address` text NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `UserType` varchar(10) NOT NULL,
  `IMAGE_URL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`User_ID`, `Full_Name`, `Email`, `Phone_Number`, `District`, `Address`, `Gender`, `Username`, `Password`, `UserType`, `IMAGE_URL`) VALUES
(2, 'A R Rahman', 'a@gmail.com', '0187328638', 'Dhaka', 'Dhaka,bangladesh', 'Male', 'rahman', 'rahman', 'Parent', ''),
(3, 'rubaida ruhi', 'ruhi@gmail.com', '0187548638', 'chittagong', 'rajbari', 'Female', 'ruhi', 'Ruhi12', 'Tutor', ''),
(6, 'Mostafizur  Rahman  Leon', 'leon@gmail.com', '01873286374', 'rajshahi', 'sirajganj', 'Male', 'leon', 'Leon12', 'Parent', ''),
(7, 'onix', 'onix@bdsoft.biz', '01680651229', 'Comilla', 'Mirpur', 'Female', 'onix', 'onix123', 'Tutor', '1522142574diu.png'),
(8, 'Mr X', 'parent@gmail.com', '1234', 'Select District', 'dhaka', 'Female', 'parent', 'Parent123', 'Parent', '152213935618920396_657070034486226_375867017900777264_n.png'),
(9, 'zannatul ferdous onix', 'Onix@gmail.com', '01328724863', 'Dhaka', 'ullapara', 'Female', 'onix', 'Onix12', 'Tutor', '1537690105onix2.jpg'),
(10, '', '', '', '', '', '', '', '', '', '1539206343');

-- --------------------------------------------------------

--
-- Table structure for table `tutorcircular`
--

CREATE TABLE `tutorcircular` (
  `T_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `Area` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Nationality` varchar(100) NOT NULL,
  `National_ID_No` varchar(100) NOT NULL,
  `Short_Information` text NOT NULL,
  `Educational_Level` varchar(100) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Institute` varchar(100) NOT NULL,
  `Schedule` varchar(100) NOT NULL,
  `Student_Level` varchar(100) NOT NULL,
  `student_Subject` varchar(100) NOT NULL,
  `salary` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutorcircular`
--

INSERT INTO `tutorcircular` (`T_ID`, `User_ID`, `file_name`, `Area`, `Date`, `Nationality`, `National_ID_No`, `Short_Information`, `Educational_Level`, `Subject`, `Institute`, `Schedule`, `Student_Level`, `student_Subject`, `salary`) VALUES
(1, 1, '', 'Dhanmondi', '2018-01-31', 'Bangladeshi', '291778936973521', 'snad,sa bsdsnagdhk xbnsghas', 'Doctorate', 'Software Engineering ', 'Daffodil International  University ', 'Morning', 'Level 0-Level 5', 'English', '3000-4000'),
(2, 3, '', 'Uttora', '1993-03-30', 'Bangladeshi', '217398263826872', 'mxxnMn  xbaskjdga', 'Graduation(running)', 'Software Engineering ', 'Daffodil International  University ', 'Morning & Night', 'Level 10-Level 12', 'Math', 'Negotiable'),
(3, 7, '', 'Uttora', '1993-03-30', 'Bangladeshi', '2873782872548725', 'mxxnMn  xbaskjdga', 'Graduation(running)', 'Software Engineering ', 'Daffodil International  University ', 'Morning & Night', 'Level 10-Level 12', 'Math', 'Negotiable'),
(4, 9, '153769028023583879_1524111631013440_1624153898_o.jpg', 'Dhanmondi', '2018-09-13', 'Bangladeshi', '02838294324743', 'bnxnb', ' Diploma(Running)', 'english', 'diu', ' Afternoon & Evening ', 'Level 5-Level 10', 'english', '7000-8000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parentcircular`
--
ALTER TABLE `parentcircular`
  ADD PRIMARY KEY (`PARENT_ID`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `tutorcircular`
--
ALTER TABLE `tutorcircular`
  ADD PRIMARY KEY (`T_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parentcircular`
--
ALTER TABLE `parentcircular`
  MODIFY `PARENT_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tutorcircular`
--
ALTER TABLE `tutorcircular`
  MODIFY `T_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
