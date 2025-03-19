-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2025 at 03:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_emp`
--

CREATE TABLE `admin_emp` (
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) NOT NULL,
  `fullName` varchar(255) GENERATED ALWAYS AS (concat(`firstName`,' ',`middleName`,' ',`lastName`)) STORED,
  `position` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `sex` enum('Male','Female','Non-binary') DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `contactNo` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `maritalStatus` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `prcNo` varchar(50) DEFAULT NULL,
  `prcValidity` date DEFAULT NULL,
  `healthPermit` varchar(50) DEFAULT NULL,
  `permitValidity` date DEFAULT NULL,
  `empID` varchar(5) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `reasonTermination` varchar(255) DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `pepScore` decimal(10,2) DEFAULT NULL,
  `periodCovered` year(4) DEFAULT NULL,
  `infraction` varchar(255) DEFAULT NULL,
  `pagibigNo` varchar(50) DEFAULT NULL,
  `sssNo` varchar(50) DEFAULT NULL,
  `philhealthNo` varchar(50) DEFAULT NULL,
  `tin` varchar(50) DEFAULT NULL,
  `emergencyPersonFirst` varchar(100) DEFAULT NULL,
  `emergencyPersonMiddle` varchar(100) DEFAULT NULL,
  `emergencyPersonLast` varchar(100) DEFAULT NULL,
  `emergencyAddress` text DEFAULT NULL,
  `emergencyContact` varchar(20) DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `employmentPositions` varchar(255) DEFAULT NULL,
  `lengthExp` varchar(255) DEFAULT NULL,
  `movementType` varchar(1000) DEFAULT NULL,
  `effectiveDate` varchar(1000) DEFAULT NULL,
  `percentageMere` varchar(255) DEFAULT NULL,
  `positionFrom` varchar(255) DEFAULT NULL,
  `positionTo` varchar(255) DEFAULT NULL,
  `statusFrom` varchar(255) DEFAULT NULL,
  `statusTo` varchar(255) DEFAULT NULL,
  `deptFrom` varchar(255) DEFAULT NULL,
  `deptTo` varchar(255) DEFAULT NULL,
  `joblevelFrom` varchar(255) DEFAULT NULL,
  `joblevelTo` varchar(255) DEFAULT NULL,
  `grosspayFrom` varchar(1000) DEFAULT NULL,
  `grosspayTo` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ancillary_emp`
--

CREATE TABLE `ancillary_emp` (
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) NOT NULL,
  `fullName` varchar(255) GENERATED ALWAYS AS (concat(`firstName`,' ',`middleName`,' ',`lastName`)) STORED,
  `position` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `sex` enum('Male','Female','Non-binary') DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `contactNo` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `maritalStatus` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `prcNo` varchar(50) DEFAULT NULL,
  `prcValidity` date DEFAULT NULL,
  `healthPermit` varchar(50) DEFAULT NULL,
  `permitValidity` date DEFAULT NULL,
  `empID` varchar(5) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `reasonTermination` varchar(255) DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `pepScore` decimal(10,2) DEFAULT NULL,
  `periodCovered` year(4) DEFAULT NULL,
  `infraction` varchar(255) DEFAULT NULL,
  `pagibigNo` varchar(50) DEFAULT NULL,
  `sssNo` varchar(50) DEFAULT NULL,
  `philhealthNo` varchar(50) DEFAULT NULL,
  `tin` varchar(50) DEFAULT NULL,
  `emergencyPersonFirst` varchar(100) DEFAULT NULL,
  `emergencyPersonMiddle` varchar(100) DEFAULT NULL,
  `emergencyPersonLast` varchar(100) DEFAULT NULL,
  `emergencyAddress` text DEFAULT NULL,
  `emergencyContact` varchar(20) DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `employmentPositions` varchar(255) DEFAULT NULL,
  `lengthExp` varchar(255) DEFAULT NULL,
  `movementType` varchar(1000) DEFAULT NULL,
  `effectiveDate` varchar(1000) DEFAULT NULL,
  `percentageMere` varchar(255) DEFAULT NULL,
  `positionFrom` varchar(255) DEFAULT NULL,
  `positionTo` varchar(255) DEFAULT NULL,
  `statusFrom` varchar(255) DEFAULT NULL,
  `statusTo` varchar(255) DEFAULT NULL,
  `deptFrom` varchar(255) DEFAULT NULL,
  `deptTo` varchar(255) DEFAULT NULL,
  `joblevelFrom` varchar(255) DEFAULT NULL,
  `joblevelTo` varchar(255) DEFAULT NULL,
  `grosspayFrom` varchar(1000) DEFAULT NULL,
  `grosspayTo` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ancillary_emp`
--

INSERT INTO `ancillary_emp` (`firstName`, `middleName`, `lastName`, `position`, `type`, `startDate`, `status`, `sex`, `birthdate`, `contactNo`, `email`, `address`, `maritalStatus`, `religion`, `nationality`, `prcNo`, `prcValidity`, `healthPermit`, `permitValidity`, `empID`, `department`, `reasonTermination`, `endDate`, `salary`, `pepScore`, `periodCovered`, `infraction`, `pagibigNo`, `sssNo`, `philhealthNo`, `tin`, `emergencyPersonFirst`, `emergencyPersonMiddle`, `emergencyPersonLast`, `emergencyAddress`, `emergencyContact`, `companyName`, `employmentPositions`, `lengthExp`, `movementType`, `effectiveDate`, `percentageMere`, `positionFrom`, `positionTo`, `statusFrom`, `statusTo`, `deptFrom`, `deptTo`, `joblevelFrom`, `joblevelTo`, `grosspayFrom`, `grosspayTo`) VALUES
('Jherico', 'Zapate', 'Garcia', 'hr', 'regular', '2025-02-26', 'inactive', 'Male', '2003-02-04', '09399581709', 'jhericog@gmail.com', 'Laon laan', 'Single', 'inc', 'filipino', '', '0000-00-00', 'No', '0000-00-00', '11111', 'Human Resources', '', '0000-00-00', 10000.00, 4.00, '2025', '1', '4324324', '4343', '', '3453', 'Mary Jane', 'Havana', 'Broniola', 'Sta. Ana', '09336262842', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `clinic_emp`
--

CREATE TABLE `clinic_emp` (
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) NOT NULL,
  `fullName` varchar(255) GENERATED ALWAYS AS (concat(`firstName`,' ',`middleName`,' ',`lastName`)) STORED,
  `position` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `sex` enum('Male','Female','Non-binary') DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `contactNo` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `maritalStatus` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `prcNo` varchar(50) DEFAULT NULL,
  `prcValidity` date DEFAULT NULL,
  `healthPermit` varchar(50) DEFAULT NULL,
  `permitValidity` date DEFAULT NULL,
  `empID` varchar(5) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `reasonTermination` varchar(255) DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `pepScore` decimal(10,2) DEFAULT NULL,
  `periodCovered` year(4) DEFAULT NULL,
  `infraction` varchar(255) DEFAULT NULL,
  `pagibigNo` varchar(50) DEFAULT NULL,
  `sssNo` varchar(50) DEFAULT NULL,
  `philhealthNo` varchar(50) DEFAULT NULL,
  `tin` varchar(50) DEFAULT NULL,
  `emergencyPersonFirst` varchar(100) DEFAULT NULL,
  `emergencyPersonMiddle` varchar(100) DEFAULT NULL,
  `emergencyPersonLast` varchar(100) DEFAULT NULL,
  `emergencyAddress` text DEFAULT NULL,
  `emergencyContact` varchar(20) DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `employmentPositions` varchar(255) DEFAULT NULL,
  `lengthExp` varchar(255) DEFAULT NULL,
  `movementType` varchar(1000) DEFAULT NULL,
  `effectiveDate` varchar(1000) DEFAULT NULL,
  `percentageMere` varchar(255) DEFAULT NULL,
  `positionFrom` varchar(255) DEFAULT NULL,
  `positionTo` varchar(255) DEFAULT NULL,
  `statusFrom` varchar(255) DEFAULT NULL,
  `statusTo` varchar(255) DEFAULT NULL,
  `deptFrom` varchar(255) DEFAULT NULL,
  `deptTo` varchar(255) DEFAULT NULL,
  `joblevelFrom` varchar(255) DEFAULT NULL,
  `joblevelTo` varchar(255) DEFAULT NULL,
  `grosspayFrom` varchar(1000) DEFAULT NULL,
  `grosspayTo` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clinic_emp`
