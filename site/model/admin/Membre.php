<?php
namespace model\admin;

class Membre {
	private $membreID;
	private $pseudo;
	private $password;
	
	public function getMembreID() {
		return $this->membreID;
	}
	public function getPseudo() {
		return $this->pseudo;
	}
	public function getPassword() {
		return $this->password;
	}
	
	public function setMembreID($membreID) {
		if($membreID > 0) {
			$this->membreID = $membreID;
		}
	}
	public function setPseudo($pseudo) {
		if(is_string($pseudo)) {
			$this->pseudo = $pseudo;
		}
	}
	public function setPassword($password) {
		if(is_string($password)) {
			$this->password = $password;
		}
	}
}