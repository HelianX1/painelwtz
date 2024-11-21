<?php
require_once("../conexao/conexao.php");
require_once("sessao.php");

if (isset($_POST['usuario']) && isset($_POST['senha'])) {
    echo "1";
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $senha = hash('sha256', $senha);
    $stmt_usuarios = $pdo->prepare("SELECT usuarios.nome FROM usuarios WHERE usuarios.login = '$usuario'");
    $stmt_usuarios->execute();
    $dados = $stmt_usuarios->fetch(PDO::FETCH_ASSOC);
    
    
    if ($dados == false) {
        echo "2";
        if($stmt_usuarios->rowCount() == 0){
            mensagem("Usuario ou senha incorretos");
            header("Location: /painelwtz/login.php");
        }
        $stmt_usuarios = $pdo->prepare("SELECT * FROM lojas WHERE lojas.nome_fantasia = '$usuario' AND lojas.senha = '$senha' or lojas.cnpj_cpf = '$usuario' AND lojas.senha = '$senha' ");
        $stmt_usuarios->execute();
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
            
            //header("Location: /painelwtz/listarProduto.php");
        }
    }elseif ($dados !== false) {
        echo "3";
        $stmt_usuarios = $pdo->prepare("SELECT * FROM usuarios WHERE usuarios.login = '$usuario' AND usuarios.senha = '$senha'");
        $stmt_usuarios->execute();
        if($stmt_usuarios->rowCount() == 0){
            mensagem("Usuario ou senha incorretos");
            header("Location: /painelwtz/login.php");
        }
    while ($dados = $stmt_usuarios->fetch(PDO::FETCH_ASSOC)){
        $id_usuario = $dados['id_usuario'];
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

}

?>
