<?php
namespace model\site; 

class Etape{

  private $etapeID; 
  private $etapeDescription;

  public function setEtapeID($etapeID){
    if($etapeID > 0){
      return $this->etapeID = $etapeID;
    }
  }
  public function getEtapeID(){
    return $this->etapeID;
  }

  public function setEtapeDescription($etapeDescription){
    if(is_string($etapeDescription)){
      return $this->etapeDescription = $etapeDescription; 
    }
  }
  public function getEtapeDescription(){
    return $this->etapeDescription;
  }
}

