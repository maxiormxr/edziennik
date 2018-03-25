<?php
	require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

$query ="select * from aktualnosci order by id desc limit 0,5"; // 2

while($wykonaj = $polaczenie->query($query))
{
$naz .= '<li><a href="news.php?id='.$rekord[0].'">'.$rekord[1].'</a> Autor: '.$rekord[3].' - '.$rekord[2].'</li>'; // 3
}
	
echo '<ul>'.$rekord[0].'</ul>'; // 4
?>