<?php
namespace controller\site;
use classe; 
use model\site as ms; 

class Accueil{

  public function AfficherAccueil(){
    $manager = new ms\ArticleManager();
		$articles = $manager->ReadAllArticle(); 
    $articlePopulaire = $manager->AfficherArticlePopulaire();
    $chef = $manager->ReadChef($articlePopulaire->getChefID());
    $chefs = $manager->ListeDesChefs(); 
    
		
		$view = new classe\View('site', 'accueil', 'Accueil', 'Je suis la desc de l\'accueil', 'clé 1, clé 2');
		$view->AfficherVue(array('articlePopulaire'=> $articlePopulaire,'articles'=>$articles,'chefs'=>$chefs, 'chef'=>$chef));
  }

  public function AfficherContact(){
    $manager = new ms\ArticleManager();
		$articles = $manager->ReadAllArticle(); 
    $chefs = $manager->ListeDesChefs(); 
		
		$view = new classe\View('site', 'contact', 'Contact', 'Description de la page contact', 'clé 1, clé 2');
		$view->AfficherVue(array('articles'=>$articles,'chefs'=>$chefs));
  }

  public function AfficherArticle() {
		
		$manager = new ms\ArticleManager();
    $chefs = $manager->ListeDesChefs();
    $articles = $manager->ReadAllArticle();
		$article = $manager->ReadArticle($_GET['recetteID']);
    $chef = $manager->ReadChef($article->getChefID());
		
		$view = new classe\View('site', 'voir-article', $article->getNomRecette(), $article->getDescription(), "clé 1");
		$view->AfficherVue(array('article'=>$article,'articles'=>$articles,'chefs'=>$chefs,'chef'=>$chef));
	}

  public function AfficherCuisinier() {
		
		$manager = new ms\ArticleManager();
    $chefs = $manager->ListeDesChefs();
    $articles = $manager->ReadAllArticle();
    $chef = $manager->ReadChef($_GET['recetteID']);
		
		$view = new classe\View('site', 'voir-cuisinier', $chef->getNomDuChef(), $chef->getNomDuChef(), "clé 1");
		$view->AfficherVue(array('articles'=>$articles,'chefs'=>$chefs,'chef'=>$chef));
	}

  public function AfficherListeRecettes(){
    $manager = new ms\ArticleManager();
    $articles = $manager->ReadAllArticle();
    $chefs = $manager->ListeDesChefs();

    $view = new classe\View('site', 'liste-des-recettes', "Liste des recettes", "Liste des recettes", "clé 1");
		$view->AfficherVue(array('articles'=>$articles, 'chefs'=>$chefs));
  }

  public function AfficherListeChefs(){
    $manager = new ms\ArticleManager();
    $articles = $manager->ReadAllArticle();
    $chefs = $manager->ListeDesChefs();

    $view = new classe\View('site', 'liste-des-chefs', "Liste des chefs", "Liste des chefs", "clé 1");
		$view->AfficherVue(array('articles'=>$articles, 'chefs'=>$chefs));
  }

}