<?php
/**
 * @filesource kernel/Database.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */
class Database
{
    /**
     * Database Handler
     * @access private
     * staticvar PDO  $dbh provides the database access
     */
    private static $dbh;

    /**
     * Return DSN connection string
     * @access public
     * @return string
     */
    public static function get_dsn()
    {
        global $PARAM;

        $dsn  = $PARAM['model']['db']['driver'] .
                ":dbname=".$PARAM['model']['db']['dbname'] . ";" .
                "host=".$PARAM['model']['db']['host'] . ";" .
                "charset=".$PARAM['model']['db']['charset'] . ";";

        return $dsn;
    }

    /**
     * connect()
     * Open database connection
     * @access public
     * @static
     * @return PDO Object
     */
    public static function connect()
    {
        global $PARAM;

        $dsn = self::get_dsn();
        $user = $PARAM['model']['db']['user'];
        $passwd = $PARAM['model']['db']['passwd'];
        $options = $PARAM['model']['db']['options'];

        try {
            self::$dbh = new PDO($dsn, $user, $passwd, $options);
        } catch (PDOException $e) {
            DefaultViewer::error($e->getMessage());
            die();
        }
        
        return self::$dbh;
    }

    /**
     * disconnect()
     * Close database connection
     * @access public
     * @static
     */
    public static function disconnect()
    {
        self::$dbh = null;
    }

    /**
     * Check database connection object
     * @access public
     * @return bool
     */
    public static function is_connected()
    {
        return is_object(self::$dbh);
    }

    /**
     * Prepare a SQL Query
     * @access public
     * @static
     * @return PDO
     */
    public static function get_dbh()
    {
            return self::$dbh;
    }
}
?>