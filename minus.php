<?php
include("config.php");
 

$id = $_GET['id'];
 

$result = $db->exec("DELETE FROM USERS WHERE id=$id");
 
header("Location:users.php");
?>
