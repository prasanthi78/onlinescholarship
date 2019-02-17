-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2018 at 11:06 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scholarship`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` text,
  `password` text,
  `email` text NOT NULL,
  `phoneno` text,
  `otpno` text,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `phoneno`, `otpno`, `status`) VALUES
(1, 'admin', 'scholar', 'aditya@gmail.com', '7658964778', '823419', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `id` int(11) NOT NULL,
  `photo` text,
  `signature` text,
  `rollno` text,
  `sname` text,
  `fname` text,
  `mname` text,
  `ssc_hall` text,
  `aadhar` text NOT NULL,
  `ssc_year_pass` int(11) NOT NULL,
  `ssc_passtype` text,
  `gender` text,
  `religion` text,
  `caste` text,
  `subcaste` text,
  `mtongue` text,
  `nation` text,
  `pocu` text,
  `village` text,
  `mandal` text,
  `district` text,
  `state` text,
  `habitation` text,
  `street` text,
  `doorno` text,
  `pincode` int(11) NOT NULL,
  `email` text,
  `pmobile` text NOT NULL,
  `smobile` text NOT NULL,
  `mole1` text,
  `mole2` text,
  `course` text,
  `year_study` int(11) NOT NULL,
  `section` text,
  `adm_cat` text,
  `cap_cat` text,
  `cap_cat_name` text,
  `cap_cat_file` text,
  `sports_cat_name` text,
  `sports_cat_file` text,
  `ncc_cat_name` text,
  `ncc_cat_file` text,
  `nss_cat_name` text,
  `nss_cat_file` text,
  `extra_act_name` text,
  `extra_act_file` text,
  `second_lang` text,
  `adm_no` int(11) NOT NULL,
  `adm_date` text,
  `phy_chal` text,
  `phy_certi` text,
  `seligible` text,
  `sch_type` text,
  `caste_num` text,
  `income_num` text,
  `ifsc` text,
  `bankname` text,
  `bank_ac` int(11) NOT NULL,
  `banktown` text,
  `ssc_scan_fee` text,
  `income_scan_fee` text,
  `caste_scan_fee` text,
  `saadhar_fee` text,
  `bank_book_fee` text,
  `clgallot_fee` text,
  `ssc_scan_nonfee` text,
  `saadhar_nonfee` text,
  `clgallot_nonfee` text,
  `reg_date` date NOT NULL,
  `unique_id` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`id`, `photo`, `signature`, `rollno`, `sname`, `fname`, `mname`, `ssc_hall`, `aadhar`, `ssc_year_pass`, `ssc_passtype`, `gender`, `religion`, `caste`, `subcaste`, `mtongue`, `nation`, `pocu`, `village`, `mandal`, `district`, `state`, `habitation`, `street`, `doorno`, `pincode`, `email`, `pmobile`, `smobile`, `mole1`, `mole2`, `course`, `year_study`, `section`, `adm_cat`, `cap_cat`, `cap_cat_name`, `cap_cat_file`, `sports_cat_name`, `sports_cat_file`, `ncc_cat_name`, `ncc_cat_file`, `nss_cat_name`, `nss_cat_file`, `extra_act_name`, `extra_act_file`, `second_lang`, `adm_no`, `adm_date`, `phy_chal`, `phy_certi`, `seligible`, `sch_type`, `caste_num`, `income_num`, `ifsc`, `bankname`, `bank_ac`, `banktown`, `ssc_scan_fee`, `income_scan_fee`, `caste_scan_fee`, `saadhar_fee`, `bank_book_fee`, `clgallot_fee`, `ssc_scan_nonfee`, `saadhar_nonfee`, `clgallot_nonfee`, `reg_date`, `unique_id`, `status`) VALUES
(70, NULL, NULL, '15a91a1247', '', '', '', '978798798797987', '698767987987897897', 2012, '', '', '', '', '', '', '', '', 'village', 'HGJHGJ', 'jhgjhgj', 'Andhra Pradesh', 'HJGJHG', 'H No: 1-28, Nandarada Village,Rajanagaram Mandal,', '67868768', 533445, 'vagmini506@gmail.com', '08897656164', '7995630072', '', '', '', 0, '', 'Convener', '', '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', 0, '', '', NULL, '', 'Student managed hostel', '', '', '76786786', '', 78868, 'Rajahmundry', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-12', '', 1),
(72, NULL, 's472.jpg', '15A91A1251', '', '', '', '978798798797982', '787987788787877', 0, '', '', '', '', '', '', '', '', 'sadads', 'mandal', 'HHGHJ', 'Andhra Pradesh', 'jhgjkhg', 'H No: 1-28, Nandarada Village,Rajanagaram Mandal,', '87878787', 533445, 'vagmini506787@gmail.com', '08897656164', '7658964778', '', '', '', 0, '', 'Management', '', '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', 0, '', '', NULL, '', 'Student managed hostel', '', '', '888', '', 78678685, 'Rajahmundry', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-12', '', 1),
(73, 'download73.png', 'sign73.png', '15A91A1214', '', '', '', '776786878778786', '877878978789', 0, '', '', '', '', '', '', '', '', 'UGH', 'HGJHGJ', 'HHGHJ', 'Andhra Pradesh', 'jhgjkhg', 'H No: 1-28, Nandarada Village,Rajanagaram Mandal,', '87897', 533445, 'vagmini5068989@gmail.com', '08897656164', '9182920426', '', '', '', 0, '', 'Convener', '', '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', 0, '', '', NULL, '', 'Department Hostel', '', '', '7878', '', 78687678, 'Rajahmundry', 'pdf8473.pdf', 'pdf8673.pdf', 'pdf8573.pdf', 'pdf7473.pdf', 'pdf5073.pdf', 'pdf4873.pdf', NULL, NULL, NULL, '2018-07-12', 'SCH0073', 1),
(74, 'download74.png', 'sign74.png', '15A91A1203', 'prasanthi', 'barla', 'bhavya', '567767887878888', '8778789787878', 2015, 'Regular', 'Female', 'hindu', 'oc', 'brahmins', 'Telugu', 'Indian', 'farmer', 'madiki', 'alamuru', 'east godavari district', 'Andhra Pradesh', 'konkuduru', 'near cinema hall, main road', '4-120/2', 533345, 'sudhasunaina@gmail.com', '9000579656', '9618884909', 'A mole on right side of neck', 'A mole on right side of nose', 'it', 2018, 'A', 'Convener', 'NCC Category', '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 'telugu', 236, '1998-07-20', 'no', NULL, '', 'Day Scholar', '543543449', '653869983', '234', 'SbI', 5489686, 'madiki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-12', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
