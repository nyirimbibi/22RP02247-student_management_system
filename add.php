<?php 
include 'conn.php';
include 'panel.php';
if(isset($_POST['add'])){
	$a=$_POST['name'];
	$b=$_POST['email'];
	$c=$_POST['gender'];
	$d=$_POST['dob'];
	$err=[];
if (empty($a) || !preg_match("/^[a-zA-Z]*$/", $a)) {
	$err[]="Enter valid name pls";
}
if (!filter_var($b,FILTER_VALIDATE_EMAIL)){

   $err[]="Enter valid email";
}

if ($c!=="Male" && $c!=="Female") {
	$err[]="chose your gender";
}
if (empty($d) ) {
	$err[]="Use valid password pls";
}
if ($d<10 && $d>70 ) {
	$err[]="Enter ages between 10---70";
}

if (!empty($err)) {
	foreach ($err as $er) {
		echo $er."<br>";
	}
}
else{
	$query =mysqli_query($conn, "INSERT INTO students VALUES ('','$a', '$b', '$c', '$d')");
	echo "<script>alert('data inserted');location.href='add.php'</script>";
}
}
 ?>
<center>
<form method="post" action="">
		
		<label>Names</label><br><br>
		<input type="text" name="name" required><br><br>
		<label>Email</label><br><br>
		<input type="text" name="email" required><br><br>
		<label>Gender</label><br><br>
		<input type="radio" name="gender" value="Male" required>male
		<input type="radio" name="gender" value="Female" required>female<br><br>
		<label>Date_of_birth</label><br><br>
		<input type="date" name="dob" required> <br><br>
		<input type="submit" name="add" value="Add Student"> 
	</form></center>
