<?php
// Initialiser la session
session_start();
//if(!isset($_SESSION["username"])){
//    header("Location: php/login.php");
//    exit();
//}
if (isset($_SESSION["username"])){
    require_once '../api/dao/aen.php';
    $user = $_SESSION["username"];
    while($userRank = getUserRank($user)){
        if ($userRank == null){
            echo $userRank;}
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>À propos</title>
    <link rel="icon" type="../image/png" href="assets/image/Logo.png" />





    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img src="../assets/image/Logo.png" alt="" class="me-4" width="72" height="72">
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="../index.php" class="nav-link px-2 link-dark">Accueil</a></li>
            <li><a href="services.php" class="nav-link px-2 link-dark">Services</a></li>
            <li><a href="prices.php" class="nav-link px-2 link-dark">Tarifs</a></li>
            <li><a href="#" class="nav-link px-2 link-secondary">À propos</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <a href="login.php" class="btn btn-outline-primary me-2">Connexion</a>
            <?php
            if (isset($_SESSION["username"])){
                echo '<a href="logout.php" class="btn btn-outline-danger">Déconnexion</a>';
            }else{
                echo '<a href="useradd.php" class="btn btn-primary">Inscription</a>';
            }

            ?>
        </div>
    </header>
</div>
<div class="container">
    <div class="row justify-content-center">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mx-auto">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h4">À propos</h1>
            </div>

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <p>Le principe de fonctionnement de l'aérodrome est le suivant : tout pilote souhaitant faire escale à
                    AEN doit au préalable ouvrir un compte client s'il n'en possède pas déjà un, puis spécifier les services
                    dont il veut bénéficier (atterrissage, avitaillement, stationnement, nettoyage intérieur avion ou
                    autres prestations, informations météorologiques). Il peut ensuite en profiter aux dates indiquées, à
                    condition de valider sa demande 24 heures avant son atterrissage.</p>

    </div>
    </main>
</div>
</div>


<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="../dashboard.js"></script>
</body>
</html>
