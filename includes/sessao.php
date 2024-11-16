<?php
session_start();
// Função para criar sessão de usuários
function criarSessaoUsuario(
    $nome = null,
    $id_usuario = null,
    $usuario = null,
    $cargo = null,
    $id_loja = null,
    $data_criacao = null
) {
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params([
            'path' => '/',
            'httponly' => true,
            'samesite' => 'Strict',
        ]);
        
    }

    $_SESSION['nome'] = $nome;
    $_SESSION['id_usuario'] = $id_usuario;
    $_SESSION['usuario'] = $usuario;
    $_SESSION['cargo'] = $cargo;
    $_SESSION['id_loja'] = $id_loja;
    $_SESSION['data_criacao'] = $data_criacao;
    return "Sessão criada com sucesso";
}

// Função para criar sessão de lojas
function criarSessaoLoja(
    $id_loja = null,
    $nome_fantasia = null,
    $cnpj_cpf = null,
    $cargo = null,
    $data_criacao = null
) {
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params([
            'path' => '/',
            'httponly' => true,
            'samesite' => 'Strict',
        ]);
        
    }

    $_SESSION['id_loja'] = $id_loja;
    $_SESSION['nome_fantasia'] = $nome_fantasia;
    $_SESSION['cnpj_cpf'] = $cnpj_cpf;
    $_SESSION['cargo'] = $cargo;
    $_SESSION['data_criacao'] = $data_criacao;
}



// verificar se a sessão existe
function verificarSessao()
{
    if (!isset($_SESSION['cargo'])) {
        header("Location: /painelwtz/login.php");
    }
}

// destruir sessão
function destruirSessao()
{
    session_destroy();
    header("Location: /painelwtz/login.php");
}

// messagem 
function mensagem($mensagem)
{   

    $_SESSION['mensagem'] = $mensagem;
    if (isset($_SESSION['mensagem'])) {
        echo $_SESSION['mensagem'];
    }
     
}
?>
