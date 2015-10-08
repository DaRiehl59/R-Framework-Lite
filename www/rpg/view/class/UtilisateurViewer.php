<?php

class UtilisateurViewer
{
    public static function profil($utilisateur)
    {
        Viewer::init();

        Viewer::assign('utilisateur', $utilisateur);
        
        Viewer::display('utilisateur_profil.tpl');
    }
}