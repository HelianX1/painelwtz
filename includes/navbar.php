<?php

function verificarCargo()
{
    if ($_SESSION['cargo'] == 'admin') {
        navbarLogadoADM();
    } else {
        navbarLogado();
    }
}
function navbarLogado()
{
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/painelwtz/index.php">My bot</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="/painelwtz/cadastarProduto.php">Cadastrar Produto</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="/painelwtz/alterarProduto.php">Alterar Produto</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="/painelwtz/listarProduto.php">Listar Produtos</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="/painelwtz/excluirProduto.php">Excluir Produtos</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="/painelwtz/logout.php">Sair</a>
            </li>
        </ul>
    </div>
    </nav>';
}
function navbar()
{
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/painelwtz/index.php">My bot</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="/painelwtz/login.php">Login</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="/painelwtz/cadastarLoja.php">Cadastro</a>
            </li>
        </ul>
    </div>
    </nav>';
}

function navbarLogadoADM()
{
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/painelwtz/index.php">My bot</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="/painelwtz/cadastarProduto.php">Cadastrar Produto</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="/painelwtz/alterarProduto.php">Alterar Produto</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="/painelwtz/listarProduto.php">Listar Produtos</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="/painelwtz/excluirProduto.php">Excluir Produtos</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="/painelwtz/cadastarFuncionario.php">Cadastar Funcionario</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="/painelwtz/logout.php">Sair</a>
            </li>
        </ul>
    </div>
    </nav>';
}
