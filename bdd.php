<?php

$host = "localhost";
$username = "root";
$dbname = "tp1";
$password = "";

$mysqli = new mysqli(hostname: $host, username: $username, password: $password, database: $dbname);

if ($mysqli->connect_errno){
    echo "Erreur de connection " . $mysqli->connect_error;
}
return $mysqli;