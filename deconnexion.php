
<?php /*
session_start(); 
$_SESSION = array(); // On vide toute les variables de session
session_destroy();
header("Location:connexion.php");
*/?> 
<?php
   session_start();
   $_SESSION = array(); // on vide toute les variables de session
   	// On expire le cookie de session
	setcookie("COOKIE","id",time()-1);
   // Finally, destroy the session.
   session_destroy();
   header('Location:connexion.php');
?>
