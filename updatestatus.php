<?php

include "config.php"; // Using database connection file here


if(!isset($_SESSION['manager_name'])){
header('Location: managerlogin.php'); 
}
?>

<?php
// Storing Session
$user_check=$_SESSION['manager_name'];

$order_id=$_GET['id'];

 date_default_timezone_set("Asia/Kuala_Lumpur");
 $time=date("Y-m-d H:i:s");
?>

  
          
       
    <html>
    <head>
        <title>Online Burger Ordering System</title>
    </head>


<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </script>
     <style>

</style>

    <body>

      <nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="manager.php">Chia's Burger Shop</a>
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
          </ul>

      <ul class="nav navbar-nav navbar-right">
            <li><a href="manager.php"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['manager_name']; ?> </a></li>
            <li class="active"> <a href="manager.php">MANAGER CONTROL PANEL</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
        </div>
    </nav>
<div class="container">
    <div class="jumbotron">
     <h1>Hello Manager! </h1>
     <p>Manage all your restaurant from here</p>

    </div>
    </div>

<div class="container">
    <form method="post">
      <div class="row">
        <?PHP
   if(isset($_POST['updstatus'])){
  $status = $_POST['status'];
  $complete_time = $time;
  ?>


            <?php
  $query = mysqli_query($con,"update orders set status='$status', complete_time='$complete_time' where order_id='$order_id'");
$success = $con->query($query);  


      if(!$query)
      {
        ?>
        <div class="container">
          <div class="jumbotron">
            <h1>Something went wrong!</h1>
            <p>Try again later.</p>
          </div>
        </div>
        <?PHP
      }
else{
  ?>
   <div class="alert alert-success">
              <strong>Success!</strong><p><a href="vieworderdetail.php"> Click Me </a></p> 
            </div>
            <?PHP
}

 }


{

  ?>

    <div class="col-sm-4">Update Order Status</div>
    <div class="col-sm-8">Food Preparing(Pick Up)<input type="radio"  name="status" value="Food Preparing(Pickup)">&nbsp;&nbsp;&nbsp; Pick Up Now<input type="radio"  name="status" value="Pick Up Now">&nbsp;&nbsp;&nbsp;Pick up Completed<input type="radio"  name="status" value="Pick Up Completed">&nbsp;&nbsp;&nbsp;Food Preparing(Delivering)<input type="radio"  name="status" value="Food Preparing(Delivering)">&nbsp;&nbsp;&nbsp;Delivering Now<input type="radio"  name="status" value="Delivering Now">Delivered<input type="radio"  name="status" value="Delivered">&nbsp;&nbsp;&nbsp;Order Cancelled<input type="radio"  name="status" value="Order cancelled"> <br>
    <br>
    
    <button type="submit" class="btn btn-outline-success" name="updstatus">Update Status</button>
    </div>
    <div class="col-sm-4"></div>
    
    </div>
    </form>
   </div>



            <?php
}



?>
