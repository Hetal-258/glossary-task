<html>
<head>
</head>
<body>
<?php
$servername='localhost';
$username='root';
$password='M$p@1234';
$dbname = "corephp";
$conn=mysqli_connect($servername,$username,$password,$dbname);

		$id=$_GET['id'];
		$image=$_FILES['pic']['name'];
		$tmp_profile=$_FILES['pic']['tmp_name'];
		move_uploaded_file($tmp_profile, "img/".$image);
		
		$query1 = mysqli_query($conn,"SELECT * FROM `register` WHERE id='$id' ");
		while ($test = mysqli_fetch_array($query1))
		{
      ?>	
	<form method="POST">
		
			<table align="center" border="1">
				<tr>
					<td><b>First Name</b></td>
					<td>
					<input type="text"  name="id" value="<?php echo $test['id']; ?>">
						<input type="text" id="fname" name="fname" value="<?php echo $test['fname']; ?>">
					</td>
				</tr>
				<tr>
					<td><b>Email</b></td>
					<td>
						<input type="email" placeholder="Enter Email" name="email" value="<?php echo $test['email']; ?>">
					</td>
				</tr>
				<tr>
					<td><b>Phone Number</b></td>
					<td>
						<input type="tel" name="phone" placeholder="(814)-0876-676"  value="<?php echo $test['phone']; ?>">
					</td>
				</tr>
				<tr>
					<td><b>Gender</b></td>
					<td>
						<input type="radio" id="gender" name="gender" <?php if($test["gender"]=='Male') echo "checked"?> value="Male">Male						
						<input type="radio" id="gender" name="gender" <?php if($test["gender"]=='Female') echo "checked"?> value="Female">Female	
					</td>
				</tr>


				<tr>
 						<td><b>Hobby<b></td>
 						<?php
 						$hob=explode(",",$test['hobby']);
 						?>
 						<td><input type="checkbox" name="chk[]" value="Play" <?php  if(in_array('play', $hob)) echo "checked"?>>Play
 						<input type="checkbox" name="chk[]" value="read" <?php  if(in_array('read', $hob)) echo "checked"?>>Read
 						<input type="checkbox" name="chk[]" value="write" <?php  if(in_array('write', $hob)) echo "checked"?>>Write</td>
 					</tr>
				<tr>

					<td><b>Education</b></td>
					<td>
						<select name="education">
							<option value=" ">--Select--</option>
							<option name="education" <?php if($test["education"]=='BCA') {echo "selected";}?>>BCA</option>

							<option name="education"  <?php if($test["education"]=='BBA') {echo "selected";}?>>BBA</option>

							<option name="education"  <?php if($test["education"]=='BCOM') {echo "selected";}?>>BCOM</option>

							
						</select>
					</td>
				</tr>
				<tr>
						<td>
						Image
						</td>
						<td>
							<input type="file" name="pic">
		    				 <img src="img/<?php echo $test['image'];?>" height="50px" width="50px">

						</td>
				</tr>
				<!-- <tr>
						<td>
						Gallery
						</td>
						<td>
						<input type="file" name="image[]" multiple="">
						 <?php

						 $temp=explode(',', $test['gallery']);
						 for($i=0;$i<count($temp);$i++)
						 {
						 	?>
						 	
						  <img src=img/<?php echo $temp[$i];?> height="50px" width="50px">
						<?php
						 }
						}
						 ?>
						 </td>
    			</tr> -->

				<tr>
					<td>
					<input type="submit" name="edit" value="Update">
					</td>
				</tr>
			</table>
		</form>

</body>
</html>
<?php
	if(isset($_POST['edit']))
		{
			$id=$_POST['id'];
			$fname= $_POST['fname'];
			  $email= $_POST['email'];
			  $phone= $_POST['phone'];
			  $gender= $_POST['gender'];
			  $hobby = implode(',', $_POST['chk']);
			  $education = $_POST['education'];
			  $image=$_FILES['pic']['name'];
			  $tmp_profile=$_FILES['pic']['tmp_name'];
			  move_uploaded_file($tmp_profile, "img/".$image);


			/*$ima=array();

			foreach($_FILES['image']['tmp_name'] as $keys=> $tmp_name)
				{
				$File_name=$_FILES["image"]["name"][$keys];
				$tmp_name=$_FILES["image"]["tmp_name"][$keys];
 
			     move_uploaded_file($tmp_name,"img/".$File_name);
				
					array_push($ima, $File_name);
				}

			$im=implode(",", $ima);*/

			
				$query= mysqli_query($conn,"UPDATE `register` SET `fname`='$fname',`email`='$email',`phone`='$phone',`gender`='$gender',`hobby`='$hobby',`education`='$education',`image`='$image' WHERE id='$id' ");
				
					header('Location:display.php');
				}
?>