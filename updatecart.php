<?php


include 'config.php';


$food_id = $_GET['id'];
$action = $_GET['action'];




$sql = "SELECT quantity FROM food WHERE food_id = ".$food_id;

$result = mysqli_query($con, $sql);


if($result){

  if($obj = mysqli_fetch_assoc($result)) {

    switch($action) {

      case "add":
      if($_SESSION['cart'][$food_id]+1 <= $row["quantity"])
        $_SESSION['cart'][$food_id]++;
      break;

      case "remove":
      $_SESSION['cart'][$food_id]--;
      if($_SESSION['cart'][$food_id] == 0)
        unset($_SESSION['cart'][$food_id]);
        break;



    }
  }
}



header("location:cart.php");

?>