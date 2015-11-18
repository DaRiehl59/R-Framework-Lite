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
    //$scriptName = explode('/', urldecode($_SERVER['SCRIPT_NAME']));
    
    $nb = count($requestURI);
    
    for($index=0; $index < $nb -1; $index++)
    {
        $requestURI_root[] = $requestURI[$index];
    }
    
    $URI_root = implode('/',$requestURI_root);
    
    return  $URI_root;
}

/**
 * Get File Extension (string after last .)
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @param string $filename file name
 * @return string extension
 */
function get_file_ext($filename)
{
    $parts = explode('.',$filename);
    $num = count($parts);
    $ext = $parts[$num-1];
    return $ext;
}

/**
 * Upload picture
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @param string $directory upload directory (defaults from $PARAM)
 * @param string $filename file name  (defaults datetime)
 * @return boolean success
 */
function picture_filename()
{
    $accepted_mime = array(
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
    );

    try
    {
        // Undefined | Multiple Files | $_FILES Corruption Attack
        // If this request falls under any of them, treat it invalid.
        if (
            !isset($_FILES['userfile']['error']) ||
            is_array($_FILES['userfile']['error'])
        ) {
            throw new RuntimeException('Invalid parameters.');
        }

        // Check $_FILES['upfile']['error'] value.
        switch ($_FILES['userfile']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
        }

        // You should also check filesize here. 
        if ($_FILES['userfile']['size'] > file_upload_max_size()) {
            throw new RuntimeException('Exceeded filesize limit.');
        }

        // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
        // Check MIME Type by yourself.
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $ext = array_search($finfo->file($_FILES['userfile']['tmp_name']),$accepted_mime,true);
        if (! $ext) {
            throw new RuntimeException('Invalid file format.');
        }

        $filename = sha1_file($_FILES['userfile']['tmp_name']) . '.' . $ext;
    }
    catch (RuntimeException $e)
    {
        //die($e->getMessage());
        $filename = false;
    }
    
    return $filename;
}


/**
 * Upload picture
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @param string $directory upload directory (defaults from $PARAM)
 * @param string $filename file name  (defaults datetime)
 * @return boolean success
 */
function upload_picture_to_dir($directory="", $filename="")
{
    $accepted_mime = array(
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
    );
    return upload_file_to_dir($directory, $filename, $accepted_mime);
}

/**
 * Upload file
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @param string $directory upload directory (defaults from $PARAM)
 * @param string $filename file name  (defaults datetime)
 * @param array $accepted_mime accepted MIME types
 * @return boolean success
 */
function upload_file_to_dir($directory="", $filename="", $accepted_mime=array())
{
    global $PARAM;

    try
    {
        // Undefined | Multiple Files | $_FILES Corruption Attack
        // If this request falls under any of them, treat it invalid.
        if (
            !isset($_FILES['userfile']['error']) ||
            is_array($_FILES['userfile']['error'])
        ) {
            throw new RuntimeException('Invalid parameters.');
        }

        // Check $_FILES['upfile']['error'] value.
        switch ($_FILES['userfile']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
        }

        // You should also check filesize here. 
        if ($_FILES['userfile']['size'] > file_upload_max_size()) {
            throw new RuntimeException('Exceeded filesize limit.');
        }

        // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
        // Check MIME Type by yourself.
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $ext = array_search($finfo->file($_FILES['userfile']['tmp_name']),$accepted_mime,true);
        if (! $ext) {
            throw new RuntimeException('Invalid file format.');
        }

        // Specifying upload directory
        if(empty($directory))
        {
            $uploaddir = $PARAM['uploads']['directory'];
        }
        else
        {
            $uploaddir = $directory;
        }
        // Specifying upload file name
        if(empty($filename))
        {
            // You should name it uniquely.
            // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
            // On this example, obtain safe unique name from its binary data.
            $filename = sha1_file($_FILES['userfile']['tmp_name']) . '.' . $ext;
            $uploadfile = $uploaddir . "/" . $filename;
        }
        else
        {
            $uploadfile = $uploaddir . "/" . $filename;
        }

        if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))
        {
            throw new RuntimeException('Failed to move uploaded file.');
        }
    }
    catch (RuntimeException $e)
    {
        //die($e->getMessage());
        $filename = false;
    }
    
    return $filename;
}

/**
 * Drupal GPL 2 Functions
 */

// Returns a file size limit in bytes based on the PHP upload_max_filesize
// and post_max_size
function file_upload_max_size() {
  static $max_size = -1;

  if ($max_size < 0) {
    // Start with post_max_size.
    $max_size = parse_size(ini_get('post_max_size'));

    // If upload_max_size is less, then reduce. Except if upload_max_size is
    // zero, which indicates no limit.
    $upload_max = parse_size(ini_get('upload_max_filesize'));
    if ($upload_max > 0 && $upload_max < $max_size) {
      $max_size = $upload_max;
    }
  }
  return $max_size;
}

function parse_size($size) {
  $unit = preg_replace('/[^bkmgtpezy]/i', '', $size); // Remove the non-unit characters from the size.
  $size = preg_replace('/[^0-9\.]/', '', $size); // Remove the non-numeric characters from the size.
  if ($unit) {
    // Find the position of the unit in the ordered string which is the power of magnitude to multiply a kilobyte by.
    return round($size * pow(1024, stripos('bkmgtpezy', $unit[0])));
  }
  else {
    return round($size);
  }
}
?>