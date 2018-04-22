 <head>
 
  <?php

require_once "connect.php";
 
$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

if ($polaczenie->connect_errno!=0)
{
    echo "Error: ".$polaczenie->connect_errno;
}
else
{

       $login = $_POST['login']; 
    $haslo = $_POST['haslo']; 
     
     $rola = $_POST['rola'];
     $rodzaj=$_POST['rodzaj'];
     $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko']; 
     
    $adres = $_POST['adres']; 
    $nrdomu = $_POST['nrdomu']; 
    $miasto = $_POST['miasto']; 
    $pesel = $_POST['pesel']; 

 
    $sql="INSERT INTO uzytkownicy SET login='$login', haslo='$haslo', rola='$rola' , rodzaj='$rodzaj'";
   
 $sql1="Select id_uzytkownika, login, haslo FROM uzytkownicy WHERE login='$login'  ";
 
    
  $result = $polaczenie->query($sql);
   
  $result2 = $polaczenie->query($sql1);
 
   
 
   $wiersz = $result2->fetch_assoc();
      $_SESSION['id_uzytkownika']=$wiersz['id_uzytkownika'];
   
 

   $sql2="INSERT INTO daneuzytkownika SET id_uzytkownika=".$_SESSION['id_uzytkownika']. ", imie='$imie', nazwisko='$nazwisko', adres='$adres' , nrdomu='$nrdomu', miasto='$miasto', pesel='$pesel'";
      $result3 = $polaczenie->query($sql2);
          
     
    if($polaczenie) echo "dane zostaly dodane poprawnie"; 
    else echo "B³¹d nie uda³o siê dodaæ nowego rekordu"; 
     

  
/**
 *               
 *            $result = $polaczenie->query($sql);

 *         if ($result->num_rows > 0) {
 *            //echo "<tr><td>Przemiot </td><td> Ocena </td>";
 *       while($row = $result->fetch_assoc()) {

 *         echo "<table>
 *         
 *         
 *         <tr><td>" . $row["nazwa"] . "</td><td>" . $row["ocena"] . "
 *         </table>";
 *          
 *     }
 * }
 */
  }
    
     
    $polaczenie->close();

 
?>
  
 <form action="profile_admina.php" method="post">
 <input type="submit" value="wroc" /> 
 </head>