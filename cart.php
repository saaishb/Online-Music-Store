<?php

include_once("config.php");
 
$user = $_GET['user'];
$req = $db->query("SELECT username FROM USERS where id = $user");
 while($row = $req->fetch(PDO::FETCH_ASSOC)) {
$name = $row['username'];
}
$result = $db->query("SELECT * FROM CART"); 
?>
 
<html>
<head>    
    <title>Products</title>
</head>
 
<body
    background = "1.png">
    
    <h1>Cart items</h1>
    <table width='100%' border=10>
        <tr bgcolor = 'yellow' >
            <th style = "color:red;">Artist</th>
            <th style = "color:red;">Album</th>
	    <th style = "color:red;">Release Date</th>
	    <th style = "color:red;">Producer</th>
	    <th style = "color:blue;">Price</th>
            <th style = "color:green;">Options</th>
        </tr>
        <?php 
         echo "<h1>Signed in as $name</h1>";
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {         
            echo "<tr>";
            echo "<td>".$row['artist']."</td>";
            echo "<td>".$row['album']."</td>";
            echo "<td>".$row['date']."</td>";
	    echo "<td>".$row['producer']."</td>";
	    echo "<td>".$row['price']."</td>";
	     
            echo "<td><a href=\"delete.php?id=$row[id]&user=$user\" onClick=\"return confirm('Delete this item?')\"><button  type=\"button\">REMOVE</button></a></td>";  
	    
        }
echo "<br/><a href=\"products.php?id=$user\">ADD other items</a>";

$res = $db->query("SELECT * FROM CART");
$sum = 0;
 while($row = $res->fetch(PDO::FETCH_ASSOC)) {         
            
	    
	   $sum = $sum + $row['price'];
	     
              
	    
        }
echo "<h1>Total = $sum </h1>";

echo "<h1><a href=\"purchase.php?user=$user\" onClick=\"return confirm('purchase these itemes for $sum')\"><button  type=\"button\">PURCHASE</button></a></h1>";








        ?>
    </table>
	
</body>
</html>
