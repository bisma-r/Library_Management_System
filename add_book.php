<?php
session_start();

include 'db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author_id = $_POST['author_id'];
    $isbn = $_POST['isbn'];
    $category_id = $_POST['category_id'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO books (Title, AuthorID, ISBN, CategoryID, Quantity)
            VALUES ('$title', '$author_id', '$isbn', '$category_id', '$quantity')";
    $_SESSION['success'] = "Book added successfully!";
    header("Location: add_book.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head><title>Add Book</title></head>
<body>

<h2>Add a New Book</h2>
<form method="POST" action="add_book.php" autocomplete="off">
    Title: <input type="text" name="title" required autocomplete = "off"><br><br>
    Author ID: <input type="number" name="author_id" required autocomplete="off"><br><br>
    ISBN: <input type="text" name="isbn" autocomplete="off"><br><br>
    Category ID: <input type="number" name="category_id" autocomplete="off"><br><br>
    Quantity: <input type="number" name="quantity" required autocomplete="off"><br><br>
    <input type="submit" name="add" value="Add Book">
</form>

<?php
if (isset($_SESSION['success'])) {
    echo "<div style='color: green; font-weight: bold; margin-top: 10px;'>Book added successfully!</div>";
    unset($_SESSION['success']);
}
?>

</body>
</html>