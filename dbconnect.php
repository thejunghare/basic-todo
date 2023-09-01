<?php
$servername = "localhost";
$username = "root";
$password = "";

try{
    $con = new PDO("mysql:host=$servername;dbname=thejunghare", $username, $password);
    $con->setAttribute(PDO::ATTER_ERRMODE, PDO::ERRMODE_EXCPTION);
    echo"Connected successfully";
} catch(PDOException $e){
    echo "connection failed:". $e->getMessage();
}
?>