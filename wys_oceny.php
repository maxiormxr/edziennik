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
	//	$login = $_POST['login'];
	//	$haslo = $_POST['haslo'];
	
        

    $sql11 = "SELECT  oceny.ocena, daneuzytkownika.imie, daneuzytkownika.nazwisko, przedmioty.nazwa
                    FROM   daneuzytkownika
                    LEFT OUTER JOIN oceny ON daneuzytkownika.id_uzytkownika=oceny.id_uzytkownika 
                    INNER JOIN przedmioty ON oceny.id_przemiotu=przedmioty.id_przedmiotu
                    WHERE id_przemiotu=1";
                
                  $rezultat =@$polaczenie->query($sql11);
                  	$wiersz2 = $rezultat->fetch_assoc();
				$_SESSION['nazwisko']=$wiersz2['nazwisko'];
               $_SESSION['ocena']=$wiersz2['ocena'];
                $_SESSION['nazwa']=$wiersz2['nazwa'];
            
            
            
            
                
                
	$polaczenie->close();
    }
?>