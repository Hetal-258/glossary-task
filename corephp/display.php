<html>
	<head>
		<title> Form</title>
	</head>
	<body>
		
		<table border="1" align="center">
			<tr>
				<td><b>ID</b></td>
				<td><b>First Name</b></td>
				<td><b>Email</b></td>
				<td><b>Phone Number</b></td>
				<td><b>Gender</b></td>
				<td><b>Hobby</b></td>
				<td><b>Education</b></td>
				<td><b>Image</b></td>
				<td><b>EDIT</b></td>
				<td><b>DELETE</b></td>
				</tr>
			<?php
				$servername='localhost';
				$username='root';
				$password='M$p@1234';
				$dbname = "corephp";
				$conn=mysqli_connect($servername,$username,$password,$dbname);
				
				$result =mysqli_query($conn ,"SELECT * FROM `register`");

				while($test = mysqli_fetch_array($result))
				{
			?>
			<tr>

				<td><?php echo $test['id'];?></td>
				<td><?php echo $test['fname'];?></td>
				<td><?php echo $test['email'];?></td>
				<td><?php echo $test['phone'];?></td>
				<td><?php echo $test['gender'];?></td>
				<td><?php echo $test['hobby'];?></td>
				<td><?php echo $test['education'];?></td>
				<td><img src="img/<?php echo $test['image'];?>" height="50px" width="50px"></td>
				<td><a href="edit.php?id=<?php echo $test['id']?>">Edit</a></td>
				<td><a href="delete.php?id=<?php echo $test['id']?>">Delete</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>