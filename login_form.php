<?php

@include 'config.php';


session_start();

if(isset($_GET['submit'])){

   $email = $_GET['email'];
   $pass = $_GET['password'];

   $select = " SELECT * FROM userinfo WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }else{

         header('location:home.html');
        

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>
   <link rel="stylesheet" href ="shivani.css">
   
   
</head>
<body>
   
<div class="form-container">

   <form action="" method="GET">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      
      <a href ="register_form.php"> <button type="button" class="btn btn-primary"><h4 style="height: 25px; width: 200px; color: rgb(0, 0, 0);">Dont have an account?</h4></style></h4></button> </button></a>
     
   </form>

</div>

</body>
</html>
