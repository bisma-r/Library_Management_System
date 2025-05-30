<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'librarian') {
    header("Location: login.php");
    exit();
}

include 'db_connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $borrow_id = $_POST['borrow_id'];
    $return_date = date('Y-m-d');

    $sql = "UPDATE borrowedbooks SET ReturnDate = '$return_date' WHERE BorrowID = '$borrow_id'";

    $_SESSION['success'] = "Book returned!";
    header('Location: return_book.php');
    exit();
}

?>

<!DOCTYPE html>
<html>
<head><title>Return Book</title></head>
<body>
<h2>Return a Book</h2>
<form method="POST" action="">
    Borrow ID: <input type="number" name="borrow_id" required autocomplete = "off"><br><br>
    <input type="submit" name="return" value="Return Book">
</form>

<?php
    if(isset($_SESSION['success'])){
        echo "<div style='color: green; font-weight: bold; margin-top: 10px;'>Book returned!</div>";
        unset($_SESSION['success']);
    }
?>

</body>
</html>