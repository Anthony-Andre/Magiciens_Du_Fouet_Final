<article>

  <h1>Liste des recettes proposées : </h1>

  <?php
  foreach ($articles as $article) {
  ?>

<h2><a class="lienVersRecette" href="voir-article_<?= $article->getRecetteID(); ?>.html"><?= $article->getNomRecette(); ?></a></h2>

  <?php
  }
  ?>


</article>