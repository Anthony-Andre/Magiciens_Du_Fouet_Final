<article>

  <h1>Liste des chefs fouetteurs : </h1>

  <?php
  foreach ($chefs as $chef) {
  ?>

    <h2><a class="lienVersRecette" href="voir-cuisinier_<?= $chef->getChefID() ?>.html"><?= $chef->getPrenomDuChef(); ?> <?= $chef->getNomDuChef(); ?></a></h2>

  <?php
  }
  ?>


</article>