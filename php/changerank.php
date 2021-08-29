<?php
require_once '../api/utils/database.php';
require_once '../api/dao/aen.php';
session_start();
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $rank = $_GET['setrank'];

    $user = [
      'id' => $id,
      'rank'=> $rank
    ];

    updateUser($user);
    header("Location: dashboard.php");
}else{
    echo'erreur';}
?>
