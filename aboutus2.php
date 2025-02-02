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
          

        .btn {
        margin:auto;
        display:block;
        background-color: black; /* Blue background */
        border: none; /* Remove borders */
        color: white; /* White text */
        padding: 12px 16px; /* Some padding */
        font-size: 16px; /* Set a font size */
        cursor: pointer; /* Mouse pointer on hover */
        }

        /* Darker background on mouse-over */
        .btn:hover {
        background-color: #ddd;
        }

        .footer {
        position: relative;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: black;
        color: white;
        text-align: center;
        } 
    </style>

    <body>

    	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php">Chia's Burger Shop</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="home.php">Home</a></li>
        <li class="active"><a href="aboutus2.php">About Us</a></li>
      </ul>


             
             
      <ul class="nav navbar-nav navbar-right">
        <li><a href="account.php"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['username']; ?> </a></li>
        <li><a href="foodmenu2.php"><span class="glyphicon glyphicon-cutlery"></span>Food Menu</a></li>
        <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart">Cart
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

        </div>
<div class="container">
      <div class="jumbotron">
        <h1>About Us</h1>
      </div>
    </div>
  <div class="container">
        <div class="container-fluid">
  <img src="picture/about.bmp" width='100%'/>
</div>
<br><br>
        
<div class="container-fluid" style="background:black; opacity:0.7;">
<h1 style="color:white; text-align:center; text-transform:uppercase;">we do this by</h1>
<h3 style="color:white; text-align:center; text-transform:uppercase;">Helping people discover great places around them.</h3>
<p style="color:white; text-align:center; font-size:25px;">Our team gathers information from every restaurant on a regular basis to ensure our data is fresh. Our vast community of food lovers share their reviews and photos, so you have all that you need to make an informed choice.</p>


<h3 style="color:white; text-align:center; text-transform:uppercase;">Enabling restaurants to create amazing experiences.</h3>
<p style="color:white; text-align:center; font-size:25px;">With dedicated engagement and management tools, we're enabling restaurants to spend more time focusing on food itself, which translates directly to better dining experiences.</p>

<h3 style="color:white; text-align:center; text-transform:uppercase;">Contact us</h3>
<p style="color:white; text-align:center; font-size:25px;">Phone Number:03-7710 0110</p>
</div>

<a href="home.php"><button class="btn" class="btn btn-default">Home</button></a>
</div>
      <div class="footer">
        <i>2020 Chia's Burger Sdn Bhd. All rights reserved.</i>
      </div>
    </body>
</html>