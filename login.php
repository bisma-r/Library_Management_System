<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['role'] == 'student') {
        $_SESSION['role'] = 'student';
        header("Location: student_home.php");
        exit();
    } elseif ($_POST['role'] == 'librarian') {
        $_SESSION['selected_role'] = 'librarian';
    }
}
?>

<form method="post" action="login.php">
    <h3>Select Role</h3>
    <input type="radio" name="role" value="student" required> Student<br><br>
    <input type="radio" name="role" value="librarian"> Librarian<br><br>
    <input type="submit" value="Continue">
</form>

<?php if (isset($_SESSION['selected_role']) && $_SESSION['selected_role'] == 'librarian'): ?>
    <form method="post" action="librarian_login.php">
        <h3>Librarian Login</h3>
        Email: <input type="email" name="email" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
<?php endif; ?>
