<?php

@include 'config.php';

session_start();

if (isset($_POST['submit'])) {
   if (empty($_POST['email']) || empty($_POST['pass'])) {

      $message[] = 'All fields are Required';
   } else {
      $email = $_POST['email'];
      $email = filter_var($email, FILTER_SANITIZE_STRING);
      $pass = md5($_POST['pass']);
      $pass = filter_var($pass, FILTER_SANITIZE_STRING);

      $sql = "SELECT * FROM `users` WHERE email = ? AND password = ?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$email, $pass]);
      $rowCount = $stmt->rowCount();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($rowCount > 0) {

         if ($row['user_type'] == 'admin') {

            $_SESSION['admin_id'] = $row['id'];
            header('location:admin_page.php');
         } elseif ($row['user_type'] == 'user') {

            $_SESSION['user_id'] = $row['id'];
            header('location:home.php');
         } else {
            $message[] = 'no user found!';
         }
      } else {
         $message[] = 'incorrect email or password!';
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
   <title>SDM Dulal PC Shop</title>

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

   if (isset($message)) {
      foreach ($message as $message) {
         echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
      }
   }

   ?>

   <section class="form-container">

      <form action="" enctype="multipart/form-data" method="POST">
         <h3>Login Now</h3>
         <input type="email" name="email" class="box" placeholder="Enter your email" required>
         <input type="password" name="pass" class="box" placeholder="Enter your password" required>
         <input type="submit" value="login now" class="btn" name="submit">
         <p>Don't have an account? <a href="register.php">Register now</a></p>
      </form>

   </section>


</body>

</html>