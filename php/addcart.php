<?php
require_once '../api/dao/aen.php';

if (isset($_SESSION["username"])){
    $user = $_SESSION["username"];
    $userRank = getUserRank($user);
    if ($userRank["rank"] < 1){
        header('Location: /aen/error.php?error=auth');}
}

if(isset($_GET['id'])) {
    $idUser = $_GET['id'];
    $idUserArray = [
        'user_ref' => $_GET['id']];

    $cartid = findCartByUser($idUserArray);
    var_dump($cartid);
    if (empty($cartid)){
        insertCart($idUser);
    }
    $product = [
        'cart_ref' => $cartid['id'],
        'product_ref' => $_POST['ref'],
        'reservedate' => $_POST['datereserve']
    ];
    insertCartProd($product);
    header('Location: services.php');
} else {
    header('Location: ../error.php?error=400'); // BAD_REQUEST

}


