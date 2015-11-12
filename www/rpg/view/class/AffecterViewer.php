<?php

class AffecterViewer
{
    public static function link($members, $members_ids, $others, $others_ids, $groupe)
    {
        global $PARAM;
        
        Viewer::init();

        Viewer::assign('members', $members);
        Viewer::assign('members_ids', $members_ids);
        Viewer::assign('others', $others);
        Viewer::assign('others_ids', $others_ids);
        Viewer::assign('groupe', $groupe);

        $avatar_directory = $PARAM['groupes']['avatars']['directory'];
        Viewer::assign('avatar_directory', $avatar_directory);
        
        $theme = $PARAM['icons']['theme'];
        Viewer::assign('theme', $theme);
        
        if(Session::get('connected'))
        {
            Viewer::assign('session_utilisateur', Session::get('utilisateur'));
            Viewer::assign('personnages', array());
        }

        Viewer::display('link_affecter_utilisateur_groupe.tpl');
    }
}