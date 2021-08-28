<?php
require_once '../api/utils/database.php';
require_once '../api/dao/aen.php';
session_start();
if (isset($_POST['username'])){

    $username = $_POST['username'];
    // echo $username;
    // echo " ";


    $password = $_POST['password'];
    // echo $password;
    // echo " ";

    $result = getUser($username, $password);
    var_dump($result);


    $rows = count($result);
    echo $rows;
    echo " ";

    if($rows==4){
        $_SESSION['username'] = $username;
        $_SESSION['rank'] = $result['rank'];
        header("Location: ../index.php");
    }else{
        //header('Location:login.php?error');
        echo "BONJOUR";
    }
}else{
    echo'erreur';}
?>
