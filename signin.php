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
	echo "<br/><a href='signin.html'>Sign in again</a>";           
        if(empty($un)) {
            echo "<font color='red'>*** Please enter Username  </font><br/>";
        }
        
       
        
        
	if(empty($p)) {
            echo "<font color='red'>*** Please enter password</font><br/>";
        } 
	
       
    } else { 
        
       $result = $db->query("SELECT * FROM USERS");
	$count =0;
	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		if($row['username']==$un){
			$count = $count+1;
		}
	
	}
	if($count==0){
		echo "<font color='red'>*** user doesnot exist</font><br/>";
		echo "<br/><a href='signup.html'>Sign Up</a>";
	}
	else{
		$result = $db->query("SELECT * from USERS where username='$un'");
	
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$pass = $row['password'];
			$id = $row['id'];
		
		}
		if ($pass ==$p){
			
			echo "<font color='green'>logged in Sucessfully.";
			echo "<br/><a href=\"products.php?id=$id\">View Products</a>";
		}
		else{
			echo "<font color='red'>***wrong credentials</font><br/>";
			echo "<br/><a href='signin.html'>Sign in again</a>";
			}
	
	        
       	}
        
       
    }
}

?>
</body>
</html>
