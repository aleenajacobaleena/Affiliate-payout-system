<?php
include "config.php";

$uid = $_SESSION['user_id'];
/////echo $uid ;exit;
$res = mysqli_query($con,
    "SELECT id,name,balance FROM users WHERE parent_id=$uid"
);

echo "<table><tr><th>ID</th><th>Name</th><th>Balance</th></tr>";
while($r=mysqli_fetch_assoc($res)){
    echo "<tr>
        <td>{$r['id']}</td>
        <td>{$r['name']}</td>
        <td>{$r['balance']}</td>
    </tr>";
}
echo "</table>";
