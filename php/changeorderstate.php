<?php
require_once '../api/utils/database.php';
require_once '../api/dao/aen.php';
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $state = $_GET['setrank'];

    $order = [
        'id' => $id,
        'state'=> $state
    ];

    updateBill($order);
    header("Location: orders.php");
}else{
    echo'erreur';}
?>









