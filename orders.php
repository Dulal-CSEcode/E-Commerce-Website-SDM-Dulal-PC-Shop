<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/homestyle.css">

</head>

<body>

   <?php include 'header.php'; ?>

   <section class="placed-orders">
      <marquee direction="scroll" style="color:green;text-align:center; font-size:25px; font-weight:600">!!Our valid customer mention your comments about our shop in the review box.!!</marquee>
      <h1 class="title">placed orders</h1>

      <div class="box-container">

         <?php
         $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
         $select_orders->execute([$user_id]);
         if ($select_orders->rowCount() > 0) {
            while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
         ?>
               <div class="box">
                  <p class="name"> Name : <span><?= $fetch_orders['name']; ?></span> </p>
                  <p> placed on : <span><?= $fetch_orders['placed_on']; ?></span> </p>
                  <p> number : <span><?= $fetch_orders['number']; ?></span> </p>
                  <p> email : <span><?= $fetch_orders['email']; ?></span> </p>
                  <p> address : <span><?= $fetch_orders['address']; ?></span> </p>
                  <p> payment method : <span><?= $fetch_orders['method']; ?></span> </p>
                  <p> your orders : <span><?= $fetch_orders['total_products']; ?></span> </p>
                  <p> total price : <span>Tk.<?= $fetch_orders['total_price']; ?>/=</span> </p>
                  <p> payment status : <span style="color:<?php if ($fetch_orders['payment_status'] == 'pending') {
                                                               echo 'red';
                                                            } else {
                                                               echo 'green';
                                                            }; ?>"><?= $fetch_orders['payment_status']; ?></span> </p>
               </div>
         <?php
            }
         } else {
            echo '<p class="empty">no orders placed yet!</p>';
         }
         ?>

      </div>

   </section>
   <!------------------------------review form----------------->

   <section class="reviewsform">
      <h1 class="title">send review</h1>

      <form action="" method="POST">
         <input type="text" name="name" class="box" required placeholder="enter your name">
         <textarea name="msg" class="box" required placeholder="enter your message" cols="30" rows="10"></textarea>
         <input type="submit" value="send review" class="btn" name="send">
      </form>

   </section>





   <?php include 'footer.php'; ?>

   <script src="js/script.js"></script>

</body>

</html>

<?php if (isset($_POST['send'])) {
   $username = $_POST['name'];
   $mes = $_POST['msg'];
   $userid = $_SESSION['user_id'];
   $insertsql = "INSERT INTO `review`( `name`, `reviews`,`userid`) VALUES ('$username','$mes','$userid')";
   $conn->query($insertsql);
}
?>