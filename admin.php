<html>
<head>
    <title>Add Data</title>
</head>
 
<body background = "1.png">
<?php
include_once("config.php");
 
if(isset($_POST['Submit'])) {    
    $un =$_POST['un'];
    
    $p=$_POST['p'];
     
     
        
    if(empty($un) || empty($p)) { 
	echo "<br/><a href='admin.html'>Sign in again</a>";           
        if(empty($un)) {
            echo "<font color='red'>*** Please enter Username  </font><br/>";
        }
        
       
        
        
	if(empty($p)) {
            echo "<font color='red'>*** Please enter password</font><br/>";
        } 
	
       
    } else { 
        if($un=="saaish" && $p == "saaish") {
       		echo "<font color='green'>logged in Sucessfully.";
		echo "<br/><a href='list.php'>Edit Products</a>";
		echo "<br/><a href='users.php'>Edit USERS</a>";
	}
	else{
		echo "<font color='red'>***wrong credentials</font><br/>";
	}
        
       
    }
}

?>
</body>
</html>
