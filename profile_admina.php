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
   
    
      


 
<form action="profile.php" method="post"> 
login:<br /> 
<input type="text" name="login" /><br /> 
haslo:<br /> 
<input type="text" name="haslo" /><br /> 


<p>Podaj role:</p>
<input type="radio" name="rola" value="1" />1
<input type="radio" name="rola" value="2" />2
<br />
<input type="radio" name="rodzaj"  value='Uczen'/>Uczen
<input type="radio" name="rodzaj" value='Nauczyciel'/>Nauczyciel
<br />
<input name="imie" />Imie<br /> 
<input name="nazwisko" />Nazwisko<br />
 <input name="adres" />Adres<br />
<input name="nrdomu" />Nr domu <br />
 <input name="miasto" />Miasto<br />
 <input name="pesel" />Pesel
<br />
<input type="submit" value="dodaj" /> 
</form>



        
 

            </tr>
          
            
            </table>
    </div>  

    </div>
</body>
</html>

