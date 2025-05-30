<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'librarian') {
    header("Location: login.php");
    exit();
}

$requests = $conn->query("SELECT r.RequestID, m.name AS MemberName, b.Title, r.Status
                          FROM requestedbooks r
                          JOIN members m ON r.MemberID = m.MemberID
                          JOIN books b ON r.BookID = b.BookID");

while ($row = $requests->fetch_assoc()) {
    echo "<div>
            <p><strong>{$row['MemberName']}</strong> requested <em>{$row['Title']}</em> - Status: {$row['Status']}</p>
            <form method='post' action='approve_request.php'>
                <input type='hidden' name='request_id' value='{$row['RequestID']}'>
                <button name='action' value='Approve'>Approve</button>
                <button name='action' value='Reject'>Reject</button>
            </form>
          </div>";
}
?>
