<?php
include("config.php");
 
$user = $_GET['user'];
$rep = $db->query("SELECT username FROM USERS where id = $user");
 while($row = $rep->fetch(PDO::FETCH_ASSOC)) {
$name = $row['username'];
}
echo "Signed in as $name";
$id = $_GET['id'];
$result = $db->query("SELECT * FROM CART WHERE id=$id");
 
while($res = $result->fetch(PDO::FETCH_ASSOC))
{
    $artist = $res['artist'];
}

$result = $db->exec("DELETE FROM CART WHERE id=$id");





$r = $db->query("SELECT * FROM PRODUCTS WHERE artist='$artist'");
 
while($res = $r->fetch(PDO::FETCH_ASSOC))
{
    $quantity = $res['quantity'];
}
$quantity = $quantity + 1;
$result = $db->exec("UPDATE PRODUCTS SET quantity='$quantity' WHERE artist='$artist'");




echo "<font color='green'>*** Item removed successfully  </font><br/>";
	echo "<br/><a href=\"cart.php?user=$user\">view cart</a>";
	echo "<br/><a href=\"products.php?id=$user\">ADD other items</a>";
?>
