<?php
// Define as credenciais de conexão com o banco de dados
$host = 'localhost';
$db = 'escola';
$user = 'root';
$password = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    // Configura o PDO para lançar exceções em caso de erro
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    // Define o modo de busca padrão para FETCH_ASSOC
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    // Desativa a emulação de prepares
    PDO::ATTR_EMULATE_PREPARES => false
];

try {
    // Cria uma nova instância de PDO para a conexão com o banco de dados
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    // Exibe uma mensagem de erro caso ocorra uma exceção
    echo "<h2>Falha na conexão:" . $e->getMessage(). "</h2>";
}
?>