<?php 
require_once 'header.php'; ?>

<?php

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'librarian') {
    header("Location: login.php");
    exit();
}

require 'db_connect.php';

$sql = "SELECT bb.BorrowID, m.Name AS MemberName, b.Title AS BookTitle, bb.BorrowDate, bb.ReturnDate
        FROM borrowedbooks bb
        JOIN members m ON bb.MemberID = m.MemberID
        JOIN books b ON bb.BookID = b.BookID
        ORDER BY bb.BorrowDate DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Borrowed Books</title>
<style>
        table {
            border-collapse: collapse;
            width: 90%;
            margin-top: 20px;
        }
        th, td {
            padding: 10px 15px;
            border: 1px solid #999;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>

<?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>Borrow ID</th>
                <th>Member</th>
                <th>Book</th>
                <th>Borrow Date</th>
                <th>Return Date</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['BorrowID'] ?></td>
                    <td><?= htmlspecialchars($row['MemberName']) ?></td>
                    <td><?= htmlspecialchars($row['BookTitle']) ?></td>
                    <td><?= $row['BorrowDate'] ?></td>
                    <td>
                        <?= $row['ReturnDate'] ? $row['ReturnDate'] : "<span style='color: red;'>Not yet returned</span>" ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No books have been borrowed yet.</p>
    <?php endif; ?>
</body>
</html>