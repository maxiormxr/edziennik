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
	
        

     $sql = "SELECT * FROM uzytkownicy WHERE login='$login' AND haslo='$haslo' AND rola=1";
     $sql2 = "SELECT daneuzytkownika.imie, daneuzytkownika.nazwisko, uzytkownicy.login 
     FROM daneuzytkownika 
     INNER JOIN uzytkownicy ON uzytkownicy.id_uzytkownika = daneuzytkownika.id_uzytkownika
     WHERE login='$login'";
                
  
       
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
                header('Location:aktualnosci_ucznia.php');
                
            }else{
                
                
            }
		
        
        
        }
        
        $sql = "SELECT * FROM uzytkownicy WHERE login='$login' AND haslo='$haslo' AND rola=2";
        
				$sql2 = "SELECT daneuzytkownika.imie, daneuzytkownika.nazwisko, uzytkownicy.login 
     FROM daneuzytkownika 
     INNER JOIN uzytkownicy ON uzytkownicy.id_uzytkownika = daneuzytkownika.id_uzytkownika
     WHERE login='$login'";
       
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
           
            $sql11 = "SELECT  oceny.ocena, uczniowie.imie_ucznia, uczniowie.nazwisko_ucznia, przedmioty.nazwa
        FROM   uczniowie 
       LEFT OUTER JOIN oceny ON uczniowie.id_ucznia=oceny.id_ucznia 
       INNER JOIN przedmioty ON oceny.id_przemiotu=przedmioty.id_przedmiotu";
                
                  $rezultat =@$polaczenie->query($sql11);
        
         
                
            //	$wiersz2 = $rezultat->fetch_assoc();
			//	$_SESSION['nazwisko_ucznia']=$wiersz2['nazwisko_ucznia'];
             //   $_SESSION['ocena']=$wiersz2['ocena'];
             //   $_SESSION['nazwa']=$wiersz2['nazwa'];
//
                
                
	$polaczenie->close();
    }
?>