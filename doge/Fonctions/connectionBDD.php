<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=GiveMeCryptos;charset=utf8', 'USERNAME', 'PASSWORD');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e)
{
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}
?>