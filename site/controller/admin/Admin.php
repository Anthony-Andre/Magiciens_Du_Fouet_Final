<?php
namespace controller\admin;
use classe;
use model\admin as ma;
use model\site as ms;
use PDO;
class Admin {

/****************** ACCES A LA ZONE ADMIN ******************/

	public function voirAdmin() {
		if( (empty($_POST['pseudo'])) || (empty($_POST['password'])) ) {
			$managerArticle = new ms\ArticleManager();
			$articles = $managerArticle->ReadAllArticle(); 
    	$chefs = $managerArticle->ListeDesChefs(); 
			$manager = new ma\MembreManager();
			$message = $manager->getMsg();
			$view = new classe\View('admin', 'admin', 'Admin', 'Je suis la desc de l\'admin', 'clé admin 1, clé admin 2');
			$view->AfficherVue(array('message'=>$message,'articles'=>$articles,'chefs'=>$chefs));
		} else {
			$managerArticle = new ms\ArticleManager();
			$articles = $managerArticle->ReadAllArticle(); 
    	$chefs = $managerArticle->ListeDesChefs();
			$manager = new ma\MembreManager();
			$membre = $manager->ReadMembre($_POST['pseudo'], $_POST['password']);
			
			if( ($membre->getPseudo() == $_POST['pseudo']) AND ($membre->getPassword() == $_POST['password']) ) {
				$_SESSION['pseudo'] = $_POST['pseudo'];
				$this->AfficherTousLesArticles();

			} else {
				$managerArticle = new ms\ArticleManager();
				$articles = $managerArticle->ReadAllArticle(); 
    		$chefs = $managerArticle->ListeDesChefs();
				$manager = new ma\MembreManager();
				$message = $manager->getMsgErreur();
				$view = new classe\View('admin', 'admin', 'Admin', 'Je suis la desc de l\'admin', 'clé admin 1, clé admin 2');
				$view->AfficherVue(array('message'=>$message,'articles'=>$articles,'chefs'=>$chefs));
			}
		}
	}
/****************** ACCES A LA ZONE ADMIN ******************/
/***********************************************************/

/*************** CREATION D'UNE RECETTE ***************/
	public function CreerArticle() {
		if( (empty($_POST['nomRecette'])) && (empty($_POST['difficulte'])) && (empty($_POST['description'])) && (empty($_POST['cout'])) ) {
			$manager = new ms\ArticleManager();
			$chefs = $manager->ListeDesChefs();
			$message = $manager->getMsgCreateArticle();
			$articles = $manager->ReadAllArticle();

		} elseif( (empty($_POST['nomRecette'])) || (empty($_POST['difficulte'])) || (empty($_POST['description'])) || (empty($_POST['cout'])) ) {
			$manager = new ms\ArticleManager();
			$chefs = $manager->ListeDesChefs();
			$articles = $manager->ReadAllArticle();

			$message = $manager->getMsgErreurCreateArticle();
		} else {
			$article = new ms\Article();
			$article->setNomRecette($_POST['nomRecette']);
			$article->setDescription($_POST['description']);
			$article->setDifficulte($_POST['difficulte']);
			$article->setCout($_POST['cout']);
			$article->setChefID($_POST['chefID']);
			$article->setEtapeDescription($_POST['etapeDescription']);
			$article->setIngredients($_POST['listeIngredients']);
			$article->setDuree($_POST['duree']);
			$article->setVisibilite($_POST['visibilite']);
			
			$manager = new ms\ArticleManager();
			$chefs = $manager->ListeDesChefs();
			$articles = $manager->ReadAllArticle();
			$manager->CreateArticle($article);
			$message = $manager->getMsgSuccesCreateArticle();
		}
		
		
	  $view = new classe\View('admin', 'article-create', 'Créer un article', 'Créer un article', 'clé 1, clé 2');
		$view->AfficherVue(array('articles' => $articles, 'message'=>$message,'chefs'=> $chefs));
	}
/*************** CREATION D'UN ARTICLE ***************/
/*****************************************************/

/*************** CREATION D'UN CHEF ***************/

public function CreerChef() {
	if( (empty($_POST['nomChef'])) && (empty($_POST['prenomChef']))) {
		$manager = new ms\ArticleManager();
		$message = $manager->getMsgCreateArticle();
		$chefs = $manager->ListeDesChefs(); 
		$articles = $manager->ReadAllArticle();

	} elseif( (empty($_POST['nomChef'])) || (empty($_POST['prenomChef']))) {
		$manager = new ms\ArticleManager();
		$message = $manager->getMsgErreurCreateArticle();
	} else {
		$chef = new ms\Chef();
		$chef->setNomDuChef($_POST['nomChef']);
		$chef->setPrenomDuChef($_POST['prenomChef']);
		
		$manager = new ms\ArticleManager();
		$manager->CreateChef($chef);
		$message = $manager->getMsgSuccesCreateChef();
	}
	
		$view = new classe\View('admin', 'chef-create', 'Créer un chef', 'Créer un chef', 'clé 1, clé 2');
	$view->AfficherVue(array('chefs'=>$chefs, 'articles'=>$articles, 'message'=>$message));
}
/*************** CREATION D'UN CHEF ***************/
/*****************************************************/

/*************** CREATION D'UN ADMIN ***************/

public function CreerMembre() {
	if( (empty($_POST['pseudo'])) && (empty($_POST['password']))) {
		$manager = new ms\ArticleManager();
		$membreManager = new ma\MembreManager;
		$chefs = $manager->ListeDesChefs(); 
		$articles = $manager->ReadAllArticle();
		$message = $manager->getMsgCreateArticle();

	} elseif( (empty($_POST['pseudo'])) || (empty($_POST['password']))) {
		$manager = new ms\ArticleManager();
		$membreManager = new ma\MembreManager;
		$message = $manager->getMsgErreurCreateArticle();
	} else {
		$membre = new ma\Membre();
		$membre->setPseudo($_POST['pseudo']);
		$membre->setPassword($_POST['password']);
		
		$manager = new ms\ArticleManager;
		$membreManager = new ma\MembreManager();
		$membreManager->CreateMembre($membre);
		$message = $manager->getMsgSuccesCreateAdmin();
	}
	
		$view = new classe\View('admin', 'membre-create', 'Créer un membre', 'Créer un membre', 'clé 1, clé 2');
		$view->AfficherVue(array('message'=>$message, 'chefs'=>$chefs, 'articles'=>$articles));
}
/*************** CREATION D'UN ARTICLE ***************/
/*****************************************************/


/****************** ACCES ACCUEIL ADMIN ******************/
	public function AfficherTousLesArticles() {
		$manager = new ms\ArticleManager();
		$articles = $manager->ReadAllArticle();
		$chefs = $manager->ListeDesChefs();
		$membreManager = new ma\MembreManager();
		$membres = $membreManager->ReadAllMembres(); 
		
		$view = new classe\View('admin', 'admin-acces', 'Zone Admin', 'Je suis la desc de la zone admin', 'clé zone admin 1, cl zone admin 2');
		$view->AfficherVue(array('pseudo' => $_SESSION['pseudo'],'articles'=>$articles,'chefs'=>$chefs, 'membres'=>$membres));
	}

/****************** ACCES ACCUEIL ADMIN ******************/
/*********************************************************/


/*************** MODIFICATION D'UN ARTICLE ***************/
	public function ModifierArticle() {
		$manager = new ms\ArticleManager();
		$article = $manager->ReadArticle($_GET['recetteID']);
		$chefs = $manager->ListeDesChefs();
		if((empty($_POST['nomRecette'])) && (empty($_POST['difficulte'])) && (empty($_POST['description'])) && (empty($_POST['cout'])) ) {
			$message = $manager->getMsgCreateArticle();
		} elseif((empty($_POST['nomRecette'])) || (empty($_POST['difficulte'])) || (empty($_POST['description'])) || (empty($_POST['cout'])) ) {
			$message = $manager->getMsgErreurCreateArticle();
		} else {
			$article = new ms\Article();
			$article->setRecetteID($_POST['recetteID']);
			$article->setChefID($_POST['chefID']);
			$article->setNomRecette($_POST['nomRecette']);
			$article->setDifficulte($_POST['difficulte']);
			$article->setDescription($_POST['description']);
			$article->setCout($_POST['cout']);
			$article->setEtapeDescription($_POST['etapeDescription']);
			$article->setIngredients($_POST['listeIngredients']);
			$article->setDuree($_POST['duree']);
			$article->setVisibilite($_POST['visibilite']);
			
			$manager->UpdateArticle($article);
			
			$message = $manager->getMsgSuccesUpdateArticle();
		}
		
			$view = new classe\View('admin', 'article-update', 'Modifier un article', 'Modifier un article', 'clé 1, clé 2');
			$view->AfficherVue(array('message' =>$message,'article' =>$article, 'chefs'=>$chefs));
	}
/*************** MODIFICATION D'UN ARTICLE ***************/
/*********************************************************/


/*************** MODIFICATION D'UN CHEF ***************/

public function ModifierChef() {
	$manager = new ms\ArticleManager();
	$chef = $manager->ReadChef($_GET['recetteID']);
	$chefs = $manager->ListeDesChefs(); 
	$articles = $manager->ReadAllArticle();
	if((empty($_POST['nomDuChef'])) && (empty($_POST['prenomDuChef']))) {
		$message = $manager->getMsgCreateArticle();
	} elseif((empty($_POST['nomDuChef'])) || (empty($_POST['prenomDuChef'])) ) {
		$message = $manager->getMsgErreurCreateArticle();
	} else {
		$chef = new ms\Chef();
		$chef->setChefID($_POST['chefID']);
		$chef->setNomDuChef($_POST['nomDuChef']);
		$chef->setPrenomDuChef($_POST['prenomDuChef']);
		
		$manager->UpdateChef($chef);	
		$message = $manager->getMsgSuccesUpdateChef();
	}
		$view = new classe\View('admin', 'chef-update', 'Modifier un chef', 'Modifier un chef', 'clé 1, clé 2');
		$view->AfficherVue(array('message' =>$message,'chef' =>$chef, 'chefs' => $chefs, 'articles'=>$articles));
}
/*************** MODIFICATION D'UN CHEF ***************/
/*********************************************************/


/*************** MODIFICATION D'UN MEMBRE ***************/

public function ModifierMembre() {
	$membreManager = new ma\MembreManager();
	$manager = new ms\ArticleManager();
	$chefs = $manager->ListeDesChefs(); 
	$articles = $manager->ReadAllArticle();
	$membre = $membreManager->ReadAdmin($_GET['recetteID']);
	if((empty($_POST['pseudo'])) && (empty($_POST['password']))) {
		$message = $manager->getMsgCreateArticle();
	} elseif((empty($_POST['pseudo'])) || (empty($_POST['password'])) ) {
		$message = $manager->getMsgErreurCreateArticle();
	} else {
		$membre = new ma\Membre();
		$membre->setMembreID($_POST['membreID']);
		$membre->setPseudo($_POST['pseudo']);
		$membre->setPassword($_POST['password']);
		
		$membreManager->UpdateMembre($membre);
		$message = $manager->getMsgSuccesUpdateAdmin();
	}
	$view = new classe\View('admin', 'membre-update', 'Modifier un membre', 'Modifier un membre', 'clé 1, clé 2');
	$view->AfficherVue(array('chefs'=>$chefs, 'articles'=>$articles, 'message' =>$message,'membre' =>$membre));
}
/*************** MODIFICATION D'UN MEMBRE ***************/
/*********************************************************/

/*************** SUPPRESSION D'UN ARTICLE ***************/
	public function SupprimerArticle() {
		if( (empty($_POST['oui'])) && (empty($_POST['non'])) ) {
			$manager = new ms\ArticleManager();
			$articles = $manager->ReadAllArticle(); 
 	   	$chefs = $manager->ListeDesChefs(); 
			$article = $manager->ReadArticle($_GET['recetteID']);
			
			$view = new classe\View('admin', 'article-delete', 'Supprimer un article', 'Supprimer un article', 'clé 1, clé 2');
			$view->AfficherVue(array('article' => $article,'articles'=>$articles,'chefs'=>$chefs));
		} elseif(isset($_POST['non'])) {
			$this->AfficherTousLesArticles();
		} elseif(isset($_POST['oui'])) {
			$article = new ms\Article();
			$article->setRecetteID($_POST['recetteID']);
			
			$manager = new ms\ArticleManager();
			$manager->DeleteArticle($article);
			$message = $manager->getMsgSuccesDeleteArticle();
			$view = new classe\View('admin', 'article-delete', 'Supprimer un article', 'Supprimer un article', 'clé 1, clé 2');
			$view->AfficherVue(array('article' => $article,'message' => $message));
		}
	}
/*************** SUPPRESSION D'UN ARTICLE ***************/
/********************************************************/

/*************** SUPPRESSION D'UN CHEF ***************/
public function SupprimerChef() {
	if( (empty($_POST['oui'])) && (empty($_POST['non'])) ) {
		$manager = new ms\ArticleManager(); 
		$chef = $manager->ReadChef($_GET['recetteID']);
		$chefs = $manager->ListeDesChefs(); 
		$articles = $manager->ReadAllArticle();
		
		$view = new classe\View('admin', 'chef-delete', 'Supprimer un chef', 'Supprimer un chef', 'clé 1, clé 2');
		$view->AfficherVue(array('chef' => $chef, 'chefs'=>$chefs, 'articles'=>$articles));
	} elseif(isset($_POST['non'])) {
		$this->AfficherTousLesArticles();
	} elseif(isset($_POST['oui'])) {
		$chef = new ms\Chef();
		$chef->setChefID($_POST['chefID']);
		
		$manager = new ms\ArticleManager();
		$manager->DeleteChef($chef);
		$message = $manager->getMsgSuccesDeleteChef();
		$view = new classe\View('admin', 'chef-delete', 'Supprimer un chef', 'Supprimer un chef', 'clé 1, clé 2');
		$view->AfficherVue(array('chef' => $chef,'message' => $message));
	}
}
/*************** SUPPRESSION D'UN CHEF ***************/
/********************************************************/

/*************** SUPPRESSION D'UN MEMBRE ***************/
public function SupprimerMembre() {
	if( (empty($_POST['oui'])) && (empty($_POST['non'])) ) {
		$membreManager = new ma\Membremanager(); 
		$manager = new ms\ArticleManager();
		$articles = $manager->ReadAllArticle(); 
		$chefs = $manager->ListeDesChefs(); 
		$article = $manager->ReadArticle($_GET['recetteID']);
		$membre = $membreManager->ReadAdmin($_GET['recetteID']);

		
		$view = new classe\View('admin', 'membre-delete', 'Supprimer un admin', 'Supprimer un admin', 'clé 1, clé 2');
		$view->AfficherVue(array('article' => $article,'articles'=>$articles,'chefs'=>$chefs,'membre' =>$membre));
	} elseif(isset($_POST['non'])) {
		$this->AfficherTousLesArticles();
	} elseif(isset($_POST['oui'])) {
		
		$membre = new ma\Membre();
		$membre->setMembreID($_POST['membreID']);
		$manager = new ms\ArticleManager();
		$membreManager = new ma\MembreManager;
		$membreManager->DeleteMembre($membre);
		$message = $manager->getMsgSuccesDeleteAdmin();
		$view = new classe\View('admin', 'membre-delete', 'Supprimer un admin', 'Supprimer un admin', 'clé 1, clé 2');
		$view->AfficherVue(array('message' => $message, 'membre'=>$membre));
	}
}
/*************** SUPPRESSION D'UN MEMBRE ***************/
/********************************************************/

	public function seDeconnecter() {
		$manager = new ms\ArticleManager();
		$articles = $manager->ReadAllArticle(); 
    $chefs = $manager->ListeDesChefs();
		$view = new classe\View('admin', 'deconnexion', 'Se déconnecter', 'Déconnexion de la zone admin', 'clé déconnecter 1, clé déconnecter 2');
		$view->AfficherVue(array('articles'=>$articles,'chefs'=>$chefs));
	}
	
}