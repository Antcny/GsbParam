<?php
/**
 * Mission GsbParam PHP Objet
 * 
 * @file ControleurAdministrer.php
 * @author Marielle Jouin <jouin.marielle@gmail.com>
 * @version    3.0
 * @date septembre 2023
 * @brief contient les fonctions pour gérer les droits de l'administrateur

 * regroupe les fonctions pour gérer les droits de l'administrateur
*/
/**
 * @class ControleurAdministrer
 * @brief contient les fonctions pour gérer les droits de l'administrateur
 */
class ControleurAdministrer{
	private $modeleFront;
	
	public function __construct()
    {
        $this->modeleFront=new ModeleFront();
		//$this->initPanier();
    }

    function voirConnexion()
		{
			
				include("vues/v_connexion.php");
			}

	function verifieConnexion($id)
	{
	$this->modeleFront->verifyConnexion($id);
	if($_SESSION["connexion"]==1){
		header("location:index.php?uc=accueil");
	}
	else{
		include("vues/v_connexion.php");
	}
	
	}
	function deconnexion()
	{
		$_SESSION["connexion"]=0;
		header("location:index.php?uc=accueil");
	}
}