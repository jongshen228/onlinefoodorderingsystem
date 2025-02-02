<?php
require 'config.php';
$con = Connect();

session_start();

$user_check=$_SESSION['manager_name'];

// SQL Query To Fetch Complete Information Of User
$query = "SELECT manager_name FROM manager WHERE manager_name = '$user_check'";
$ses_sql = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['manager_name'];


?>