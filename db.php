<?php
$servername = 'localhost';
$username = 'root'; // était 'test'
$password = ''; // était 'test-VIG'
$database = 'vigenere'; // était 'vigenere'
try{
        $db = new PDO('mysql:host='.$servername.';dbname='.$database.';charset=utf8', $username, $password);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>

