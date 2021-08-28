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
    $userRank = getUserRank($user);}
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

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 nav-pills">
            <li><a href="../index.php" class="nav-link px-2 link-dark">Accueil</a></li>
            <li><a href="#" class="nav-link px-2 bg-dark active">Services</a></li>
            <li><a href="prices.php" class="nav-link px-2 link-dark">Tarifs</a></li>
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
                <h1 class="h4">Services</h1>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                $productsNames = getProductNames();
                var_dump($productsNames);
                foreach ($productsNames as $value){
                    $productName = $value['name'];
                    var_dump($productName);
                    $products = getOneProduct("$productName");
                    var_dump($products);
                    echo '
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">'.$name.'</h5>
                                    <p class="card-text">'.$type.'</p>
                                    <button onclick="sendRequest(\''.$link.'\' )" class="btn btn-primary" >Ajouter au panier</button>
                                </div>
                            </div>
                        </div>';}
                    foreach ($products as $key){

                        $name = $key['name'];
                        $type = $key['type'];
                        $id = $key['reference'];
                        $desc = $key['description'];
                        $link = "addcart.php?id=$id";

                }
                ?>
                <script>
                    function sendRequest(link){
                        var xmlHttp = new XMLHttpRequest();
                        xmlHttp.open( "GET", link, false );
                        xmlHttp.send( null );
                        document.open();
                        document.write(xmlHttp.response);
                        document.close();
                    }
                </script>
            </div>
        </main>
    </div>
</div>


<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="../dashboard.js"></script>
</body>
</html>
