<?php
if(isset($_SESSION['pseudo'])) {
	$pseudo = $_SESSION['pseudo'];
} else {
	header('location: admin.html');
}
?>
<article>
	<h1>Supprimer la recette #<?= $_GET['recetteID']; ?> : <?= $article->getNomRecette(); ?></h1>
    <div class="box">
    <?php
	if(!isset($message)) {
	?>
		<p>Etes-vous certain de vouloir supprimer cet article ?</p>
        <form method="post" action="">
        <p><input type="submit" name="non" value="NON" /></p>
        <input type="hidden" name="recetteID" value="<?= $_GET['recetteID']; ?>" />
        <p><input type="submit" name="oui" value="OUI" /></p>
        </form>
        <hr />
        <p><?= $article->getNomRecette(); ?></p>
        <p><?= $article->getDescription(); ?></p>
    <?php
	} else { echo $message; } ?>
    </div>
</article>