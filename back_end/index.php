<?php

header("Content-type: application/json");
require 'dataBase.php';

$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'] ?? '', '/'));
$resource = array_shift($request);

switch ($resource) {
    case 'cobranca':
        require 'endpoints/cobranca.php';
        break;
    default:
        http_response_code(404);
        echo json_encode(['erro'=> 'Recurso não encontrado!'], JSON_UNESCAPED_UNICODE);
}
