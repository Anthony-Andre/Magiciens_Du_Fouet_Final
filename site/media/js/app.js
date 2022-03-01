"use strict";

/****************** Saisie du code en cliquant : ******************/

let mdp = document.getElementById("mdp");

let identifiant = document.getElementById("identifiant");

function saisieCode(x) {

  if (mdp.value.length < 6) {

    mdp.value = mdp.value + x;
  }

}

/****************** Effacer le mot de passe + remélanger les chiffres: ******************/

function effacement() {
  mdp.value = "";
  identifiant.value = "";
  melangeTab(tab);
  shuffle();
}

/****************** Changement de position : ******************/

let boutonCode = document.getElementsByClassName("boutonCode");

let tab = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 22, 22, 22, 22, 22, 22]

function melangeTab(tabAMelanger) {
  tabAMelanger.sort(() => Math.random() - 0.5);
}

melangeTab(tab);

function shuffle() {

  for (let i = 0; i < tab.length; i++) {

    boutonCode[i].attributes[2].value = tab[i];
    boutonCode[i].innerHTML = tab[i];
    boutonCode[i].style.background = "rgb(204,204,204)";

    if (tab[i] == 22) {
      boutonCode[i].attributes[2].value = "";
      boutonCode[i].innerHTML = "";
      boutonCode[i].style.background = "rgb(221,221,221)"
    }

  }

}

shuffle();

/****************** Ajout du champs étape : ******************/ 

function ajoutEtape(){
  var labelEtape = document.createElement("label"); 
  var etapes = document.getElementById("etapes");
  var numeroEtape = etapes.childElementCount+1;
  labelEtape.innerHTML = "Étape N° " + numeroEtape; 
  etapes.appendChild(labelEtape); 
  var etape = document.createElement('input'); 
  etape.type='text';
  etape.className='inputEtape';
  etape.setAttribute('name', 'descriptionEtape'+numeroEtape);
  labelEtape.appendChild(etape);
}

/****************** Concaténation étapes, ingrédients et durée : ******************/ 

function concatenationEtapes(){
  var listeEtapes = document.getElementById("listeEtapes"); 

  var ensembleDesEtapes = document.getElementsByClassName("inputEtape"); 
  let tableauEtapes = [];

  for(let i=0; i<ensembleDesEtapes.length;i++){
    var etapesValue = ensembleDesEtapes[i].value+"#"; 
    tableauEtapes.push(etapesValue); 
  }

  listeEtapes.innerHTML=tableauEtapes
  listeEtapes.value=tableauEtapes

  var ingredients = document.getElementById("ingredients");
  let tableauIngredientsRegroupes = [];
  let tableauIngredientIndividuel = []; 
  var divIngredients = document.getElementsByClassName("divIngredient"); 

  for(var i = 0; i < divIngredients.length; i++){
    var ligneIngredient = document.getElementsByClassName("inputIngredient"+(i+1));
    for(var j = 0; j < ligneIngredient.length; j++){
      tableauIngredientIndividuel.push(ligneIngredient[j].value); 
    }
    tableauIngredientsRegroupes.push(tableauIngredientIndividuel+"#"); 
    tableauIngredientIndividuel = []; 
  }
  var listeIngredients = document.getElementById("listeIngredients"); 
  listeIngredients.value = tableauIngredientsRegroupes; 

  var heure = document.getElementById("heure"); 
  var minute = document.getElementById("minute"); 
  var seconde = document.getElementById("seconde"); 
  var dureeEnSec = document.getElementById("duree");
  dureeEnSec.value = (heure.value*60*60)+(minute.value*60)+(seconde.value*1); 

    /********** Système checkbox boolean visibilite **********/   

    var checkboxVisibilite = (document.getElementById("checkboxVisibilite")).checked; 
    var visibilite = document.getElementById("visibilite"); 

    visibilite.value = checkboxVisibilite; 
}

/****************** Suppression d'une étape ou d'un ingrédient : ******************/ 

function suppressionEtape(){
  var etapes = document.getElementById("etapes");
  etapes.removeChild(etapes.lastChild);
}

function suppressionIngredient(){
  var ingredients = document.getElementById("ingredients");
  ingredients.removeChild(ingredients.lastChild);
}

function ajoutIngredient(){

    /****************** Ajout du champs ingrédient : ******************/ 

  var divIngredient = document.createElement('div');
  var ingredients = document.getElementById("ingredients"); 
  ingredients.appendChild(divIngredient);
  divIngredient.className = 'divIngredient'; 
  var label = document.createElement('label');
  label.innerHTML = "Ingrédient : " 
  divIngredient.appendChild(label);
  var ingredient = document.createElement('input'); 
  ingredient.type='text'; 
  ingredient.className='inputIngredient'+ingredients.childElementCount;
  ingredient.name="ingredient";
  label.appendChild(ingredient);

  /****************** Ajout du champs quantité : ******************/ 

  var labelQuantite = document.createElement('label'); 
  labelQuantite.innerHTML = " Quantité : "; 
  divIngredient.appendChild(labelQuantite); 
  var quantite = document.createElement('input'); 
  quantite.type="text"; 
  quantite.name="quantite"; 
  labelQuantite.appendChild(quantite);
  quantite.className='inputIngredient'+ingredients.childElementCount;

  /****************** Ajout de l'unité : ******************/ 

  var labelUniteMesure = document.createElement('label'); 
  labelUniteMesure.innerHTML = " Unité de mesure : "; 
  divIngredient.appendChild(labelUniteMesure); 
  var uniteMesure = document.createElement('input'); 
  uniteMesure.type="text"; 
  uniteMesure.name="uniteMesure"; 
  labelUniteMesure.appendChild(uniteMesure);
  uniteMesure.className='inputIngredient'+ingredients.childElementCount;

}

function ajoutLike(){

  $.ajax({
    type: "POST",
    url: "model/AjoutLike.php",
    data: {action:"ajoutLike"}, 
    dataType: "json",
    success: function (response) {
      console.log(response); 
    }
  });


}