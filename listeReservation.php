<?php
require 'listeDeroulante.php';
$reservations = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['type'])){
    $type = $_POST['type'];
    $statement = $pdo->prepare(' SELECT reservation.*, client.nom, client.prenom, hotel.titre, type_hotel.nombre_etoile 
            FROM reservation 
            JOIN client ON reservation.id_client = client.id_client 
            JOIN hotel ON reservation.id_hotel = hotel.id_hotel 
            JOIN type_hotel ON hotel.id_type = type_hotel.id_type 
            WHERE hotel.id_type = :type
    ');
    $statement->execute([':type' => $type]);
    $reservations = $statement->fetchAll(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html>  
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Liste des reservation</title>
    </head>
    <body class="bg-gray-200">
    <div class="heading text-center font-bold text-3xl m-5 text-red-500">Liste des reservation selon le type d'hotel</div>
    <div class="heading text-center text-l m-5 text-black-400">Veuillez remplir tous les champs</div>
<style>
  body {background:white !important;}
</style>
  <!-- formulaire pour saisir les dates -->
    <form action="" method="POST">
        <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
            <div>
                <label for="type"  class="mb-2 block text-base font-medium text-[#07074D]" > Type d'hotel </label>
                <select name="type" id="type" class="w-full bg-gray-100 p-2 mb-4 rounded-md border border-[#e0e0e0] text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" >
                    <option value="" selected disabled>Selectionnez le type d'hotel</option>
                    <?php foreach ($types as $type) :?>
                        <option value="<?php echo $type['id_type']; ?>">
                            <?php echo $type['nombre_etoile']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <!-- buttons -->
            <div class="buttons flex">
            <input  class="btn border border-red-500 p-1 px-4 font-semibold cursor-pointer text-gray-100 ml-2 bg-red-500 hover:bg-red-600" type="submit" value="Chercher">
            </div>
        </div>
    </form>

    <!-- table d'affichage -->
    <table class="min-w-full border-collapse block md:table mt-5">
		<thead class="block md:table-header-group">
			<tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">ID Reservation</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Titre hotel</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell"> Type Hotel</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Nom Client</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Prénom Client</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Date Début Séjour</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Date Fin Séjour</th>
			</tr>
		</thead>
		<tbody class="block md:table-row-group">
            <?php foreach ($reservations as $reservation): ?>
                <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><?php echo $reservation['id_reserv'] ;?></td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><?php echo $reservation['titre'] ?></td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><?php echo $reservation['nombre_etoile'] ?></td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><?php echo $reservation['nom'] ?></td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><?php echo $reservation['prenom'] ?></td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><?php echo $reservation['date_debut_sejour'] ?></td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><?php echo $reservation['date_fin_sejour'] ?></td>

                </tr>	
            <?php endforeach; ?>
		</tbody>
	</table>

    </body>
</html>