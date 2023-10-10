<?php
include "connect.php";
session_start();
if (empty($_SESSION["username"])) {
    header("location: login-form.php");
}
?>

<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    หากต้องการออกจากระบบโปรดคลิก <a href='logout.php'>ออกจากระบบ</a><br><br>
    <hr>
    <br>

    <?php

    $user = $_GET['username'];
    ?>
    นี่คือ Order ของผู้ใช้ <?php echo $user ?> <br>
    <?php
    $stmt = $pdo->prepare("SELECT member.username, product.pname, item.quantity,product.price * item.quantity
           FROM orders
           INNER JOIN member ON member.username = orders.username
           INNER JOIN item ON item.ord_id = orders.ord_id
           INNER JOIN product ON product.pid = item.pid
           WHERE member.username = ?");
    $stmt->bindParam(1, $user);
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        echo "ชื่อสินค้า: " . $row["pname"] . "<br>";
        echo "ราคา: " . $row["product.price * item.quantity"] . " บาท <br>";
        echo "จำนวน: " . $row["quantity"] . " ชิ้น <br>";
        echo "<hr>\n";
    }

    ?>
</body>

</html>