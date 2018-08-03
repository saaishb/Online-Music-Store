<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body background = "1.png">

<?php

include_once("config.php");
 


$user = $_GET['user'];
$rej = $db->query("SELECT username FROM USERS where id = $user");
 while($row = $rej->fetch(PDO::FETCH_ASSOC)) {
$name = $row['username'];
}
echo "<h1>Signed in as $name</h1>";

$id = $_GET['id'];
 
$result = $db->query("SELECT * FROM PRODUCTS WHERE id=$id");
 
while($res = $result->fetch(PDO::FETCH_ASSOC))
{
    $artist = $res['artist'];
    $album = $res['album'];
    $date = $res['date'];
    $producer = $res['producer'];
    
    $price = $res['price'];
    $quantity = $res['quantity'];
}
if($quantity > 0){
	echo "<font color='green'>*** Item added successfully  </font><br/>";
	$quantity = $quantity-1;
	$r = $db->exec("INSERT INTO CART(artist,album,date,producer,price) VALUES('$artist','$album','$date','$producer','$price')");
	$result = $db->exec("UPDATE PRODUCTS SET quantity='$quantity' WHERE id=$id");
	echo "<br/><a href=\"cart.php?user=$user\">view cart</a>";
	echo "<br/><a href=\"products.php?id=$user\">ADD more items</a>";
}
else{
	echo "<font color='red'>*** SORRY! Item not available  </font><br/>";
	echo "<br/><a href=\"cart.php?user=$user\">view cart</a>";
	echo "<br/><a href=\"products.php?id=$user\">ADD other items</a>";
}
?>




</body>
</html>




















