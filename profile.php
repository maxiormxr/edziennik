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

    $login = $_POST['login_uzytkownika']; 
    $haslo = $_POST['haslo_uzytkownika'];  
    $rola = $_POST['rola_uzytkownika'];
    $rodzaj=$_POST['rodzaj_uzytkownika'];
    $imie = $_POST['imie_uzytkownika'];
    $nazwisko = $_POST['nazwisko_uzytkownika'];      
    $adres = $_POST['adres_uzytkownika']; 
    $nrdomu = $_POST['nrdomu_uzytkownika']; 
    $miasto = $_POST['miasto_uzytkownika']; 
    $pesel = $_POST['pesel_uzytkownika']; 

 
    $sql="INSERT INTO uzytkownicy SET login='$login', haslo='$haslo', rola='$rola' , rodzaj='$rodzaj'";

 
    
    $result = $polaczenie->query($sql);
    // dotad dziala
    $sql1="SELECT id_uzytkownika, login, haslo FROM uzytkownicy WHERE login='$login'";
   
    $result2 = $polaczenie->query($sql1);
 
   
 
    $wiersz = $result2->fetch_assoc();

    var_dump($_POST);

    //$_SESSION['id_uzytkownika']=$wiersz['id_uzytkownika'];
    $id_wprowadzanego_uzytkownika = $wiersz['id_uzytkownika'];

 

    $sql2="INSERT INTO daneuzytkownika SET id_uzytkownika='$id_wprowadzanego_uzytkownika', imie='$imie', nazwisko='$nazwisko', adres='$adres', nrdomu='$nrdomu', miasto='$miasto', pesel='$pesel'";
    $result3 = $polaczenie->query($sql2);

    var_dump($sql2);
    var_dump($result3);
          
     
    if($polaczenie) echo "dane zostaly dodane poprawnie"; 
    else echo "B��d nie uda�o si� doda� nowego rekordu"; 
     

  
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