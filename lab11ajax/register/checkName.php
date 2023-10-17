<?php
include "connect.php";



if (!in_array($_GET["username"], $objQuery)) {
	echo "okay";
} else {
	echo "denied";
}
