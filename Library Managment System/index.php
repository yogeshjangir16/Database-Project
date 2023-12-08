<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
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
            width: 330px;
            margin-top: 200px;
            margin-left: 650px;
            background-color: #fff;
            padding: 20px;
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
        .form-group {
            margin-bottom: 20px;
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
            <div class="right">
                <ul class="navbar">
                    <li><a href="signup.php">Registration</a></li>
                    <li><a href="index.php">User login</a></li>
                    <li><a href="admin/index.php">Admin login</a></li>
                    <li><a href="index.php">About Us</a></li>
                    <li><a href="index.php">Help</a></li>
                </ul>
            </div>
        </header>
    </nav>
    <div class="row">
    	<div class="col-md-8" id = "main_content">
    	<?php
			session_start();

			if (isset($_POST['submit'])) {
			    $server = 'localhost';
			    $username = 'root';
			    $password = '2080804';
			    $database = 'dbms_project';
			    $connection = new mysqli($server, $username, $password, $database, 3310);
			    
			    if ($connection->connect_error) {
			        die("Connection failed: " . $connection->connect_error);
			    }

			    $email = $_POST['email'];
			    $password = $_POST['password'];

			    $query = "SELECT * FROM users WHERE email = '$email'";
			    $query_run = mysqli_query($connection, $query);

			    if ($query_run) {
			        $row = mysqli_fetch_assoc($query_run);

			        if ($row) {
				            if ($row['password'] == $password) {
				                $_SESSION['name'] = $row['name'];
				                $_SESSION['email'] = $row['email'];
				                $_SESSION['student_id'] =  $row['student_id'];
				                header("Location: user_dashboard.php");
				                exit();
				            } else {
				                echo '<div class="my_choise">';
				                echo '<br><br><center><span class="alert-danger">Wrong Password</span></center>';
				                echo '</div>';
				            }
				        } else {
				            echo '<div class="my_choise">';
				            echo '<br><br><center><span class="alert-danger">User not found</span></center>';
				            echo '</div>';
				        }
				    } else {
				        echo '<div class="my_choise">';
				        echo '<br><br><center><span class="alert-danger">Error in query execution</span></center>';
				        echo '</div>';
				    }

			    mysqli_close($connection);
			}
			?>
    		<form action="" method="post">
    			<h1>Login</h1>    	
    		<div class="form-group">
    			<label for="name">Email ID:</label>
    			<input type="email" name="email" class="for-control" required>
    		</div>
    		<div class="form-group">
    			<label for="name">Password:</label>
    			<input type="password" name="password" class="for-control" required>
    		</div>
    		<button type="submit" name="submit" class="btn btn-primary">Submit</button>
    	</form>
    </div>
    </div>
</body>
</html>