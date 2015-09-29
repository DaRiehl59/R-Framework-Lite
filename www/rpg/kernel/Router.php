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
                
        switch(self::$controler)
        {
            case 'utilisateur':
                switch(self::$action){
                    case 'connexion':
                        UtilisateurControler::connexion();
                        break;
                    case 'deconnexion':
                        UtilisateurControler::deconnexion();
                        break;
                    default:
                        Viewer::bienvenue();
                }
                break;
            default:
                Viewer::bienvenue();
        }
    }
}
