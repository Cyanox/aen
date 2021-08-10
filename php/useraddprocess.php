<?php
// Initialiser la session
session_start();
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
}
require_once __DIR__ . '/../api/dao/lep.php';
require_once __DIR__ . '/../api/utils/server.php';

if($_POST["firstname"]!== '' && $_POST["lastname"]!== '' && $_POST["username"]!== '' && $_POST["rank"]!== '' && $_POST["password"]!== '' && $_POST["passwordValidate"]!== ''){
    if($_POST["password"]==$_POST["passwordValidate"]){
        $login = $_POST["username"];
        $firstname= $_POST["firstname"];
        $lastname= $_POST["lastname"];
        $rank= $_POST["rank"];
        $password= $_POST["password"];
        echo $login, $firstname, $rank;
        if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
            header("Location: useradd.php?error=username");
        }
        if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
            header("Location: useradd.php?error=firstname");
        }
        if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
            header("Location: useradd.php?error=lastname");
        }
        insertUser($login,$password,$firstname,$lastname,$rank);
        header("Location: dashboard.php?error=success");
    }else{
        header("Location: useradd.php?error=password");
    }

}else{
    header("Location: useradd.php?error=missing");
}
?>