<!-- msqli é menos seguro -->
<!-- PDO é mais seguro -->

<?php
$host = 'localhost';
// Endereço do servidor do banco
$db = 'financeiro';
// nome do banco de dados criado
$user = 'root';
// usuario padrao local, se for hospedado tera nome
$password = '';
// senha do banco de dados, local nao tem senha
$charset = 'utf8mb4';
// permite acentuação no banco de dados, ex. São Paulo

// data source name (contem as informaçoes para a conexão)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";


// configurando a conexao
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    // configuração do pdo para lançamento de excessoes(erros)
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    // definição do modo de busca padrao para array associativo
    PDO::ATTR_EMULATE_PREPARES => false
    // desativa a emulação do prepared statements
];

try{
    // tentar uma nova instancia da classe PDO,estabelecendo a conexao
    $pdo = new PDO($dsn, $user, $password, $options);
    // echo "<h2>Conectado com sucesso</h2>";
}
catch(PDOException $e){
    // capturar qualquer erro que apresentar um codigo/mensagem
    // echo "<h2>Falha na conexão:" . $e->getMessage(). "</h2>";
    // mensagem de erro
}



?>