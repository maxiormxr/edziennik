<?php 

session_start();
	

	require_once "connect.php";
    	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
 echo "Error:".$polaczenie->connect_errno;

    }else
    {
   
    
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $tekst = $_POST['tekst'];
        
 
        $sql="SELECT * FROM uczniowie AND nauczyciele WHERE imie='$imie' AND nazwisko='$nazwisko' ";
        
        //$zapytanie = "INSERT INTO aktualnosci (imie, nazwisko, tekst) VALUES ('$imie','$nazwisko','$tekst')" or die(mysql_error());
        
        $wykonaj = $polaczenie->query($sql);
     // $wykonaj = $polaczenie->query($zapytanie);
        header('Location:aktualnosci.php');
    }
 
$polaczenie->close();    

?>