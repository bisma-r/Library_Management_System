<?php 
require_once 'header.php'; 

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'librarian') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Librarian Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f6fa;
            color: #333;
            padding: 40px;
        }

        h1 {
            text-align: center;
            color: #2f3640;
            margin-bottom: 40px;
        }

        .dashboard {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .dashboard ul {
            list-style: none;
            padding: 0;
        }

        .dashboard li {
            margin: 15px 0;
        }

        .dashboard a {
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            background-color: #40739e;
            color: #fff;
            border-radius: 8px;
            transition: background-color 0.3s ease;
            font-size: 16px;
            text-align: center;
        }

        .dashboard a:hover {
            background-color: #273c75;
        }
    </style>
</head>
<body>

    <h1>Welcome to the Library System</h1>

    <div class="dashboard">
        <ul>
            <li><a href="add_book.php">➕ Add Book</a></li>
            <li><a href="view_books.php">📚 View All Books</a></li>
            <li><a href="borrow_book.php">📖 Borrowed Books</a></li>
            <li><a href="return_book.php">🔁 Return Book</a></li>
            <li><a href="requested_books.php">📩 View Book Requests</a></li>
        </ul>
    </div>

</body>
</html>