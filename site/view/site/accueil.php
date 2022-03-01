<article>


    <h1>La recette préférée des fouetteurs : </h1>

    <h2><?= $articlePopulaire->getNomRecette() ?></h2>

    <?php
    $dateExplosee = explode('-',  $articlePopulaire->getDateAjout());
    ?>

    <p>Une recette réalisée par <?= $chef->getPrenomDuChef() ?> <?= $chef->getnomDuChef() ?>, le <?= $dateExplosee[2]; ?> <?= $dateExplosee[1]; ?> <?= $dateExplosee[0]; ?> </p>

    <img src="<?= MEDIA; ?>/img/illustration_<?= $articlePopulaire->getRecetteID(); ?>.jpg" alt="Photo de la recette" id="illustration">

    <h4>"<?= $articlePopulaire->getDescription(); ?>"</h4>

    <p id="difficulte<?= $articlePopulaire->getRecetteID(); ?>"> Difficulté :
        <script>
            for (var i = 0; i < <?= $articlePopulaire->getDifficulte(); ?>; i++) {
                var logoDifficulte = document.createElement('img');
                logoDifficulte.src = " <?= MEDIA; ?>/img/fouet.png";
                logoDifficulte.className = "symbolesEchelle";
                var monParagraphe = document.getElementById("difficulte<?= $articlePopulaire->getRecetteID(); ?>");
                monParagraphe.appendChild(logoDifficulte);
            }
        </script>
    </p>

    <p id="cout<?= $articlePopulaire->getRecetteID(); ?>"> Coût :
        <script>
            for (var i = 0; i < <?= $articlePopulaire->getCout(); ?>; i++) {
                var logoCout = document.createElement('img');
                logoCout.src = " <?= MEDIA; ?>/img/euro.png";
                logoCout.className = "symbolesEchelle";
                var monParagraphe = document.getElementById("cout<?= $articlePopulaire->getRecetteID(); ?>");
                monParagraphe.appendChild(logoCout);
            }
        </script>
    </p>

    <?php
    $dureeBdd = $articlePopulaire->getDuree();
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
            var ingredientsBruts = "<?= $articlePopulaire->getIngredients() ?>";
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
            var etapesBrutes = "<?= $articlePopulaire->getEtapeDescription(); ?>";
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

    <?php
    $message=""; 
    ?>

    <p><?= $message ?></p>

    <p>
        <label for="boutonLike">Cette recette vous a plu? Votez pour elle: </label>
        <button onclick="ajoutLike()" name="boutonLike" id="boutonLike"><img src="<?= MEDIA; ?>/img/boutonLike.png" alt="bouton Like" id="imgBoutonLike"></button>
    </p>


    <h1>Nos autres recettes :</h1>

    <div class="listeAutresRecettes">

        <?php
        foreach ($articles as $article) {
            if ($article->getVisibilite() == "true" && $article->getRecetteID() != $articlePopulaire->getRecetteID()) {
        ?>

                <div>

                    <h2><a class="lienVersRecette" href="voir-article_<?= $article->getRecetteID(); ?>.html"><?= $article->getNomRecette(); ?>:</a></h2>

                    <?php
                    $dateExplosee = explode('-',  $article->getDateAjout());
                    ?>

                    <a href="voir-article_<?= $article->getRecetteID(); ?>.html"><img src="<?= MEDIA; ?>/img/illustration_<?= $article->getRecetteID(); ?>.jpg" alt="Photo de la recette" id="illustration"></a>

                    <h5>"<?= $article->getDescription(); ?>"</h5>

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

                </div>

        <?php
            }
        }
        ?>

    </div>

</article>