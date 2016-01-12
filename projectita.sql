-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2015 at 04:22 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projectita`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `weight` int(11) NOT NULL,
  `catagory` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `rating` int(11) NOT NULL,
  `stock_id` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `low_limit` int(11) NOT NULL,
  `path` varchar(100) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `preview` varchar(10) NOT NULL,
  `previewpath` varchar(200) NOT NULL,
  `freepath` varchar(200) NOT NULL,
  `sypnosis` varchar(200) NOT NULL DEFAULT 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.',
  PRIMARY KEY (`id`),
  KEY `stock_id` (`stock_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `publisher`, `ISBN`, `weight`, `catagory`, `price`, `rating`, `stock_id`, `qty`, `low_limit`, `path`, `Author`, `Type`, `preview`, `previewpath`, `freepath`, `sypnosis`) VALUES
(1, 'How to conquer the world', 'Sandunil Jayasinghe', '787485748574', 21, 'comic', 20, 100, '1', 1000, 10, '../files/b_img/1.jpg', 'Sandunil Jayasinghe', 'book', 'ok', 'preview/2/index.html', 'free/test.pdf', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(2, 'Biology, 9th Edition', 'Peter H. Raven', '978-0078936494', 3, 'science ', 26.95, 4, '2', 1000, 10, '../files/b_img/10.jpg', 'Peter H. Raven', 'book', 'ok', 'preview/2/index.html', '', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(3, 'Work Effectively', 'Kalidasa Amaratunga', '978-0078936493', 123, 'comic', 0, 5, '1', 1000, 10, '../files/b_img/3.jpg', 'N.P Gunner', 'book', 'no', '', 'free/test.pdf', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(4, 'How to train dragons to fly?', 'Michika Perera', '978-0078936492', 1321, 'Novel', 7.65, 2, '1', 1000, 10, '../files/b_img/4.jpg', 'Michika Perera', 'book', 'ok', 'preview/4/index.html', '', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(5, 'Where are all the flowers gone?', 'William Shakespeare', '978-0078936495', 500, 'comic', 5.6, 3, '2', 1000, 10, '../files/b_img/5.jpg', 'Rohan Perera', 'user', 'ok', 'preview/5/index.html', '', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(6, 'Dragon of Kinder', 'N.P Gunner', '978-0078936493', 12, 'Novel', 0, 5, '1', 1000, 10, '../files/b_img/6.jpg', 'Lakshan Perera', 'user', 'ok', 'preview/6/index.html', 'free/test.pdf', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(7, 'Sword of the Archon', 'D.P Prior', '978-0078936491', 550, 'Novel', 12.45, 3, '1', 1001, 10, '../files/b_img/7.jpg', 'D.P Prior', 'book', 'ok', 'preview/6/index.html', '', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(8, 'Sycamore Row', 'John Grisham', '978-0078936491', 8, 'Novel', 23, 4, '1', 1000, 10, '../files/b_img/8.jpg', 'John Grisham', 'book', 'ok', 'preview/7/index.html', '', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(9, 'Edge of Eternity', 'Ken Follett', '978-0078936491', 8, 'Novel', 0, 4, '2', 1000, 10, '../files/b_img/9.jpg', 'Ken Follett', 'book', 'no', '', 'free/test.pdf', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(10, 'The Handsome Mans De Luxe Caf', 'Alexander McCall Smith', '978-0078936491', 8, 'Novel', 25, 45, '1', 1085, 10, '../files/b_img/11.jpg', 'Alexander McCall Smith', 'book', 'ok', 'preview/8/index.html', '', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(11, 'What If', 'Rebecca Donovan', '978-0078936492', 5, 'Novel', 35, 3, '2', 1000, 10, '../files/b_img/12.jpg', 'Rebecca Donovan', 'book', 'ok', 'preview/9/index.html', '', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(12, 'Doctor Who: Salt of the Earth (Time Trips)', 'Dihara Peris', '978-0078936492', 3, 'Romance', 15, 5, '2', 1002, 10, '../files/b_img/13.jpg', 'Dihara Peris', 'user', 'ok', 'preview/10/index.html', '', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(13, 'Trouble in Mind', 'Binuka Kamesh', '978-0078936492', 4, 'Science ', 0, 4, '1', 1000, 10, '../files/b_img/14.jpg', 'Binuka Kamesh', 'user', 'no', '', 'free/test.pdf', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(14, 'The Snow Child', 'Tharaka Perara', '978-0078936492', 9, 'Novel', 5, 4, '1', 1000, 10, '../files/b_img/15.jpg', 'Tharaka Peris', 'user', 'ok', 'preview/11/index.html', '', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(15, 'The Winter Horses', ' Philip Kerr', '978-0078936492', 10, 'Novel', 0, 5, '1', 1000, 10, '../files/b_img/16.jpg', ' Philip Kerr', 'book', 'ok', 'preview/12/index.html', '', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(16, 'Cold Light of Day', 'Kamal Gunawardena', '978-0078936492', 10, 'Science', 20, 4, '1', 1000, 10, '../files/b_img/17.jpg', 'Kamal Gunawardena', 'user', 'no', '', '', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(17, 'Hell for Leather', 'ulie Ann Walker', '978-0078936492', 6, 'Novel', 0, 5, '2', 1000, 10, '../files/b_img/18.jpg', 'ulie Ann Walker', 'book', 'no', '', 'free/test.pdf', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(18, 'Bite Me', 'Nimal Perera', '978-0078936492', 6, 'Novel', 20, 4, '1', 1000, 10, '../files/b_img/19.jpg', 'Kamal Perera', 'user', 'ok', 'preview/13/index.html', '', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(19, 'It Must Be Your Love', 'Bella Andre', '978-0078936492', 5, 'Novel', 5, 5, '1', 1000, 10, '../files/b_img/20.jpg', 'Bella Andre', 'audio', 'no', '', '', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(20, 'Remy', 'Sasindu Ranasignhe', '978-0078936492', 4, 'Comic', 0, 4, '2', 1000, 10, '../files/b_img/21.jpg', 'Sasindu Ranasignhe', 'user', 'ok', 'preview/14/index.html', 'free/test.pdf', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(21, 'Beautiful Bastard', 'Tom Allison', '978-0078936492', 6, 'Romance', 10, 3, '2', 1000, 10, '../files/b_img/22.jpg', 'Tom allison', 'user', 'ok', 'preview/15/index.html', '', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(22, 'Cruel to Be', 'Trishan Dinuka', '978-0078936492', 5, 'Novel', 0, 5, '1', 1000, 10, '../files/b_img/23.jpg', 'Trishan Dinuka', 'user', 'ok', 'preview/16/index.html', 'free/test.pdf', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(23, 'In These Words', ' Kichiku Neko', '978-0078936492', 7, 'Science', 2, 2, '2', 1000, 10, '../files/b_img/24.jpg', ' Kichiku Neko', 'audio', 'no', '', '', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(24, 'Trouble in Mind', ' Jeffery Deaver', '978-0078936492', 1, 'Novel', 0, 5, '2', 1000, 10, '../files/b_img/25.jpg', ' Jeffery Deaver', 'audio', 'ok', 'preview/17/index.html', 'free/test.pdf', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(25, 'Gray Mountain', 'John Grisham', '978-0078936492', 1, 'Novel', 0, 3, '2', 1000, 10, '../files/b_img/26.jpg', 'John Grisham', 'audio', 'no', '', 'free/test.pdf', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(26, 'Obsession in Death', 'J. D. Robb', '978-0078936492', 1, 'Science ', 5, 4, '2', 1000, 10, '../files/b_img/27.jpg', 'J. D. Robb', 'audio', 'ok', 'preview/18/index.html', '', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(27, 'Desert God - A Novel of Ancient Egypt', ' Wilbur Smith', '978-0078936492', 1, 'Novel', 25, 5, '1', 1000, 10, '../files/b_img/28.jpg', ' Wilbur Smith', 'audio', 'no', '', '', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(28, 'Elicit', ' Rachel Van Dyken', '978-0078936492', 1, 'Novel', 10, 5, '1', 1000, 10, '../files/b_img/29.jpg', ' Rachel Van Dyken', 'audio', 'ok', 'preview/19/index.html', '', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(29, 'How Sweet It Is', ' Kate Perry', '978-0078936492', 1, 'Novel', 12, 5, '2', 1000, 10, '../files/b_img/30.jpg', ' Kate Perry', 'audio', 'no', '', '', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(30, 'Give a Little', 'Give a Little', '978-0078936492', 2, 'Romance', 0, 5, '1', 1000, 10, '../files/b_img/20.jpg', 'Give a Little', 'audio', 'ok', 'preview/20/index.html', 'free/test.pdf', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.'),
(31, 'Daughter', ' Jane Shemilt', '978-0078936492', 2, 'Novel', 0, 4, '2', 1000, 10, '../files/b_img/31.jpg', ' Jane Shemilt', 'audio', 'ok', 'preview/21/index.html', 'free/test.pdf', 'The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.');

-- --------------------------------------------------------

--
-- Table structure for table `b_o`
--

CREATE TABLE IF NOT EXISTS `b_o` (
  `book_id` int(20) NOT NULL,
  `order_id` int(20) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`book_id`,`order_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `b_o`
--

INSERT INTO `b_o` (`book_id`, `order_id`, `qty`) VALUES
(7, 12, 1),
(12, 9, 1),
(12, 10, 1),
(12, 12, 1),
(19, 9, 1),
(27, 9, 1),
(28, 9, 1),
(29, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `total_weight` int(20) NOT NULL,
  `total_amount` double NOT NULL,
  `quantity` int(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `payment_state` tinyint(1) NOT NULL,
  `package_id` int(20) NOT NULL,
  `address` varchar(1000) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `username` (`username`),
  KEY `package_id` (`package_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `username`, `total_weight`, `total_amount`, `quantity`, `date`, `payment_state`, `package_id`, `address`) VALUES
(9, 'Sleepy', 11, 67, 5, '2014-09-23', 1, 1, 'Michika Iranga Perera<br>Mal Piyali,near the school,chillaw road, waikkala<br>Waikkala<br>6110<br>west<br>Sri Lanka<br>Tel :1233'),
(10, 'Sleepy', 3, 15, 1, '2014-09-23', 1, 1, 'Michika Iranga Perera<br>Mal Piyali,near the school,chillaw road, waikkala<br>Waikkala<br>6110<br>west<br>Sri Lanka<br>Tel :1233'),
(12, 'Sleepy', 553, 27, 2, '2014-09-25', 0, 1, 'Michika Iranga Perera<br>Mal Piyali,near the school,chillaw road, waikkala<br>Waikkala<br>6110<br>west<br>Sri Lanka<br>Tel :1233');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `package_id` int(20) NOT NULL AUTO_INCREMENT,
  `max_weight` int(20) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `max_weight`, `price`) VALUES
(1, 200, 2),
(2, 400, 4),
(3, 600, 6),
(4, 800, 8),
(5, 1000, 10),
(6, 1200, 12),
(7, 1400, 14),
(8, 1600, 16),
(9, 1800, 18),
(10, 2000, 20);

-- --------------------------------------------------------

--
-- Table structure for table `q_answers`
--

CREATE TABLE IF NOT EXISTS `q_answers` (
  `id` int(20) NOT NULL,
  `answer` varchar(500) NOT NULL,
  PRIMARY KEY (`id`,`answer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `q_answers`
--

INSERT INTO `q_answers` (`id`, `answer`) VALUES
(1, 'In order to complete a purchase on-line, a bookstore account must be set-up. To set-up an account,please register in WEBOOKS and follow the necessary instructions.'),
(1, 'Mail:(address)'),
(1, 'Telephone:0112xxxxxx(toll free in Sri Lanka).'),
(2, 'By reviewing your shopping cart at any time you will be able modify the quantity ordered or delete the book from the shipment all together.          			To delete the book simply click on the <img src=''img/delete.gif'' />icon.'),
(3, 'Currently we have no such process, but we hope to give our registered members 5% discount during the christmas & new year seasons.'),
(4, 'Please connect to the <a href=''../Login/recover/fogetmypassword.php''>password recovery page </a>of the website to get reset instructions.'),
(5, 'Sorry, all the books in the site are displayed in the list.If you want any book other than the books in the list,please email your details with the requirement to the following email address.You will receive a reply within five days if the order is possible.(email)'),
(6, 'We sell various types of books;fiction,non-fiction,magazines etc.You can search books by category as well as name.You can buy both sinhala & english books here.'),
(7, 'At this time the only way to place an order on-line is with a credit card. We are looking to integrate other forms of payment through our website in the near	 future'),
(8, 'The maximum quantity is (quantity).'),
(9, 'Please allow 1 - 3 business days (Monday-Friday) for order processing regardless of the shipping method chosen. Once shipped you should receive your order within 2 - 10 business days. Please note that 2 day and Overnight services refer to business days (Monday - Friday).'),
(10, 'We ship UPS, FedEx or LK mail .You can use any method to pay for your order. The shipping rates charged for print books are determined based on weight and quantities. eBooks have no shipping charge.'),
(11, 'You will receive an email within 2-3 days once your order has shipped.If not contact by Email:xxxxxx or by Telephone:0112xxxxxx(toll free in Sri Lanka) to request information on your order.'),
(12, 'Please submit your inquiry to the following email address.(email)'),
(12, 'Telephone:0112xxxxxx(toll free in Sri lanka) to directly contact bookstore customer service.'),
(13, 'Please return your order to the following address within 30 days in original condition to receive your full payment back. Address:	WEBOOKS, Sri Lanka.'),
(14, 'We accept MasterCard,Visa,American Express,cash and checks.You can use any method to pay for your order. Account No:xxxxxxxxxx.'),
(15, 'Please contact by Email:xxxxxx or by Telephone:0112xxxxxx(toll free in Sri Lanka) to request a copy of your invoice. You will receive the copy of your invoice within 7 days.'),
(16, 'Follow the checkout Process');

-- --------------------------------------------------------

--
-- Table structure for table `q_assist`
--

CREATE TABLE IF NOT EXISTS `q_assist` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `question` varchar(500) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `q_assist`
--

INSERT INTO `q_assist` (`id`, `question`, `count`) VALUES
(1, 'How can I place an order?', 8),
(2, 'How do I make changes to the shopping cart?', 4),
(3, 'Do registered members get a discount when purchasing books?', 3),
(4, 'I cannot login to the site using my username and password?', 11),
(5, 'What if the book I am searching is not in the list?', 1),
(6, 'What are the types of books sold in this site?', 2),
(7, 'Can I order online without a credit card?', 2),
(8, 'What is the maximum quantity that can be ordered through this site?', 2),
(9, 'How long does it take to process and ship orders?', 2),
(10, 'What is the shipping method used and the shipping rates?', 2),
(11, 'How can I find out my order has shipped?', 3),
(12, 'Who do I contact if I have a question about a product?', 2),
(13, 'What address do I send my returns to?', 3),
(14, 'What forms of payment do you accept?', 4),
(15, 'How can I get a copy of my invoice?', 2),
(16, 'How to Checkout?', 2),
(17, 'How Can Submit a Ticket?', 0),
(18, 'lolol', 0),
(19, 'asd', 0),
(20, 'ad', 0),
(21, '', 0),
(22, '', 0),
(23, '', 0),
(24, '', 0),
(25, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `stock_id` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `address`) VALUES
('1', 'A11'),
('2', 'A12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `Rating` int(11) NOT NULL,
  `address` varchar(300) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `country` varchar(15) NOT NULL,
  `filepath` varchar(100) NOT NULL DEFAULT '../files/u_img/0.jpg',
  `level` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `name`, `password`, `phone`, `Rating`, `address`, `city`, `state`, `zip_code`, `country`, `filepath`, `level`) VALUES
('Sleepy', 'alexvista1234@gmail.com', 'Michika Iranga Perera', '1234', '1233', 4, 'Mal Piyali,near the school,chillaw road, waikkala', 'Waikkala', 'west', 6110, 'Sri Lanka', '../files/u_img/0.jpg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_uploaded`
--

CREATE TABLE IF NOT EXISTS `user_uploaded` (
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_uploaded`
--

INSERT INTO `user_uploaded` (`username`, `name`, `path`) VALUES
('SNDL', 'How to Vacuum', 'uploads/vacuum.pdf');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`stock_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `b_o`
--
ALTER TABLE `b_o`
  ADD CONSTRAINT `b_o_ibfk_6` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `b_o_ibfk_7` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_7` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_8` FOREIGN KEY (`package_id`) REFERENCES `package` (`package_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `q_answers`
--
ALTER TABLE `q_answers`
  ADD CONSTRAINT `q_answers_ibfk_1` FOREIGN KEY (`id`) REFERENCES `q_assist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
