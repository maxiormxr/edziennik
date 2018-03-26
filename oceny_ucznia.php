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

echo '<span style="color: #FFFFF0;"> Witaj ' . $_SESSION['imie_ucznia'] . ' Uczen </span>';


?>
    <div id="wyloguj">
        <ul>
            <li><a href="wyloguj.html">WYLOGUJ</a></li>
        </ul>

    </div>



    <div id="menu">
        <ul>
            <li><a href="aktualnosci_ucznia.php">AKTUALNOŒCI</a></li>
            <li><a href="oceny_ucznia.php">OCENY</a></li>
            <li><a href="obecnosci.php">OBECNOŒCI</a></li>
            <li><a href="kalendarz.php">KALENDARZ</a></li>
            <li><a href="wiadmosci.php">WIADOMOŒCI</a></li>
            <li><a href="profile.php">PROFILE</a></li>
            <li><a href="plany.php">PLANY</a></li>
        </ul>
    </div>

    <div id="male">
        <ol>
            <li><a >MENU</a>
                <ul >
                    <li><a href="aktualnosci_ucznia.php">AKTUALNOŒCI</a></li>
                    <li><a href="oceny_ucznia.php">OCENY</a></li>
                    <li><a href="obecnosci.php">OBECNOŒCI</a></li>
                    <li><a href="kalendarz.php">KALENDARZ</a></li>
                    <li><a href="wiadmosci.php">WIADOMOŒCI</a></li>
                    <li><a href="profile.php">PROFILE</a></li>
                    <li><a href="plany.php">PLANY</a></li>
                </ul>
            </li>
        </ol>
    </div>

    <div id="aktualnosci">
            <table>
            
            <tr class="header">
                <td>Imie</td>
                <td>Nazwisko</td>
                <td><?php echo '<span style="color: #FFFFF0;"> ' . $_SESSION['nazwa'] . ' </span>'; ?> </td>
               
            </tr>
            <tr>
                <td><?php echo '<span style="color: #FFFFF0;"> ' . $_SESSION['imie_ucznia'] . ' </span>'; ?> </td>
                <td><?php echo '<span style="color: #FFFFF0;"> ' . $_SESSION['nazwisko_ucznia'] . ' </span>'; ?> </td>
               <td><?php echo '<span style="color: #FFFFF0;"> ' . $_SESSION['ocena'] . ' </span>'; ?> </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            
            </table>
    </div>  

    </div>
</body>
</html>

