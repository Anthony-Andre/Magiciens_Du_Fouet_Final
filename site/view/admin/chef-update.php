<?php
if(isset($_SESSION['pseudo'])) {
	$pseudo = $_SESSION['pseudo'];
} else {
	header('location: admin.html');
}
?>
<article>
	<h1>Modifier le chef #<?= $_GET['recetteID']; ?> : <?= $chef->getPrenomDuChef(); ?> <?= $chef->getNomDuChef(); ?></h1>
    <div class="box">
		<?= $message; ?>
        <form method="post" action="">
            <label for="nomDuChef">Nom :</label>
            <p><input type="text" name="nomDuChef" value="<?= $chef->getNomDuChef();?>" /></p>
            <label for="prenomDuChef">Prénom :</label>
            <p><input type="text" name="prenomDuChef" value="<?= $chef->getPrenomDuChef();?>" /></p>
            <label for="ChefID">Chef ID:</label>
            <p><input type="number" name = "chefID" value="<?= $_GET['recetteID'];?>" /></p>
            <input type="hidden" name="chefID" value="<?= $_GET['recetteID']; ?>" />
            <p><input id="soumission" type="submit" value="Modifier le chef" /></p>
        </form>
    </div>
</article>
