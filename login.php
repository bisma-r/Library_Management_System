<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 400px;
            margin: 50px auto;
            background: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2, h3 {
            text-align: center;
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        input[type="radio"] {
            margin-right: 10px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background: #4CAF50;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #45a049;
        }
        .error {
            color: red;
            text-align: center;
            margin-top: 15px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    </style>
    <script>
        history.pushState(null, null, location.href);
        window.onpopstate = function() {
            history.go(1);
        };
    </script>
</head>
<body>
    <div class="container">
        <?php
        require_once 'header.php';

        if (isset($_SESSION['role']) && $_SESSION['role'] == 'librarian') {
            unset($_SESSION['selected_role']);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['role'] == 'student') {
                $_SESSION['role'] = 'student';
                header("Location: view_books.php");
                exit();
            } elseif ($_POST['role'] == 'librarian') {
                $_SESSION['selected_role'] = 'librarian';
            }
        }
        ?>

        <form method="post" action="login.php">
            <h2>Select Role</h2>
            <div class="form-group">
                <label><input type="radio" name="role" value="student" required> Student</label><br>
                <label><input type="radio" name="role" value="librarian"> Librarian</label>
            </div>
            <input type="submit" value="Continue">
        </form>

        <?php if (isset($_SESSION['selected_role']) && $_SESSION['selected_role'] == 'librarian'): ?>
            <form method="post" action="librarian_login.php">
                <h3>Librarian Login</h3>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password" required>
                </div>
                <input type="submit" value="Login">
            </form>
        <?php endif; ?>

        <?php
        if (isset($_SESSION['login_error'])) {
            echo "<p class='error'>" . $_SESSION['login_error'] . "</p>";
            unset($_SESSION['login_error']);
        }
        ?>
    </div>
</body>
</html>