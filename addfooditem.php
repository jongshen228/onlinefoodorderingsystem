<?php
include('config.php');

if(!isset($_SESSION['manager_name'])){
header('Location: managerlogin.php'); // Redirecting To Home Page
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
    <div class="container">
      <div class="col">
        
      </div>
    </div>

    
      <div class="col-xs-3" style="text-align: center;">

      <div class="list-group">
        <a href="manager.php" class="list-group-item ">View Food Items</a>
        <a href="addfooditem.php" class="list-group-item active">Add Food Items</a>
        <a href="editfooditem.php" class="list-group-item ">Edit Food Items</a>
        <a href="deletefooditem.php" class="list-group-item ">Delete Food Items</a>
        <a href="vieworderdetail.php" class="list-group-item ">View Order Details</a>
      </div>
    </div>
    


    
    

    <div class="col-xs-9">
      <div class="form-area" style="padding: 0px 100px 100px 100px;">
        <form action="addfooditem1.php" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> ADD NEW FOOD ITEM HERE </h3>

          <div class="form-group">
            <input type="text" class="form-control" id="food_name" name="food_name" placeholder="Your Food name" required="">
          </div>     

          <div class="form-group">
            <input type="text" class="form-control" id="food_price" name="food_price" placeholder="Your Food Price (RM)" required="">
          </div>

          <div class="form-group">
            <input type="file" class="form-control" id="images_path" name="images_path" required="">
          </div>

          <div class="form-group">
          <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right" > ADD FOOD </button>    
      </div>
        </form>

        
        </div>
      
    </div>
</div>

  </body>
</html>