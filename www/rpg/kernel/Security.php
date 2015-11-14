<?php
/**
 * Security Manager
 *
 * @filesource Sesion.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */
require_once 'model/class/Droit.php';


class Security {
    //put your code here
    public static function init()
    {
        global $PARAM;
        
        if(Session::get('connected'))
        {
            $identifiant = Session::get('identifiant');
            $motdepasse = Session::get('motdepasse');
            if(!is_null($identifiant) && !is_null($motdepasse))
            {
                $object = UtilisateurTable::connexion($identifiant, $motdepasse);

                if(!is_null($object)){

                    $utilisateur = get_object_vars($object);
                    $utilisateur['email_hash'] = md5(trim($object->email));

                    Session::set('utilisateur', $utilisateur);
                    Session::set('connected', true);
                    
                    $groupes = array();
                    $droits = array();
                    
                    /**
                     * Chargement des groupes
                     */
                    
                    $classname = "groupe";
                    $FK_name = "id_utilisateur";
                    $FK_value = $utilisateur['id'];
                    $groupe_objects = AffecterTable::get_items($classname, $FK_name, $FK_value);
                    if(!empty($groupe_objects))
                    {
                        foreach ($groupe_objects as $groupe_object)
                        {
                            $groupe = get_object_vars($groupe_object);
                            $groupes[] = $groupe;

                            /**
                             * Chargement des droits
                             */
                            
                            $classname = "droit";
                            $FK_name = "id_groupe";
                            $FK_value = $groupe_object->id;
                            $droit_objects = AttribuerTable::get_items($classname, $FK_name, $FK_value);
                            if(!empty($droit_objects))
                            {
                                foreach ($droit_objects as $droit_object)
                                {
                                    $droit = get_object_vars($droit_object);
                                    $droits[] = $droit;
                                }
                                Session::set('droits', $droits);
                            }
                            else
                            {
                                Session::set('droits', $droits);
                            }
                        }
                        Session::set('groupes', $groupes);
                    }
                    else
                    {
                        Session::set('groupes', $groupes);
                    }
                }
                else
                {
                    Session::set('connected')=false;
                    Viewer::init();
                    Viewer::error("Erreur de session. Veuillez vous reconnecter");
                    // defaultViewer::defaultAction();
                }
            }
            else
            {
                Session::set('connected')=false;
                Viewer::init();
                Viewer::error("Erreur de session. Veuillez vous reconnecter");
                // defaultViewer::defaultAction();
            }
        }
        
        if(!Session::get('connected'))
        {
            /**
             * Loading Anonymous privileges
             */
            $dbh = Database::connect();
            $statement =  "SELECT droit.*"."\r\n"
                        . "FROM groupe"
                        . "INNER JOIN attribuer ON attribuer.id_groupe = groupe.id"
                        . "INNER JOIN droit     ON attribuer.id_droit  = droit.id"
                        . "WHERE groupe.connecte IS FALSE;";
            $sth = $dbh->prepare($statement);
            $sth->bindParam('nom', $nom);
            $sth->execute();
            $droits = $sth->fetchAll(PDO::FETCH_CLASS, 'Droit');
            Database::disconnect();
        }
    }
}
