<?php
	include "connect.php";
    session_start();
    if (empty($_SESSION["username"]) ) { 
        header("location: login-form.php");
    }
?>

<html>
<head><meta charset="utf-8"></head>
<body>
<?php
   if($_SESSION["username"]=='somsak'){
    $stmt = $pdo->prepare("SELECT member.username,SUM(ord_id/ord_id) FROM orders JOIN member ON member.username = orders.username GROUP BY username");
   $stmt->execute();

   while ($row = $stmt->fetch()) {
       echo "username: " . $row ["username"] . "<br>";
       echo "order: " . $row ["SUM(ord_id/ord_id)"] . "<br>";
       echo "<hr>\n";
   }
}
   else{$stmt = $pdo->prepare("SELECT * FROM `orders` WHERE username = '{$_SESSION["username"]}'");
   $stmt->execute();

   while ($row = $stmt->fetch()) {
       echo "order id: " . $row ["ord_id"] . "<br>";
       echo "username: " . $row ["username"] . "<br>";
       echo "order date: " . $row ["ord_date"] . "<br>";
       echo "status: " . $row ["status"] . "<br>";
       echo "<hr>\n";
   }}
?>
</body>
</html>
