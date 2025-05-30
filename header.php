<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Library Management System'; ?></title>
    
    <!-- Favicon -->
    <!-- <link rel="icon" href="assets/images/favicon.ico"> -->
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/styles.css">
    
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> -->
</head>
<body>
    <header class="main-header">
        <div class="container">
            <div class="icon">
                <a href="index.php">
                    <img src="assets/icon.png" alt="Library Logo" class="logo">
                </a>
            <div class="branding">
                <h1>Library Management System</h1>
            </div>
            
            <?php if(isset($_SESSION['user_id'])): ?>
                <nav class="user-nav">
                    <span>Welcome, <?php echo htmlspecialchars($_SESSION['email']); ?></span>
                    <a href="logout.php" class="btn-logout">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </nav>
            <?php endif; ?>
        </div>
    </header>
</body