<?php
if (isset($_SESSION['pseudo'])) {
    $pseudo = $_SESSION['pseudo'];
} else {
    header('location: admin.html');
}
?>
<article>
    <h1>Saisir une recette</h1>
    <div class="box">
        <?= $message; ?>
        <form method="post" action="">
            <b>Recette :</b>
            <p><input type="text" name="nomRecette" placeholder="Nom De La Recette" /></p>
            <p><textarea name="description" placeholder="Description"></textarea></p>
            <label for="chefs">Chef ayant réalisé la recette:</label>
            <p><select name="chefID" id="selectionDuChef">
                    <?php
                    foreach ($chefs as $chef) {
                    ?>
                        <option value="<?= $chef->getChefID(); ?>"><?= $chef->getPrenomDuChef(); ?> <?= $chef->getNomDuChef(); ?></option>
                    <?php
                    }
                    ?>
                </select></p>

                <label for="inputDuree">Temps de réalisation :</label>
                <p name="inputDuree">
                    <input type="number" name="heure" id="heure" maxlength="60" placeholder="Heures">
                    <input type="number" name="minute" id="minute" maxlength="60" placeholder="Minutes">
                    <input type="number" name="seconde" id="seconde" maxlength="60" placeholder="Secondes">
                    <input type="hidden" id="duree" name="duree"> 
                </p>    
                

            <b>Échelles :</b>
            <p><input type="number" name="difficulte" placeholder="Difficulté"></input></p>
            <p><input type="number" name="cout" placeholder="Coût" /></p>

            <b>Liste des ingrédients :</b>

            <div id="ingredients">

                <div class="divIngredient">

                    <label>
                        Ingrédient :
                        <input name="ingredient" type="text" class="inputIngredient1">
                    </label>

                    <label>
                        Quantité :
                        <input name="quantite" type="text" class="inputIngredient1">
                    </label>

                    <label>
                        Unité de mesure :
                        <input name="uniteMesure" type="text" class="inputIngredient1">
                    </label>

                </div>

            </div>

            <div class="boutonsIngredients">
                <button type="button" class="ajoutIngredient" onclick="ajoutIngredient()">Ajouter Un ingrédient</button>
                <button type="button" class="suppressionIngrédient" onclick="suppressionIngredient()">Supprimer Un ingrédient</button>
            </div>


            <b>Étapes :</b>
            <p id="etapes">

                <label>
                    Étape N° 1
                    <input type="text" class="inputEtape" id="etape1">
                </label>

            <div class="boutonsEtapes">
                <button type="button" class="ajoutEtape" onclick="ajoutEtape()">Ajouter Une Étape</button>
                <button type="button" class="suppressionEtape" onclick="suppressionEtape()">Supprimer Une Étape</button>
            </div>
            </p>

            <input type="hidden" name="etapeDescription" id="listeEtapes">
            <input type="hidden" name="listeIngredients" id="listeIngredients">


            <p>Afficher la recette sur le site : <input type="checkbox" id="checkboxVisibilite"></p>
            <input type="hidden" name="visibilite" id="visibilite">

            <p><input id="soumission" type="submit" value="Créer la fiche recette" onclick="concatenationEtapes()" /></p>

        </form>
    </div>
</article>