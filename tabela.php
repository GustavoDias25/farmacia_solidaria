<?php 
require_once 'functions.php';
require_once 'connection.php';

$remedios = read($pdo);

foreach ($remedios as &$med) {
   if (new DateTime($med['validade']) < new DateTime()) {
    deletar($pdo, $med['id']);
}

}

?>

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