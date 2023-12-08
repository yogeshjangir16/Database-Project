<?php
	$server = 'localhost';
	$username = 'root';
	$password = '2080804';
	$database = 'dbms_project';
	$connection = new mysqli($server, $username, $password, $database, 3310);
	if ($connection->connect_error) {
	    die("Connection failed: " . $connection->connect_error);
	}
	$query = "delete from author where author_id = $_GET[aid]";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Author Deleted successfully");
	window.location.href = "manage_author.php";
</script>