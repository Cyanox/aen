<?php
// Initialiser la session
session_start();
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
if (isset($_SESSION["username"])){
    require_once '../api/dao/aen.php';
    $user = ['username' => $_SESSION["username"]];
    $userRank = getUserRank($user);
    if ($userRank["rank"] < 2){
        header('Location: /aen/error.php?error=banned');}
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajout de Services</title>
    <link rel="icon" type="image/png" href="../assets/image/Logo.png"
    <link href="../css/custom.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/signin.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container">
    <main>
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="../assets/image/Logo.png" alt="" width="144" height="114">
            <h2>Ajouter un service</h2>
            <p class="lead">Completez ce formulaire en renseignant les informations requises.</p>
        </div>
        <div class="row"
        <div class="col-md-7 col-lg-8">
            <script src="../js/lep.js"></script>
            <form method="POST" action="productaddprocess.php" class="row g-3">
                <div class="col-md-4">
                    <label for="ref" class="form-label">Référence</label>
                    <div class="input-group">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-hash"
                                                                    viewBox="0 0 16 16"><path
                                                d="M8.39 12.648a1.32 1.32 0 0 0-.015.18c0 .305.21.508.5.508.266 0 .492-.172.555-.477l.554-2.703h1.204c.421 0 .617-.234.617-.547 0-.312-.188-.53-.617-.53h-.985l.516-2.524h1.265c.43 0 .618-.227.618-.547 0-.313-.188-.524-.618-.524h-1.046l.476-2.304a1.06 1.06 0 0 0 .016-.164.51.51 0 0 0-.516-.516.54.54 0 0 0-.539.43l-.523 2.554H7.617l.477-2.304c.008-.04.015-.118.015-.164a.512.512 0 0 0-.523-.516.539.539 0 0 0-.531.43L6.53 5.484H5.414c-.43 0-.617.22-.617.532 0 .312.187.539.617.539h.906l-.515 2.523H4.609c-.421 0-.609.219-.609.531 0 .313.188.547.61.547h.976l-.516 2.492c-.008.04-.015.125-.015.18 0 .305.21.508.5.508.265 0 .492-.172.554-.477l.555-2.703h2.242l-.515 2.492zm-1-6.109h2.266l-.515 2.563H6.859l.532-2.563z"/>
                                    </svg></span>
                        <input type="text" class="form-control" id="ref" name="ref" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="name" class="form-label">Nom</label>
                    <div class="input-group">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-pen"
                                                                    viewBox="0 0 16 16"><path
                                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                    </svg></span>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="type" class="form-label">Type</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="type" name="type" required>
                    </div>
                </div>

                <div class="input-group">
                    <label for="desc" class="form-label">Description</label>
                    <textarea class="form-control" id="desc" name="desc"></textarea>
                </div>

                <div class="col-md-4">
                    <label for="provider" class="form-label">Prix HT</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="ht" name="ht" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="tva" class="form-label">TVA</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="tva" name="tva" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="ttc" class="form-label">Prix TTC</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="ttc" name="ttc" required>
                    </div>
                </div>
                <div class="col-1 pt-3">
                    <a href="products.php" class="btn btn-danger align-self-end">Annuler</a>
                </div>
                <div class="col-1 pt-3 ps-3">
                    <button class="btn btn-success align-self-end">Ajouter</button>
                </div>

            </form>
        </div>
</div>
</main>
</div>
</body>
</html>
