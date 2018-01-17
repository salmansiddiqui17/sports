-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2018 at 01:52 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sports_club`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `is_delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `contact_no`, `role_id`, `is_delete`) VALUES
(1, 'Rehan', 'Ahmed', 'rehan_ahmed', 'rehan@softvilla.com.pk', '63254d7506152f73022035bbc5c5714a', '00000000000', 1, 0),
(2, 'Ahsan', 'Kabir', 'admin', 'info@cricketclub.com', '202cb962ac59075b964b07152d234b70', '0235548011', 0, 0),
(5, 'Salmn', 'Siddiqui', 'admin2', 'salmansidd17@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '03344339575', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `name`) VALUES
(1, 'Lahore Club'),
(2, 'High Tech Club'),
(3, 'Tigers CLub'),
(4, 'Karachi Club');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `team1` int(11) NOT NULL,
  `team2` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  `winning_team` int(11) NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `tour_id`, `team1`, `team2`, `date`, `status`, `winning_team`, `is_delete`) VALUES
(1, 1, 1, 2, '2017-12-16', 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `f_name` varchar(200) NOT NULL,
  `cnic` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `club` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `name`, `f_name`, `cnic`, `age`, `gender`, `type`, `club`, `contact`, `is_delete`) VALUES
(1, 'Salman SIddiqui', 'Furqan', '111111111111', '23', 'Male', 'Batsman', 'Lahore Club', '03344339575', 0),
(2, 'Inzamam ul Haq', 'Rehan', '111111111111', '27', 'Male', 'Batsman', 'High Tech Club', '03344339575', 0),
(3, 'M Irfan', 'Ali', '3520223099281', '28', 'Male', 'Bowler', 'High Tech Club', '03344339575', 0),
(4, 'Shahid Khan Afridi', 'Sultan Afridi', '3520223099281', '23', 'Male', 'All Rounder', 'Lahore Club', '03344339574', 0),
(5, 'test', 'test father', '3520223099281', '20', 'Male', 'Batsman', 'Lahore Club', '03344339575', 0),
(6, 'Salman', 'Salman', '3520223099281', '23', 'Male', 'Batsman', 'Lahore Club', '03344339575', 0),
(7, 'Ahson', 'Kabir ', '3520181876389', '21', 'Male', 'Bowler', 'Lahore Club', '03034393773', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `coach` varchar(100) NOT NULL,
  `players` varchar(100) NOT NULL,
  `club` int(11) NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `coach`, `players`, `club`, `is_delete`) VALUES
(1, 'Lahore Qalanders', 'John', '2,3,5', 1, 0),
(2, 'Karachi Kings', 'Mark', '1,4', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `teams` varchar(100) NOT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `name`, `start_date`, `end_date`, `teams`, `is_delete`) VALUES
(1, 'T20 - World Cup', '2017-11-02', '2017-11-29', '1,2', 0),
(2, 'World Cup', '2017-11-01', '2017-12-20', '1,2', 0),
(3, 'Asia Cup', '2018-01-01', '2018-01-31', '1,2', 0),
(4, 'PSL', '2018-01-05', '2018-01-18', '1,2', 0),
(5, 'IPL', '2018-01-09', '2018-01-19', '1,2', 0),
(6, 'Under 19 World Cup', '2018-01-06', '2018-01-17', '1,2', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id_2` (`role_id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
