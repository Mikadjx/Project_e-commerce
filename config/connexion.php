
<!--Connexion avec la base de donnée PHP ADMIN en PDO -->

<?php

try {

$access=new PDO("mysql:host=localhost;dbname=monoshop;charset=utf8", "root","");

$access->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

} catch (Exception $e) 
{

    $e->getMessage();
}
?>