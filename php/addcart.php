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

    $cartid = findCartByUser($idUser);
    if (empty($cartid)){
        insertCart($idUserArray);
    }

    $cartid = findCartByUser($idUser);

    $idprod = ['product_ref' => $_POST['ref']];
    $product = getOneProductRefNo($idprod);
    $product['0']['reservedate'] = $_POST['datereserve'];
    $product['0']['cart_ref'] = $cartid['0']['id'];
    $productarray = [
        'cart_ref' => $product['0']['cart_ref'],
        'reference' => $product['0']['reference'],
        'reservedate' => $product['0']['reservedate']
    ];
    insertCartProd($productarray);
    header('Location: services.php');
} else {
    header('Location: ../error.php?error=400'); // BAD_REQUEST
}


