<?php
session_start();
require 'database.php';
if (!isset($_SESSION["id_client"])) {
    header("Location: connexion.php");
    exit;
}else{
    $id_client = $_SESSION['id_client'];
    $statement = $pdo -> prepare(' SELECT reservation.*, hotel.titre, type_hotel.nombre_etoile FROM reservation
    INNER JOIN client ON reservation.id_client = client.id_client
    INNER JOIN hotel ON reservation.id_hotel = hotel.id_hotel
    INNER JOIN type_hotel ON hotel.id_type = type_hotel.id_type
    WHERE reservation.id_client = :id_client 
      AND reservation.date_debut_sejour <= CURDATE() 
      AND reservation.date_fin_sejour >= CURDATE()');
    $statement -> execute([
        ':id_client' => $id_client
    ]);
    $reservations = $statement ->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Reservation en cours</title>
</head>
<body>
    <div class="heading text-center font-bold text-3xl m-5 text-blue-500">
        <?php echo ($_SESSION['nom']) . " || " . ($_SESSION['cin']); ?>
    </div>
    <table class="min-w-full border-collapse block md:table">
		<thead class="block md:table-header-group">
			<tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">ID Reservation</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Titre Hotel</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Type Hotel</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Date Début Séjour</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Date Fin Séjour</th>
			</tr>
		</thead>
		<tbody class="block md:table-row-group">
            <?php foreach ($reservations as $reservation) :?>
                <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><?php echo $reservation["id_reserv"] ?></td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><?php echo $reservation["titre"] ?></td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><?php echo $reservation["nombre_etoile"] ?></td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><?php echo $reservation["date_debut_sejour"] ?></td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><?php echo $reservation["date_fin_sejour"] ?></td>

                </tr>	
            <?php endforeach ?>
		</tbody>
	</table>
</body>
</html>
