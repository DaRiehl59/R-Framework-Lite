<?php

/**
 * Classe Controler par défaut
 *
 * @filesource controler/class/UtilisateurControler.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */

require_once 'view/class/DefaultViewer.php';

class DefaultControler
{
    public static function defaultAction()
    {
        DefaultViewer::defaultAction();
    }
}
