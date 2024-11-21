<?php
require_once("../conexao/conexao.php");
require_once("sessao.php");

if (isset($_POST['nome'])) {
    $nome = '%' . $_POST['nome'] . '%';
    $id_loja = $_SESSION['id_loja'];

    $sql = "SELECT texto_do_produto, palavra_chave 
            FROM produtos 
            WHERE id_loja = :id_loja AND palavra_chave LIKE :nome 
            LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_loja', $id_loja, PDO::PARAM_INT);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->execute();

    // Verifica se há resultados
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$dados) {
        $erro = urlencode("Produto não encontrado");
        header("Location: /painelwtz/alterarProduto.php?erro=$erro");
        exit;
    } else {
        // Extrai os dados retornados
        $texto_do_produto = urlencode($dados['texto_do_produto']);
        $palavra_chave = urlencode($dados['palavra_chave']);

        header("Location: /painelwtz/alterarProduto.php?texto_do_produto=$texto_do_produto&palavra_chave=$palavra_chave");
        exit;
    }
}
