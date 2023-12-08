<?php
	$server = 'localhost';
	$username = 'root';
	$password = '2080804';
	$database = 'dbms_project';
	$connection = new mysqli($server, $username, $password, $database, 3310);
	if ($connection->connect_error) {
	    die("Connection failed: " . $connection->connect_error);
	}
	$query = "delete from books where book_no = $_GET[bn]";
	$query_run = mysqli_query($connection,$query);
	if ($query_run) {
        echo '<script>alert("Book Delete successfully");</script>';
    } else {
        echo '<script>alert("Error: ' . mysqli_error($connection) . '");</script>';
    }
?>