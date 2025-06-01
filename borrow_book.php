<?php 
require_once 'header.php'; 

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
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 40px;
            color: #333;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 14px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #2d3436;
            margin-bottom: 30px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 15px;
        }

        th, td {
            padding: 12px 16px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f1f2f6;
            color: #2f3542;
            text-align: left;
        }

        tr:hover {
            background-color: #f8f9fa;
        }

        .not-returned {
            color: #d63031;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #888;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Borrowed Books Record</h2>

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
                        <?= $row['ReturnDate'] ? $row['ReturnDate'] : "<span class='not-returned'>Not yet returned</span>" ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p style="text-align: center;">No books have been borrowed yet.</p>
    <?php endif; ?>
</div>

</body>
</html>