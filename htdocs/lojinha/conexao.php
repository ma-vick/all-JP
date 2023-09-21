<?php 

$host = 'localhost';
$user = 'root';
$pass = 'root';
$dbname = 'lojinha';

try {
    $conexao = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "<p>A conexão com a base de dados falhou =(</p>";
    echo "<p>Mensagem de erro: " . $e->getMessage() . "</p>";
}

?>