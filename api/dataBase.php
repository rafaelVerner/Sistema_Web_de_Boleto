<?php

$db_host = 'mysql.railway.internal';
$db_name = 'cobranca';
$db_user = 'root';
$db_pass = 'cgkVRdBzJYunyIcdHudfCNBiOTLOmcPe';

try{
    $pdo = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['erro'=>'Erro de conexão: ' . $e->getMessage()]);
}

