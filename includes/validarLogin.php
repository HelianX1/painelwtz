<?php
require_once("sessao.php");
if (isset($_POST['usuario']) && isset($_POST['senha'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    if ($usuario == "admin" && $senha == "admin") {
        session_start();
        criarSessao($usuario, $senha);
        $_SESSION['usuario'] = $usuario;
        header("Location: /painelwtz/cadastarProduto.php");
        
    } else {
        header("Location: /painelwtz/");
        
    }
}
?>