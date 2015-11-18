<?php

$ROUTES=array(
    '' => array(
            ''              => 'DefaultControler::defaultAction',
        ),
    'utilisateur' => array (
            ''              => 'UtilisateurControler::read_profil',
            'create'        => 'UtilisateurControler::read',
            'read'          => 'UtilisateurControler::read',
            'update'        => 'UtilisateurControler::update',
            'delete'        => 'UtilisateurControler::delete',
            'active'        => 'UtilisateurControler::active',
            'desactive'     => 'UtilisateurControler::desactive',
            'subscribe'     => 'UtilisateurControler::subscribe',
            'connect'       => 'UtilisateurControler::connect',
            'disconnect'    => 'UtilisateurControler::disconnect',
            'profil_owner'  => 'UtilisateurControler::read_profil_owner',
        ),
    'groupe' => array (
            ''              => 'GroupeControler::read',
            'create'        => 'GroupeControler::read',
            'read'          => 'GroupeControler::read',
            'update'        => 'GroupeControler::update',
            'delete'        => 'GroupeControler::delete',
            'active'        => 'GroupeControler::active',
            'desactive'     => 'GroupeControler::desactive',
        ),
    'droit' => array (
            ''              => 'DroitControler::read',
            'create'        => 'DroitControler::read',
            'read'          => 'DroitControler::read',
            'update'        => 'DroitControler::update',
            'delete'        => 'DroitControler::delete',
            'active'        => 'DroitControler::active',
            'desactive'     => 'DroitControler::desactive',
        ),
    'attribuer' => array (
            ''              => 'AttribuerControler::link',
            'link'          => 'AttribuerControler::link',
        ),
    'affecter' => array (
            ''              => 'AffecterControler::link',
            'link'          => 'AffecterControler::link',
        ),
    'personnage' => array (
            ''              => 'PersonnageControler::read',
            'create'        => 'PersonnageControler::read',
            'read'          => 'PersonnageControler::read',
            'update'        => 'PersonnageControler::update',
            'delete'        => 'PersonnageControler::delete',
            'active'        => 'PersonnageControler::active',
            'desactive'     => 'PersonnageControler::desactive',
        ),
);
?>