<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		label{
			color: 000;
			font-size: 20px;
		}
		fieldset{
			background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 10 10px 14px black;
            max-width: 400px;
            margin: auto;
            border: 1px solid #ddd;
		}
		input[type='submit'],button{
			background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
		}
		a{
			background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
		}
input[type='text'],input[type='password']{
	 width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #bbb;
            border-radius: 4px;
} form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }

	</style>

</head>
<body><center><h1>school managment system</h1><br><br><br>

	<fieldset>
		<h1>Registration/Login form</h1>
	<form method="post" action="">
		
		<label>Username</label><br><br>
		<input type="text" name="name" required><br><br>
		<label>password</label><br><br>
		<input type="password" name="password" required> <br><br>
		<input type="submit" name="login" value="Login"> <button><a href="signup.php">Sign Up</a></button>
	</form>
	</fieldset>
	<?php
	 include("conn.php");
	 session_start();
	 if(isset($_POST['login'])) {
         $name = $_POST['name'];
         $password = $_POST['password'];
		 $query = "SELECT * FROM admins WHERE name='$name' AND password='$password'";
		 $result = mysqli_query($conn, $query);
		 if($b=mysqli_num_rows($result)) {
			 $_SESSION['name'] = $name;
			 header("Location: panel.php");
			 exit();
			 } else {

             echo "Invalid username or password.";

             }
			}
	 ?>
</center>
</body>
</html>

