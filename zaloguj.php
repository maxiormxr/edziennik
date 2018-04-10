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
                $_SESSION['nazwisko']=$wiersz2['nazwisko'];
             
				
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
                 $_SESSION['nazwisko']=$wiersz2['nazwisko'];

				
                $rezultat->close();
                header('Location:aktualnosci_nauczyciela.php');
                
            }else{
                
                
            }
		
        
        
        }
        
                
              
 

 
if ($polaczenie->connect_errno!=0)
{
    echo "Error: ".$polaczenie->connect_errno;
}
else
{
     
    $sql = "SELECT  oceny.ocena, daneuzytkownika.imie, daneuzytkownika.nazwisko, przedmioty.nazwa
                   FROM   daneuzytkownika
                    LEFT OUTER JOIN oceny ON daneuzytkownika.id_uzytkownika=oceny.id_uzytkownika 
                INNER JOIN przedmioty ON oceny.id_przemiotu=przedmioty.id_przedmiotu 
                WHERE daneuzytkownika.imie = 'patryk' AND daneuzytkownika.nazwisko = 'kurowski'";                ;
 
   
              
           $result = $polaczenie->query($sql);

        if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {

	$_SESSION['ocena']=$row['ocena'];
    $_SESSION['nazwa']=$row['nazwa'];
       // echo '<span style="color: #FFFFF0;">  ' . $row["ocena"] . '  </span>'; 
       // echo '<span style="color: #FFFFF0;">  ' . $row["nazwa"] . ' </span>'; 
    }
}
  
           // $wiersz = $rezultat->fetch_array();
             
            $id = $wiersz[3];     
             
            $rezultat->free_result();                
        
    
         echo $id;
    
     }
    $polaczenie->close();

}
 
?>

