-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2025 at 03:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `AuthorID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`AuthorID`, `Name`, `Country`) VALUES
(1, 'J.K. Rowling', 'United Kingdom'),
(2, 'George Orwell', 'United Kingdom'),
(3, 'Isaac Asimov', 'United States'),
(4, 'Jane Austen', 'United Kingdom'),
(5, 'Agatha Christie', 'United Kingdom'),
(6, 'J.R.R. Tolkien', 'United Kingdom'),
(7, 'Leo Tolstoy', 'Russia'),
(8, 'Charles Dickens', 'United Kingdom'),
(9, 'Stephen King', 'United States'),
(10, 'Mark Twain', 'United States'),
(11, 'Ernest Hemingway', 'United States'),
(12, 'Haruki Murakami', 'Japan'),
(13, 'Kurt Vonnegut', 'United States'),
(14, 'F. Scott Fitzgerald', 'United States'),
(15, 'Virginia Woolf', 'United Kingdom'),
(16, 'H.G. Wells', 'United Kingdom'),
(17, 'Neil Gaiman', 'United Kingdom'),
(18, 'Ray Bradbury', 'United States'),
(19, 'Margaret Atwood', 'Canada'),
(20, 'Dan Brown', 'United States');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `BookID` int(11) NOT NULL,
  `Title` varchar(100) DEFAULT NULL,
  `AuthorID` int(11) DEFAULT NULL,
  `ISBN` varchar(20) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`BookID`, `Title`, `AuthorID`, `ISBN`, `CategoryID`, `Quantity`) VALUES
(1, 'Harry Potter and the Sorcerer\'s Stone', 1, '978-0-7475-3269-9', 1, 5),
(2, '1984', 2, '978-0-452-28423-4', 2, 3),
(3, 'Foundation', 3, '978-0-553-80371-0', 2, 4),
(4, 'Pride and Prejudice', 4, '978-0-14-143951-8', 3, 2),
(5, 'Murder on the Orient Express', 5, '978-0-06-269366-2', 6, 6),
(6, 'The Hobbit', 6, '978-0-618-00221-3', 5, 7),
(7, 'War and Peace', 7, '978-0-307-47232-5', 1, 4),
(8, 'A Tale of Two Cities', 8, '978-0-14-043054-7', 1, 3),
(9, 'The Shining', 9, '978-0-345-42797-2', 2, 8),
(10, 'The Adventures of Huckleberry Finn', 10, '978-1-59308-004-5', 1, 5),
(11, 'The Old Man and the Sea', 11, '978-0-684-80122-3', 4, 6),
(12, 'Norwegian Wood', 12, '978-0-307-47052-9', 3, 2),
(13, 'Slaughterhouse-Five', 13, '978-0-385-31681-5', 1, 4),
(14, 'The Great Gatsby', 14, '978-0-7432-7356-5', 1, 3),
(15, 'Mrs. Dalloway', 15, '978-0-15-662870-9', 4, 2),
(16, 'The War of the Worlds', 16, '978-0-451-52923-1', 2, 6),
(17, 'American Gods', 17, '978-0-06-055812-1', 5, 7),
(18, 'Fahrenheit 451', 18, '978-1-4516-7331-9', 2, 3),
(19, 'The Handmaid\'s Tale', 19, '978-0-385-49081-1', 4, 5),
(20, 'The Da Vinci Code', 20, '978-0-385-50420-8', 6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `borrowedbooks`
--

CREATE TABLE `borrowedbooks` (
  `BorrowID` int(11) NOT NULL,
  `MemberID` int(11) DEFAULT NULL,
  `BookID` int(11) DEFAULT NULL,
  `BorrowDate` date DEFAULT NULL,
  `ReturnDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrowedbooks`
--

INSERT INTO `borrowedbooks` (`BorrowID`, `MemberID`, `BookID`, `BorrowDate`, `ReturnDate`) VALUES
(1, 1, 1, '2024-01-12', '2025-05-27'),
(2, 2, 2, '2024-02-18', '2024-03-18'),
(3, 3, 3, '2024-03-25', '2024-04-25'),
(4, 4, 4, '2024-04-05', '2024-05-05'),
(5, 5, 5, '2024-05-10', '2024-06-10'),
(6, 6, 6, '2024-06-17', '2024-07-17'),
(7, 7, 7, '2024-07-22', '2024-08-22'),
(8, 8, 8, '2024-08-15', '2024-09-15'),
(9, 9, 9, '2024-09-10', '2024-10-10'),
(10, 10, 10, '2024-10-20', '2024-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`) VALUES
(1, 'Fiction'),
(2, 'Science Fiction'),
(3, 'Romance'),
(4, 'Non-fiction'),
(5, 'Fantasy'),
(6, 'Mystery');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `MemberID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `JoinDate` date DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`MemberID`, `Name`, `Email`, `JoinDate`, `password`) VALUES
(1, 'Alice Johnson', 'alice.johnson@example.com', '2024-01-10', '$2y$10$0pWVc5Tx4lfJc8aTh6jEUOQPPmxy9LbV7jR3rh.Sk1NIXZLyR/Jlq'),
(2, 'Bob Smith', 'bob.smith@example.com', '2024-02-15', '$2y$10$zbYqI5jjUvwqvbPSrnmNBOUGMi1XnljQJStzzSYbDGK6CzFTNdr9K'),
(3, 'Charlie Brown', 'charlie.brown@example.com', '2024-03-22', '$2y$10$sfMIrrdJ2hM8oLPx5sGJduKjU8ASrkQ7xTfGMxDw62Vv0nlaWAhKy'),
(4, 'Diana Prince', 'diana.prince@example.com', '2024-04-01', '$2y$10$Z9fs0DjwBqJo/.Q6KhHu0u4BZc64UodK6.KXEccgkQ42TzKMB6Eiy'),
(5, 'Edward Davis', 'edward.davis@example.com', '2024-05-05', '$2y$10$DJYXWxG62EGpv1e0m7NHYOugM/XN6NKVEbCm1TkoSoTTCYg/N4eVq'),
(6, 'Fiona Green', 'fiona.green@example.com', '2024-06-14', '$2y$10$IgN/18g7R.6upR0IQ1bR0ObbLmj0CwR9TTwE68Y5cEVB47CKNjmuW'),
(7, 'George Harris', 'george.harris@example.com', '2024-07-20', '$2y$10$UlZ5a1Nkt21ZyLoaY9Hke.CdUqP.bKOKvN.FpAwdTbFVKT6sNURK6'),
(8, 'Helen Adams', 'helen.adams@example.com', '2024-08-11', '$2y$10$SmR17EDEppv2ZMtBoYY24O7/XYMroNHZdfb.1OumVHJXMIyY1oVOi'),
(9, 'Ian White', 'ian.white@example.com', '2024-09-03', '$2y$10$Eqg/WQxiPv/9QUFNZvjWnO49FSjClhktlZgwhvqNFwTQsHIXu1gH2'),
(10, 'Jack Lee', 'jack.lee@example.com', '2024-10-19', '$2y$10$9ByA1qAfG.0d/Zmpwe5Lse9pAlqV2W7SeWW4xRz4shhQTi5T49Vd6'),
(11, 'Bisma Rauf', 'bisma.rauf@student.uni.edu.pk', NULL, '$2y$10$VOJ4jfQvJaksjUQrBGTHAuv1GIF62xvOLDIfN8prrU9FZnjtIxrYW');

-- --------------------------------------------------------

--
-- Table structure for table `requestedbooks`
--

CREATE TABLE `requestedbooks` (
  `RequestID` int(11) NOT NULL,
  `MemberID` int(11) NOT NULL,
  `BookID` int(11) NOT NULL,
  `RequestDate` datetime DEFAULT current_timestamp(),
  `Status` enum('Pending','Approved','Rejected') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requestedbooks`
