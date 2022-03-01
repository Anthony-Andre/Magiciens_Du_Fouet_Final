<?php
namespace model\site; 

class Article{

  private $recetteID; 
  private $nomRecette;
  private $difficulte;
  private $cout; 
  private $description; 
  private $chefID;
  private $etapeDescription;
  private $dateAjout; 
  private $duree;
  private $visibilite; 

  public function setRecetteID($recetteID){
    if($recetteID > 0){
      return $this->recetteID = $recetteID; 
    }
  }
  public function getRecetteID(){
    return $this->recetteID; 
  }

  public function setNomRecette($nomRecette){
    if(is_string($nomRecette)){
      $this->nomRecette = $nomRecette;
    }
  }
  public function getNomRecette(){
    return $this->nomRecette;
  }

  public function setDifficulte($difficulte){
    if($difficulte > 0){
      $this->difficulte = $difficulte;
    }
  }
  public function getDifficulte(){
    return $this->difficulte; 
  }

  public function setCout($cout){
    if($cout > 0){
      $this->cout = $cout; 
    }
  }
  public function getCout(){
    return $this->cout; 
  }

  public function setDescription($description){
    if(is_string($description)){
      $this->description = $description;
    }
  }
  public function getDescription(){
    return $this->description; 
  }

  public function setChefID($chefID){
    if($chefID > 0){
      $this->chefID = $chefID; 
    }
  }
  public function getChefID(){
    return $this->chefID; 
  }

  public function setEtapeDescription($etapeDescription){
    if(is_string($etapeDescription)){
      return $this->etapeDescription = $etapeDescription; 
    }
  }
  public function getEtapeDescription(){
    return $this->etapeDescription;
  }

  public function setIngredients($ingredients){
    if(is_string($ingredients)){
      return $this->ingredients = $ingredients; 
    }
  }
  public function getIngredients(){
    return $this->ingredients;
  }

  public function setDateAjout($dateAjout){
      return $this->dateAjout = $dateAjout; 
  }
  public function getDateAjout(){
    return $this->dateAjout;
  }

  public function setDuree($duree){
    if($duree > 0){
      $this->duree = $duree; 
    }
  }
  public function getDuree(){
    return $this->duree; 
  }

  public function setVisibilite($visibilite){
      $this->visibilite = $visibilite; 
  }
  public function getVisibilite(){
    return $this->visibilite; 
  }
  
}


