<?php
// your_search_script.php

// Include database connection and any necessary functions
require('functions.php');

$book_name = isset($_GET['search']) ? $_GET['search'] : '';

$query = "SELECT books.book_name, books.book_no, books.book_price, author.author_name
          FROM books
          LEFT JOIN author ON books.author_id = author.author_id
          WHERE books.book_name LIKE '%$book_name%'";

$query_run = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_run)) {
    $book_name = $row['book_name'];
    $author_name = $row['author_name'];
    $price = $row['book_price'];
    $book_no = $row['book_no'];

    echo "
        <tr>
            <td>{$book_name}</td>
            <td>{$author_name}</td>
            <td>{$price}</td>
            <td>{$book_no}</td>
        </tr>
    ";
}
?>
