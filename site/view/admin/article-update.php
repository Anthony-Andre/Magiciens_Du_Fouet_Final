<?php
if(isset($_SESSION['pseudo'])) {
	$pseudo = $_SESSION['pseudo'];
} else {
	header('location: admin.html');
}
?>
<article>
	<h1>Modifier un article</h1>
    <div class="box">
		<?= $message; ?>
        <form method="post" action="">
        	<h2>Informations recette :</h2>
            <p><input type="text" name="nomRecette" value="<?= $article->getNomRecette();?>" /></p>
            <p><textarea name="description"><?= $article->getDescription();?></textarea></p>
            <label for="chefID"><h2>Chef ayant réalisé la recette:</h2></label>
            <p><select selected="<?= $article->getChefID(); ?>" name="chefID" id="selectionDuChef">
                    <?php
	                    foreach($chefs as $chef) {
	                ?>
                            <option <?php if($article->getChefID() == $chef->getChefID()){echo 'selected="selected"';} ?> value="<?php echo $chef->getChefID(); ?>"><?php echo $chef->getPrenomDuChef(); echo (" ".$chef->getNomDuChef()); ?></option>
                            
                        
                    <?php
	                    }
	                ?>
            </select></p>

            <?php
            $dureeBdd = $article->getDuree();
            $heure = intval(abs($dureeBdd / 3600));
            $dureeBdd = $dureeBdd - ($heure * 3600);
            $minute = intval(abs($dureeBdd / 60));
            $dureeBdd = $dureeBdd - ($minute * 60);
            $seconde = $dureeBdd;
            ?>

            <label for="inputDuree">Temps de réalisation :</label>
                <div name="inputDuree">
                    <p><input type="number" name="heure" id="heure" maxlength="60" value="<?=$heure?>" placeholder="Heures"> H.</p>
                    <p><input type="number" name="minute" id="minute" maxlength="60" value="<?=$minute?>" placeholder="Minutes"> M.</p>
                    <p><input type="number" name="seconde" id="seconde" maxlength="60" value="<?=$seconde?>" placeholder="Secondes"> S.</p>
                    <input type="hidden" id="duree" name="duree"> 
                </div>    
                  


            <h2>Échelles :</h2>
            <label for="difficulte">Difficulté:  </label>
            <p><input type="number" name="difficulte" value="<?= $article->getDifficulte(); ?>" /></p>
            <label for="cout">Coût:  </label>
            <p><input type="number" name="cout" value="<?= $article->getCout(); ?>"/></p>

            <h2>Liste des ingrédients :</h2>            
            
            <div id="ingredients">

            </div>

            <div class="boutonsIngredients">
                    <button type="button" class="ajoutIngredient" onclick="ajoutIngredient()">Ajouter Un ingrédient</button>
                    <button type="button" class="suppressionIngrédient" onclick="suppressionIngredient()">Supprimer Un ingrédient</button>
                </div>    

                <script>

                var ingredientsBruts = "<?= $article->getIngredients()?>"; 
                var separationIngredients = ingredientsBruts.split('#,');
                var listeIngredients = document.getElementById("listeIngredients");  
                var divIngredients = document.getElementById("ingredients");

                for(let i=0; i < separationIngredients.length; i++){
                    var ingredient = document.createElement("div");
                    ingredient.className="divIngredient"; 
                    deuxiemeSeparation = separationIngredients[i].split(","); 
                    

                    var divIngredient = document.createElement('div');
                    var ingredients = document.getElementById("ingredients"); 
                    ingredients.appendChild(divIngredient);
                    divIngredient.className = 'divIngredient'; 
                    var label = document.createElement('label');
                    label.innerHTML = "Ingrédient : " 
                    divIngredient.appendChild(label);
                    var ingredient = document.createElement('input'); 
                    ingredient.type='text'; 
                    ingredient.className='inputIngredient'+ingredients.childElementCount;
                    ingredient.name="ingredient";
                    label.appendChild(ingredient);

                    /* Ajout du champs quantité : */ 

                    var labelQuantite = document.createElement('label'); 
                    labelQuantite.innerHTML = " Quantité : "; 
                    divIngredient.appendChild(labelQuantite); 
                    var quantite = document.createElement('input'); 
                    quantite.type="number"; 
                    quantite.name="quantite"; 
                    labelQuantite.appendChild(quantite);
                    quantite.className='inputIngredient'+ingredients.childElementCount;

                    /* Ajout de l'unité : */ 

                    var labelUniteMesure = document.createElement('label'); 
                    labelUniteMesure.innerHTML = " Unité de mesure : "; 
                    divIngredient.appendChild(labelUniteMesure); 
                    var uniteMesure = document.createElement('input'); 
                    uniteMesure.type="text"; 
                    uniteMesure.name="uniteMesure"; 
                    labelUniteMesure.appendChild(uniteMesure);
                    uniteMesure.className='inputIngredient'+ingredients.childElementCount;

                    /* Remplissage des inputs: */  

                    ingredient.innerHTML=deuxiemeSeparation[0];
                    quantite.innerHTML=deuxiemeSeparation[1];
                    uniteMesure.innerHTML=deuxiemeSeparation[2].replace('#','');
                    ingredient.value=deuxiemeSeparation[0];
                    quantite.value=deuxiemeSeparation[1];
                    uniteMesure.value=deuxiemeSeparation[2].replace('#','');
                    
                }

            </script>


            <h2>Liste des étapes :</h2>               

            <p id="etapes">
                <div class="boutonsEtapes">
                    <button type="button" class="ajoutEtape" onclick="ajoutEtape()">Ajouter Une Étape</button>
                    <button type="button" class="suppressionEtape" onclick="suppressionEtape()">Supprimer Une Étape</button>
                </div>  
            </p>            

            <script>
                var listeEtapes = document.getElementById("etapes"); 
                var etapesBrutes = "<?=$article->getEtapeDescription();?>"; 
                var separationEtapes = etapesBrutes.split('#,');

                for(let i=0; i < separationEtapes.length; i++){
                    var etape = document.createElement("input"); 
                    var label = document.createElement("label"); 
                    etape.innerHTML=separationEtapes[i].replace('#',''); 
                    etape.value=separationEtapes[i].replace('#','');  
                    etape.setAttribute("type","text"); 
                    etape.setAttribute("name", "etape"); 
                    etape.className= "inputEtape";
                    label.setAttribute("for", "etape");  
                    label.innerHTML="Étape N° "+(i+1)+" :"; 
                    listeEtapes.appendChild(label); 
                    label.appendChild(etape);
                }
            </script>

            <p>
                <label for="visibilite">Article en ligne: </label>
                <select name="visibilite">
                    <option value="true" id="true">Oui</option>
                    <option value="false" id="false">Non</option>
                </select>
            </p>

            <script>
                if(<?=$article->getVisibilite()?> == true){
                    var oui = document.getElementById("true");
                    oui.setAttribute("selected","selected");
                } else{
                    var non = document.getElementById("false");
                    non.setAttribute("selected","selected");
                }
            </script>


            <input type="hidden" name="listeIngredients" id="listeIngredients">
            <input type="hidden" name="etapeDescription" id="listeEtapes">
            <input type="hidden" name="recetteID" value="<?= $_GET['recetteID']; ?>" />
            <p><input id="soumission" type="submit" value="Modifier l'article" onclick="concatenationEtapes()"/></p>
        </form>
    </div>
</article>
