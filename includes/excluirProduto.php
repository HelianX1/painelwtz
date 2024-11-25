<?php
require_once("../conexao/conexao.php");
require_once("sessao.php");
if (isset($_POST['id'])){
    $id = $_POST['id'];
    $id_loja = $_SESSION['id_loja'];
    // Preparar a consulta para evitar SQL Injection
    $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id_loja = :id_loja and id_produto = :id LIMIT 1");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':id_loja', $id_loja);
    $stmt->execute();

    $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$dados) {
        header("Location: /painelwtz/excluirProduto.php?erro=Produto não encontrado");

    } else {
        // Verificar se as chaves existem no array de dados
        if (isset($dados['texto_do_produto']) && isset($dados['palavra_chave'])) {
            $textoProduto = $dados['texto_do_produto'];
            $palaChave = $dados['palavra_chave'];
            $idProduto = $dados['id_produto'];

            // Codificar os valores para evitar problemas na URL
            $textoProdutoEncoded = urlencode($textoProduto);
            $palaChaveEncoded = urlencode($palaChave);
            $idEncoded = urlencode($idProduto);

            // Redirecionar com os valores na URL
            header("Location: /painelwtz/excluirProduto.php?textoProduto=$textoProdutoEncoded&palaChave=$palaChaveEncoded&id=$idEncoded");
        } else {
            mensagem("Dados incompletos no registro encontrado.");
            header("Location: /painelwtz/excluirProduto.php");
        }

}
}
if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $id_loja = $_SESSION['id_loja'];

    // Preparar a consulta para evitar SQL Injection
    $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id_loja = :id_loja and palavra_chave LIKE :nome LIMIT 1");
    $stmt->bindValue(':nome', '%' . $nome . '%', PDO::PARAM_STR);
    $stmt->bindParam(':id_loja', $id_loja);
    $stmt->execute();

    $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$dados) {
        header("Location: /painelwtz/excluirProduto.php?erro=Produto não encontrado");

    } else {
        // Verificar se as chaves existem no array de dados
        if (isset($dados['texto_do_produto']) && isset($dados['palavra_chave'])) {
            $textoProduto = $dados['texto_do_produto'];
            $palaChave = $dados['palavra_chave'];
            $idProduto = $dados['id_produto'];

            // Codificar os valores para evitar problemas na URL
            $textoProdutoEncoded = urlencode($textoProduto);
            $palaChaveEncoded = urlencode($palaChave);
            $idEncoded = urlencode($idProduto);

            // Redirecionar com os valores na URL
            header("Location: /painelwtz/excluirProduto.php?textoProduto=$textoProdutoEncoded&palaChave=$palaChaveEncoded&id=$idEncoded");
        } else {
            mensagem("Dados incompletos no registro encontrado.");
            header("Location: /painelwtz/excluirProduto.php");
        }
    }
}
    if(isset($_GET['id_produto'])){
        $id = $_GET['id_produto'];
        $stmt = $pdo->prepare("DELETE FROM produtos WHERE id_produto = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        mensagem("Produto excluído com sucesso");
        header("Location: /painelwtz/excluirProduto.php?produto_excluido=Produto excluído com sucesso");
        exit;
    }
?>
