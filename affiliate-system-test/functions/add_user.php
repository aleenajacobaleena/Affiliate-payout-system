<?php
session_start();
include "../config.php";

$name = trim($_POST['name']);
$parent = $_SESSION['user_id'];

if($name=="") exit("Name required");

mysqli_query($con,
    "INSERT INTO users (name,parent_id) VALUES ('$name',$parent)"
);

header("Location:../index.php");
