<?php
session_start(); 
$error=''; 

if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
require 'connection.php';
$con = Connect();

// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT username, password FROM users WHERE username=? AND password=? LIMIT 1";

// To protect MySQL injection for Security purpose
$stmt = $con->prepare($query);
$stmt -> bind_param("ss", $username, $password);
$stmt -> execute();
$stmt -> bind_result($username, $password);
$stmt -> store_result();

if ($stmt->fetch())  
{
	$_SESSION['username']=$username; // Initializing Session
	header("location: foodmenu2.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysqli_close($con); // Closing Connection
}
}
?>