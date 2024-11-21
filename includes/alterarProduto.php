<?php
require_once("../conexao/conexao.php");
require_once("sessao.php");
if (isset($_POST['nome'])) {
    echo "entrou";
    $nome = '%' . $_POST['nome'] . '%';
    $id_loja = $_SESSION['id_loja'];
    $sql = "SELECT texto_do_produto, palavra_chave, id_loja  FROM produtos WHERE id_loja = $id_loja AND palavra_chave LIKE :nome limit 1";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->execute();


    if ($dados = $stmt->fetch(PDO::FETCH_ASSOC) == false) {
        $erro = "Produto não encontrado";
        echo "1";
        header("Location: /painelwtz/alterarProduto.php?erro=$erro");
    } else {
        echo "2";
        while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $texto_do_produto = $dados['texto_do_produto'];
            $palavra_chave = $dados['palavra_chave'];
            
        }
        header("Location: /painelwtz/alterarProduto.php?texto_do_produto=$texto_do_produto&palavra_chave=$palavra_chave");
    }
}

