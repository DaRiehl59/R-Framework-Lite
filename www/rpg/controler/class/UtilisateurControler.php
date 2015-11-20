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

require_once 'model/class/Confidentialite.php';
require_once 'model/class/Niveau_Utilisateur.php';
require_once 'model/class/Pays.php';
require_once 'model/class/Utilisateur.php';

require_once 'model/table/ConfidentialiteTable.php';
require_once 'model/table/Niveau_UtilisateurTable.php';
require_once 'model/table/PaysTable.php';
require_once 'model/table/UtilisateurTable.php';

require_once 'view/class/UtilisateurViewer.php';

class UtilisateurControler {
    public static function read()
    {
        global $PARAM;
        
        if(isset($_POST['btn_ajouter']))
        {
            $item['identifiant'] = filter_input(INPUT_POST, 'identifiant',FILTER_SANITIZE_STRING);
            $item['motdepasse'] = filter_input(INPUT_POST, 'motdepasse',FILTER_SANITIZE_STRING);
            $item['pseudo'] = filter_input(INPUT_POST, 'pseudo',FILTER_SANITIZE_STRING);
            $item['nom'] = filter_input(INPUT_POST, 'nom',FILTER_SANITIZE_STRING);
            $item['id_confid_nom'] = filter_input(INPUT_POST, 'id_confid_nom',FILTER_SANITIZE_NUMBER_INT);
            $item['prenom'] = filter_input(INPUT_POST, 'prenom',FILTER_SANITIZE_STRING);
            $item['id_confid_prenom'] = filter_input(INPUT_POST, 'id_confid_prenom',FILTER_SANITIZE_NUMBER_INT);
            $item['naissance'] = filter_input(INPUT_POST, 'naissance',FILTER_SANITIZE_STRING);
            $item['id_confid_naissance'] = filter_input(INPUT_POST, 'id_confid_naissance',FILTER_SANITIZE_NUMBER_INT);
            $item['sexe'] = filter_input(INPUT_POST, 'sexe',FILTER_SANITIZE_STRING);
            $item['id_confid_sexe'] = filter_input(INPUT_POST, 'id_confid_sexe',FILTER_SANITIZE_NUMBER_INT);
            $item['email'] = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_EMAIL);
            $item['id_confid_email'] = filter_input(INPUT_POST, 'id_confid_email',FILTER_SANITIZE_NUMBER_INT);
            $item['ville'] = filter_input(INPUT_POST, 'ville',FILTER_SANITIZE_STRING);
            $item['id_confid_ville'] = filter_input(INPUT_POST, 'id_confid_ville',FILTER_SANITIZE_NUMBER_INT);
            $item['id_pays'] = filter_input(INPUT_POST, 'id_pays',FILTER_SANITIZE_NUMBER_INT);
            $item['id_confid_pays'] = filter_input(INPUT_POST, 'id_confid_pays',FILTER_SANITIZE_NUMBER_INT);
            $item['description'] = filter_input(INPUT_POST, 'description',FILTER_SANITIZE_STRING);
            $item['id_confid_description'] = filter_input(INPUT_POST, 'id_confid_description',FILTER_SANITIZE_NUMBER_INT);
            $item['actif'] = (filter_input(INPUT_POST, 'actif',FILTER_SANITIZE_STRING) == "on")?1:0;
            $item['id_utilisateur_parrainer'] = filter_input(INPUT_POST, 'id_utilisateur_parrainer',FILTER_SANITIZE_NUMBER_INT);
            $item['id_niveau_utilisateur'] = filter_input(INPUT_POST, 'id_niveau_utilisateur',FILTER_SANITIZE_NUMBER_INT);
            
            if(empty($_FILES['userfile']['name'])){$item['avatar'] = null;}else{$item['avatar'] = picture_filename();}
            if(empty($item['ville'])){$item['ville'] = null;}
            if(empty($item['id_utilisateur_parrainer'])){$item['id_utilisateur_parrainer'] = null;}
            
            $result = UtilisateurTable::insert($item);
            if($result)
            {
                /**
                 * Création des dossiers de stockage
                 */
                $avatars_directory = $PARAM['utilisateurs']['avatars']['directory'].'/'.$result;
                mkdir($avatars_directory);
                $gallerie_directory = $PARAM['utilisateurs']['gallerie']['directory'].'/'.$result;
                mkdir($gallerie_directory);
                
                if(!empty($_FILES['userfile']['name']))
                {
                    upload_picture_to_dir($avatars_directory, $item['avatar']);
                }
            }
        }
        
