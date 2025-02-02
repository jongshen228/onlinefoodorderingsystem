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

.container {
  position: relative;
}

.text-block {
  position: absolute;
  width: 300px;
  font-size: 20px;
  bottom: 20px;
  right: 15px;
opacity: 0.8;
background-color: lightgrey;
  color: black;
  padding-left: 10px;
  padding-right: 10px;
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
      <a class="navbar-brand" href="index.php">Chia's Burger Shop</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="foodmenu2.php">Food Menu</a></li>
        <li><a href="aboutus.php">About Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="managerlogin.php"><span class="glyphicon glyphicon-log-in"></span> Manager Login</a></li>
        <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
       


      <div class="container">
  <div class="jumbotron">
    <h1>Home Page</h1>
  </div>
  <div class="row">
    <div class="col-sm-12">
      
       <a href="foodmenu2.php"><img src="picture/burgerbackground.jpg" alt="burger" style="max-width:100%;height:auto;"></a>
       <div class="text-block">
          <h2>Chicken Burger</h2>
          <p>Pickle chips put a spin on a classic beef patty burger layered with melted cheese. <a href="foodmenu2.php">Learn More</a></p>
    </div>
  </div>

    <div class="col-sm-12">
  
   <a href="aboutus.php"> <img src="picture/burgershop2.jpg" alt="donate"  style="max-width:100%;height:auto;"></a>
  <div class="text-block">
    <h2>About us</h2>
     <p>We started with one simple objective. Sell a really good, juicy burger on a fresh bun. <a href="aboutus.php">Learn More</a></p>
  </div>
</div>

    </div>
  </div>


</body>
</html>


      <div class="footer">
        <i>2020 Chia's Burger Sdn Bhd. All rights reserved.</i>
      </div>

    </body>
</html>