
-- --------------------------------------------------------

--
-- Table structure for table `orders`
--
-- Creation: Nov 28, 2018 at 11:33 PM
-- Last update: Nov 29, 2018 at 08:41 PM
--

CREATE TABLE `orders` (
  `orderId` int(5) UNSIGNED NOT NULL,
  `customerid` int(5) NOT NULL,
  `userId` int(5) DEFAULT NULL,
  `airportId` int(5) DEFAULT NULL,
  `airlineid` int(5) DEFAULT NULL,
  `orderType` varchar(25) DEFAULT NULL,
  `departuresTerminal` int(5) DEFAULT NULL,
  `arrivalsTerminal` int(5) DEFAULT NULL,
  `orderDate` date NOT NULL,
  `orderTime` time NOT NULL,
  `deliveryScheduleDate` date NOT NULL,
  `deliveryScheduleTime` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `customerid`, `userId`, `airportId`, `airlineid`, `orderType`, `departuresTerminal`, `arrivalsTerminal`, `orderDate`, `orderTime`, `deliveryScheduleDate`, `deliveryScheduleTime`) VALUES
(1, 0, 3, 1, 1, '2', 1, 1, '2018-10-28', '25:48:17', '2018-11-04', '06:00:00'),
(2, 0, 3, 1, 2, '2', 1, 1, '2018-11-11', '22:15:10', '2018-11-29', '10:00:00'),
(3, 0, 3, 1, 3, '2', 2, 2, '2018-11-13', '19:03:00', '2018-12-02', '11:00:00'),
(4, 0, 3, 1, 4, '2', 1, 1, '2018-10-10', '12:00:00', '2018-12-10', '14:00:00'),
(5, 0, 3, 1, 5, '2', 3, 3, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
(6, 0, 3, 1, 14, '2', 1, 1, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
(7, 0, 3, 1, 6, '2', 2, 2, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
(8, 0, 3, 1, 7, '2', 1, 1, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
(9, 0, 3, 1, 8, '2', 4, 9, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
(10, 0, 4, 2, 9, '2', 5, 5, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
(11, 0, 4, 2, 3, '2', 6, 6, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
(12, 0, 3, 2, 5, '2', 5, 5, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
(13, 0, 3, 2, 10, '2', 7, 7, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
(14, 0, 3, 2, 8, '2', 6, 6, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
(15, 0, 3, 2, 11, '2', 5, 5, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
(16, 0, 3, 2, 12, '2', 8, 10, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
(17, 0, 3, 2, 13, '2', 5, 5, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
(18, 4, 4, 0, 0, '2', 0, 0, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
(19, 5, 4, 0, 0, '2', 0, 0, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
(20, 6, 3, 0, 0, '2', 0, 0, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
(21, 7, 4, 0, 0, '2', 0, 0, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
(22, 8, 4, 0, 0, '2', 0, 0, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
(23, 9, 4, 0, 0, '2', 0, 0, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
(24, 10, 4, 0, 0, '2', 0, 0, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
(25, 11, 4, 0, 0, '2', 0, 0, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
(26, 12, 4, 0, 0, '2', 0, 0, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
(27, 2, 6, 0, 0, '1', 0, 0, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00');