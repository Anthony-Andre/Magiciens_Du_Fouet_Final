<?php
namespace model\site;
use PDO;
class ArticleManager{

/* Connexion à la BDD : */

private function Connexion() {
  $cnx = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=utf8', ''.CNX_LOGIN.'', ''.CNX_PASS.'');
  return $cnx;
}

/*************** CREATION D'UN ARTICLE ***************/		
public function CreateArticle(Article $article) {
  $cnx = $this->Connexion();
  $sql = 'INSERT INTO recette
       (nomRecette,description,difficulte,cout,chefID,etapes,ingredients,dateAjout, duree, visibilite) VALUES (:nomRecette,:description,:difficulte,:cout,:chefID,:etapes,:ingredients, NOW(), :duree, :visibilite)';
  $rs_createArticle = $cnx->prepare($sql);
  $rs_createArticle->bindValue(':nomRecette', $article->getNomRecette(), PDO::PARAM_STR);
  $rs_createArticle->bindValue(':description', $article->getDescription(), PDO::PARAM_STR);
  $rs_createArticle->bindValue(':difficulte', $article->getDifficulte(), PDO::PARAM_STR);
  $rs_createArticle->bindValue(':cout', $article->getCout(), PDO::PARAM_STR);	
  $rs_createArticle->bindValue(':chefID', $article->getChefID(), PDO::PARAM_INT);
  $rs_createArticle->bindValue(':etapes', $article->getEtapeDescription(), PDO::PARAM_STR);
  $rs_createArticle->bindValue(':ingredients', $article->getIngredients(), PDO::PARAM_STR);
  $rs_createArticle->bindValue(':duree', $article->getDuree(), PDO::PARAM_STR);
  $rs_createArticle->bindValue(':visibilite', $article->getVisibilite(), PDO::PARAM_STR);
  $rs_createArticle->execute();

  $sqlEtape = 'INSERT INTO etape (recetteID,etapeDescription) VALUE (:recetteID,:etapeDescription)'; 
  $rs_createEtape = $cnx->prepare($sqlEtape); 
  $rs_createEtape->bindValue(':recetteID', $article->getRecetteID(), PDO::PARAM_INT); 
  $rs_createEtape->bindValue(':etapeDescription', $article->getEtapeDescription(), PDO::PARAM_STR); 
  $rs_createEtape->execute(); 
}

/*************** CREATION D'UN CHEF ***************/		
public function CreateChef(Chef $chef) {
  $cnx = $this->Connexion();
  $sql = 'INSERT INTO chef
       (nomDuChef,prenomDuChef) VALUES (:nomChef,:prenomChef)';
  $rs_createChef = $cnx->prepare($sql);
  $rs_createChef->bindValue(':nomChef', $chef->getNomDuChef(), PDO::PARAM_STR);
  $rs_createChef->bindValue(':prenomChef', $chef->getPrenomDuChef(), PDO::PARAM_STR);
  $rs_createChef->execute();
}

/*************** Affichage de toutes les recettes : ***************/ 

public function ReadAllArticle(){
  $cnx = $this->Connexion(); 
  $rs_readAllArticle = $cnx->prepare('SELECT * FROM recette');
  $rs_readAllArticle->execute(); 

  while($data = $rs_readAllArticle->fetch(PDO::FETCH_ASSOC)){
    $article = new Article(); 
    $article->SetRecetteID($data['recetteID']);
    $article->SetNomRecette($data['nomRecette']); 
    $article->SetDifficulte($data['difficulte']); 
    $article->setCout($data['cout']); 
    $article->setDescription($data['description']);
    $article->setChefID($data['chefID']);
    $article->setEtapeDescription($data['etapes']);
    $article->setIngredients($data['ingredients']);
    $article->setDateAjout($data['dateAjout']);
    $article->setDuree($data['duree']);
    $article->setVisibilite($data['visibilite']);
    $articles[] = $article;
  }
  return $articles;

    
}

public function afficherArticlePopulaire(){

    $cnx = $this->Connexion(); 
    $rs_readArticlePopulaire = $cnx->prepare('SELECT * FROM recette WHERE nombreLike=(SELECT MAX(nombreLike) FROM recette)'); 
    $rs_readArticlePopulaire->execute(); 
    $dataPopulaire = $rs_readArticlePopulaire->fetch(PDO::FETCH_ASSOC);

    $articlePopulaire = new Article(); 
    $articlePopulaire->SetRecetteID($dataPopulaire['recetteID']);
    $articlePopulaire->SetNomRecette($dataPopulaire['nomRecette']); 
    $articlePopulaire->SetDifficulte($dataPopulaire['difficulte']); 
    $articlePopulaire->setCout($dataPopulaire['cout']); 
    $articlePopulaire->setDescription($dataPopulaire['description']);
    $articlePopulaire->setChefID($dataPopulaire['chefID']);
    $articlePopulaire->setEtapeDescription($dataPopulaire['etapes']);
    $articlePopulaire->setIngredients($dataPopulaire['ingredients']);
    $articlePopulaire->setDateAjout($dataPopulaire['dateAjout']);
    $articlePopulaire->setDuree($dataPopulaire['duree']);
    $articlePopulaire->setVisibilite($dataPopulaire['visibilite']);

    return $articlePopulaire; 
}

/*************** Affichage de tous les chefs : ***************/ 

public function ListeDesChefs(){
  $cnx = $this->Connexion(); 
  $rs_listeDesChefs = $cnx->prepare('SELECT * FROM chef');
  $rs_listeDesChefs->execute(); 

  while($data = $rs_listeDesChefs->fetch(PDO::FETCH_ASSOC)){
    $chef = new Chef(); 
    $chef->SetChefID($data['chefID']);
    $chef->SetNomDuChef($data['nomDuChef']);
    $chef->SetPrenomDuChef($data['prenomDuChef']); 
    $chefs[] = $chef; 
  }
  return $chefs;
}

/*************** AFFICHER L'ARTICLE DEMANDE ***************/	

public function ReadArticle($recetteID) {
  $cnx = $this->Connexion();
  $sql = 'SELECT * FROM recette
      WHERE recetteID = :recetteID';
  $rs_readArticle = $cnx->prepare($sql);	
  $rs_readArticle->bindValue(':recetteID', $recetteID, PDO::PARAM_INT);
  $rs_readArticle->execute();
  $data = $rs_readArticle->fetch(PDO::FETCH_ASSOC);
  
  $article = new Article();
  $article->setRecetteID($data['recetteID']);
  $article->setNomRecette($data['nomRecette']);
  $article->setDescription($data['description']);
  $article->setDifficulte($data['difficulte']);
  $article->setCout($data['cout']);
  $article->setChefID($data['chefID']);
  $article->setEtapeDescription($data['etapes']);
  $article->setIngredients($data['ingredients']);
  $article->setDateAjout($data['dateAjout']);
  $article->setDuree($data['duree']);
  $article->setVisibilite($data['visibilite']);
  
  return $article;
}
/*************** AFFICHER L'ARTICLE DEMANDE ***************/
/**********************************************************/


/*************** AFFICHER LE CHEF DEMANDE ***************/	

public function ReadChef($chefID) {
  $cnx = $this->Connexion();
  $sql = 'SELECT * FROM chef
      WHERE chefID = :chefID';
  $rs_readArticle = $cnx->prepare($sql);	
  $rs_readArticle->bindValue(':chefID', $chefID, PDO::PARAM_INT);
  $rs_readArticle->execute();
  $data = $rs_readArticle->fetch(PDO::FETCH_ASSOC);
  
  $chef = new Chef(); 
  $chef->SetChefID($data['chefID']);
  $chef->SetNomDuChef($data['nomDuChef']);
  $chef->SetPrenomDuChef($data['prenomDuChef']); 
  
  return $chef;
}

/*************** AFFICHER LE CHEF DEMANDE ***************/
/********************************************************/


/*************** MODIFICATION D'UN ARTICLE ***************/	

public function UpdateArticle(Article $article) {
  $cnx = $this->Connexion();
  $sql = 'UPDATE recette SET nomRecette = :nomRecette, difficulte = :difficulte, description = :description, cout = :cout, chefID = :chefID, etapes = :etapeDescription, ingredients = :ingredients, duree = :duree, visibilite = :visibilite
        WHERE recetteID = :recetteID';
  $rs_updateArticle = $cnx->prepare($sql);
  $rs_updateArticle->bindValue(':recetteID', $article->getRecetteID(), PDO::PARAM_INT);
  $rs_updateArticle->bindValue(':chefID', $article->getChefID(), PDO::PARAM_INT);
  $rs_updateArticle->bindValue(':nomRecette', $article->getNomRecette(), PDO::PARAM_STR);
  $rs_updateArticle->bindValue(':difficulte', $article->getDifficulte(), PDO::PARAM_STR);
  $rs_updateArticle->bindValue(':description', $article->getDescription(), PDO::PARAM_STR);
  $rs_updateArticle->bindValue(':cout', $article->getCout(), PDO::PARAM_STR);	
  $rs_updateArticle->bindValue(':etapeDescription', $article->getEtapeDescription(), PDO::PARAM_STR);	
  $rs_updateArticle->bindValue(':ingredients', $article->getIngredients(), PDO::PARAM_STR);	
  $rs_updateArticle->bindValue(':duree', $article->getDuree(), PDO::PARAM_STR);	
  $rs_updateArticle->bindValue(':visibilite', $article->getVisibilite(), PDO::PARAM_STR);	
  
  $rs_updateArticle->execute();
}

public function AjoutLike(Article $article){
  $cnx = $this->Connexion();
  $sql = 'UPDATE etape SET nombreLike = nombreLike+1 WHERE recetteID = 1'; 
  $rs_ajoutLike = $cnx->prepare($sql); 
  $rs_ajoutLike->execute();
}


/*************** MODIFICATION D'UN ARTICLE ***************/	
/*********************************************************/	

/*************** MODIFICATION D'UN CHEF ***************/	

public function UpdateChef(Chef $chef) {
  $cnx = $this->Connexion();
  $sql = 'UPDATE chef SET nomDuChef = :nomDuChef, prenomDuChef = :prenomDuChef
        WHERE chefID = :chefID';
  $rs_updateChef = $cnx->prepare($sql);
  $rs_updateChef->bindValue(':chefID', $chef->getChefID(), PDO::PARAM_STR);
  $rs_updateChef->bindValue(':nomDuChef', $chef->getNomDuChef(), PDO::PARAM_STR);
  $rs_updateChef->bindValue(':prenomDuChef', $chef->getPrenomDuChef(), PDO::PARAM_STR);	
 
  $rs_updateChef->execute();
}

/*************** MODIFICATION D'UN CHEF ***************/	
/*********************************************************/	


/*************** SUPPRESSION D'UN ARTICLE ***************/	

public function DeleteArticle(Article $article) {
  $cnx = $this->Connexion();
  $sql = 'DELETE FROM recette
      WHERE recetteID = :recetteID';
  $rs_deleteArticle = $cnx->prepare($sql);
  $rs_deleteArticle->bindValue(':recetteID', $article->getRecetteID(), PDO::PARAM_INT);
  $rs_deleteArticle->execute();		
}

/*************** SUPPRESSION D'UN ARTICLE ***************/
/********************************************************/

/*************** SUPPRESSION D'UN CHEF ***************/	
public function DeleteChef(Chef $chef) {
  $cnx = $this->Connexion();
  $sql = 'DELETE FROM chef
      WHERE chefID = :chefID';
  $rs_deleteChef = $cnx->prepare($sql);
  $rs_deleteChef->bindValue(':chefID', $chef->getChefID(), PDO::PARAM_INT);
  $rs_deleteChef->execute();		
}
/*************** SUPPRESSION D'UN CHEF ***************/
/*****************************************************/

/*************** MESSAGES D'INFOS ********************/	

public function getMsgCreateArticle() {
  $msg = '<p><i>* Tous les champs sont obligatoires</i></p>';
  return $msg;
}

public function getMsgErreurCreateArticle() {
  $msg = '<p class="red">Merci de remplir tous les champs</p>';
  return $msg;
}

public function getMsgSuccesCreateArticle() {
  $msg = '<p class="green">Félicitations : La nouvelle recette a bien été insérée !</p>';
  return $msg;
}
public function getMsgSuccesCreateChef() {
  $msg = '<p class="green">Félicitations : La nouvelle fiche de chef a bien été créée !</p>';
  return $msg;
}
public function getMsgSuccesCreateAdmin() {
  $msg = '<p class="green">Félicitations : Le nouvel admin a bien été créé !</p>';
  return $msg;
}

public function getMsgSuccesUpdateArticle() {
  $msg = '<p class="green">Félicitations : La recette a bien été modifiée !</p>';
  return $msg;
}
public function getMsgSuccesUpdateChef() {
  $msg = '<p class="green">Félicitations : La fiche du chef a bien été modifiée !</p>';
  return $msg;
}
public function getMsgSuccesUpdateAdmin() {
  $msg = '<p class="green">Félicitations : Les infos de cet admin on bien été modifiées!</p>';
  return $msg;
}

public function getMsgSuccesDeleteArticle() {
  $msg = '<p class="green">Félicitations : La recette a bien été supprimée !</p>';
  return $msg;
}

public function getMsgSuccesDeleteAdmin() {
  $msg = '<p class="green">Félicitations : l\'admin a bien été supprimé !</p>';
  return $msg;
}

public function getMsgSuccesDeleteChef() {
  $msg = '<p class="green">Félicitations : le chef a bien été supprimé !</p>';
  return $msg;
}


/*************** MESSAGES D'INFOS ********************/
/*****************************************************/


}