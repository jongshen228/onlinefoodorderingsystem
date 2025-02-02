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
        <li class="active"><a href="orderstatus.php"><span class="glyphicon glyphicon-list-alt"></span> Order Status </a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
      </ul>
    </div>
  </div>
</nav>


<?php

if(isset($_SESSION['username'])){
   $username=$_SESSION['username'];
  }

$user_check=$_SESSION['username'];
$sql = "SELECT * FROM orders WHERE username_fk='$username'";
$result = mysqli_query($con,$sql);


if (mysqli_num_rows($result) > 0)
{


  ?>
  <div class="container">
      <div class="jumbotron">
        <h1>Order Status</h1>
      </div>
    </div>
  <div class="container">
  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th>  </th>
        <th> Food Name</th>
        <th> Food Quantity</th>
        <th> Order Date </th>
        <th> Order Time </th>
        <th> Total Price </th>
        <th> Order Status </th>
        <th> Update Time </th>
      </tr>
    </thead>


    <?PHP
      //OUTPUT DATA OF EACH ROW
      while($row = mysqli_fetch_assoc($result)){
    ?>

    <tbody>
    <tr>
      <td> <span class="glyphicon glyphicon-menu-right"></span> </td>
      <td><?php echo $row["foodname"]; ?></td>
      <td><?php echo $row["quantity"]; ?></td>
      <td><?php echo $row["order_date"]; ?></td>
      <td><?php echo $row["order_time"]; ?></td>
      <td><?php echo $row["total_price"]; ?></td>
      <td><?php echo $row["status"]; ?></td>
      <td><?php echo $row["complete_time"]; ?></td>
    </tr>
  </tbody>
  
 <?php } ?>
  </table>
</div>
    <br>

<?php } else { ?>

  <h4><center>0 RESULTS</center> </h4>

  <?php } ?>

        </form>

        
        </div>
      
    </div>
</div>
<br>
<br>
<br>
<br>
  
  </body>
</html>