<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Books</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            max-width: 1000px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        a {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        .message {
            margin-top: 20px;
            padding: 12px;
            text-align: center;
            font-weight: bold;
            border-radius: 5px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        form {
            margin-top: 10px;
            text-align: center;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 8px 16px;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php require_once 'header.php'; ?>
        <?php
        require 'db_connect.php';

        $result = $conn->query("SELECT * FROM books");

        echo "<h2>All Books in Library</h2>";
        echo "<table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author ID</th>
            <th>ISBN</th>
            <th>Category ID</th>
            <th>Quantity</th>
        </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['BookID']}</td>";
            
            if ($_SESSION['role'] == 'librarian') {
                echo "<td>{$row['Title']}</td>";
            } else {
                echo "<td><a href='?book_id={$row['BookID']}'>{$row['Title']}</a></td>";
            }

            echo "<td>{$row['AuthorID']}</td>
                <td>{$row['ISBN']}</td>
                <td>{$row['CategoryID']}</td>
                <td>{$row['Quantity']}</td>
            </tr>";

            if (
                isset($_GET['book_id']) &&
                $_GET['book_id'] == $row['BookID'] &&
                $_SESSION['role'] != 'librarian'
            ) {
                require 'db_connect.php';

                $check = $conn->prepare("SELECT * FROM requestedbooks WHERE MemberID = ? AND BookID = ?");
                $check->bind_param("ii", $member_id, $row['BookID']);
                $check->execute();
                $check_result = $check->get_result();

                echo "<tr><td colspan='6'>";
                if ($check_result->num_rows == 0) {
                    echo "<form method='post' action='request_book.php'>
                            <input type='hidden' name='book_id' value='{$row['BookID']}'>
                            <input type='submit' value='Request to Borrow'>
                          </form>";
                } else {
                    echo "<div class='message error'>You have already requested this book.</div>";
                }
                echo "</td></tr>";
            }
        }
        echo "</table>";

        if (isset($_SESSION['success'])) {
            echo "<div class='message success'>Request submitted successfully.</div>";
            unset($_SESSION['success']);
        } elseif (isset($_SESSION['error'])) {
            echo "<div class='message error'>You have already requested this book.</div>";
            unset($_SESSION['error']);
        }
        ?>
    </div>
</body>
</html>