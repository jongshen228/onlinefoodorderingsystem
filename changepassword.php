   <?php
include('config.php');

if(!isset($_SESSION['username'])){
header('Location: login.php'); // Redirecting To Home Page
}


if (count($_POST) > 0) {
    $result = mysqli_query($con, "SELECT *from users WHERE username='" . $_SESSION["username"] . "'");
    $row = mysqli_fetch_array($result);
    if ($_POST["currentPassword"] == $row["password"]) {
        mysqli_query($con, "UPDATE users set password='" . $_POST["newPassword"] . "' WHERE username='" . $_SESSION["username"] . "'");
        $message = "Password Changed";
    } else
        $message = "Current Password is not correct";
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
<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
  currentPassword.focus();
  document.getElementById("currentPassword").innerHTML = "required";
  output = false;
}
else if(!newPassword.value) {
  newPassword.focus();
  document.getElementById("newPassword").innerHTML = "required";
  output = false;
}
else if(!confirmPassword.value) {
  confirmPassword.focus();
  document.getElementById("confirmPassword").innerHTML = "required";
  output = false;
}
if(newPassword.value != confirmPassword.value) {
  newPassword.value="";
  confirmPassword.value="";
  newPassword.focus();
  document.getElementById("confirmPassword").innerHTML = "not same";
  output = false;
}   
return output;
}
</script>
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
     <p>Edit your password from here</p>

    </div>
    </div>

    <div class="container">
   <div class='row'>
<div class="col-md-12">
    <form name="frmChange" method="post" action=""
        onSubmit="return validatePassword()">
        
            <div class="form-group"><?php if(isset($message)) { echo $message; } ?></div>
            <table border="0" cellpadding="10" cellspacing="0"
                width="500" align="center" class="tblSaveForm">
 

                <div class="form-group">
                      <label for="name">Current Password</label>
                      <input type="password" id="currentPassword" name="currentPassword" class="form-control"  required="required"/>
                    </div>
          <div class="form-group">
                      <label for="name">New Password</label>
                      <input type="password" id="newPassword" name="newPassword" class="form-control"  required="required"/>
                    </div>

          <div class="form-group">
                      <label for="name">Confirm Password</label>
                      <input type="password" id="confirmPassword" name="confirmPassword" class="form-control"  required="required"/>
                    </div>

         <div class="form-group">
                  <div class="col text-center">
          <button type="submit" id="submit" name="submit" value="Submit" class="btn btn-primary "  > Update </button> <br><br>
          <a href= account.php>Back To Account</a>      
      </div>

            </table>
        </div>
    </form>
</body>
</html>