<?php 
require 'listeDeroulante.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Ajouter un nouvel hotel</title>
    </head>
    <body class="bg-gray-200">
    <div class="heading text-center font-bold text-3xl m-5 text-green-500">Ajouter un nouvel hotel</div>
    <div class="heading text-center text-l m-5 text-black-400">Veuillez remplir tous les champs</div>
<style>
  body {background:white !important;}
</style>
  
    <form action="traitement-ajouter.php" method="POST">
        <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
            <div>
                <label for="titre"  class="mb-2 block text-base font-medium text-[#07074D]" > Titre d'hotel</label>
                <input type="text" name="titre" id="titre" placeholder="Entrez le titre d'hotel" class="w-full bg-gray-100 p-2 mb-4 rounded-md border border-[#e0e0e0] text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>
            <div>
                <label for="adresse"  class="mb-2 block text-base font-medium text-[#07074D]" > Adresse </label>
                <input type="text" name="adresse" id="adresse" placeholder="Entrez l'adresse" class="w-full bg-gray-100 p-2 mb-4 rounded-md border border-[#e0e0e0] text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>
            <div>
                <label for="prix_par_nuit"  class="mb-2 block text-base font-medium text-[#07074D]" > Prix par nuit </label>
                <input type="text" name="prix_par_nuit" id="prix_par_nuit" placeholder="Entrez le prix par nuit"  class="w-full bg-gray-100 p-2 mb-4 rounded-md border border-[#e0e0e0] text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>
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
            <div>
                <label for="nombre_de_places"  class="mb-2 block text-base font-medium text-[#07074D]" > Nombre de places </label>
                <input type="number" name="nombre_de_places" id="nombre_de_places" placeholder="Entrez le nombre de places"  class="w-full bg-gray-100 p-2 mb-4 rounded-md border border-[#e0e0e0] text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>
            
            
            <!-- icons -->
            <div class="icons flex text-gray-500 m-2">
            <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
            <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" /></svg>
            <div class="count ml-auto text-gray-400 text-xs font-semibold">0/300</div>
            </div>
            <!-- buttons -->
            <div class="buttons flex">
            
            <input  class="btn border border-green-500 p-1 px-4 font-semibold cursor-pointer text-gray-100 ml-2 bg-green-500 hover:bg-green-600" type="submit" value="Ajouter">
            
            </div>
        </div>
    </form>
    </script>
    </body>
</html>