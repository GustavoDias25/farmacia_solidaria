<?php
require_once 'functions.php';
require_once 'connection.php';

    $pesquisa = $_GET['pesquisar'] ?? '';
    if (!empty($pesquisa)) {
    $remedios = pesquisarPorNome($pdo, $pesquisa);
    } else {
    $remedios = read($pdo);
    }

foreach ($remedios as $med) {
    if (new DateTime($med['validade']) < new DateTime()) {
        deletar($pdo, $med['id']);
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Farmácia solidária</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
   <?php  include 'nav-bar.php';?>
    
    <div class="container-fluid" id="main">
        <div id="main" class="container-fluid">
            <div id="top" class="row mt-3"> <!-- top -->
                <div class="col-md-3">
                    <h2>Itens</h2>
                </div>
                <div class="col-md-6">
                    <div class="input-group h2">
                            <form method="GET" class="barra-pesquisa" style="display:flex; flex-direction:row;">
                                <input type="text" name="pesquisar" class="form-control input-search" id="search" placeholder="Pesquisar por nome" style="width: 600px; border-top-right-radius: 0; border-bottom-right-radius:0;" value="<?=htmlspecialchars($_GET['pesquisar'] ?? '');?>">
                                <input type="submit" class="bnt btn-primary pesquisar" value="Buscar" style="padding:5px;border-top-left-radius: 0; border-bottom-left-radius:0;">
                            </form>
                        </div>
                    </div>
                <div class="col-md-3 botoes">
                    <a href="lista.php" class="bnt btn-primary botao-cadastrar float-end" >Gerar Lista</a>
                    <a href="add.php" class="bnt btn-primary botao-cadastrar float-end" >Cadastrar</a>
                </div>
            </div>  <!-- /#top -->
   </div>      
    </div>

            <hr>
<table  cellspacing="0" cellpadding="0">
    <tr class="cabecalho-table">
        <th>ID</th>
        <th>Nome</th>
        <th>Validade</th>
        <th class="actions">Ações</th>
    </tr>
    <?php foreach ($remedios as $med): ?>
            <tr>
                <td><?= $med['id'] ?></td>
                <td><?= htmlspecialchars($med['nome']) ?></td>
                <td class="validade">
                    <?= date('d/m/Y', strtotime($med['validade'])) ?>
                </td>
                <td class="action">
                    <a href="detalhar.php?id=<?= $med['id'] ?>" name="id" class="detalhar btn btn-success btn-xs">
                        Detalhar
                    </a>

                    <a href="editar.php?id=<?= $med['id'] ?>" name="id" class="editar btn btn-warning btn-xs" >
                        Editar
                    </a>

                    <a href="deletar.php?id=<?= $med['id'] ?>" name="id" class="deletar btn btn-danger btn-xs" onclick="return confirm('Deseja excluir este medicamento?')">
                        Deletar
                     </a>
                    </td>
            </tr>
        <?php endforeach; ?>
</table>
                </div>
            </div> <!-- list -->            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>