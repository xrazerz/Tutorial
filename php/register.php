<?php
include("connact_database.php");
$name= $_POST['username'];
$email= $_POST['email'];
$password= $_POST['password'];
$pass =$password=md5($password);

// echo"$name , $email , $password";

$sql= "INSERT INTO `users` (`username`, `gmail`, `password`) VALUES ('$name', '$email', '$pass')";

if(mysqli_query($conn, $sql)){ 
    header("Location: ../login/login.html");
}




