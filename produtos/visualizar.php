<?php
require_once "../src/funcoes-produtos.php";
require_once "../src/funcoes-utilitarias.php";
$listarProdutos = listarProdutos($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Visualização</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-2 shadow-lg rounded pb-1">
        <h1><a class="btn btn-dark btn-lg" href="../index.php">Home</a> Produtos | SELECT</h1>

        <hr>
        <h2>Lendo e carregando todos os produtos.</h2>

        <p><a class="btn btn-primary btn-sm" href="inserir.php">Inserir novo produto</a></p>


        <div class="row g-1">
            <?php foreach ($listarProdutos as $produto) {?>
                <div class="col-sm-6">
                    <article class="bg-body-secondary p-2">
                        <h3>Nome do produto: <?= $produto["produto"] ?></h3>
                        <h4>Id do Fabricante: <?= $produto["fabricante"] ?></h4>
                        <p><b>Preço:</b>
                        <!-- formatar preço ---> <?=formatarPreco($produto["preco"] )?></p> 
                        <p><b>Quantidade:</b> <?= $produto["quantidade"] ?></p>
                        <p><b>Total: </b>  <?=formatarPreco($produto["preco"] * $produto["quantidade"])?></p>
                        <a class="btn btn-warning" href="atualizar.php?id=<?=$produto["id"]?>">Editar</a>
                        <a class="btn btn-warning" href="excluir.php?id=<?=$produto["id"]?>">Excluir</a>
                    </article>
                </div>
            <?php }?>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
0