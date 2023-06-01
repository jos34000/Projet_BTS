<?php
//Fermeture de la session
session_start();
session_destroy(); /* détruire la session */
header("location:index.php");
?>