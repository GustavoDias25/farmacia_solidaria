<?php
require_once 'connection.php';
require_once 'functions.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: index.php');
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    editar(
        $pdo,
        $_POST['id'],
        $_POST['nome'],
        $_POST['validade'],
        $_POST['quantidade']
    );

    header('Location: index.php');
    exit;
}

$med = readEdit($pdo, $id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/editar.css">

    <?php include 'nav-bar.php';?>
    <form method="post" class="form"> 
    <input type="hidden" name="id" value="<?= $med['id'];?>">
        <h1 class="titulo">Editar Remédio</h1> 
        <div class="form-group col-md-4 campos">
            <label for="campo1">Nome do Remédio</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?=$med['nome'];?>">
        </div>
            <div class="form-group col-md-4 campos">
                 <label for="campo3">Data de validade</label>
                <input type="date" class="form-control" id="validade" name="validade" value="<?=$med['validade'];?>">
            </div>
            <div class="form-group col-md-4 campos">
                <label for="campo3">Exemplar</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" value="<?=$med['quantidade'];?>">
            </div>
             <div>
                 <input type="submit" class="btn  add"  value="Salvar">
                 <a href="index.php" class="btn  add">Cancelar</a>
                </div>
            </form>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
        </body>
</html>