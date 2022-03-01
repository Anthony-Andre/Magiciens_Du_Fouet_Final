<?php
if(isset($_SESSION['pseudo'])) {
	$pseudo = $_SESSION['pseudo'];
} else {
	header('location: admin.html');
}
?>
<article>

	<h1>Admin <i>(Connecté: <?= $pseudo; ?>)</i></h1>

    <h1>Liste des recettes</h1>
    <ol>
    <?php
	foreach($articles as $article) {
	?>
    <li><?= $article->getNomRecette(); ?> [<a class="lien" href="modifier-article_<?= $article->getRecetteID(); ?>.html">Modifier</a>] [<a class="lien" href="supprimer-article_<?= $article->getRecetteID(); ?>.html">Supprimer</a>]</li>
  <?php
	}
	?>
    </ol>
		<h2><a class="lienVersRecette" href="creer-article.html">Créer une nouvelle recette</a></h2>

		<h1>Liste des chefs</h1>
    <ol>
    <?php
	foreach($chefs as $chef) {
	?>
    <li><?= $chef->getPrenomDuChef(); ?> <?= $chef->getNomDuChef(); ?> ID Numéro <?= $chef->getChefID(); ?> [<a class="lien" href="modifier-chef_<?= $chef->getChefID(); ?>.html">Modifier</a>] [<a class="lien" href="supprimer-chef_<?= $chef->getChefID(); ?>.html">Supprimer</a>]</li>
  <?php
	}
	?>
    </ol>

		<h2><a class="lienVersRecette" href="creer-chef.html">Créer une nouvelle fiche de chef</a></h2>

<?php
if ($_SESSION['pseudo'] == 'anthony'){
?>

		<h1>Liste des admins</h1>
		<ol>
    <?php
	foreach($membres as $membre) {
	?>
    <li><?= $membre->getPseudo(); ?> ID Numéro <?= $membre->getMembreID(); ?> [<a class="lien" href="modifier-membre_<?= $membre->getMembreID(); ?>.html">Modifier</a>][<a class="lien" href="supprimer-membre_<?= $membre->getMembreID(); ?>.html">Supprimer</a>]
  <?php
	}
	?>
    </ol>

		<h2><a class="lienVersRecette" href="creer-admin.html">Créer un nouvel admin</a></h2>

<?php
}
?>

</article>