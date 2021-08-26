<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Identification</title>
    <link rel="icon" type="image/png" href="../assets/image/Logo.png"



    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

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


    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
</head>
<body class="text-center">

<main class="form-signin">
    <form method="post" action="authentification.php">
        <a href="../index.php">
            <img class="mb-4" src="../assets/image/Logo.png" alt="" width="288" height="228"></a>

        <div class="form-floating mb-1">
            <input type="email" class="form-control" name="username" id="login" placeholder="name@example.com">
            <label for="login">Identifiant</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="pass" placeholder="Mot de passe">
            <label for="pass">Mot de passe</label>
        </div>

</label>
        <?php
        if (isset($_GET["error"])){
            echo'<div class="alert alert-danger" role="alert">
            Identifiants incorrects!
        </div>';
        }
        ?>
        </div>
        <button class="w-100 btn btn-lg btn-outline-secondary" type="submit">Connexion</button>
    </form>
</main>



</body>
</html>
