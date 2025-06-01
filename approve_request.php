<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'librarian') {
    header("Location: login.php");
    exit();
}

$request_id = $_POST['request_id'];
$action = $_POST['action'];

$status = $action === 'Approve' ? 'Approved' : 'Rejected';

$stmt = $conn->prepare("UPDATE requestedbooks SET Status = ? WHERE RequestID = ?");
$stmt->bind_param("si", $status, $request_id);
$stmt->execute();

if ($status === 'Approved') {
    $fetchStmt = $conn->prepare("SELECT MemberID, BookID FROM requestedbooks WHERE RequestID = ?");
    $fetchStmt->bind_param("i", $request_id);
    $fetchStmt->execute();
    $result = $fetchStmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $member_id = $row['MemberID'];
        $book_id = $row['BookID'];

        $borrowStmt = $conn->prepare("INSERT INTO borrowedbooks (MemberID, BookID, BorrowDate) VALUES (?, ?, NOW())");
        $borrowStmt->bind_param("ii", $member_id, $book_id);
        $borrowStmt->execute();
    }
}

header("Location: requested_books.php");
exit();
?>