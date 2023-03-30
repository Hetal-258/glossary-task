<?php 
$link = mysqli_connect("localhost", "root", " ", "corephp");

if(isset($_POST['save'])){

  $fname= $_POST['fname'];
  $email= $_POST['email'];
  $phone= $_POST['phone'];
  $msg = $_POST['message'];

  $sql = "INSERT INTO register (fname,email,phone,message)
   VALUES ('$fname','$email','$phone','$msg')";

 if (mysqli_query($link, $sql)) {
    require '/..class/class.phpmailer.php';
    echo "hello";
      $mail = new PHPMailer;
      $mail->IsSMTP();        //Sets Mailer to send message using SMTP
      $mail->Host = 'smtp.gmail.com';  //Sets the SMTP hosts
      $mail->Port = '587';        //Sets the default SMTP server port
      $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
      $mail->Username = 'devtest7281@gmail.com';     //Sets SMTP username
      $mail->Password = 'Mspdev@2020';     //Sets SMTP password
      $mail->SMTPSecure = '';       //Sets connection prefix. Options are "", "ssl" or "tls"
      $mail->From = $_POST["email"];     //Sets the From email address for the message
      $mail->FromName = $_POST["fname"];    //Sets the From name of the message
      $mail->AddAddress('info@find2rent.com', 'Name');//Adds a "To" address
      $mail->AddCC($_POST["email"], $_POST["fname"]); //Adds a "Cc" address
      $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
      $mail->IsHTML(true);       //Sets message type to HTML    
      $mail->Subject = 'submission form';    //Sets the Subject of the message
      $mail->Body = $_POST["message"];    //An HTML or plain text message body
      if($mail->Send())        //Send an Email. Return true on success or false on error
      {
      echo  $error = '<label class="text-success">Thank you for contacting us</label>';
      }
   } else {
    echo "Error: " . $sql . "
" . mysqli_error($link);
   }
    }

?>