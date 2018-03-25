<?php 

session_start();
	

	require_once "connect.php";
    	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
 echo "Error:".$polaczenie->connect_errno;

    }else
    {
   
    
        
        $tekst = $_POST['tekst'];       
      
        
        $sql3 = "INSERT INTO aktualnosci (tekst) VALUES ('$tekst')" or die(mysql_error());
        $wykonaj = $polaczenie->query($sql3); 
  
     
              
        header('Location:aktualnosci_ucznia.php');
    }
 
$polaczenie->close();    

?>