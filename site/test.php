<?php
use PDO;

$cnx = new PDO('mysql:host=localhost;dbname=les_magiciens_du_fouet_v2;charset=utf8', 'root', '');

    $article = new ms\Article();
    $article->setNomRecette('choux à la crème');
    $article->setDescription('cest la description');
    $article->setDifficulte(1);
    $article->setCout(1);
    $etape = new ms\Etape(); 
    $ingredient = new ms\ingredient();
    $etape->setEtapeDescription('cestladescdeletape');
    $ingredient->setNomIngredient('uningredient'); 
    $ingredient->setQuantite(15); 
    $ingredient->setUniteMesure('litres'); 
    
    $manager = new ms\ArticleManager();
    $chefs = $manager->ListeDesChefs();
    $manager->CreateArticle($article);
    $manager->CreateEtape($etape);
    $manager->CreateRecetteIngredient(); 
    $message = $manager->getMsgSuccesCreateArticle();