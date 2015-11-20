<?php

class AffecterViewer
{
    public static function link($itemname, $FK_name, $item, $linked_items, $unlinked_items, $back_controler)
    {
        global $PARAM;
        
        Viewer::init();

        Viewer::assign('link_name', AffecterControler::$link_name);
        Viewer::assign('linked', AffecterControler::$linked);
        Viewer::assign('unlinked', AffecterControler::$unlinked);

        Viewer::assign('itemname', $itemname);
        Viewer::assign('FK_name', $FK_name);
        Viewer::assign('item', $item);
        Viewer::assign('linked_items', $linked_items);
        Viewer::assign('unlinked_items', $unlinked_items);
        Viewer::assign('back_controler', $back_controler);
        
        $param_index = $back_controler.'s';
        $avatar_directory = $PARAM[$param_index]['avatars']['directory'];
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