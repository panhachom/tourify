-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 08:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', NULL, NULL),
(2, 'Albania', NULL, NULL),
(3, 'Algeria', NULL, NULL),
(4, 'Andorra', NULL, NULL),
(5, 'Angola', NULL, NULL),
(6, 'Antigua and Barbuda', NULL, NULL),
(7, 'Argentina', NULL, NULL),
(8, 'Armenia', NULL, NULL),
(9, 'Australia', NULL, NULL),
(10, 'Austria', NULL, NULL),
(11, 'Azerbaijan', NULL, NULL),
(12, 'Bahamas', NULL, NULL),
(13, 'Bahrain', NULL, NULL),
(14, 'Bangladesh', NULL, NULL),
(15, 'Barbados', NULL, NULL),
(16, 'Belarus', NULL, NULL),
(17, 'Belgium', NULL, NULL),
(18, 'Belize', NULL, NULL),
(19, 'Benin', NULL, NULL),
(20, 'Bhutan', NULL, NULL),
(21, 'Bolivia', NULL, NULL),
(22, 'Bosnia and Herzegovina', NULL, NULL),
(23, 'Botswana', NULL, NULL),
(24, 'Brazil', NULL, NULL),
(25, 'Brunei Darussalam', NULL, NULL),
(26, 'Bulgaria', NULL, NULL),
(27, 'Burkina Faso', NULL, NULL),
(28, 'Burundi', NULL, NULL),
(29, 'Cabo Verde', NULL, NULL),
(30, 'Cambodia', NULL, NULL),
(31, 'Cameroon', NULL, NULL),
(32, 'Canada', NULL, NULL),
(33, 'Central African Republic (CAR)', NULL, NULL),
(34, 'Chad', NULL, NULL),
(35, 'Chile', NULL, NULL),
(36, 'China', NULL, NULL),
(37, 'Colombia', NULL, NULL),
(38, 'Comoros', NULL, NULL),
(39, 'Congo, Democratic Republic of the', NULL, NULL),
(40, 'Congo, Republic of the', NULL, NULL),
(41, 'Costa Rica', NULL, NULL),
(42, 'Cote dIvoire', NULL, NULL),
(43, 'Croatia', NULL, NULL),
(44, 'Cuba', NULL, NULL),
(45, 'Cyprus', NULL, NULL),
(46, 'Czech Republic', NULL, NULL),
(47, 'Denmark', NULL, NULL),
(48, 'Djibouti', NULL, NULL),
(49, 'Dominica', NULL, NULL),
(50, 'Dominican Republic', NULL, NULL),
(51, 'Ecuador', NULL, NULL),
(52, 'Egypt', NULL, NULL),
(53, 'El Salvador', NULL, NULL),
(54, 'Equatorial Guinea', NULL, NULL),
(55, 'Eritrea', NULL, NULL),
(56, 'Estonia', NULL, NULL),
(57, 'Eswatini', NULL, NULL),
(58, 'Ethiopia', NULL, NULL),
(59, 'Fiji', NULL, NULL),
(60, 'Finland', NULL, NULL),
(61, 'France', NULL, NULL),
(62, 'Gabon', NULL, NULL),
(63, 'Gambia', NULL, NULL),
(64, 'Georgia', NULL, NULL),
(65, 'Germany', NULL, NULL),
(66, 'Ghana', NULL, NULL),
(67, 'Greece', NULL, NULL),
(68, 'Grenada', NULL, NULL),
(69, 'Guatemala', NULL, NULL),
(70, 'Guinea', NULL, NULL),
(71, 'Guinea-Bissau', NULL, NULL),
(72, 'Guyana', NULL, NULL),
(73, 'Haiti', NULL, NULL),
(74, 'Honduras', NULL, NULL),
(75, 'Hungary', NULL, NULL),
(76, 'Iceland', NULL, NULL),
(77, 'India', NULL, NULL),
(78, 'Indonesia', NULL, NULL),
(79, 'Iran', NULL, NULL),
(80, 'Iraq', NULL, NULL),
(81, 'Ireland', NULL, NULL),
(82, 'Israel', NULL, NULL),
(83, 'Italy', NULL, NULL),
(84, 'Jamaica', NULL, NULL),
(85, 'Japan', NULL, NULL),
(86, 'Jordan', NULL, NULL),
(87, 'Kazakhstan', NULL, NULL),
(88, 'Kenya', NULL, NULL),
(89, 'Kiribati', NULL, NULL),
(90, 'Kosovo', NULL, NULL),
(91, 'Kuwait', NULL, NULL),
(92, 'Kyrgyzstan', NULL, NULL),
(93, 'Laos', NULL, NULL),
(94, 'Latvia', NULL, NULL),
(95, 'Lebanon', NULL, NULL),
(96, 'Lesotho', NULL, NULL),
(97, 'Liberia', NULL, NULL),
(98, 'Libya', NULL, NULL),
(99, 'Liechtenstein', NULL, NULL),
(100, 'Lithuania', NULL, NULL),
(101, 'Luxembourg', NULL, NULL),
(102, 'Madagascar', NULL, NULL),
(103, 'Malawi', NULL, NULL),
(104, 'Malaysia', NULL, NULL),
(105, 'Maldives', NULL, NULL),
(106, 'Mali', NULL, NULL),
(107, 'Malta', NULL, NULL),
(108, 'Marshall Islands', NULL, NULL),
(109, 'Mauritania', NULL, NULL),
(110, 'Mauritius', NULL, NULL),
(111, 'Mexico', NULL, NULL),
(112, 'Micronesia', NULL, NULL),
(113, 'Moldova', NULL, NULL),
(114, 'Monaco', NULL, NULL),
(115, 'Mongolia', NULL, NULL),
(116, 'Montenegro', NULL, NULL),
(117, 'Morocco', NULL, NULL),
(118, 'Mozambique', NULL, NULL),
(119, 'Myanmar', NULL, NULL),
(120, 'Namibia', NULL, NULL),
(121, 'Nauru', NULL, NULL),
(122, 'Nepal', NULL, NULL),
(123, 'Netherlands', NULL, NULL),
(124, 'New Zealand', NULL, NULL),
(125, 'Nicaragua', NULL, NULL),
(126, 'Niger', NULL, NULL),
(127, 'Nigeria', NULL, NULL),
(128, 'North Korea', NULL, NULL),
(129, 'North Macedonia', NULL, NULL),
(130, 'Norway', NULL, NULL),
(131, 'Oman', NULL, NULL),
(132, 'Pakistan', NULL, NULL),
(133, 'Palau', NULL, NULL),
(134, 'Palestine', NULL, NULL),
(135, 'Panama', NULL, NULL),
(136, 'Papua New Guinea', NULL, NULL),
(137, 'Paraguay', NULL, NULL),
(138, 'Peru', NULL, NULL),
(139, 'Philippines', NULL, NULL),
(140, 'Poland', NULL, NULL),
(141, 'Portugal', NULL, NULL),
(142, 'Qatar', NULL, NULL),
(143, 'Romania', NULL, NULL),
(144, 'Russia', NULL, NULL),
(145, 'Rwanda', NULL, NULL),
(146, 'Saint Kitts and Nevis', NULL, NULL),
(147, 'Saint Lucia', NULL, NULL),
(148, 'Saint Vincent and the Grenadines', NULL, NULL),
(149, 'Samoa', NULL, NULL),
(150, 'San Marino', NULL, NULL),
(151, 'Sao Tome and Principe', NULL, NULL),
(152, 'Saudi Arabia', NULL, NULL),
(153, 'Senegal', NULL, NULL),
(154, 'Serbia', NULL, NULL),
(155, 'Seychelles', NULL, NULL),
(156, 'Somalia', NULL, NULL),
(157, 'South Africa', NULL, NULL),
(158, 'South Sudan', NULL, NULL),
(159, 'Spain', NULL, NULL),
(160, 'Sri Lanka', NULL, NULL),
(161, 'Sudan', NULL, NULL),
(162, 'Suriname', NULL, NULL),
(163, 'Sweden', NULL, NULL),
(164, 'Switzerland', NULL, NULL),
(165, 'Syria', NULL, NULL),
(166, 'Taiwan', NULL, NULL),
(167, 'Tajikistan', NULL, NULL),
(168, 'Tanzania', NULL, NULL),
(169, 'Thailand', NULL, NULL),
(170, 'Timor-Leste', NULL, NULL),
(171, 'Togo', NULL, NULL),
(172, 'Tonga', NULL, NULL),
(173, 'Trinidad and Tobago', NULL, NULL),
(174, 'Tunisia', NULL, NULL),
(175, 'Turkey', NULL, NULL),
(176, 'Turkmenistan', NULL, NULL),
(177, 'Tuvalu', NULL, NULL),
(178, 'Uganda', NULL, NULL),
(179, 'Ukraine', NULL, NULL),
(180, 'United Arab Emirates', NULL, NULL),
(181, 'United Kingdom', NULL, NULL),
(182, 'United States of America', NULL, NULL),
(183, 'Uruguay', NULL, NULL),
(184, 'Uzbekistan', NULL, NULL),
(185, 'Vanuatu', NULL, NULL),
(186, 'Vatican City', NULL, NULL),
(187, 'Venezuela', NULL, NULL),
(188, 'Vietnam', NULL, NULL),
(189, 'Yemen', NULL, NULL),
(190, 'Zambia', NULL, NULL),
(191, 'Zimbabwe', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
