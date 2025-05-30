<?php 
require_once 'header.php'; ?>

<?php
require 'db_connect.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'student') {
    header("Location: student_login.php");
    exit();
}

$member_id = $_SESSION['member_id'];
$result = $conn->query("SELECT * FROM books");

while ($row = $result->fetch_assoc()) {
    echo "<div><strong><a href='?book_id={$row['BookID']}'>{$row['Title']}</a></strong></div>";
    
    if (isset($_GET['book_id']) && $_GET['book_id'] == $row['BookID']) {
        $check = $conn->prepare("SELECT * FROM requestedbooks WHERE MemberID = ? AND BookID = ?");
        $check->bind_param("ii", $member_id, $row['BookID']);
        $check->execute();
        $check_result = $check->get_result();

        if ($check_result->num_rows > 0) {
            echo "<p>You have already requested this book.</p>";
        } else {
            echo "<form method='post' action='request_book.php'>
                    <input type='hidden' name='book_id' value='{$row['BookID']}'>
                    <input type='submit' value='Request to Borrow'>
                  </form>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>View Books</title></head>
<body>
<h2>All Books in Library</h2>
<?php

$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);

echo "<table border='1'>
<tr><th>ID</th><th>Title</th><th>Author ID</th><th>ISBN</th><th>Category ID</th><th>Quantity</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['BookID']}</td>
        <td>{$row['Title']}</td>
        <td>{$row['AuthorID']}</td>
        <td>{$row['ISBN']}</td>
        <td>{$row['CategoryID']}</td>
        <td>{$row['Quantity']}</td>
    </tr>";
}
echo "</table>";
?>
</body>
</html>