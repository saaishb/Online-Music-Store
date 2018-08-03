<?php

include_once("config.php");
$user = $_GET['id'];
$res = $db->query("SELECT username FROM USERS where id = $user");
 while($row = $res->fetch(PDO::FETCH_ASSOC)) {
$name = $row['username'];
}

$result = $db->query("SELECT * FROM PRODUCTS"); 
?>
 
<html> 
<head>    
    <title>Products</title>
</head>
 
<body
    background = "1.png">
    
    <h1>List of all products</h1>

    <table width='100%' border=10>
        <tr bgcolor = 'yellow' >
            <th style = "color:red;">Artist</th>
            <th style = "color:red;">Album</th>
	    <th style = "color:red;">Release Date</th>
	    <th style = "color:red;">Producer</th>
	    <th style = "color:blue;">Price</th>
	    <th style = "color:blue;">Quantity</th>
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
	    echo "<td>".$row['quantity']."</td>";  
            echo "<td><a href=\"add.php?id=$row[id]&user=$user\"><button  type=\"button\">ADD</button></a></td>";  
	    
        }
echo "<br/><a href=\"cart.php?user=$user\">view cart</a>";
echo "<br/><a href=\"acdel.php?id=$user\">Delete my Account</a>";
echo "<br/><a href='del.php'>Sign Out</a>";
        ?>
    </table>
	
</body>
</html>
