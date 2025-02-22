<?php 
include "db.connection.php";
?>

<div>We will shortly contact in 24 hours</div>

<?php 
$query = "SELECT * FROM order_items ORDER BY id DESC LIMIT 1";
$result = $conn->query($query);
$stmt-> execute();


echo"<pre> $result
</pre>";
?>