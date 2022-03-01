<article>
    <h1><?= $article->getNomRecette(); ?>:</h1>

    <img src="<?= MEDIA; ?>/img/illustration_<?= $article->getRecetteID(); ?>.jpg" alt="Photo de la recette" id="illustration">

    <h4><?= $article->getDescription(); ?></h4>

    <?php
        $dateExplosee = explode('-',  $article->getDateAjout()); 
    ?>

    <p>Une recette réalisée par &nbsp; <a class="lienVersRecette" href="voir-cuisinier_<?=$chef->getChefID()?>.html"><?=$chef->getPrenomDuChef();?> <?=$chef->getNomDuChef();?></a>, le <?=$dateExplosee[2];?>/<?=$dateExplosee[1];?>/<?=$dateExplosee[0];?>.</p>



    <p id="difficulte<?= $article->getRecetteID(); ?>"> Difficulté :
        <script>
            for (var i = 0; i < <?= $article->getDifficulte(); ?>; i++) {
                var logoDifficulte = document.createElement('img');
                logoDifficulte.src = " <?= MEDIA; ?>/img/fouet.png";
                logoDifficulte.className = "symbolesEchelle";
                var monParagraphe = document.getElementById("difficulte<?= $article->getRecetteID(); ?>");
                monParagraphe.appendChild(logoDifficulte);
            }
        </script>
    </p>

    <p id="cout<?= $article->getRecetteID(); ?>"> Coût :
        <script>
            for (var i = 0; i < <?= $article->getCout(); ?>; i++) {
                var logoCout = document.createElement('img');
                logoCout.src = " <?= MEDIA; ?>/img/euro.png";
                logoCout.className = "symbolesEchelle";
                var monParagraphe = document.getElementById("cout<?= $article->getRecetteID(); ?>");
                monParagraphe.appendChild(logoCout);
            }
        </script>
    </p>

    <?php
    $dureeBdd = $article->getDuree();
    $heure = intval(abs($dureeBdd / 3600));
    $dureeBdd = $dureeBdd - ($heure * 3600);
    $minute = intval(abs($dureeBdd / 60));
    $dureeBdd = $dureeBdd - ($minute * 60);
    $seconde = $dureeBdd;
    ?>

    <p>Durée : <?php if($heure>0){?> <?=$heure?> Heures <?php }?> <?php if($minute>0){?> <?=$minute?> Minutes <?php }?> <?php if($seconde>0){?> <?=$seconde?> Secondes <?php }?></p>





    <h2>Ingrédients nécéssaires :</h2>

    <ol id="listeIngredients">

        <script>
            var ingredientsBruts = "<?= $article->getIngredients() ?>";
            var separationIngredients = ingredientsBruts.split('#,');
            var listeIngredients = document.getElementById("listeIngredients");

            console.log(separationIngredients);

            for (let i = 0; i < separationIngredients.length; i++) {
                var ingredient = document.createElement("li");
                console.log(separationIngredients[0]);
                deuxiemeSeparation = separationIngredients[i].split(",");
                if (deuxiemeSeparation[2].replace('#', '') == "") {
                    ingredient.innerHTML = deuxiemeSeparation[1] + deuxiemeSeparation[0];
                } else {
                    ingredient.innerHTML = deuxiemeSeparation[1] + " " + deuxiemeSeparation[2].replace('#', '') + " de " + deuxiemeSeparation[0];
                }
                listeIngredients.appendChild(ingredient);
            }
        </script>
    </ol>

    <h2>Étapes à suivre :</h2>

    <ol id="listeEtapes">
        <script>
            var listeEtapes = document.getElementById("listeEtapes");
            var etapesBrutes = "<?= $article->getEtapeDescription(); ?>";
            var separationEtapes = etapesBrutes.split('#,');

            for (let i = 0; i < separationEtapes.length; i++) {
                var etape = document.createElement("li");
                var label = document.createElement("label");
                etape.innerHTML = separationEtapes[i].replace('#', '');
                etape.setAttribute("name", "etape");
                listeEtapes.appendChild(etape);
            }
        </script>
    </ol>

            <p>
            <label for="boutonLike">Cette recette vous a plu? Votez pour elle: </label>
            <button onclick="ajoutLike()" name="boutonLike" id="boutonLike"><img src="<?= MEDIA; ?>/img/boutonLike.png" alt="bouton Like" id="imgBoutonLike" ></button>
            </p>

</article>