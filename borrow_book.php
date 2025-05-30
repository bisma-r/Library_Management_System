<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'librarian') {
    header("Location: login.php");
    exit();
}

include 'db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $member_id = $_POST['member_id'];
    $book_id = $_POST['book_id'];
    $borrow_date = date('Y-m-d');
    $sql = "INSERT INTO borrowedbooks (MemberID, BookID, BorrowDate)
            VALUES ('$member_id', '$book_id', '$borrow_date')";

    $_SESSION['success'] = "Book borrowed!";
    header("Location: borrow_book.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head><title>Borrow Book</title></head>
<body>
<h2>Borrow a Book</h2>
<form method="POST" action="">
    Member ID: <input type="number" name="member_id" required autocomplete = "off"><br><br>
    Book ID: <input type="number" name="book_id" required autocomplete = "off"><br><br>
    <input type="submit" name="borrow" value="Borrow">
</form>

<?php
    if(isset($_SESSION['success'])){
        echo "<div style='color: green; font-weight: bold; margin-top: 10px;'>Book borrowed!</div>";
    unset($_SESSION['success']);
    }
?>

</body>
</html>