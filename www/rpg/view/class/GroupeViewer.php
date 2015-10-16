<?php

class GroupeViewer
{
    public static function liste($groupes)
    {
        global $PARAM;
        
        Viewer::init();
        
        $avatar_directory = $PARAM['avatars']['directory']."/groupes";
        $theme = $PARAM['icons']['theme'];
        
        Viewer::assign('avatar_directory', $avatar_directory);
        Viewer::assign('theme', $theme);
        Viewer::assign('groupes', $groupes);
        
        if(Session::get('connected'))
        {
            Viewer::assign('utilisateur', Session::get('utilisateur'));
            Viewer::assign('personnages', array());
        }

        Viewer::display('groupe_liste.tpl');
    }
}