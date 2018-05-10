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

//echo '<span style="color: #FFFFF0;"> Witaj ' . $_SESSION['imie'] . ' Nauczyciel </span>';


?>
    <div id="wyloguj">
        <ul>
            <li><a href="wyloguj.html">WYLOGUJ</a></li>
        </ul>

    </div>



    <div id="menu">
        <ul>
            <li><a href="aktualnosci_nauczyciela.php">AKTUALNO?CI</a></li>
            <li><a href="oceny_nauczyciel.php">OCENY</a></li>
            <li><a href="obecnosci.php">OBECNO?CI</a></li>
            <li><a href="kalendarz.php">KALENDARZ</a></li>
            <li><a href="wiadmosci.php">WIADOMO?CI</a></li>
            <li><a href="profile.php">PROFILE</a></li>
            <li><a href="plany_nauczyciela.php">PLANY</a></li>
        </ul>
    </div>

    <div id="male">
        <ol>
            <li><a >MENU</a>
                <ul >
                    <li><a href="aktualnosci_nauczyciela.php">AKTUALNO?CI</a></li>
                    <li><a href="oceny_nauczyciel.php">OCENY</a></li>
                    <li><a href="obecnosci.php">OBECNO?CI</a></li>
                    <li><a href="kalendarz.php">KALENDARZ</a></li>
                    <li><a href="wiadmosci.php">WIADOMO?CI</a></li>
                    <li><a href="profile.php">PROFILE</a></li>
                    <li><a href="plany_nauczyciela.php">PLANY</a></li>
                </ul>
            </li>
        </ol>
    </div>

    <div id="aktualnosci">
        <!-- Wybierz klase
<form action="plany.php" method="post" id="formularz">
<select name="nazwa" onchange="document.getElementById('formularz').submit();" >
 
        <option >wybierz</option>
        <option value='1'>1A</option>
        <option value='2'>1B</option>

 
    </select>

</form> -->


<?php
 
require_once "connect.php";
 
$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
 
