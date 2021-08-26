<?php
require_once '../api/utils/database.php';
require_once '../api/dao/aen.php';
session_start();
if (isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = getUser($username, $password);
    $rows = count($result);
    if($rows==1){
        $_SESSION['username'] = $username;
        $_SESSION['rank'] = $result['rank'];
        header("Location: ../index.php");
    }else{
        header('Location:login.php?error');
    }
}else{
    echo'erreur';}
?>
