<?php
require_once __DIR__ . '/../api/dao/lep.php';

if (isset($_GET['ref'])){
    $ref = $_GET['ref'];
    deleteProduct($ref);
    header("Location: products.php");
}

?>