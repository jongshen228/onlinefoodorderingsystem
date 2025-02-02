<?php 
include "config.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Registration</title>

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

<?php 
$error_message = "";$success_message = "";

// Register user
if(isset($_POST['btnsignup'])){
   $username = trim($_POST['username']);
   $address = trim($_POST['address']);
   $address2 = trim($_POST['address2']);
   $email = trim($_POST['email']);
   $phone = trim($_POST['phone']);
   $password = trim($_POST['password']);
   $confirmpassword = trim($_POST['confirmpassword']);

   $isValid = true;

   // Check fields are empty or not
   if($username == '' || $address == '' || $email == '' || $phone == '' || $password == '' || $confirmpassword == ''){
     $isValid = false;
     $error_message = "Please fill all fields.";
   }

   // Check if confirm password matching or not
   if($isValid && ($password != $confirmpassword) ){
     $isValid = false;
     $error_message = "Confirm password not matching";
   }

   // Check if Email-ID is valid or not
   if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $isValid = false;
     $error_message = "Invalid Email-ID.";
   }

    if($isValid){

     // Check if Email-ID already exists
     $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
     $stmt->bind_param("s", $username);
     $stmt->execute();
     $result = $stmt->get_result();
     $stmt->close();
     if($result->num_rows > 0){
       $isValid = false;
       $error_message = "Username is already existed.";
     }
   }

   if($isValid){

     // Check if Email-ID already exists
     $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $result = $stmt->get_result();
     $stmt->close();
     if($result->num_rows > 0){
       $isValid = false;
       $error_message = "Email-ID is already existed.";
     }

   }

   // Insert records
   if($isValid){
     $insertSQL = "INSERT INTO users(username,address,address2, email, phone, password ) values(?,?,?,?,?,?)";
     $stmt = $con->prepare($insertSQL);
     $stmt->bind_param("ssssss",$username,$address,$address2,$email,$phone,$password);
     $stmt->execute();
     $stmt->close();

     $success_message = "Account created successfully.";
   }
}
?>

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
        <li><a href="managerlogin.php"><span class="glyphicon glyphicon-log-in"></span> Manager Login</a></li>
        <li  class="active"><a href="register.php"><span class="glyphicon glyphicon-user"></span>  Register</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

    <div class='container'>
      <div class='row'>

        <div class='col-md-6' >

          <form method='post' action=''>

            <h1>Register</h1>
            <?php 
            // Display Error message
            if(!empty($error_message)){
            ?>
            <div class="alert alert-danger">
              <strong>Error!</strong> <?= $error_message ?>
            </div>

            <?php
            }
            ?>

            <?php 
            // Display Success message
            if(!empty($success_message)){
            ?>
            <div class="alert alert-success">
              <strong>Success!</strong> <?= $success_message ?> <a href="login.php">Click Me</a>
            </div>

            <?php
            }
            ?>

            <div class="form-group">
              <label for="username">User Name:</label>
              <input type="text" class="form-control" name="username" id="username" required="required" placeholder="Username" maxlength="80">
            </div>
            <div class="form-group">
              <label for="address">Address:</label>
              <input type="text" class="form-control" name="address" id="address" required="required" placeholder="Address" maxlength="80">
              <select class="form-control" name="address2" id="address2">
              <option value="Bandar Bukit Tinggi, 41200 Klang, Selangor">Bandar Bukit Tinggi, 41200 Klang, Selangor</option>
              <option value="Bandar Botanik, 41200 Klang,  Selangor">Bandar Botanik, 41200 Klang,  Selangor</option>
              <option value="Bandar Puteri, 41200 Klang, Selangor">Bandar Puteri, 41200 Klang, Selangor</option>
            </select>
            </div>
            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" class="form-control" name="email" id="email" required="required" placeholder="Email Address" maxlength="80">
            </div>
            <div class="form-group">
            <label for="phone">Enter your phone number:</label>
            <input type="tel" class="form-control" id="phone" name="phone" required="required" placeholder="012-3456789" pattern="[0-9]{3}-[0-9]{7}">
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" name="password" id="password" required="required" placeholder="Password" maxlength="80">
            </div>
            <div class="form-group">
              <label for="pwd">Confirm Password:</label>
              <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" onkeyup='' required="required" placeholder="Confirm Password" maxlength="80">
            </div>

            <button type="submit" name="btnsignup" class="btn btn-default">Submit</button>
           
          </form>
          <br>
          <a href="login.php"> <button type="login"  class="btn btn-default">Login</button></a>
          <a href="index.php"> <button type="login"  class="btn btn-default">Home</button></a>
        </div>

     </div>
    </div>
  </body>
</html>