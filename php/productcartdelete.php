<?php
require_once '../api/dao/aen.php';
if (isset($_SESSION["username"])){
    require_once '../api/dao/aen.php';
    $user = ['username' => $_SESSION["username"]];
    $userRank = getUserRank($user);
}

if (isset($_GET['id'])){
    $product = ['id' => $_GET['id']];
    var_dump($product);
    deleteCartProduct($product);
    header("Location: services.php");
}
?>