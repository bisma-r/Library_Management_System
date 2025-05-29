-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2025 at 09:48 PM
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
  `JoinDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`MemberID`, `Name`, `Email`, `JoinDate`) VALUES
(1, 'Alice Johnson', 'alice.johnson@example.com', '2024-01-10'),
(2, 'Bob Smith', 'bob.smith@example.com', '2024-02-15'),
(3, 'Charlie Brown', 'charlie.brown@example.com', '2024-03-22'),
(4, 'Diana Prince', 'diana.prince@example.com', '2024-04-01'),
(5, 'Edward Davis', 'edward.davis@example.com', '2024-05-05'),
(6, 'Fiona Green', 'fiona.green@example.com', '2024-06-14'),
(7, 'George Harris', 'george.harris@example.com', '2024-07-20'),
(8, 'Helen Adams', 'helen.adams@example.com', '2024-08-11'),
(9, 'Ian White', 'ian.white@example.com', '2024-09-03'),
(10, 'Jack Lee', 'jack.lee@example.com', '2024-10-19');

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
