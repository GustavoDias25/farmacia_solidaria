<?php
require_once 'connection.php';
require_once 'functions.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id) {
    deletar($pdo, $id);
}

header('Location: index.php');
exit;

  