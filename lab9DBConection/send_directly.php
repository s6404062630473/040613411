<?php include "connect.php" ?>
<?php
    $stmt = $pdo->prepare("INSERT INTO member VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $_POST["username"]);    
    $stmt->bindParam(2, $_POST["password"]);
    $stmt->bindParam(3, $_POST["name"]);
    $stmt->bindParam(4, $_POST["address"]);
    $stmt->bindParam(5, $_POST["mobile"]);
    $stmt->bindParam(6, $_POST["email"]);
    $stmt->execute(); 
    $username = $pdo->lastInsertId(); 
    if($_FILES['image']['tmp_name']){
        $target = './member_photo/'.$_POST["username"].'.jpg';
        $upload = move_uploaded_file($_FILES['image']['tmp_name'],$target);

        if($upload){
            header("location: detail.php?username=".$_POST['username']);
        }
    }
?>
<html>
<head><meta charset="UTF-8"></head>
<body>
เพิ่มสมาชิกสำเร็จ รหัสสมาชิกใหม่ คือ <?=$_POST["username"]?>
</body>