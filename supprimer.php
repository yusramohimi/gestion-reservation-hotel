<?php 
require 'database.php';
// ! supprimer GET
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $statement = $pdo -> prepare('DELETE FROM hotel WHERE id_hotel = :id_hotel');
    $statement -> execute([
        ':id_hotel' => $id
    ]);
}
header('Location: listesHotel.php');
exit;