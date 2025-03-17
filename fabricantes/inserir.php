<?php
/* Verificar se o fotrmulário foi acionado */
if(isset($_POST['inserir']) ){
    // Acessando as funções do CRUD de Fabricantes
    require_once "../src/funcoes-fabricantes.php";

    // Capturando o nome digitado do novo fabricante
    $nome = filter_input(
        INPUT_POST, "nome", FILTER_SANITIZE_FULL_SPECIAL_CHARS
    ); 
    // filter_input() - Filtro de entrada
    // INPUT_POST - Metodo do furmulário
    // FILTER_SANITIZE_FULL_SPECIAL_CHARS - Constante 

    // Inserindo um novo fabricante através de uma função
    inserirFabricante($conexao, $nome);

    /* Redirecionar para visualização atualizada */
    header("location:visualizar.php");
    exit; //equivalente ao die
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Inserção</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-2 shadow-lg rounded pb-1">
        <h1><a class="btn btn-outline-dark" href="visualizar.php">&lt; Voltar</a> Fabricantes | INSERT</h1>
        <hr>

        <form action="" method="post" class="w-25">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input class="form-control" required type="text" name="nome" id="nome">
            </div>
            <button class="btn btn-success" type="submit" name="inserir">Inserir fabricante</button>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>