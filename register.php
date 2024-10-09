<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = md5($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = md5($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select->execute([$email]);

   if($select->rowCount() > 0){
      $message[] = 'user email already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'Confirm password is not matched!';
      }else{
         $insert = $conn->prepare("INSERT INTO `users`(name, email, password, image) VALUES(?,?,?,?)");
         $insert->execute([$name, $email, $pass, $image]);

         if($insert){
            if($image_size > 1000000){
               $message[] = 'image size is too large!';
            }else{
               move_uploaded_file($image_tmp_name, $image_folder);
               $message[] = 'registered successfully!';
               header('location:login.php');
            }
         }

      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/components.css">
<style>
body {
  background-color: rgb(245, 245, 245);
  background-image: url("./images/front.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  background-origin: content-box;
}
.form-container {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}

.form-container form {
  width: 100%;
  max-width: 400px;
  background-color: rgba(255, 255, 255, 0.5);
  border-radius: 10px;
  box-shadow: 3px 3px 5px 3px rgb(148, 22, 220);
  padding: 4rem;
  margin: 0.5rem;
  display: flex;
  flex-direction: column;
  align-items: center;
  border: 2px solid #9416DC;
}

.form-container form h3 {
  font-size: 1.8rem;
  color: #075603;
  text-transform: uppercase;
  text-align: center;
  margin-bottom: 1.5rem;
  font-weight: 900;
}

.form-container form .box {
  width: 100%;
  font-size: 1rem;
  margin: 0.5rem 0;
  color: #000000;
  border-radius: 5px;
  font-weight: 700;
  border: 2px solid #365436;
  padding: 0.75rem;
  background-color: #e7f0e7;
}

.form-container form p {
  margin-top: 1rem;
  font-size: 1rem;
  font-weight: 600;
  text-align: center;
  color: #04042b;
}

.form-container form p a {
  color: #0bad0b;
  text-decoration: none;
}

.form-container form p a:hover {
  text-decoration: underline;
}

.form-container .btn {
  background-color: #06661b;
  padding: 0.75rem;
  width: 100%;
  border-radius: 5px;
  color: #ffffff;
  font-size: 1rem;
  text-transform: capitalize;
  cursor: pointer;
  font-family: "Dancing Script", cursive;
  margin-top: 1rem;
}

.form-container .btn:hover {
  background-color: #1a241c;
}

</style>
</head>
<body>

<?php
//for delete icon in message bar
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>

   
<section class="form-container">

   <form action="" enctype="multipart/form-data" method="POST">
      <h3>Register Now</h3>
      <input type="text" name="name" class="box" placeholder="Enter your name" required>
      <input type="email" name="email" class="box" placeholder="Enter your email" required>
      <input type="password" name="pass" class="box" placeholder="Enter your password" required>
      <input type="password" name="cpass" class="box" placeholder="Confirm your password" required>
      <input type="file" name="image" class="box" required accept="image/jpg, image/jpeg, image/png">
      <input type="submit" value="register now" class="btn" name="submit">
      <p>Already Have An Account? <a href="login.php">Login Now</a></p>
   </form>

</section>


<script src="js/script.js"></script>
</body>
</html>