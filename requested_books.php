<head>
    <link rel="stylesheet" href="css/styles.css">
    <title>Requested Book Approvals</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 40px;
        }

        .table-container {
            max-width: 90%;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #ecf0f1;
            color: #2c3e50;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .btn-icon {
            background: none;
            border: none;
            cursor: pointer;
            padding: 4px;
            margin-right: 5px;
        }

        .btn-icon img {
            vertical-align: middle;
            transition: transform 0.2s ease;
        }

        .btn-icon img:hover {
            transform: scale(1.1);
        }

        .no-requests {
            text-align: center;
            font-size: 18px;
            color: #555;
            margin-top: 40px;
        }
    </style>
</head>

<?php 
require_once 'header.php';
require 'db_connect.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'librarian') {
    header("Location: login.php");
    exit();
}

$requests = $conn->query("
    SELECT r.RequestID, m.name AS MemberName, b.Title, r.Status
    FROM requestedbooks r
    JOIN members m ON r.MemberID = m.MemberID
    JOIN books b ON r.BookID = b.BookID
    WHERE r.Status = 'Pending'
");
?>

<div class="table-container">
    <h2>Pending Book Requests</h2>

    <?php if ($requests->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Request ID</th>
                    <th>Member Name</th>
                    <th>Book Title</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $requests->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['RequestID']) ?></td>
                        <td><?= htmlspecialchars($row['MemberName']) ?></td>
                        <td><?= htmlspecialchars($row['Title']) ?></td>
                        <td><?= htmlspecialchars($row['Status']) ?></td>
                        <td>
                            <form method="post" action="approve_request.php" style="display: inline;">
                                <input type="hidden" name="request_id" value="<?= htmlspecialchars($row['RequestID']) ?>">
                                <button type="submit" name="action" value="Approve" class="btn-icon" title="Approve">
                                    <img src="assets/tick.png" alt="Approve" width="20" height="20">
                                </button>
                                <button type="submit" name="action" value="Reject" class="btn-icon" title="Reject">
                                    <img src="assets/cross.png" alt="Reject" width="20" height="20">
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="no-requests">No pending book requests found.</div>
    <?php endif; ?>
</div>