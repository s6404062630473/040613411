<?php include "connect.php"; ?>
<html>

<body>
    <form>
        <input type="text" name="keyword">
        <input type="submit" value="ค้นหา">
    </form>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM member WHERE name LIKE ?");
    if (!empty($_GET)) 
    $value = '%' . $_GET["keyword"] . '%'; 
    $stmt->bindParam(1, $value); 
    $stmt->execute(); 
    while ($row = $stmt->fetch()) {
        echo "ชื่อสมาชิก: " . $row["name"] . "<br>";
        echo "ที่อยู่: " . $row["address"] . "<br>";
        echo "อีเมลล์: " . $row["email"] . "<br>";
        echo "<img src='member_photo/" .$row["username"].".jpg' width='100'><br><hr>";
    } 
    ?>
    
</body>

</html>