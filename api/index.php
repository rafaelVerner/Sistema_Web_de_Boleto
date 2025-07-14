<?php

header("Content-type: application/json");
require 'dataBase.php';

$method = $_SERVER['REQUEST_METHOD'];
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base = '/CobreOnline/back_end';
$path = str_replace($base, '', $url);
$request = explode('/', trim($path, '/'));
$resource = array_shift($request);

switch ($resource) {
    case 'cobranca':
        require 'endpoints/cobranca.php';
        break;
    default:
        http_response_code(404);
        echo json_encode(['erro'=> 'Recurso não encontrado!'], JSON_UNESCAPED_UNICODE);
}
