<?php
/**
 * @filesource functions.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */


/**
 * Magic function for classes automatic loading
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @param type $classname le nom de la classe
 */
function __autoload($classname)
{
    $filename = "./kernel/". $classname .".class.php";
    require_once($filename);
}

/**
 * Get files list from directory
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @param string $dir
 * @return array files
 */
function get_files($dir)
{
    $elements = scandir($dir);
    $files = array();
    foreach($elements as $item)
    {
        if (is_file($dir."/".$item))
        {
            $files[] = $item;
        }
    }
    return $files;
}

/**
 * Import required files from a directory
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @param $directory dossier où se trouve les fichier php à importer
 */
function import_directory($directory)
{
    global $PARAM;
    $files = get_files($directory);

    foreach ($files as $file)
    {
        if(substr($file,strlen($file)-4,4) == '.php')
        {
            require_once($directory."/".$file);
        }
    }
}

/**
 * Convert date from MySQL to French format
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @param String $date format YYYY-MM-DD
 * @return string date format DD/MM/YYYY
 */
function dateToFR($date)
{
    $annee = substr($date,0,4);
    $mois = substr($date,5,2);
    $jour = substr($date,8,2);
    return $jour . "/" . $mois . "/" . $annee;
}

/**
 * Convert date from French format
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @param String $date format DD/MM/YYYY
 * @return String date format YYYY-MM-DD
 */
function dateToEN($date)
{
    $annee = substr($date,6,4);
    $mois = substr($date,3,2);
    $jour = substr($date,0,2);
    return $annee . "-" . $mois . "-" . $jour;
}

/**
 * French date generation
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @param string $dir
 * @return array files
 */
function gen_date()
{
    $correspondance['Jour']['Mon']='Lun';
    $correspondance['Jour']['Tue']='Mar';
    $correspondance['Jour']['Wed']='Mer';
    $correspondance['Jour']['Thu']='Jeu';
    $correspondance['Jour']['Fri']='Ven';
    $correspondance['Jour']['Sat']='Sam';
    $correspondance['Jour']['Sun']='Dim';

    $correspondance['Mois']['January']='Janvier';
    $correspondance['Mois']['February']='Février';
    $correspondance['Mois']['March']='Mars';
    $correspondance['Mois']['April']='Avril';
    $correspondance['Mois']['May']='Mai';
    $correspondance['Mois']['June']='Juin';
    $correspondance['Mois']['July']='Juillet';
    $correspondance['Mois']['August']='Août';
    $correspondance['Mois']['September']='Septembre';
    $correspondance['Mois']['October']='Octobre';
    $correspondance['Mois']['November']='Novembre';
    $correspondance['Mois']['December']='Décembre';

    $date = $correspondance['Jour'][date("D")] . " ";
    $date.= date("j") . " ";
    $date.= $correspondance['Mois'][date("F")] . " ";
    $date.= date("Y") . " à " . date("H:i");

    return $date;
}

/**
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @return string base URI from site
 */
function get_URI_root()
{
    $requestURI = explode('/', urldecode($_SERVER['REQUEST_URI']));
    $scriptName = explode('/', urldecode($_SERVER['SCRIPT_NAME']));

    for($i= 0;$i < sizeof($scriptName);$i++)
    {
        if ($requestURI[$i] == $scriptName[$i])
        {
            $requestURI_root[]=$requestURI[$i];
            unset($requestURI[$i]);
        }
    }
    
    $URI_root = implode('/',$requestURI_root);
    
    return  $URI_root;
}

?>