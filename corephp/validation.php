
<?php 
/*
Template Name: validation page

*/
?>

<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=email], input[type=tel],input[type=file],select {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=email]:focus ,input[type=tel]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
.signupbtn {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.signupbtn:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<script type="text/javascript">
	
</script>
<body>
<form  method="POST" name="register" style="border:1px solid #ccc" enctype="multipart/form-data">
  <div class="container">
    <h1>Sign Up</h1>
    <hr>
    <label for="email"><b>First Name</b></label>
    <input type="text" placeholder="Enter firstname" name="fname" required>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Phone Number</b></label>
    <input type="tel" name="phone" placeholder="(814)-0876-676" required>

    <label for="psw"><b>Gender</b></label>
      <input type="radio"  name="gender" value="Male">Male            
      <input type="radio" name="gender"  value="Female">Female  
      </br>
      </br>
       </br>
    <label for="psw"><b>Hobby</b></label>
      <input type="checkbox"  name="chk[]" value="play">Play            
      <input type="checkbox"  name="chk[]" value="read">read
      <input type="checkbox"  name="chk[]" value="write">write  
      </br>
      </br>   </br>

    <label for="email"><b>Education</b></label>
    <select name="edu">
      <option value=" ">--Select--</option>
      <option name="edu">BCA</option>
      <option name="edu">BBA</option>
      <option name="edu">BCOM</option>
    </select>
    
        </br> 
    <label for="email"><b>Image</b></label>
    <input type="file" name="pic"></br>
                 
    <div class="clearfix">
        <input type="submit" name="save" value="submit" class="signupbtn">
    </div>
  </div>
</form>

</body>
</html>