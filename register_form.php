<?php

@include 'config.php';
?>





<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>
   <link rel="stylesheet" href="shivani.css">
  
</head>
<body>
   
<div class="form-container">

   <form action="" method="GET">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
   
      <input type="text" name="name" required placeholder="enter your name">
      <input type="phone no" name="phone no" required placeholder="enter your phone no">
      <input type="gender" name="gender" required placeholder="enter your gender">
      <input type="address" name="address" required placeholder="enter your address">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
     
      <input type="submit" name="submit" value="register now" class="form-btn">

      <a href ="login_form.php"> <button type="button" class="btn btn-primary"><h4 style="height: 25px; width: 200px; color: black;">Already have an account?</h4></style></h4></button> </button></a>
  
   </form>

</div>

</body>
</html>


<?php
if($_GET['submit']){

   $name = $_GET['name'];
   $email = $_GET['phone no'];
   $gender = $_GET['gender'];
   $address = $_GET['address'];
   $email = $_GET['email'];
   $pass=$_GET['password'];
   $cpass=$_GET['cpassword'];

   $select = " SELECT * FROM userinfo WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO userinfo VALUES('$name','$phone','$gender','$address','$email','$pass','$cpass')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>