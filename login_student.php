<?php
session_start();
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM members WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['role'] = 'student';
            $_SESSION['member_id'] = $row['MemberID'];
            $_SESSION['email'] = $email;
            header("Location: view_books.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Incorrect password.";
            header("Location: login_student.php");
            exit();
        }
    } else {
        $_SESSION['login_error'] = "Email not found.";
        header("Location: login_student.php");
        exit();
    }
}
?>

<form method="post" action="login_student.php">
    <h3>Student Login</h3>
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" value="Login">
</form>

<?php
if (isset($_SESSION['login_error'])) {
    echo "<p style='color: red;'>" . $_SESSION['login_error'] . "</p>";
    unset($_SESSION['login_error']);
}
?>