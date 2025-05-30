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
            header("Location: student_login.php");
            exit();
        }
    } else {
        $_SESSION['login_error'] = "Email not found.";
        header("Location: student_login.php");
        exit();
    }
}
?>