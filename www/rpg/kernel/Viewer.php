<?php
class Viewer
{
    private static $smarty;
    private static $error;

    public static function init()
    {
        global $PARAM;
        
        if(is_null(self::$smarty)) {
        
            self::$smarty = new Smarty;
            self::$error = array();

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

            self::$smarty->assign("theme", $PARAM['icons']['theme']);
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
        }
        return self::$smarty;
    }
    
    public static function assign($var_name,$var_value)
    {
        self::$smarty->assign($var_name,$var_value);
    }
    
    public static function display($template)
    {
        global $PARAM;
        
        self::$smarty = self::init();
        self::$smarty->display($template);
    }
    
    public static function error($message, $previous_url=".")
    {
        self::$smarty = self::init();
        self::$error[] = $message;
        
        self::$smarty->assign("error_msgs", self::$error);
        self::$smarty->assign("previous_url", $previous_url);
    }
}
?>
