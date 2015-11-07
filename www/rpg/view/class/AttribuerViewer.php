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
        
        if(!empty($items1))
        {
            $begin=$items1[0]->id;
            $end=$items1[0]->id;
            foreach ($items1 as $item)
            {
                if($item->id < $begin)  {$begin=$item->id;}
                if($item->id > $end)    {$end=$item->id;}
            }
            Viewer::assign('begin', $begin);
            Viewer::assign('end', $end);
        }
        
        if(Session::get('connected'))
        {
            Viewer::assign('session_utilisateur', Session::get('utilisateur'));
            Viewer::assign('personnages', array());
        }

        Viewer::display('link_attribuer_droit_groupe.tpl');
    }
}