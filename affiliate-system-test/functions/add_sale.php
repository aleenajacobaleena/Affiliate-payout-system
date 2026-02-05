<?php
session_start();
include "../config.php";

$seller = (int)$_POST['seller_id'];
$amount = (float)$_POST['amount'];

if ($seller <= 0 || $amount <= 0) {
    $_SESSION['error'] = "Invalid input.";
    header("Location: ../index.php");
    exit;
}
$checkUser = mysqli_query($con, "SELECT id FROM users WHERE id = $seller");

if (mysqli_num_rows($checkUser) == 0) {
    $_SESSION['error'] = "User ID does not exist.";
    header("Location: ../index.php");
    exit;
}

/* Insert sale */
mysqli_query($con,
    "INSERT INTO sales (user_id, amount) VALUES ($seller, $amount)"
);
$sale_id = mysqli_insert_id($con);

/* Add amount  */
mysqli_query($con,
    "UPDATE users SET balance = balance + $amount WHERE id = $seller"
);

/*commission distribution */
$percent = [10, 5, 3, 2, 1];
$current = $seller;

for ($level = 0; $level < 5; $level++) {

    $q = mysqli_query($con,
        "SELECT parent_id FROM users WHERE id = $current"
    );
    $r = mysqli_fetch_assoc($q);

    if (!$r || !$r['parent_id']) break;

    $parent = $r['parent_id'];
    $commission = ($amount * $percent[$level]) / 100;

    mysqli_query($con,
        "INSERT INTO payouts (sale_id, user_id, level, commission)
         VALUES ($sale_id, $parent, " . ($level + 1) . ", $commission)"
    );

    mysqli_query($con,
        "UPDATE users SET balance = balance + $commission WHERE id = $parent"
    );

    $current = $parent;
}
/////////////// 
$_SESSION['success'] = "Sale recorded successfully!";
header("Location: ../index.php");
exit;
