<?php
// Initialiser la session
session_start();
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion

require_once __DIR__ . '/../api/dao/aen.php';
require_once __DIR__ . '/../api/utils/server.php';

if($_POST["firstname"]!== '' && $_POST["lastname"]!== '' && $_POST["username"]!== '' && $_POST["birthdate"]!== '' && $_POST["password"]!== '' && $_POST["address"]!== '' && $_POST["zipcode"]!== '' && $_POST["country"]!== ''){
    if($_POST["password"]==$_POST["passwordValidate"]){
        $login = $_POST["username"];
        $firstname= $_POST["firstname"];
        $lastname= $_POST["lastname"];
        $password= $_POST["password"];
        $birthdate= $_POST["birthdate"];
        $address= $_POST["address"];
        $zipcode= $_POST["zipcode"];
        $country= $_POST["country"];
        if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
            header("Location: useradd.php?error=username");
        }
        if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
            header("Location: useradd.php?error=firstname");
        }
        if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
            header("Location: useradd.php?error=lastname");
        }
        insertUser($login,$password,$firstname,$lastname,$birthdate,$address,$zipcode,$country);
        header("Location: ../index.php");
    }else{
        header("Location: useradd.php?error=password");
    }

}else{
    header("Location: useradd.php?error=missing");
}
?>