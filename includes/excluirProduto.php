<?php
require_once("../conexao/conexao.php");
require_once("sessao.php");

if (isset($_POST['nome']) && isset($_POST['id'])) {
    $nome = $_POST['nome'];
    $id = $_POST['id'];

    // Preparar a consulta para evitar SQL Injection
    $stmt = $pdo->prepare("SELECT * FROM produtos WHERE palavra_chave = :nome OR id_produto = :id LIMIT 1");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$dados) {
        mensagem("Produto não encontrado");
        header("Location: /painelwtz/excluirProduto.php");
        exit;
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
            exit;
        } else {
            mensagem("Dados incompletos no registro encontrado.");
            header("Location: /painelwtz/excluirProduto.php");
            exit;
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
