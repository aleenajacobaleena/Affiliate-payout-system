<?php
include "config.php";
$uid = $_SESSION['user_id'];///echo $uid ;exit;
$q = mysqli_query($con,"SELECT * FROM users WHERE id=$uid");
$r = mysqli_fetch_assoc($q);

echo "ID: {$r['id']} | Name: {$r['name']} | Balance: ₹{$r['balance']}";
