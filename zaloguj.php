<?php

    session_start();
    require_once "connect.php";


	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
	
        
	
     $sql = "SELECT * FROM uzytkownicy WHERE login='$login' AND haslo='$haslo' AND id_ucznia='1'";
     $sql2 = "SELECT uczniowie.imie_ucznia, uczniowie.nazwisko
				FROM uczniowie
				INNER JOIN uzytkownicy ON uczniowie.id_ucznia = uzytkownicy.id_ucznia";
       
			$wykonaj = $polaczenie->query($sql2);
      
        if($rezultat =@$polaczenie->query($sql))
        {
            $ilu_userow = $rezultat->num_rows;
            if($ilu_userow>0)
            {
                $wiersz = $rezultat->fetch_assoc();
                $_SESSION['login']=$wiersz['login'];

                
				$wiersz2 = $wykonaj->fetch_assoc();
				$_SESSION['imie_ucznia']=$wiersz2['imie_ucznia'];

				
                $rezultat->close();
                header('Location:aktualnosci_ucznia.php');
                
            }else{
                
                
            }
		
        
        
        }
        
        $sql = "SELECT * FROM uzytkownicy WHERE login='$login' AND haslo='$haslo' AND id_nauczyciela='1'";
				$sql2 = "SELECT nauczyciele.imie, nauczyciele.nazwisko
				FROM nauczyciele
				INNER JOIN uzytkownicy ON nauczyciele.id_nauczyciela = uzytkownicy.id_nauczyciela";
       
				$wykonaj = $polaczenie->query($sql2);	    
        if($rezultat =@$polaczenie->query($sql))
        {
            $ilu_userow = $rezultat->num_rows;
            if($ilu_userow>0)
            {
                $wiersz = $rezultat->fetch_assoc();
                $_SESSION['login']=$wiersz['login'];
            	$wiersz2 = $wykonaj->fetch_assoc();
				$_SESSION['imie']=$wiersz2['imie'];
                

				
                $rezultat->close();
                header('Location:aktualnosci_nauczyciela.php');
                
            }else{
                
                
            }
		
        
        
        }
        	// $sql2 = "SELECT uczniowie.imie_ucznia, uczniowie.nazwisko
            // FROM uczniowie
            // INNER JOIN uzytkownicy ON uczniowie.id_ucznia= uzytkownicy.id_ucznia";
       
       $wykonaj = $polaczenie->query($sql2);
     // $wykonaj = $polaczenie->query($zapytanie);
     //   header('Location:aktualnosci_ucznia.php');
           
	$polaczenie->close();
    }
?>