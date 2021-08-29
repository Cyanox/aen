<?php
require_once __DIR__ . '/../api/dao/aen.php';
if (isset($_SESSION["username"])){
    require_once '../api/dao/aen.php';
    $user = ['username' => $_SESSION["username"]];
    $userRank = getUserRank($user);
    if ($userRank["rank"] < 2){
        header('Location: /aen/error.php?error=banned');}
}
if (isset($_GET['ref'])){
  $product = [
    'reference' => $_GET['ref']
  ];
<<<<<<< HEAD
  var_dump($product);

=======
>>>>>>> 1d5d6c8337bcb4ae354d155548b164f054eb4027
    deleteProduct($product);
    header("Location: products.php");
}
?>
