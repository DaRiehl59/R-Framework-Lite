<?php

class AffecterViewer
{
    public static function link($members,$others, $groupe)
    {
        global $PARAM;
        
        Viewer::init();

        $avatar_directory = $PARAM['groupes']['avatars']['directory'];
        Viewer::assign('avatar_directory', $avatar_directory);
        
        $theme = $PARAM['icons']['theme'];
        Viewer::assign('theme', $theme);
        
        Viewer::assign('members', $members);
        Viewer::assign('others', $others);
        Viewer::assign('groupe', $groupe);
        
        if(Session::get('connected'))
        {
            Viewer::assign('session_utilisateur', Session::get('utilisateur'));
            Viewer::assign('personnages', array());
        }

        Viewer::display('link_affecter_utilisateur_groupe.tpl');
    }
}