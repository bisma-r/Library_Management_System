<!DOCTYPE html>
<html>
<head>
    <title>Library Management</title>
</head>
<body>
    <h1>Welcome to the Library System</h1>
    <ul>
        <li><a href="add_book.php">Add Book</a></li><br>
        <li><a href="view_books.php">View All Books</a></li><br>
        <li><a href="borrow_book.php">Borrow Book</a></li><br>
        <li><a href="return_book.php">Return Book</a></li><br>
    </ul>

<?php
$passwords = [
    'bisma.rauf@lib.uni.edu.pk' => 'lib123',
    'sara.ahmed@uni-library.edu.pk' => 'Lib@1234',
    'usman.khan@csdept.uni.edu.pk' => 'SecureLib99',
    'naila.bibi@central.university.pk' => 'Welcome123!',
    'ammar.raza@libstaff.edu.pk' => 'Read4Life',
    'fatima.javed@library.uni.pk' => 'UniLib2025',
    'hassan.ali@librarians.uni.pk'=> 'BookShelf22',
    'maheen.zahid@faculty.lib.pk' => 'Libr@r1an!',
    'talha.mir@mainlibrary.edu.pk' => "Bookworm88",
    'ayesha.kamil@staff.uni.edu.pk' => '123ReadMe',
    'zubair.malik@archive.uni.pk' => 'StackOverflow1'
];

foreach ($passwords as $email => $pass) {
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    echo "INSERT INTO users (email, password) VALUES ('$email', '$hash');\n";
}
?>


</body>
</html>