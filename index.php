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
                    <form class="input-group h2" method="get">
                        <input name="pesquisar" class="form-control barra-pesquisa" id="search" type="text" placeholder="Pesquisar Itens" value="<?= htmlspecialchars($_GET['pesquisar'] ?? '') ?>">
                        <button class="bnt btn-primary pesquisar" type="submit">Pesquisar</button>
                    </form>
                </div>
                <div class="col-md-3 botoes">
                    <a href="gerarLista.php" class="bnt btn-primary botao-cadastrar float-end" >Gerar Lista</a>
                    <a href="add.php" class="bnt btn-primary botao-cadastrar float-end" >Cadastrar</a>
                </div>
            </div>  <!-- /#top -->
   </div>      
    </div>

            <hr>

   <?php require 'tabela.php';?>            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
