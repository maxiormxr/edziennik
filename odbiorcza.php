 <?php

require_once "connect.php";
 
$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

if ($polaczenie->connect_errno!=0)
{
    echo "Error: ".$polaczenie->connect_errno;
}
else
{


if($_GET["id"]){
$usun="delete from wiadomosci where wiad_id=".$_GET["id"];
$result = $polaczenie->query($usun);
echo "Usuniêto wiadomoœæ!<br>";
}

else if($_GET["co"]){
$update="update wiadomosci set wiad_przeczytane=1 where wiad_id=".$_GET["co"];
$result = $polaczenie->query($update);

$wynik="select * from wiadomosci where wiad_id=".$_GET["co"];
$result = $polaczenie->query($wynik);
 if ($result->num_rows > 0) {
            
  while($rekord = $result->fetch_assoc())  {

$nadawca="select user_login from users where user_id=".$rekord["wiad_od"]."";

$result = $polaczenie->query($nadawca);
 if ($result->num_rows > 0) {
            
  while($rekord = $result->fetch_assoc())  {
echo "<br><br><table><tr><td>Nadawca: ".$nadawca["user_login"]."</td><td>Data: ".date("d/m/Y H:i", strtotime($rekord["wiad_data"]))."</td><td><a href='odbiorcza.php?id=".$rekord["wiad_id"]."'>usuñ</a></td></tr>";
echo "<tr><td colspan=3>".$rekord["wiad_temat"]."</td></tr>";
echo "<tr><td colspan=3>".$rekord["wiad_tresc"]."</td></tr>";
echo "</table>";
}
}
}}}

else{
$wynik1="select * from wiadomosci where wiad_do='1' and wiad_czyj=0 order by wiad_data";
$result = $polaczenie->query($wynik1);
echo "<table><tr><td>Nadawca</td><td>Temat</td><td>Data</td><td>&nbsp;</td></tr>";

if($wynik1->num_rows<1){
      while($rekord = $result->fetch_assoc())  
    echo "<tr><td colspan=4 style='text-align:center'>Nie masz ¿adnych wiadomoœci!</td></tr>";
while($rekord=$wynik->fetch_assoc){
    $nadawca="select user_login from users where user_id=".$rekord["wiad_od"];
$result = $polaczenie->query($nadawca);
 if ($result->num_rows > 0) {
            
  while($rekord = $result->fetch_assoc())  {
$kw1="";$kw2="";
if(!$rekord["wiad_przeczytane"]){$kw1="<b>";$kw2="</b>";}
echo "<tr><td>".$nadawca["user_login"]."</td><td><a href='odbiorcza.php?co=".$rekord["wiad_id"]."'>$kw1".$rekord["wiad_temat"]."$kw2</td><td>".date("d/m/Y H:i", strtotime($rekord["wiad_data"]))."</td><td><a href='odbiorcza.php?id=".$rekord["wiad_id"]."'>usuñ</a></td></tr>";
}
echo "</table>";
}
}}}
}

?>