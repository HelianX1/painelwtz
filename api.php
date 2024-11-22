<?php

include_once("conexao/conexao.php");

function removerPalavrasChave($produto) {
    $palavras = array(
        "quando", "valo", "valor", "esta", "ta", "quanto", "tela", "quero", "de", "4g", "5g",
        "carcaça", "da", "do", "para", "di", "tampa", "tampas", "tampinha", "capinha", "capinhas",
        "capa", "capas", "celular", "celulares", "smartphone", "smartphones", "samsung", "galaxy",
        "motorola", "moto", "lg", "nokia", "sony", "xperia", "asus", "lenovo", "vibe", "xiaomi",
        "huawei", "bateria", "cabo", "cabos", "carregador", "carregadores", "fones", ".", ",", "!", 
        ":", ";", "-", "_", "/", "|", "@", "#", "$", "%", "¨", "&", "*", "(", ")", "[", "]", "{", 
        "}", "?", "<", ">", "=", "+", "~", "^", "º", "ª", "°"
    );
    $produto = strtolower($produto); // Transforma tudo em minúsculo
    $produto = str_replace($palavras, "", $produto); // Remove palavras-chave
    $produto = preg_replace('/\s+/', '', $produto); // Remove espaços em branco extras

    return $produto;
}

// Verifica se os parâmetros estão definidos e se não estão vazios
if (!empty($_GET['produto']) && !empty($_GET['id_loja'])) {
    $produto = $_GET['produto'];
    $id_loja = $_GET['id_loja'];

    // Formata o produto removendo palavras-chave
    $ProdutoFormatado = removerPalavrasChave($produto);

    // Usa consulta segura com bindValue
    $sql = "SELECT texto_do_produto FROM produtos WHERE palavra_chave LIKE :palavra_chave AND id_loja = :id_loja LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':palavra_chave', '%' . $ProdutoFormatado . '%', PDO::PARAM_STR);
    $stmt->bindValue(':id_loja', $id_loja, PDO::PARAM_INT);
    $stmt->execute();
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($dados) {
        echo $dados['texto_do_produto'];
    } else {
        echo " *Para facilitar sua busca:* 
*Invés de : Samsung A01* 
*Faça assim : A01* 

*Invés de : Moto E7* 
*Faça assim : E7* 

*Invés de : Xiomi Redmi note7* 
*Faça assim : note7*";
    }
} else {
    echo " *Para facilitar sua busca:* 
*Invés de : Samsung A01* 
*Faça assim : A01* 

*Invés de : Moto E7* 
*Faça assim : E7* 

*Invés de : Xiomi Redmi note7* 
*Faça assim : note7*";
}
?>
