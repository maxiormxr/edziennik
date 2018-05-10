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
            <li><a href="aktualnosci_ucznia.php">AKTUALNO�CI</a></li>
            <li><a href="oceny_ucznia.php">OCENY</a></li>
            <li><a href="obecnosci.php">OBECNO�CI</a></li>
            <li><a href="kalendarz.php">KALENDARZ</a></li>
            <li><a href="wiadmosci.php">WIADOMO�CI</a></li>
            <li><a href="profile.php">PROFILE</a></li>
            <li><a href="plany_ucznia.php">PLANY</a></li>
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
                    <li><a href="plany_ucznia.php">PLANY</a></li>
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
        
        while($row = $result->fetch_assoc()) {

        $plan[$row['dzien_tygodnia']][$row['czas_rozpoczecia']]=$row['nazwa'];
        
    }

}

    
        //var_dump($plan);

     
    $polaczenie->close();


}
?>

  <table style='width: 100%;' border='1'>
        <tbody>
        <tr>
        <td style='width: 10%;'>Godzina</td>
        <td style='width: 18%;'>Poniedziałek</td>
        <td style='width: 18%;'>Wtorek</td>
        <td style='width: 18%;'>Środa</td>
        <td style='width: 18%;'>Czwartek</td>
        <td style='width: 18%;'>Piątek</td>
        </tr>
        <tr>
        <td>8:00<br>8:45</td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                //echo $poniedzialek[0];
                if (isset($plan['poniedzialek']['08:00:00']))
                    echo $plan['poniedzialek']['08:00:00'];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                if (isset($plan['wtorek']['08:00:00']))
                    echo $plan['wtorek']['08:00:00'];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                if(isset($plan['sroda']['08:00:00']))
                    echo $plan['sroda']['08:00:00'];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                if(isset($plan['czwartek']['08:00:00']))
                    echo $plan['czwartek']['08:00:00'];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                if(isset($plan['piatek']['08:00:00']))
                    echo $plan['piatek']['08:00:00'];
            ?>
        </td>
        </tr>
        <tr>
        <td>9:00<br>9:45</td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                if(isset($plan['poniedzialek']['09:00:00']))                
                    echo $plan['poniedzialek']['09:00:00'];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
            if(isset($plan['wtorek']['09:00:00']))    
                echo $plan['wtorek']['09:00:00'];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                if(isset($plan['sroda']['09:00:00']))                 
                    echo $plan['sroda']['09:00:00'];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                if(isset($plan['czwartek']['09:00:00']))
                    echo $plan['czwartek']['09:00:00'];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                if(isset($plan['piatek']['09:00:00']))
                    echo $plan['piatek']['09:00:00'];
            ?>
        </td>
        </tr>
        <tr>
        <td>10:00<br>10:45</td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                //echo $poniedzialek[0];
                if(isset($plan['poniedzialek']['10:00:00']))
                    echo $plan['poniedzialek']['10:00:00'];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                if(isset($plan['wtorek']['10:00:00']))
                    echo $plan['wtorek']['10:00:00'];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                if(isset($plan['sroda']['10:00:00']))
                    echo $plan['sroda']['10:00:00'];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                if(isset($plan['czwartek']['10:00:00']))
                    echo $plan['czwartek']['10:00:00'];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                if(isset($plan['piatek']['10:00:00']))
                    echo $plan['piatek']['10:00:00'];
            ?>
        </td>
        </tr>
        <tr>
        <td>11:00<br>11:45</td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                if(isset($plan['poniedzialek']['11:00:00']))
                    echo $plan['poniedzialek']['11:00:00'];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                if(isset($plan['wtorek']['11:00:00']))
                    echo $plan['wtorek']['11:00:00'];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                if(isset($plan['sroda']['11:00:00']))
                    echo $plan['sroda']['11:00:00'];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                if(isset($plan['czwartek']['11:00:00']))
                    echo $plan['czwartek']['11:00:00'];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                if(isset($plan['piatek']['11:00:00']))
                    echo $plan['piatek']['11:00:00'];
            ?>
        </td>
        </tr>
        <tr>
        <td>12:00<br>12:45</td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                //echo $poniedzialek[0];
                if(isset($plan['poniedzialek']['12:00:00']))
                    echo $plan['poniedzialek']['12:00:00'];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                if(isset($plan['wtorek']['12:00:00']))
                    echo $plan['wtorek']['12:00:00'];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                if(isset($plan['sroda']['12:00:00']))
                    echo $plan['sroda']['12:00:00'];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                if(isset($plan['czwartek']['12:00:00']))
                    echo $plan['czwartek']['12:00:00'];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                if(isset($plan['piatek']['12:00:00']))
                    echo $plan['piatek']['12:00:00'];
            ?>
        </td>
        </tr>
        <tr>
        <td>13:00<br>13:45</td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                if(isset($plan['poniedzialek']['13:00:00']))
                    echo $plan['poniedzialek']['13:00:00'];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                if(isset($plan['wtorek']['13:00:00']))
                    echo $plan['wtorek']['13:00:00'];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                if(isset($plan['sroda']['13:00:00']))
                    echo $plan['sroda']['13:00:00'];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                if(isset($plan['czwartek']['13:00:00']))
                    echo $plan['czwartek']['13:00:00'];
            ?>
        </td>
        <td>
            <?php
//tu bedzie odwolanie do tablicy zawierajacej nazwe przedmiotu
                if(isset($plan['piatek']['13:00:00']))
                    echo $plan['piatek']['13:00:00'];
            ?>
        </td>
        </tr>
        </tbody>
        </table>

      
    </div>  

    </div>
</body>
</html>

