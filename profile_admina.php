<?php


session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html>
<head>

  <title> EDziennik </title>
<link rel="stylesheet" href="style_oceny.css"/>
 
</head>
<body>
    <div id="container">
    
        <script type="text/javascript">
        new equalHeight();
        </script>



        <img src="Images/Logo.png" alt="" width="200" height="150" /><br />


<?php

echo '<span style="color: #FFFFF0;"> Witaj ' . $_SESSION['imie'] . '  </span>';


?>
    <div id="wyloguj">
        <ul>
            <li><a href="wyloguj.html">WYLOGUJ</a></li>
        </ul>

    </div>



    <div id="menu">
        <ul>
            <li><a href="aktualnosci_admina.php">AKTUALNOŒCI</a></li>
            <li><a href="oceny_admina.php">OCENY</a></li>
            <li><a href="obecnosci_admina.php">OBECNOŒCI</a></li>
            <li><a href="kalendarz_admina.php">KALENDARZ</a></li>
            <li><a href="wiadmosci_admina.php">WIADOMOŒCI</a></li>
            <li><a href="profile_admina.php">PROFILE</a></li>
            <li><a href="plany_admina.php">PLANY</a></li>
        </ul>
    </div>

    <div id="male">
        <ol>
            <li><a >MENU</a>
                <ul >
                    <li><a href="aktualnosci_admina.php">AKTUALNOŒCI</a></li>
                    <li><a href="oceny_admina.php">OCENY</a></li>
                    <li><a href="obecnosci_admina.php">OBECNOŒCI</a></li>
                    <li><a href="kalendarz_admina.php">KALENDARZ</a></li>
                    <li><a href="wiadmosci_admina.php">WIADOMOŒCI</a></li>
                    <li><a href="profile_admina.php">PROFILE</a></li>
                    <li><a href="plany_admina.php">PLANY</a></li>
                </ul>
            </li>
        </ol>
    </div>

<div id="aktualnosci">
   
    
      

 
 
<form action="profile_admina.php" method="post"> 
login:<br /> 
<input type="text" name="login" /><br /> 
e-mail:<br /> 
<input type="text" name="haslo" /><br /> 


<p>Podaj role:</p>

<input type="radio" name="rola" value="1" />1
<input type="radio" name="rola" value="2" />2
<br />
<input type="radio" name="rodzaj"  value='Uczen'/>Uczen
<input type="radio" name="rodzaj" value='Nauczyciel'/>Nauczyciel
<br />
Imie <input name="imie" /><br />
Nazwisko <input name="nazwisko" /><br />
Adres <input name="adres" /><br />
Nr domu <input name="nrdomu" /><br />
Miasto <input name="miasto" /><br />
Pesel <input name="pesel" />

<input type="submit" value="dodaj" /> 
</form>

</form>


        
              
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
      var_dump($_SESSION['id_uzytkownika']);
 
   TO NIE DZIALA DOBRZE !!!
   $sql2="INSERT INTO daneuzytkownika SET id_uzytkownika=".$_SESSION['id_uzytkownika']. ", imie='$imie', nazwisko='$nazwisko', adres='$adres' , nrdomu='$nrdomu', miasto='$miasto', pesel='$pesel'";
      $result3 = $polaczenie->query($sql2);
      
  
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
  
    
     
    $polaczenie->close();
}
 
?>

            </tr>
          
            
            </table>
    </div>  

    </div>
</body>
</html>

