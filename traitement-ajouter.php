<?php
require 'database.php';

// ! traitement ajouter 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(empty($_POST['titre']) || empty($_POST['adresse']) || empty($_POST['prix_par_nuit'])
     || empty($_POST['type']) || empty($_POST['nombre_de_places'])){

        echo '<script>alert("Veuillez remplir tous les champs.")</script>';
        
    }else{

        $titre = $_POST['titre'];
        $adresse = $_POST['adresse'];
        $prix_par_nuit = $_POST['prix_par_nuit'];
        $type = $_POST['type'];
        $nombre_de_places = $_POST['nombre_de_places'];

        $statement = $pdo -> prepare('INSERT INTO hotel (titre, adresse, prix_par_nuit, id_type, nombre_de_places) 
        value (:titre , :adresse , :prix_par_nuit , :type , :nombre_de_places)');
        $statement -> execute([
            ':titre' => $titre,
            ':adresse' => $adresse ,
            'prix_par_nuit' => $prix_par_nuit,
            ':type' => $type,
            ':nombre_de_places' => $nombre_de_places
        ]);
        header("Location: listesHotel.php");
        exit;
    }
       
    
}