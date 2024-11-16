<?php
require_once("sessao.php");
if(isset($_POST['nome']) && isset($_POST['Username']) && isset($_POST['senha'])  ){
    require_once("../conexao/conexao.php");
    $nome = $_POST['nome'];
    $login = $_POST['Username'];
    $senha = $_POST['senha'];
    $senha = hash('sha256', $senha);
    $id_loja = $_SESSION['id_loja'];
    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, login, senha, cargo , id_loja) VALUES ('$nome', '$login', '$senha','funcionario',  '$id_loja')");
    $stmt->execute();
    header("Location: /painelwtz/listarProduto.php");
}
else{
    echo "Preencha todos os campos";
}
?>