<?php 
require_once 'header.php'; 

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'librarian') {
    header("Location: login.php");
    exit();
}

require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $borrow_id = $_POST['borrow_id'];
    $return_date = date('Y-m-d');

    $sql = "UPDATE borrowedbooks SET ReturnDate = '$return_date' WHERE BorrowID = '$borrow_id'";
    $conn->query($sql);

    $_SESSION['success'] = "Book returned!";
    header('Location: return_book.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Return Book</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 40px;
            color: #333;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 14px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #2d3436;
        }

        input[type="number"], input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 15px;
        }

        input[type="submit"] {
            background-color: #0984e3;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #74b9ff;
        }

        .message {
            text-align: center;
            color: green;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Return a Book</h2>

    <form method="POST" action="">
        <label for="borrow_id">Borrow ID</label>
        <input type="number" name="borrow_id" required autocomplete="off" placeholder="Enter Borrow ID">
        
        <input type="submit" name="return" value="Return Book">
    </form>

    <?php
    if (isset($_SESSION['success'])) {
        echo "<div class='message'>{$_SESSION['success']}</div>";
        unset($_SESSION['success']);
    }
    ?>
</div>

</body>
</html>