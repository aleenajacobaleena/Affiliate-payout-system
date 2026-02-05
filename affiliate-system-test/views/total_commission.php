
<?php
include "config.php";

/* Total commission  */

$sql = "
SELECT 
    u.id,
    u.name,
    u.balance,
    IFNULL(SUM(p.commission), 0) AS total_commission
FROM users u
LEFT JOIN payouts p ON u.id = p.user_id
GROUP BY u.id, u.name, u.balance
ORDER BY u.id ASC
";

$res = mysqli_query($con, $sql);

echo "<table>
<tr>
    <th>User ID</th>
    <th>User Name</th>
    <th>Total Commission (₹)</th>
    <th>Current Balance (₹)</th>
</tr>";

while($row = mysqli_fetch_assoc($res)){
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['total_commission']}</td>
        <td>{$row['balance']}</td>
    </tr>";
}

echo "</table>";
