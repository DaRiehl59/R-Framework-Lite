<?php
/**
 * Classe de controle des utilisateurs
 *
 * @filesource controler/class/UtilisateurControler.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */

require_once 'kernel/Database.php';
require_once 'model/class/Utilisateur.php';
require_once 'model/table/UtilisateurTable.php';
require_once 'model/table/ConfidentialiteTable.php';
require_once 'model/table/PaysTable.php';
require_once 'view/class/UtilisateurViewer.php';

class UtilisateurControler {
    public static function connexion()
    {
        $identifiant = filter_input(INPUT_POST, 'identifiant',FILTER_SANITIZE_STRING);
        $motdepasse = filter_input(INPUT_POST, 'motdepasse', FILTER_SANITIZE_STRING);
        $from = filter_input(INPUT_GET, 'from', FILTER_SANITIZE_STRING);
        
        $utilisateur = UtilisateurTable::connexion($identifiant, $motdepasse);
        
        if(!is_null($utilisateur)){
            $utilisateur['email_hash'] = md5(trim($utilisateur['email']));
            
            Session::set('utilisateur', $utilisateur);
            Session::set('connected', true);
            
            if(Router::has_previous()) {
                Router::call_previous_controler();
            }
            else
            {
                defaultViewer::defaultAction();
            }
        }
        else
        {
            if(Router::has_previous()) {
                $previous_url = Router::get_previous_url();
                
                Viewer::init();
                Viewer::error("Erreur d'identifiant ou de mot de passe.", $previous_url);
                Router::call_previous_controler();
            }
            else
            {
                Viewer::init();
                Viewer::error("Erreur d'identifiant ou de mot de passe.");
                defaultViewer::defaultAction();
            }
        }
    }
    
    public static function deconnexion()
    {
        Session::close();
        if(Router::has_previous()) {
            Router::call_previous_controler();
        }
        else
        {
            defaultViewer::defaultAction();
        }
    }
    
    public static function inscription()
    {
        $pays = PaysTable::select();
        
        if(!isset($_POST['btn_inscrire']))
        {
            UtilisateurViewer::inscription($pays);
        }
        else
        {
            $utilisateur['identifiant'] = filter_input(INPUT_POST, 'identifiant',FILTER_SANITIZE_STRING);
            $utilisateur['motdepasse']  = filter_input(INPUT_POST, 'motdepasse' ,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $utilisateur['pseudo']      = filter_input(INPUT_POST, 'pseudo'     ,FILTER_SANITIZE_STRING);
            $utilisateur['nom']         = filter_input(INPUT_POST, 'nom'        ,FILTER_SANITIZE_STRING);
            $utilisateur['email']       = filter_input(INPUT_POST, 'email'      ,FILTER_SANITIZE_EMAIL);
            $utilisateur['ville']       = filter_input(INPUT_POST, 'ville'      ,FILTER_SANITIZE_STRING);
            $utilisateur['id_pays']     = filter_input(INPUT_POST, 'id_pays'    ,FILTER_SANITIZE_NUMBER_INT);
            
            $result = UtilisateurTable::insert($utilisateur);
            if($result)
            {
                DefaultViewer::confirm("Votre compte a été créé.");
            }
            else
            {
                DefaultViewer::error("Une erreur c'est produite.");
            }
        }
    }

    public static function profil()
    {
        $id_utilisateur = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
        if(empty($id_utilisateur))
        {
            $id_utilisateur = Session::get('utilisateur')['id'];
        }
        
        $utilisateur = UtilisateurTable::get_utilisateur_by_id($id_utilisateur);
        $confidentialite = ConfidentialiteTable::select();
        $pays = PaysTable::select();
        
        if(!is_null($utilisateur)){
            $utilisateur['email_hash'] = md5(trim($utilisateur['email']));
            UtilisateurViewer::profil($utilisateur, $confidentialite, $pays);
        }
        else
        {
            DefaultViewer::error("Utilisateur inconnu.");
        }

    }
}
?>