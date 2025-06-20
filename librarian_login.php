<?php
session_start();
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['role'] = 'librarian';
            $_SESSION['email'] = $email;
            unset($_SESSION['selected_role']);
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Incorrect password.";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['login_error'] = "Email not found.";
        header("Location: login.php");
        exit();
    }
}
?>