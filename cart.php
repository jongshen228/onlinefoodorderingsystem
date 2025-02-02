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

     .jumbotron p {
  text-align: center;
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



<?php
if(!empty($_SESSION["cart"]))
{
  ?>
  <div class="container">
      <div class="jumbotron">
        <h1>Your Shopping Cart</h1>
        <p>Looks tasty...!!!</p>
        
      </div>
      
    </div>
    <div class="container">
    <div class="table-responsive"  >
<table class="table table-striped">
  <thead class="thead-dark">
<tr>
<th width="10%">Food Image</th>
<th width="40%">Food Name</th>
<th width="10%">Quantity</th>
<th width="20%">Price Details</th>
<th width="15%">Order Total</th>
<th width="5%">Action</th>
</tr>
</thead>


<?php  

$total = 0;
foreach($_SESSION["cart"] as $keys => $values)
{
?>
<tr>
<td><img src="<?php echo $values["food_image"]; ?>" class="img-responsive"></td> 
<td><?php echo $values["food_name"]; ?></td>
<td><?php echo $values["food_quantity"]; ?></td>
<td>RM <?php echo $values["food_price"]; ?></td>
<td>RM <?php echo number_format($values["food_quantity"] * $values["food_price"], 2); ?></td>
<td><a href="cart.php?action=delete&id=<?php echo $values["food_id"]; ?>"><span class="text-danger">Remove</span></a></td>
</tr>
<?php 
$total = $total + ($values["food_quantity"] * $values["food_price"]);
}
?>
<tr>
<td colspan="3" align="right">Total</td>
<td align="right">RM <?php echo number_format($total, 2); ?></td>
<td></td>
</tr>
</table>
 <a href="cart.php?action=empty" onclick="return confirm('Are you sure you want to empty your cart?')"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Empty Cart</button></a>&nbsp;<a href="foodmenu2.php" ><button class="btn btn-warning" >Continue Shopping</button></a>&nbsp; <a href="payment.php"><button class="btn btn-success pull-right" onclick="return confirm('Your order will be created if you continue!!!')"><span class="glyphicon glyphicon-share-alt"></span> Cash on Delivery</button></a> &nbsp; <a href="pickup.php"><button class="btn btn-primary pull-right" onclick="return confirm('Your order will be created if you continue!!!')"><span class="glyphicon glyphicon-share-alt"></span> Pickup</button> </a>

</div>
</div>
<br><br><br><br><br><br><br>
<?php
}
if(empty($_SESSION["cart"]))
{
  ?>
  <div class="container">
      <div class="jumbotron">
        <h1>Your Shopping Cart</h1>
        <p>Oops! We can't smell any food here. Go back and <a href="foodmenu2.php">order now.</a></p>
        
      </div>
      
    </div>
    <br><br><br><br>

<?php
}

?>

<?php
if(empty($_SESSION["cart"]) && isset($_POST["add"]))
{
  ?>
  <div class="container">
   <div class="alert alert-success">
              <strong>Success!</strong><p><a href="cart.php"> Click Me </a></p> 
            </div>
      
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
}
?>

<?php


if(isset($_POST["add"]))
{
if(isset($_SESSION["cart"]))
{
$item_array_id = array_column($_SESSION["cart"], "food_id");
if(!in_array($_GET["id"], $item_array_id))
{
$count = count($_SESSION["cart"]);

$item_array = array(

'food_id' => $_GET["id"],
'food_image' => $_POST["hidden_image"],
'food_name' => $_POST["hidden_name"],
'food_price' => $_POST["hidden_price"],
'food_quantity' => $_POST["quantity"]
);
$_SESSION["cart"][$count] = $item_array;
echo '<script>window.location="cart.php"</script>';
}
else
{
 $count=0;
        foreach($_SESSION["cart"] as $keys => $values){

            if($values["food_id"]==$_GET["id"]){

                $_SESSION["cart"][$count]['food_quantity'] += $_POST['quantity'];
            }
            $count++;
        }

        echo '<script>alert("Added Success.")</script>';
        echo '<script>window.location="cart.php"</script>';

}
}
else
{
$item_array = array(
'food_id' => $_GET["id"],
'food_image' => $_POST["hidden_image"],
'food_name' => $_POST["hidden_name"],
'food_price' => $_POST["hidden_price"],
'food_quantity' => $_POST["quantity"]
);
$_SESSION["cart"][0] = $item_array;
}
}
if(isset($_GET["action"]))
{
if($_GET["action"] == "delete")
{
foreach($_SESSION["cart"] as $keys => $values)
{
if($values["food_id"] == $_GET["id"])
{
unset($_SESSION["cart"][$keys]);
echo '<script>alert("Food has been removed")</script>';
echo '<script>window.location="cart.php"</script>';
}
}
}
}

if(isset($_GET["action"]))
{
if($_GET["action"] == "empty")
{
foreach($_SESSION["cart"] as $keys => $values)
{

unset($_SESSION["cart"]);
echo '<script>alert("Cart is made empty!")</script>';
echo '<script>window.location="cart.php"</script>';

}
}
}


?>
<?php

?>

<div class="footer">
        <i>2020 Chia's Burger Sdn Bhd. All rights reserved.</i>
      </div>

    </body>
</html>