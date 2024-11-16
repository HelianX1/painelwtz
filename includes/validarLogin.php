<?php
require_once("../conexao/conexao.php");
require_once("sessao.php");

if (isset($_POST['usuario']) && isset($_POST['senha'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $senha = hash('sha256', $senha);
    $stmt_usuarios = $pdo->prepare("SELECT usuarios.nome FROM usuarios WHERE usuarios.nome = '$usuario'");
    $stmt_usuarios->execute();
    $dados = $stmt_usuarios->fetch(PDO::FETCH_ASSOC);
    var_dump($dados);
    
    if ($dados == false) {
        $stmt_usuarios = $pdo->prepare("SELECT * FROM lojas WHERE lojas.nome_fantasia = '$usuario' AND lojas.senha = '$senha' or lojas.cnpj_cpf = '$usuario' AND lojas.senha = '$senha' ");
        $stmt_usuarios->execute();
        echo var_dump($stmt_usuarios);
        while($dados = $stmt_usuarios->fetch(PDO::FETCH_ASSOC)){
            $id_loja = $dados['id_loja'];
            $nome_fantasia = $dados['nome_fantasia'];
            $cnpj_cpf = $dados['cnpj_cpf'];
            $senha = $dados['senha'];
            $cargo = $dados['cargo'];
            $data_criacao = $dados['data_criacao'];
            criarSessaoLoja(
                $dados['id_loja'],
                $dados['nome_fantasia'],
                $dados['cnpj_cpf'],
                $dados['cargo'],
                $dados['data_criacao']
            );
            
            header("Location: /painelwtz/listarProduto.php");
        }
    }
    
    if ($dados !== false) {
        $stmt_usuarios = $pdo->prepare("SELECT * FROM usuarios WHERE usuarios.nome = '$usuario' AND usuarios.senha = '$senha'");
        $stmt_usuarios->execute();
    while ($dados = $stmt_usuarios->fetch(PDO::FETCH_ASSOC)){
        var_dump($dados);
        $id_usuario = $dados['id_usuario'];
        echo $id_usuario;
        $nome = $dados['nome'];
        $login = $dados['login'];
        $senha = $dados['senha'];
        $cargo = $dados['cargo'];
        $id_loja = $dados['id_loja'];
        $data_criacao = $dados['data_criacao'];
        $a = criarSessaoUsuario(
            $dados['nome'],
            $dados['id_usuario'],
            $dados['login'],
            $dados['cargo'],
            $dados['id_loja'],
            $dados['data_criacao']
            
        );
        header("Location: /painelwtz/listarProduto.php");
    }
    
    }
    else {
        echo "Usuário ou senha inválidos";
    }


}

?>
