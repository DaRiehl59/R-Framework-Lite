<?php

$ROUTES=array(
    '' => array('' => 'DefaultControler::defaultAction'),
    'utilisateur' => array (
            'connexion' => 'utilisateurControler::Connexion',
            'deconnexion' => 'utilisateurControler::Deconnexion',
        ),
);
?>