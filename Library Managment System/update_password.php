<?php
session_start();
$server = 'localhost';
$username = 'root';
$database = 'dbms_project';
$connection = new mysqli($server, $username, '2080804', $database, 3310);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$password1 = "";
$db = mysqli_select_db($connection, "dbms_project");
$query = "SELECT * FROM users WHERE email = '$_SESSION[email]'";
$run = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($run)) {
    $password1 = $row['password'];
}

if ($password1 === $_POST['old_password']) {
    $newPassword = mysqli_real_escape_string($connection, $_POST['new_password']);
    $query = "UPDATE users SET password = '$newPassword' WHERE email ='$_SESSION[email]'";
    $run = mysqli_query($connection, $query);

    if ($run) {
        // Password update successful
        echo '<script type="text/javascript">';
        echo 'alert("Password Update Successfully!!!");';
        echo 'window.location.href = "user_dashboard.php";';
        echo '</script>';
    } else {
        // Password update failed
        echo '<script type="text/javascript">';
        echo 'alert("Password Update Failed!!!");';
        echo '</script>';
    }
}
?>