if ($polaczenie->connect_errno!=0)
{
    echo "Error: ".$polaczenie->connect_errno;
}
else
{

    $id_klasy_ucznia_sql = "SELECT fk_id_klasy 
    FROM uczen INNER JOIN uzytkownicy ON uczen.fk_id_uzytkownika = uzytkownicy.id_uzytkownika
    WHERE uzytkownicy.login='$_SESSION[login]'";

    $result = $polaczenie->query($id_klasy_ucznia_sql);
    $id_klasy_ucznia = $result->fetch_assoc();

    //var_dump($id_klasy_ucznia);

    
    $zapytanie_o_plan = "SELECT lekcja.dzien_tygodnia, lekcja.czas_rozpoczecia, lekcja.czas_zakonczenia, przedmioty.nazwa 
    FROM `lekcja` INNER JOIN przedmioty ON lekcja.fk_id_przedmiotu = przedmioty.id_przedmiotu 
    WHERE fk_id_klasy = '$id_klasy_ucznia[fk_id_klasy]'";
    
    


                
    $result = $polaczenie->query($zapytanie_o_plan);
    if ($result->num_rows > 0) {

        $poniedzialek = array("","","","","","");
        $wtorek = array("","","","","","");
        $sroda = array("","","","","","");
        $czwartek = array("","","","","","");
        $piatek = array("","","","","","");

        
        while($row = $result->fetch_assoc()) {

        if ($row["dzien_tygodnia"]=="poniedzialek" && $row["czas_rozpoczecia"]=="08:00:00")
        {
            $poniedzialek[0] = $row["nazwa"];
        }
        if ($row["dzien_tygodnia"]=="poniedzialek" && $row["czas_rozpoczecia"]=="09:00:00")
        {
            $poniedzialek[1] = $row["nazwa"];
        }
        if ($row["dzien_tygodnia"]=="poniedzialek" && $row["czas_rozpoczecia"]=="10:00:00")
        {
            $poniedzialek[2] = $row["nazwa"];
        }
        if ($row["dzien_tygodnia"]=="poniedzialek" && $row["czas_rozpoczecia"]=="11:00:00")
        {
            $poniedzialek[3] = $row["nazwa"];
        }
        if ($row["dzien_tygodnia"]=="poniedzialek" && $row["czas_rozpoczecia"]=="12:00:00")
        {
            $poniedzialek[4] = $row["nazwa"];
        }
        if ($row["dzien_tygodnia"]=="poniedzialek" && $row["czas_rozpoczecia"]=="13:00:00")
        {
            $poniedzialek[5] = $row["nazwa"];
        }

        if ($row["dzien_tygodnia"]=="wtorek" && $row["czas_rozpoczecia"]=="08:00:00")
        {
            $wtorek[0] = $row["nazwa"];
        }
        if ($row["dzien_tygodnia"]=="wtorek" && $row["czas_rozpoczecia"]=="09:00:00")
        {
            $wtorek[1] = $row["nazwa"];
        }
        if ($row["dzien_tygodnia"]=="wtorek" && $row["czas_rozpoczecia"]=="10:00:00")
        {
            $wtorek[2] = $row["nazwa"];
        }
        if ($row["dzien_tygodnia"]=="wtorek" && $row["czas_rozpoczecia"]=="11:00:00")
        {
            $wtorek[3] = $row["nazwa"];
        }
        if ($row["dzien_tygodnia"]=="wtorek" && $row["czas_rozpoczecia"]=="12:00:00")
        {
            $wtorek[4] = $row["nazwa"];
        }
        if ($row["dzien_tygodnia"]=="wtorek" && $row["czas_rozpoczecia"]=="13:00:00")
        {
            $wtorek[5] = $row["nazwa"];
        }

        if ($row["dzien_tygodnia"]=="sroda" && $row["czas_rozpoczecia"]=="08:00:00")
        {
            $sroda[0] = $row["nazwa"];
        }
        if ($row["dzien_tygodnia"]=="sroda" && $row["czas_rozpoczecia"]=="09:00:00")
        {
            $sroda[1] = $row["nazwa"];
        }
        if ($row["dzien_tygodnia"]=="sroda" && $row["czas_rozpoczecia"]=="10:00:00")
        {
            $sroda[2] = $row["nazwa"];
        }
        if ($row["dzien_tygodnia"]=="sroda" && $row["czas_rozpoczecia"]=="11:00:00")
        {
            $sroda[3] = $row["nazwa"];
        }
        if ($row["dzien_tygodnia"]=="sroda" && $row["czas_rozpoczecia"]=="12:00:00")
        {
            $sroda[4] = $row["nazwa"];
        }
        if ($row["dzien_tygodnia"]=="sroda" && $row["czas_rozpoczecia"]=="13:00:00")
        {
            $sroda[5] = $row["nazwa"];
        }

        if ($row["dzien_tygodnia"]=="czwartek" && $row["czas_rozpoczecia"]=="08:00:00")
        {
            $czwartek[0] = $row["nazwa"];
        }
        if ($row["dzien_tygodnia"]=="czwartek" && $row["czas_rozpoczecia"]=="09:00:00")
        {
            $czwartek[1] = $row["nazwa"];
        }
        if ($row["dzien_tygodnia"]=="czwartek" && $row["czas_rozpoczecia"]=="10:00:00")
        {
            $czwartek[2] = $row["nazwa"];
        }
        if ($row["dzien_tygodnia"]=="czwartek" && $row["czas_rozpoczecia"]=="11:00:00")
        {
            $czwartek[3] = $row["nazwa"];
        }
        if ($row["dzien_tygodnia"]=="czwartek" && $row["czas_rozpoczecia"]=="12:00:00")
        {
            $czwartek[4] = $row["nazwa"];
        }
        if ($row["dzien_tygodnia"]=="czwartek" && $row["czas_rozpoczecia"]=="13:00:00")
        {
            $czwartek[5] = $row["nazwa"];
        }

        if ($row["dzien_tygodnia"]=="piatek" && $row["czas_rozpoczecia"]=="08:00:00")
        {
            $piatek[0] = $row["nazwa"];
        }
        if ($row["dzien_tygodnia"]=="piatek" && $row["czas_rozpoczecia"]=="09:00:00")
        {
            $piatek[1] = $row["nazwa"];
        }
        if ($row["dzien_tygodnia"]=="piatek" && $row["czas_rozpoczecia"]=="10:00:00")
        {
            $piatek[2] = $row["nazwa"];
        }
        if ($row["dzien_tygodnia"]=="piatek" && $row["czas_rozpoczecia"]=="11:00:00")
        {
            $piatek[3] = $row["nazwa"];
        }
        if ($row["dzien_tygodnia"]=="piatek" && $row["czas_rozpoczecia"]=="12:00:00")
        {
            $piatek[4] = $row["nazwa"];
        }
        if ($row["dzien_tygodnia"]=="piatek" && $row["czas_rozpoczecia"]=="13:00:00")
        {
            $piatek[5] = $row["nazwa"];
        }

        }

}

    

     
    $polaczenie->close();
}
?>
  
  <table style='width: 100%;' border='1'>
        <tbody>
        <tr>
        <td style='width: 10%;'>Godzina</td>
        <td style='width: 18%;'>Poniedzia³ek</td>
        <td style='width: 18%;'>Wtorek</td>
        <td style='width: 18%;'>Œroda</td>
        <td style='width: 18%;'>Czwartek</td>
        <td style='width: 18%;'>Pi¹tek</td>
        </tr>
        <tr>
        <td>8:00<br>8:45</td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $poniedzialek[0];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                    echo $wtorek[0];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $sroda[0];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $czwartek[0];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $piatek[0];
            ?>
        </td>
        </tr>
        <tr>
        <td>9:00<br>9:45</td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $poniedzialek[1];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $wtorek[1];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $sroda[1];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $czwartek[1];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $piatek[1];
            ?>
        </td>
        </tr>
        <tr>
        <td>10:00<br>10:45</td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $poniedzialek[2];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $wtorek[2];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $sroda[2];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $czwartek[2];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $piatek[2];
            ?>
        </td>
        </tr>
        <tr>
        <td>11:00<br>11:45</td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $poniedzialek[3];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $wtorek[3];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $sroda[3];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $czwartek[3];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $piatek[3];
            ?>
        </td>
        </tr>
        <tr>
        <td>12:00<br>12:45</td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $poniedzialek[4];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $wtorek[4];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $sroda[4];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $czwartek[4];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $piatek[4];
            ?>
        </td>
        </tr>
        <tr>
        <td>13:00<br>13:45</td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $poniedzialek[5];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $wtorek[5];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $sroda[5];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $czwartek[5];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                echo $piatek[5];
            ?>
        </td>
        </tr>
        </tbody>
        </table>

      
    </div>  

    </div>
</body>
</html>

