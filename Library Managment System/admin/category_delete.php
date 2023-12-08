<?php
	$server = 'localhost';
    $username = 'root';
    $password = '2080804';
    $database = 'dbms_project';
    $connection = new mysqli($server, $username, $password, $database, 3310);
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
	$query = "delete from category where category_id = $_GET[cid]";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Category Deleted successfully");
	window.location.href = "manage_category.php";
</script>