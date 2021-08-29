<?php
// Initialiser la session
session_start();
//if(!isset($_SESSION["username"])){
//    header("Location: php/login.php");
//    exit();
//}
if (isset($_SESSION["username"])){
    require_once '../api/dao/aen.php';
    $user = ['username' => $_SESSION["username"]];
    $userRank = getUserRank($user);}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Tarifs</title>
    <link rel="icon" type="../image/png" href="../assets/image/Logo.png" />



    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <style>
        ::-webkit-scrollbar {
            display: none;
        }
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
        <a href="../index.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img src="../assets/image/Logo.png" alt="" class="me-4" width="72" height="72">
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 nav-pills">
            <li><a href="../index.php" class="nav-link px-2 link-dark">Accueil</a></li>
            <li><a href="services.php" class="nav-link px-2 link-dark">Services</a></li>
            <li><a href="#" class="nav-link px-2 bg-info active">Tarifs</a></li>
            <li><a href="about.php" class="nav-link px-2 link-dark">À propos</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <?php
            if(!isset($_SESSION["username"])){
                echo '<a href="../php/login.php" class="btn btn-outline-primary me-2">Connexion</a>';
            }


            else{
                echo '<a href="../php/profile.php" class="link-dark me-2">
<svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
</svg></a>';
            }
            if (isset($_SESSION["username"])){
                if($userRank['rank'] == 2){
                    echo '<a href="../php/dashboard.php" class="btn btn-outline-warning me-2">Administration</a>';
                }
                echo '<a href="../php/logout.php" class="btn btn-outline-danger">Déconnexion</a>';
            }else{
                echo '<a href="../php/useradd.php" class="btn btn-primary">Inscription</a>';
            }

            ?>
        </div>
    </header>
