<article>

  <h1> <?= $chef->getPrenomDuChef(); ?> <?= $chef->getNomDuChef(); ?> </h1>

  <img src="<?= MEDIA; ?>/img/chef_<?=$chef->getChefID();?>.jpg" alt="Photo du chef" id="photoDuChef">

  <h2>Ses recettes :</h2>

  <ul id="listeDesRecettesDuChef">
    <?php
    foreach ($articles as $article) {
      if($article->getVisibilite() == "true"){
    ?>

      <script>
        if(<?=$article->getChefID();?> == <?=$chef->getChefID();?>){
          var listeRecette=document.getElementById("listeDesRecettesDuChef"); 
          var recette = document.createElement("li"); 
          var lienRecette = document.createElement("a"); 
          listeRecette.appendChild(recette); 
          recette.appendChild(lienRecette); 
          lienRecette.setAttribute("href" , "voir-article_<?=$article->getRecetteID();?>.html"); 
          lienRecette.innerHTML="<?= $article->getNomRecette();?>";
          lienRecette.className="lienVersRecette";
        }
      </script>

    <?php
      }
    }
    ?>
  </ul>

</article>