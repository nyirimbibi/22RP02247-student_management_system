<?php 
include 'conn.php';

$a=$_GET['id'];
$q=mysqli_query($conn,"delete from students where id='$a'");
header('location:view.php');
 ?>