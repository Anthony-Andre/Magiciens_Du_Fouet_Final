<?php
if(isset($_SESSION['pseudo'])) {
	$pseudo = $_SESSION['pseudo'];
} else {
	header('location: admin.html');
}
?>
<article>
	<h1>Supprimer le chef <?= $chef->getNomDuChef(); ?> #<?= $_GET['recetteID']; ?> : <?= $chef->getNomDuChef(); ?></h1>
    <div class="box">
    <?php
	if(!isset($message)) {
	?>
		<p>Etes-vous certain de vouloir supprimer ce chef de la base de données ?</p>
        <form method="post" action="">
        <p><input type="submit" name="non" value="NON" /></p>
        <input type="hidden" name="chefID" value="<?= $_GET['recetteID']; ?>" />
        <p><input type="submit" name="oui" value="OUI" /></p>
        </form>
        <hr />
        <p><?= $chef->getNomduChef(); ?></p>
        <p><?= $chef->getPrenomDuChef(); ?></p>
    <?php
	} else { echo $message; } ?>
    </div>
</article>