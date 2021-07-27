<?php

require_once __DIR__ . '../api/dao/lep.php';
require_once __DIR__ . '../api/utils/server.php';

ensureHttpMethod('POST');

$content = file_get_contents('php://input');
$_POST = json_decode($content, true);

if(isset($_POST['model']) && isset($_POST['capacity'])) {
    $lastId = insertProduct($_POST['model'], $_POST['capacity']);
    if($lastId) {
        $product = getPlaneById($lastId);
        if($product) {
            http_response_code(201);
            header('Content-Type: application/json');
            echo json_encode($product);
        } else {
            http_response_code(500);
        }
    } else {
        http_response_code(500);
    }
} else {
    http_response_code(400); // BAD_REQUEST
}