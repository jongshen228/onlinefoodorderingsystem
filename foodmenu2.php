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

/* Add a black background color to the top navigation */
.nav2 {
  background-color: #333;
  overflow: hidden;
  height: 60px;
  list-style: none;
}

/* Style the links inside the navigation bar */
.nav2  a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 20px 21px;
  text-decoration: none;
  font-size: 17px;
  display: inline;
}

/* Change the color of links on hover */
.nav2  a:hover {
  background-color: #ddd;
  color: black;
}

     .jumbotron h1 {
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
        <li class="active"><a href="foodmenu2.php"><span class="glyphicon glyphicon-cutlery"></span>Food Menu</a></li>
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
    <h1>Food Menu</h1>
  </div>
</div>
  <div class="container">
         <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">

      <div class="item active">
      <img src="picture/burger1.jpg" style="width:100%;">
      <div class="carousel-caption">
      </div>
      </div>
       
      <div class="item">
      <img src="picture/burger2.jpg" style="width:100%;">
      <div class="carousel-caption">

      </div>
      </div>
      <div class="item">
      <img src="picture/burger3.jpg" style="width:100%;">
      <div class="carousel-caption">
      </div>
      </div>
    
    </div>
   <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
    </div><!-- /.carousel -->


</div>
    
<br>


<div class="container" >


  <ul class="nav2 nav-tabs">
    <li class="active"><a href="foodmenu2.php">All</a></li>
  </ul>
<!-- Display all Food from food table -->
<?php


$sql = "SELECT * FROM food WHERE options = 'Enable' ORDER BY food_id";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0)
{
  $count=0;

  while($row = mysqli_fetch_assoc($result)){
    if ($count == 0)
      echo "<div class='row'>";

?>
<div class="col-md-3">

<form method="post" action="cart.php?action=add&id=<?php echo $row["food_id"]; ?>">
<div class="mypanel" align="center";>
<img src="<?php echo $row["images_path"]; ?>" class="img-responsive" style="width:200px;height:200px;">
<h4 class="text-dark"><?php echo $row["food_name"]; ?></h4>
<h5 class="text-danger">RM <?php echo $row["food_price"]; ?>/-</h5>
<h5 class="text-info">Quantity: <input type="number" min="1" max="25" name="quantity" class="form-control" value="1" style="width: 60px;"> </h5>
<input type="hidden" name="hidden_image" value="<?php echo $row["images_path"]; ?>">
<input type="hidden" name="hidden_name" value="<?php echo $row["food_name"]; ?>">
<input type="hidden" name="hidden_price" value="<?php echo $row["food_price"]; ?>">
<input type="submit" name="add" style="margin-top:5px;" class="btn btn-success" value="Add to Cart">
</div>
</form>
      
     
</div>



<?php
$count++;
if($count==4)
{
  echo "</div>";
  $count=0;
}
}
?>

</div>
</div>
<?php
}
else
{
  ?>

  <div class="container">
    <div class="jumbotron">
      <center>
         <label style="margin-left: 5px;color: red;"> <h1>Oops! No food is available.</h1> </label>
        <p>Stay Hungry...! :P</p>
      </center>
       
    </div>
  
  <?php

}

?>


<div class="footer">
        <i>2020 Chia's Burger Sdn Bhd. All rights reserved.</i>
      </div>

    </body>
</html>