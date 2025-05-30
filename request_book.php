<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['member_id'])) {
    header("Location: student_login.php");
    exit();
}

$member_id = $_SESSION['member_id'];
$book_id = $_POST['book_id'];

$stmt = $conn->prepare("SELECT * FROM requestedbooks WHERE MemberID = ? AND BookID = ?");
$stmt->bind_param("ii", $member_id, $book_id);
$stmt->execute();
if ($stmt->get_result()->num_rows == 0) {
    $insert = $conn->prepare("INSERT INTO requestedbooks (MemberID, BookID) VALUES (?, ?)");
    $insert->bind_param("ii", $member_id, $book_id);
    $insert->execute();
    $_SESSION['success'] = "Request submitted successfully.";
} else {
    $_SESSION['error'] = "You have already requested this book.";
}

header("Location: view_books.php");
exit();
?>
