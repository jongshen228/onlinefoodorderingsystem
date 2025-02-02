<?php
include('config.php');

if(!isset($_SESSION['username'])){
header('Location: login.php'); // Redirecting To Home Page
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

     .jumbotron p {
  text-align: center;
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
        <li ><a href="home.php">Home</a></li>
        <li><a href="aboutus2.php">About Us</a></li>
      </ul>


             
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="account.php"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['username']; ?> </a></li>
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

<div class="container">
    <div class="jumbotron">
     <h1>Hello! </h1>
     <p>Edit your account from here</p>

    </div>
    </div>









<?php

if(isset($_SESSION['username'])){
	 $username=$_SESSION['username'];
	}

 // Storing Session
$user_check=$_SESSION['username'];
$result = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
$row = mysqli_fetch_array($result);


  ?>



<div class="container">
   <div class='row'>
<div class="col-md-12">
<form action="updateaccount.php" method="POST">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" id="dusername" name="dusername" value="<?php echo $row["username"]; ?>" class="form-control"  readonly="readonly"/>
                    </div>
					<div class="form-group">
                      <label for="address">New Address</label>
                      <input type="address" id="daddress" name="daddress" value="<?php echo $row["address"]; ?>" class="form-control"  required="required">
                    </div>
 

                    <div class="form-group">
                      <label for="address">New Address</label>
                      <select class="form-control" name="daddress2" id="daddress2">
              <?php $address2 = 'address2';?>     
              <option value='<?php echo $row["address2"]; ?>' selected='selected'><?php echo $row["address2"]?></option>     
              <option value="Bandar Bukit Tinggi, 41200 Klang, Selangor">Bandar Bukit Tinggi, 41200 Klang, Selangor</option>
              <option value="Bandar Botanik, 41200 Klang,  Selangor">Bandar Botanik, 41200 Klang,  Selangor</option>
              <option value="Bandar Puteri, 41200 Klang, Selangor">Bandar Puteri, 41200 Klang, Selangor</option>
            </select>
                    </div>
					<div class="form-group">
                      <label for="email">E-mail</label>
                      <input type="email" id="demail"  name="demail" value="<?php echo $row["email"]; ?>" class="form-control"  required="required">
                    </div>

				                      <div class="form-group">
            <label for="phone">Enter your phone number:</label>
            <input type="tel" id="dphone" name="dphone"  value="<?php echo $row["phone"]; ?>"  class="form-control" pattern="[0-9]{3}-[0-9]{7}" required="required">
            </div>
 
                 <div class="form-group">
                  <div class="col text-center">
          <button type="submit" id="submit" name="submit" class="btn btn-primary "  > Update </button><br><br>
          <a href= changepassword.php>Change Password</a>    
      </div>
    </div>
			 </form>
			</div>
	</div>
</div>



			<div class="footer">
        <i>2020 Chia's Burger Sdn Bhd. All rights reserved.</i>
      </div>

    </body>
</html>