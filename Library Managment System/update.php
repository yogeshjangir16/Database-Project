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
$address = $_POST['address'];
$query = "UPDATE users SET name=?, email=?, mobile=?, address=? WHERE email=?";
$stmt = $connection->prepare($query);
$stmt->bind_param("sssss", $name, $email, $mobile, $address, $email);

if ($stmt->execute()) {
    echo '<script type="text/javascript">
            alert("Update Successfully!!!");
            window.location.href = "user_dashboard.php";
          </script>';
} else {
    echo '<script type="text/javascript">
            alert("Error updating record: ' . $stmt->error . '");
            window.location.href = "user_dashboard.php";
          </script>';
}

$stmt->close();
$connection->close();
?>
