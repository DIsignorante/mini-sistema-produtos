<?php
$host = 'db'; // Nome do serviço no docker-compose
$dbname = 'sistema_db';
$user = 'root';
$pass = 'rootpassword';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
?>