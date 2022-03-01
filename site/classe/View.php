<?php
namespace classe;

class View {
	private $dossier;
	private $fichier;
	private $titre;
	private $description;
	private $motcle;
	
	
	public function __construct($dossier, $fichier, $titre, $description, $motcle) {
		$this->dossier     = $dossier;
		$this->fichier     = $fichier;
		$this->titre       = $titre;
		$this->description = $description;
		$this->motcle      = $motcle;
	}
	
	public function AfficherVue($tableau = array()) {
		
		extract($tableau);
		
		$dossier     = $this->dossier;
		$fichier     = $this->fichier;
		$titre       = $this->titre;
		$description = $this->description;
		$motcle      = $this->motcle;
		
		ob_start();
		include(VIEW.'/'.$dossier.'/'.$fichier.'.php');
		$contenu = ob_get_clean();
		
		include(VIEW.'/_gabarit.php');
	}
}