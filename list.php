<?php

include_once("config.php");
 

$result = $db->query("SELECT * FROM PRODUCTS ORDER BY id"); 
?>
 
<html>
<head>    
    <title>EDIT PRODUCTS</title>
</head>
 
<body
    background = "1.png">
    
    <h1>List of all Products</h1>
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
         
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {         
            echo "<tr>";
            echo "<td>".$row['artist']."</td>";
            echo "<td>".$row['album']."</td>";
            echo "<td>".$row['date']."</td>";
	    echo "<td>".$row['producer']."</td>";
	    echo "<td>".$row['price']."</td>";
	    echo "<td>".$row['quantity']."</td>";  
            echo "<td><a href=\"edit.php?id=$row[id]\"><button  type=\"button\">EDIT</button></a><a href=\"remove.php?id=$row[id]\" onClick=\"return confirm('Delete this information?')\"><button  type=\"button\">DELETE</button></a></td>";  
	    
        }
echo "<br/><a href='main.html'>Sign Out</a>";
echo "<br/><a href='users.php'>Edit users</a>";
        ?>
    </table>
	<a href="plus.html"><button  type="button">Add new product</button></a><br/><br/>
</body>
</html>
