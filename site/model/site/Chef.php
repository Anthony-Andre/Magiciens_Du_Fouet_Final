<?php
namespace model\site; 

class Chef{

  private $chefID; 
  private $nomDuChef;
  private $prenomDuChef; 

  public function setChefID($chefID){
    if($chefID > 0){
      $this->chefID = $chefID; 
    }
  }
  public function getChefID(){
    return $this->chefID; 
  }

  public function setNomDuChef($nomDuChef){
    if(is_string($nomDuChef)){
      $this->nomDuChef = $nomDuChef; 
    }
  }
  public function getNomDuChef(){
    return $this->nomDuChef; 
  }

  public function setPrenomDuChef($prenomDuChef){
    if(is_string($prenomDuChef)){
      $this->prenomDuChef = $prenomDuChef; 
    }
  }
  public function getPrenomDuChef(){
    return $this->prenomDuChef; 
  }



}