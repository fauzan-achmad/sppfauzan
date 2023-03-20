-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2023 at 07:14 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(20) NOT NULL,
  `name` varchar(225) NOT NULL,
  `category` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `category`, `created_at`) VALUES
(1, 'X', 'Rekayasa Perangkat Lunak', '2023-02-24 01:42:57'),
(2, 'XI', 'Rekayasa Perangkat Lunak', '2023-02-24 01:43:38'),
(3, 'XII', 'Rekayasa Perangkat Lunak', '2023-02-24 01:43:51'),
(7, 'XII', 'Tata Boga', '2023-03-05 05:56:51'),
(8, 'XI', 'Perhotelan', '2023-03-05 07:20:20'),
(10, 'X', 'Perhotelan', '2023-03-13 01:21:51'),
(11, 'XII', 'Perhotelan', '2023-03-13 01:52:51'),
(12, 'XI', 'Tata Boga', '2023-03-13 01:55:39'),
(13, 'X', 'Tata Boga', '2023-03-13 01:55:45'),
(14, 'X', 'OTKP', '2023-03-13 02:00:05'),
(15, 'XI', 'OTKP', '2023-03-13 02:00:05'),
(16, 'XII', 'OTKP', '2023-03-13 02:00:05'),
(17, 'X', 'Tata Busana', '2023-03-13 02:00:05'),
(18, 'XI', 'Tata Busana', '2023-03-13 02:00:05'),
(19, 'XII', 'Tata Busana', '2023-03-13 02:00:05'),
(20, 'XI', 'Tata Boga', '2023-03-14 00:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `name`) VALUES
(1, 'X'),
(2, 'XI'),
(3, 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE `month` (
  `id` int(11) NOT NULL,
  `name` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`id`, `name`) VALUES
(1, 'Januari'),
(2, 'Febuari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE `officers` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`id`, `name`, `username`, `password`, `user_id`, `created_at`) VALUES
(5, 'TESTING', 'testing', '$2y$10$SNSGgA1h/EUiNhOf4PKysO67Qo7ik2DyeukWP.li78vmKXWozKDp2', 39, '2023-03-13 04:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `date_payment` date NOT NULL,
  `month_paid` varchar(225) NOT NULL,
  `year_paid` varchar(225) NOT NULL,
  `payment_amount` bigint(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `officer_id` int(20) DEFAULT NULL,
  `spp_id` int(20) DEFAULT NULL,
  `remaining_pay` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `date_payment`, `month_paid`, `year_paid`, `payment_amount`, `student_id`, `officer_id`, `spp_id`, `remaining_pay`, `created_at`) VALUES
(4, '2023-03-15', 'Maret', '2027', 100000, 15, NULL, 19, 900000, '2023-03-15 00:19:28'),
(5, '2023-03-14', 'Januari', '2025', 100000, 15, NULL, 17, 900000, '2023-03-15 14:59:20'),
(6, '2023-03-16', 'Januari', '2024', 100000, 15, NULL, 16, 900000, '2023-03-15 15:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `spps`
--

CREATE TABLE `spps` (
  `id` int(20) NOT NULL,
  `year` int(11) NOT NULL,
  `nominal` int(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spps`
--

INSERT INTO `spps` (`id`, `year`, `nominal`, `created_at`) VALUES
(15, 2023, 1000000, '2023-03-13 01:38:47'),
(16, 2024, 1000000, '2023-03-14 17:36:03'),
(17, 2025, 1000000, '2023-03-14 17:36:03'),
(18, 2026, 1000000, '2023-03-14 17:36:03'),
(19, 2027, 1000000, '2023-03-14 17:36:03'),
(20, 2028, 1000000, '2023-03-14 17:36:03'),
(21, 2029, 1000000, '2023-03-14 17:36:03'),
(22, 2030, 1000000, '2023-03-14 17:36:03'),
(23, 2031, 1000000, '2023-03-14 17:36:03'),
(24, 2032, 1000000, '2023-03-14 17:36:03'),
(25, 2033, 1000000, '2023-03-14 17:36:03');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(20) NOT NULL,
  `nisn` varchar(225) NOT NULL,
  `nis` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `class_id` int(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `spp_id` int(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `nisn`, `nis`, `name`, `address`, `phone`, `gender`, `class_id`, `user_id`, `spp_id`, `created_at`) VALUES
(15, '0062258735', '22234644', 'Anggun Meilani', 'Bandung', '+62 813-3226-84892', 'Perempuan', 14, 24, NULL, '2023-03-13 02:34:03'),
(16, '0064812536', '22234645', 'Cindi Novi .A', 'Bandung\r\n', '+62 813-3226-8489', 'Perempuan', 14, 25, NULL, '2023-03-13 02:35:01'),
(17, '0061581389', '22234646', 'Fatharani Zahra Lisani', 'Bandung', '+62 813-3226-8489', 'Perempuan', 14, 26, NULL, '2023-03-13 02:38:33'),
(18, '00764415426', '22234647', 'Nabila Septiani', 'Bandung', '+62 813-3226-8489', 'Perempuan', 14, 27, NULL, '2023-03-13 02:39:36'),
(19, '0069837035', '22234648', 'Vadya Andara Naftasya H', 'Bandung', '+62 813-3226-8489', 'Perempuan', 14, 28, NULL, '2023-03-13 02:40:56'),
(20, '3068232488', '22234584', 'Akbar Syahrul Fatah', 'Bandung', '+62 813-3226-8489', 'Laki-Laki', 10, 29, NULL, '2023-03-13 03:09:33'),
(21, '0072349386', '22234585', 'Ali Abdullah Starifudin', 'Bandung', '+62 813-3226-8489', 'Laki-Laki', 10, 30, NULL, '2023-03-13 03:10:18'),
(22, '0067856972', '22234586', 'Bunga Ramadhani', 'Bandung', '+62 813-3226-8489', 'Perempuan', 10, 31, NULL, '2023-03-13 03:11:16'),
(23, '0054944951', '22234587', 'Delvan', 'Bandung', '+62 813-3226-8489', 'Laki-Laki', 10, 32, NULL, '2023-03-13 03:13:08'),
(24, '0062612559', '22234588', 'Edwar Rivaldiansyah', 'Bandung\r\n', '+62 813-3226-8489', 'Laki-Laki', 10, 33, NULL, '2023-03-13 03:16:50'),
(25, '0064429537', '22234590', 'Mega Meylani', 'Bandung', '+62 813-3226-8489', 'Perempuan', 10, 34, NULL, '2023-03-13 03:19:47'),
(26, '0067067355', '22234591', 'Muhammad Putra Alghifari', 'Bandung', '+62 813-3226-8489', 'Laki-Laki', 10, 35, NULL, '2023-03-13 03:20:59'),
(27, '0072116747', '22234592', 'Muhammad Ryan Faisal Rizki', 'Bandung', '+62 813-3226-8489', 'Laki-Laki', 10, 36, NULL, '2023-03-13 03:21:50'),
(28, '0063091843', '22234593', 'Muhammad Saputra Dwi N', 'Bandung', '+62 813-3226-8489', 'Laki-Laki', 10, 37, NULL, '2023-03-13 03:23:23'),
(29, '0064820126', '22234594', 'Naufal Ahmad Haikal', 'Bandung', '+62 813-3226-8489', 'Laki-Laki', 10, 38, NULL, '2023-03-13 03:25:38'),
(30, '0059893111', '5135622', 'Mt . Raynortownn', 'test', '+6281332268489', 'Laki-Laki', 2, 40, NULL, '2023-03-14 00:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` enum('admin','officer','student','') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'Admin', 'admin', '$2y$10$prAL3ijG6HyzXD2WBkCG.uvoDkSbU0a/LNLkZigpyBJLB0.ck8JsC', 'admin', '2023-02-25 11:10:03'),
(24, 'Anggun Meilani', 'S22234644', '$2y$10$tLJbe8CHAvMjq1OdhgU1UObpqqaIhEPjarA3JfA2Iv.5ohUFM3lK2', 'student', '2023-03-13 02:34:03'),
(25, 'Cindi Novi .A', 'S22234645', '$2y$10$b0rGX.ESRRjRnu.JpisKzutdxJrBalwabaDFHgOP3i9CaNTuTaJUG', 'student', '2023-03-13 02:35:01'),
(26, 'Fatharani Zahra Lisani', 'S22234646', '$2y$10$2ZR7oKqtIHM1A5aHbF2/IOtVEia8Z7brf6G2O/St.gyweW/26CcXi', 'student', '2023-03-13 02:38:33'),
(27, 'Nabila Septiani', 'S22234647', '$2y$10$LHawDhiXvU8kXjLvshGCqOwTho8BrNhkvpszoyP/c2qboaFSpnHeW', 'student', '2023-03-13 02:39:36'),
(28, 'Vadya Andara Naftasya H', 'S22234648', '$2y$10$1sNSIMWH4ZApJorYmC12N.Um7jiJ2OZDDcrWXG0UL7IA2yJ2.gU.2', 'student', '2023-03-13 02:40:56'),
(29, 'Akbar Syahrul Fatah', 'S22234584', '$2y$10$VNvi/2eC0/RJoBS5ng4QV.FeqUBqJ2TsNCQrV90cjT/RfuK7ESURG', 'student', '2023-03-13 03:09:33'),
(30, 'Ali Abdullah Starifudin', 'S22234585', '$2y$10$Xa5dresjXKxZEWXcYFcNEuRbbJM6TFzi7db2Zy55TfRStEoZt0HnO', 'student', '2023-03-13 03:10:18'),
(31, 'Bunga Ramadhani', 'S22234586', '$2y$10$NAJ3vDfDz0/nz.pEVRe4P.E/uJ.E1NPdfkebDE9n9Gjt7POk9vG1u', 'student', '2023-03-13 03:11:16'),
(32, 'Delvan', 'S22234587', '$2y$10$WOunqI0wj2j1Ct6zqyB8O.FYsjj3VdaVyaXjZlg4pEMXRT3V0dYpW', 'student', '2023-03-13 03:13:08'),
(33, 'Edwar Rivaldiansyah', 'S22234588', '$2y$10$1ScCLcd4FhFoPndBu/4sU.k1knes7MWEuprdCPf5Zu9OHkquHa5eq', 'student', '2023-03-13 03:16:50'),
(34, 'Mega Meylani', 'S22234590', '$2y$10$jFBAGi7OHyQJBuVBHL2ns.PEJLkRDQQj7BDXQlgO2WAFZJ7V82YD6', 'student', '2023-03-13 03:19:47'),
(35, 'Muhammad Putra Alghifari', 'S22234591', '$2y$10$IDvRHTZJ57E8pf.yr1g7Le/mw8iAcJfP474mjVPpmJbpYbF6qM./q', 'student', '2023-03-13 03:20:59'),
(36, 'Muhammad Ryan Faisal Rizki', 'S22234592', '$2y$10$Ni5fXa08dFtZ5JZBNZVGPO/x4DAp3vlxAtnVxnh27IC46WUQGk50a', 'student', '2023-03-13 03:21:50'),
(37, 'Muhammad Saputra Dwi N', 'S22234593', '$2y$10$Fqh.mqN5j1RCZZzgNI1G7O9GmFVZHKxHOu6sh6dhhOUlvBQPAqDKu', 'student', '2023-03-13 03:23:23'),
(38, 'Naufal Ahmad Haikal', 'S22234594', '$2y$10$3ZP/qod29RZTepJOpbrukOksNqC3N2gF1Jk3cFW9RDKAwcatwYSVC', 'student', '2023-03-13 03:25:38'),
(39, 'TESTING', 'testing', '$2y$10$SNSGgA1h/EUiNhOf4PKysO67Qo7ik2DyeukWP.li78vmKXWozKDp2', 'officer', '2023-03-13 04:37:03'),
(40, 'Mt . Raynortownnn', 'S', '$2y$10$BCejymJbFY/A3ZW/A21BOO4c8z0C7baidv8CeaYE8qZ0N2G.rG1su', 'student', '2023-03-14 00:49:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `month`
--
ALTER TABLE `month`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officers`
--
ALTER TABLE `officers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `officer_id` (`officer_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `spp_id` (`spp_id`);

--
-- Indexes for table `spps`
--
ALTER TABLE `spps`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `year` (`year`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD KEY `students_ibfk_2` (`user_id`),
  ADD KEY `students_ibfk_3` (`class_id`),
  ADD KEY `spp_id` (`spp_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `month`
--
ALTER TABLE `month`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `officers`
--
ALTER TABLE `officers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `spps`
--
ALTER TABLE `spps`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `officers`
--
ALTER TABLE `officers`
  ADD CONSTRAINT `officers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`officer_id`) REFERENCES `officers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_ibfk_3` FOREIGN KEY (`spp_id`) REFERENCES `spps` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_ibfk_4` FOREIGN KEY (`spp_id`) REFERENCES `spps` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
