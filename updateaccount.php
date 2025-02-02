<?php
include "config.php";

// Check user login or not
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}
   ?>
<?php
// Storing Session
$user_check=$_SESSION['username'];

$newusername = $con->real_escape_string($_POST['dusername']);
$address = $con->real_escape_string($_POST['daddress']);
$address2 = $con->real_escape_string($_POST['daddress2']);
$email = $con->real_escape_string($_POST['demail']);
$phone = $con->real_escape_string($_POST['dphone']);



            $query = mysqli_query($con, "UPDATE users set username='$newusername',
    address='$address', address2='$address2', email='$email', phone='$phone' where username='$user_check'");
    
    

if ($query){

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
     



      .footer {
  position: fixed;
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
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php">Chia's Burger Shop</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="home.php">Home</a></li>
        <li><a href="aboutus2.php">About Us</a></li>
      </ul>


             
             
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="account.php"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['username']; ?> </a></li>
        <li><a href="foodmenu2.php"><span class="glyphicon glyphicon-cutlery"></span>Food Menu</a></li>
        <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart">Cart</a></li>
             (<?php
              if(isset($_SESSION["cart"])){
              $count = count($_SESSION["cart"]); 
              echo "$count"; 
            }
              else
                echo "0";
              ?>)
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
    <div class="container">
      <div class="col">
        
      </div>
    </div>


<div class="alert alert-success">
              <strong>Success!</strong><p><a href="account.php"> Click Me </a></p> 
            </div>




<?php
	
}

else {
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
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php">Chia's Burger Shop</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="home.php">Home</a></li>
        <li><a href="aboutus2.php">About Us</a></li>
      </ul>


             
             
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="account.php"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['username']; ?> </a></li>
        <li><a href="foodmenu2.php"><span class="glyphicon glyphicon-cutlery"></span>Food Menu</a></li>
        <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart">Cart</a></li>
             (<?php
              if(isset($_SESSION["cart"])){
              $count = count($_SESSION["cart"]); 
              echo "$count"; 
            }
              else
                echo "0";
              ?>)
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
      </ul>
    </div>
  </div>
</nav>
	            <div class="alert alert-danger">
              <strong>Error!</strong><a href="account.php"> Click Me </a></p>  
            </div>
            <?php
}

$con->close();


?>