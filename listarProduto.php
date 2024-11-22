<?php
require_once("includes/navbar.php");
require_once("includes/sessao.php");

verificarSessao();

?>
<!doctype html>
<html lang="pt-BR">

<head>
    <title>Listar Produto</title>
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
        <div class="col-md-12">
            <br>
            <h2>Listar Produto</h2>
            <!-- Adicionando a classe table-responsive -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Palavra Chave</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once("conexao/conexao.php");
                        require_once("includes/sessao.php");
                        $id_loja = $_SESSION['id_loja'];
                        $stmt = $pdo->prepare("
                            SELECT DISTINCT produtos.id_produto, produtos.texto_do_produto, produtos.palavra_chave, usuarios.nome, produtos.data_time
                            FROM produtos
                            INNER JOIN usuarios
                            ON produtos.id_usuario = usuarios.id_usuario
                            WHERE produtos.id_loja = :id_loja
                        ");
                        $stmt->bindValue(':id_loja', $id_loja, PDO::PARAM_INT);
                        $stmt->execute();
                        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if ($dados) {
                            foreach ($dados as $dado) {
                                echo "<tr>";
                                echo "<td>" . $dado['id_produto'] . "</td>";
                                echo "<td>" . htmlspecialchars($dado['texto_do_produto']) . "</td>";
                                echo "<td>" . htmlspecialchars($dado['palavra_chave']) . "</td>";
                                echo "<td>" . htmlspecialchars($dado['nome']) . " : " . htmlspecialchars($dado['data_time']) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr>";
                            echo "<td colspan='4' class='text-center text-muted'>Nenhum produto encontrado</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
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