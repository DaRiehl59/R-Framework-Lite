<?php
/**
 * @filesource paramaters.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */

/**
 * Kernel Paramaters
 */
$PARAM['kernel']['directory']   = "./kernel";

/**
 * Model Parameters
 */
$PARAM['model']['directory']    = "./model";
$PARAM['model']['class']        = $PARAM['model']['directory'].'/'."class";
$PARAM['model']['table']        = $PARAM['model']['directory'].'/'."table";
$PARAM['model']['csv']          = $PARAM['model']['directory'].'/'."csv";
$PARAM['model']['sql']          = $PARAM['model']['directory'].'/'."sql";
$PARAM['model']['db']['driver'] = "mysql";
$PARAM['model']['db']['dbname'] = "rpg";
$PARAM['model']['db']['host']   = "127.0.0.1";
$PARAM['model']['db']['charset']= "UTF8";
$PARAM['model']['db']['user']   = "rpg";
$PARAM['model']['db']['passwd'] = "rpg";
$PARAM['model']['db']['options'] = array();
$PARAM['model']['db']['engine'] = "InnoDB";


/**
 * View Parameters
 */
$PARAM['view']['directory']     = "./view";
$PARAM['view']['class']         = $PARAM['view']['directory'].'/'."class";
$PARAM['view']['templates']     = $PARAM['view']['directory'].'/'."templates";
$PARAM['view']['style']         = $PARAM['view']['directory'].'/'.'style';

/**
 * Controler Parameters
 */
$PARAM['controler']['directory']= "./controler";
$PARAM['controler']['class']    = $PARAM['controler']['directory'].'/'.'class';
$PARAM['controler']['ajax']     = $PARAM['controler']['directory'].'/'.'ajax';
$PARAM['controler']['js']       = $PARAM['controler']['directory'].'/'."js";

/**
 * Icons Parameters
 */
$PARAM['icons']['directory']    = "./icons";

/**
 * Plugins Parameters
 */
$PARAM['plugins']['directory']  = "./plugins";

/**
 * Application Parameters
 */
$PARAM['application']['name']              = "RPG-Project";
$PARAM['application']['version']           = "1.0";

$PARAM['html']['title']                    = $PARAM['application']['name']." ".$PARAM['application']['version'];
$PARAM['html']['charset']                  = "UTF-8";
$PARAM['html']['meta']['application-name'] = $PARAM['application']['name']." ".$PARAM['application']['version'];
$PARAM['html']['meta']['author']           = "David RIEHL <david.riehl@gmail.com>";
$PARAM['html']['meta']['description']      = "Projet RPG";
$PARAM['html']['meta']['keywords']         = "RPG";
$PARAM['html']['meta']['copyright']        = "2015-2016" . " " . $PARAM['application']['name'];
$PARAM['html']['meta']['publisher']        = "Lycée Henri Wallon";
$PARAM['html']['meta']['robots']           = "all";
?>