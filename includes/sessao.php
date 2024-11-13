<?php
session_start();
// criar sessão
function criarSessao($usuario, $senha)
{
    session_set_cookie_params(['httponly' => true]);
    $_SESSION['usuario'] = $usuario;
    $_SESSION['senha'] = $senha;
    
}
// verificar se a sessão existe
function verificarSessao()
{
    if (isset($_SESSION['usuario']) && isset($_SESSION['senha'])) {
        return true;
    } else {
          header("Location: /painelwtz/login.php");
    }
}

// destruir sessão
function destruirSessao()
{
    session_destroy();
    header("Location: /painelwtz/login.php");
}
?>
