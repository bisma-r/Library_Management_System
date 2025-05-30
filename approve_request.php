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

header("Location: requested_books.php");
exit();
?>
