<?php
$host = "localhost"; 
$username = "root";
$password = "anazwa123";
$dbname = "rumahsakit";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>
