<?php 
require_once 'header.php'; 

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'librarian') {
    header("Location: login.php");
    exit();
}

include 'db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author_id = $_POST['author_id'];
    $isbn = $_POST['isbn'];
    $category_id = $_POST['category_id'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO books (Title, AuthorID, ISBN, CategoryID, Quantity)
            VALUES ('$title', '$author_id', '$isbn', '$category_id', '$quantity')";
    $result = $conn->query($sql);
    $_SESSION['success'] = "Book added successfully!";
    header("Location: add_book.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 40px;
            color: #333;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #2f3640;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #44bd32;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2f9e1f;
        }

        .success {
            color: green;
            text-align: center;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add a New Book</h2>
    <form method="POST" action="add_book.php" autocomplete="off">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>

        <label for="author_id">Author ID:</label>
        <input type="number" name="author_id" id="author_id" required>

        <label for="isbn">ISBN:</label>
        <input type="text" name="isbn" id="isbn">

        <label for="category_id">Category ID:</label>
        <input type="number" name="category_id" id="category_id">

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" required>

        <input type="submit" name="add" value="Add Book">
    </form>

    <?php
    if (isset($_SESSION['success'])) {
        echo "<div class='success'>{$_SESSION['success']}</div>";
        unset($_SESSION['success']);
    }
    ?>
</div>

</body>
</html>