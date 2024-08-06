<?php
session_start();
if($_SESSION['name'] == false) {
header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrator Panel</title>
    <style>
        /* Basic Reset */
        body, h1, ul {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }

        nav {
            background-color: #333;
            padding: 10px 0;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            padding: 5px 10px;
            transition: background-color 0.3s;
        }


        h1 {
            color: #333;
            font-size: 2em;
        }


       
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="add.php">New Student</a></li>
            <li><a href="view.php">Student Records</a></li>
            <li><a href="log.php">Logout</a></li>
        </ul>
    </nav>
    <div class="container">
        <center><h1>Welcome to the Administrator Panel</h1></center><br><br><br>
    </div>
</body>
</html>
