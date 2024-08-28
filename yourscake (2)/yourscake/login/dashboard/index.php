<?php

$db_name = 'mysql:host=localhost;dbname=yourscake';
$user_name = 'root';
$user_password = '';

$conn = new PDO($db_name, $user_name, $user_password);

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $query = $_POST['query'];
   $query = filter_var($query, FILTER_SANITIZE_STRING);
   $gender = $_POST['gender'];
   $gender = filter_var($gender, FILTER_SANITIZE_STRING);

   $select_contact = $conn->prepare("SELECT * FROM `cnt` WHERE name = ? AND number = ? AND email = ? AND query = ? AND gender = ?");
   $select_contact->execute([$name, $number, $email, $query, $gender]);

   if($select_contact->rowCount() > 0){
      $message[] = 'already sent message!';
   }else{
      $insert_message = $conn->prepare("INSERT INTO `cnt`(name, number, email, query, gender) VALUES(?,?,?,?,?)");
      $insert_message->execute([$name, $number, $email, $query, $gender]);
      $message[] = 'message sent successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>YoursCake</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php
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

<!-- header section starts  -->

<header class="header">

   <section class="flex">

      <a href="#home" class="logo">YoursCake.</a>

      <nav class="navbar">
         <a href="#teachers">Founders</a>
         <a href="#reviews">reviews</a>
         <a href="#contact">contact</a>
         <a href="logout.php">Logout</a>
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>

   </section>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

   <div class="row">

      <div class="content">
         <h3>welcome to<span>YoursCake</span></h3>
         <a href="#contact" class="btn">contact us</a>
      </div>

      <div class="image">
         <img src="images/cake.jpg" alt="">
      </div>

   </div>

</section>

<!-- home section ends -->

<!-- couter section stars  -->

<section class="count">

   <div class="box-container">

      <div class="box">
         <i class="fas fa-user-graduate"></i>
         <div class="content">
            <h3>100+</h3>
            <p>Expert chefs</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-chalkboard-user"></i>
         <div class="content">
            <h3>100+</h3>
            <p>customers</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-face-smile"></i>
         <div class="content">
            <h3>100%</h3>
            <p>satisfaction</p>
         </div>
      </div>

   </div>

</section>

<!-- couter section ends -->

<!--Cake Design Section Starts-->

<div class="cakedesign">
   <div class="img">
      <img src="images/cake.jpg" alt="">
   </div>
   <a href="cake/cake.php">Let's Design</a>
</div>

<!--Cake Design Section Ends-->

<!-- teachers section starts  -->

<section class="teachers" id="teachers">

   <h1 class="heading">YoursCake <span>founders</span></h1>

   <div class="swiper teachers-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <img src="images/tutor2.jpg" alt="">
            <div class="share">
               <a href="https://linkedin.com/in/moshuaib" class="fab fa-linkedin"></a>
            </div>
            <h3>Mohd Shuaib</h3>
         </div>
         
         <div class="swiper-slide slide">
            <img src="images/tutor.jpg" alt="">
            <div class="share">
               <a href="https://linkedin.com/in/moshuaib" class="fab fa-linkedin"></a>
            </div>
            <h3>Mohd Shuaib</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/tutor3.jpeg" alt="">
            <div class="share">
               <a href="https://linkedin.com/in/moshuaib" class="fab fa-linkedin"></a>
            </div>
            <h3>Mohd Shuaib</h3>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<!-- teachers section ends -->

<!-- reviews section starts  -->

<section class="reviews" id="reviews">

   <h1 class="heading"> customer <span>reviews</span></h1>

   <div class="swiper reviews-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <p>It's been a great experience so far and I'm looking forward to becoming a great customer of yourscake!</p>
            <div class="user">
               <img src="images/tutor2.jpg" alt="">
               <div class="user-info">
                  <h3>Mohd Shuaib</h3>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>
         </div>

         <div class="swiper-slide slide">
            <p>The cake customization is really awesome!</p>
            <div class="user">
               <img src="images/tutor.jpg" alt="">
               <div class="user-info">
                  <h3>Mohd Shuaib</h3>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>
         </div>

         <div class="swiper-slide slide">
            <p>The cake are really too much tasty!</p>
            <div class="user">
               <img src="images/tutor3.jpeg" alt="">
               <div class="user-info">
                  <h3>Mohd Shuaib</h3>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<!-- reviews section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">

   <h1 class="heading"><span>contact</span> us</h1>

   <div class="row">

      <div class="image">
         <img src="images/contact-img.jpg" alt="">
      </div>

      <form action="" method="post">
         <span>your name</span>
         <input type="text" required placeholder="enter your full name" maxlength="50" name="name" class="box">
         <span>your number</span>
         <input type="tel" required placeholder="enter 10 digit valid number" max="9999999999" min="0" pattern="[0-9]{10}" name="number" class="box" onkeypress="if(this.value.length == 10) return false;">
         <span>your email</span>
         <input type="email" required placeholder="enter your valid email" maxlength="50" name="email" class="box">
         <span>your query</span>
         <input type="text" required placeholder="enter your query" maxlength="200" name="query" class="box">
         <span>select gender</span>
         <div class="radio">
            <input type="radio" name="gender" value="male" id="male">
            <label for="male">male</label>
            <input type="radio" name="gender" value="female" id="female">
            <label for="female">female</label>
         </div>
         <input type="submit" value="send message" class="btn" name="send">
      </form>

   </div>

</section>

<!-- contact section ends -->

<!-- footer section starts  -->

<footer class="footer">

   <section>

      <div class="share">
         <a href="https://twitter.com/sooaib7" class="fab fa-twitter"></a>
         <a href="https://www.linkedin.com/in/moshuaib" class="fab fa-linkedin"></a>
         <a href="https://youtube.com/c/DigitalShuaib" class="fab fa-youtube"></a>
      </div>

      <div class="credit">&copy; copyright @ 2022 by <span>mohd shuaib</span> | all rights reserved!</div>

   </section>

</footer>

<!-- footer section ends -->















<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>