--

INSERT INTO `clinic_emp` (`firstName`, `middleName`, `lastName`, `position`, `type`, `startDate`, `status`, `sex`, `birthdate`, `contactNo`, `email`, `address`, `maritalStatus`, `religion`, `nationality`, `prcNo`, `prcValidity`, `healthPermit`, `permitValidity`, `empID`, `department`, `reasonTermination`, `endDate`, `salary`, `pepScore`, `periodCovered`, `infraction`, `pagibigNo`, `sssNo`, `philhealthNo`, `tin`, `emergencyPersonFirst`, `emergencyPersonMiddle`, `emergencyPersonLast`, `emergencyAddress`, `emergencyContact`, `companyName`, `employmentPositions`, `lengthExp`, `movementType`, `effectiveDate`, `percentageMere`, `positionFrom`, `positionTo`, `statusFrom`, `statusTo`, `deptFrom`, `deptTo`, `joblevelFrom`, `joblevelTo`, `grosspayFrom`, `grosspayTo`) VALUES
('bini', 'hsjajhdj', 'hjdhsajhdj', 'iduahwuda', 'consultant', '2025-03-02', 'active', 'Non-binary', '2025-03-03', '09399581709', 'jan@gmail.com', 'Sta. Ana', 'Single', 'Roman Catholic', 'filipino', '', '0000-00-00', 'No', '0000-00-00', '44444', 'Human Resources', 'tamadsjhdashdsa', '0000-00-00', 0.00, 0.00, '0000', '', '', '', '', '', 'Mary Jane', 'Havana', 'Broniola', 'Sta. Ana', '09336262842', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_emp`
--

CREATE TABLE `customer_emp` (
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) NOT NULL,
  `fullName` varchar(255) GENERATED ALWAYS AS (concat(`firstName`,' ',`middleName`,' ',`lastName`)) STORED,
  `position` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `sex` enum('Male','Female','Non-binary') DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `contactNo` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `maritalStatus` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `prcNo` varchar(50) DEFAULT NULL,
  `prcValidity` date DEFAULT NULL,
  `healthPermit` varchar(50) DEFAULT NULL,
  `permitValidity` date DEFAULT NULL,
  `empID` varchar(5) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `reasonTermination` varchar(255) DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `pepScore` decimal(10,2) DEFAULT NULL,
  `periodCovered` year(4) DEFAULT NULL,
  `infraction` varchar(255) DEFAULT NULL,
  `pagibigNo` varchar(50) DEFAULT NULL,
  `sssNo` varchar(50) DEFAULT NULL,
  `philhealthNo` varchar(50) DEFAULT NULL,
  `tin` varchar(50) DEFAULT NULL,
  `emergencyPersonFirst` varchar(100) DEFAULT NULL,
  `emergencyPersonMiddle` varchar(100) DEFAULT NULL,
  `emergencyPersonLast` varchar(100) DEFAULT NULL,
  `emergencyAddress` text DEFAULT NULL,
  `emergencyContact` varchar(20) DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `employmentPositions` varchar(255) DEFAULT NULL,
  `lengthExp` varchar(255) DEFAULT NULL,
  `movementType` varchar(1000) DEFAULT NULL,
  `effectiveDate` varchar(1000) DEFAULT NULL,
  `percentageMere` varchar(255) DEFAULT NULL,
  `positionFrom` varchar(255) DEFAULT NULL,
  `positionTo` varchar(255) DEFAULT NULL,
  `statusFrom` varchar(255) DEFAULT NULL,
  `statusTo` varchar(255) DEFAULT NULL,
  `deptFrom` varchar(255) DEFAULT NULL,
  `deptTo` varchar(255) DEFAULT NULL,
  `joblevelFrom` varchar(255) DEFAULT NULL,
  `joblevelTo` varchar(255) DEFAULT NULL,
  `grosspayFrom` varchar(1000) DEFAULT NULL,
  `grosspayTo` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_emp`
--

INSERT INTO `customer_emp` (`firstName`, `middleName`, `lastName`, `position`, `type`, `startDate`, `status`, `sex`, `birthdate`, `contactNo`, `email`, `address`, `maritalStatus`, `religion`, `nationality`, `prcNo`, `prcValidity`, `healthPermit`, `permitValidity`, `empID`, `department`, `reasonTermination`, `endDate`, `salary`, `pepScore`, `periodCovered`, `infraction`, `pagibigNo`, `sssNo`, `philhealthNo`, `tin`, `emergencyPersonFirst`, `emergencyPersonMiddle`, `emergencyPersonLast`, `emergencyAddress`, `emergencyContact`, `companyName`, `employmentPositions`, `lengthExp`, `movementType`, `effectiveDate`, `percentageMere`, `positionFrom`, `positionTo`, `statusFrom`, `statusTo`, `deptFrom`, `deptTo`, `joblevelFrom`, `joblevelTo`, `grosspayFrom`, `grosspayTo`) VALUES
('bini', 'hsjajhdj', 'hjdhsajhdj', 'iduahwuda', 'oncall', '2025-03-11', 'terminated', 'Male', '2025-02-23', '09399581709', 'jan@gmail.com', 'Sta. Ana', 'Single', 'Roman Catholic', 'filipino', '', '0000-00-00', 'No', '0000-00-00', '44444', 'Human Resources', 'Tardiness', '0000-00-00', 0.00, 0.00, '0000', '', '', '', '', '', 'Mary Jane', 'Havana', 'Broniola', 'Sta. Ana', '09336262842', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `finance_emp`
--

CREATE TABLE `finance_emp` (
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) NOT NULL,
  `fullName` varchar(255) GENERATED ALWAYS AS (concat(`firstName`,' ',`middleName`,' ',`lastName`)) STORED,
  `position` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `sex` enum('Male','Female','Non-binary') DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `contactNo` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `maritalStatus` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `prcNo` varchar(50) DEFAULT NULL,
  `prcValidity` date DEFAULT NULL,
  `healthPermit` varchar(50) DEFAULT NULL,
  `permitValidity` date DEFAULT NULL,
  `empID` varchar(5) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `reasonTermination` varchar(255) DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `pepScore` decimal(10,2) DEFAULT NULL,
  `periodCovered` year(4) DEFAULT NULL,
  `infraction` varchar(255) DEFAULT NULL,
  `pagibigNo` varchar(50) DEFAULT NULL,
  `sssNo` varchar(50) DEFAULT NULL,
  `philhealthNo` varchar(50) DEFAULT NULL,
  `tin` varchar(50) DEFAULT NULL,
  `emergencyPersonFirst` varchar(100) DEFAULT NULL,
  `emergencyPersonMiddle` varchar(100) DEFAULT NULL,
  `emergencyPersonLast` varchar(100) DEFAULT NULL,
  `emergencyAddress` text DEFAULT NULL,
  `emergencyContact` varchar(20) DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `employmentPositions` varchar(255) DEFAULT NULL,
  `lengthExp` varchar(255) DEFAULT NULL,
  `movementType` varchar(1000) DEFAULT NULL,
  `effectiveDate` varchar(1000) DEFAULT NULL,
  `percentageMere` varchar(255) DEFAULT NULL,
  `positionFrom` varchar(255) DEFAULT NULL,
  `positionTo` varchar(255) DEFAULT NULL,
  `statusFrom` varchar(255) DEFAULT NULL,
  `statusTo` varchar(255) DEFAULT NULL,
  `deptFrom` varchar(255) DEFAULT NULL,
  `deptTo` varchar(255) DEFAULT NULL,
  `joblevelFrom` varchar(255) DEFAULT NULL,
  `joblevelTo` varchar(255) DEFAULT NULL,
  `grosspayFrom` varchar(1000) DEFAULT NULL,
  `grosspayTo` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `finance_emp`
--

INSERT INTO `finance_emp` (`firstName`, `middleName`, `lastName`, `position`, `type`, `startDate`, `status`, `sex`, `birthdate`, `contactNo`, `email`, `address`, `maritalStatus`, `religion`, `nationality`, `prcNo`, `prcValidity`, `healthPermit`, `permitValidity`, `empID`, `department`, `reasonTermination`, `endDate`, `salary`, `pepScore`, `periodCovered`, `infraction`, `pagibigNo`, `sssNo`, `philhealthNo`, `tin`, `emergencyPersonFirst`, `emergencyPersonMiddle`, `emergencyPersonLast`, `emergencyAddress`, `emergencyContact`, `companyName`, `employmentPositions`, `lengthExp`, `movementType`, `effectiveDate`, `percentageMere`, `positionFrom`, `positionTo`, `statusFrom`, `statusTo`, `deptFrom`, `deptTo`, `joblevelFrom`, `joblevelTo`, `grosspayFrom`, `grosspayTo`) VALUES
('Aleyn', 'Zapate', 'Gonzales', 'Intern', 'ojt', '2025-03-14', 'inactive', 'Male', '2025-02-24', '09727255352', 'jhericog@gmail.com', 'Laon Laan', 'Single', 'Roman Catholic', 'filipino', '', '0000-00-00', 'No', '0000-00-00', '22153', 'Human Resources', '', '0000-00-00', 0.00, 5.00, '2025', '', '4324324', '45366', '34366436', '34345346', 'Aurora', 'Velasco', 'Nepomuceno', 'Tondo Manila', '09882882652', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('skye', 'broniola', 'alvaran', 'iduahwuda', 'fixed', '2025-03-04', 'active', 'Female', '2025-03-10', '09399581709', 'jan@gmail.com', 'Sta. Ana', 'Single', 'Roman Catholic', 'filipino', '', '0000-00-00', 'No', '0000-00-00', '44444', 'Human Resources', '', '0000-00-00', 0.00, 5.00, '2025', '', '', '', '', '', 'Sofia', 'Havana', 'Broniola', 'Sta. Ana', '09336262842', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_emp`
--

CREATE TABLE `hr_emp` (
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) NOT NULL,
  `fullName` varchar(255) GENERATED ALWAYS AS (concat(`firstName`,' ',`middleName`,' ',`lastName`)) STORED,
  `position` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `sex` enum('Male','Female','Non-binary') DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `contactNo` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `maritalStatus` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `prcNo` varchar(50) DEFAULT NULL,
  `prcValidity` date DEFAULT NULL,
  `healthPermit` varchar(50) DEFAULT NULL,
  `permitValidity` date DEFAULT NULL,
  `empID` varchar(5) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `reasonTermination` varchar(255) DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `pepScore` decimal(10,2) DEFAULT NULL,
  `periodCovered` year(4) DEFAULT NULL,
  `infraction` varchar(255) DEFAULT NULL,
  `pagibigNo` varchar(50) DEFAULT NULL,
  `sssNo` varchar(50) DEFAULT NULL,
  `philhealthNo` varchar(50) DEFAULT NULL,
  `tin` varchar(50) DEFAULT NULL,
  `emergencyPersonFirst` varchar(100) DEFAULT NULL,
  `emergencyPersonMiddle` varchar(100) DEFAULT NULL,
  `emergencyPersonLast` varchar(100) DEFAULT NULL,
  `emergencyAddress` text DEFAULT NULL,
  `emergencyContact` varchar(20) DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `employmentPositions` varchar(255) DEFAULT NULL,
  `lengthExp` varchar(255) DEFAULT NULL,
  `movementType` varchar(1000) DEFAULT NULL,
  `effectiveDate` varchar(1000) DEFAULT NULL,
  `percentageMere` varchar(255) DEFAULT NULL,
  `positionFrom` varchar(255) DEFAULT NULL,
  `positionTo` varchar(255) DEFAULT NULL,
  `statusFrom` varchar(255) DEFAULT NULL,
  `statusTo` varchar(255) DEFAULT NULL,
  `deptFrom` varchar(255) DEFAULT NULL,
  `deptTo` varchar(255) DEFAULT NULL,
  `joblevelFrom` varchar(255) DEFAULT NULL,
  `joblevelTo` varchar(255) DEFAULT NULL,
  `grosspayFrom` varchar(1000) DEFAULT NULL,
  `grosspayTo` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hr_emp`
--

INSERT INTO `hr_emp` (`firstName`, `middleName`, `lastName`, `position`, `type`, `startDate`, `status`, `sex`, `birthdate`, `contactNo`, `email`, `address`, `maritalStatus`, `religion`, `nationality`, `prcNo`, `prcValidity`, `healthPermit`, `permitValidity`, `empID`, `department`, `reasonTermination`, `endDate`, `salary`, `pepScore`, `periodCovered`, `infraction`, `pagibigNo`, `sssNo`, `philhealthNo`, `tin`, `emergencyPersonFirst`, `emergencyPersonMiddle`, `emergencyPersonLast`, `emergencyAddress`, `emergencyContact`, `companyName`, `employmentPositions`, `lengthExp`, `movementType`, `effectiveDate`, `percentageMere`, `positionFrom`, `positionTo`, `statusFrom`, `statusTo`, `deptFrom`, `deptTo`, `joblevelFrom`, `joblevelTo`, `grosspayFrom`, `grosspayTo`) VALUES
('Alaine', 'Nepomuceno', 'Gonzales', 'Intern', 'ojt', '2025-02-03', 'active', 'Female', '2002-12-31', '09283726322', 'alainegonzales00@gmail.com', 'Tondo Manila', 'Married', 'Roman Catholic', 'filipino', '', '0000-00-00', 'No', '0000-00-00', '21221', 'Human Resources', '', '2025-12-05', 0.00, 5.00, '2025', '', '', '', '', '', 'Aurora', 'Velasco', 'Nepomuceno', 'Tondo Manila', '09882882652', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('Aleyn', 'Zapate', 'Gonzales', 'Intern', 'ojt', '2025-03-22', 'inactive', 'Male', '2025-02-24', '09727255352', 'jhericog@gmail.com', 'Laon Laan', 'Single', 'Roman Catholic', 'filipino', '', '0000-00-00', 'No', '0000-00-00', '22153', 'Human Resources', '', '0000-00-00', 0.00, 5.00, '2025', '', '4324324', '45366', '34366436', '34345346', 'Aurora', 'Velasco', 'Nepomuceno', 'Tondo Manila', '09882882652', 'Cafe', 'Barista', '3 months<br><br><b>Date Added: 2025-03-18 16:31:42</b></br>', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('Sofia', 'Buenaflor', 'Broniiola', 'Intern', 'ojt', '2025-02-03', 'active', 'Female', '2003-06-07', '09451971511', 'sbbroniola@gmail.com', 'Pilar Estate St. Sta. Ana Manila', 'Single', 'Roman Catholic', 'filipino', '', '0000-00-00', 'No', '0000-00-00', '22159', 'Human Resources', '', '2025-05-13', 10000.00, 5.00, '2025', '1', '4324324', '4343', '', '3453', 'Mary Jane', 'Buenaflor', 'Broniola', 'Pilar Estate St. Sta. Ana Manila', '09056148404', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `imaging_emp`
--

CREATE TABLE `imaging_emp` (
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) NOT NULL,
  `fullName` varchar(255) GENERATED ALWAYS AS (concat(`firstName`,' ',`middleName`,' ',`lastName`)) STORED,
  `position` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `sex` enum('Male','Female','Non-binary') DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `contactNo` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `maritalStatus` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `prcNo` varchar(50) DEFAULT NULL,
  `prcValidity` date DEFAULT NULL,
  `healthPermit` varchar(50) DEFAULT NULL,
  `permitValidity` date DEFAULT NULL,
  `empID` varchar(5) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `reasonTermination` varchar(255) DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `pepScore` decimal(10,2) DEFAULT NULL,
  `periodCovered` year(4) DEFAULT NULL,
  `infraction` varchar(255) DEFAULT NULL,
  `pagibigNo` varchar(50) DEFAULT NULL,
  `sssNo` varchar(50) DEFAULT NULL,
  `philhealthNo` varchar(50) DEFAULT NULL,
  `tin` varchar(50) DEFAULT NULL,
  `emergencyPersonFirst` varchar(100) DEFAULT NULL,
  `emergencyPersonMiddle` varchar(100) DEFAULT NULL,
  `emergencyPersonLast` varchar(100) DEFAULT NULL,
  `emergencyAddress` text DEFAULT NULL,
  `emergencyContact` varchar(20) DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `employmentPositions` varchar(255) DEFAULT NULL,
  `lengthExp` varchar(255) DEFAULT NULL,
  `movementType` varchar(1000) DEFAULT NULL,
  `effectiveDate` varchar(1000) DEFAULT NULL,
  `percentageMere` varchar(255) DEFAULT NULL,
  `positionFrom` varchar(255) DEFAULT NULL,
  `positionTo` varchar(255) DEFAULT NULL,
  `statusFrom` varchar(255) DEFAULT NULL,
  `statusTo` varchar(255) DEFAULT NULL,
  `deptFrom` varchar(255) DEFAULT NULL,
  `deptTo` varchar(255) DEFAULT NULL,
  `joblevelFrom` varchar(255) DEFAULT NULL,
  `joblevelTo` varchar(255) DEFAULT NULL,
  `grosspayFrom` varchar(1000) DEFAULT NULL,
  `grosspayTo` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `imaging_emp`
--

INSERT INTO `imaging_emp` (`firstName`, `middleName`, `lastName`, `position`, `type`, `startDate`, `status`, `sex`, `birthdate`, `contactNo`, `email`, `address`, `maritalStatus`, `religion`, `nationality`, `prcNo`, `prcValidity`, `healthPermit`, `permitValidity`, `empID`, `department`, `reasonTermination`, `endDate`, `salary`, `pepScore`, `periodCovered`, `infraction`, `pagibigNo`, `sssNo`, `philhealthNo`, `tin`, `emergencyPersonFirst`, `emergencyPersonMiddle`, `emergencyPersonLast`, `emergencyAddress`, `emergencyContact`, `companyName`, `employmentPositions`, `lengthExp`, `movementType`, `effectiveDate`, `percentageMere`, `positionFrom`, `positionTo`, `statusFrom`, `statusTo`, `deptFrom`, `deptTo`, `joblevelFrom`, `joblevelTo`, `grosspayFrom`, `grosspayTo`) VALUES
('Jherico', 'Zapate', 'Garcia', 'awishhwdhadh', 'consultant', '2025-03-19', 'inactive', 'Male', '2025-03-02', '09399581709', 'jhericog@gmail.com', 'Laon laan', 'Single', 'inc', 'filipino', '', '0000-00-00', 'No', '0000-00-00', '11111', 'Human Resources', 'fasafa', '0000-00-00', 10000.00, 4.00, '2025', '1', '4324324', '4343', '', '3453', 'Mary Jane', 'Havana', 'Broniola', 'Sta. Ana', '09336262842', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laboratory_emp`
--

CREATE TABLE `laboratory_emp` (
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) NOT NULL,
  `fullName` varchar(255) GENERATED ALWAYS AS (concat(`firstName`,' ',`middleName`,' ',`lastName`)) STORED,
  `position` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `sex` enum('Male','Female','Non-binary') DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `contactNo` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `maritalStatus` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `prcNo` varchar(50) DEFAULT NULL,
  `prcValidity` date DEFAULT NULL,
  `healthPermit` varchar(50) DEFAULT NULL,
  `permitValidity` date DEFAULT NULL,
  `empID` varchar(5) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `reasonTermination` varchar(255) DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `pepScore` decimal(10,2) DEFAULT NULL,
  `periodCovered` year(4) DEFAULT NULL,
  `infraction` varchar(255) DEFAULT NULL,
  `pagibigNo` varchar(50) DEFAULT NULL,
  `sssNo` varchar(50) DEFAULT NULL,
  `philhealthNo` varchar(50) DEFAULT NULL,
  `tin` varchar(50) DEFAULT NULL,
  `emergencyPersonFirst` varchar(100) DEFAULT NULL,
  `emergencyPersonMiddle` varchar(100) DEFAULT NULL,
  `emergencyPersonLast` varchar(100) DEFAULT NULL,
  `emergencyAddress` text DEFAULT NULL,
  `emergencyContact` varchar(20) DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `employmentPositions` varchar(255) DEFAULT NULL,
  `lengthExp` varchar(255) DEFAULT NULL,
  `movementType` varchar(1000) DEFAULT NULL,
  `effectiveDate` varchar(1000) DEFAULT NULL,
  `percentageMere` varchar(255) DEFAULT NULL,
  `positionFrom` varchar(255) DEFAULT NULL,
  `positionTo` varchar(255) DEFAULT NULL,
  `statusFrom` varchar(255) DEFAULT NULL,
  `statusTo` varchar(255) DEFAULT NULL,
  `deptFrom` varchar(255) DEFAULT NULL,
  `deptTo` varchar(255) DEFAULT NULL,
  `joblevelFrom` varchar(255) DEFAULT NULL,
  `joblevelTo` varchar(255) DEFAULT NULL,
  `grosspayFrom` varchar(1000) DEFAULT NULL,
  `grosspayTo` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laboratory_emp`
--

INSERT INTO `laboratory_emp` (`firstName`, `middleName`, `lastName`, `position`, `type`, `startDate`, `status`, `sex`, `birthdate`, `contactNo`, `email`, `address`, `maritalStatus`, `religion`, `nationality`, `prcNo`, `prcValidity`, `healthPermit`, `permitValidity`, `empID`, `department`, `reasonTermination`, `endDate`, `salary`, `pepScore`, `periodCovered`, `infraction`, `pagibigNo`, `sssNo`, `philhealthNo`, `tin`, `emergencyPersonFirst`, `emergencyPersonMiddle`, `emergencyPersonLast`, `emergencyAddress`, `emergencyContact`, `companyName`, `employmentPositions`, `lengthExp`, `movementType`, `effectiveDate`, `percentageMere`, `positionFrom`, `positionTo`, `statusFrom`, `statusTo`, `deptFrom`, `deptTo`, `joblevelFrom`, `joblevelTo`, `grosspayFrom`, `grosspayTo`) VALUES
('Jherico', 'Zapate', 'Garcia', 'awishhwdhadh', 'regular', '2025-02-23', 'terminated', 'Non-binary', '2025-03-03', '09399581709', 'jhericog@gmail.com', 'Laon laan', 'Single', 'inc', 'filipino', '', '0000-00-00', 'No', '0000-00-00', '11111', 'Human Resources', 'fasafa', '0000-00-00', 10000.00, 4.00, '2025', '1', '4324324', '4343', '', '3453', 'Mary Jane', 'Havana', 'Broniola', 'Sta. Ana', '09336262842', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `medical_emp`
--

CREATE TABLE `medical_emp` (
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) NOT NULL,
  `fullName` varchar(255) GENERATED ALWAYS AS (concat(`firstName`,' ',`middleName`,' ',`lastName`)) STORED,
  `position` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `sex` enum('Male','Female','Non-binary') DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `contactNo` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `maritalStatus` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `prcNo` varchar(50) DEFAULT NULL,
  `prcValidity` date DEFAULT NULL,
  `healthPermit` varchar(50) DEFAULT NULL,
  `permitValidity` date DEFAULT NULL,
  `empID` varchar(5) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `reasonTermination` varchar(255) DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `pepScore` decimal(10,2) DEFAULT NULL,
  `periodCovered` year(4) DEFAULT NULL,
  `infraction` varchar(255) DEFAULT NULL,
  `pagibigNo` varchar(50) DEFAULT NULL,
  `sssNo` varchar(50) DEFAULT NULL,
  `philhealthNo` varchar(50) DEFAULT NULL,
  `tin` varchar(50) DEFAULT NULL,
  `emergencyPersonFirst` varchar(100) DEFAULT NULL,
  `emergencyPersonMiddle` varchar(100) DEFAULT NULL,
  `emergencyPersonLast` varchar(100) DEFAULT NULL,
  `emergencyAddress` text DEFAULT NULL,
  `emergencyContact` varchar(20) DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `employmentPositions` varchar(255) DEFAULT NULL,
  `lengthExp` varchar(255) DEFAULT NULL,
  `movementType` varchar(1000) DEFAULT NULL,
  `effectiveDate` varchar(1000) DEFAULT NULL,
  `percentageMere` varchar(255) DEFAULT NULL,
  `positionFrom` varchar(255) DEFAULT NULL,
  `positionTo` varchar(255) DEFAULT NULL,
  `statusFrom` varchar(255) DEFAULT NULL,
  `statusTo` varchar(255) DEFAULT NULL,
  `deptFrom` varchar(255) DEFAULT NULL,
  `deptTo` varchar(255) DEFAULT NULL,
  `joblevelFrom` varchar(255) DEFAULT NULL,
  `joblevelTo` varchar(255) DEFAULT NULL,
  `grosspayFrom` varchar(1000) DEFAULT NULL,
  `grosspayTo` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nursing_emp`
--

CREATE TABLE `nursing_emp` (
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) NOT NULL,
  `fullName` varchar(255) GENERATED ALWAYS AS (concat(`firstName`,' ',`middleName`,' ',`lastName`)) STORED,
  `position` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `sex` enum('Male','Female','Non-binary') DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `contactNo` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `maritalStatus` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `prcNo` varchar(50) DEFAULT NULL,
  `prcValidity` date DEFAULT NULL,
  `healthPermit` varchar(50) DEFAULT NULL,
  `permitValidity` date DEFAULT NULL,
  `empID` varchar(5) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `reasonTermination` varchar(255) DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `pepScore` decimal(10,2) DEFAULT NULL,
  `periodCovered` year(4) DEFAULT NULL,
  `infraction` varchar(255) DEFAULT NULL,
  `pagibigNo` varchar(50) DEFAULT NULL,
  `sssNo` varchar(50) DEFAULT NULL,
  `philhealthNo` varchar(50) DEFAULT NULL,
  `tin` varchar(50) DEFAULT NULL,
  `emergencyPersonFirst` varchar(100) DEFAULT NULL,
  `emergencyPersonMiddle` varchar(100) DEFAULT NULL,
  `emergencyPersonLast` varchar(100) DEFAULT NULL,
  `emergencyAddress` text DEFAULT NULL,
  `emergencyContact` varchar(20) DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `employmentPositions` varchar(255) DEFAULT NULL,
  `lengthExp` varchar(255) DEFAULT NULL,
  `movementType` varchar(1000) DEFAULT NULL,
  `effectiveDate` varchar(1000) DEFAULT NULL,
  `percentageMere` varchar(255) DEFAULT NULL,
  `positionFrom` varchar(255) DEFAULT NULL,
  `positionTo` varchar(255) DEFAULT NULL,
  `statusFrom` varchar(255) DEFAULT NULL,
  `statusTo` varchar(255) DEFAULT NULL,
  `deptFrom` varchar(255) DEFAULT NULL,
  `deptTo` varchar(255) DEFAULT NULL,
  `joblevelFrom` varchar(255) DEFAULT NULL,
  `joblevelTo` varchar(255) DEFAULT NULL,
  `grosspayFrom` varchar(1000) DEFAULT NULL,
  `grosspayTo` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `psychometry_emp`
--

CREATE TABLE `psychometry_emp` (
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) NOT NULL,
  `fullName` varchar(255) GENERATED ALWAYS AS (concat(`firstName`,' ',`middleName`,' ',`lastName`)) STORED,
  `position` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `sex` enum('Male','Female','Non-binary') DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `contactNo` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `maritalStatus` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `prcNo` varchar(50) DEFAULT NULL,
  `prcValidity` date DEFAULT NULL,
  `healthPermit` varchar(50) DEFAULT NULL,
  `permitValidity` date DEFAULT NULL,
  `empID` varchar(5) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `reasonTermination` varchar(255) DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `pepScore` decimal(10,2) DEFAULT NULL,
  `periodCovered` year(4) DEFAULT NULL,
  `infraction` varchar(255) DEFAULT NULL,
  `pagibigNo` varchar(50) DEFAULT NULL,
  `sssNo` varchar(50) DEFAULT NULL,
  `philhealthNo` varchar(50) DEFAULT NULL,
  `tin` varchar(50) DEFAULT NULL,
  `emergencyPersonFirst` varchar(100) DEFAULT NULL,
  `emergencyPersonMiddle` varchar(100) DEFAULT NULL,
  `emergencyPersonLast` varchar(100) DEFAULT NULL,
  `emergencyAddress` text DEFAULT NULL,
  `emergencyContact` varchar(20) DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `employmentPositions` varchar(255) DEFAULT NULL,
  `lengthExp` varchar(255) DEFAULT NULL,
  `movementType` varchar(1000) DEFAULT NULL,
  `effectiveDate` varchar(1000) DEFAULT NULL,
  `percentageMere` varchar(255) DEFAULT NULL,
  `positionFrom` varchar(255) DEFAULT NULL,
  `positionTo` varchar(255) DEFAULT NULL,
  `statusFrom` varchar(255) DEFAULT NULL,
  `statusTo` varchar(255) DEFAULT NULL,
  `deptFrom` varchar(255) DEFAULT NULL,
  `deptTo` varchar(255) DEFAULT NULL,
  `joblevelFrom` varchar(255) DEFAULT NULL,
  `joblevelTo` varchar(255) DEFAULT NULL,
  `grosspayFrom` varchar(1000) DEFAULT NULL,
  `grosspayTo` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `records_emp`
--

CREATE TABLE `records_emp` (
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) NOT NULL,
  `fullName` varchar(255) GENERATED ALWAYS AS (concat(`firstName`,' ',`middleName`,' ',`lastName`)) STORED,
  `position` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `sex` enum('Male','Female','Non-binary') DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `contactNo` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `maritalStatus` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `prcNo` varchar(50) DEFAULT NULL,
  `prcValidity` date DEFAULT NULL,
  `healthPermit` varchar(50) DEFAULT NULL,
  `permitValidity` date DEFAULT NULL,
  `empID` varchar(5) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `reasonTermination` varchar(255) DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `pepScore` decimal(10,2) DEFAULT NULL,
  `periodCovered` year(4) DEFAULT NULL,
  `infraction` varchar(255) DEFAULT NULL,
  `pagibigNo` varchar(50) DEFAULT NULL,
  `sssNo` varchar(50) DEFAULT NULL,
  `philhealthNo` varchar(50) DEFAULT NULL,
  `tin` varchar(50) DEFAULT NULL,
  `emergencyPersonFirst` varchar(100) DEFAULT NULL,
  `emergencyPersonMiddle` varchar(100) DEFAULT NULL,
  `emergencyPersonLast` varchar(100) DEFAULT NULL,
  `emergencyAddress` text DEFAULT NULL,
  `emergencyContact` varchar(20) DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `employmentPositions` varchar(255) DEFAULT NULL,
  `lengthExp` varchar(255) DEFAULT NULL,
  `movementType` varchar(1000) DEFAULT NULL,
  `effectiveDate` varchar(1000) DEFAULT NULL,
  `percentageMere` varchar(255) DEFAULT NULL,
  `positionFrom` varchar(255) DEFAULT NULL,
  `positionTo` varchar(255) DEFAULT NULL,
  `statusFrom` varchar(255) DEFAULT NULL,
  `statusTo` varchar(255) DEFAULT NULL,
  `deptFrom` varchar(255) DEFAULT NULL,
  `deptTo` varchar(255) DEFAULT NULL,
  `joblevelFrom` varchar(255) DEFAULT NULL,
  `joblevelTo` varchar(255) DEFAULT NULL,
  `grosspayFrom` varchar(1000) DEFAULT NULL,
  `grosspayTo` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration_emp`
--

CREATE TABLE `registration_emp` (
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) NOT NULL,
  `fullName` varchar(255) GENERATED ALWAYS AS (concat(`firstName`,' ',`middleName`,' ',`lastName`)) STORED,
  `position` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `sex` enum('Male','Female','Non-binary') DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `contactNo` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `maritalStatus` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `prcNo` varchar(50) DEFAULT NULL,
  `prcValidity` date DEFAULT NULL,
  `healthPermit` varchar(50) DEFAULT NULL,
  `permitValidity` date DEFAULT NULL,
  `empID` varchar(5) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `reasonTermination` varchar(255) DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `pepScore` decimal(10,2) DEFAULT NULL,
  `periodCovered` year(4) DEFAULT NULL,
  `infraction` varchar(255) DEFAULT NULL,
  `pagibigNo` varchar(50) DEFAULT NULL,
  `sssNo` varchar(50) DEFAULT NULL,
  `philhealthNo` varchar(50) DEFAULT NULL,
  `tin` varchar(50) DEFAULT NULL,
  `emergencyPersonFirst` varchar(100) DEFAULT NULL,
  `emergencyPersonMiddle` varchar(100) DEFAULT NULL,
  `emergencyPersonLast` varchar(100) DEFAULT NULL,
  `emergencyAddress` text DEFAULT NULL,
  `emergencyContact` varchar(20) DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `employmentPositions` varchar(255) DEFAULT NULL,
  `lengthExp` varchar(255) DEFAULT NULL,
  `movementType` varchar(1000) DEFAULT NULL,
  `effectiveDate` varchar(1000) DEFAULT NULL,
  `percentageMere` varchar(255) DEFAULT NULL,
  `positionFrom` varchar(255) DEFAULT NULL,
  `positionTo` varchar(255) DEFAULT NULL,
  `statusFrom` varchar(255) DEFAULT NULL,
  `statusTo` varchar(255) DEFAULT NULL,
  `deptFrom` varchar(255) DEFAULT NULL,
  `deptTo` varchar(255) DEFAULT NULL,
  `joblevelFrom` varchar(255) DEFAULT NULL,
  `joblevelTo` varchar(255) DEFAULT NULL,
  `grosspayFrom` varchar(1000) DEFAULT NULL,
  `grosspayTo` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_emp`
--

CREATE TABLE `sales_emp` (
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) NOT NULL,
  `fullName` varchar(255) GENERATED ALWAYS AS (concat(`firstName`,' ',`middleName`,' ',`lastName`)) STORED,
  `position` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `sex` enum('Male','Female','Non-binary') DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `contactNo` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `maritalStatus` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `prcNo` varchar(50) DEFAULT NULL,
  `prcValidity` date DEFAULT NULL,
  `healthPermit` varchar(50) DEFAULT NULL,
  `permitValidity` date DEFAULT NULL,
  `empID` varchar(5) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `reasonTermination` varchar(255) DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `pepScore` decimal(10,2) DEFAULT NULL,
  `periodCovered` year(4) DEFAULT NULL,
  `infraction` varchar(255) DEFAULT NULL,
  `pagibigNo` varchar(50) DEFAULT NULL,
  `sssNo` varchar(50) DEFAULT NULL,
  `philhealthNo` varchar(50) DEFAULT NULL,
  `tin` varchar(50) DEFAULT NULL,
  `emergencyPersonFirst` varchar(100) DEFAULT NULL,
  `emergencyPersonMiddle` varchar(100) DEFAULT NULL,
  `emergencyPersonLast` varchar(100) DEFAULT NULL,
  `emergencyAddress` text DEFAULT NULL,
  `emergencyContact` varchar(20) DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `employmentPositions` varchar(255) DEFAULT NULL,
  `lengthExp` varchar(255) DEFAULT NULL,
  `movementType` varchar(1000) DEFAULT NULL,
  `effectiveDate` varchar(1000) DEFAULT NULL,
  `percentageMere` varchar(255) DEFAULT NULL,
  `positionFrom` varchar(255) DEFAULT NULL,
  `positionTo` varchar(255) DEFAULT NULL,
  `statusFrom` varchar(255) DEFAULT NULL,
  `statusTo` varchar(255) DEFAULT NULL,
  `deptFrom` varchar(255) DEFAULT NULL,
  `deptTo` varchar(255) DEFAULT NULL,
  `joblevelFrom` varchar(255) DEFAULT NULL,
  `joblevelTo` varchar(255) DEFAULT NULL,
  `grosspayFrom` varchar(1000) DEFAULT NULL,
  `grosspayTo` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_emp`
--

INSERT INTO `sales_emp` (`firstName`, `middleName`, `lastName`, `position`, `type`, `startDate`, `status`, `sex`, `birthdate`, `contactNo`, `email`, `address`, `maritalStatus`, `religion`, `nationality`, `prcNo`, `prcValidity`, `healthPermit`, `permitValidity`, `empID`, `department`, `reasonTermination`, `endDate`, `salary`, `pepScore`, `periodCovered`, `infraction`, `pagibigNo`, `sssNo`, `philhealthNo`, `tin`, `emergencyPersonFirst`, `emergencyPersonMiddle`, `emergencyPersonLast`, `emergencyAddress`, `emergencyContact`, `companyName`, `employmentPositions`, `lengthExp`, `movementType`, `effectiveDate`, `percentageMere`, `positionFrom`, `positionTo`, `statusFrom`, `statusTo`, `deptFrom`, `deptTo`, `joblevelFrom`, `joblevelTo`, `grosspayFrom`, `grosspayTo`) VALUES
('kael', 'Zapate', 'Gonzales', 'Intern', 'ojt', '2025-03-03', 'inactive', 'Male', '2025-03-11', '09727255352', 'kael@gmail.com', 'Laon Laan', 'Single', 'Roman Catholic', 'filipino', '', '0000-00-00', 'No', '0000-00-00', '22222', 'Human Resources', '', '0000-00-00', 0.00, 5.00, '2025', '', '4324324', '45366', '34366436', '34345346', 'Aurora', 'Velasco', 'Nepomuceno', 'Tondo Manila', '09882882652', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_emp`
--
ALTER TABLE `admin_emp`
  ADD UNIQUE KEY `empID` (`empID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `ancillary_emp`
--
ALTER TABLE `ancillary_emp`
  ADD UNIQUE KEY `empID` (`empID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `clinic_emp`
--
ALTER TABLE `clinic_emp`
  ADD UNIQUE KEY `empID` (`empID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customer_emp`
--
ALTER TABLE `customer_emp`
  ADD UNIQUE KEY `empID` (`empID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `finance_emp`
--
ALTER TABLE `finance_emp`
  ADD UNIQUE KEY `empID` (`empID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `hr_emp`
--
ALTER TABLE `hr_emp`
  ADD UNIQUE KEY `empID` (`empID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `imaging_emp`
--
ALTER TABLE `imaging_emp`
  ADD UNIQUE KEY `empID` (`empID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `laboratory_emp`
--
ALTER TABLE `laboratory_emp`
  ADD UNIQUE KEY `empID` (`empID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `medical_emp`
--
ALTER TABLE `medical_emp`
  ADD UNIQUE KEY `empID` (`empID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `nursing_emp`
--
ALTER TABLE `nursing_emp`
  ADD UNIQUE KEY `empID` (`empID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `psychometry_emp`
--
ALTER TABLE `psychometry_emp`
  ADD UNIQUE KEY `empID` (`empID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `records_emp`
--
ALTER TABLE `records_emp`
  ADD UNIQUE KEY `empID` (`empID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `registration_emp`
--
ALTER TABLE `registration_emp`
  ADD UNIQUE KEY `empID` (`empID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `sales_emp`
--
ALTER TABLE `sales_emp`
  ADD UNIQUE KEY `empID` (`empID`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
