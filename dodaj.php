<?php 

session_start();
	

	require_once "connect.php";
    	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
 echo "Error:".$polaczenie->connect_errno;

    }else
    {
   
    
        

		
		$uzytkownik = $_SESSION['imie_ucznia'];
		$sql_dane_ucznia = "SELECT uzytkownicy.id_ucznia, imie_ucznia, nazwisko_ucznia FROM uczniowie
			INNER JOIN uzytkownicy ON uczniowie.id_ucznia = uzytkownicy.id_ucznia WHERE uczniowie.imie_ucznia = '$uzytkownik'";
      

		$wykonaj = $polaczenie->query($sql_dane_ucznia);
		if (!$wykonaj) {
			throw new Exception("Database Error [{$polaczenie->errno}] {$polaczenie->error}");
		}
		
		$dane_ucznia = $wykonaj->fetch_assoc();
				var_dump($wykonaj);
        
		$tekst = $_POST['tekst']; 
                $sql3 = "INSERT INTO aktualnosci (id_ucznia, tekst) VALUES ('$dane_ucznia[id_ucznia]','$tekst')";

		//$sql3 = "INSERT INTO aktualnosci (id_ucznia, tekst) VALUES ('$dane_ucznia[id_ucznia],'$tekst')";
        $wykonaj = $polaczenie->query($sql3); 
		if (!$wykonaj) {
			throw new Exception("Database Error [{$polaczenie->errno}] {$polaczenie->error}");
		}
  
     
              
        header('Location:aktualnosci_ucznia.php');
    }
 
$polaczenie->close();    

?>