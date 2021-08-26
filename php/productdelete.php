<?php
require_once __DIR__ . '/../api/dao/aen.php';

if (isset($_GET['ref'])){
    $ref = $_GET['ref'];
    deleteProduct($ref);
    header("Location: products.php");
}

?>