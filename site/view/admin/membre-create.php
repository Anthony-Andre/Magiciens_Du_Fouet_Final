<?php
if(isset($_SESSION['pseudo'])) {
	$pseudo = $_SESSION['pseudo'];
} else {
	header('location: admin.html');
}
?>
<article>
	<h1>Saisir un nouvel admin :</h1>
    <div class="box">
		<?= $message; ?>
        <form method="post" action="">
        	<b>Informations :</b>
            <p><input type="text" name="pseudo" placeholder="Pseudo" /></p>
            <p><input type="text" name="password" placeholder="Password" minlength="6"/></p>
            <p><input id="soumission" type="submit" value="Créer l'admin" /></p>
        </form>
    </div>
</article>