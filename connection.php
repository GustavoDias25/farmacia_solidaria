<?php

require_once 'env.php';

$dsn = "mysql:host=$ENV_HOST;dbname=$ENV_DBNAME";


try{
    $pdo = new PDO($dsn, $ENV_USERNAME, $ENV_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo 'erro na conexão ' . $e->getMessage();
}