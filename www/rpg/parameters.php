<?php

/**
 * @filesource paramaters.php
 * @version 1.0
 * @author David RIEHL <david.riehl@gmail.com>
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

/**
 * View Parameters
 */
$PARAM['view']['directory']     = "./view";
$PARAM['view']['class']         = $PARAM['view']['directory'].'/'."class";
$PARAM['view']['template']     = $PARAM['view']['directory'].'/'."template";
$PARAM['view']['style']         = $PARAM['view']['directory'].'/'.'style';

/**
 * Controler Parameters
 */
$PARAM['controler']['directory']= "./controler";
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
$PARAM['application']['name']              = "Projet RPG";
$PARAM['application']['version']           = "1.0";

$PARAM['html']['title']                    = $PARAM['application']['name']." ".$PARAM['application']['version'];
$PARAM['html']['charset']                  = "UTF-8";
$PARAM['html']['meta']['application-name'] = $PARAM['application']['name']." ".$PARAM['application']['version'];
$PARAM['html']['meta']['author']           = "David RIEHL <david.riehl@gmail.com>";
$PARAM['html']['meta']['description']      = "Projet RPG";
$PARAM['html']['meta']['keywords']         = "RPG";
$PARAM['html']['meta']['copyright']        = "Lycée Henri Wallon &copy; 2015-2016";
$PARAM['html']['meta']['publisher']        = "D. [R]iehl Framework";
$PARAM['html']['meta']['robots']           = "all";
?>