</div>
<div class="container">
    <div class="row justify-content-center">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mx-auto">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h4">Redevance d'atterrissage</h1>
                </div>
                <table class="table table-bordered table-light table-hover border-dark">
                    <thead>
                    <tr>
                        <th colspan="2" scope="col">Type d'avion</th>
                        <th scope="col">Hors Taxes</th>
                        <th scope="col">TVA</th>
                        <th scope="col">TTC</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td rowspan="4" scope="row">Mono-turbine Bi-turbine</td>
                        <td>Week-end/JF (non basé)</td>
                        <td>34.50€</td>
                        <td>6.90€</td>
                        <td>41.40€</td>
                    </tr>
                    <tr>
                        <td>Semaine (non basé)</td>
                        <td>31.17€</td>
                        <td>6.23€</td>
                        <td>37.40€</td>
                    </tr>
                    <tr>
                        <td>Avion basé (mensuel)</td>
                        <td>113.00€</td>
                        <td>22.60€</td>
                        <td>135.60€</td>
                    </tr>
                    <tr>
                        <td>Avion basé (unité)</td>
                        <td>15.25€</td>
                        <td>3.05€</td>
                        <td>18.30€</td>
                    </tr>
                    <tr>
                        <td rowspan="4" scope="row">Réacteur mono/multi</td>
                        <td>Week-end/JF (non basé)</td>
                        <td>41.17€</td>
                        <td>8.23€</td>
                        <td>49.40€</td>
                    </tr>
                    <tr>
                        <td>Semaine (non basé)</td>
                        <td>31.17€</td>
                        <td>7.43€</td>
                        <td>44.60€</td>
                    </tr>
                    <tr>
                        <td>Avion basé (mensuel)</td>
                        <td>120.00€</td>
                        <td>24.00€</td>
                        <td>144.00€</td>
                    </tr>
                    <tr>
                        <td>Avion basé (unité)</td>
                        <td>18.00€</td>
                        <td>3.60€</td>
                        <td>21.60€</td>
                    </tr>
                    </tbody>
                </table>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <p>Le tarif est multiplié par un coefficient dépendant du groupe acoustique de l'aéronef et de l'heure de l'atterrissage.</p>
            </div>
            <table class="table table-bordered table-light table-hover border-dark">
                <thead>
                <tr>
                    <th scope="col">Groupe acoustique</th>
                    <th scope="col">Jour et soir (6h00-22h00)</th>
                    <th scope="col">Nuit (22h00-6h00)</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td scope="row">1</td>
                    <td>1.300</td>
                    <td>4.000</td>
                </tr>
                <tr>
                    <td scope="row">2</td>
                    <td>1.200</td>
                    <td>1.800</td>
                </tr>
                <tr>
                    <td scope="row">3</td>
                    <td>1.150</td>
                    <td>1.725</td>
                </tr>
                <tr>
                    <td scope="row">4</td>
                    <td>1.000</td>
                    <td>1.500</td>
                </tr>
                <tr>
                    <td scope="row">5a</td>
                    <td>0.850</td>
                    <td>1.275</td>
                </tr>
                <tr>
                    <td scope="row">5b</td>
                    <td>0.700</td>
                    <td>1.050</td>
                </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
                <h1 class="h4">Redevance d'atterrissage pour hélicoptères ou ULM non basés
                </h1>
            </div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <p>La redevance d'atterrissage est minorée de 50% (deux premières lignes du tableau précédent pour les ULM).</p>
            </div>

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
                <h1 class="h4">Frais de dossiers</h1>
            </div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <p>Le total de la facture impayée le jour du mouvement est majoré de 31 € (25,83 € HTVA) pour frais de recherches et de dossier.</p>
            </div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h4">Redevance balisage (par unité de 30 minutes)
                </h1>
            </div>
            <table class="table table-bordered table-light table-hover border-dark">
                <thead>
                <tr>
                    <th scope="col">Hors Taxes</th>
                    <th scope="col">TVA</th>
                    <th scope="col">TTC</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>13.00€</td>
                    <td>2.60€</td>
                    <td>15.60€</td>
                </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
                <h1 class="h4">Frais de nettoyage</h1>
            </div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <p>Variables.</p>
            </div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3">
                <h1 class="h4">Redevance pour stationnement extérieur</h1>
            </div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2">
                <p>(par m² de surface au sol et par semaine indivisible - franchise de 2 semaines)</p>
            </div>
            <table class="table table-bordered table-light table-hover border-dark">
                <thead>
                <tr>
                    <th scope="col">Hors Taxes</th>
                    <th scope="col">TVA</th>
                    <th scope="col">TTC</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>2.30€</td>
                    <td>0.46€</td>
                    <td>2.76€</td>
                </tr>
                </tbody>
            </table>

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3">
                <h1 class="h4">Redevance d'abris</h1>
            </div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2">
                <p>avec S = longueur * envergure, et M = masse maximum au décollage.</p>
            </div>
            <table class="table table-bordered table-light border-dark">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">S < 60m²</th>
                    <th scope="col">60m² ≤ S < 100m²</th>
                    <th scope="col">100m² < S</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>M < 0.5t</td>
                    <td class="table-dark"></td>
                    <td class="table-dark"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>0.5 ≤ M < 1t</td>
                    <td class="table-dark"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>1t < M</td>
                    <td></td>
                    <td></td>
                    <td class="table-active"></td>
                </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3">
                <h1 class="h4">Catégories</h1>
            </div>
            <table class="table table-bordered table-light table-hover border-dark">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th colspan="2" scope="col">Tarif mensuel aéronefs basés</th>
                    <th colspan="2" scope="col">Tarif journalier aéronefs basés</th>
                    <th colspan="2" scope="col">Tarif journalier aéronefs non-basés</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td>HT</td>
                    <td>TTC</td>
                    <td>HT</td>
                    <td>TTC</td>
                    <td>HT</td>
                    <td>TTC</td>
                </tr>
                <tr>
                    <td scope="row">Cat 1</td>
                    <td>150,00 €</td>
                    <td>180,00 €</td>
                    <td>5,50 €</td>
                    <td>6,60 €</td>
                    <td>9,38 €</td>
                    <td>11,25 €</td>
                </tr>
                <tr>
                    <td class="table-dark" scope="row">Cat 2</td>
                    <td>116,67 €</td>
                    <td>140,00 €</td>
                    <td>4,33 €</td>
                    <td>5,20 €</td>
                    <td>7,29 €</td>
                    <td>8,75 €</td>
                </tr>
                <tr>
                    <td scope="row">Cat 3</td>
                    <td>70,83 €</td>
                    <td>85,00 €</td>
                    <td>2,63 €</td>
                    <td>3,15 €</td>
                    <td>4,42 €</td>
                    <td>5,30 €</td>
                </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3">
                <h1 class="h4">Produits pétroliers</h1>
            </div>
            <table class="table table-bordered table-light table-hover border-dark">
                <thead>
                <tr>
                    <th scope="col">PRODUIT</th>
                    <th scope="col">HT</th>
                    <th scope="col">TVA 20%</th>
                    <th scope="col">TTC</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>JETA1 Sans TIC</td>
                    <td>1,01 €</td>
                    <td>0,20 €</td>
                    <td>1,21 €</td>
                </tr>

                <tr>
                    <td>JETA1 A1 + TIC</td>
                    <td>1,36 €</td>
                    <td>0,27 €</td>
                    <td>1,63 €</td>
                </tr>

                <tr>
                    <td>AVGAS 100LL sans TIC</td>
                    <td>1,50 €</td>
                    <td>0,30 €</td>
                    <td>1,80 €</td>
                </tr>

                <tr>
                    <td>AVGAS 100ll TIC</td>
                    <td>1,92 €</td>
                    <td>0,38 €</td>
                    <td>2,30 €</td>
                </tr>

                </tbody>
            </table>

    </div>
        </main>
    </div>
</div>


<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="../dashboard.js"></script>
</body>
</html>
