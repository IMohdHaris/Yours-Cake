<?php

$db_name = 'mysql:host=localhost;dbname=yourscake';
$user_name = 'root';
$user_password = '';

$conn = new PDO($db_name, $user_name, $user_password);

if(isset($_POST['sendc'])){

   $flavour = $_POST['flavour'];
   $flavour = filter_var($flavour, FILTER_SANITIZE_STRING);
   $topping = $_POST['topping'];
   $topping = filter_var($topping, FILTER_SANITIZE_STRING);
   $plate = $_POST['plate'];
   $plate = filter_var($plate, FILTER_SANITIZE_STRING);
   $platec = $_POST['platec'];
   $platec = filter_var($platec, FILTER_SANITIZE_STRING);
   $pcolor = $_POST['pcolor'];
   $pcolor = filter_var($pcolor, FILTER_SANITIZE_STRING);
   $weight = $_POST['weight'];
   $weight = filter_var($weight, FILTER_SANITIZE_STRING);
   $bname = $_POST['bname'];
   $bname = filter_var($bname, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $address = $_POST['address'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);

   $select_contact = $conn->prepare("SELECT * FROM `cake` WHERE flavour = ? AND topping = ? AND plate = ? AND platec = ? AND pcolor = ? AND weight = ? AND bname = ? AND number = ? AND address = ? ");
   $select_contact->execute([$flavour, $topping, $plate, $platec, $pcolor, $weight, $bname, $number, $address]);

   if($select_contact->rowCount() > 0){
      $message[] = 'Order already placed!';
   }else{
      $insert_message = $conn->prepare("INSERT INTO `cake`(flavour, topping, plate, platec, pcolor, weight, bname, number, address) VALUES(?,?,?,?,?,?,?,?,?)");
      $insert_message->execute([$flavour, $topping, $plate, $platec, $pcolor, $weight, $bname, $number, $address]);
      $message[] = 'Order placed mail sent successfully!';
   }

}

?>

<?php 
if(isset($_POST['sendc'])){
    $to = ""; // this is your Email address
    $from = $_POST['number']; // this is the sender's Email address
    $bname = $_POST['bname'];
    $subject = "Yours Cake";
    $subject2 = "Copy mail of your order";
    $message1 = "\n\n" . $_POST['address'];
    $message2 = "Thanks for Ordering with us " . $bname . "\n\n"."Your Order Details"."\n\n" ."Flavour: " .$flavour  ."\n\n". "Topping: " 
    .$topping.  "\n\n" ."Plate Shape: ".$plate  ."\n\n". "Plate Color: " .$platec . "\n\n". "Candle Color: " .$pcolor  ."\n\n". "Weight: " 
    .$weight  . " pond"."\n\n". "Address: " .$address ."\n\n"."Pay The Amount On Delivery: ".$weight*(400)." Rupees"."\n\n";

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
        <div id="plate" class="plate"></div>
        <div class="layer layer-bottom"></div>
        <div class="layer layer-middle"></div>
        <div class="layer layer-top"></div>
        <div class="icing drips"></div>
        <div class="drip drips drip1"></div>
        <div class="drip drips drip2"></div>
        <div class="drip drips drip3"></div>
        <div id="mydiv" class="candle">
            <div class="flame"></div>
        </div>
        <div class="price-meter">
			<div class="price-meter-bar" id="price-meter-bar"></div>
			<div class="price-meter-value" id="price-meter-value">₹0.00</div>
		    </div>
            <a href="ccake/ccake.php">Check PreDesigned Cakes</a>
    </div>
    <div class="form">
        <form action="" method="POST">
            <h1>LET'S CUSTOMIZE</h1>
            <p>Flavour</p>
            <input onclick="van()" type="radio" name="flavour" id="flavour" value="vanilla" checked="checked">
            <label for="vanilla">Vanilla</label>
            <input onclick="cho()" type="radio" name="flavour" id="flavour" value="chocolate" >
            <label for="chocolate">chocolate</label>
            <input onclick="straw()" type="radio" name="flavour" id="flavour" value="strawberry" >
            <label for="strawberry">strawberry</label><br>
            <br>
            <p>Topping</p>
            <input onclick="cream()" type="radio" name="topping" id="creamy" value="creamy" checked="checked">
            <label for="creamy">creamy</label>
            <input onclick="choco()" type="radio" name="topping" id="chocolaty" value="chocolaty" >
            <label for="chocolaty">chocolaty</label>
            <input onclick="cand()" type="radio" name="topping" id="candy" value="candy" >
            <label for="candy">candy</label><br>
            <br>
            <p>Plate Shape</p>
            <input onclick="cr()" type="radio" name="plate" id="circle" value="circle" checked="checked">
            <label for="circle">circle</label>
            <input onclick="sq()" type="radio" name="plate" id="square" value="square" >
            <label for="square">square</label><br>
            <br>
            <p>Plate Color</p>
            <input onclick="bl()" type="radio" name="platec" id="black" value="black" checked="checked">
            <label for="circle">Black</label>
            <input onclick="wh()" type="radio" name="platec" id="white" value="white" >
            <label for="white">White</label><br>
            <br>
            <p>Candle Color</p>
            <input onclick="brwn()" type="radio" name="pcolor" id="brown" value="brown" checked="checked">
            <label for="brown">brown</label>
            <input onclick="pnk()" type="radio" name="pcolor" id="pink" value="pink">
            <label for="pink">pink</label>
            <input onclick="ble()" type="radio" name="pcolor" id="blue" value="blue">
            <label for="blue">blue</label><br>
            <br>
            <div class="selection">

                <input type="date" name="date" id="date" value="<?php echo $today; ?>" readonly>

                <input type="number" id="weight" name="weight" min="0" step="0.50" placeholder="Enter Weight In Ponds" ><br>

                <input type="text" name="bname" max="20" placeholder="Enter Your Name" ><br>

                <input type="text" name="number" maxl="10" placeholder="Enter Your Email" ><br>

                <input type="text" name="address" max="30" placeholder="Enter Your Address For Delivery" ><br>
            </div>
            <input type="submit" id="button" value="Place Order" name="sendc">

        </form>
    </div>
</div>
<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
<script src="script.js"></script>

</html>