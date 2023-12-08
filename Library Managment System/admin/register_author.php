<?php
    require('functions.php');
    session_start();
    $server = 'localhost';
    $username = 'root';
    $password = '2080804';
    $database = 'dbms_project';
    $connection = new mysqli($server, $username, $password, $database, 3310);
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    $author_id = "";
    $author_name = "";
    $query = "select * from author";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-6CWM2dPpxho3XMtMSjCqZnGzIzuzm5Tpgx5t7P7FqUmphdQGzn9+72A8C6L0j75" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <style type="text/css">
        header {
            height:90px;
            background-color: #ffffff;
            padding: 15px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 3px 5px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
        }

        .left {
            margin-left: 50px;
            cursor: pointer;
        }

        .left img {
            margin-top: 0px;
            width: 130px;
        }

        .right {
            margin-right: 30px;
        }

        .navbar li {
            display: inline-block;
            font-size: 15px;
            margin-right: 20px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            margin-top: 10px;
            margin-bottom: -5px;
        }

        .navbar li a {
            color: black;
            text-decoration: none;
            padding: 30px 30px;
        }

        .navbar li a:hover {
            color: #398AF7;
        }

        #main_content {
            padding: 20px;
        }

        form {
            margin-top: 100px;
            background-color: #fff;
            padding: 45px;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        h1 {
            margin-top: 30px;
            font-size: 34px;
            text-align: left;
            color: #333;
            font-weight: bold;
            margin-left: 25px;
            margin-bottom: 10px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }


        label {
            margin-left: 25px;
            display: block;
            margin-bottom: 5px;
            color: #777;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        textarea {
            width: 85%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            margin-left: 25px;
            color: #777;
        }

        button {
            background-color: #398AF7;
            color: #fff;
            cursor: pointer;
            width: 85%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            margin-left: 25px;
            margin-bottom: 30px;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <header>
            <div class="left">
                <a href="index.php">
                    <img src="logo.png" alt="logo">
                </a>
            </div>
            <span><strong>Welcome: <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : '';?></strong></span>
            <span><strong>Email: <?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '';?></strong></span>
            <div class="right">
                <ul class="navbar">
                   <li class="nav-item">
                       <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">Profile</a>
                       <div class="dropdown-menu">
                           <a class="dropdown-item" href="view_profile.php">View Profile</a>
                            <a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
                             <a class="dropdown-item" href="change_password.php">Change Password</a>
                       </div>
                   </li>
                   <li class="nav-item"><a class="nav-link" href="../logout.php">Logout</a></li>
                </ul>
            </div>
        </header>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd; margin-top: 100px;height: 50px; align-items: center;">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-center">
                <li class="nav-item">
                    <a href="admin_dashboard.php" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle" data-toggle = "dropdown">Book</a>
                    <div class="dropdown-menu">
                        <a href="" class="dropdown-item">Add New Book</a>
                        <a href="" class="dropdown-item">Manage Book</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle" data-toggle = "dropdown">Category</a>
                    <div class="dropdown-menu">
                        <a href="" class="dropdown-item">Add New Category</a>
                        <a href="" class="dropdown-item">Manage Category</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle" data-toggle = "dropdown">Author</a>
                    <div class="dropdown-menu">
                        <a href="" class="dropdown-item">Add New Author</a>
                        <a href="" class="dropdown-item">Manage Author</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Issue Book</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form>
                <table class="table-bordered" width="900px" style="text-align: center;">
                    <tr>
                        <th>Author ID:</th>
                        <th>Author Name:</th>
                    </tr>
                    <?php
                        $query_run = mysqli_query($connection,$query);
                        while ($row = mysqli_fetch_assoc($query_run))
                        {
                            $author_id = $row['author_id'];
                            $author_name = $row['author_name'];
                            ?>
                            <tr>
                                <td><?php echo $author_id;?></td>
                                <td><?php echo $author_name;?></td>
                            </tr>
                            <?php
                        }
                    ?>
                </table>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>
</html>
