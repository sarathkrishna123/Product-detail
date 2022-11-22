<?php
require("dbconn.php");

$query = "SELECT * FROM `product_list`";
$sql = mysqli_query($con, $query);
?>