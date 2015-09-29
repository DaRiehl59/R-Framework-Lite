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
import_directory($PARAM['controler']['class']);

Session::init();

/**
 * Routing
 */

Router::parse_url();
Router::call_controler();

?>
