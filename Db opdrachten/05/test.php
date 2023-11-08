<?php


include_once("dbdata.php");


$conn = new mysqli($databaseServer, $user, $password, $schema);
if ($conn->connect_error) 
{
    die("error try again". $conn->connect_error);
}

echo "connected to database\r\n";
$conn->close();


?>