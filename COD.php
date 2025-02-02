<?php
include "config.php";

// Check user login or not
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}

unset($_SESSION["cart"]);
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
        <li><a href="account.php"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['username']; ?> </a></li>
        <li><a href="foodmenu2.php"><span class="glyphicon glyphicon-cutlery"></span>Food Menu</a></li>
        <li class="active"><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart">Cart
             (<?php
              if(isset($_SESSION["cart"])){
              $count = count($_SESSION["cart"]); 
              echo "$count"; 
            }
              else
                echo "0";
              ?>)
            </a></li>
          <li><a href="orderstatus.php"><span class="glyphicon glyphicon-list-alt"></span> Order Status </a></li>    
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
      </ul>
    </div>
  </div>
</nav>


        
        <div class="container">
          <div class="jumbotron">
            <h1 class="text-center" style="color: green;"><span class="glyphicon glyphicon-ok-circle"></span> Order Placed Successfully.</h1>
          </div>
        </div>
        <br>

<h2 class="text-center"> Thank you for Ordering at Chia's Burger Shop! The ordering process is now complete.<br><br>
<BUTTON><a href="foodmenu2.php">Continue Shopping</a></BUTTON><br><br>
<BUTTON><a href="orderstatus.php">Check Order status</a></BUTTON
</h2>


        </body>

</html>