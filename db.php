<?php
$servername = "localhost";
$username = "root";
$password = "justin12";
$dbname = "forum";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connexion réussie";
} catch(PDOException $e) {
    echo "Connexion échouée: " . $e->getMessage();
}
?>