        if(isset($_POST['btn_update']))
        {
            if(!empty($_FILES['userfile']['name']))
            {
                $directory = $PARAM['utilisateurs']['avatars']['directory'];
                $item['avatar'] = upload_picture_to_dir($directory);
            }
            $item['id'] = filter_input(INPUT_POST, 'id',FILTER_SANITIZE_NUMBER_INT);
            $item['identifiant'] = filter_input(INPUT_POST, 'identifiant',FILTER_SANITIZE_STRING);
            $item['motdepasse'] = filter_input(INPUT_POST, 'motdepasse',FILTER_SANITIZE_STRING);
            $item['pseudo'] = filter_input(INPUT_POST, 'pseudo',FILTER_SANITIZE_STRING);
            $item['nom'] = filter_input(INPUT_POST, 'nom',FILTER_SANITIZE_STRING);
            $item['id_confid_nom'] = filter_input(INPUT_POST, 'id_confid_nom',FILTER_SANITIZE_NUMBER_INT);
            $item['prenom'] = filter_input(INPUT_POST, 'prenom',FILTER_SANITIZE_STRING);
            $item['id_confid_prenom'] = filter_input(INPUT_POST, 'id_confid_prenom',FILTER_SANITIZE_NUMBER_INT);
            $item['naissance'] = filter_input(INPUT_POST, 'naissance',FILTER_SANITIZE_STRING);
            $item['id_confid_naissance'] = filter_input(INPUT_POST, 'id_confid_naissance',FILTER_SANITIZE_NUMBER_INT);
            $item['sexe'] = filter_input(INPUT_POST, 'sexe',FILTER_SANITIZE_STRING);
            $item['id_confid_sexe'] = filter_input(INPUT_POST, 'id_confid_sexe',FILTER_SANITIZE_NUMBER_INT);
            $item['email'] = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_EMAIL);
            $item['id_confid_email'] = filter_input(INPUT_POST, 'id_confid_email',FILTER_SANITIZE_NUMBER_INT);
            $item['ville'] = filter_input(INPUT_POST, 'ville',FILTER_SANITIZE_STRING);
            $item['id_confid_ville'] = filter_input(INPUT_POST, 'id_confid_ville',FILTER_SANITIZE_NUMBER_INT);
            $item['id_pays'] = filter_input(INPUT_POST, 'id_pays',FILTER_SANITIZE_NUMBER_INT);
            $item['id_confid_pays'] = filter_input(INPUT_POST, 'id_confid_pays',FILTER_SANITIZE_NUMBER_INT);
            $item['description'] = filter_input(INPUT_POST, 'description',FILTER_SANITIZE_STRING);
            $item['id_confid_description'] = filter_input(INPUT_POST, 'id_confid_description',FILTER_SANITIZE_NUMBER_INT);
            $item['actif'] = (filter_input(INPUT_POST, 'actif',FILTER_SANITIZE_STRING) == "on")?1:0;
            $item['id_utilisateur_parrainer'] = filter_input(INPUT_POST, 'id_utilisateur_parrainer',FILTER_SANITIZE_NUMBER_INT);
            $item['id_niveau_utilisateur'] = filter_input(INPUT_POST, 'id_niveau_utilisateur',FILTER_SANITIZE_NUMBER_INT);
            
