<?php
require_once("../conexao/conexao.php");
require_once("sessao.php");
require_once("buscarExibir.php");

if (isset($_POST['texto_do_produto'], $_POST['palavra_chave'],  $_POST['id_produto'])) {
    $texto_do_produto = $_POST['texto_do_produto'];
    $palavra_chave = $_POST['palavra_chave'];
    $id_produtos =  $_POST['id_produto'];

    $sql = "UPDATE produtos SET texto_do_produto = :texto_do_produto, palavra_chave = :palavra_chave WHERE id_produto = :id_produto";
    $stmt = $pdo->prepare($sql);

    // Bind dos parâmetros
    $stmt->bindParam(':texto_do_produto', $texto_do_produto, PDO::PARAM_STR);
    $stmt->bindParam(':palavra_chave', $palavra_chave, PDO::PARAM_STR);
    $stmt->bindParam(':id_produto', $id_produtos, PDO::PARAM_INT);

    // Executa a consulta
    if ($stmt->execute()) {
        header("Location: /painelwtz/alterarProduto.php?sucesso=Produto atualizado com sucesso.");
    } else {
        header("Location: /painelwtz/alterarProduto.php?erro=Erro ao atualizar o produto.");
    }

} else {
    header("Location: /painelwtz/alterarProduto.php?erro=Erro ao atualizar o produto.");
}
?>
