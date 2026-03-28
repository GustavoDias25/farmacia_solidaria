    <?php
    require_once 'connection.php';
    require_once 'functions.php';
    
    $remedios = read($pdo);
    ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="/FARMACIA/css/lista.css">
    </head>
  <body>
    <?php include 'nav-bar.php'?> 
<div class="lista-container">
<?php foreach($remedios as $med):?>
    <div class="lista-item">
        <span class="nome"><?=htmlspecialchars($med['nome'])?></span>
        <span class="validade"><?= date('d/m/Y', strtotime($med['validade']))?></span>
    </div>
    <?php endforeach;?>
</div>
<form action="index.php" method="get" class="form">
    <input type="submit" value="voltar ao inicio" class="botao">
</form>

</body>
</html>



