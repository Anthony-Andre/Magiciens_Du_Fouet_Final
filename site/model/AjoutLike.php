<?php

namespace model;
use PDO;

if(!isset($_COOKIE["like"])) {

  $cnx = new PDO('mysql:host=localhost;dbname=Les_Magiciens_Du_Fouet_V2;charset=utf8', "root", "");
  $sql = 'UPDATE etape SET nombreLike = nombreLike+1 WHERE recetteID = 1'; 
  $rs_ajoutLike = $cnx->prepare($sql); 
  $rs_ajoutLike->execute();
  setcookie("like", "salut");
  var_dump($_COOKIE["like"]);
  $message = '<p class="green">Votre vote a bien été pris en compte, merci !</p>';
  return $message;

} else {
  $message = '<p class="red">Vous avez d\'ores et déjà voté pour cette recette</p>';
  return $message;
  var_dump($message);
}



