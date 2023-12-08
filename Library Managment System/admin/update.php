<?php
$server = 'localhost';
$username = 'root';
$password = '2080804';
$database = 'dbms_project';
$connection = new mysqli($server, $username, $password, $database, 3310);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$db = mysqli_select_db($connection, "dbms_project");
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$query = "UPDATE admin SET name=?, email=?, mobile=? WHERE email=?";
$stmt = $connection->prepare($query);
$stmt->bind_param("ssss", $name, $email, $mobile, $email);


if ($stmt->execute()) {
    echo '<script type="text/javascript">
            alert("Update Successfully!!!");
            window.location.href = "admin_dashboard.php";
          </script>';
} else {
    echo '<script type="text/javascript">
            alert("Error updating record: ' . $stmt->error . '");
            window.location.href = "admin_dashboard.php";
          </script>';
}

$stmt->close();
$connection->close();
?>
