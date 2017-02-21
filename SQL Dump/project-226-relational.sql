-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 01, 2016 at 02:37 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project-226-relational`
--

-- --------------------------------------------------------

--
-- Table structure for table `Accessories`
--

DROP TABLE IF EXISTS `Accessories`;
CREATE TABLE `Accessories` (
  `AccessoriesType` varchar(100) NOT NULL,
  `Dimensions` varchar(500) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `AccessoriesId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

DROP TABLE IF EXISTS `Customer`;
CREATE TABLE `Customer` (
  `CustomerId` int(11) NOT NULL,
  `CustomerName` varchar(100) NOT NULL,
  `Street` varchar(500) NOT NULL,
  `City` varchar(500) NOT NULL,
  `State` varchar(500) NOT NULL,
  `Country` varchar(500) NOT NULL,
  `Zipcode` varchar(500) NOT NULL,
  `EmailId` varchar(500) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`CustomerId`, `CustomerName`, `Street`, `City`, `State`, `Country`, `Zipcode`, `EmailId`, `Password`) VALUES
(4, 'Ankit', 'California', 'san jose', '', 'USA', '95112', 'ankit@gmail.com', '123'),
(5, 'heidi', 'oweifjoi', 'nkfj', '', 'jowih', 'dwoh', 'heidi@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `CustomerPhoneNumber`
--

DROP TABLE IF EXISTS `CustomerPhoneNumber`;
CREATE TABLE `CustomerPhoneNumber` (
  `PhoneNumber` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CustomerPhoneNumber`
--

INSERT INTO `CustomerPhoneNumber` (`PhoneNumber`, `CustomerId`) VALUES
(2147483647, 4);

-- --------------------------------------------------------

--
-- Table structure for table `DefectsFound`
--

DROP TABLE IF EXISTS `DefectsFound`;
CREATE TABLE `DefectsFound` (
  `DefectId` int(11) NOT NULL,
  `DFTime` varchar(50) NOT NULL,
  `DFDate` date NOT NULL,
  `NoOfItems` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `StoreID` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Inventory`
--

DROP TABLE IF EXISTS `Inventory`;
CREATE TABLE `Inventory` (
  `InventoryId` int(11) NOT NULL,
  `InventoryTIme` varchar(50) NOT NULL,
  `InventoryDate` date NOT NULL,
  `Quantity` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `StoreID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `OrderItem`
--

DROP TABLE IF EXISTS `OrderItem`;
CREATE TABLE `OrderItem` (
  `OrderItemId` int(11) NOT NULL,
  `OTime` varchar(100) NOT NULL,
  `ODate` date NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Cost` float NOT NULL,
  `ProductId` int(11) NOT NULL,
  `OrderId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

DROP TABLE IF EXISTS `Orders`;
CREATE TABLE `Orders` (
  `OrderId` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `ShippingId` int(11) NOT NULL,
  `PaymentMethodId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PaymentMethods`
--

DROP TABLE IF EXISTS `PaymentMethods`;
CREATE TABLE `PaymentMethods` (
  `PaymentMethodId` int(11) NOT NULL,
  `PaymentMethodDetails` varchar(500) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `PaymentMethodType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PaymentMethodTypes`
--

DROP TABLE IF EXISTS `PaymentMethodTypes`;
CREATE TABLE `PaymentMethodTypes` (
  `PaymentMethodType` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PaymentMethodTypes`
--

INSERT INTO `PaymentMethodTypes` (`PaymentMethodType`, `Description`) VALUES
('mastercard', 'mastercard'),
('netbanking', 'netbanking'),
('paypal', 'paypal'),
('visa', 'visa');

-- --------------------------------------------------------

--
-- Table structure for table `Phones`
--

DROP TABLE IF EXISTS `Phones`;
CREATE TABLE `Phones` (
  `PhoneModel` varchar(500) NOT NULL,
  `SerialNumber` varchar(500) NOT NULL,
  `PhoneId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

DROP TABLE IF EXISTS `Products`;
CREATE TABLE `Products` (
  `ProductId` int(11) NOT NULL,
  `ProductName` varchar(500) NOT NULL,
  `ProductBarcode` varchar(500) NOT NULL,
  `ProductDescription` varchar(500) NOT NULL,
  `ProductAvailability` int(11) NOT NULL,
  `ProductCost` float NOT NULL,
  `ProductURL` varchar(500) NOT NULL,
  `ProductType` varchar(50) NOT NULL,
  `VendorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`ProductId`, `ProductName`, `ProductBarcode`, `ProductDescription`, `ProductAvailability`, `ProductCost`, `ProductURL`, `ProductType`, `VendorId`) VALUES
(1, 'Galaxy Express 3', '1000', 'Galaxy Express 3', 50, 100, 'http://images.techtimes.com/data/thumbs/full/226513/600/0/0/0/samsung-galaxy-express-prime.jpg', 'PH', 1),
(2, 'Galaxy Express Prime', '1001', 'Galaxy Express Prime', 50, 120, 'http://www.androidheadlines.com/wp-content/uploads/2016/01/Samsung-Galaxy-J3-2016-Official-Render-Boost-KK.jpg', 'PH', 1),
(3, 'Galaxy AMP 2', '1002', 'Galaxy AMP-2', 50, 150, 'http://i-cdn.phonearena.com/images/phones/41550-large/Samsung-Galaxy-Amp.jpg', 'PH', 1),
(4, 'Galaxy J7', '1003', 'Galaxy J7', 50, 270, 'http://www.sammobile.com/wp-content/uploads/2016/04/samsung-galaxy-j7-2016.jpg', 'PH', 1),
(5, 'IPhone 6S', '1004', 'Iphone 6S', 50, 900, 'http://store.storeimages.cdn-apple.com/4973/as-images.apple.com/is/image/AppleInc/aos/published/images/i/ph/iphone6s/plus/iphone6s-plus-box-rosegold-2015_GEO_US?wid=478&hei=595&fmt=jpeg&qlt=95&op_sharpen=0&resMode=bicub&op_usm=0.5,0.5,0,0&iccEmbed=0&layer=comp&.v=2WElT0', 'PH', 5),
(6, 'Iphone 6S Plus', '1005', 'Iphone 6S Plus', 50, 860, 'https://9to5mac.files.wordpress.com/2013/04/iphone6-plus-box-space-gray-2014.jpeg', 'PH', 6),
(7, 'Iphone 5 S', '1006', 'Iphone 5s', 50, 170, 'http://nearestore.com/Product_Images/Pro43.jpg', 'PH', 6),
(8, 'Screen Protector', '2000', 'Screen Protector', 50, 8, 'http://www.oppomart.com/media/catalog/product/cache/1/small_image/9df78eab33525d08d6e5fb8d27136e95/n/i/nillkin-screen-protector-oppo-n1-1_1_1_2.jpg', 'AC', 6),
(9, 'Bluetooth Headsets', '2001', 'Bluetooth Headsets', 50, 15, 'https://www.headsets.com/images/hds2/products/vxi/800/891.jpg', 'AC', 6),
(10, 'Charger', '2002', 'Charger', 50, 40, 'http://www.o-digital.com/uploads/2227/2279-1/Mobile_Phone_Charger_878.jpg', 'AC', 6),
(11, 'Batteries', '2004', 'Batteries', 50, 100, 'http://3.imimg.com/data3/HO/BY/MY-8826974/mobile-battery-250x250.jpg', 'AC', 6);

-- --------------------------------------------------------

--
-- Table structure for table `ProductTypes`
--

DROP TABLE IF EXISTS `ProductTypes`;
CREATE TABLE `ProductTypes` (
  `ProductType` varchar(50) NOT NULL,
  `ProductTypeDesc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ProductTypes`
--

INSERT INTO `ProductTypes` (`ProductType`, `ProductTypeDesc`) VALUES
('AC', 'Accessories'),
('PH', 'Phones');

-- --------------------------------------------------------

--
-- Table structure for table `Regions`
--

DROP TABLE IF EXISTS `Regions`;
CREATE TABLE `Regions` (
  `RegionId` varchar(50) NOT NULL,
  `Region` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Shipping`
--

DROP TABLE IF EXISTS `Shipping`;
CREATE TABLE `Shipping` (
  `ShippingId` int(11) NOT NULL,
  `ShippingDate` date NOT NULL,
  `DaysToDeliver` int(11) NOT NULL,
  `ShipmentOwner` varchar(100) NOT NULL,
  `ShipmentCost` float NOT NULL,
  `ShippingOptionsType` varchar(50) NOT NULL,
  `SourceRegion` varchar(50) NOT NULL,
  `DestinationRegion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ShippingOptionsTypes`
--

DROP TABLE IF EXISTS `ShippingOptionsTypes`;
CREATE TABLE `ShippingOptionsTypes` (
  `ShippingOptionsType` varchar(50) NOT NULL,
  `Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Stores`
--

DROP TABLE IF EXISTS `Stores`;
CREATE TABLE `Stores` (
  `StoreId` int(11) NOT NULL,
  `StoreZip` varchar(100) NOT NULL,
  `StoreRegion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Vendors`
--

DROP TABLE IF EXISTS `Vendors`;
CREATE TABLE `Vendors` (
  `VendorId` int(11) NOT NULL,
  `VendorName` varchar(500) NOT NULL,
  `VendorLocation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Vendors`
--

INSERT INTO `Vendors` (`VendorId`, `VendorName`, `VendorLocation`) VALUES
(1, 'Samsung', 'California'),
(2, 'LG', 'Texas'),
(3, 'Motorola', 'California'),
(4, 'HTC', 'Texas'),
(5, 'Apple', 'Texas'),
(6, 'Microsoft', 'Texas'),
(7, 'Sony', 'Texas'),
(8, 'Blackberry', 'Texas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Accessories`
--
ALTER TABLE `Accessories`
  ADD PRIMARY KEY (`AccessoriesId`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`CustomerId`),
  ADD UNIQUE KEY `EmailId` (`EmailId`);

--
-- Indexes for table `CustomerPhoneNumber`
--
ALTER TABLE `CustomerPhoneNumber`
  ADD PRIMARY KEY (`PhoneNumber`),
  ADD KEY `CustomerId` (`CustomerId`);

--
-- Indexes for table `DefectsFound`
--
ALTER TABLE `DefectsFound`
  ADD PRIMARY KEY (`DefectId`),
  ADD KEY `ProductId` (`ProductId`),
  ADD KEY `StoreID` (`StoreID`),
  ADD KEY `CustomerId` (`CustomerId`);

--
-- Indexes for table `Inventory`
--
ALTER TABLE `Inventory`
  ADD PRIMARY KEY (`InventoryId`),
  ADD KEY `ProductId` (`ProductId`),
  ADD KEY `StoreID` (`StoreID`);

--
-- Indexes for table `OrderItem`
--
ALTER TABLE `OrderItem`
  ADD PRIMARY KEY (`OrderItemId`),
  ADD KEY `ProductId` (`ProductId`),
  ADD KEY `OrderId` (`OrderId`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`OrderId`),
  ADD KEY `CustomerId` (`CustomerId`),
  ADD KEY `ShippingId` (`ShippingId`),
  ADD KEY `PaymentMethodId` (`PaymentMethodId`);

--
-- Indexes for table `PaymentMethods`
--
ALTER TABLE `PaymentMethods`
  ADD PRIMARY KEY (`PaymentMethodId`),
  ADD KEY `CustomerId` (`CustomerId`),
  ADD KEY `PaymentMethodType` (`PaymentMethodType`);

--
-- Indexes for table `PaymentMethodTypes`
--
ALTER TABLE `PaymentMethodTypes`
  ADD PRIMARY KEY (`PaymentMethodType`);

--
-- Indexes for table `Phones`
--
ALTER TABLE `Phones`
  ADD PRIMARY KEY (`PhoneId`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`ProductId`),
  ADD KEY `ProductType` (`ProductType`),
  ADD KEY `VendorId` (`VendorId`);

--
-- Indexes for table `ProductTypes`
--
ALTER TABLE `ProductTypes`
  ADD PRIMARY KEY (`ProductType`);

--
-- Indexes for table `Regions`
--
ALTER TABLE `Regions`
  ADD PRIMARY KEY (`RegionId`);

--
-- Indexes for table `Shipping`
--
ALTER TABLE `Shipping`
  ADD PRIMARY KEY (`ShippingId`),
  ADD KEY `ShippingOptionsType` (`ShippingOptionsType`),
  ADD KEY `SourceRegion` (`SourceRegion`),
  ADD KEY `DestinationRegion` (`DestinationRegion`);

--
-- Indexes for table `ShippingOptionsTypes`
--
ALTER TABLE `ShippingOptionsTypes`
  ADD PRIMARY KEY (`ShippingOptionsType`);

--
-- Indexes for table `Stores`
--
ALTER TABLE `Stores`
  ADD PRIMARY KEY (`StoreId`),
  ADD KEY `StoreRegion` (`StoreRegion`);

--
-- Indexes for table `Vendors`
--
ALTER TABLE `Vendors`
  ADD PRIMARY KEY (`VendorId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `CustomerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `CustomerPhoneNumber`
--
ALTER TABLE `CustomerPhoneNumber`
  MODIFY `PhoneNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;
--
-- AUTO_INCREMENT for table `DefectsFound`
--
ALTER TABLE `DefectsFound`
  MODIFY `DefectId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Inventory`
--
ALTER TABLE `Inventory`
  MODIFY `InventoryId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `OrderItem`
--
ALTER TABLE `OrderItem`
  MODIFY `OrderItemId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `PaymentMethods`
--
ALTER TABLE `PaymentMethods`
  MODIFY `PaymentMethodId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `Shipping`
--
ALTER TABLE `Shipping`
  MODIFY `ShippingId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Stores`
--
ALTER TABLE `Stores`
  MODIFY `StoreId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Vendors`
--
ALTER TABLE `Vendors`
  MODIFY `VendorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Accessories`
--
ALTER TABLE `Accessories`
  ADD CONSTRAINT `accessories_ibfk_1` FOREIGN KEY (`AccessoriesId`) REFERENCES `Products` (`ProductId`);

--
-- Constraints for table `CustomerPhoneNumber`
--
ALTER TABLE `CustomerPhoneNumber`
  ADD CONSTRAINT `customerphonenumber_ibfk_1` FOREIGN KEY (`CustomerId`) REFERENCES `Customer` (`CustomerId`);

--
-- Constraints for table `DefectsFound`
--
ALTER TABLE `DefectsFound`
  ADD CONSTRAINT `defectsfound_ibfk_1` FOREIGN KEY (`ProductId`) REFERENCES `Products` (`ProductId`),
  ADD CONSTRAINT `defectsfound_ibfk_2` FOREIGN KEY (`StoreID`) REFERENCES `Stores` (`StoreId`),
  ADD CONSTRAINT `defectsfound_ibfk_3` FOREIGN KEY (`CustomerId`) REFERENCES `Customer` (`CustomerId`);

--
-- Constraints for table `Inventory`
--
ALTER TABLE `Inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`ProductId`) REFERENCES `Products` (`ProductId`),
  ADD CONSTRAINT `inventory_ibfk_2` FOREIGN KEY (`StoreID`) REFERENCES `Stores` (`StoreId`);

--
-- Constraints for table `OrderItem`
--
ALTER TABLE `OrderItem`
  ADD CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`ProductId`) REFERENCES `Products` (`ProductId`),
  ADD CONSTRAINT `orderitem_ibfk_2` FOREIGN KEY (`OrderId`) REFERENCES `Orders` (`OrderId`);

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomerId`) REFERENCES `Customer` (`CustomerId`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`ShippingId`) REFERENCES `Shipping` (`ShippingId`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`PaymentMethodId`) REFERENCES `PaymentMethods` (`PaymentMethodId`);

--
-- Constraints for table `PaymentMethods`
--
ALTER TABLE `PaymentMethods`
  ADD CONSTRAINT `paymentmethods_ibfk_1` FOREIGN KEY (`CustomerId`) REFERENCES `Customer` (`CustomerId`),
  ADD CONSTRAINT `paymentmethods_ibfk_2` FOREIGN KEY (`PaymentMethodType`) REFERENCES `PaymentMethodTypes` (`PaymentMethodType`);

--
-- Constraints for table `Phones`
--
ALTER TABLE `Phones`
  ADD CONSTRAINT `phones_ibfk_1` FOREIGN KEY (`PhoneId`) REFERENCES `Products` (`ProductId`);

--
-- Constraints for table `Products`
--
ALTER TABLE `Products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`ProductType`) REFERENCES `ProductTypes` (`ProductType`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`VendorId`) REFERENCES `Vendors` (`VendorId`);

--
-- Constraints for table `Shipping`
--
ALTER TABLE `Shipping`
  ADD CONSTRAINT `shipping_ibfk_1` FOREIGN KEY (`ShippingOptionsType`) REFERENCES `ShippingOptionsTypes` (`ShippingOptionsType`),
  ADD CONSTRAINT `shipping_ibfk_2` FOREIGN KEY (`SourceRegion`) REFERENCES `Regions` (`RegionId`),
  ADD CONSTRAINT `shipping_ibfk_3` FOREIGN KEY (`DestinationRegion`) REFERENCES `Regions` (`RegionId`);

--
-- Constraints for table `Stores`
--
ALTER TABLE `Stores`
  ADD CONSTRAINT `stores_ibfk_1` FOREIGN KEY (`StoreRegion`) REFERENCES `Regions` (`RegionId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
