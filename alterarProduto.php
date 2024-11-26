<?php
require_once("includes/navbar.php");
require_once("includes/sessao.php");

$id_produto = isset($_GET['id_produto']) ? intval($_GET['id_produto']) : null;
$texto_do_produto = isset($_GET['texto_do_produto']) ? htmlspecialchars($_GET['texto_do_produto']) : '';
$palavra_chave = isset($_GET['palavra_chave']) ? htmlspecialchars($_GET['palavra_chave']) : '';
$erro = isset($_GET['erro']) ? "<div class='alert alert-danger' role='alert'>" . htmlspecialchars($_GET['erro']) . "</div>" : '';
$sucesso = isset($_GET['sucesso']) ? "<div class='alert alert-success' role='alert'>" . htmlspecialchars($_GET['sucesso']) . "</div>" : '';

verificarSessao();
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <title>Alterar Produto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php verificarCargo(); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <br>
                <h2>Alterar Produto</h2>
                <form action="includes/BuscarExibir.php" method="post">
                    <div class="form-group">
                        <label for="nome">Nome do Produto</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Produto" required>
                    </div>
                    <?php if ($erro) echo $erro; ?>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </form>

                <form action="includes/alterarProduto.php" method="post">
                    <div class="form-group">
                        <br>
                        <input type="hidden" name="id_produto" value="<?php echo $id_produto; ?>">
                        <label for="texto_do_produto">Produto</label>
                        <textarea class="form-control" name="texto_do_produto" id="texto_do_produto" rows="10" required><?php echo $texto_do_produto; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="palavra_chave">Palavras Chaves</label>
                        <textarea class="form-control" name="palavra_chave" id="palavra_chave" rows="2" required><?php echo $palavra_chave; ?></textarea>
                    </div>
                    <?php if ($sucesso) echo $sucesso; ?>
                    <br>
                    <button type="submit" class="btn btn-primary">Alterar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
