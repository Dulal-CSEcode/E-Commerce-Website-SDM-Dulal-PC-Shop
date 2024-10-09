<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($_SESSION['user_id'])) {
   header('location:login.php');
};

if (isset($_POST['add_to_wishlist'])) {

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);

   $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
   $check_wishlist_numbers->execute([$p_name, $user_id]);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if ($check_wishlist_numbers->rowCount() > 0) {
      $message[] = 'already added to wishlist!';
   } elseif ($check_cart_numbers->rowCount() > 0) {
      $message[] = 'already added to cart!';
   } else {
      $insert_wishlist = $conn->prepare("INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES(?,?,?,?,?)");
      $insert_wishlist->execute([$user_id, $pid, $p_name, $p_price, $p_image]);
      $message[] = 'added to wishlist!';
   }
}

if (isset($_POST['add_to_cart'])) {

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);
   $p_qty = $_POST['p_qty'];
   $p_qty = filter_var($p_qty, FILTER_SANITIZE_STRING);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if ($check_cart_numbers->rowCount() > 0) {
      $message[] = 'already added to cart!';
   } else {

      $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
      $check_wishlist_numbers->execute([$p_name, $user_id]);

      if ($check_wishlist_numbers->rowCount() > 0) {
         $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE name = ? AND user_id = ?");
         $delete_wishlist->execute([$p_name, $user_id]);
      }

      $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
      $insert_cart->execute([$user_id, $pid, $p_name, $p_price, $p_qty, $p_image]);
      $message[] = 'added to cart!';
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
   <link rel="icon" type="image/x-icon" href="">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="css/homestyle.css">
   <style>
      a {
         text-decoration: none;
      }
   </style>

</head>

<body>

   <?php include 'header.php'; ?>

   <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
         <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
         <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
         <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
         <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
      </div>
      <div class="carousel-inner">
         <div class="carousel-item active" data-bs-interval="10000">
            <img src="./images/slide2.jpg" class="w-100 h-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
               <a href="shop.php" class="btn">Shop Now</a>
               <h3></h3>
            </div>
         </div>
         <div class="carousel-item" data-bs-interval="2000">
            <img src="./images/slide3.jpg" class="w-100 h-100" alt="">
            <div class="carousel-caption d-none d-md-block">
               <a href="shop.php" class="btn">Shop Now</a>
            </div>
         </div>
         <div class="carousel-item">
            <img src="./images/slide1.jpg" class="w-100 h-100" alt="...">

            <div class="carousel-caption d-none d-md-block">
               <p style="background-color:black">don't panic, go organice.</p>
               <h5><a href="shop.php" class="btn">Shop Now</a></h5>
            </div>
         </div>
         <div class="carousel-item">
            <img src="./images/slide4.jpg" class="w-100 h-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
               <h5><a href="about.php" class="btn">Shop Now</a></h5>
            </div>
         </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Next</span>
      </button>
   </div>
   <!-----------------shop catrgory--------->

   <section class="home-category">

      <h1 class="title">Shop By Category</h1>

      <div class="box-container">

         <div class="box">
            <img src="images/laptop.png" alt="">
            <h3>Laptop</h3>
            <p>Experience the latest technology with every click.</p>
            <a href="category.php?category=Laptop" class="btn">Laptop</a>
         </div>

         <div class="box">
            <img src="images/mobile.png" alt="">
            <h3>Mobile</h3>
            <p>Stay connected with the latest in mobile innovation.</p>
            <a href="category.php?category=Mobile" class="btn">Mobile</a>
         </div>

         <div class="box">
            <img src="images/pc.png" alt="">
            <h3>PC</h3>
            <p>Discover the power and versatility of PC computing.</p>
            <a href="category.php?category=PC" class="btn">PC</a>
         </div>

         <div class="box">
            <img src="images/monitor.png" alt="">
            <h3>Monitor</h3>
            <p>Enhance your experience with high-quality monitors.</p>
            <a href="category.php?category=Monitor" class="btn">Monitor</a>
         </div>

      </div>


   </section>


   <section class="products">

      <h1 class="title">latest products</h1>

      <div class="box-container">

         <?php
         $select_products = $conn->prepare("SELECT * FROM `products` ORDER BY `products`.`id` DESC LIMIT 6");
         $select_products->execute();
         if ($select_products->rowCount() > 0) {
            while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
         ?>
               <form action="" class="box" method="POST">
                  <div class="price">Tk.<span><?= $fetch_products['price']; ?></span>/=</div>
                  <a href="view_page.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
                  <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
                  <div class="name"><?= $fetch_products['name']; ?></div>
                  <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                  <input type="hidden" name="p_name" value="<?= $fetch_products['name']; ?>">
                  <input type="hidden" name="p_price" value="<?= $fetch_products['price']; ?>">
                  <input type="hidden" name="p_image" value="<?= $fetch_products['image']; ?>">
                  <div class="latest-btn">
                     <button type="submit" class="option-buttn" name="add_to_cart"><i class="fas fa-cart-shopping fa-bounce" style=" --fa-bounce-start-scale-x: 1; --fa-bounce-start-scale-y: 1; --fa-bounce-jump-scale-x: 1; --fa-bounce-jump-scale-y: 1; --fa-bounce-land-scale-x: 1; --fa-bounce-land-scale-y: 1; "></i></button>
                     <button type="submit" class="option-buttn" name="add_to_wishlist"><i class="fa-solid fa-heart fa-beat"></i></button>
                     <input type="number" min="0" value="1" name="p_qty" class="qty" step="0.1">
                  </div>
               </form>
         <?php
            }
         } else {
            echo '<p class="empty">no products added yet!</p>';
         }
         ?>

      </div>

   </section>

   <?php include 'footer.php'; ?>
   <!--------bootstrap javascript-------->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
   <script src="js/script.js"></script>


</body>

</html>