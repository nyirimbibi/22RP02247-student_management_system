<?php 
include 'conn.php';
include 'panel.php';
$k=$_GET['id'];
$q=mysqli_query($conn,"select * from students where id='$k'");
while($var=mysqli_fetch_array($q)){
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
 </head>
 <body>
 <center><form method="Post">
 	<label>Names</label><br><br>
		<input type="text" name="name" required value="<?php echo $var['name'] ?>"><br><br>
		<label>Email</label><br><br>
		<input type="text" name="email" required value="<?php echo $var['email'] ?>"><br><br>
		<label>Gender</label><br><br>
		<input type="radio" name="gender" value="Male" required value="<?php echo $var['gender'] ?>">male
		<input type="radio" name="gender" value="Female" required value="<?php echo $var['gender'] ?>">female<br>
		<label>Date_of_birth</label><br><br>
		<input type="date" name="dob" required value="<?php echo $var['dob'] ?>"> <br><br>
		<input type="submit" name="add" value="update Student"> 
 	
 </table></form></center>
 <?php } 
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
	$query =mysqli_query($conn, "UPDATE students SET name='$a' ,email= '$b', gender='$c', dob='$d' where id='$k'");
	echo "<script>alert('data updated');location.href='view.php'</script>";
}
}

?>