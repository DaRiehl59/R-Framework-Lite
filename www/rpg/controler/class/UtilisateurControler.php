<?php
/**
 * Classe de controle des utilisateurs
 *
 * @filesource controler/class/UtilisateurControler.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */

require_once 'model/class/Utilisateur.php';
require_once 'model/table/UtilisateurTable.php';
require_once 'kernel/Database.php';

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
                Viewer::bienvenue();
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
                Viewer::bienvenue();
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
            Viewer::bienvenue();
        }
    }
}
?>