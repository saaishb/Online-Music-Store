<?php
include("config.php");
 
$user = $_GET['user'];

 

$result = $db->exec("DELETE FROM CART");
 
header("Location:products.php?id=$user");
?>
