<?php
//Connection à la base de données
try
{
	$cn=mysqli_connect('localhost','root','','projet_bts') ;
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>