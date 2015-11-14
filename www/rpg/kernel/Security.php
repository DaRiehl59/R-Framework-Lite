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
    public static function init()
    {
        global $PARAM;
        
        if(Session::get('connected'))
        {
            $session_utilisateur = Session::get('utilisateur');
            if(!is_null($session_utilisateur))
            {
                $identifiant = $session_utilisateur['identifiant'];
                $motdepasse = $session_utilisateur['motdepasse'];
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
                            if($groupe_object->actif)
                            {
                                $groupes[] = $groupe_object->nom;

                                /**
                                 * Chargement des droits
                                 */

                                $classname = 'droit';
                                $FK_name = 'id_groupe';
                                $FK_value = $groupe_object->id;
                                $droit_objects = AttribuerTable::get_items($classname, $FK_name, $FK_value);
                                if(!empty($droit_objects))
                                {
                                    foreach ($droit_objects as $droit_object)
                                    {
                                        if($droit_object->actif)
                                        {
                                            $droits[] = $droit_object->nom;
                                        }
                                    }
                                }
                            }
                        }
                    }
                    Session::set('groupes', $groupes);
                    Session::set('droits', $droits);
                }
                else
                {
                    Session::set('connected',false);
                    Viewer::init();
                    Viewer::error("Erreur de session (1). Veuillez vous reconnecter");
                    // defaultViewer::defaultAction();
                }
            }
            else
            {
                Session::set('connected',false);
                Viewer::init();
                Viewer::error("Erreur de session (2). Veuillez vous reconnecter");
                // defaultViewer::defaultAction();
            }
        }
        
        if(!Session::get('connected'))
        {
            /**
             * Loading Anonymous privileges
             */
            
            $groupe_objects = GroupeTable::select_not_connecte();
            
            if(!empty($groupe_objects))
            {
                foreach ($groupe_objects as $groupe_object)
                {
                    if($groupe_object->actif)
                    {
                        $groupes[] = $groupe_object->nom;

                        /**
                         * Chargement des droits
                         */

                        $classname = 'droit';
                        $FK_name = 'id_groupe';
                        $FK_value = $groupe_object->id;
                        $droit_objects = AttribuerTable::get_items($classname, $FK_name, $FK_value);
                        if(!empty($droit_objects))
                        {
                            foreach ($droit_objects as $droit_object)
                            {
                                if($droit_object->actif)
                                {
                                    $droits[] = $droit_object->nom;
                                }
                            }
                        }
                    }
                }
            }
            Session::set('groupes', $groupes);
            Session::set('droits', $droits);
            
                    
                    
        }
    }
    
    public static function check($controler_method)
    {
        $needle = $controler_method;
        $haystack = Session::get('droits');
        return in_array($needle, $haystack);
    }
}
