-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 06:39 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tfas`
--

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `TF_managerID` int(11) NOT NULL,
  `TF_managerUsername` varchar(255) NOT NULL,
  `TF_managerPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `SY_salaryID` int(11) NOT NULL,
  `SY_salaryRM` decimal(5,2) NOT NULL,
  `SY_salaryTimestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff_attendance`
--

CREATE TABLE `staff_attendance` (
  `SA_staffID` int(10) NOT NULL,
  `SA_staffName` varchar(255) NOT NULL,
  `SA_staffWorkshift` varchar(255) NOT NULL,
  `SA_staffAttendanceDate` date NOT NULL DEFAULT current_timestamp(),
  `SA_remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_attendance`
--

INSERT INTO `staff_attendance` (`SA_staffID`, `SA_staffName`, `SA_staffWorkshift`, `SA_staffAttendanceDate`, `SA_remark`) VALUES
(1, '  HARIHARAN A/L R.MOHAN', '8:30AM', '2022-06-27', 'NONE'),
(2, 'MEGALA A/P SONTULOM', '2:00PM', '2022-06-27', 'NONE');

-- --------------------------------------------------------

--
-- Table structure for table `staff_management`
--

CREATE TABLE `staff_management` (
  `SM_staffID` int(11) NOT NULL,
  `SM_staffName` varchar(255) NOT NULL,
  `SM_staffMatric` varchar(255) NOT NULL,
  `SM_staffIC` bigint(255) NOT NULL,
  `SM_staffPhoneNo` varchar(255) NOT NULL,
  `SM_staffGender` varchar(255) NOT NULL,
  `SM_staffEmail` varchar(255) NOT NULL,
  `SM_staffFaculty` varchar(255) NOT NULL,
  `SM_staffBankAccName` varchar(255) NOT NULL,
  `SM_staffBankAccNo` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_management`
--

INSERT INTO `staff_management` (`SM_staffID`, `SM_staffName`, `SM_staffMatric`, `SM_staffIC`, `SM_staffPhoneNo`, `SM_staffGender`, `SM_staffEmail`, `SM_staffFaculty`, `SM_staffBankAccName`, `SM_staffBankAccNo`) VALUES
(1, 'DARVIN RAJAKUMAR', 'B031910588', 960302015466, '01236362547', 'MALE', 'darvin32@gmail.com', 'FKP', 'OCBCBANK', 105074165641),
(2, 'HARIHARAN A/L R.MOHAN', 'B031910477', 981223016431, '0167023074', 'MALE', 'harryharan98@gmail.com', 'FTMK', 'MAYBANK', 105074195940),
(3, 'MEGALA A/P SONTULOM', 'B031910172', 960206085512, '01126408959', 'FEMALE', 'megalamega036@gmail.com', 'FTMK', 'PUBLICBANK', 123654852003),
(4, 'AHMAD AMIR BIN OTHMAN', 'B031910166', 950415045083, '01128695672', 'MALE', 'iniahmadamir@gmail.com', 'FTMK', 'BANKISLAM', 112203056987),
(5, 'NG YU XIAN', 'B031910312', 981129075355, '0105603231', 'MALE', 'ngyuyu@gmail.com', 'FTMK', 'CIMB', 123564478569),
(6, 'ZULAZRI BIN ZULKARNAIN', 'B031920005', 990103015543, '01133062575', 'MALE', 'zulazrizulkarnain@gmail.com', 'FTMK', 'MAYBANK', 154110332708);

-- --------------------------------------------------------

--
-- Table structure for table `staff_schedule`
--

CREATE TABLE `staff_schedule` (
  `SS_scheduleID` int(11) NOT NULL,
  `SS_scheduleWorkshift` varchar(255) NOT NULL,
  `SS_scheduleWorkersName` varchar(255) NOT NULL,
  `SS_scheduleWorkcell` char(255) NOT NULL,
  `SS_scheduleDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_schedule`
--

INSERT INTO `staff_schedule` (`SS_scheduleID`, `SS_scheduleWorkshift`, `SS_scheduleWorkersName`, `SS_scheduleWorkcell`, `SS_scheduleDate`) VALUES
(1, '8:30AM', 'HARIHARAN A/L R.MOHAN, MEGALA A/P SONTULOM', 'A', '2022-06-27'),
(2, '2:00PM', 'AHMAD AMIR BIN OTHMAN, NG YU XIAN, ZULAZRI BIN ZULKARNAIN', 'B', '2022-06-27'),
(3, '8:30AM', 'DARVIN RAJAKUMAR', 'D', '2022-06-27');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `TF_supervisorID` int(10) NOT NULL,
  `TF_supervisorUsername` varchar(255) NOT NULL,
  `TF_supervisorPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`TF_supervisorID`, `TF_supervisorUsername`, `TF_supervisorPassword`) VALUES
(1, 'test', 'test123');

-- --------------------------------------------------------

--
-- Table structure for table `tf_delivery_list`
--

CREATE TABLE `tf_delivery_list` (
  `TF_deliveryID` int(11) NOT NULL,
  `TF_deliveryName` varchar(255) NOT NULL,
  `TF_deliveryCode` bigint(255) NOT NULL,
  `TF_deliverytotalCarton` varchar(255) NOT NULL,
  `TF_deliverytotalproductionCarton` varchar(255) NOT NULL,
  `TF_deliverytotalproductionCard` varchar(255) NOT NULL,
  `TF_deliveryRemark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tf_delivery_list`
--

INSERT INTO `tf_delivery_list` (`TF_deliveryID`, `TF_deliveryName`, `TF_deliveryCode`, `TF_deliverytotalCarton`, `TF_deliverytotalproductionCarton`, `TF_deliverytotalproductionCard`, `TF_deliveryRemark`) VALUES
(1, 'STEEL NICKEL PLATED PINS WITH 4MM PINK PANTONE 674C', 10273890, '5', '5', '600', 'COMPLETED'),
(2, 'SEW-ON SNAP FASTENER 555 BRASS 6MM NICKEL', 13438060, '5', '5', '360', 'COMPLETED'),
(3, 'SEW-ON SNAP FASTENER 555 BRASS 11MM BLACK', 13433540, '9', '7', '2520', '2 CARTON NOT COMPLETE'),
(4, 'STEEL NICKEL PLATED PINS YELLOW COLOR BALL PIN', 10272040, '4', '4', '960', 'COMPLETED'),
(5, 'SEW-ON SNAP FASTENERS PRYM BRASS 13MM BLACK', 13411680, '4', '3', '1500', 'COMPLETED');

-- --------------------------------------------------------

--
-- Table structure for table `tf_product`
--

CREATE TABLE `tf_product` (
  `TF_prodID` int(11) NOT NULL,
  `TF_prodName` varchar(255) NOT NULL,
  `TF_prodCode` varchar(255) NOT NULL,
  `TF_prodQuantity` int(100) NOT NULL,
  `TF_prodType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tf_product`
--

INSERT INTO `tf_product` (`TF_prodID`, `TF_prodName`, `TF_prodCode`, `TF_prodQuantity`, `TF_prodType`) VALUES
(1, 'STEEL NICKEL PLATED PINS WITH 4MM PINK PLANTONE 674C', '6111736', 600, 'COLOUR BALL PIN'),
(2, 'SEW-ON SNAP FASTENER 555 BRASS 6MM NICKEL', '34804065', 1440, 'FASTENER'),
(3, 'SEW-ON SNAP FASTENER 555 BRASS 11MM BLACK', '348011', 2880, 'FASTENER'),
(4, 'STEEL NICKEL PLATED PINS YELLOW COLOR BALL', '61131Q', 960, 'COLOUR BALL PIN');

-- --------------------------------------------------------

--
-- Table structure for table `tf_reject_list`
--

CREATE TABLE `tf_reject_list` (
  `TF_rejectID` int(11) NOT NULL,
  `TF_rejectName` varchar(255) NOT NULL,
  `TF_rejectCode` bigint(255) NOT NULL,
  `TF_rejecttotalCarton` varchar(255) NOT NULL,
  `TF_rejectRemark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tf_reject_list`
--

INSERT INTO `tf_reject_list` (`TF_rejectID`, `TF_rejectName`, `TF_rejectCode`, `TF_rejecttotalCarton`, `TF_rejectRemark`) VALUES
(1, 'NICKEL PLATED STEEL SAFETY PINS CURVED 27MM', 10841510, '2', 'SHORT COUNT'),
(2, 'SEW-ON SNAP FASTENER PZ BRASS 15MM NICKEL PLATED', 13438080, '3', 'LACK OF CARDS'),
(3, 'STEEL NICKEL PLATED PINS YELLOW COLOR BALL 0.58 X 45MM', 10272040, '4', 'WRONG TAPE AND STAPLE'),
(4, 'STEEL NICKEL PLATED PINS WITH 4MM PINK PANTONE 674C 0.58 X 45MM', 10273890, '3', 'WRONG TAPE '),
(5, 'STEEL WHITE COLOUR BALL PINS 0.26 X 38MM', 10272000, '3', 'WRONG ARRANGE POSITION');

-- --------------------------------------------------------

--
-- Table structure for table `tf_return_list`
--

CREATE TABLE `tf_return_list` (
  `TF_returnID` int(11) NOT NULL,
  `TF_returnName` varchar(255) NOT NULL,
  `TF_returnCode` bigint(255) NOT NULL,
  `TF_returnRemark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tf_return_list`
--

INSERT INTO `tf_return_list` (`TF_returnID`, `TF_returnName`, `TF_returnCode`, `TF_returnRemark`) VALUES
(1, 'C11736NA DRITZ EXT LONG C. BALL PIN', 30335434, 'EXTRA CARDS'),
(2, '90M-DRITZ ½ DOZ OUTER- 300GM', 30322124, 'EXTRA OUTERS'),
(3, 'C80-1-65NE DRITZ SEW-ON SNAPS SZ 1', 30335464, 'MORE MATERIALS'),
(4, 'SP 6 CONSTRUCT BOTTOM GLUE-350', 30322113, 'EXTRA OUTERS'),
(5, 'L131QNA QUILTING PINS', 30320273, 'EXTRA PINS');

-- --------------------------------------------------------

--
-- Table structure for table `tf_swr`
--

CREATE TABLE `tf_swr` (
  `TF_swrID` int(11) NOT NULL,
  `TF_supervisorID` int(11) NOT NULL,
  `TF_prodID` int(11) NOT NULL,
  `TF_swrItemID` int(11) NOT NULL,
  `TF_swrItemDescription` varchar(255) NOT NULL,
  `TF_swrUnitMeasure` varchar(255) NOT NULL,
  `TF_swrItemQuantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `workcell`
--

CREATE TABLE `workcell` (
  `TF_workcellID` int(11) NOT NULL,
  `TF_workcellName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`TF_managerID`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`SY_salaryID`);

--
-- Indexes for table `staff_attendance`
--
ALTER TABLE `staff_attendance`
  ADD PRIMARY KEY (`SA_staffID`);

--
-- Indexes for table `staff_management`
--
ALTER TABLE `staff_management`
  ADD PRIMARY KEY (`SM_staffID`);

--
-- Indexes for table `staff_schedule`
--
ALTER TABLE `staff_schedule`
  ADD PRIMARY KEY (`SS_scheduleID`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`TF_supervisorID`);

--
-- Indexes for table `tf_delivery_list`
--
ALTER TABLE `tf_delivery_list`
  ADD PRIMARY KEY (`TF_deliveryID`);

--
-- Indexes for table `tf_product`
--
ALTER TABLE `tf_product`
  ADD PRIMARY KEY (`TF_prodID`);

--
-- Indexes for table `tf_reject_list`
--
ALTER TABLE `tf_reject_list`
  ADD PRIMARY KEY (`TF_rejectID`);

--
-- Indexes for table `tf_return_list`
--
ALTER TABLE `tf_return_list`
  ADD PRIMARY KEY (`TF_returnID`);

--
-- Indexes for table `tf_swr`
--
ALTER TABLE `tf_swr`
  ADD PRIMARY KEY (`TF_swrID`);

--
-- Indexes for table `workcell`
--
ALTER TABLE `workcell`
  ADD PRIMARY KEY (`TF_workcellID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `TF_managerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `SY_salaryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_attendance`
--
ALTER TABLE `staff_attendance`
  MODIFY `SA_staffID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff_management`
--
ALTER TABLE `staff_management`
  MODIFY `SM_staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff_schedule`
--
ALTER TABLE `staff_schedule`
  MODIFY `SS_scheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `TF_supervisorID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tf_delivery_list`
--
ALTER TABLE `tf_delivery_list`
  MODIFY `TF_deliveryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tf_product`
--
ALTER TABLE `tf_product`
  MODIFY `TF_prodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tf_reject_list`
--
ALTER TABLE `tf_reject_list`
  MODIFY `TF_rejectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tf_return_list`
--
ALTER TABLE `tf_return_list`
  MODIFY `TF_returnID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tf_swr`
--
ALTER TABLE `tf_swr`
  MODIFY `TF_swrID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `workcell`
--
ALTER TABLE `workcell`
  MODIFY `TF_workcellID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
