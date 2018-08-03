<?php

include_once("config.php");
 

$result = $db->query("SELECT * FROM USERS ORDER BY id"); 
?>
 
<html>
<head>    
    <title>EDIT USERS</title>
</head>
 
<body
    background = "1.png">
    
    <h1>List of all USERS</h1>
    <table width='100%' border=10>
        <tr bgcolor = 'yellow' >
            <th style = "color:red;">USERNAME</th>
            <th style = "color:red;">PASSWORD</th>
	    <th style = "color:green;">Options</th>
	    
        </tr>
        <?php 
         
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {         
            echo "<tr>";
            echo "<td>".$row['username']."</td>";
            echo "<td>".$row['password']."</td>";
             
            echo "<td><a href=\"minus.php?id=$row[id]\" onClick=\"return confirm('Delete this information?')\"><button  type=\"button\">DELETE</button></a></td>";  
	    
        }
echo "<br/><a href='main.html'>Sign Out</a>";
echo "<br/><a href='list.php'>Edit products</a>";
        ?>
    </table>
	
</body>
</html>
