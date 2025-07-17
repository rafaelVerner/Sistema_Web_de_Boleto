<?php

header("Content-type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require 'dataBase.php';

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$scriptName = dirname($_SERVER["SCRIPT_NAME"]);
$path = preg_replace("#^" . preg_quote($scriptName) . "#", "", $uri);
$request = explode("/", trim($path, "/"));
$resource = array_shift($request);

switch ($resource) {
    case 'cobranca':
        $GLOBALS['request'] = $request;
        require 'endpoints/cobranca.php';
        break;
    default:
        http_response_code(404);
        echo json_encode(['erro'=> 'Recurso não encontrado!'], JSON_UNESCAPED_UNICODE);
}
