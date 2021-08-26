<?php

require_once __DIR__ . '/../api/dao/aen.php';
require_once __DIR__ . '/../api/utils/server.php';

ensureHttpMethod('POST');
if(isset($_POST['ref'])) {
    $lastId = insertProduct($_POST['ref'], $_POST['name'], $_POST['manufacturer'], $_POST['provider'], $_POST['price'], $_POST['labor'], $_POST['loss']);
    header('Location: products.php');
} else {
    header('Location: ../error.php?error=400'); // BAD_REQUEST

}