<?php
require_once '../api/utils/database.php';
require_once '../api/dao/lep.php';
session_start();
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $rank = $_GET['setrank'];
    updateUser($id, $rank);
    header("Location: dashboard.php");
}else{
    echo'erreur';}
?>
