<?php
/**
 * Session Manager
 *
 * @filesource Sesion.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */
class Session {
    public static function init(){
        session_start();
        
        if(!isset($_SESSION['connected'])){
            $_SESSION['connected'] = false;
        }
    }
    
    public static function close(){
        session_destroy();
        session_unset();
        session_start();
        $_SESSION['connected'] = false;
    }
    
    public static function get($name){
        return $_SESSION[$name];
    }
    
    public static function set($name,$value){
        $_SESSION[$name]=$value;
    }
}
