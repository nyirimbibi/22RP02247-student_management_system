<?php 
include 'db.php';
session_start();
$a=$_POST['name'];
$b=$_POST['password'];
$query=mysqli_query($conn,"select * from admins where name='$a' && password='$b'");
$nums=mysqli_num_rows($query);

	if($nums){
		$_SESSION['users']=$a;
		header('location:panel.php');
	}
	else{
		header('location:index.php');
	}

 ?>
