-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2016 at 06:31 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_marketplace`
--
CREATE DATABASE IF NOT EXISTS `db_marketplace` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_marketplace`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `description` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `date_added`, `date_modified`, `description`) VALUES
(2, 'Bootstrap', 'enabled', '2015-10-24 17:26:40', '2015-12-31 08:02:17', 'Only bootstrap templates belongs here'),
(3, 'Html', 'enabled', '2015-10-24 17:32:52', '0000-00-00 00:00:00', ''),
(4, 'CSS Only', 'disabled', '2015-10-24 17:33:00', '2015-10-25 05:23:58', 'DescriptionDescription'),
(5, 'Music', 'enabled', '2015-10-24 17:33:08', '0000-00-00 00:00:00', ''),
(18, 'Creative', 'enabled', '2015-10-25 05:09:33', '0000-00-00 00:00:00', ''),
(19, 'Wedding', 'enabled', '2015-10-25 05:09:39', '0000-00-00 00:00:00', ''),
(20, 'Business', 'enabled', '2015-10-25 05:09:46', '0000-00-00 00:00:00', ''),
(21, 'Corporate & Business', 'enabled', '2015-10-25 05:09:57', '0000-00-00 00:00:00', ''),
(34, 'Admin Templates', 'enabled', '2016-01-10 19:25:58', '2016-01-11 13:39:31', ''),
(35, 'Coming Soon', 'enabled', '2016-01-10 19:33:25', '0000-00-00 00:00:00', ''),
(36, 'Landing Pages', 'enabled', '2016-01-10 19:33:36', '0000-00-00 00:00:00', ''),
(37, 'Entertainment', 'enabled', '2016-01-10 19:34:05', '0000-00-00 00:00:00', ''),
(44, 'Portfolio', 'enabled', '2016-02-17 07:06:10', '0000-00-00 00:00:00', ''),
(45, 'Gallery', 'enabled', '2016-02-17 07:06:31', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(50) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `country` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `paymentmethod` varchar(30) NOT NULL,
  `paymentmobile` varchar(30) NOT NULL,
  `cardnum` varchar(40) NOT NULL,
  `cardholderid` varchar(50) NOT NULL,
  `cvc` varchar(50) NOT NULL,
  `hash` varchar(300) NOT NULL,
  `avater` varchar(200) NOT NULL,
  `date_registered` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `email`, `is_verified`, `firstname`, `lastname`, `gender`, `country`, `state`, `zip`, `paymentmethod`, `paymentmobile`, `cardnum`, `cardholderid`, `cvc`, `hash`, `avater`, `date_registered`) VALUES
(24, 'ahmed.monjur', '$6$rounds=4567$abcdefghijklmnop$bVOJUERoKSL1T1TtXi6EgrOSB9LvqHou3Hj3Y5TnWMm0oo1w7w.6rZy4d0lALIRIRBO2HATiZmnetnVmz9D3E/', 'ahmed_monjur@live.com', 1, 'Sujar Ahmed', 'Monjur', 'male', 'Bangladesh', 'Sylhet', '3100', '', '', '', '', '', '4c33b56e873c533437c87c39ce0adf0a', 'f5fa6610e53555c6017604df9fc8eec5.png', '2016-01-02 20:51:29'),
(25, 'ahmed_monjur', '$6$rounds=4567$abcdefghijklmnop$bVOJUERoKSL1T1TtXi6EgrOSB9LvqHou3Hj3Y5TnWMm0oo1w7w.6rZy4d0lALIRIRBO2HATiZmnetnVmz9D3E/', 'ahmed.monjur21@gamil.com', 1, 'First Name', 'LastName', '', 'Bangladesh', 'Sylhet', '3100', '', '', '', '', '', 'aaf50196c515664a0af23522480a8054', '0745e6a5e8f1f1ec3b77e36f46275d09.png', '2016-01-22 21:24:44');

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE IF NOT EXISTS `favorite` (
  `product_id` int(40) NOT NULL,
  `customer_id` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`product_id`, `customer_id`) VALUES
(39, 25),
(47, 25),
(60, 25),
(37, 24),
(40, 24),
(47, 24);

-- --------------------------------------------------------

--
-- Table structure for table `featured`
--

