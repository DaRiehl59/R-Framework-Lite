<?php
/**
 * @filesource index.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */

require_once('parameters.php');
require_once('functions.php');

import_directory($PARAM['kernel']['directory']);
import_directory($PARAM['plugins']['directory']);
import_directory($PARAM['controler']['directory']);

/**
 * Routing
 */

$controler = filter_input(INPUT_GET, 'c',FILTER_SANITIZE_STRING);
$action = filter_input(INPUT_GET, 'a', FILTER_SANITIZE_STRING);


Database::connect();
Database::disconnect();

Viewer::bienvenue("Bienvenue sur la page d'accueil de notre projet.")
?>
