<?php
$keyword = $_GET["keyword"];
$conn = mysqli_connect("localhost", "root", "","blueshop");

$sql = "SELECT * FROM member WHERE username LIKE '%$keyword%'";
$objQuery = mysqli_query($conn,$sql);
?>

<table border="1">
    <?php while($row = mysqli_fetch_array($objQuery)): ?>
    <tr>
        <td><a href="name.php?username=<?php echo $row["username"] ?>"><?php echo $row["name"] ?></a></td>
        <td><?php echo $row["address"] ?></td>
        <td><img src="member_photo/<?php echo $row["username"] ?>.jpg" width="100"></td>
        <td>เบอร์ <?php echo $row["mobile"] ?></td>
    </tr>
    <?php endwhile;?>
</table>