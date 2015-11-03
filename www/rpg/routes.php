<?php

$ROUTES=array(
    '' => array(
            ''              => 'DefaultControler::defaultAction',
        ),
    'utilisateur' => array (
            ''              => 'UtilisateurControler::profil',
            'profil'        => 'UtilisateurControler::profil',
            'connect'       => 'UtilisateurControler::connect',
            'disconnect'    => 'UtilisateurControler::disconnect',
            'subscribe'     => 'UtilisateurControler::subscribe',
        ),
    'groupe' => array (
            ''              => 'GroupeControler::read',
            'create'        => 'GroupeControler::read',
            'read'          => 'GroupeControler::read',
            'update'        => 'GroupeControler::update',
            'delete'        => 'GroupeControler::delete',
        ),
    'droit' => array (
            ''              => 'DroitControler::read',
            'create'        => 'DroitControler::read',
            'read'          => 'DroitControler::read',
            'update'        => 'DroitControler::update',
            'delete'        => 'DroitControler::delete',
        ),
    'attribuer' => array (
            ''              => 'AttribuerControler::link',
            'link'          => 'AttribuerControler::link',
        ),
    'affecter' => array (
            ''              => 'AffecterControler::link',
            'link'          => 'AffecterControler::link',
        ),
);
?>