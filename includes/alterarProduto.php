<?php
require_once("../conexao/conexao.php");

try {
    if (isset($_POST['texto_do_produto'], $_POST['palavra_chave'], $_POST['id_produto'])) {
        $texto_do_produto = $_POST['texto_do_produto'];
        $palavra_chave = $_POST['palavra_chave'];
        $id_produtos = $_POST['id_produto'];

        $sql = "UPDATE produtos SET texto_do_produto = :texto_do_produto, palavra_chave = :palavra_chave WHERE id_produto = :id_produto";
        $stmt = $pdo->prepare($sql);

        // Bind dos parâmetros
        $stmt->bindParam(':texto_do_produto', $texto_do_produto, PDO::PARAM_STR);
        $stmt->bindParam(':palavra_chave', $palavra_chave, PDO::PARAM_STR);
        $stmt->bindParam(':id_produto', $id_produtos, PDO::PARAM_INT);

        // Executa a consulta
        if ($stmt->execute()) {
            header("Location: /painelwtz/alterarProduto.php?sucesso=Produto atualizado com sucesso.");
            exit(); // Adiciona exit após redirecionamento
        } else {
            header("Location: /painelwtz/alterarProduto.php?erro=Erro ao atualizar o produto.");
            exit();
        }

    } else {
        header("Location: /painelwtz/alterarProduto.php?erro=Dados não foram enviados corretamente.");
        exit();
    }
} catch (PDOException $e) {
    // Log do erro para depuração
    error_log("Erro: " . $e->getMessage());
    header("Location: /painelwtz/alterarProduto.php?erro=Erro interno no servidor.");
    exit();
}
?>
