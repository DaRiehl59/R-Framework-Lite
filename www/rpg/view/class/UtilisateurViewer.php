<?php

class UtilisateurViewer
{
    public static function read($items, $confidentialites, $pays, $utilisateurs, $niveaux)
    {
        global $PARAM;
        
        Viewer::init();
        
        
        Viewer::assign('items', $items);
        Viewer::assign('confidentialites', $confidentialites);
        Viewer::assign('pays', $pays);
        Viewer::assign('utilisateurs', $utilisateurs);
        Viewer::assign('niveaux', $niveaux);
        
        $id_confidentialite = $PARAM['utilisateurs']['default']['confidentialite'];
        Viewer::assign('id_confidentialite', $id_confidentialite);
        
        $sexes = array('H'=>'Homme','F'=>'Femme');
        Viewer::assign('sexes', $sexes);
        
        $sexe = $PARAM['utilisateurs']['default']['sexe'];
        Viewer::assign('sexe', $sexe);
        
        $default_avatar_H = $PARAM['utilisateurs']['default']['avatar']['H'];
        Viewer::assign('default_avatar_H', $default_avatar_H);

        $default_avatar_F = $PARAM['utilisateurs']['default']['avatar']['F'];
        Viewer::assign('default_avatar_F', $default_avatar_F);

        $id_pays = $PARAM['utilisateurs']['default']['pays'];
        Viewer::assign('id_pays', $id_pays);

        $id_niveau_utilisateur = $PARAM['utilisateurs']['default']['niveau'];
        Viewer::assign('id_niveau_utilisateur', $id_niveau_utilisateur);
        
        $avatar_directory = $PARAM['utilisateurs']['avatars']['directory'];
        Viewer::assign('avatar_directory', $avatar_directory);
        
        $theme = $PARAM['icons']['theme'];
        Viewer::assign('theme', $theme);
        
        $max_file_size = file_upload_max_size();
        Viewer::assign('max_file_size', $max_file_size);
        
        $max_file_size_str = round($max_file_size/1024/1024) . " Mo";
        Viewer::assign('max_file_size_str', $max_file_size_str);
        
        if(Session::get('connected'))
        {
            Viewer::assign('session_utilisateur', Session::get('utilisateur'));
            Viewer::assign('personnages', array());
        }

        Viewer::display('utilisateur_read.tpl');
    }
    
    public static function update($item, $confidentialites, $pays, $utilisateurs, $niveaux)
    {
        global $PARAM;
        
        Viewer::init();
        
        Viewer::assign('item', $item);
        Viewer::assign('confidentialites', $confidentialites);
        Viewer::assign('pays', $pays);
        Viewer::assign('utilisateurs', $utilisateurs);
        Viewer::assign('niveaux', $niveaux);
        
        $avatar_directory = $PARAM['utilisateurs']['avatars']['directory'];
        Viewer::assign('avatar_directory', $avatar_directory);
        
        $theme = $PARAM['icons']['theme'];
        Viewer::assign('theme', $theme);
        
        $max_file_size = file_upload_max_size();
        Viewer::assign('max_file_size', $max_file_size);
        
        $max_file_size_str = round($max_file_size/1024/1024) . " Mo";
        Viewer::assign('max_file_size_str', $max_file_size_str);
        
        if(Session::get('connected'))
        {
            Viewer::assign('session_utilisateur', Session::get('utilisateur'));
            Viewer::assign('personnages', array());
        }

        Viewer::display('utilisateur_update.tpl');
    }
    
    public static function delete($item, $confidentialites, $pays, $utilisateurs, $niveaux)
    {
        global $PARAM;
        
        Viewer::init();
        
        Viewer::assign('item', $item);
        Viewer::assign('confidentialites', $confidentialites);
        Viewer::assign('pays', $pays);
        Viewer::assign('utilisateurs', $utilisateurs);
        Viewer::assign('niveaux', $niveaux);
        
        $avatar_directory = $PARAM['utilisateurs']['avatars']['directory'];
        Viewer::assign('avatar_directory', $avatar_directory);
        
        $theme = $PARAM['icons']['theme'];
        Viewer::assign('theme', $theme);
        
        if(Session::get('connected'))
        {
            Viewer::assign('session_utilisateur', Session::get('utilisateur'));
            Viewer::assign('personnages', array());
        }

        Viewer::display('utilisateur_delete.tpl');
    }
    
    public static function inscription($pays)
    {
        Viewer::init();

        Viewer::assign('pays', $pays);
        
        Viewer::display('utilisateur_inscription.tpl');
    }
    
    public static function profil($utilisateur, $confidentialite, $pays)
    {
        Viewer::init();

        Viewer::assign('utilisateur', $utilisateur);
        Viewer::assign('confidentialite', $confidentialite);
        Viewer::assign('pays', $pays);

        if(Session::get('connected'))
        {
            Viewer::assign('session_utilisateur', Session::get('utilisateur'));
            Viewer::assign('personnages', array());
        }
        
        Viewer::display('utilisateur_profil.tpl');
    }
}