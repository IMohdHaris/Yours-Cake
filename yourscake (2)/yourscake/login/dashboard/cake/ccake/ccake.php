<?php

$db_name = 'mysql:host=localhost;dbname=yourscake';
$user_name = 'root';
$user_password = '';

$conn = new PDO($db_name, $user_name, $user_password);

if(isset($_POST['senda'])){

   $imagea = $_POST['imagea'];
   $imagea = filter_var($imagea, FILTER_SANITIZE_STRING);
   $datea = $_POST['datea'];
   $datea = filter_var($datea, FILTER_SANITIZE_STRING);
   $weighta = $_POST['weighta'];
   $weighta = filter_var($weighta, FILTER_SANITIZE_STRING);
   $bnamea = $_POST['bnamea'];
   $bnamea = filter_var($bnamea, FILTER_SANITIZE_STRING);
   $numbera = $_POST['numbera'];
   $numbera = filter_var($numbera, FILTER_SANITIZE_STRING);
   $addressa = $_POST['addressa'];
   $addressa = filter_var($addressa, FILTER_SANITIZE_STRING);

   $select_contact = $conn->prepare("SELECT * FROM `cakea` WHERE imagea = ? AND datea = ? AND weighta = ? AND bnamea = ? AND numbera = ? AND addressa = ?");
   $select_contact->execute([$imagea, $datea, $weighta, $bnamea, $numbera, $addressa]);

   if($select_contact->rowCount() > 0){
      $message[] = 'Order already placed!';
   }else{
      $insert_message = $conn->prepare("INSERT INTO `cakea`(imagea, datea, weighta, bnamea, numbera, addressa) VALUES(?,?,?,?,?,?)");
      $insert_message->execute([$imagea, $datea, $weighta, $bnamea, $numbera, $addressa]);
      $message[] = 'Order placed mail sent successfully!';
   }

}

?>

<?php 
if(isset($_POST['senda'])){
    $to = ""; // this is your Email address
    $from = $_POST['numbera']; // this is the sender's Email address
    $bname = $_POST['bnamea'];
    $subject = "Yours Cake";
    $subject2 = "Copy mail of your order";
    $message1 = "\n\n" . $_POST['addressa'];
    $message2 = "Thanks for Ordering with us " . $bnamea . "\n\n"."Your Order Details"."\n\n" . "Weight: " 
    .$weighta  . " pond"."\n\n". "Address: " .$addressa ."\n\n"."Pay The Amount On Delivery: ".$weighta*(400)." Rupees"."\n\n";

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message1,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    //echo "Mail Sent. Thank you " . $bname . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    // You cannot use header and echo together. It's one or the other.
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cake</title>
</head>

<!-- swiper css link  -->
<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

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

<?php
$dy = date('d');
$mn = date('m');
$yr = date('Y');

$today = $yr. '-'.$mn.'-'.$dy;
?>
    <div class="up">
        <div class="cake">
          <h1 id="a">CHOCOLATE CAKE</h1>
          <h1 id="b">KIDS CAKE</h1>
          <h1 id="c">RED VELVET CAKE</h1>
          <h1 id="d">MANGO CAKE</h1>
          <h1 id="e">MOTHERS DAY CAKE</h1>
          <h1 id="f">VALENTINES DAY CAKE</h1>
          <h2 id="g">Hi, Welcome Select Your Cake</h2>
            <div class="imgs">
                <img id="1" src="chocolatecake.jpeg" alt="">
                <img id="2" src="kidscake.jpeg" alt="">
                <img id="3" src="redvelvetcake.jpeg" alt="">
                <img id="4" src="mangocake.png" alt="">
                <img id="5" src="mothersdaycake.jpeg" alt="">
                <img id="6" src="valentinescake.png" alt="">
            </div>
        </div>
        <div class="form">
            <form action="" method="POST">
                <h1>Order Now</h1>
                <table>
                    <tr>
                      <td>
                        <input type="radio" onclick="cho()" name="imagea" value="image1">
                        <img src="chocolatecake.jpeg" alt="Image 1">
                      </td>
                      <td>
                        <input type="radio" onclick="kid()" name="imagea" value="image2">
                        <img src="kidscake.jpeg" alt="Image 2">
                      </td>
                      <td>
                        <input type="radio" onclick="rvl()" name="imagea" value="image3">
                        <img src="redvelvetcake.jpeg" alt="Image 3">
                      </td>
                      <td>
                        <input type="radio" onclick="mng()" name="imagea" value="image4">
                        <img src="mangocake.png" alt="Image 4">
                      </td>
                      <td>
                        <input type="radio" onclick="mtd()" name="imagea" value="image5">
                        <img src="mothersdaycake.jpeg" alt="Image 5">
                      </td>
                      <td>
                        <input type="radio" onclick="vlnd()" name="imagea" value="image6">
                        <img src="valentinescake.png" alt="Image 6">
                      </td>
                    </tr>
                  </table>
                <div class="selection">

                    <input type="date" name="datea" id="date" value="<?php echo $today; ?>" readonly>

                    <input type="number" id="weight" name="weighta" min="0" step="0.50"
                        placeholder="Enter Weight In Ponds"><br>

                    <input type="text" name="bnamea" max="20" placeholder="Enter Your Name"><br>

                    <input type="text" name="numbera" maxl="10" placeholder="Enter Your Email"><br>

                    <input type="text" name="addressa" max="30" placeholder="Enter Your Address For Delivery"><br>
                </div>
                <input type="submit" id="button" value="Place Order" name="senda">

            </form>
            <div class="price-meter">
                <div class="price-meter-bar" id="price-meter-bar"></div>
                <div class="price-meter-value" id="price-meter-value">₹0.00</div>
            </div>
        </div>
    </div>
    <!-- swiper js link  -->
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>
</body>
<script src="script.js"></script>

</html>