<?php
include "config.php";

$uid = $_SESSION['user_id'];////echo $uid ;exit;

$sql = ($uid==1)
? "SELECT s.id,u.name,s.amount FROM sales s JOIN users u ON s.user_id=u.id"
: "SELECT s.id,u.name,s.amount FROM sales s JOIN users u ON s.user_id=u.id WHERE user_id=$uid";

$res = mysqli_query($con,$sql);

echo "<table><tr><th>ID</th><th>User</th><th>Amount</th></tr>";
while($r=mysqli_fetch_assoc($res)){
    echo "<tr>
        <td>{$r['id']}</td>
        <td>{$r['name']}</td>
        <td>{$r['amount']}</td>
    </tr>";
}
echo "</table>";
