<?php
require 'database.php';
$statement = $pdo->prepare('SELECT * FROM type_hotel');
$statement->execute();
$types = $statement->fetchAll(PDO::FETCH_ASSOC);
