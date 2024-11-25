<?php
require_once("includes/navbar.php");
require_once("includes/sessao.php");
if (isset($_GET['textoProduto']) && isset($_GET['palaChave']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $textoProduto = $_GET['textoProduto'];
    $palaChave = $_GET['palaChave'];
}

verificarSessao();
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <title>Excluir Produto</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php verificarCargo(); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <br>
                <h2> Alterar Produto</h2>
                <form action="includes/excluirProduto.php" method="post">
                    <div class="form-group">
                        <label for="nome">Nome do Produto</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Produto">
                    </div>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    
                </form>


                <form action="includes/excluirProduto.php" method="post">
                <br>
                    <div class="form-group">
                        <label for="nome">Codigo do Produto</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Codigo do Produto">
                        <br>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                </form>
                <?php
                if (isset($_GET['erro'])) {
                    $erro = $_GET['erro'];
                    echo '<br><div class="alert alert-danger" role="alert">' . $erro . '</div>';
                }
                ?>

                <?php
                if (isset($_GET['produto_excluido'])) {
                    $produto_excluido = $_GET['produto_excluido'];
                    echo '<br><div class="alert alert-success" role="alert">' . $produto_excluido . '</div>';
                }
                ?>
                <?php
                if (isset($textoProduto) or isset($palaChave)) {

                    echo "<br>";
                    echo "<h3>Produto encontrado</h3>";
                    echo '<div class="alert alert-danger" role="alert">';
                    echo "<p>id Produto : $id</p>";
                    echo "<p>Texto do Produto: $textoProduto</p>";
                    echo "<p>Palavra Chave: $palaChave</p>";
                    echo "<form action='includes/excluirProduto.php?id_produto=$id' method='post'>";
                    echo "<input type='hidden' name='id' value='$palaChave'>";
                    echo "<button type='submit' class='btn btn-danger'>Excluir</button>";
                    echo "</form>";
                    echo '</div>';
                }
                ?>
                <div class="col-md-4">
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>