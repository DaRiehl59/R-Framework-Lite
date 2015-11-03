<?php

class AttribuerViewer
{
    public static function link($items1,$items2,$links)
    {
        global $PARAM;
        
        Viewer::init();
        
        Viewer::assign('items1', $items1);
        Viewer::assign('items2', $items2);
        Viewer::assign('links', $links);
        
        if(Session::get('connected'))
        {
            Viewer::assign('session_utilisateur', Session::get('utilisateur'));
            Viewer::assign('personnages', array());
        }

        Viewer::display('link_attribuer_droit_groupe.tpl');
    }
}