<?php
include("connact_database.php");
$row['id']=25;
$prem='SELECT `user_permision` FROM `user_permision` WHERE `user_id` ='.$row['id'].'';
$mm=mysqli_query($conn, $prem) or die(mysqli_error($conn));
print_r($mm);