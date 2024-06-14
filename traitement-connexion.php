<?php
session_start();
require 'database.php';
//!Page de connexion
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //message d erreur
    if(empty($_POST['login']) || empty($_POST['motPasse'])){
        $_SESSION['loginError'] = "Les données d'authentification sont obligatoires";
        header('Location: connexion.php');
        exit;
    }else{
        // authentification
        $statement = $pdo -> prepare('SELECT * FROM client WHERE login = :login and motPasse = :motPasse');
        $statement -> execute([
            ':login' => $_POST['login'],
            ':motPasse' => $_POST['motPasse']
        ]);
        $client = $statement -> fetch(PDO::FETCH_ASSOC);
        if($client){
            $_SESSION['id_client'] = $client['id_client'];
            $_SESSION['nom'] = $client['nom'];
            $_SESSION['cin'] = $client['cin'];
            unset($_SESSION["loginError"]);
            header("Location: reservationEncours.php");
            exit;
        }else{
            $_SESSION['loginError'] = "Les données d'authentification sont incorrects ";
            header('Location: connexion.php');
            exit;
        }
    }
}