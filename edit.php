<?php

include_once("config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
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
    } else {    
        
        $result = $db->exec("UPDATE PRODUCTS SET artist='$artist',album='$album',date='$date',producer='$producer',price='$price',quantity='$quantity' WHERE id=$id");
        
        
        header("Location: list.php");
    }
}
?>
<?php

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
?>

<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body background = "1.png">
    <a href="list.php">Go to List</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>ARTIST</td>
                <td><input type="text" name="artist" value="<?php echo $artist;?>"></td>
            
                <td>ALBUM</td>
                <td><input type="text" name="album" value="<?php echo $album;?>"></td>
            </tr>
            <tr> 
                <td>Release Date</td>
                <td><input type="text" name="date" value="<?php echo $date;?>"></td>
             
                <td>PRODUCER</td>
                <td><input type="text" name="producer" value="<?php echo $producer;?>"></td>
            </tr>
	    <tr> 
                <td>PRICE</td>
                <td><input type="text" name="price" value="<?php echo $price;?>"></td>
             
                <td>QUANTITY</td>
                <td><input type="text" name="quantity" value="<?php echo $quantity;?>"></td>
            </tr>
            <tr align ="right">
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
		<td><input type="hidden" name="_method" value="put"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
