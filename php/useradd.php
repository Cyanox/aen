<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Inscription</title>
    <link rel="icon" type="image/png" href="../assets/image/Logo.png"



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
    <main>
        <div class="py-5 text-center">
            <a href="../index.php">
            <img class="d-block mx-auto mb-4" src="../assets/image/Logo.png" alt="" width="144" height="114"> </a>
            <h2>Ajout d'un utilisateur</h2>
            <p class="lead">Completez ce formulaire en renseignant les informations requises.</p>
        </div>
        <div class="row"
        <div class="col-md-7 col-lg-8">
            <script src="../js/lep.js"></script>
            <form action="useraddprocess.php" method="post" class="row g-3 needs-validation" novalidate>
                <div class="col-md-4">
                    <label for="lastname" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="firstname" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="username" class="form-label">Identifiant</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="login"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
  <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
</svg></span>
                        <input type="text" class="form-control" id="username" name="username" placeholder="identifiant@example.com" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Merci de saisir un identifiant.
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="address" class="form-label">Adresse</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="login"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
  <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
</svg></span>
                        <input type="text" class="form-control" id="address" name="address" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Merci de saisir une adresse.
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="zipcode" class="form-label">Code postal</label>
                    <input type="text" class="form-control" id="zipcode" name="zipcode" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="country" class="form-label">Pays</label>
                    <input type="text" class="form-control" id="country" name="country" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="birthdate" class="form-label">Date de naissance</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="login"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
</svg>
</svg></span>
                        <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="DD/MM/YYYY" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Merci de saisir une adresse.
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="password" class="form-label">Mot de passe</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                            </svg></span>
                        <input type="password" class="form-control" id="password" name="password" aria-describedby="inputGroupPrepend" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationpassword" class="form-label">Confirmation du mot de passe</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                            </svg></span>
                        <input type="password" class="form-control" id="validationpassword" name="passwordValidate" aria-describedby="inputGroupPrepend" required>
                    </div>
                </div>
                <?php
                if (isset($_GET["error"])){
                    switch ($_GET["error"]){
                        case "missing":
                            echo'<div class="alert alert-danger" role="alert">Merci de remplir tous les champs!</div>';
                        case "password":
                            echo'<div class="alert alert-danger" role="alert">Merci de fournir des mots de passe identiques!</div>';
                        case "username":
                            echo'<div class="alert alert-danger" role="alert">Merci de fournir une adresse mail valide!</div>';
                        case "firstname":
                            echo'<div class="alert alert-danger" role="alert">Merci de fournir un prénom valide!</div>';
                        case "lastname":
                            echo'<div class="alert alert-danger" role="alert">Merci de fournir un nom valide!</div>';
                    }

                }
                ?>
                <div class="col-3 align-center">
                    <button class="btn btn-success align-self-end" type="submit">Ajouter</button>
                </div>
            </form>
        </div>
</div>
</main>
</div>


<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="../dashboard.js"></script>
</body>
</html>
