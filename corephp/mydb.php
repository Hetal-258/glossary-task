<?php

    $hName='localhost'; // host name

    $uName='root';   // database user name

    $password='M$p@1234';   // database password

    $dbName = "wp_demo"; // database name

    $conn= mysqli_connect($hName,$uName,$password,"$dbName");

      if($conn){
        echo"succesds";
         
      }
      else{
      	 die('Could not Connect MySql Server:' .mysql_error());
      }
?>