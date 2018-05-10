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
    <div id="wyloguj">
        <ul>
            <li><a href="wyloguj.html">WYLOGUJ</a></li>
        </ul>

    </div>
<script type="text/javascript">
<!--
function dodaj(pole){
    var znacznik = document.createElement('textarea' );
    znacznik.cols="100";
    znacznik.style.backgroundImage ="url('Images/tla/tlopodtekst.png')";
    znacznik.setAttribute('type', 'text');
    znacznik.setAttribute('name', 'cos[]');
		var pole = document.getElementById(pole);
	pole.appendChild(znacznik);
    }
    
    </script>

<?php

echo '<span style="color: #FFFFF0;"> Witaj ' . $_SESSION['imie'] . '  </span>';
echo '<span style="color: #FFFFF0;">  ' . $_SESSION['nazwisko'] . ' Uczen </span>';


?>




<div id="menu">
        <ul>
            <li><a href="aktualnosci_ucznia.php">AKTUALNOŒCI</a></li>
            <li><a href="oceny_ucznia.php">OCENY</a></li>
            <li><a href="obecnosci.php">OBECNOŒCI</a></li>
            <li><a href="kalendarz.php">KALENDARZ</a></li>
            <li><a href="wiadomosci_ucznia.php">WIADOMOŒCI</a></li>
            <li><a href="profile.php">PROFILE</a></li>
            <li><a href="plany_ucznia.php">PLANY</a></li>
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
                    <li><a href="wiadomosci_ucznia.php">WIADOMOŒCI</a></li>
                    <li><a href="profile.php">PROFILE</a></li>
                    <li><a href="plany_ucznia.php">PLANY</a></li>
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
 
     $sql = "SELECT wiad_id FROM wiadomosci
INNER JOIN uzytkownicy ON uzytkownicy.id_uzytkownika=wiadomosci.wiad_od
where wiad_przeczytane=0 and wiad_do=".$_SESSION["id_uzytkownika"]." and wiad_czyj=0";
 
   
      if($rezultat =@$polaczenie->query($sql))
        {
             $rezultat->num_rows;
             
          
          }




    echo "<a href='odbiorcza.php'>Skrzynka odbiorcza </a> &bull; ".$_SESSION['login']." ";

if($_POST["tresc"] && $_POST["do"] && $_POST["temat"]){
   
    $sql1 ="INSERT INTO wiadomosci SET wiad_id=NULL, wiad_tresc='".$_POST["tresc"]."',wiad_do='".$_POST["do"]."', wiad_od= ".$_SESSION['login']." , wiad_przeczytane='0',wiad_data='NOW()', wiad_temat='".$_POST["temat"]."',wiad_czyj='0' ";
        $sql2 ="INSERT INTO wiadomosci SET wiad_id=NULL, wiad_tresc='".$_POST["tresc"]."',wiad_do='".$_POST["do"]."', wiad_przeczytane='0',wiad_data='NOW()', wiad_temat='".$_POST["temat"]."',wiad_czyj='1' ";
$result = $polaczenie->query($sql1);
$result = $polaczenie->query($sql2);
echo "<br><br>Wys³ano wiadomoœæ!<br>";
}
else if($_POST["submit"]){
echo "<br><br>Nie uzupe³niono wszystkich pól!<br>";
}
echo "<form action='wiadomosci_ucznia.php' method=post>";
echo "<br>Temat: <input name=temat size=30>";
echo "<br>Do kogo: <select name=do>";

$wynik="select login, id_uzytkownika from uzytkownicy order by login";

   $result = $polaczenie->query($wynik);

        if ($result->num_rows > 0) {
            
  while($rekord = $result->fetch_assoc())  {
echo "<option value=".$rekord["id_uzytkownika"].">".$rekord["login"];
}
}
echo "</select><br>";
echo "Tresc: <br><textarea name='tresc' rows=8 cols=50></textarea>";
echo "<br><input type=submit value='wyslij wiadomoœæ' name=submit>";

}

?>