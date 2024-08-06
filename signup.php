<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="radio"]{
            margin-right: 5px;
        }
        button , a{
        	background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: #ff0000;
            font-size: 14px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <form method="post" action="">
        <label for="name">Username</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email</label>
        <input type="text" id="email" name="email" required>

        <label>Gender</label>
        <input type="radio" id="male" name="gender" value="Male" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Female" required>
        <label for="female">Female</label>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <label for="password2">Confirm Password</label>
        <input type="password" id="password2" name="password2" required>

        <input type="submit" name="signup" value="Sign Up">
        <button><a href='index.php'>Back</a></button>

        <?php 
        include 'conn.php';
        if(isset($_POST['signup'])){
            $a = $_POST['name'];
            $b = $_POST['email'];
            $c = $_POST['gender'];
            $d = $_POST['password'];
            $e = $_POST['password2'];
            $err = [];
            
            if (empty($a) || !preg_match("/^[a-zA-Z]*$/", $a)) {
                $err[] = "Enter a valid name.";
            }
            if (!filter_var($b, FILTER_VALIDATE_EMAIL)) {
                $err[] = "Enter a valid email.";
            }
            if ($c !== "Male" && $c !== "Female") {
                $err[] = "Choose your gender.";
            }
            if (empty($d) || strlen($d) < 8) {
                $err[] = "Use a valid password (at least 8 characters).";
            }
            if ($d !== $e) {
                $err[] = "Both passwords must match.";
            }
            if (!empty($err)) {
                foreach ($err as $er) {
                    echo "<p class='error'>$er</p>";
                }
            } else {
                $query = mysqli_query($conn, "INSERT INTO admins (name, email, gender, password) VALUES ('$a', '$b', '$c', '$d')");
                if ($query) {
                    echo "<script>alert('Data inserted successfully.'); location.href='index.php';</script>";
                } else {
                    echo "<p class='error'>Error: Could not execute the query.</p>";
                }
            }
        }
        ?>
    </form>
</body>
</html>
