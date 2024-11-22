<?php
require_once("includes/sessao.php");
verificarSessaosql();
$host = 'localhost';
$port = '3306';
$user = 'root';
$password = '';
$database = 'PAINELDB';

$pdo = new PDO("mysql:host=$host;port=$port;dbname=$database", $user, $password);
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

if(isset($_GET['sql'])){   
    $sql = $_GET['sql'];
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // formatar resultado por coluna com br no final de cada linha
    $result = array();
    foreach($dados as $dado){
        $linha = "";
        foreach($dado as $key => $value){
            $linha .= $key.": ".$value."<br>";
        }
        array_push($result, $linha);
    }
    echo json_encode($result);

    

}
?>