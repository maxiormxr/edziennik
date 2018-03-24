
<?php
session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> EDziennik </title>

<link rel="stylesheet" href="CSS/stylelogowanie.css"/>

</head>
<body>
<script type="text/javascript">
new equalHeight();
</script>

<img id="logo" src="Images/Logo.png" alt=""  /><br />

<div id="d1" class="kolumna">
<form action="zaloguj.php" method="post">
login: <br /> <input type="text" name="login"/><br />
haslo: <br /> <input type="text" name="haslo"/><br />
<input  type="submit" value="zaloguj siê"/>
</div>


<div id="d2" class="kolumna">
<img src="dziennik.gif" alt="" height="15%" width="15%" />

</div>



</form>

</body>
</html>
