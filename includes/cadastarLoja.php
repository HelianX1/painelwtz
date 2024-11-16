<?php
require_once("sessao.php");
if(isset($_POST['nome']) && isset($_POST['cnpj']) && isset($_POST['senha'])  ){
    require_once("../conexao/conexao.php");
    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $senha = $_POST['senha'];
    $senha = hash('sha256', $senha);
    $stmt = $pdo->prepare("INSERT INTO lojas (nome_fantasia, cnpj_cpf, senha) VALUES ('$nome', '$cnpj', '$senha')");
    $stmt->execute();
    criarSessaoLoja(
        $pdo->lastInsertId(),
        $nome,
        $cnpj,
        'admin',
        null);
    header("Location: /painelwtz/listarProduto.php");
}
?>