<?php
require_once 'controleurs/ControleurVoirProduits.php';
require_once 'controleurs/ControleurAccueil.php';
require_once 'controleurs/ControleurGererPanier.php';
require_once 'controleurs/ControleurConnexion.php';
class Routeur{
    
    private $ctrlVoirProduits;
    private $ctrlAccueil;
    private $ctrlGererPanier;
    private $ctrlConnexion;
    public function __construct(){
        
        $this->ctrlVoirProduits=new ControleurVoirProduits();
        $this->ctrlAccueil=new ControleurAccueil();
        $this->ctrlGererPanier=new ControleurGererPanier();
        $this->ctrlConnexion=new ControleurConnexion();
    }
    /** recupère les paramètres de l'url et active les contrôleurs nécessaires
    */
    public function routerRequete()
    {
    // traitement des paramètres de l'url
    if(isset($_REQUEST['uc']))
    	$uc = $_REQUEST['uc'];
        else $uc='accueil';
    if(isset($_REQUEST['action']))
    	$action = $_REQUEST['action'];
    else $action=null;
    switch($uc)
    {
        case 'accueil':
            $this->ctrlAccueil->accueil();break;
        case 'voirProduits' :
            switch ($action)
            {
                case null :
                case 'voirCategories' : {$this->ctrlVoirProduits->voirCategories();break;}
                case 'voirProduits' : {$this->ctrlVoirProduits->voirProduits($_REQUEST['categorie']);break;}
                case 'nosProduits' : {$this->ctrlVoirProduits->nosProduits();break;}
            }; break;
        case 'gererPanier' :
            switch ($action)
            {
                case null :
                case 'voirPanier' : {$this->ctrlGererPanier->voirPanier();break;}
                case 'supprimerUnProduit' : {$this->ctrlGererPanier->supprimerProduitPanier();break;}
                case 'ajouterAuPanier' : {$this->ctrlGererPanier->ajouterAuPanier($_REQUEST['produit']);break;}
                case 'viderPanier' : {$this->ctrlGererPanier->viderPanier();break;}
                case 'passerCommande' : $this->ctrlGererPanier->passerCommande();break;
                case 'confirmerCommande' : $this->ctrlGererPanier->confirmerCommande();break;
                default: {$this->ctrlGererPanier->voirPanier();break;}
            }; break;
        case 'administrer' :
            switch($action)
        {
            case null:
            case 'verifieConnexion' :{$this->ctrlConnexion->verifieConnexion($_POST["username"]);break;}
            case 'Connexion' :{$this->ctrlConnexion->voirConnexion();break;}
            // case 'admin' :{$this->ctrlConnexion->voirConnexion();break;}
            case 'Deconnexion' :{$this->ctrlConnexion->deconnexion();break;}
           
        }

        case 'gererConnexion':
        switch($action)
        {
            case null:
            case 'verifieConnexion' :{$this->ctrlConnexion->verifieConnexion($_POST["username"]);break;}
            case 'Connexion' :{$this->ctrlConnexion->voirConnexion();break;}
            case 'Deconnexion' :{$this->ctrlConnexion->deconnexion();break;}
           
        }
        case 'gererinscription' :
            switch($action)
            {
                case null :
                    case'inscription' : {$this->ctrlConnexion->voirInscription();break;}
                    case 'inscrire' : {$this->ctrlConnexion->Inscription();break;}
            }


                    //TO DO
          // TODO Créer un contrôleur spécial pour l'administration du site
     }
    }
}

