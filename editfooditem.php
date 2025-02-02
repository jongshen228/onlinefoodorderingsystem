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
        <a href="addfooditem.php" class="list-group-item ">Add Food Items</a>
        <a href="editfooditem.php" class="list-group-item active">Edit Food Items</a>
        <a href="deletefooditem.php" class="list-group-item ">Delete Food Items</a>
        <a href="vieworderdetail.php" class="list-group-item ">View Order Details</a>
      </div>
    </div>
    


    
    

<div class="col-xs-3">

  <div class="form-area" style="padding: 10px 10px 110px 10px; ">
  
    <div style="text-align: center;">
      <h3>Click On Menu <br><br></h3>
    </div>
    <?php
   
 

    if (isset($_GET['submit'])) {
    $food_id = $_GET['dfid'];
    $food_name = $_GET['dname'];
    $food_price = $_GET['dprice'];
    $images_path = $_GET['dimages'];
        ?>


            <?php


    $query =  "UPDATE food set
    food_name='$food_name', food_price='$food_price', images_path='$images_path' where food_id='$food_id'";
    $success = $con->query($query);  
    if(!$success)
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
              <strong>Success!</strong><p><a href="editfooditem.php"> Click Me </a></p> 
            </div>
            <?PHP
    }
}

    $query = mysqli_query($con, "SELECT * FROM food WHERE options = 'Enable' ORDER BY food_id");
    while ($row = mysqli_fetch_array($query)) {

      ?>

      <div class="list-group" style="text-align: center;">
        <?php
      echo "<b><a href='editfooditem.php?update= {$row['food_id']}'>{$row['food_name']}</a></b>";  
        ?>
      </div>


    <?php
    }
    ?>
    

    <?php
    if (isset($_GET['update'])) {
    $update = $_GET['update'];
    $query1 = mysqli_query($con, "SELECT * FROM food WHERE food_id=$update");
    while ($row1 = mysqli_fetch_array($query1)) {


    ?>


</div>
</div>



<div class="container">
<div class="col-md-6">
 <div class="form-area" style="padding: 0px 100px 100px 100px;">
        <form action="editfooditem.php" method="GET">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> EDIT YOUR FOOD ITEMS HERE </h3>

          <div class="form-group">
            <input class='input' type='hidden' name="dfid" value=<?php echo $row1['food_id'];  ?> />
          </div>

          <div class="form-group">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Food Name: </label>
            <input type="text" class="form-control" id="dname" name="dname" value="<?php echo $row1['food_name'];  ?>" placeholder="Your Food name" required="">
          </div>     

          <div class="form-group">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Food Price: </label>
            <input type="text" class="form-control" id="dprice" name="dprice" value="<?php echo $row1['food_price'];  ?>" placeholder="Your Food Price (RM)"required="">
          </div>

          <div class="form-group">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Food Images: </label>
            <input type="image" id="images" name="images" img src="<?php echo $row1["images_path"]; ?>" class="img-responsive">

            <input type="file" class="form-control" id="dimages" name="dimages" value="<?php echo $row1["images_path"]; ?>" required="">
          </div>

          <div class="form-group">
          <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right"  > Update </button>    
      </div>
        </form>


    <?php
}
}


  ?>
      
  </div>




</div>




<?php
mysqli_close($con);
?>
</div>
</div>

  </body>
<br>
</html>