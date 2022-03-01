<?php
class Autoloader {
	public static function autoload($class) {
		/////*** Autoloader ***/////
		spl_autoload_register(function($class) {
			$chemin = str_replace('\\','/',$class);
			require_once($chemin.'.php');
		});
		
		if(isset($_GET['page'])) {
		/////*** Déclaration des paramètres de la classe Rooter ***/////	

			switch($_GET['page']) {
				case 'accueil':
					$namespace = 'controller\site\Accueil';
					$methode   = 'AfficherAccueil';
					break;
				case 'admin-home':
					$namespace = 'controller\admin\Admin';	
					$methode   = 'AfficherTousLesArticles';
					break;
				case 'liste-des-recettes':
					$namespace = 'controller\site\Accueil';	
					$methode   = 'AfficherListeRecettes';
					break;	
				case 'liste-des-chefs':
					$namespace = 'controller\site\Accueil';	
					$methode   = 'AfficherListeChefs';
					break;	
				case 'contact':
					$namespace = 'controller\site\Accueil';	
					$methode   = 'AfficherContact';
					break;	
				case 'voir-cuisinier':
					$namespace = 'controller\site\Accueil';	
					$methode   = 'AfficherCuisinier';
					break;							
				case 'admin':
					$namespace = 'controller\admin\Admin';	
					$methode   = 'voirAdmin';
					break;
				case 'deconnexion':
					$namespace = 'controller\admin\Admin';	
					$methode   = 'seDeconnecter';
					break;	
				case 'voir-article':
					$namespace = 'controller\site\Accueil';	
					$methode   = 'AfficherArticle';
					break;
				case 'creer-article':
					$namespace = 'controller\admin\Admin';	
					$methode   = 'CreerArticle';
					break;
					case 'creer-chef':
						$namespace = 'controller\admin\Admin';	
						$methode   = 'CreerChef';
						break;	
						case 'creer-membre':
							$namespace = 'controller\admin\Admin';	
							$methode   = 'CreerMembre';
							break;	
				case 'modifier-article':
					$namespace = 'controller\admin\Admin';	
					$methode   = 'ModifierArticle';
					break;
					case 'modifier-chef':
						$namespace = 'controller\admin\Admin';	
						$methode   = 'ModifierChef';
						break;	
						case 'modifier-membre':
							$namespace = 'controller\admin\Admin';	
							$methode   = 'ModifierMembre';
							break;	
						case 'supprimer-membre':
							$namespace = 'controller\admin\Admin';	
							$methode   = 'SupprimerMembre';
							break;			
				case 'supprimer-article':
					$namespace = 'controller\admin\Admin';	
					$methode   = 'SupprimerArticle';
					break;
					case 'supprimer-chef':
						$namespace = 'controller\admin\Admin';	
						$methode   = 'SupprimerChef';
						break;						
			}	


		/////*** Instanciation de la classe Rooter ***/////	
			$rooter = new classe\Rooter($namespace, $methode);
		} else {
			$rooter = new classe\Rooter('controller\site\Accueil', 'AfficherAccueil');
		}
		$rooter->ChooseController();		
	}
}