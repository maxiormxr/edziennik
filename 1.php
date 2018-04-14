<?php

require_once "connect.php";
 
$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
 
if ($polaczenie->connect_errno!=0)
{
    echo "Error: ".$polaczenie->connect_errno;
}
else
{
    
    $wyb_klase = "SELECT nazwa
                FROM klasa";
                
                
                 //$result1 = $polaczenie->query($wyb_klase);

      
        echo " <form><select>";
      while($row->fetch_row($wyb_klase)) {

                
            
              
             //echo "<option value='" .$row['nazwa']. "'>" .$row[1]." </option>";
                  
}
echo "</select></form>";
    
    $polaczenie->close();
}


?>