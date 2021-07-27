<?php
require_once '../api/utils/database.php';
require_once '../api/dao/lep.php';
session_start();
if (isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = getUser($username, $password);
    $rows = mysqli_num_rows($result);
    if($rows==1){
        $_SESSION['username'] = $username;
        header("Location: index.php");
    }else{
        header('Location:login.php?error');
    }
}else{
    echo'erreur';}
?>