            $result = UtilisateurTable::update($item);
        }
        
        if(isset($_POST['btn_delete']))
        {
            $id = filter_input(INPUT_POST, 'id',FILTER_SANITIZE_NUMBER_INT);
            

            $result = UtilisateurTable::delete($id);
            
        }
        
        $items = UtilisateurTable::select_all();
        
        /**
         * Chargement de la liste des Confidentialités
         */
        $items2 = ConfidentialiteTable::select('*');
        $confidentialites = array();
        foreach($items2 as $item2)
        {
            $confidentialites[$item2->id] = $item2->libelle;
        }
        /**
         * Chargement de la liste des Pays
         */
        $items2 = PaysTable::select('*');
        $pays = array();
        foreach($items2 as $item2)
        {
            $pays[$item2->id] = $item2->nom_fr_fr;
        }
        /**
         * Chargement de la liste des Utilisateurs
         */
        $items2 = UtilisateurTable::select('*');
        $utilisateurs = array();
        $utilisateurs[''] = '';
        foreach($items2 as $item2)
        {
            $utilisateurs[$item2->id] = $item2->nom;
        }
        /**
         * Chargement de la liste des Niveaux
         */
        $items2 = Niveau_UtilisateurTable::select('*');
        $niveaux = array();
        foreach($items2 as $item2)
        {
            $niveaux[$item2->id] = $item2->nom;
        }
        
        UtilisateurViewer::read($items, $confidentialites, $pays, $utilisateurs, $niveaux);
    }
    
    public static function update()
    {
        $id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
        
        $item = UtilisateurTable::select_by_id($id);
        if(is_null($item))
        {
            $previous_url = "?c=utilisateur";
            DefaultViewer::error("Utilisateur inconnu." , $previous_url);
        }
        else
        {
            /**
             * Chargement de la liste des Confidentialités
             */
            $items2 = ConfidentialiteTable::select('*');
            $confidentialites = array();
            foreach($items2 as $item2)
            {
                $confidentialites[$item2->id] = $item2->libelle;
            }
            /**
             * Chargement de la liste des Pays
             */
            $items2 = PaysTable::select('*');
            $pays = array();
            foreach($items2 as $item2)
            {
                $pays[$item2->id] = $item2->nom_fr_fr;
            }
            /**
             * Chargement de la liste des Utilisateurs
             */
            $items2 = UtilisateurTable::select('*');
            $utilisateurs = array();
            foreach($items2 as $item2)
            {
                $utilisateurs[$item2->id] = $item2->nom;
            }
            /**
             * Chargement de la liste des Niveaux
             */
            $items2 = Niveau_UtilisateurTable::select('*');
            $niveaux = array();
            foreach($items2 as $item2)
            {
                $niveaux[$item2->id] = $item2->nom;
            }
            UtilisateurViewer::update($item, $confidentialites, $pays, $utilisateurs, $niveaux);
        }
    }
    
    public static function delete()
    {
        $id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
        
        $item = UtilisateurTable::select_by_id($id);
        if(is_null($item))
        {
            $previous_url = "?c=utilisateur";
            DefaultViewer::error("Utilisateur inconnu." , $previous_url);
        }
        else
        {
            /**
             * Chargement de la liste des Confidentialités
             */
            $items2 = ConfidentialiteTable::select('*');
            $confidentialites = array();
            foreach($items2 as $item2)
            {
                $confidentialites[$item2->id] = $item2->libelle;
            }
            /**
             * Chargement de la liste des Pays
             */
            $items2 = PaysTable::select('*');
            $pays = array();
            foreach($items2 as $item2)
            {
                $pays[$item2->id] = $item2->nom_fr_fr;
            }
            /**
             * Chargement de la liste des Utilisateurs
             */
            $items2 = UtilisateurTable::select('*');
            $utilisateurs = array();
            foreach($items2 as $item2)
            {
                $utilisateurs[$item2->id] = $item2->nom;
            }
            /**
             * Chargement de la liste des Niveaux
             */
            $items2 = Niveau_UtilisateurTable::select('*');
            $niveaux = array();
            foreach($items2 as $item2)
            {
                $niveaux[$item2->id] = $item2->nom;
            }
            UtilisateurViewer::delete($item, $confidentialites, $pays, $utilisateurs, $niveaux);
        }
    }
    
    public static function active()
    {
        $id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
        
        $object = UtilisateurTable::select_by_id($id);
        if(is_null($object))
        {
            $previous_url = "?c=utilisateur";
            DefaultViewer::error("Utilisateur inconnu." , $previous_url);
        }
        else
        {
            $item = get_object_vars($object);
            $item['actif'] = 1;
            
            $result = UtilisateurTable::update($item);
            self::read();
        }
    }
    
    public static function desactive()
    {
        $id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
        
        $object = UtilisateurTable::select_by_id($id);
        if(is_null($object))
        {
            $previous_url = "?c=utilisateur";
            DefaultViewer::error("Utilisateur inconnu." , $previous_url);
        }
        else
        {
            $item = get_object_vars($object);
            $item['actif'] = 0;
            
            $result = UtilisateurTable::update($item);
            self::read();
        }
    }

    public static function connect()
    {
        $identifiant = filter_input(INPUT_POST, 'identifiant',FILTER_SANITIZE_STRING);
        $motdepasse = filter_input(INPUT_POST, 'motdepasse', FILTER_SANITIZE_STRING);
        
        $from = filter_input(INPUT_GET, 'from', FILTER_SANITIZE_STRING);
        
        $object = UtilisateurTable::connexion($identifiant, $motdepasse);
        
        if(!is_null($object)){
            
            $utilisateur = get_object_vars($object);
            
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
            $groupe_objects = AffecterTable::get_linked_items($classname, $FK_name, $FK_value);
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
                        $droit_objects = AttribuerTable::get_linked_items($classname, $FK_name, $FK_value);
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
    
    public static function disconnect()
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
    
    public static function subscribe()
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

    public static function read_profil()
    {
        $id_utilisateur = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
        if(empty($id_utilisateur))
        {
            $id_utilisateur = Session::get('utilisateur')['id'];
        }
        
        $utilisateur = UtilisateurTable::select_by_id($id_utilisateur);
        $confidentialite = ConfidentialiteTable::select();
        $pays = PaysTable::select();
        
        if(!is_null($utilisateur)){

            UtilisateurViewer::profil($utilisateur, $confidentialite, $pays);
        }
        else
        {
            DefaultViewer::error("Utilisateur inconnu.");
        }
    }
    
    public static function read_profil_owner()
    {
        $id_utilisateur = Session::get('utilisateur')['id'];
        
        $utilisateur = UtilisateurTable::select_by_id($id_utilisateur);
        $confidentialite = ConfidentialiteTable::select();
        $pays = PaysTable::select();
        
        if(!is_null($utilisateur)){

            UtilisateurViewer::profil($utilisateur, $confidentialite, $pays);
        }
        else
        {
            DefaultViewer::error("Utilisateur inconnu.");
        }
    }
}
?>