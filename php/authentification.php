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

    $user = [
      'username' => $username,
      'password' => sha1($password)
    ];

    $result = getUser($user);

    if($result != false){
      $_SESSION['username'] = $username;
      $_SESSION['rank'] = $result['rank'];
      header("Location: ../index.php");
    }
    else
    {
        header('Location:login.php?error');
    }

}else{
    echo'erreur';}
?>
