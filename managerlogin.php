<?php
include "config.php";


if(isset($_POST['but_submit'])){

    $manager_name = mysqli_real_escape_string($con,$_POST['manager_name']);
    $manager_password = mysqli_real_escape_string($con,$_POST['manager_password']);


    if ($manager_name != "" && $manager_password != ""){

        $sql_query = "select count(*) as cntUser from manager where manager_name='".$manager_name."' and manager_password='".$manager_password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['manager_name'] = $manager_name;
            header('Location: manager.php');
        }else{
            echo "Invalid username and password";
        }

    }

}
?>
<html>
    <head>
        <title>Manager Login</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
body {
  background-color: #cccccc;
}

</style>
    </head>
    <body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-logo" id="logo">
      <a class="navbar-brand" href="index.php">Chia's Burger Shop</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="foodmenu2.php">Food Menu</a></li>
        <li><a href="aboutus.php">About Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="managerlogin.php"><span class="glyphicon glyphicon-log-in"></span> Manager Login</a></li>
        <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
        <div class="container">
                  <div class='col-md-6' >
            <form method="post" action="">
                <div id="div_login">
                    <h1>Manager Login</h1>
                    <div class="form-group">
                      <label for="manager_name">Manager name:</label>
                      <input type="text" class="form-control" id="manager_name" name="manager_name" required="required" placeholder="Manager Name" maxlength="80"/>
                    </div>
                    <div class="form-group">
                      <label for="manager_password">Password:</label>
                      <input type="password" class="form-control" id="manager_password" name="manager_password" required="required" placeholder="Manager Password" maxlength="80"/>
                    </div>
          
                </div>
                    <button type="submit" value="Submit" name="but_submit" class="btn btn-default">Submit</button>
                    
            </form>
           <a href="index.php" ><button type="home" class="btn btn-default">Home</button></a>
        </div>
    </body>
</html>
