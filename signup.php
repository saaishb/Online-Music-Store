<html>
<head>
    <title>Add Data</title>
</head>
 
<body background = "1.png">
<?php
include_once("config.php");
 


if(isset($_POST['Submit'])) {    
    $username =$_POST['un1'];
    
    $password=$_POST['p1'];
    $confirmpassword = $_POST['cp1'];
  
    echo "<br/><a href='main.html'>HOME</a>";   
    if(empty($username) || empty($password)|| empty($confirmpassword)) {   
	echo "<br/><a href='signup.html'>Sign Up</a>";         
        if(empty($username)) {
            echo "<font color='red'>*** Please enter user name  </font><br/>";
        }
	 if(empty($password)) {
            echo "<font color='red'>*** Please enter password  </font><br/>";
        }
        
       
        
        
	if(empty($confirmpassword)) {
            echo "<font color='red'>*** Please enter password again</font><br/>";
        } 
	
        }
	
	 else { 
	$result = $db->query("SELECT * FROM USERS");
	$count =0;
	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		if($row['username']==$username){
			$count = $count+1;
			
	}
	}
	if ($count==0){
		if($password != $confirmpassword){
        
		echo "<font color='red'>*** passwords doesnot match  </font><br/>";
		echo "<br/><a href='signup.html'>Sign up again</a>"; 
        
	 	}
		else{
			$result = $db->exec("INSERT INTO USERS(username,password) VALUES('$username','$password')");
			echo "<font color='green'>USER Registered successfully.";
			echo "<br/><a href='signin.html'>Sign in</a>";
	     
		}
	}
	else{
		echo "<font color='red'>*** user exists</font><br/>";
		echo "<br/><a href='signin.html'>Sign in</a>"; 
	}      
       	
        
        
    }
}

?>
</body>
</html>
