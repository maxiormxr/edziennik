<?php

session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html>
<head>

  <title> EDziennik </title>
<link rel="stylesheet" href="stylestrona.css"/>
 
</head>
<body>
    <div id="container">
    
        <script type="text/javascript">
        new equalHeight();
        </script>



        <img src="Images/Logo.png" alt="" width="200" height="150" /><br />
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
    <div id="wyloguj">
        <ul>
            <li><a href="wyloguj.html">WYLOGUJ</a></li>
        </ul>

    </div>



    <div id="menu">
        <ul>
            <li><a href="aktualnosci_ucznia.php">AKTUALNOŒCI</a></li>
            <form action="wys_oceny.php" method="post">
            <li><a href="oceny_ucznia.php">OCENY</a></li>
            <li><a href="obecnosci.php">OBECNOŒCI</a></li>
            <li><a href="kalendarz.php">KALENDARZ</a></li>
            <li><a href="wiadmosci.php">WIADOMOŒCI</a></li>
            <li><a href="profile.php">PROFILE</a></li>
            <li><a href="plany_ucznia.php">PLANY</a></li>
        </ul>
    </div>

    <div id="male">
        <ol>
            <li><a >MENU</a>
                <ul >
                    <li><a href="aktualnosci_ucznia.php">AKTUALNOŒCI</a></li>
                    <li><a href="oceny_ucznia.php">OCENY </a></li>
                    <li><a href="obecnosci.php">OBECNOŒCI</a></li>
                    <li><a href="kalendarz.php">KALENDARZ</a></li>
                    <li><a href="wiadmosci.php">WIADOMOŒCI</a></li>
                    <li><a href="profile.php">PROFILE</a></li>
                    <li><a href="plany_ucznia.php">PLANY</a></li>
                </ul>
            </li>
        </ol>
    </div>

<div id="aktualnosci">
<div id="d1" class="kolumna">
<form action="dodaj.php" method="post">
<br/><textarea name="tekst" rows="10" cols="80"></textarea>

<input  type="submit" value="dodaj"/>
</div>
<?php
echo '<span style="color: #FFFFF0;">  ' . $_SESSION['tekst'] . '</span>';
    ?>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dapibus nibh risus, a malesuada nulla porta sed. Maecenas viverra suscipit augue, vitae efficitur massa pulvinar a. Duis laoreet neque nec ornare laoreet. Integer vel enim commodo, tempor massa in, vestibulum purus. Vivamus ultrices ante et tempor fringilla. Ut at venenatis sapien. Sed varius pharetra risus, pharetra egestas tellus sagittis quis.
        Etiam pellentesque porta mi sit amet vulputate. Curabitur venenatis arcu mi, non porta lorem suscipit nec. Mauris quis hendrerit diam. Aenean volutpat sollicitudin tellus, quis pharetra justo tempor eu. Nam in enim id risus tincidunt efficitur. Ut odio mi, ullamcorper quis nisl ut, egestas mollis lacus. Duis vel vulputate quam. In vehicula vel dui vitae accumsan. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla porttitor eu augue vel eleifend. Nulla et sodales erat. Praesent est sem, viverra in quam porta, mollis feugiat nisi.
        Phasellus aliquet sagittis tortor in finibus. Curabitur pulvinar condimentum varius. Curabitur bibendum dolor ac magna tempus sagittis. Vestibulum pharetra elit dapibus, cursus sem in, dapibus felis. Phasellus hendrerit, orci ac tempor accumsan, enim nibh venenatis urna, ut cursus sapien nibh vel nibh. Fusce maximus interdum mauris et porta. Nullam ultrices velit urna, id egestas tortor elementum vitae. Mauris quis lectus at dolor fringilla porttitor lacinia ut ante. Donec ullamcorper nec enim ac sodales. Cras tincidunt mi nec gravida gravida. Donec mollis dui nunc, consectetur elementum mauris interdum non. Quisque faucibus dapibus turpis at tincidunt. Phasellus aliquam posuere urna, sit amet vehicula massa luctus ac. Etiam ut orci turpis. Nullam velit tortor, suscipit sit amet ex eu, convallis viverra nisl.
        Morbi faucibus magna arcu, dictum pharetra purus congue at. Curabitur ornare, est a malesuada volutpat, lectus neque ultrices ipsum, non semper risus libero in lacus. Fusce sagittis ipsum id quam sollicitudin tincidunt. Nullam molestie, nulla nec ultrices pharetra, risus sem egestas metus, et fringilla metus tellus eget sem. Morbi ac ornare leo. Donec vitae purus mollis orci finibus finibus. Nulla fermentum, sem vel tristique auctor, diam lorem varius ligula, in viverra nisi tortor eu turpis. Sed euismod vulputate libero.
        Suspendisse non volutpat diam. Suspendisse vitae odio id ligula venenatis venenatis. Aliquam porttitor sem ac sollicitudin pretium. Suspendisse interdum, neque in porta suscipit, ipsum eros tempus quam, non faucibus nulla nulla eu augue. Nulla et tincidunt nibh. Vestibulum finibus suscipit felis. Fusce quis massa id felis fermentum dapibus. Vestibulum sodales, felis id tristique luctus, tortor massa aliquet est, et aliquam leo ipsum ultrices nisl. Cras placerat luctus dui, at porttitor leo pellentesque quis. Nullam metus eros, lobortis vel tortor at, pretium cursus nunc. Curabitur dignissim imperdiet mollis.
        </p>
    </div>  

    </div>
</body>
</html>