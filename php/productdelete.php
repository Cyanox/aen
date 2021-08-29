<?php
require_once __DIR__ . '/../api/dao/aen.php';
if (isset($_SESSION["username"])){
    require_once '../api/dao/aen.php';
    $user = ['username' => $_SESSION["username"]];
    $userRank = getUserRank($user);
    if ($userRank["rank"] < 2){
        header('Location: /aen/error.php?error=banned');}
}
if (isset($_GET['ref'])){
    $ref = [
        'reference' => $_GET['ref']];
    deleteProduct($ref);
    header("Location: products.php");
}
?>
