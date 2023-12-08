<?php
// fetch_book_details.php

$server = 'localhost';
$username = 'root';
$password = '2080804';
$database = 'dbms_project';
$connection = new mysqli($server, $username, $password, $database, 3310);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$selectedBook = $_POST['book_name'];

$query = "SELECT b.book_no, a.author_name
          FROM books b
          JOIN author a ON b.author_id = a.author_id
          WHERE b.book_name = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param('s', $selectedBook);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $bookDetails = array(
        'book_no' => $row['book_no'],
        'author_name' => $row['author_name']
    );
    echo json_encode($bookDetails);
} else {
    echo json_encode(array('error' => 'No details found'));
}

$stmt->close();
$connection->close();
?>