--

INSERT INTO `requestedbooks` (`RequestID`, `MemberID`, `BookID`, `RequestDate`, `Status`) VALUES
(1, 1, 3, '2025-05-25 10:30:00', 'Pending'),
(2, 2, 5, '2025-05-25 12:00:00', 'Approved'),
(3, 3, 2, '2025-05-26 09:15:00', 'Pending'),
(4, 4, 6, '2025-05-26 14:45:00', 'Rejected'),
(5, 5, 1, '2025-05-27 11:20:00', 'Pending'),
(6, 1, 4, '2025-05-27 16:30:00', 'Approved'),
(7, 3, 5, '2025-05-28 08:10:00', 'Pending'),
(8, 2, 1, '2025-05-28 13:50:00', 'Rejected'),
(9, 6, 3, '2025-05-29 10:00:00', 'Pending'),
(10, 5, 2, '2025-05-29 15:40:00', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`) VALUES
(1, 'bisma.rauf@lib.uni.edu.pk', '$2y$10$al/tHPlprIKcxNdRIfGQK.5q/bRYm0KxIFfQRoPf71lbIT/dNCNjy'),
(2, 'sara.ahmed@uni-library.edu.pk', '$2y$10$/YZ4z4KeOmuNSH81MZhsSuQ1EbFEENAg6tRYRkE/szd7OKZdRA8/6'),
(3, 'usman.khan@csdept.uni.edu.pk', '$2y$10$n5tZ9v/wMi9q7Jc8Wl2QJO4F8yy2er4xYhjFnPwvHEqgWoOJ36Ddu'),
(4, 'naila.bibi@central.university.pk', '$2y$10$jTAs4NmqIpExbTEHYhsVAO6qJpWGDI6nSeh0wJ4mT7H5ZXsAMil8S'),
(5, 'ammar.raza@libstaff.edu.pk', '$2y$10$bGvyqJhjxCGwebqJODM9iOw6muRpS.UDWx36lgJkUGF1sDxpvkDrK'),
(6, 'fatima.javed@library.uni.pk', '$2y$10$71JePbUT9Pn01d4RZkIhVeFzyEcfWVOHKnym4vCdQs70N9C7UZO0a'),
(7, 'hassan.ali@librarians.uni.pk', '$2y$10$vXQcgDi.GlQezAOFt8MD2eHEAcPZSOtzBJ9q9V/yKxZFFI8HjCDGe'),
(8, 'maheen.zahid@faculty.lib.pk', '$2y$10$BRbwninbrubeTLJ/.LMa8OBdBPDIeTLORPGPfCFyopy/nZRD9XP.C'),
(9, 'talha.mir@mainlibrary.edu.pk', '$2y$10$/4PDwRj6rKdTlvxiuCRpdu2L47Kct1OhsuQ9tMFXtLb3.9mUTA77m'),
(10, 'ayesha.kamil@staff.uni.edu.pk', '$2y$10$kHZen5G9z8ZtFnECUZ7v..1FpUhIXdw9I1sf/DdCTuYqeXUfR9x/.'),
(11, 'zubair.malik@archive.uni.pk', '$2y$10$.OWdEOmRPquP71IfnFg6t.NQRcELFwCvpGC69N/ww2ij.pywGOmmq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`AuthorID`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`BookID`),
  ADD KEY `AuthorID` (`AuthorID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `borrowedbooks`
--
ALTER TABLE `borrowedbooks`
  ADD PRIMARY KEY (`BorrowID`),
  ADD KEY `MemberID` (`MemberID`),
  ADD KEY `BookID` (`BookID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`MemberID`);

--
-- Indexes for table `requestedbooks`
--
ALTER TABLE `requestedbooks`
  ADD PRIMARY KEY (`RequestID`),
  ADD KEY `MemberID` (`MemberID`),
  ADD KEY `BookID` (`BookID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `BookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `borrowedbooks`
--
ALTER TABLE `borrowedbooks`
  MODIFY `BorrowID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `requestedbooks`
--
ALTER TABLE `requestedbooks`
  MODIFY `RequestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`AuthorID`) REFERENCES `authors` (`AuthorID`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`);

--
-- Constraints for table `borrowedbooks`
--
ALTER TABLE `borrowedbooks`
  ADD CONSTRAINT `borrowedbooks_ibfk_1` FOREIGN KEY (`MemberID`) REFERENCES `members` (`MemberID`),
  ADD CONSTRAINT `borrowedbooks_ibfk_2` FOREIGN KEY (`BookID`) REFERENCES `books` (`BookID`);

--
-- Constraints for table `requestedbooks`
--
ALTER TABLE `requestedbooks`
  ADD CONSTRAINT `requestedbooks_ibfk_1` FOREIGN KEY (`MemberID`) REFERENCES `members` (`MemberID`),
  ADD CONSTRAINT `requestedbooks_ibfk_2` FOREIGN KEY (`BookID`) REFERENCES `books` (`BookID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
