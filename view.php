<?php include 'conn.php';
include 'panel.php'; ?><center><table border="0">
 	<th>Names</th>
 	<th>Email</th>
 	<th>Gender</th>
 	<th>Date of Birth</th>
 	<th colspan="2">Actions</th><?php 

$q=mysqli_query($conn,"select*from students");
while($var=mysqli_fetch_array($q)){
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
	 <style>
        /* Basic Reset */
        body, table {
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

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

    </style>
 </head>
 <body>
 
 	<tr>
 		<td><?php echo $var['name'] ?></td>
 		<td><?php echo $var['email'] ?></td>
 		<td><?php echo $var['gender'] ?></td>
 		<td><?php echo $var['dob'] ?></td>
 		<td><a href="update.php?id=<?php echo $var['id'] ?>">update</a></td>
 		<td><a href="delete.php?id=<?php echo $var['id'] ?>">delete</a></td>
 	</tr></center>
 	<?php } ?>
 </table>
 
 </body>
 </html>
