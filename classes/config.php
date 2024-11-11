<?php

spl_autoload_register(function ($NomeClasse) {
    $PastaClasses = __DIR__."classes/";
    $PossiveisPastas = array(
        $PastaClasses,
        $PastaClasses."controllers/",
        $PastaClasses."models/",
        $PastaClasses."views/"
    );
    foreach($PossiveisPastas as $PastaAtual){
        if(file_exists($PastaAtual.$NomeClasse.".php")){
            require_once($PastaAtual.$NomeClasse.".php");
            break;
        }
    }
    
});

?>