<?php
include "config.php";

// Check user login or not
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}

?>


<html>
    <head>
        <title>Online Burger Ordering System</title>
    </head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <style>
      body {  
        background-color: #cccccc;
      }
.jumbotron h1 {
  text-align: center;
}

    </style>

 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php">Chia's Burger Shop</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="home.php">Home</a></li>
        <li><a href="aboutus2.php">About Us</a></li>
      </ul>


             
             
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['username']; ?> </a></li>
        <li><a href="foodmenu2.php"><span class="glyphicon glyphicon-cutlery"></span>Food Menu</a></li>
        <li class="active"><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart">Cart</a></li>
             (<?php
              if(isset($_SESSION["cart"])){
              $count = count($_SESSION["cart"]); 
              echo "$count"; 
            }
              else
                echo "0";
              ?>)
        <li><a href="orderstatus.php"><span class="glyphicon glyphicon-list-alt"></span> Order Status </a></li>       
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
      </ul>
    </div>
  </div>
</nav>

 <?php
 date_default_timezone_set("Asia/Kuala_Lumpur");
 $t=date("H:i:s");
$gtotal = 0;
  foreach($_SESSION["cart"] as $keys => $values)
  {

    $food_id = $values["food_id"];
    $foodname = $values["food_name"];
    $quantity = $values["food_quantity"];
    $price =  $values["food_price"];
    $total = ($values["food_quantity"] * $values["food_price"]);
    $username = $_SESSION["username"];
    $order_date = date('Y-m-d');
    $order_time = $t;
    
    $gtotal = $gtotal + $total;

$query = "INSERT INTO orders
   SET order_id= NULL,
       food_id_fk = (
       SELECT food_id
         FROM food
        WHERE food_id = '$food_id'),
       foodname = '$foodname',
       price = '$price',
       quantity = '$quantity',
       order_date = '$order_date',
       order_time = '$order_time',
       user_id_fk = (
       SELECT user_id
         FROM users
        WHERE username = '$username'),
       username_fk = '$username',
       total_price = '$total',
       status = 'Pickup Pending',
       complete_time= NULL;
       ";

             
              $success = $con->query($query);         

      if(!$success)
      {
        ?>
        <div class="container">
          <div class="jumbotron">
            <h1>Something went wrong!</h1>
            <p>Try again later.</p>
          </div>
        </div>


        <?php
      }
 }
      
        ?>

        <div class="container">
          <div class="jumbotron">
            <h1>Your Order Created</h1>
          </div>
        </div>
        <br>
<h1 class="text-center">Grand Total: RM<?php echo "$gtotal"; ?>/-</h1>
<h5 class="text-center">including all service charges. (no delivery charges applied)</h5>
<br>


<h1 class="text-center">

  <a href="COD.php"><button class="btn btn-success " ><span class="glyphicon glyphicon-"></span> Continue</button></a>

        

        
        


<br><br><br><br><br><br>

    </body>
</html>