<html>
	<head>
			<title>simple page</title>
</head>
		<body>
 				<form  method="POST" enctype="multipart/form-data">
 					
 					<table border="1">
 						
 					<tr>
 						<td>FirstName</td>
 						<td><input type="text" name="txtfname"></td>
 					</tr>
 					<tr>
 						<td>LastName</td>
 						<td><input type="text" name="txtlname"></td>
 					</tr>
 					<tr>
 						<td>Gender</td>
 						<td><input type="radio" id="gender" name="gender" value="Male">Male						
						<input type="radio" id="gender" name="gender" value="Female">Female</td>
 					</tr>
 					<tr>
 						<td>Hobby</td>
 						<td><input type="checkbox" name="chk[]" value="Play">Play
 						<input type="checkbox" name="chk[]" value="read">Read
 						<input type="checkbox" name="chk[]" value="write">Write</td>
 					</tr>
 					<tr>
 						<td>Education</td>
 						<td><select name="education" id="education">
							<option value="1">--Select--</option>
							<option name="education" value="BCA">1</option>
							<option name="education" value="BBA">2</option>
							<option name="education" value="BCOM">3</option>
							
						</select></td>
 					</tr>
 					<tr>
 						<td>Image</td>
 						<td><input type="file" name="image"></td>
 					</tr>

 					<tr>
 						<td>Gallery</td>
 						<td><input type="file" name="gell[]" multiple=""></td>
 					</tr> 
 					<tr>
 					<td>
 					<input type="submit" name="sub" value="submit">
 					</td>
 					</tr>

 					</table>
 				</form>
		</body>
</html>

<?php
	include 'conn.php';

	if(isset($_POST['sub']))
	{

		$fname=$_POST['txtfname'];
		$lname=$_POST['txtlname'];
		$gen=$_POST['gender'];
		$hob=implode(",",$_POST['chk']);
		$edu=$_POST['education'];

		
     	$profile=$_FILES['image']['name'];
		$tmp_profile=$_FILES['image']['tmp_name'];
		move_uploaded_file($tmp_profile, "img/".$profile);
		
		$ima=array();

		foreach($_FILES['gell']['tmp_name'] as $keys=> $tmp_name)
		{
			$File_name=$_FILES["gell"]["name"][$keys];
			$tmp_name=$_FILES["gell"]["tmp_name"][$keys];

			if(move_uploaded_file($tmp_name,"img/".$File_name))
			{
               
               echo "file upload";
			}
			array_push($ima, $File_name);
		}

			$im=implode(",", $ima);

		echo  $query="INSERT INTO `demo`(`firstname`, `lastname`, `gender`,`hobby`,`education`,`image`,`gallery`) VALUES ('$fname','$lname','$gen','$hob','$edu','$profile','$im')";
		
					$result=mysqli_query($conn,$query);
					if ($result>0) {
						header('location:display.php');
						# code...
					}
					else
					{
						
					echo "not";

	}
}

                                                                    
?>