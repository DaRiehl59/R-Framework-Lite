<?php
class Viewer
{
    private static $smarty;

    public static function init()
    {
        global $PARAM;
        self::$smarty = new Smarty;
        //$smarty->force_compile = true;
        self::$smarty->template_dir = $PARAM['view']['templates'];
        self::$smarty->compile_dir = $PARAM['plugins']['smarty'].'/'.'templates_c';
        self::$smarty->config_dir = $PARAM['plugins']['smarty'].'/'.'configs';

        self::$smarty->caching = false;
        self::$smarty->cache_lifetime = 0;

        self::$smarty->assign("head_title", $PARAM['html']['title']);
        self::$smarty->assign("generator", 'D. [R]iehl Framework 1.1');
        self::$smarty->assign("head_charset", $PARAM['html']['charset']);

        foreach($PARAM['html']['meta'] as $name => $content)
        {
            $metas[] = array('name' => $name, 'content' => $content);
        }
        self::$smarty->assign("head_metas", $metas);

        $folder = $PARAM['view']['style'];
        $files = get_files($folder);
        $styles = array();
        foreach ($files as $file)
        {
            if(strtolower(substr($file,strlen($file)-4,4)) == ".css")
            {
                $styles[] = $folder.'/'.$file;
            }
        }
        self::$smarty->assign("head_styles", $styles);

        $folder = $PARAM['controler']['js'];
        $files = get_files($folder);
        $scripts = array();
        foreach ($files as $file)
        {
            if(strtolower(substr($file,strlen($file)-3,3)) == ".js")
            {
                $scripts[] = $folder.'/'.$file;
            }
        }
        self::$smarty->assign("head_scripts", $scripts);

        self::$smarty->assign("head_favicon", is_file('favicon.ico'));

        self::$smarty->assign("URI_root", get_URI_root());

        self::$smarty->assign("banner_title", $PARAM['application']['name']);
        self::$smarty->assign("copyright", $PARAM['html']['meta']['copyright']);

        if(isset($_SESSION['droits']))
        {
            self::$smarty->assign("droits", $_SESSION['droits']);
        }
        if(isset($_SESSION['connected']))
        {
            self::$smarty->assign("connected", $_SESSION['connected']);
        }
        return self::$smarty;
    }

    public static function error($msg)
    {
        global $PARAM;
        
        self::$smarty = self::init();

        self::$smarty->assign("application_name", $PARAM['application']['name']);
        self::$smarty->assign("error_msg",$msg);
        self::$smarty->display('error.tpl');
    }
    
    public static function bienvenue($message)
    {
        global $PARAM;
        
        self::$smarty = self::init();

        self::$smarty->assign("application_name", $PARAM['application']['name']);
        self::$smarty->assign("message",$message);
        self::$smarty->display('bienvenue.tpl');
    }
}
?>
