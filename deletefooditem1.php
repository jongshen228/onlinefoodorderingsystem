

<?php

include "config.php"; // Using database connection file here


if(!isset($_SESSION['manager_name'])){
header('Location: managerlogin.php'); 
}

$food_id = $_GET['food_id']; // get id through query string

$del = mysqli_query($con,"delete from food WHERE food_id = '$food_id' "); // delete query
$query = mysqli_query($con, "SELECT * FROM food WHERE options = 'Enable' ORDER BY food_id");

if($del)
{
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

    

  <div class="alert alert-success">
              <strong>Success!</strong><p><a href="deletefooditem.php"> Click Me </a></p> 
            </div>
            <?php
}


else
{
    echo "Error deleting record"; // display error message if not delete
}
?>
