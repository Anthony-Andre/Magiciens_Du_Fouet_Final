<?php
namespace model\admin;
use PDO;

class MembreManager {

/******************** Connexion : ***********************/ 

private function Connexion() {
	$cnx = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=utf8', ''.CNX_LOGIN.'', ''.CNX_PASS.'');
	return $cnx;
}	

/******************** Connexion : ***********************/ 
/********************************************************/	

	public function ReadMembre($pseudo, $password) {
		$cnx = $this->Connexion();
		$sql = 'SELECT * FROM membre
				WHERE pseudo = :pseudo AND password = :password';
		$req = $cnx->prepare($sql);
		$req->execute(
					array('pseudo'   => $pseudo,
						  'password' => $password)
					 );
		$data = $req->fetch(PDO::FETCH_ASSOC);
		
		$membre = new Membre();
		$membre->setPseudo($data['pseudo']);
		$membre->setPassword($data['password']);			 
		
		return $membre;			 
	}

/******************** Création d'un admin: ***********************/ 

	public function CreateMembre(Membre $membre) {
		$cnx = $this->Connexion();
		$sql = 'INSERT INTO membre
				 (pseudo,password) VALUES (:pseudo,:password)';
		$rs_createMembre = $cnx->prepare($sql);
		$rs_createMembre->bindValue(':pseudo', $membre->getPseudo(), PDO::PARAM_STR);
		$rs_createMembre->bindValue(':password', $membre->getPassword(), PDO::PARAM_STR);
		$rs_createMembre->execute();
	}

/******************** Création d'un admin: ***********************/ 
/*****************************************************************/		

/******************** Afficher tous les admins ***********************/ 

	public function ReadAllMembres(){
		$cnx = $this->Connexion(); 
		$rs_readAllMembres = $cnx->prepare('SELECT * FROM membre');
		$rs_readAllMembres->execute(); 
	
		while($data = $rs_readAllMembres->fetch(PDO::FETCH_ASSOC)){
			$membre = new Membre(); 
			$membre->SetMembreID($data['membreID']);
			$membre->SetPseudo($data['pseudo']); 
			$membre->SetPassword($data['password']); 
			$membres[] = $membre;
		}
		return $membres;
	}

/******************** Afficher tous les admin ***********************/ 
/********************************************************************/	

/* Modifier un admin : */

	public function UpdateMembre(Membre $membre) {
		$cnx = $this->Connexion();
		$sql = 'UPDATE membre SET pseudo = :pseudo, password = :password
					WHERE membreID = :membreID';
		$rs_updateMembre = $cnx->prepare($sql);
		$rs_updateMembre->bindValue(':membreID', $membre->getMembreID(), PDO::PARAM_INT);
		$rs_updateMembre->bindValue(':pseudo', $membre->getPseudo(), PDO::PARAM_STR);
		$rs_updateMembre->bindValue(':password', $membre->getPassword(), PDO::PARAM_STR);
		
		$rs_updateMembre->execute();

	}

	/* Supprimer un admin : */

	public function DeleteMembre(Membre $membre) {
		$cnx = $this->Connexion();
		$sql = 'DELETE FROM membre
		WHERE membreID = :membreID';			
		$rs_deleteMembre = $cnx->prepare($sql); 
		$rs_deleteMembre->bindValue(':membreID', $membre->getMembreID(), PDO::PARAM_INT);
		$rs_deleteMembre->execute(); 

	}

	/* Récuperation données membre : */

	public function ReadAdmin($membreID) {
		$cnx = $this->Connexion();
		$sql = 'SELECT * FROM membre
				WHERE membreID = :membreID';
		$rs_readMembreInformations = $cnx->prepare($sql);	
		$rs_readMembreInformations->bindValue(':membreID', $membreID, PDO::PARAM_INT);
		$rs_readMembreInformations->execute();
		$data = $rs_readMembreInformations->fetch(PDO::FETCH_ASSOC);
		
		$membre = new Membre();
		$membre->setMembreID($data['membreID']);
		$membre->setPseudo($data['pseudo']);
		$membre->setPassword($data['password']);
		
		return $membre;

	}
	
	public function getMsg() {
		$msg = '<p>Veuillez entrer vos codes d\'accès</p>';
		return $msg;
	}
	
	public function getMsgErreur() {
		$msg = '<p class="red">Les codes entrés ne sont pas corrects !</p>';
		return $msg;
	}

}

