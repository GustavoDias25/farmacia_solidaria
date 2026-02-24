<?php
    require_once 'connection.php';
   if($_SERVER['REQUEST_METHOD'] == 'POST'){ 


$nome = $_POST['nome'];
$validade = $_POST['validade'];
$quantidade = $_POST['quantidade'];

function adicionar($pdo, $nome, $validade, $quantidade) {
$sql = 'INSERT INTO remedios (nome, validade, quantidade) VALUES (:nome, :validade, :quantidade)';

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':validade', $validade);
$stmt->bindParam(':quantidade', $quantidade);

$result = $stmt->execute();

header('Location: index.php');
    exit;
    }
}


function read(PDO $pdo) {
    $sql = 'SELECT * FROM remedios ORDER BY id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function readEdit(PDO $pdo, int $id) {
    $id = $_GET['id'];
    $sql = 'SELECT * FROM remedios WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function editar($pdo, $id, $nome, $validade, $quantidade){
    $id = $_GET['id'];
    $sql = 'UPDATE remedios SET nome = :nome, validade = :validade, quantidade = :quantidade WHERE id = :id';

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':validade', $validade);
$stmt->bindParam(':quantidade', $quantidade);

$result = $stmt->execute();
}

function deletar($pdo, $id){
    $sql = 'DELETE FROM remedios WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

}

function pesquisarPorNome($pdo, $nome) {
    $sql = "SELECT * FROM remedios WHERE nome LIKE :nome";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':nome', "%$nome%");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}