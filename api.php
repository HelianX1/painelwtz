<?php

include_once("conexao/conexao.php");
function removerPalavrasChave($produto){
    $palavras = array("quando","valo","valor","esta","ta","quanto","tela","quero","de",'4g','5g',"carcaça","da","do","para","di","tampa", "tampas", "tampinha","capinha","capinhas","capa","capas","celular","celulares","smartphone","smartphones","samsung","samsungs","galaxy","galaxys","motorola","motorolas","moto","motos","lg","nokia","nokias","sony","xperia","xperias","asus","lenovo","lenovos","vibe","vibes","xiaomi","xiomi","huawei","huaweis","bsteria","cabo","cabos","carregador","carregadores","fones","dock","docks","doc",".",",","!",":",";","-","_","/","\\","|","@","#","$","%","¨","&","*","(",")","[","]","{","}","?","<",">","=","+","~","^","","'","\"","º","ª","°");
    $produto = strtolower($produto);
    $produto = str_replace(" ", "", $produto);
    $produto = str_replace($palavras, "", $produto);
    return $produto;
}
if(!isset($_GET['produto']) && !isset($_GET['id_loja'])){


$produto = $_GET['produto'];
$id_loja = $_GET['id_loja'];

$ProdutoFormatado = removerPalavrasChave($produto); 
$sql = "SELECT produtos.texto_do_produto FROM produtos WHERE palavra_chave LIKE '%$ProdutoFormatado%' AND id_loja = $id_loja limit 1";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$dados = $stmt->fetch(PDO::FETCH_ASSOC);
if($dados){
echo $dados['texto_do_produto'];
}
else{
    echo " *Para facilitar sua busca:* 
*Invés de : Samsung A01* 
*Faça assim : A01*

 *Invés de : Moto E7* 
*Faça assim : E7* 

*Invés de : Xiome Redmi note7* 
*Faça assim : note7*";
}
}
else{
    echo " *Para facilitar sua busca:* 
    *Invés de : Samsung A01* 
    *Faça assim : A01*
    
     *Invés de : Moto E7* 
    *Faça assim : E7* 
    
    *Invés de : Xiome Redmi note7* 
    *Faça assim : note7*";
}
?>