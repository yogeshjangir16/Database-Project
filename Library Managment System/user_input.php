<?php
    $server = 'localhost';
    $username = 'root';
    $password = '2080804';
    $database = 'dbms_project';
    $connection = new mysqli($server, $username, $password, $database, 3310);
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    $db_selected = mysqli_select_db($connection, $database);
    if (!$db_selected) {
        die("Could not select the database '" . $database . "': " . mysqli_error($connection));
    }

    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $mobile = filter_var($_POST['mobile'], FILTER_SANITIZE_NUMBER_INT);
    if (strlen($mobile) !== 10 || !is_numeric($mobile)) {
        die('<script type="text/javascript">alert("Invalid mobile number. Please enter a 10-digit numeric mobile number."); window.location.href = "index.php";</script>');
    }

    $address = mysqli_real_escape_string($connection, $_POST['address']);

    $query = "INSERT INTO users (name, email, password, mobile, address) VALUES (?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("sssss", $name, $email, $password, $mobile, $address);

    $query_run = $stmt->execute();

    if ($query_run) {
        echo '<script type="text/javascript">';
        echo 'alert("Registration Successful");';
        echo 'window.location.href = "index.php";';
        echo '</script>';
    } else {
        if ($connection->errno == 1062) {
            echo '<script type="text/javascript">alert("Email already exists. Please use a different email.");</script>';
        } else {
            echo '<script type="text/javascript">alert("Registration Failed");</script>';
        }
    }

    $stmt->close();
    $connection->close();
?>
