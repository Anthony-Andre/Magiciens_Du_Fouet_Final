<?php
if(isset($_SESSION['pseudo'])) {
	$pseudo = $_SESSION['pseudo'];
} else {
	header('location: admin.html');
}
?>
<article>
	<h1>Modifier un admin</h1>
    <div class="box">
		<?= $message; ?>
        <form method="post" action="">
        	<b>Admin :</b>
            <p><input type="text" name="pseudo" value="<?= $membre->getPseudo();?>" /></p>
            <p><input type="text" name="password" value="<?= $membre->getPassword();?>" /></p>
            <input type="hidden" name="membreID" value="<?= $_GET['recetteID']; ?>" />
            <p><input id="soumission" type="submit" value="Modifier l'admin" /></p>
        </form>
    </div>
</article>
