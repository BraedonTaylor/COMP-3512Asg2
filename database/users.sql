-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 12:21 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment_two`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `salt` varchar(50) DEFAULT NULL,
  `password_sha256` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `city`, `country`, `email`, `password`, `salt`, `password_sha256`) VALUES
(1, 'Honey', 'Kyllford', 'Calgary', 'Canada', 'hemmens0@de.vu', '$2a$12$F.jpatdVlOnrYWLi/lxPNO90T0auUpFnDP5JTb3aTx7z1QSu5nX42', '048d741e931f907110adf460816ff958', '1b7f054c4c6a92aeb1813ccf0b162cab31cdb9cad0a6cd3820a724f0819af20c'),
(2, 'Gaylene', 'Walenta', 'Seattle', 'United States', 'gcrannage1@mit.edu', '$2a$12$o9lzPmLOFgpODyhYHUOXO.wojqkQph.fBZKO8k83hromrC0bC4TFi', '9bce2f838034b8c8d2ba1220daef2e7e', 'b3efa8c9c09f76778fdd7f70b340c69a03d48861d2424bb5f4f4cd0d7ce11c06'),
(3, 'Moyra', 'Coo', 'Chicago', 'United States', 'mbrocket2@deviantart.com', '$2a$12$QYTq9bIvZ/asycZCoh.GAOhsycshCzvEahXvXRrCczdqnGFdZ0XVS', 'c3a10800118c3bc6c50b1ac82d31e4a6', 'b8e62ee19ebbc23976b21e0820723405e27de1d4f2fd24e4e1f456c129cee82c'),
(4, 'Melisenda', 'Clissold', 'Dallas', 'United States', 'mbeekman3@patch.com', '$2a$12$43FcE3LDDWlev12JkV4qae45LouL6pbXz/GeE4vSNT56OU1tAzdW2', 'd24e7731e8051cf253ca8e89e0dd0be9', 'e7a6803fc7d3db79780e300167aa8d05efebcffe5dba3a760f4f8eafe84a1af6'),
(5, 'Shaina', 'Houlaghan', 'Calgary', 'Canada', 'sfolbigg4@histats.com', '$2a$12$FbS.fUfQT9Aq9D8REtRx5udl4wKwxKwSuhgEe1Ef0EPcGDZoB8GCS', 'b3f2be95228f481bc544154fa77b56c6', 'c7c097bac3f74fb336965b98de2aa84afa6bae00651761be7277bc464869efce'),
(6, 'Annadiane', 'Humpage', 'Birmingham', 'United States', 'abaudic5@yellowpages.com', '$2a$12$TnZVOMj5H27JLk/IHtEsD.1cVrSuvToa9dAyM8QbENRXP74MVT5cm', '231e1ed0db2b5dc8193ac7c78071aea4', '62f5f09daf08a97ef8471d76ebf625bdaab121451bfd062d5a138bf04e30f8a1'),
(7, 'Heath', 'Craney', 'Denver', 'United States', 'hpenbarthy6@nationalgeographic.com', '$2a$12$F.jpatdVlOnrYWLi/lxPNO90T0auUpFnDP5JTb3aTx7z1QSu5nX42', '7f9301cbee13b0afb7e7c79aa65c9483', 'ee3f23dcb0a13743fc84384ab46244b03ede2ee1bc56f6c77af906140fc78f94'),
(8, 'Ronnica', 'MacGorley', 'Boston', 'United States', 'rlamas7@nyu.edu', '$2y$12$xpmpbRqGQx4Oc0DWl6i27egN/hBRkIEA6sYQo4zbKLXyGJRNY6voO', '1fc0e8b9a5704994608c34a189228f51', 'fb78347933ba30fd2ac53bd1d98581bbd612721f2ca177e87913c5a7773e6e40'),
(9, 'Lynn', 'Wignall', 'New York City', 'United States', 'lbroadbury8@smugmug.com', '$2y$12$qzh6jvFIvGSKtSpr4SOBcuPgZ0N/zRfwTq594pV2oz59JQwGBEakW', '23a56dcf9c599bf803f2b7abf1db4b79', 'c46a4d121688f1fe18d23d35af64a74325255a4dbea07f6b18640ca055c54b68'),
(10, 'Ashli', 'Raymont', 'Miami', 'United States', 'asherland9@jalbum.net', '$2y$12$ZhfTqJ3svu5zPT3/rxJko.fsw1Pt1mLyrMlQh5Wv.6AqE9bvWDxbm', 'ea9f13c97a277bb3917b63a2a1234b39', '746848aba0c93093bbba9dd75f41e687f1651b5888d06c10a21b65d80005e1ee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
