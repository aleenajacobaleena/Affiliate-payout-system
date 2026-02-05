<?php
session_start();
if(!isset($_SESSION['user_id'])) $_SESSION['user_id']=1;

?>
<!DOCTYPE html>
<html>
<head>
<title>Affiliate Systems</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container">
<h2>Affiliate Payout System</h2>

<h3>Switch Current User</h3>
<form action="functions/switch_users.php" method="post">
<input type="number" name="user_id" placeholder="Switch User ID">
<button>Switch</button>
</form>

<hr>

<h3>Add Affiliate (User)</h3>
<form action="functions/add_user.php" method="post">
<input type="text" name="name" placeholder="User Name">
<button>Add</button>
</form>

<hr>

<h3>Record Sale</h3>
<form action="functions/add_sale.php" method="post">
<input type="number" name="seller_id" placeholder="User ID">
<input type="number" step="0.01" name="amount" placeholder="Amount">
<button>Save Sale</button>
</form>
<?php


if (isset($_SESSION['error'])) {
    echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']);
}

if (isset($_SESSION['success'])) {
    echo "<p style='color:green'>" . $_SESSION['success'] . "</p>";
    unset($_SESSION['success']);
}
?>

<hr>

<h3>Current User</h3>
<?php include "views/current_user.php"; ?>

<h3>Affiliate Users</h3>
<?php include "views/user_list.php"; ?>

<h3>Sales</h3>
<?php include "views/sales_list.php"; ?>

<hr>
<h3>All Users  Commission & Balance Summary</h3>
<?php include "views/total_commission.php"; ?>


</div>
</body>
</html>
