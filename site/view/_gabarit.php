<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?= $titre; ?></title>
<link rel="stylesheet" href="<?= MEDIA; ?>/css/style.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="<?= $description; ?>" />
<meta name="keywords" content="<?= $motcle; ?>" />
</head>

<body>

<div id="site">
	<header>
        <a href="accueil.html"><img src=" <?= MEDIA; ?>/img/Logo_Les_Magiciens_Du_Fouet.jpg" alt="logo robot patissier"></a>
        <h1>Les Magiciens Du Fouet</h1>
    </header>
    <nav id="grandsEcrans">
    	<ul>

<?php
if (isset($_SESSION['pseudo'])){
?>
        <li class="liste"><a href="admin-home.html">Accueil Admin</a></li>
        <li class="liste"><a href="creer-article.html">Créer une recette</a></li>
        <li class="liste"><a href="creer-chef.html">Créer une fiche de chef</a></li>

        <?php
if ($_SESSION['pseudo'] == 'anthony'){
?>
        <li class="liste"><a href="creer-membre.html">Créer un nouvel admin</a></li>
<?php
}
?>
        <li class="liste"><a href="deconnexion.html">Deconnexion</a></li>


        <li>Nos Recettes :</li>


            <?php
	        foreach($articles as $article) {
                        if($article->getVisibilite() == "true"){
	        ?>
            <li class="liste"><a href="voir-article_<?=$article->getRecetteID();?>.html"><?= $article->getNomRecette()?></a></li> 
            <?php
                }
            }
            ?>

            <li>Nos Chefs Fouetteurs :</li>

            <?php
	        foreach($chefs as $chef) {
	        ?>
            <li class="liste"><a href="voir-cuisinier_<?=$chef->getChefID()?>.html"><?=$chef->getPrenomDuChef();?> <?=$chef->getNomDuChef();?></a></li> 
            <?php
            }
            ?>


<?php
} else {
?>
            <li>Nos Recettes :</li>


            <?php
	        foreach($articles as $article) {
                        if($article->getVisibilite() == "true"){
	        ?>
            <li class="liste"><a href="voir-article_<?=$article->getRecetteID();?>.html"><?= $article->getNomRecette()?></a></li> 
            <?php
                }
            }
            ?>

            <li>Nos Chefs Fouetteurs :</li>

            <?php
	        foreach($chefs as $chef) {
	        ?>
            <li class="liste"><a href="voir-cuisinier_<?=$chef->getChefID()?>.html"><?=$chef->getPrenomDuChef();?> <?=$chef->getNomDuChef();?></a></li> 
            <?php
            }
            ?>

<?php
}
?>

        </ul>
    </nav>

    <div id="petitsEcrans">

    <ul>

    <?php
if (isset($_SESSION['pseudo'])){        
?>
        <li class="liste"><a href="admin-home.html">Admin</a></li>

<?php
}
?>
        <li class="liste"><a href="liste-des-recettes.html">Recettes</a></li>
        <li class="liste"><a href="liste-des-chefs.html">Chefs</a></li>

        </ul>
    </div>






    <?= $contenu; ?>
    <footer>
        <p><a href="contact.html" id="lienContact">Nous contacter</a></p>
        <p id="signature">MDF 2022 - Développement Anthony ANDRÉ<a class="lienVersRecette" href="admin.html"><img src="<?= MEDIA; ?>/img/acces-admin.png" alt="logo robot"></a></p>
    </footer>
</div> 

<script src="<?= MEDIA; ?>/jquery/jquery-3.4.1.min.js"></script>
<script src="<?= MEDIA; ?>/jquery/controle-formulaire.js"></script>
<script src="<?= MEDIA; ?>/jquery/boutonLike.js"></script>
<script src="<?= MEDIA; ?>/js/app.js"></script>
</body>
</html>   