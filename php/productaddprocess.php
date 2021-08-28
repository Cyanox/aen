<?php

require_once __DIR__ . '/../api/dao/aen.php';
require_once __DIR__ . '/../api/utils/server.php';
if (isset($_SESSION["username"])){
    require_once '../api/dao/aen.php';
    $user = ['username' => $_SESSION["username"]];
    $userRank = getUserRank($user);
    if ($userRank["rank"] < 2){
        header('Location: /aen/error.php?error=banned');}
}
ensureHttpMethod('POST');
if(isset($_POST['ref'])) {
    $products = [
        //string $ref, string $name, string $manufacturer, string $provider, float $ht, float $tva, float $ttc
        'reference' => $_POST['ref'],
        'name' => $_POST['name'],
        'type' => $_POST['type'],
        'description' => $_POST['desc'],
        'ht' => $_POST['ht'],
        'tva' => $_POST['tva'],
        'ttc' => $_POST['ttc']
    ];
    $lastId = insertProduct($products);
    header('Location: products.php');
} else {
    header('Location: ../error.php?error=400'); // BAD_REQUEST

}
