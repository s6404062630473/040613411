<?php include "connect.php"; ?>
<html>

<body>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM product");
    $stmt->execute();
    echo "<table border='1'>
          <tr>
          <th>รหัสสินค้า</th>
          <th>ชื่อสินค้า</th>
          <th>รายละเอียด</th>
          <th>ราคา</th>
          </tr>";
    while ($row = $stmt->fetch()) {
        echo "<tr>";
        echo "<td>" . $row["pid"] . "</td>";
        echo "<td> " . $row["pname"] . "</td>";
        echo "<td>" . $row["pdetail"] . "</td>";
        echo "<td> " . $row["price"] . "</td>";
        echo "</tr>";
    } ?>
</body>

</html>