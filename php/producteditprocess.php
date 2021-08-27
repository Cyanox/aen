<?php
if (isset($_SESSION["username"])){
    require_once '../api/dao/aen.php';
    $user = $_SESSION["username"];
    $userRank = getUserRank($user);
    if ($userRank["rank"] < 0){
        header('Location: error.php?error=banned');}
}?>