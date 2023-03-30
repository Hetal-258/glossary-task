<?php
$servername='localhost';
$username='root';
$password='M$p@1234';
$dbname = "corephp";
$conn=mysqli_connect($servername,$username,$password,$dbname);
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$query=mysqli_query($conn,"DELETE FROM `register` WHERE id='$id' ");
		if($query>0)
		{
			header('Location:display.php');
		}
		else
		{
			mysqli_query($query) or die(mysqli_error());
		}
	}
?>