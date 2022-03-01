<?php
if(isset($_SESSION['pseudo'])) {
	$pseudo = $_SESSION['pseudo'];
} else {
	header('location: admin.html');
}
?>
<article>
	<h1>Saisir un chef:</h1>
    <div class="box">
		<?= $message; ?>
        <form method="post" action="">
        	<b>Informations:</b>
            <p><input type="text" name="nomChef" placeholder="Nom Du Chef" /></p>
            <p><input type="text" name="prenomChef" placeholder="Prénom Du Chef" /></p>
            <p><input id="soumission" type="submit" value="Créer le chef" /></p>
        </form>
    </div>
</article>