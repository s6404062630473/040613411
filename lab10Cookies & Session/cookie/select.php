<html>
<body>
<?php
if (empty($_COOKIE["lang"])) {
setcookie("lang", $_GET["language"], time() + 10);
}

if (!isset($_COOKIE["lang"])) {
    setcookie("lang", $_GET["language"], time() + 10);
} 
?>
<a href="main.php">Go to main</a>
</body>
</html>