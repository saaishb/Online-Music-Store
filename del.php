<?php
include("config.php");
 
$rest = $db->query("SELECT * FROM CART");
 
while($res = $rest->fetch(PDO::FETCH_ASSOC))
{
	$quantity = 0;
    	$artist = $res['artist'];
	$r = $db->query("SELECT * FROM PRODUCTS WHERE artist='$artist'");
	while($rep = $r->fetch(PDO::FETCH_ASSOC))
	{
    		$quantity = $rep['quantity'];
	}
	$quantity = $quantity + 1;
	$result = $db->exec("UPDATE PRODUCTS SET quantity='$quantity' WHERE artist='$artist'");
}
$result = $db->exec("DELETE FROM CART");
 
header("Location:main.html");
?>
