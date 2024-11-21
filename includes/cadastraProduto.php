<?php
require_once("../conexao/conexao.php");
require_once("sessao.php");
if(isset($_POST['texto']) && isset($_POST['palavraChave'])){
    $palavra_chave = wordwrap($_POST['palavraChave'],10, "<br>");
    $texto = $_POST['texto'];
    $palavraChave = $_POST['palavraChave'];
    $palavra_chaveformatado = strtolower($palavraChave);
    $palavra_chaveformatado = str_replace(" ", "", $palavra_chaveformatado);
    if(isset($_SESSION['id_usuario'])){
    $id_usuario = $_SESSION['id_usuario'];
    
    }else{
        $id_usuario = null;
    }
    $id_loja = $_SESSION['id_loja'];
    $sql = "INSERT INTO produtos (texto_do_produto, palavra_chave, id_usuario, id_loja) VALUES (:texto, :palavraChave, :id_usuario, :id_loja)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':texto', $texto);
    $stmt->bindParam(':palavraChave', $palavra_chaveformatado);
    $stmt->bindParam(':id_usuario', $id_usuario);
    $stmt->bindParam(':id_loja', $id_loja);
    $stmt->execute();
    header("Location: /painelwtz/cadastarProduto.php?alertaCadastro=Produto cadastrado com sucesso");
    

}
?>