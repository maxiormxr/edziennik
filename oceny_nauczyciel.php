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

echo '<span style="color: #FFFFF0;"> Witaj ' . $_SESSION['imie'] . ' Nauczyciel </span>';


?>
    <div id="wyloguj">
        <ul>
            <li><a href="wyloguj.html">WYLOGUJ</a></li>
        </ul>

    </div>



    <div id="menu">
        <ul>
            <li><a href="aktualnosci_ucznia.php">AKTUALNO�CI</a></li>
            <li><a href="oceny_ucznia.php">OCENY</a></li>
            <li><a href="obecnosci.php">OBECNO�CI</a></li>
            <li><a href="kalendarz.php">KALENDARZ</a></li>
            <li><a href="wiadmosci.php">WIADOMO�CI</a></li>
            <li><a href="profile.php">PROFILE</a></li>
            <li><a href="plany.php">PLANY</a></li>
        </ul>
    </div>

    <div id="male">
        <ol>
            <li><a >MENU</a>
                <ul >
                    <li><a href="aktualnosci_ucznia.php">AKTUALNO�CI</a></li>
                    <li><a href="oceny_ucznia.php">OCENY</a></li>
                    <li><a href="obecnosci.php">OBECNO�CI</a></li>
                    <li><a href="kalendarz.php">KALENDARZ</a></li>
                    <li><a href="wiadmosci.php">WIADOMO�CI</a></li>
                    <li><a href="profile.php">PROFILE</a></li>
                    <li><a href="plany.php">PLANY</a></li>
                </ul>
            </li>
        </ol>
    </div>

    <div id="aktualnosci">
           
             <?php
 
require_once "connect.php";
 
$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
 
if ($polaczenie->connect_errno!=0)
{
    echo "Error: ".$polaczenie->connect_errno;
}
else
{
    
    $wyb_klase = "SELECT nazwa
                FROM klasa";
                
           $result = $polaczenie->query($wyb_klase);

        if ($result->num_rows > 0) {
           //echo "<tr><td>Przemiot </td><td> Ocena </td>";
      while($row = $result->fetch_assoc()) {

        echo "<table>
        
        
        <tr><td>" . $row["nazwa"] ."
        </table>";
         
    }
}
           


                
     
    $sql = "SELECT  oceny.ocena, daneuzytkownika.imie, daneuzytkownika.nazwisko, przedmioty.nazwa
                   FROM   daneuzytkownika
                    LEFT OUTER JOIN oceny ON daneuzytkownika.id_uzytkownika=oceny.id_uzytkownika 
                INNER JOIN przedmioty ON oceny.id_przemiotu=przedmioty.id_przedmiotu
                WHERE id_przedmiotu=1";
 
   
              
           $result = $polaczenie->query($sql);

        if ($result->num_rows > 0) {
           //echo "<tr><td>Przemiot </td><td> Ocena </td>";
      while($row = $result->fetch_assoc()) {

        echo "<table>
        
        <tr><td>" . $row["nazwisko"] . "</td><td>" . $row["ocena"] . "
        </table>";
         
    }
}
  
    
     
    $polaczenie->close();
}
 
?>
      
    </div>  

    </div>
</body>
</html>
