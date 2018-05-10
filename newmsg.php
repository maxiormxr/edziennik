 
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
    echo '<span style="color: #FFFFF0;"> ' . $_SESSION['login'] . '  </span>';
    echo "<a href='odbiorcza.php'>Skrzynka odbiorcza </a> &bull;  <a href='newmsg.php'>Napisz nowa wiadomosc</a> &bull;<a href='wiadomosci_ucznia.php'>wroc</a> &bull; ";

if($_POST["tresc"] && $_POST["do"] && $_POST["temat"]){
   
    $sql1 ="INSERT INTO wiadomosci SET wiad_id=NULL, wiad_tresc='".$_POST["tresc"]."',wiad_do='".$_POST["do"]."', wiad_od= ".  $_SESSION['login']." , wiad_przeczytane='0',wiad_data='NOW()', wiad_temat='".$_POST["temat"]."',wiad_czyj='0' ";
        $sql2 ="INSERT INTO wiadomosci SET wiad_id=NULL, wiad_tresc='".$_POST["tresc"]."',wiad_do='".$_POST["do"]."', wiad_przeczytane='0',wiad_data='NOW()', wiad_temat='".$_POST["temat"]."',wiad_czyj='1' ";
$result = $polaczenie->query($sql1);
$result = $polaczenie->query($sql2);
echo "<br><br>Wys³ano wiadomoœæ!<br>";
}
else if($_POST["submit"]){
echo "<br><br>Nie uzupe³niono wszystkich pól!<br>";
}
echo "<form action='newmsg.php' method=post>";
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
 