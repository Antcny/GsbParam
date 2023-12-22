<?php
/**
 * Mission GsbParam PHP Objet
 * 
 * @file ControleurCreationClient.php
 * @author Marielle Jouin <jouin.marielle@gmail.com>
 * @version    3.0
 * @date septembre 2023
 * @brief contient les fonctions pour gérer la création de compte client
 * regroupe les fonctions pour gérer la création de compte client
*/

/**
 * @class ControleurCreationClient
 * @brief contient les fonctions pour gérer la création de compte client
 */
class ControleurCreationClient{ 
	private $modeleFront;
	
	public function __construct()
    {
        $this->modeleFront=new ModeleFront();
    }

    /**
	 * Affiche le formulaire d'inscription d'un client
	*/
	function seCreerCompte()
	{
		$i=1;
			if($i>0)
			{   // les variables suivantes servent à l'affectation des attributs value du formulaire
				// ici le formulaire doit être vide, quand il est erroné, le formulaire sera réaffiché pré-rempli
				$prenom ='';$nom ='';$mail='';$rue='';$cp='';$ville ='';$login ='';$mdp ='';
				include ("vues/v_creationClient.php");
			}
			else
			{
				$message = "L'inscription ne s'est pas faite !";
				include ("vues/v_message.php");
			}
	}



    /**
	 * Traite les informations du formulaire d'inscription
	 *
	 * si les informations sont OK : enregistre l'inscription
	 * sinon affiche les erreurs de saisie et le formulaire vide
	*/
	function confirmerClient()
    {
    try{
        $prenom =$_REQUEST['prenom'];$nom =$_REQUEST['nom'];$mail=$_REQUEST['mail'];$rue=$_REQUEST['rue'];$cp=$_REQUEST['cp'];$ville =$_REQUEST['ville'];$login =$_REQUEST['login'];$mdp =$_REQUEST['mdp'];
        $msgErreurs = $this->getErreursSaisieClient($prenom,$nom,$mail,$rue,$cp,$ville,$login,$mdp);
        if (count($msgErreurs)!=0)
        {
            include ("vues/v_erreurs.php");
            include ("vues/v_creationClient.php");
        }
        else
        {
            $this->modeleFront->creerClient($prenom,$nom,$mail,$rue,$cp,$ville, $login, $mdp );
            $message = "Le compte client a été créé.";
            include ("vues/v_message.php");
        }
    }
    catch(Exception $e){
        $message = "Le compte client n'a pas été créé.";
    }
    }

    function getErreursSaisieClient($prenom,$nom,$mail,$rue,$ville,$cp,$login,$mdp)
	{
		$lesErreurs = array();
		if($nom=="")
		{
			$lesErreurs[]="Il faut saisir le champ nom";
		}
		if($prenom=="")
		{
			$lesErreurs[]="Il faut saisir le champ prenom";
		}
		if($rue=="")
		{
		$lesErreurs[]="Il faut saisir le champ rue";
		}
		if($ville=="")
		{
			$lesErreurs[]="Il faut saisir le champ ville";
		}
		if($cp=="")
		{
			$lesErreurs[]="Il faut saisir le champ code postal";
		}
		else
		{
			if(!$this->estUnCp($cp))
			{
				$lesErreurs[]= "erreur de code postal";
			}
		}
		if($mail=="")
		{
			$lesErreurs[]="Il faut saisir le champ mail";
		}
		else
		{
			if(!$this->estUnMail($mail))
			{
				$lesErreurs[]= "erreur de mail";
			}
		}
        if($login=="")
		{
		$lesErreurs[]="Il faut saisir le champ login";
		}
        if($mdp=="")
		{
		$lesErreurs[]="Il faut saisir le champ mdp";
		}
		return $lesErreurs;
	}

    /**
	 * teste si une chaîne a un format de code postal
	 *
	 * Teste le nombre de caractères de la chaîne et le type entier (composé de chiffres)
	 
	* @param string $codePostal  la chaîne testée
	* @return boolean $ok vrai ou faux
	*/
	function estUnCp($codePostal)
	{
	return strlen($codePostal)== 5 && $this->estEntier($codePostal);
	} 
    /**
	 * teste si une chaîne est un entier
	 *
	 * Teste si la chaîne ne contient que des chiffres
	 
	* @param string $valeur la chaîne testée
	* @return boolean $ok vrai ou faux
	*/

	function estEntier($valeur) 
	{
		return preg_match("/[^0-9]/", $valeur) == 0;
	}

    /**
	 * Teste si une chaîne a le format d'un mail
	 *
	 * Utilise les expressions régulières
	 
	* @param string $mail la chaîne testée
	* @return boolean $ok vrai ou faux
	*/
	function estUnMail($mail)
	{
	return  preg_match ('#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#', $mail);
	}

}