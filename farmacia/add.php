<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/add.css">
    
    <?php include 'nav-bar.php';?>
    <form    method="post" class="form">  
            <h1 class="titulo">Cadastrar Remédio</h1>
            <div class="form-group col-md-4 campos">
                <label for="nome">Nome do Remédio</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do remédio">
            </div>
            <div class="form-group col-md-4 campos">
                 <label for="validade">Data de Validade</label>
                <input type="date" class="form-control" name="validade" id="validade" placeholder="Data de validade">
            </div>
            <div class="form-group col-md-4 campos">
                 <label for="validade">Exemplar</label>
                <input type="number" class="form-control" name="quantidade" id="quantidade" value="1">
            </div>
            <div>
                <?php require_once 'functions.php'?>
                <button href="index.php" type="submit" class="btn  add" <?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    adicionar(
        $pdo,
        $_POST['nome'],
        $_POST['validade'],
        $_POST['quantidade']
    );
}
?>>Salvar</button>
                 <a href="index.php" class="btn  add">Cancelar</a>
             </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>

