<?php
require_once("includes/navbar.php");
?>
<!doctype html>
<html lang="en">

<head>
    <title>Cadastre Funcionario</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php navbarLogado(); ?>
    <div class="container">

        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <br>
                <h2>Cadastre Funcionario</h2>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <label for="Username">Username</label>
                        <input type="text" class="form-control" id="Username" name="Username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="Senha">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
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