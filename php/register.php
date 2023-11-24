<?php
include("connact_database.php");
$name= $_POST['username'];
$email= $_POST['email'];
$password= $_POST['password'];
$pass =$password=md5($password);

// echo"$name , $email , $password";
if (isset($name)&&isset($email)&&isset($password)) {
    $sql= "INSERT INTO `users` (`username`, `gmail`, `password`) VALUES ('$name', '$email', '$pass')";

if(mysqli_query($conn, $sql)){
    $git_id ="SELECT * FROM `users` WHERE `gmail` = '{$email}'";

    $result = mysqli_query($conn, $git_id);
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    $sql= 'INSERT INTO `user_permision`( `user_id`) VALUES ('.$id.')';
    mysqli_query($conn, $sql);
    header("Location: ../login/login.html");
}else{
    echo "error";
    // echo mysqli_error($conn);

    // header("Location: ../login/login.html");
}

}else {
    header("Location: ../");
}

