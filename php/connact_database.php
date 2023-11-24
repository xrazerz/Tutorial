<?php
namespace conndatabase;
$host= "localhost";
$user= "root";
$pass= "";
$db= "toto";
$conn= mysqli_connect($host,$user,$pass,$db);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

function register($name,$email,$password ,$conn){
    $sql="INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";
    if(mysqli_query($conn,$sql)){
        return true;
    }else{
        return false;
    }
}
