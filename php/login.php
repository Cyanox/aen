<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Identification</title>




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
        <img class="mb-4" src="../assets/image/Logo_LEP_NOBG.png" alt="" width="288" height="228">

        <div class="form-floating mb-1">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Identifiant</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe">
            <label for="floatingPassword">Mot de passe</label>
        </div>

</label>
        </div>
        <button class="w-100 btn btn-lg btn-outline-secondary" type="submit">Connexion</button>
    </form>
</main>



</body>
</html>
