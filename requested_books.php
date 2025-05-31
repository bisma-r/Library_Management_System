<head>
    <link rel = "stylesheet" href ="css/styles.css">
</head>
<?php 
require_once 'header.php';
require 'db_connect.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'librarian') {
    header("Location: login.php");
    exit();
}

$requests = $conn->query("SELECT r.RequestID, m.name AS MemberName, b.Title, r.Status
                         FROM requestedbooks r
                         JOIN members m ON r.MemberID = m.MemberID
                         JOIN books b ON r.BookID = b.BookID");

// Check if there are any results
if ($requests->num_rows > 0) {
    echo '<div class="table-container">';
    echo '<table border="1" cellspacing="0" cellpadding="8">';
    echo '<thead>
            <tr>
                <th>Request ID</th>
                <th>Member Name</th>
                <th>Book Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
          </thead>
          <tbody>';

    while ($row = $requests->fetch_assoc()) {
        echo '<tr>
                <td>'.htmlspecialchars($row['RequestID']).'</td>
                <td>'.htmlspecialchars($row['MemberName']).'</td>
                <td>'.htmlspecialchars($row['Title']).'</td>
                <td>'.htmlspecialchars($row['Status']).'</td>
                <td>
                    <form method="post" action="approve_request.php">
                    <input type="hidden" name="request_id" value="'.htmlspecialchars($row['RequestID']).'">
                    <button type="submit" name="action" value="Approve" class="btn-icon">
                        <img src="assets/tick.png" alt="Approve" title="Approve" width="20" height="20">
                    </button>
                    <button type="submit" name="action" value="Reject" class="btn-icon">
                        <img src="assets/cross.png" alt="Reject" title="Reject" width="20" height="20">
                    </button>
                    </form>
                </td>
              </tr>';
    }

    echo '</tbody></table></div>';
} else {
    echo '<p>No book requests found.</p>';
}
?>