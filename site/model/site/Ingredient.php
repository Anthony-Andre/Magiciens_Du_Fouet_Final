<?php
namespace model\site; 

class Ingredient{

  private $ingredientID; 
  private $nomIngredient;
  private $quantite;
  private $uniteMesure; 

  public function setIngredientID($ingredientID){
    if($ingredientID > 0){
      return $this->ingredientID = $ingredientID;
    }
  }
  public function getIngredientID(){
    return $this->ingredientID;
  }

  public function setNomIngredient($nomIngredient){
    if(is_string($nomIngredient)){
      return $this->nomIngredient = $nomIngredient; 
    }
  }
  public function getNomIngredient(){
    return $this->nomIngredient; 
  }

  public function setQuantite($quantite){
    if($quantite > 0){
      return $this->quantite = $quantite; 
    }
  }
  public function getQuantite(){
    return $this->quantite; 
  }

  public function setUniteMesure($uniteMesure){
    if(is_string($uniteMesure)){
      return $this->uniteMesure = $uniteMesure; 
    }
  }
  public function getUniteMesure(){
    return $this->uniteMesure; 
  }



}

