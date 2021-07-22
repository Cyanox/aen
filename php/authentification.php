<?php
//Affichage des erreurs php
error_reporting(E_ALL);
ini_set('display-errors','on');

//démarrage des sessions
if(session_id() == '') {
    session_start();
}

//connexion à la bdd
require_once '../api/utils/database.php';
require_once '../api/dao/lep.php';

//récupération PROPRE des variables AVANT de les utiliser
$login = !empty($_POST['login']) ? trim($_POST['login']) : NULL;
$pass = !empty($_POST['pass']) ? trim($_POST['pass']) : NULL;

$errMsg = array();

//traitement du formulaire
if(isset($_POST['submit'])){
    $errMsg = '';
    //login and password sent from Form
    if(!$login){
        $errMsg[] = 'Veuillez entrer votre nom<br>';
    }

    if(!$pass){
        $errMsg[] = 'Veuillez entrer votre mot de passe<br>';
    }

    if(empty($errMsg)){

        //preparation de la requete
        $sql = 'SELECT id,login,pass FROM  matable WHERE login = :login AND pass = :pass';
        $datas = array(':login'=>$login , ':pass'=>$pass);

        //execution de la requete
        try{
            $records = $bdd->prepare($sql);
            $records->execute($datas);
        }catch(Exception $e){
            echo "<p>Erreur : " . $e->getMessage() . "</p>";
            exit();
        }

        $results = $records->fetchAll(PDO::FETCH_ASSOC);

        if(count($results) > 0 ){
            $_SESSION['login'] = $results['login'];
            header('location:dashboard.php');
            exit();
        }else{
            $errMsg[] = 'Vérifiez vos identifiants de connexion<br>';
        }
    }
}

?>
