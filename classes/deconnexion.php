<?php // (avec SESSION)
session_start();
// ------------------------------------------------------
// on vide/détruit les variables de session
$_SESSION = array();
$session_name = session_name();
session_destroy();
// Redirection vers le site
header("Location: ../index.php");
exit;
// ------------------------------------------------------
