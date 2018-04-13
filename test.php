<?php
require_once "connect.php";
 
$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
 
if ($polaczenie->connect_errno!=0)
{
    echo "Error: ".$polaczenie->connect_errno;
}
else
{
function checkSelected($fieldValue, $selectName) {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($fieldValue == $_POST[$selectName]) echo ' selected';
  }
}
}
?>