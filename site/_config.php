<?php
/* Inclusion de la classe Autoloader */
$class = '';
require_once('classe/Autoloader.php');

/* Déclaration de la constante URL */
$lien = $_SERVER['SCRIPT_NAME'];

	$tableaux = array('/index.php');
	foreach($tableaux as $tableau) {
		$verif = preg_match('#'.$tableau.'#', $lien);
		if($verif) {
			$var = $tableau;
		}
	}
	
$lien = explode($var, $lien);

/* Déclaration de la constante ROOT */
$root = $_SERVER['DOCUMENT_ROOT'];

/* Constante URL */
define('URL', $lien[0]);

/* Constante ROOT */
define('ROOT', $root.URL);	

define('MEDIA', URL.'/media');
define('MODEL', ROOT.'/model');
define('VIEW', ROOT.'/view');
define('CONTROLLER', ROOT.'/controller');

/* Constantes de connexion */
define('HOST', 'localhost');
define('DBNAME', 'Les_Magiciens_Du_Fouet_V2');
define('CNX_LOGIN', 'root');
define('CNX_PASS', '');







