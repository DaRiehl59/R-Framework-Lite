<?php
/**
 * Routing the url
 *
 * @filesource Sesion.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */
class Router {
    
    static $controler;
    static $action;

    static $curr_controler;
    static $curr_action;
    static $prev_controler;
    static $prev_action;
    
    public static function parse_url(){

        self::$curr_controler = filter_input(INPUT_GET, 'c',FILTER_SANITIZE_STRING);
        self::$curr_action = filter_input(INPUT_GET, 'a', FILTER_SANITIZE_STRING);
        self::$prev_controler = filter_input(INPUT_GET, 'pc',FILTER_SANITIZE_STRING);
        self::$prev_action = filter_input(INPUT_GET, 'pa', FILTER_SANITIZE_STRING);
        
        self::$controler    = self::$curr_controler;
        self::$action       = self::$curr_action;
    }
    
    public static function call_current_controler(){
        self::$controler    = self::$curr_controler;
        self::$action       = self::$curr_action;
        self::call_controler();
    }

    public static function call_previous_controler(){
        self::$controler    = self::$prev_controler;
        self::$action       = self::$prev_action;
        self::call_controler();
    }
    
    public static function has_previous(){
        return !is_null(self::$prev_controler) && !is_null(self::$prev_action);
    }
    
    public static function get_previous_url(){
        return "?c=".self::$prev_controler."&amp;a=".self::$prev_action;
    }
    
    public static function call_controler(){
        global $ROUTES;
        
        Router::parse_url();
        
        $error = false;
        
        if(!isset($ROUTES[self::$controler]))
        {
            Viewer::error("Router Error : no route for `" . self::$controler . "` controler.");
            $error = true;
        }
        if(!isset($ROUTES[self::$controler][self::$action]))
        {
            Viewer::error("Router Error : no route for `" . self::$action ."` action " . " in `". self::$controler . "` controler.");
            $error = true;
        }
        
        if($error)
        {
            if(Session::get('connected'))
            {
                Viewer::assign('utilisateur', Session::get('utilisateur'));
            }
            Viewer::display('empty.tpl');
            die();
        }

        list($class,$method) = explode('::',$ROUTES[self::$controler][self::$action]);
                
        if(!class_exists($class))
        {
            Viewer::error("Router Error :  Controler class for `" . self::$controler . "` doesn't exist.");
            $error = true;
        }
        if(!method_exists($class,$method))
        {
            Viewer::error("Router Error :  Method for action `". self::$action ."` is not defined in `" . self::$controler . "` Controler class.");
            $error = true;
        }
        
        if($error)
        {
            Viewer::display('empty.tpl');
            die();
        }
        
        call_user_func_array(array($class, $method),array());
    }
}