CREATE TABLE IF NOT EXISTS `featured` (
  `id` int(20) NOT NULL,
  `product_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `featured`
--

INSERT INTO `featured` (`id`, `product_id`) VALUES
(0, '37'),
(0, '38'),
(0, '40'),
(0, '47'),
(0, '55'),
(0, '56'),
(0, '58'),
(0, '59'),
(0, '60'),
(0, '64'),
(0, '65'),
(0, '66'),
(0, '68');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE IF NOT EXISTS `information` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `title`, `description`) VALUES
(1, 'About Us', '<p>Metropolitan University</p>\r\n\r\n<p>Al-Hamra shopping city, Zindabarar</p>\r\n\r\n<p>Sylher-3100</p>\r\n'),
(2, 'Delivery Information', '<p>Delivery Information</p>\r\n'),
(3, 'Privacy Policy', '<p>More specifically, this website will be designed to allow developers to manage and communicate with a large number of customers.</p>\r\n'),
(4, 'Terms & Conditions', '<p>This web application will be an online marketplace for website templates. Both the system authority as well as the registered users will be able to post designs in the wall. </p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(30) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `category_id` int(30) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `author` tinyint(1) NOT NULL,
  `author_id` int(30) NOT NULL,
  `is_approved` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `image` varchar(300) NOT NULL,
  `mainfile` varchar(400) NOT NULL,
  `token` varchar(200) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `title`, `category_id`, `tag`, `author`, `author_id`, `is_approved`, `date_added`, `date_updated`, `image`, `mainfile`, `token`) VALUES
(37, 'Shades of Gray - A Bootstrap Template For Gray Lovers', 2, '24,17,22,19,29', 1, 20, 1, '2016-02-14 11:19:41', '2016-02-14 11:19:41', '2f44266535c6cd97860bcad8364b059a.png', '68500fd2dc5e290ea73249f778be1262.zip', 'fe0d3abd7487a600da88a0134fabe5cd'),
(38, 'Creativo - One Page Parallax Template', 5, '24,17,18,26', 1, 20, 1, '2016-02-13 16:14:42', '2016-02-13 16:14:42', '3101f3ca820bb7c5944e218c4fa3ccb8.png', '68500fd2dc5e290ea73249f778be1262.zip', '5d451dc05caef7e9a338f471cf40274c'),
(39, 'QueenAdmin - Beautiful Admin Dashboard', 3, '16,24,27,22', 1, 20, 1, '2016-01-21 20:20:25', '2016-01-21 20:20:25', '7b840dc778b2ccfa20a31b4925f6473c.png', '68500fd2dc5e290ea73249f778be1262.zip', '5177c93993d629c930e94599d1257cff'),
(40, 'Bahubali - Responsive Business Template', 5, '24,19,26,28', 1, 20, 1, '2016-01-21 20:22:53', '2016-01-21 20:22:53', 'd3d5bf0b86dff4e5d06685c8ff4653c4.png', '68500fd2dc5e290ea73249f778be1262.zip', 'cc2c87090a9d02cb2d123b2761b314a0'),
(41, 'Monster - Onepage Multipurpose Template', 5, '25,17,19,29', 1, 20, 1, '2016-02-13 16:22:49', '2016-02-13 16:22:49', 'e4cd024dd58ae056fcb808ccfddbaa96.png', '371393c52506e1799b8075ebbeff121b.zip', 'd2e69971ebb23cc729059d0888afa323'),
(42, 'Trend - Multi-Purpose HTML5 HTML Theme with Page Builder - See more at: https://shapebootstrap.net/i', 3, '16,25,17,19,29', 1, 20, 1, '2016-02-13 16:24:05', '2016-02-13 16:24:05', '67c727504d3ca317336abe2497056153.png', '371393c52506e1799b8075ebbeff121b.zip', '746f20c6df3e6e1d576b44f28d4174fc'),
(47, 'BizCraft - Responsive Html5 Template', 21, '24,27,17,22,28,20', 1, 20, 1, '2016-01-25 16:34:06', '2016-01-25 16:34:06', '79467f5bdcf027aeb490581c1277cb5f.png', '371393c52506e1799b8075ebbeff121b.zip', 'ad71350aa9d1c6f8ac91511dda0e3b35'),
(55, 'Ariane - Responsive Website Template', 21, '24,17,18,22,29', 1, 20, 1, '2016-02-16 07:58:23', '2016-02-16 07:58:23', '6f93c2f9a2a3a28a62f295c9af482b14.png', 'e17827de3a3a9a508899d2926e9bf39e.zip', '90efb91ef4e58427332b0a046c122a22'),
(56, 'Freedom - One Page Responsive Template', 2, '25,24,17,22', 1, 20, 1, '2016-02-16 08:00:32', '2016-02-16 08:00:32', '0b8916fc6748f5c9b4e7f3866c110ce7.png', '043718d1c3498ab720c3c2d84071928e.zip', '22433fef353928f046ad4cfd77c90cd8'),
(57, 'Canteen - Multipage Restaurant Template', 2, '25,24,27,17,18,22,26', 1, 20, 1, '2016-02-16 08:01:49', '2016-02-16 08:01:49', '0d23ead2aa045caf54f267ef0fcce5b0.png', '54219c49d0889d49112408c68bd7308d.zip', 'b0c9e99a6e55736c4324f7b962ff13cc'),
(58, 'Adminer - Angular Admin Template', 34, '16,25,24,27', 1, 20, 1, '2016-02-16 08:03:19', '2016-02-16 08:03:19', '4ebe04a801d8f949419ccf70628f9f0e.png', '73825f7ab54ea941f691094d855b6d63.zip', '0e1962b5501dc63f23a4c122666ec37f'),
(59, 'Superial - Responsive Admin Theme', 34, '16,25,24,27,17,18', 1, 20, 1, '2016-02-17 05:30:45', '2016-02-17 05:30:45', 'f9bc7b436f75f823daee8d714788d2dd.png', '7c04480cb0e90c629e309916605c505a.zip', '99c0568967df60d3cc76b6c480fb9d39'),
(60, 'Advantage - Responsive Admin Theme', 34, '16,25,24,27,17', 1, 20, 1, '2016-02-16 08:07:52', '2016-02-16 08:07:52', 'd6a203b47544130849aa19f8d192d405.png', '8c6121a9d793617920aa741f3a5b3c77.zip', '363305728b92f27560c2c06cac3c1361'),
(61, 'Hillock - Simple Creative One Page Template', 2, '25,24,18,22,19', 1, 20, 1, '2016-02-16 08:11:49', '2016-02-16 08:11:49', '004caa51dbcc79629e6530264fda7fee.png', 'fc193becd67b23ad14724a813c52f493.zip', '261ce408e9cca699fa43c2b3aa8dabf2'),
(62, 'Moon Digital - Photography Portfolio HTML5 Template - See more at: https://shapebootstrap.net/item/1', 2, '25,24,22,19,29', 1, 20, 1, '2016-02-16 08:12:51', '2016-02-16 08:12:51', '16d402fbda9149ae944a3e44a7fe5a8e.png', '8c14c14dc7d2a6f43d4df68c0c21eb46.zip', 'aca13c39bef82879b2eb1a1b401a7d47'),
(63, 'MARCOS - ONE PAGE RESPONSIVE HTML TEMPLATE', 2, '24,18,19,29,26', 1, 20, 1, '2016-02-16 08:14:17', '2016-02-16 08:14:17', 'd5ae6beef46217a8a7ae6666bc46748f.png', 'b9c78499f9589b6f501a582252d96d4f.zip', '05bd34218d9ad45446af003f5fae290a'),
(64, 'ME-Personal Portfolio', 35, '25,24,17,18,22', 1, 20, 1, '2016-02-16 08:16:59', '2016-02-16 08:16:59', '7ee80d4ee842306a0a465a0810cdc9a4.png', '7530d5ba0a9d36fec53a0a26d12ee8d4.zip', '3e71ff7d10d700e4212c29187d7bd0cf'),
(65, 'Traveler - Bootstrap responsive theme', 35, '25,27,18,22', 1, 20, 1, '2016-02-16 08:19:11', '2016-02-16 08:19:11', '7db7e977fe00d1fccb08acebef98910b.png', '8c9349ff898d54e1607419a3d9fad020.zip', '5f90780c8328852bc94995bb08ec3aa1'),
(66, 'Landscape design - parallax bootstrap responsive template - See more at: https://shapebootstrap.net/', 18, '25,24,27,18,19', 1, 20, 1, '2016-02-16 08:24:17', '2016-02-16 08:24:17', '4d4ac03abdcb4e321a4854086b3d5068.png', '17fede7e93d0e89e05853af2e16e8ce7.zip', '4bb185c62878670a63c8c4bf0ee9880e'),
(67, 'Fairness - One Page Responsive Bootstrap Charity Template - See more at: https://shapebootstrap.net/', 20, '16,25,24,27,18,19', 1, 20, 1, '2016-02-16 08:26:47', '2016-02-16 08:26:47', 'b605a1c7545c8579d7d25ae334fd74d2.png', 'b4bbb4af187fdad7bbee9303f173043e.zip', '297b1ba7ef774098dd138eb24fbee6c6'),
(68, 'Ada - Multipurpose Template', 20, '25,24,18,22,19', 1, 20, 1, '2016-02-16 08:28:46', '2016-02-16 08:28:46', '911457509d2ea7d98b8953a930c100eb.png', '1d42326d8adae2e88611f364f0a176a6.zip', '3eed7f606c13ed9da2c9e0bcc6075c7a'),
(71, 'RedBowl Restaurant - Responsive HTML5 Template', 37, '25,27,18,19', 0, 24, 0, '2016-02-16 08:41:20', '2016-02-16 08:41:20', '7626eacdb318268c041bfc7e8bdc2d3c.png', 'a5e08aca30b1a52633bdddb5e93290ea.zip', '56686ffeb82603c1012bf92990d3bc7c');

-- --------------------------------------------------------

--
-- Table structure for table `product_description`
--

CREATE TABLE IF NOT EXISTS `product_description` (
  `product_id` int(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  `total_sale` int(40) NOT NULL,
  `total_favorites` int(40) NOT NULL,
  `total_views` int(40) NOT NULL,
  `price` varchar(30) NOT NULL,
  `layout` varchar(40) NOT NULL,
  `high_resolution` varchar(40) NOT NULL,
  `bootstrap_version` varchar(40) NOT NULL,
  `compatable_browser` varchar(200) NOT NULL,
  `free_future_updates` tinyint(1) NOT NULL,
  `preview_link` varchar(1000) NOT NULL,
  `description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_description`
--

INSERT INTO `product_description` (`product_id`, `status`, `total_sale`, `total_favorites`, `total_views`, `price`, `layout`, `high_resolution`, `bootstrap_version`, `compatable_browser`, `free_future_updates`, `preview_link`, `description`) VALUES
(37, 'enabled', 0, 1, 0, 'Free', 'Responsive', 'Yes', 'Bootstrap 3.x', 'Google Chrome, Firefox, Opera', 1, 'www.facebook.com', '<p><strong>Shaes of Gray</strong> is a home page for a web design or developing or it related company. Shades of Gray is a modern, clean, stylish template built with bootstrap. <strong>Credits:</strong></p>\r\n\r\n<ul>\r\n <li>Bootstrap</li>\r\n <li>jQuery</li>\r\n <li>MixitUp</li>\r\n <li>Autofreefixer</li>\r\n <li>FontAwesome</li>\r\n <li>Popup Js</li>\r\n <li>SmoothScroll Js</li>\r\n <li>Loaders.css</li>\r\n</ul>\r\n\r\n<p>Images: Images are from various sources -</p>\r\n\r\n<ul>\r\n <li>Shutterstock</li>\r\n <li>pixabay</li>\r\n <li>Pexeles</li>\r\n <li>Stocksnap</li>\r\n</ul>\r\n'),
(38, 'enabled', 0, 0, 0, '25', 'Responsive', 'Yes', 'Bootstrap 3.x', 'Google Chrome, Firefox, IE10, Safari, Opera, Other', 0, 'www.google.com', '<p>Creativo is an advanced, responsive One Page Parallax Template built with Bootstrap 3.3. You can use Creativo for your projects, App or any other product promotion.it&#39;s an mobile friendly and ready for you to customize it any way you want to use it. Creativo comes with 12 different color brand new Layouts (One page & Multi Page)If a picture paints a thousand words a short video must paint ten thousand. The versatility and the amount of information one is able to communicate with this feature is practically limitless.</p>\r\n\r\n<p>Features :-</p>\r\n\r\n<ul>\r\n <li>W3C validated Creative and unique design</li>\r\n <li>12 New Layout Variations</li>\r\n <li>Fully Responsive & Mobile Friendly</li>\r\n <li>Google Maps Enabled</li>\r\n <li>Icon Packs, Font Awesome - 1600 Vector </li>\r\n <li>100% Fluid - Fits any device perfectly</li>\r\n <li>Sticky Headers</li>\r\n <li>Easy to customize</li>\r\n <li>Based on Bootstrap 3</li>\r\n</ul>\r\n'),
(39, 'enabled', 0, 1, 0, '16', 'Responsive', 'Yes', 'Bootstrap 3.x', 'Google Chrome, Firefox, Opera', 0, 'www.google.com', '<p>QueenAdmin is bootstrap responsive dashboard theme built with Sass and Compass. It has tons of features and ready-to-use ui elements, widgets, charts and pages.</p>\r\n\r\n<p><big>What&#39;s new in ver 1.2:</big></p>\r\n\r\n<ul>\r\n <li>ADDED fixed left navigation sidebar</li>\r\n <li>UPDATED Bootstrap to v3.3.6</li>\r\n <li>UPDATED Font Awesome to v4.5.0</li>\r\n <li>UPDATED Ionicons to v2.0.1</li>\r\n <li>UPDATED documentation</li>\r\n <li>Refer to changelog for complete list</li>\r\n</ul>\r\n\r\n<p><big>Features:</big></p>\r\n\r\n<p>QueenAdmin delivers so much features to on your project development.</p>\r\n\r\n<ul>\r\n <li>More widgets and portlets (10+ items)</li>\r\n <li>Menu levels</li>\r\n <li>Wizards (arrow and circle styles)</li>\r\n <li>Fixed top and fixed left navigation toggle at style switcher</li>\r\n <li>Stunning, clean and crisp design</li>\r\n <li>Responsive design</li>\r\n <li>Fancy form elements and form layout examples</li>\r\n <li>Form validation</li>\r\n <li>In-place editing field</li>\r\n</ul>\r\n'),
(40, 'enabled', 0, 1, 0, '16', 'Responsive', 'Yes', 'Bootstrap 3.x', 'Google Chrome, Firefox, Opera', 0, 'www.google.com', '<p><strong>Bahubali </strong>is a clean and modern Responsive Business Template. It is fully responsive with valid HTML5 / CSS3 codes and looks amazing on smartphone, tablet, and desktop.. Can be used as both: Light version or Dark version.</p>\r\n\r\n<p><strong><big>Features</big></strong></p>\r\n\r\n<ul>\r\n <li>One-Page template</li>\r\n</ul>\r\n\r\n<ul>\r\n <li>Based on Bootstrap 3.3.6</li>\r\n</ul>\r\n\r\n<ul>\r\n <li>Fullscreen Image Background</li>\r\n</ul>\r\n\r\n<ul>\r\n <li>Cross Browser Compatible</li>\r\n</ul>\r\n\r\n<ul>\r\n <li>HTML5 validation with w3.org</li>\r\n</ul>\r\n\r\n<ul>\r\n <li>Pricing table element</li>\r\n</ul>\r\n\r\n<ul>\r\n <li>Working PHP contact form</li>\r\n</ul>\r\n\r\n<ul>\r\n <li>Google Map</li>\r\n</ul>\r\n\r\n<ul>\r\n <li>Well Documentation</li>\r\n</ul>\r\n\r\n<ul>\r\n <li>24/7 Support</li>\r\n</ul>\r\n\r\n<p><strong>                                                                                                      </strong></p>\r\n'),
(41, 'enabled', 0, 0, 0, '20', 'Responsive', 'Yes', 'Bootstrap 3.x', 'Google Chrome, Firefox, IE10, Safari, Opera, Other', 1, 'www.google.com', '<p>Monster is a Fully Responsive, Modern and Multipurpose Template based on Bootstrap 3 framework created for Creative Professionals, Agencies, Content Creators and Photographers etc.</p>\r\n\r\n<p><strong><big>Main Features</big></strong></p>\r\n\r\n<ul>\r\n <li>Fully Responsive & Mobile-Friendly Design</li>\r\n <li>Cross-browser Compatible</li>\r\n <li>Mobile Browsers Compatible</li>\r\n <li>Built with Bootstrap 3</li>\r\n <li>Clean & Minimal Design</li>\r\n <li>Blog & Project Pages</li>\r\n <li>Smooth Scroll</li>\r\n <li>Sticky Menu</li>\r\n <li>Pricing Tables</li>\r\n <li>Free Custom Web Fonts</li>\r\n <li>Font Awesome Icons</li>\r\n <li>Smooth & Stunning Parallax</li>\r\n <li>Google Fonts</li>\r\n <li>Free Lifetime Updates and Support</li>\r\n <li>W3C Valid HTML Code</li>\r\n</ul>\r\n\r\n<p><strong><big>Source & Credits</big></strong></p>\r\n\r\n<p>I’ve used the following images, icons or other files as listed.</p>\r\n\r\n<ul>\r\n <li>Bootstrap 3</li>\r\n <li>W3C Valid HTML Code</li>\r\n</ul>\r\n'),
(42, 'enabled', 0, 0, 0, 'Free', 'Responsive', 'Yes', 'Bootstrap 3.x', 'Google Chrome, Firefox, Opera', 0, 'www.google.com', '<p>Trend is a powerful Multipurpose HTML 5 Template. Build whatever you like with this template that looks effortlessly on-point in Corporate, Business, Hosting, Construction, Sports, Lawyer, Landing App, Restaurant, Attorney, Medical, Portfolio, Blog, Shop, Charity, Fashion, App Showcase, Nonprofit organization, Freelancer or Resume, just everything is possible with TREND. With all it features you can build something great. It is ultimate flexible with loads of nice options and features.</p>\r\n\r\n<p><strong><big>New Feature</big></strong></p>\r\n\r\n<p> <strong><a href="http://ckthemes.com/html/trend-page-builder/">Page Builder </a></strong>added in the Theme. Create unlimited layouts.</p>\r\n\r\n<p><strong><big>Features</big></strong></p>\r\n\r\n<ul>\r\n <li>Multipurpose use, for business, corporate, agency, personal and more.</li>\r\n <li>Simple, clean and elegant design</li>\r\n <li>Ultra responsive design</li>\r\n <li>16 built-in color skins, creating your color skin is super easy</li>\r\n <li>18 Predefi</li>\r\n</ul>\r\n'),
(47, 'enabled', 0, 2, 0, '16', 'Responsive', 'Yes', 'Bootstrap 3.x', 'Google Chrome, Firefox, IE10, Safari, Opera, Other', 1, 'www.google.com', '<p>BizCraft is a stylish, modern and clients need html template built with clean and valid HTML5 & CSS3. It based on Twitter Bootstrap framework 3. This template can used for any kind of business, agency and startup company. There are lots of powerful features such as Hero slider, Carousel and Flex Slider, 4 Home variations, 2 stylish tab content, portfolio, pricing, blog, Landing Page, video background and more. Check out the live demo and enjoy it now !</p>\r\n\r\n<p><strong>Support</strong></p>\r\n\r\n<p>You can mail us to tripplesworld@gmail.com</p>\r\n\r\n<p><strong>Template Features</strong></p>\r\n\r\n<ul>\r\n <li>4 Home variation</li>\r\n <li>Multipage and OnePage</li>\r\n <li>HTML5 Validated</li>\r\n <li>Based on Twitter Bootstrap 3</li>\r\n <li>Responsive Template</li>\r\n <li>FontAwesome icons</li>\r\n <li>Portfolio Isotope</li>\r\n <li>Pricing Tables</li>\r\n <li>Landing Page</li>\r\n <li>Video Background</li>\r\n <li>Post Formats</li>\r\n <li>Prettyphoto integration</li>\r\n <li>Google Maps integration</li>\r\n</ul>\r\n'),
(55, 'enabled', 0, 0, 0, 'Free', 'Responsive', 'Yes', 'Bootstrap 2.x', 'Google Chrome, Firefox, IE10, Safari, Opera', 1, 'http://shapebootstrap.net/item/1525409-ariane-responsive-website-template/live-demo', '<p><strong>Ariane </strong>is a Simple, Creative, Clean Responsive Website Template. It is easy to customize, has awesome animations. The template is best suited for small startups & business usage. Take your perfect Responsive Website Template now.       </p>\r\n\r\n<h3><strong> </strong> What You Get</h3>\r\n\r\n<ul>\r\n <li>Clean and modern design</li>\r\n <li>Responsive HTML5 and CSS3 templates</li>\r\n <li>Cross Browser Compatible</li>\r\n <li>Clean code</li>\r\n <li>Easy to customise</li>\r\n <li>HTML5 validation</li>\r\n <li>Pricing table</li>\r\n <li>Contact form</li>\r\n <li>Google Map</li>\r\n <li>Well Documentation</li>\r\n <li>24/7 Support</li>\r\n</ul>\r\n\r\n<p><strong>Plugins</strong></p>\r\n\r\n<ul>\r\n <li>jQuery - <a href="http://jquery.com/" target="">http://jquery.com</a></li>\r\n <li>Bootstrap - <a href="http://getbootstrap.com/" target="">http://getbootstrap.com</a>  </li>\r\n <li>Magnific Popup - <a href="http://dimsemenov.com/plugins/magnific-popup" target="">http://dimsemenov.com/plugins/magnific-popup</a></li>\r\n <li>jquery countTo - <a href="https://github.com/mhuggins/jquery-countTo" target="">https://github.com/mhuggins/jquery-countTo</a></li>\r\n <li>jquery inview - <a href="https://github.com/protonet/jquery.inview" target="">https://github.com/protonet/jquery.inview</a></li>\r\n <li>jQuery appear - <a href="https://github.com/bas2k/jquery.appear" target="">https://github.com/bas2k/jquery.appear</a></li>\r\n <li>Wow Animate CSS - <a href="http://mynameismatthieu.com/WOW" target="">http://mynameismatthieu.com/WOW</a>    </li>\r\n</ul>\r\n\r\n<p> <strong>Images Credits</strong></p>\r\n\r\n<ul>\r\n <li>Pexels - <a href="https://www.pexels.com/" target="">https://www.pexels.com</a></li>\r\n</ul>\r\n\r\n<p><strong>Icons Credits</strong></p>\r\n\r\n<ul>\r\n <li>Font-Awesome - <a href="https://fortawesome.github.io/Font-Awesome/icons" target="">https://fortawesome.github.io/Font-Awesome/icons</a></li>\r\n</ul>\r\n\r\n<p><strong>Fonts Credits</strong></p>\r\n\r\n<ul>\r\n <li>Google fonts - <a href="https://www.google.com/fonts" target="">https://www.google.com/fonts</a></li>\r\n</ul>\r\n\r\n<p>- See more at: https://shapebootstrap.net/item/1525409-ariane-responsive-website-template#sthash.XXD8pEpv.dpuf</p>\r\n'),
(56, 'enabled', 0, 0, 0, '20', 'Responsive', 'Yes', 'Bootstrap 3.x', 'Google Chrome, Firefox, IE10, Safari, Opera', 0, 'https://shapebootstrap.net/item/1525417-freedom-one-page-responsive-template/live-demo', '<p><strong>Freedom – One Page Responsive Template</strong> is a Modern Multipurpose HTML Business Theme. This Template is Suited for any type of website, personal or business use. The Landing Page is designed with modern look and feel while keeping in mind to make it user friendly and eye catching so that people using it can get the best out of their website.</p>\r\n\r\n<p>We provide Full Life Time Customer Support and answer to Pre-Sale questions..</p>\r\n\r\n<p><strong>Features                              </strong></p>\r\n\r\n<p>·         One Page Template</p>\r\n\r\n<p>·         100% Responsive</p>\r\n\r\n<p>·         Clean Code</p>\r\n\r\n<p>·         Bootstrap 3 Framework</p>\r\n\r\n<p>·         Free PSD Included</p>\r\n\r\n<p>·         1170 Grid Based Design</p>\r\n\r\n<p>·         Browser Compatibility</p>\r\n\r\n<p>·         Fully Responsive Layout</p>\r\n\r\n<p>·         Blog page</p>\r\n\r\n<p>·         Retina Ready</p>\r\n\r\n<p>·         Pricing Tables</p>\r\n\r\n<p>·         Unique design</p>\r\n\r\n<p>·         Filterable Gallery</p>\r\n\r\n<p>·         Animations</p>\r\n\r\n<p><strong>Credits</strong></p>\r\n\r\n<p>·         Unsplash : <a href="http://www.unsplash.com/" target="_blank">http://www.unsplash.com</a></p>\r\n\r\n<p>·         Font Awesome: <a href="https://fortawesome.github.io/Font-Awesome/" target="_blank">https://fortawesome.github.io/Font-Awesome/</a></p>\r\n\r\n<p>·         Flat Icon: <a href="http://www.flaticon.com/" target="_blank">http://www.flaticon.com</a></p>\r\n\r\n<p>- See more at: https://shapebootstrap.net/item/1525417-freedom-one-page-responsive-template#sthash.q9Aj9fix.dpuf</p>\r\n'),
(57, 'enabled', 0, 0, 0, 'Free', 'Fluid', 'Yes', 'Bootstrap 2.x', 'Google Chrome, Firefox, IE10', 1, 'https://shapebootstrap.net/item/1525326-canteen-multipage-restaurant-template/live-demo', '<p><strong>Canteen </strong>has a professional multipurpose themes that are ideal for any restaurant business. It is bulit with Bootstrap 3 and includes lots of awesome features.</p>\r\n\r\n<h3>Features:</h3>\r\n\r\n<ul>\r\n <li>3 Variant Menu Pages  </li>\r\n <li>Clean Design</li>\r\n <li>Modularity   </li>\r\n <li>Clean Code</li>\r\n <li>Sticky Navigation   </li>\r\n <li>Easy to customize  </li>\r\n <li>Bootstrap 3  </li>\r\n <li>Fully Customizable   </li>\r\n <li>Google web Fonts   </li>\r\n <li>Fontawesome Fonts</li>\r\n <li>Browser Compatibility</li>\r\n</ul>\r\n\r\n<p>    and more … - See more at: https://shapebootstrap.net/item/1525326-canteen-multipage-restaurant-template#sthash.gEQBLMFE.dpuf</p>\r\n'),
(58, 'enabled', 0, 0, 0, 'Free', 'Responsive', 'Yes', 'Bootstrap 3.x', 'Google Chrome, Firefox, IE10, Safari, Opera, Other', 1, 'https://shapebootstrap.net/item/1525427-adminer-angular-admin-template/live-demo', '<p>Adminer is an advanced, responsive dashboard template built with Bootstrap 3 and AngularJS. </p>\r\n\r\n<p>You can use Adminer for your projects, web applications or as eCommerce dashboard. </p>\r\n\r\n<p>it&#39;s an mobile friendly and ready for you to customize it any way you want to use it. Adminer comes with 3 different layout style boxed, Horizontal and Wide.</p>\r\n\r\n<p>it offer ready to use widgets and components. available in 7 color schemes with 3 different style with each color.</p>\r\n\r\n<p>Features :-</p>\r\n\r\n<ol>\r\n <li>W3C validated</li>\r\n <li>3 Layout Variations</li>\r\n <li>Multiple Sidebars (Mini, Wide, Dark, White)</li>\r\n <li>Fully Responsive & Mobile Friendly</li>\r\n <li>Custom Calendar</li>\r\n <li>Sass (Scss) Files Included</li>\r\n <li>Bower & Grunt Development Setup Included</li>\r\n <li>Component Highlights</li>\r\n <li>Datepickers etc..</li>\r\n</ol>\r\n\r\n<p>- See more at: https://shapebootstrap.net/item/1525427-adminer-angular-admin-template#sthash.jArrZmWW.dpuf</p>\r\n'),
(59, 'enabled', 0, 0, 0, '14', 'Responsive', 'Yes', 'Bootstrap 3.x', 'Google Chrome, Firefox, IE10, Safari, Opera', 1, 'https://shapebootstrap.net/item/1525256-superial-responsive-admin-theme-3/live-demo', '<p><big>Introduction</big></p>\r\n\r\n<p>Superial is a responsive and multipurpose admin theme powered with Twitter Bootstrap v3.3.5 It can be used for for any type of web applications: custom admin panels, admin dashboards, CMS etc.. Superial has a clean and intuitive design which helps you to create an awesome and powerful project. Superial has a huge collection of plugins and UI components and works great on all major web browsers, tablets and phones.</p>\r\n\r\n<p><big>Features</big></p>\r\n\r\n<ul>\r\n <li>Responsive layout (desktops, tablets, mobile devices)</li>\r\n <li>Built with new Bootstrap 3.3.5</li>\r\n <li>HTML5 & CSS3</li>\r\n <li>Uses SASS</li>\r\n <li>Built in Gulp workflow</li>\r\n <li>Well structured code</li>\r\n <li>29 pages included</li>\r\n <li>4 different charts libraries</li>\r\n <li>Animations CSS3</li>\r\n <li>2 types of tables</li>\r\n <li>Gallery</li>\r\n <li>Tabs</li>\r\n <li>Modals</li>\r\n <li>Alerts</li>\r\n <li>E-commerce</li>\r\n <li>Todo list</li>\r\n <li>Mailbox</li>\r\n <li>User profile</li>\r\n <li>Widgets page</li>\r\n <li>Calendar</li>\r\n <li>and more...</li>\r\n</ul>\r\n\r\n<p><big>Pages</big></p>\r\n\r\n<ul>\r\n <li>alerts.html</li>\r\n <li>bars.html</li>\r\n <li>buttons.html</li>\r\n <li>calendar.html</li>\r\n <li>chartjs.html</li>\r\n <li>colors.html</li>\r\n <li>dashboard2.html</li>\r\n <li>dashboard3.html</li>\r\n <li>datatables.html</li>\r\n <li>flotchart.html</li>\r\n <li>formelements.html</li>\r\n <li>gallery.html</li>\r\n <li>grid.html</li>\r\n <li>index.html</li>\r\n <li>mail_detail.html</li>\r\n <li>mailbox.html</li>\r\n <li>modal.html</li>\r\n <li>morrischart.html</li>\r\n <li>orders.html</li>\r\n <li>orderview.html</li>\r\n <li>registration.html</li>\r\n <li>sale_rates.html</li>\r\n <li>sparklineschart.html</li>\r\n <li>tables.html</li>\r\n <li>tabs.html</li>\r\n <li>tasks.html</li>\r\n <li>typography.html</li>\r\n <li>user.html</li>\r\n <li>widgets.html</li>\r\n</ul>\r\n\r\n<p><big>Credits</big></p>\r\n\r\n<p><a href="http://getbootstrap.com/">Twitter Bootstrap</a> - Css front-end framework.</p>\r\n\r\n<p><a href="http://gulpjs.com/">Gulp.js</a> - The streaming build system</p>\r\n\r\n<p><a href="http://sass-lang.com/">SASS</a> - CSS pre-processor system</p>\r\n\r\n<p><a href="https://daneden.github.io/animate.css/">AnimateCSS</a> - Collection of CSS3 animations</p>\r\n\r\n<p><a href="https://eonasdan.github.io/bootstrap-datetimepicker/">Bootstrap 3 Datepicker</a> - Datepicker</p>\r\n\r\n<p><a href="https://www.datatables.net/manual/styling/bootstrap">DataTables</a> - Datatables for bootstrap</p>\r\n\r\n<p><a href="https://flotcharts.org/">Flot</a> - Simple but powerful chart plugin</p>\r\n\r\n<p><a href="http://fortawesome.github.io/Font-Awesome/">Font Awesome</a> - The iconic font and CSS toolkit</p>\r\n\r\n<p><a href="https://icomoon.io/">Icomoon</a> - Custom icon fonts</p>\r\n\r\n<p><a href="http://fullcalendar.io/">FullCalendar</a> - A JavaScript event calendar.</p>\r\n\r\n<p><a href="https://github.com/afarkas/html5shiv">HTML5 Shiv</a> - Basic HTML5 styling for old browsers</p>\r\n\r\n<p><a href="http://ionden.com/a/plugins/ion.rangeSlider">Ion.RangeSlider</a> - Easy, flexible and responsive range slider</p>\r\n\r\n<p><a href="https://jquery.com/">Jquery</a> - Fast, small, and feature-rich JavaScript library</p>\r\n\r\n<p><a href="https://jqueryui.com/">Jquery UI</a> - Set of user interface interactions, effects, widgets, and themes built on top of the jQuery</p>\r\n\r\n<p><a href="http://jqueryvalidation.org/">jQuery Validation</a> - Form validation with jQuery</p>\r\n\r\n<p><a href="https://github.com/onokumus/metisMenu">MetisMenu</a> - A jQuery menu plugin</p>\r\n\r\n<p><a href="http://momentjs.com/">MomentJs</a> - Display dates in JavaScript</p>\r\n\r\n<p><a href="https://github.com/scottjehl/Respond">Respond.js</a> - Polyfill for min/max-width CSS3 Media Queries</p>\r\n\r\n<p><a href="http://simpleweatherjs.com/">Simple Weather</a> - Current weather data for any location</p>\r\n\r\n<p><a href="http://rocha.la/jQuery-slimScroll">jQuery slimScroll</a> - Nice scrollbar</p>\r\n\r\n<p><a href="https://snazzymaps.com/">Snazzy maps</a> - Free styles for google maps</p>\r\n\r\n<p><a href="http://omnipotent.net/jquery.sparkline/">Sparkline</a> - Small inline charts</p>\r\n\r\n<p><a href="http://morrisjs.github.io/morris.js/">Morris.js</a> - Good-looking charts shouldn&#39;t be difficult</p>\r\n\r\n<p><a href="http://www.chartjs.org/">Chart.js</a> - Simple, clean and engaging charts for designers and developers</p>\r\n\r\n<p><a href="http://t4t5.github.io/sweetalert">Sweet Alerts</a> - Alerts</p>\r\n\r\n<p><a href="http://fian.my.id/Waves">Waves</a> - Click effect for buttons</p>\r\n\r\n<p><a href="http://summernote.org/">Summernote</a> - WYSIWYG Editor on Bootstrap</p>\r\n\r\n<p>- See more at: https://shapebootstrap.net/item/1525256-superial-responsive-admin-theme#sthash.jAG9Ny35.dpuf</p>\r\n'),
(60, 'enabled', 0, 1, 0, 'Free', 'Responsive', 'Yes', 'Bootstrap 3.x', 'Google Chrome, Firefox, IE10, Opera', 1, 'www.themeforest.com', '<h2>Features </h2>\r\n\r\n<ol>\r\n <li>Responsive layout (desktops, tablets, mobile devices)</li>\r\n <li>Built with new Bootstrap 3.3.5</li>\r\n <li>HTML5 & CSS3</li>\r\n <li>Uses SASS</li>\r\n <li>Built in Gulp workflow</li>\r\n <li>Well structured code</li>\r\n <li>40 pages included</li>\r\n <li>4 different charts libraries</li>\r\n <li>Animations CSS3</li>\r\n <li>2 types of tables</li>\r\n <li>Timeline design</li>\r\n <li>JQuery Validation</li>\r\n <li>Awesome mailbox app</li>\r\n <li>User profile</li>\r\n <li>Widgets page</li>\r\n <li>Form validation</li>\r\n <li>Projects list</li>\r\n <li>Calendar app</li>\r\n <li>NotificationsLogin, register, error pages</li>\r\n <li>And more...</li>\r\n</ol>\r\n\r\n<h2> Pages </h2>\r\n\r\n<ol>\r\n <li>Animations</li>\r\n <li>Breadcrumbs</li>\r\n <li>Buttons</li>\r\n <li>Calendar</li>\r\n <li>Chartjs</li>\r\n <li>Flotjs</li>\r\n <li>Morrisjs</li>\r\n <li>Chat</li>\r\n <li>Colors</li>\r\n <li>Components</li>\r\n <li>Contacts</li>\r\n <li>Dashboard v1</li>\r\n <li>Dashboard v2</li>\r\n <li>Dashboard v3</li>\r\n <li>Datatables</li>\r\n <li>Email app</li>\r\n <li>Email compose</li>\r\n <li>Email inbox</li>\r\n <li>Email view</li>\r\n <li>Form elements</li>\r\n <li>Grids</li>\r\n <li>Icons</li>\r\n <li>Mailbox</li>\r\n <li>Media</li>\r\n <li>Nav buttons</li>\r\n <li>Notifications</li>\r\n <li>Panels</li>\r\n <li>Profile</li>\r\n <li>Projects</li>\r\n <li>Sliders</li>\r\n <li>Tables</li>\r\n <li>Tabs</li>\r\n <li>Timeline</li>\r\n <li>Todo list</li>\r\n <li>Typography</li>\r\n <li>Widgets</li>\r\n <li>Wizard</li>\r\n <li>404</li>\r\n <li>Registration</li>\r\n <li>Login</li>\r\n</ol>\r\n\r\n<p>- See more at: https://shapebootstrap.net/item/1525214-advantage-responsive-admin-theme#sthash.TUaWAcXK.dpuf</p>\r\n'),
(61, 'enabled', 0, 0, 0, 'Free', 'Fluid', 'Yes', 'Bootstrap 3.x', 'Google Chrome, Firefox, IE10, Safari, Opera', 1, 'www.themeforest.com', '<p><strong>Hillock</strong> is a modernistic one page HTML Template powered by Bootstrap for creative agencies, corporate company, small business or as personal portfolio for a freelancer. Perfect for showing off your latest projects/works in all their glory with the responsive portfolio grid style.The template is responsive, you can view it also in the mobile or tablets devices and it looks very in those devices. All the HTML ,CSS, JavaScript codes are well organized and commented to make any change easy to do without any problems. with an emphasis on typography and attention to detail. Show off your latest photos and videos in all their glory with the responsive portfolio grid. Write blog posts with the beautiful, minimal blog.</p>\r\n\r\n<p>Quick Look</p>\r\n\r\n<ul>\r\n <li>Powerful & Super Lightweight</li>\r\n <li>Powered by Bootstrap</li>\r\n <li>100% Responsive Layout</li>\r\n <li>Simple & Minimalistic</li>\r\n <li>3 (Three) Home Version</li>\r\n <li>Blazing Fast & Optimised</li>\r\n <li>Isotope Portfolio Grid</li>\r\n <li>Awesome single portfolio modal</li>\r\n <li>Smooth Scroll</li>\r\n <li>Beautiful & minimal blog</li>\r\n <li>Contact form is dynamic</li>\r\n <li>Dedicated Support</li>\r\n</ul>\r\n\r\n<p>- See more at: https://shapebootstrap.net/item/1525434-hillock-simple-creative-one-page-template#sthash.zlVIieXb.dpuf</p>\r\n'),
(62, 'enabled', 0, 0, 0, '35', 'Fluid', 'No', 'Bootstrap 3.x', 'Google Chrome, Firefox, IE10, Safari, Opera, Other', 0, 'www.facebook.com', '<p>Thank you so much for downloading this template called Moon Digital - Photography Portfolio HTML5 Template. Please feel free to contact us if you have question or problem about this template. No guarantees, but we will do our best to provide you with the best possible assistance.</p>\r\n\r\n<ul>\r\n <li>HTML5 and CSS3 Validated</li>\r\n <li>Responsive Template</li>\r\n <li>Multi Page Template</li>\r\n <li>Built on Bootstrap 3.3.6</li>\r\n <li>479 icons (based on FontAwesome)</li>\r\n <li>10 Themes color variation</li>\r\n <li>Flickity Slider</li>\r\n <li>Tosrus Slider</li>\r\n <li>Home Page</li>\r\n <li>Portfolio Page</li>\r\n <li>About Page</li>\r\n <li>Contact Page</li>\r\n <li>Google Maps integration</li>\r\n <li>Google Web Fonts</li>\r\n</ul>\r\n\r\n<p>- See more at: https://shapebootstrap.net/item/1525407-moon-digital-photography-portfolio-html5-template#sthash.d91LBzeI.dpuf</p>\r\n'),
(63, 'enabled', 0, 0, 0, '30', 'Responsive', 'Yes', 'Bootstrap 2.x', 'Google Chrome, Firefox, IE10, Safari, Opera, Other', 1, 'www.gmail.com', '<p><strong>Marcos - One Page Responsive HTML Template</strong></p>\r\n\r\n<p>Based on Bootstrap’s 12 column Responsive grid Template, Marcos - One Page Responsive HTML Template has awesome design for each of your ideas. It is designed for corporate and business websites, blogs, own portfolio purpose and much more. The template is fully prepared for development, converting to WordPress, Joomla, Drupal and any other CMS. Template has responsive design build on Bootstrap 3, 1170px Grid. You may buy this template for many purposes: Web App, Mobile Development, Start Up Project, Portfolio, or your own product. This Bootstrap 3 Template has development is much easier than you think.</p>\r\n\r\n<p>This theme will be available in HTML and WP version as soon as possible. Stay tuned!</p>\r\n\r\n<p>Thank you for purchasing my Template. If you have any questions that are beyond the scope of this help file, please feel free to email via my user Page Contact form here. Thank you so much!</p>\r\n\r\n<p>If you like this template...</p>\r\n\r\n<p>Please Don’t Forget to Rate it!</p>\r\n\r\n<p> </p>\r\n\r\n<h3>Features</h3>\r\n\r\n<ul>\r\n <li>06 Home Page Variations with Slider</li>\r\n <li>Boxed Page Variation</li>\r\n <li>HTML5 Valid Pages(CSS3)</li>\r\n <li>Working Contact Form</li>\r\n <li>06 Different Colour Variations</li>\r\n <li>Responsive Slider</li>\r\n <li>Hide Menu</li>\r\n <li>Fully Responsive template</li>\r\n <li>Nice JQuery files: Responsive Slider, Preloader, Menu…</li>\r\n <li>Google Web Fonts</li>\r\n <li>Compatible With Major Modern Browsers</li>\r\n <li>Easy to Use and Easy to Customize</li>\r\n <li>100% Support</li>\r\n <li>All files are well commented and organized</li>\r\n <li>Page Templates (Blog, Home Page, Contact us etc.)</li>\r\n <li>Parallax Section</li>\r\n <li>Active and Hover Options</li>\r\n</ul>\r\n\r\n<p>- See more at: https://shapebootstrap.net/item/1525337-marcos-one-page-responsive-html-template#sthash.CePhROka.dpuf</p>\r\n'),
(64, 'enabled', 0, 0, 0, '25', 'Responsive', 'Yes', 'Bootstrap 3.x', 'Google Chrome, Firefox, Safari, Opera', 0, 'www.yahoo.com', '<h3>Key Features</h3>\r\n\r\n<ul>\r\n <li>Responsive layout</li>\r\n <li>No Code Knowledge needed for Using This theme</li>\r\n <li>Parallax Design</li>\r\n <li>Static image background</li>\r\n <li>Integrated with FontAwesome</li>\r\n <li>Fully Responsive</li>\r\n <li>Free Support 24/7</li>\r\n <li>Easy Code</li>\r\n <li>100% Responsive with Bootstrap 3.X</li>\r\n <li>Cross Browser</li>\r\n</ul>\r\n\r\n<p>- See more at: https://shapebootstrap.net/item/1525271-me-personal-portfolio#sthash.1layc5wF.dpuf</p>\r\n'),
(65, 'enabled', 0, 0, 0, 'Free', 'Responsive', 'Yes', 'Bootstrap 3.x', 'Google Chrome, Firefox, Opera', 0, 'www.metrouni.edu.bd', '<h2>Traveler - Bootstrap theme</h2>\r\n\r\n<p>Traveler is a clean responsive bootstrap theme perfect for travel agency, travel bogs, tour operator and all other businesses</p>\r\n\r\n<p>Template package include:</p>\r\n\r\n<ul>\r\n <li>7 pages design in .psd format;</li>\r\n <li>all original files;</li>\r\n <li>working contact form realised in PHP</li>\r\n <li>working photo gallery;</li>\r\n <li>all content images (all images are legal and has bought from <a href="http://www.yaymicro.com/">www.yaymicro.com</a>)</li>\r\n</ul>\r\n\r\n<p>- See more at: https://shapebootstrap.net/item/1525080-traveler-bootstrap-responsive-theme#sthash.0eSwtDlh.dpuf</p>\r\n'),
(66, 'enabled', 0, 0, 0, 'Free', 'Fluid', 'Yes', 'Bootstrap 3.x', 'Google Chrome, Firefox, Safari, Other', 1, 'www.google.com', '<p><strong>Landscape design - parallax bootstrap responsive template</strong>Template package includes:</p>\r\n\r\n<ul>\r\n <li>6 page design in PSD format;</li>\r\n <li>working contact form realised in php;</li>\r\n <li>working search form realised in php;</li>\r\n <li>7 original pages;</li>\r\n <li>+ 404.html page;</li>\r\n <li>working photo gallery with categories;</li>\r\n <li>3 month free host account at <a href="http://www.m9host.com/">www.m9host.com</a>;</li>\r\n <li>all content images (all images are legal and has bought from <a href="http://www.yaymicro.com/">www.yaymicro.com</a>);</li>\r\n</ul>\r\n\r\n<p>- See more at: https://shapebootstrap.net/item/1525079-landscape-design-parallax-bootstrap-responsive-template#sthash.vchvC8dR.dpuf</p>\r\n'),
(67, 'enabled', 0, 0, 0, '12', 'Responsive', 'Yes', 'Bootstrap 3.x', 'Google Chrome, Firefox, Safari, Opera, Other', 1, 'www.google.com', '<p>Fairness - is a clean and professional Bootstrap template suitable for Charity, NGO, Foundations, non-profit, Donation and fundraising websites etc. It’s created by using the latest HTML5, CSS3 and Bootratap Framework techniques. The responsive design makes it easily usable with any device (Desktop, tablet, mobile phone…), without removing any content!</p>\r\n\r\n<h2>Main Features</h2>\r\n\r\n<p>===========================</p>\r\n\r\n<ul>\r\n <li>Modern and elegant Design</li>\r\n <li>HTML5 and CSS3</li>\r\n <li>Bootstrap 3</li>\r\n <li>Cross Browser Support</li>\r\n <li>Responsive Design</li>\r\n <li>PHP contact form</li>\r\n <li>100% validate Code by W3 validator</li>\r\n <li>Google Fonts Support</li>\r\n <li>Isotope portfolio filtering</li>\r\n <li>Includes Font Awesome</li>\r\n <li>Smooth Scroll</li>\r\n <li>Fresh and Clean Code</li>\r\n <li>Code easy to customize</li>\r\n <li>All files are well commented and organized</li>\r\n</ul>\r\n\r\n<h2>Credits</h2>\r\n\r\n<p>===========================</p>\r\n\r\n<ul>\r\n <li>Bootstrap Framework</li>\r\n <li>jQuery</li>\r\n <li>jQuery prettyPhoto</li>\r\n <li>Font Awesome</li>\r\n <li>Animate css</li>\r\n <li>Isotope</li>\r\n <li>owl carousel</li>\r\n <li>Free photo <a href="https://pixabay.com/">pixabay</a></li>\r\n <li>Google fonts (Lato, Raleway)</li>\r\n</ul>\r\n\r\n<p>- See more at: https://shapebootstrap.net/item/1525131-fairness-one-page-responsive-bootstrap-charity-template#sthash.vA6201h8.dpuf</p>\r\n'),
(68, 'enabled', 0, 0, 0, 'Free', 'Responsive', 'Yes', 'Bootstrap 2.x', 'Google Chrome, Firefox, IE10, Safari, Other', 0, 'www.gmail.com', '<p>Ada is a powerful Multipurpose Responsive Bootstrap Template. Is coded with latest HTML5 and CSS3 techniques, and is build on top of twitter bootstrap. Code is SEO Optimized well organized and comentet well. Ada comes with many features, you can build anything you want! what you need is you imagination! Ada also comes with some incredible premium plugins like (cubeportfolio - $16), (CloudSlider - $10). - See more at: https://shapebootstrap.net/item/1525405-ada-multipurpose-template#sthash.6YHxs264.dpuf</p>\r\n\r\n<h2>Features</h2>\r\n\r\n<ul>\r\n <li>100+ HTML files</li>\r\n <li>Cloud Slider ($10)</li>\r\n <li>Cube Portfolio ($16)</li>\r\n <li>9 Home Pages (and more will come)</li>\r\n <li>Footer Options</li>\r\n <li>Ecomerce Pages</li>\r\n <li>Different Backgrounds (video, dark, gray, color, light, image, image with layer)</li>\r\n <li>1000+ Icons (Fontawesome Glyphicons, IonIcons)</li>\r\n <li>Graphs/ Charts</li>\r\n <li>Text Rotators</li>\r\n <li>40+ Components file</li>\r\n</ul>\r\n\r\n<p>- See more at: https://shapebootstrap.net/item/1525405-ada-multipurpose-template#sthash.6YHxs264.dpuf</p>\r\n'),
(71, 'enabled', 0, 0, 0, 'Pending', 'Fluid', 'Yes', 'Bootstrap 3.x', 'Google Chrome, Firefox, IE10, Safari', 1, 'www.gmail.com', '<p><strong>REDBOWL</strong> is a Responsive <strong>HTML5 & CSS3 </strong>Web <strong>RESTAURANT</strong> template. It comes with subtle design and clean coding structure. All the features here are unique and ready to use. You can synchronize all the codes easily and in fastest time without any hassle. This is OK tested with all major browsers and devices ( ipad, iphone, galaxy tab etc). If you thinking about small or big Restaurant Business, REDBOWL is here to support you. Thinking about support?? We are here to support you for any purposes.</p>\r\n\r\n<h3>Feature</h3>\r\n\r\n<p>1. HTML5 & CSS3 based template2. Super Unique Slideshow3. Multiple layout options4. Fully Responsive5. Fully compatible with all major browsers6. Well Documented.</p>\r\n\r\n<h3>Source and Credits</h3>\r\n\r\n<p>1.Images used in preview from <a href="http://hdwallpapersfactory.com/" target="">http://hdwallpapersfactory.com/</a>2. Font Awesome Icons <a href="https://github.com/FortAwesome/Font-Awesome/" target="">https://github.com/FortAwesome/Font-Awesome/</a>3. Content used from <a href="http://lipsum.com/" target="">http://lipsum.com/</a>4. Typography from <a href="https://github.com/twbs/bootstrap" target="">https://github.com/twbs/bootstrap</a>5. Slide Script <a href="http://iprodev.com/" target="">http://iprodev.com/</a> - See more at: https://shapebootstrap.net/item/1525354-redbowl-restaurant-responsive-html5-template#sthash.6eKEiohV.dpuf</p>\r\n'),
(72, 'enabled', 0, 0, 0, 'Free', 'Responsive', 'Yes', 'Bootstrap 3.x', 'Firefox, Safari, Opera', 0, 'www.yahoo.com', '<p><strong>Clarity</strong> is a Multipurpose Template that can be used in any niche site like Business, Agency, Construction and more it Have Single Page that Perfect for Agency or Portfolio Site, This theme has minimal design so that developers can easily change the colors or styles anytime.<strong>Features</strong></p>\r\n\r\n<ul>\r\n <li>180 + Valid HTML / CSS Pages</li>\r\n <li>Wide / Box Layout</li>\r\n <li>14 Ready to use Homepage</li>\r\n <li>One Page Light / Dark Version</li>\r\n <li>Shop Pages</li>\r\n <li>Agency Light / Dark Version</li>\r\n <li>Working Contact Form</li>\r\n <li>Filterable Portfolio</li>\r\n <li>Copy Paste Codes</li>\r\n <li>Coming Soon Page</li>\r\n <li>4 Navigation Styles</li>\r\n <li>6 Header Styles</li>\r\n <li>6 Footer Styles</li>\r\n <li>Lot of Shortcode</li>\r\n <li>and More...</li>\r\n</ul>\r\n\r\n<p>- See more at: https://shapebootstrap.net/item/1525370-clarity-multipurpose-theme#sthash.09LXIVSR.dpuf</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `product_tags`
--

CREATE TABLE IF NOT EXISTS `product_tags` (
  `product_id` int(50) NOT NULL,
  `tag_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_tags`
--

INSERT INTO `product_tags` (`product_id`, `tag_id`) VALUES
(20, 13),
(25, 5),
(15, 12),
(26, 45),
(48, 24),
(65, 42),
(78, 45),
(14, 16),
(12, 24),
(36, 25),
(24, 26),
(20, 15),
(20, 32),
(25, 12),
(25, 17),
(25, 45),
(25, 17),
(22, 24),
(22, 14),
(22, 32),
(22, 46),
(29, 22),
(29, 21),
(29, 12),
(29, 16);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(400) NOT NULL,
  `category_id` int(11) NOT NULL,
  `customer_un` varchar(100) NOT NULL,
  `payment` varchar(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` varchar(8) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`, `status`, `date_added`) VALUES
(16, 'Admin Template', 'enabled', '2016-01-09 17:04:38'),
(17, 'Corporate', 'enabled', '2016-01-09 17:04:45'),
(18, 'Creative', 'enabled', '2016-01-09 17:04:52'),
(19, 'Education', 'enabled', '2016-01-09 17:04:58'),
(20, 'Non profit', 'enabled', '2016-01-09 17:05:08'),
(21, 'Wedding', 'disabled', '2016-01-09 17:05:16'),
(22, 'Dashboard', 'enabled', '2016-01-10 19:34:42'),
(23, 'One Page', 'enabled', '2016-01-10 19:34:53'),
(24, 'Bootstrap', 'enabled', '2016-01-10 19:35:02'),
(25, 'Animated', 'enabled', '2016-01-10 19:35:26'),
(26, 'HTML5', 'enabled', '2016-01-10 19:35:33'),
(27, 'Control Panel', 'enabled', '2016-01-10 19:35:44'),
(28, 'Multipurpose', 'enabled', '2016-01-10 19:36:17'),
(29, 'free', 'enabled', '2016-01-10 19:36:28'),
(30, 'xxxxxxxxxxx', 'enabled', '2016-01-12 17:30:36'),
(31, 'yyyyyyyyyyyyy', 'enabled', '2016-01-12 17:30:41'),
(32, 'zzzzzzzzzzzzzzz', 'enabled', '2016-01-12 17:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `u_n` varchar(20) NOT NULL,
  `pas` varchar(250) NOT NULL,
  `token` varchar(250) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `email`, `u_n`, `pas`, `token`, `type`, `date`) VALUES
(20, 'ahmed_monjur@live.com', 'monjur', '$6$rounds=4567$abcdefghijklmnop$bVOJUERoKSL1T1TtXi6EgrOSB9LvqHou3Hj3Y5TnWMm0oo1w7w.6rZy4d0lALIRIRBO2HATiZmnetnVmz9D3E/', '2a9b538dee1e1ad270f7525a99ea3e93', 'superadmin', '2016-01-05 04:29:25'),
(22, 'ahmed.monjur2a@live.com', 'ahmed', '$6$rounds=4567$abcdefghijklmnop$bVOJUERoKSL1T1TtXi6EgrOSB9LvqHou3Hj3Y5TnWMm0oo1w7w.6rZy4d0lALIRIRBO2HATiZmnetnVmz9D3E/', '0b487a914f22ad4054f98118fe2fe077', 'admin', '2016-01-19 07:16:15');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
