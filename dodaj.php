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
        
         $sql = "INSERT INTO aktualnosci (id_ucznia)
                SELECT id_ucznia
                FROM uczniowie";
                    $wykonaj = $polaczenie->query($sql);
        
        $sql3 = "INSERT INTO aktualnosci (tekst) VALUES ('$tekst')" or die(mysql_error());
         $wykonaj = $polaczenie->query($sql3);  
         
          $sql2="SELECT uczniowie.imie_ucznia, uczniowie.nazwisko_ucznia
				FROM uczniowie
				INNER JOIN aktualnosci ON uczniowie.id_ucznia = aktualnosci.id_ucznia";
        $wykonaj = $polaczenie->query($sql2);
        
       
 
        $imie = $_POST['imie_ucznia'];
        $nazwisko = $_POST['nazwisko_ucznia'];
       
      
        
       // $sql3 = "INSERT INTO aktualnosci (imie, nazwisko, tekst) VALUES ('$imie','$nazwisko','$tekst')" or die(mysql_error());
        
  
     
              
        header('Location:aktualnosci_ucznia.php');
    }
 
$polaczenie->close();    

?>