<?php
require_once '../api/dao/aen.php';

if (isset($_SESSION["username"])){
    $user = $_SESSION["username"];
    $userRank = getUserRank($user);
    if ($userRank["rank"] < 1){
        header('Location: /aen/error.php?error=auth');}
}

if(isset($_GET['user'])) {
    $idUser = $_GET['user'];
    $idUserArray = [
        'user_ref' => $_GET['user']];
    $cartid = findCartByUser($idUser);

    $bill = [
        'user_ref' => $idUser,
        'date' => date_format(date_create(), 'Y-m-d'),
    ];




    $billId = insertBill($bill);


    $cart = getCartContent($cartid['0']);


    foreach ($cart as $product) {
        $productBill = [
        'order_ref' => $billId,
        'reference' => $product['product_ref'],
        'reservedate' => $product['reservedate']
        ];

        $productToDelete = [
            'id' => $product['id']
        ];
        deleteCartProduct($productToDelete);
        insertBillProd($productBill);

        }


    header('Location: services.php');
} else {
   header('Location: ../error.php?error=400'); // BAD_REQUEST
}