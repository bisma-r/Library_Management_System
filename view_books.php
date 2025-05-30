<?php require_once 'header.php'; ?>

<!DOCTYPE html>
<html>
<head><title>View Books</title></head>
<body>
<h2>All Books in Library</h2>
<?php
include 'db_connect.php';

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