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
	    $sql = "SELECT * FROM uczniowie";
        
         if($rezultat =@$polaczenie->query($sql))
        {
            $ilu_userow = $rezultat->num_rows;
            if($ilu_userow>0)
            {
                $wiersz = $rezultat->fetch_assoc();
                $_SESSION['login']=$wiersz['login'];

                
				$wiersz2 = $wykonaj->fetch_assoc();
				$_SESSION['nazwisko_ucznia']=$wiersz2['nazwisko_ucznia'];
                
             
				
                $rezultat->close();
               
            }
            }
       
       
       }
?>