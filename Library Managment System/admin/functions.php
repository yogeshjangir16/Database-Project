<?php
function get_user_count()
{
	$server = 'localhost';
	$username = 'root';
	$password = '2080804';
	$database = 'dbms_project';
	$connection = new mysqli($server, $username, $password, $database, 3310);
			    
	if ($connection->connect_error) {
			        die("Connection failed: " . $connection->connect_error);
	}
	$user_count = "";
	$query = "select count(*) as user_count from users";
	$query_run = mysqli_query($connection, $query);
	while ($row = mysqli_fetch_assoc($query_run)) {
		$user_count = $row['user_count'];
	}
	return($user_count);
}
function get_book_count()
{
	$server = 'localhost';
	$username = 'root';
	$password = '2080804';
	$database = 'dbms_project';
	$connection = new mysqli($server, $username, $password, $database, 3310);
			    
	if ($connection->connect_error) {
			        die("Connection failed: " . $connection->connect_error);
	}
	$book_count = "";
	$query = "select count(*) as book_count from books";
	$query_run = mysqli_query($connection, $query);
	while ($row = mysqli_fetch_assoc($query_run)) {
		$book_count = $row['book_count'];
	}
	return($book_count);
}
function get_cat_count()
{
	$server = 'localhost';
	$username = 'root';
	$password = '2080804';
	$database = 'dbms_project';
	$connection = new mysqli($server, $username, $password, $database, 3310);
			    
	if ($connection->connect_error) {
			        die("Connection failed: " . $connection->connect_error);
	}
	$cat_count = "";
	$query = "select count(*) as cat_count from category";
	$query_run = mysqli_query($connection, $query);
	while ($row = mysqli_fetch_assoc($query_run)) {
		$cat_count = $row['cat_count'];
	}
	return($cat_count);
}
function get_author_count()
{
	$server = 'localhost';
	$username = 'root';
	$password = '2080804';
	$database = 'dbms_project';
	$connection = new mysqli($server, $username, $password, $database, 3310);
			    
	if ($connection->connect_error) {
			        die("Connection failed: " . $connection->connect_error);
	}
	$author_count = "";
	$query = "select count(*) as author_count from author";
	$query_run = mysqli_query($connection, $query);
	while ($row = mysqli_fetch_assoc($query_run)) {
		$author_count = $row['author_count'];
	}
	return($author_count);
}
function get_issue_book_count()
{
	$server = 'localhost';
	$username = 'root';
	$password = '2080804';
	$database = 'dbms_project';
	$connection = new mysqli($server, $username, $password, $database, 3310);
			    
	if ($connection->connect_error) {
			        die("Connection failed: " . $connection->connect_error);
	}
	$issue_count = "";
	$query = "select count(*) as issue_count from issue_books";
	$query_run = mysqli_query($connection, $query);
	while ($row = mysqli_fetch_assoc($query_run)) {
		$issue_count = $row['issue_count'];
	}
	return($issue_count);
}
?>