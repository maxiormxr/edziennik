  
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
    echo "<a href='odbiorcza.php'>Skrzynka odbiorcza </a> &bull;  <a href='newmsg.php'>Napisz nowa wiadomosc</a> &bull;<a href='wiadomosci_ucznia.php'>wroc</a> &bull; ";
    

if($_GET["id"]){
    $sql="delete from wiadomosci where wiad_id=".$_GET["id"];
    $polaczenie->query($sql);
echo "Usuniêto wiadomoœæ!<br>";
}

else if($_GET["co"]){
    
$update="update wiadomosci set wiad_przeczytane=1 where wiad_id=".$_GET["co"];
$polaczenie->query($update);

$wynik="select * from wiadomosci where wiad_id=".$_GET["co"];
   $polaczenie->query($wynik);

//$rekord=mysql_fetch_array($wynik);
    $result = $polaczenie->query($wynik);

        if ($result->num_rows > 0) {
while($rekord = $result->fetch_assoc()) {

    $sql2="select user_login from users where user_id=".$rekord["wiad_od"];

 $result2 = $polaczenie->query($sql2);

        if ($result2->num_rows > 0) {
while($rekord = $result2->fetch_assoc()) {
//$nadawca=mysql_fetch_array($sql2="select user_login from users where user_id=".$rekord["wiad_od"]);

echo "<br><br><table><tr><td>Nadawca: ".$result2["user_login"]."</td><td>Data: ".date("d/m/Y H:i", strtotime($rekord["wiad_data"]))."</td><td><a href='odbiorcza.php?id=".$rekord["wiad_id"]."'>usuñ</a></td></tr>";
echo "<tr><td colspan=3>".$rekord["wiad_temat"]."</td></tr>";
echo "<tr><td colspan=3>".$rekord["wiad_tresc"]."</td></tr>";
echo "</table>";
}}}
}}
else{
$wynik="select wiad_id,wiad_tresc,wiad_od,wiad_do,wiad_przeczytane,wiad_data,wiad_temat,wiad_czyj, uzytkownicy.id_uzytkownika from wiadomosci 
INNER JOIN uzytkownicy ON uzytkownicy.id_uzytkownika=wiadomosci.wiad_od
where wiadomosci.wiad_od=uzytkownicy.id_uzytkownika and wiad_czyj=0 order by wiad_data";

echo "<table><tr><td>Nadawca</td><td>Temat</td><td>Data</td><td>&nbsp;</td></tr>";



  if(!$rezultat =@$polaczenie->query($wynik))
        {
            $rezultat->num_rows;
            echo "<tr><td colspan=4 style='text-align:center'>Nie masz ¿adnych wiadomoœci!</td></tr>";
}

    $result = $polaczenie->query($wynik);

        if ($result->num_rows > 0) {
while($rekord = $result->fetch_assoc()) {

    
         
    
 echo "<table>
        
        
        <tr><td>" . $rekord["wiad_od"] . "</td>
        </table>";
$nadawca->fetch_array($sql3="select user_login from users where user_id=".$rekord["wiad_od"]);
$kw1="";$kw2="";
if(!$rekord["wiad_przeczytane"]){$kw1="<b>";$kw2="</b>";}
echo "<tr><td>".$nadawca["user_login"]."</td><td><a href='odbiorcza.php?co=".$rekord["wiad_id"]."'>$kw1".$rekord["wiad_temat"]."$kw2</td><td>".date("d/m/Y H:i", strtotime($rekord["wiad_data"]))."</td><td><a href='odbiorcza.php?id=".$rekord["wiad_id"]."'>usuñ</a></td></tr>";
}
echo "</table>";
}


}}

?>
