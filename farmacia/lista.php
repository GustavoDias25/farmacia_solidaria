<?php

require_once 'functions.php';

$remedios = read($pdo);


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/lista.css">
</head>
<body>
    <table>
        <?php
        foreach($remedios as $med):?>
        <tr>
            <td> <?= htmlspecialchars($med['nome']) ?></td>
            <td><?= date('d/m/Y', strtotime($med['validade'])) ?></td>
        </tr>
               
        <?php endforeach;?>
    </table>
    <form action="index.php">
        <input type="submit" class="voltar" value="Voltar para o inicio">
    </form>
</body>
</html>