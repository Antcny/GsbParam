<?php
/**
 * Mission GsbParam PHP Objet
 * 
 * @file ControleurGererPanier.php
 * @author Marielle Jouin <jouin.marielle@gmail.com>
 * @version    3.0
 * @date septembre 2023
 * @brief contient les fonctions pour gérer la connexion

 * regroupe les fonctions pour gérer la connexion
*/
/**
 * @class ControleurConnexion
 * @brief contient les fonctions pour gérer la connexion
 */
class ControleurConnexion{
	private $modeleFront;
	
	public function __construct()
    {
        $this->modeleFront=new ModeleFront();

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

	function voirInscription()
	{
		include("vues/v_inscription.php");
	}
	function Inscription()
	{
		$this->modeleFront->insererClient();
		$this->modeleFront->insereConnexion();
		header("location:index.php?uc=gererConnexion&action=Connexion");
	}
		
}


 ?>
