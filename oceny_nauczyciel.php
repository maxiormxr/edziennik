<?php


session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html>
<head>

  <title> EDziennik </title>
<link rel="stylesheet" href="style.css"/>
 
</head>
<body>
    <div id="container">
    
        <script type="text/javascript">
        new equalHeight();
        </script>



        <img src="Images/Logo.png" alt="" width="200" height="150" /><br />


<?php

echo '<span style="color: #FFFFF0;"> Witaj ' . $_SESSION['imie'] . ' Nauczyciel </span>';


?>
    <div id="wyloguj">
        <ul>
            <li><a href="wyloguj.html">WYLOGUJ</a></li>
        </ul>

    </div>



    <div id="menu">
        <ul>
            <li><a href="aktualnosci_nauczyciela.php">AKTUALNOŒCI</a></li>
            <li><a href="oceny_nauczyciel.php">OCENY</a></li>
            <li><a href="obecnosci.php">OBECNOŒCI</a></li>
            <li><a href="kalendarz.php">KALENDARZ</a></li>
            <li><a href="wiadmosci.php">WIADOMOŒCI</a></li>
            <li><a href="profile.php">PROFILE</a></li>
            <li><a href="plany_nauczyciela.php">PLANY</a></li>
        </ul>
    </div>

    <div id="male">
        <ol>
            <li><a >MENU</a>
                <ul >
                    <li><a href="aktualnosci_nauczyciela.php">AKTUALNOŒCI</a></li>
                    <li><a href="oceny_nauczyciel.php">OCENY</a></li>
                    <li><a href="obecnosci.php">OBECNOŒCI</a></li>
                    <li><a href="kalendarz.php">KALENDARZ</a></li>
                    <li><a href="wiadmosci.php">WIADOMOŒCI</a></li>
                    <li><a href="profile.php">PROFILE</a></li>
                    <li><a href="plany_nauczyciela.php">PLANY</a></li>
                </ul>
            </li>
        </ol>
    </div>

    <div id="aktualnosci">
        Wybierz klase
<form action="oceny_nauczyciel.php" method="post" id="formularz">
<select name="nazwa" onchange="document.getElementById('formularz').submit();" >
 
        <option >wybierz</option>
        <option value='1A'>1A</option>
        <option value='1B'>1B</option>

 
    </select>

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
    
    
    
     

      $spr_naucz = "SELECT przedmioty.id_przedmiotu, przedmioty.nazwa, nauczyciele_klasa_przedmiot.id_u¿ytkownika, daneuzytkownika.nazwisko, uzytkownicy.login
                    FROM nauczyciele_klasa_przedmiot
                    INNER JOIN przedmioty ON nauczyciele_klasa_przedmiot.id_przedmiotu=przedmioty.id_przedmiotu
                    INNER JOIN daneuzytkownika ON nauczyciele_klasa_przedmiot.id_u¿ytkownika=daneuzytkownika.id_uzytkownika
                    INNER JOIN uzytkownicy ON nauczyciele_klasa_przedmiot.id_u¿ytkownika=uzytkownicy.id_uzytkownika
                    WHERE login =".$_SESSION['login']. " ";
    $result = $polaczenie->query($spr_naucz);

      if($result=true)
      {
    

       (isset($_POST['nazwa'])) ? $nazwa=$_POST['nazwa'] : $nazwa='nie dokonano wyboru';
       echo "Twoj wybor to: " .$nazwa;
    
    
  
      $wyb_klase = "SELECT oceny.ocena, klasa.nazwa, daneuzytkownika.nazwisko, przedmioty.nazwa
                FROM klasa
                INNER JOIN oceny ON klasa.id_klasy=oceny.id_klasy
                INNER JOIN daneuzytkownika ON daneuzytkownika.id_uzytkownika=oceny.id_uzytkownika
                INNER JOIN przedmioty ON przedmioty.id_przedmiotu=oceny.id_przemiotu
                WHERE klasa.nazwa='$nazwa'";
                
           $result = $polaczenie->query($wyb_klase);
           if ($result->num_rows > 0) {
           //echo "<tr><td>Przemiot </td><td> Ocena </td>";
      while($row = $result->fetch_assoc()) {

        echo "<table>
        
        
        <tr><td>" . $row["ocena"] . "</td><td>" . $row["nazwisko"] . " </td><td>" . $row["nazwa"] . "
        </table>";
         
    }
}
}
    

     
    $polaczenie->close();
}
 
?>

      
    </div>  

    </div>
</body>
</html>

