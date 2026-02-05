<?php
session_start();
include "../config.php";

$user_id = (int)$_POST['user_id'];///////////echo $user_id ;exit;

$q = mysqli_query($con,"SELECT id FROM users WHERE id=$user_id");
if(mysqli_num_rows($q)){
    $_SESSION['user_id']=$user_id;
}

header("Location:../index.php");
