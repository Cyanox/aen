<?php
// Initialiser la session
require_once 'api/dao/aen.php';

session_start();
//if(!isset($_SESSION["username"])){
//    header("Location: php/login.php");
//    exit();
//}
if (isset($_SESSION["username"])){
    require_once 'api/dao/aen.php';
    $user = ['username' => $_SESSION["username"]];
    $userRank = getUserRank($user);

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Index</title>
    <link rel="icon" type="image/png" href="assets/image/Logo.png" />





    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

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
            <img src="assets/image/Logo.png" alt="" class="me-4" width="72" height="72">
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 nav-pills">
            <li><a href="#" class="nav-link px-2 nav-link bg-dark active">Accueil</a></li>
            <li><a href="php/services.php" class="nav-link px-2 link-dark">Services</a></li>
            <li><a href="php/prices.php" class="nav-link px-2 link-dark">Tarifs</a></li>
            <li><a href="php/about.php" class="nav-link px-2 link-dark">À propos</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <?php
            if(!isset($_SESSION["username"])){
                echo '<a href="php/login.php" class="btn btn-outline-primary me-2">Connexion</a>';
            }


            else{
                echo '<a href="php/profile.php" class="link-dark me-2">
<svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
</svg></a>';
            }
            if (isset($_SESSION["username"])){
                if($userRank['rank'] == 2){
                    echo '<a href="php/dashboard.php" class="btn btn-outline-warning me-2">Administration</a>';
                }
                echo '<a href="php/logout.php" class="btn btn-outline-danger">Déconnexion</a>';
            }else{
                echo '<a href="php/useradd.php" class="btn btn-primary">Inscription</a>';
            }

            ?>
        </div>
    </header>
</div>
<div class="container">
    <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mx-auto">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h4">Bienvenue sur le site de l'AEN</h1>
                </div>
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item">
                        <img src="assets/image/avion.jpg" height="480" class="d-block w-100" alt="...">

                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Du materiel au top</h1>
                                <p>Notre flotte variée propose des appareils qui sauront satisfaire toutes les envies!</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item active">
                        <img src="assets/image/avion2.jpg" height="480" class="d-block w-100" alt="...">

                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Une équipe experimentée</h1>
                                <p>Bénéficiez des conseils et enseignements de nos pilotes aguerris!</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/image/avion3.jpg" height="480" class="d-block w-100" alt="...">

                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Une région chargée d'histoire</h1>
                                <p>Profitez du passé historique de cette région, un des berceaux de l'aéronautique!</p>

                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <p>L’Aérodrome d'Evreux Normandie, créé en 1978, est un équipement qui participe activement au
                        développement économique et touristique de l'Eure. Situé à 4 km du centre-ville et à moins de 100
                        km de Paris, sa situation géographique est privilégiée. Evreux est devenue une escale appréciée des
                        pilotes de la région parisienne et de la moitié nord de l’hexagone, mais également des Belges,
                        Hollandais, Allemands, Anglais et Suisses. De plus, un aéroclub localisé dans l'aérodrome offre une
                        panoplie d'activités très demandées dans la région.
                    </p>

                </div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <p>L'aérodrome propose également au grand public, par le biais d'une association nommée AéroClub, la possibilité de s'initier à toutes les activités liées au monde des aéronefs.
                </p>

            </div>
            </div>
        </main>
    </div>
</div>


<script src="js/bootstrap.bundle.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="../dashboard.js"></script>
</body>
</html>
