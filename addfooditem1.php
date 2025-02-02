<?php

include('config.php');

if(!isset($_SESSION['manager_name'])){
header('Location: managerlogin.php'); // Redirecting To Home Page
}






// Storing Session
$user_check=$_SESSION['manager_name'];

$food_name = $con->real_escape_string($_POST['food_name']);
$food_price = $con->real_escape_string($_POST['food_price']);
$images_path = $con->real_escape_string($_POST['images_path']);
$manager_name = $_SESSION['manager_name'];


$query = "INSERT INTO food
   SET food_name = '$food_name',
       food_price = '$food_price',
       images_path = '$images_path',
       manager_id_fk = (
       SELECT manager_id
         FROM manager
        WHERE manager_name = '$manager_name')";


$success = $con->query($query);

if (!$success){

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

    

            <div class="alert alert-danger">
              <strong>Error!</strong><a href="addfooditem.php"> Click Me </a></p>  
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
              <strong>Success!</strong><p><a href="addfooditem.php"> Click Me </a></p> 
            </div>
            <?php
}

$con->close();


?>

