<?php
require 'config.php';
$con = Connect();

session_start();

$user_check=$_SESSION['username'];

// SQL Query To Fetch Complete Information Of User
$query = "SELECT username FROM users WHERE username = '$user_check'";
$ses_sql = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];


?>