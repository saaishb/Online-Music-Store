<html>
<head>
    <title>Add Data</title>
</head>
 
<body background = "1.png">
<?php
include_once("config.php");
 
if(isset($_POST['Submit'])) {  
    $artist =$_POST['artist'];
    $album=$_POST['album'];
    $date=$_POST['date'];
    $producer=$_POST['producer'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];    
    
    if(empty($artist) || empty($album) || empty($date) || empty($producer) || empty($price) || empty($quantity)) {            
        if(empty($artist)) {
            echo "<font color='red'>*** Please enter artist  </font><br/>";
        }
        
        if(empty($album)) {
            echo "<font color='red'>*** Please enter album</font><br/>";
        }
        
        if(empty($date)) {
            echo "<font color='red'>*** Please enter date</font><br/>";
        }  
	if(empty($producer)) {
            echo "<font color='red'>*** Please enter producer</font><br/>";
        } 
	if(empty($price)) {
            echo "<font color='red'>*** Please enter price</font><br/>";
        } 
	if(empty($quantity)) {
            echo "<font color='red'>*** Please enter quantity</font><br/>";
        
        } 
    }      
    else { 
        
        $result = $db->exec("INSERT INTO PRODUCTS (artist,album,date,producer,price,quantity) VALUES('$artist','$album','$date','$producer','$price','$quantity')");
	
	       
       	
        echo "<font color='green'>Added Sucessfully.";
        echo "<br/><a href='list.php'>View list</a>";
    }
}

?>
</body>
</html>
