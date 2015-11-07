#To Contribute to this Project ...

##Main Directories

* Web Directory : [./www/rpg](./www/rpg)
* Specifications Directory : [./SPECIFICATIONS](./SPECIFICATIONS)
* TASKS Management Directory : [./TASKS](./TASKS)

##Specifications

* [USE CASES](./SPECIFICATIONS/USE_CASES.md) (MarkDown File)
* [USE CASE DIAGRAM]() (Dia File) (yet to do)
* [CLASS DIAGRAM](./SPECIFICATIONS/CLASS_DIAGRAM.dia) (Dia File)

##Framework Architecture

* Kernel Static Classes (./www/rpg/kernel/)

    * Database.php  (Handle Database Access)
    * Router.php    (Handle Controler Routing)
    * Session.php   (Handle $_SESSION Access)
    * Viewer.php    (Handle Smarty Template Engine)

* Kernel Files (./www/rpg/)

* functions.php     (kernel functions library)
* parameters.php    (Parameters Definitions : Project Directories, ...)
* router.php        (Routes Definitions)

##MVC Architecture

* Model

    * **./www/rpg/model/class/**Item.php (ObjectDefinitions)
    * **./www/rpg/model/table/**ItemTable.php (Object Relationnal Mapping)

* View

    * **./www/rpg/view/class/**ItemViewer.php (initiate Smarty engine, assign variables, display template)
    * **./www/rpg/view/js/**functions.js (JavaScript Libraries)
    * **./www/rpg/view/style/**item.css (Cascade Style Sheets)
    * **./www/rpg/view/templates/**item_action.tpl (Smarty Template File)

* Controler

    * **./www/rpg/controler/class/**ItemControler.php (filter get and post values from url or form, call model and view methods)

##Contribution Demo

(see Groupe or Droit for examples)

* Templates

    * **./www/rpg/view/templates/**demo_read.tpl
    * **./www/rpg/view/templates/**demo_update.tpl
    * **./www/rpg/view/templates/**demo_delete.tpl

* Viewer Class

    * **./www/rpg/view/class/**DemoViewer.php

        class DemoViewer
        {
            public static function read($items)
            {
                global $PARAM;

                Viewer::init();

                Viewer::assign('items', $items);

                $avatar_directory = $PARAM['groups']['avatars']['directory'];
                Viewer::assign('avatar_directory', $avatar_directory);

                $theme = $PARAM['icons']['theme'];
                Viewer::assign('theme', $theme);

                $max_file_size = file_upload_max_size();
                Viewer::assign('max_file_size', $max_file_size);

                $max_file_size_str = round($max_file_size/1024/1024) . " Mo";
                Viewer::assign('max_file_size_str', $max_file_size_str);

                if(Session::get('connected'))
                {
                    Viewer::assign('session_utilisateur', Session::get('utilisateur'));
                    Viewer::assign('personnages', array());
                }

                Viewer::display('demo_read.tpl');
            }
            
            public static function update($item)
            {
                global $PARAM;

                Viewer::init();

                Viewer::assign('item', $item);

                $avatar_directory = $PARAM['groups']['avatars']['directory'];
                Viewer::assign('avatar_directory', $avatar_directory);

                $theme = $PARAM['icons']['theme'];
                Viewer::assign('theme', $theme);

                $max_file_size = file_upload_max_size();
                Viewer::assign('max_file_size', $max_file_size);

                $max_file_size_str = round($max_file_size/1024/1024) . " Mo";
                Viewer::assign('max_file_size_str', $max_file_size_str);

                if(Session::get('connected'))
                {
                    Viewer::assign('session_utilisateur', Session::get('utilisateur'));
                    Viewer::assign('personnages', array());
                }

                Viewer::display('demo_update.tpl');
            }
            
            public static function delete($item)
            {
                global $PARAM;

                Viewer::init();

                Viewer::assign('item', $item);

                $avatar_directory = $PARAM['groups']['avatars']['directory'];
                Viewer::assign('avatar_directory', $avatar_directory);

                $theme = $PARAM['icons']['theme'];
                Viewer::assign('theme', $theme);

                if(Session::get('connected'))
                {
                    Viewer::assign('session_utilisateur', Session::get('utilisateur'));
                    Viewer::assign('personnages', array());
                }

                Viewer::display('demo_delete.tpl');
            }
        }

* Controler

    * **./www/rpg/controler/class/**DemoControler.php

        /* see GroupeControler.php for more details */
        
        require_once 'kernel/Database.php';
        require_once 'model/table/DemoTable.php';
        require_once 'view/class/DemoViewer.php';

        class DemoControler
        {
            /**
             * Methods
             */

            public static function read()
            {
                if(isset($_POST['btn_update']))
                {
                    ...
                }
                if(isset($_POST['btn_delete']))
                {
                    ...
                }
                ...
            }

            public static function update()
            {
                ...
            }

            public static function delete()
            {
                ...
            }
        }

* Model

    * **./www/rpg/model/class/**Demo.php
        class Demo {

            /**
             * Properties
             */

            /**
             * @property int $id Primary Key
             * @access public
             */
            public $id;

            /**
             * @property string $nom
             * @access public
             */
            public $nom;

            /**
             * @property boolean $actif
             * @access public
             */
            public $actif;

            /**
             * Methods
             */

            public function __toString() {
                return $this->nom;
            }
        }

    * **./www/rpg/model/table/**DemoTable.php

        require_once 'kernel/Database.php';
        require_once 'model/class/Demo.php';

        class DemoTable {

            /**
             * table name
             * @var string $table
             * @access private
             */
            private static $table = "demo";

            /**
             * all records
             * @param array $fields
             * @return array all objects constructed by SQL query
             */
            public static function select(){
                if(!func_num_args())
                {
                    $fields = array('*');
                }
                else
                {
                    $fields = func_get_args();
                }


                $dbh = Database::connect();

                $query  = "SELECT ";
                foreach ($fields as $field)
                {
                    $query .= "" . $field . ", ";
                }
                $query = substr($query, 0,  strlen($query) - 2);
                $query .= " FROM `" . self::$table . "`"
                        . "ORDER BY `nom` ASC;";

                $sth = $dbh->prepare($query);
                $sth->setFetchMode( PDO::FETCH_CLASS, self::$table);
                $sth->execute();

                if($sth->rowCount())
                {
                    $results = $sth->fetchAll(PDO::FETCH_CLASS, self::$table);
                    $sth->closeCursor();
                }
                else
                {
                    $results = null;
                }

                Database::disconnect();

                return $results;
            }

            /**
             * record by id
             * @param int $id
             * @return object constructed by SQL query
             */
            public static function select_by_id($id){
                $dbh = Database::connect();

                $query = "SELECT * FROM `" . self::$table . "`" . "\r\n"
                        . "WHERE id = :id;";

                $sth = $dbh->prepare($query);
                $sth->bindParam(':id', $id, PDO::PARAM_INT);

                $sth->setFetchMode( PDO::FETCH_CLASS, self::$table);
                $sth->execute();

                if($sth->rowCount() == 1)
                {
                    $item = $sth->fetch(PDO::FETCH_CLASS);
                    $sth->closeCursor();
                }
                else
                {
                    $item = null;
                }

                Database::disconnect();

                return $item;
            }

            /**
             * insert new record
             * @param array $item
             * @return boolean $result result from SQL query
             */
            public static function insert($item){
                $dbh = Database::connect();

                $query = "INSERT INTO `" . self::$table . "` (";

                $fields = array_keys($item);

                foreach($fields as $field)
                {
                    $query .= $field . ", ";
                }
                $query  = substr($query, 0, strlen($query) -2);
                $query .= ")\r\nVALUES\r\n(";

                foreach($fields as $field)
                {
                    $query .= ":" . $field . ", ";
                }
                $query  = substr($query, 0, strlen($query) -2);
                $query .= ");";

                $sth = $dbh->prepare($query);

                foreach($item as $field => $value)
                {

                    $sth->bindParam(':' . $field, $item[$field]);
                }

                $result = $sth->execute();

                Database::disconnect();

                return $result;
            }

            /**
             * update record
             * @param Array $item
             * @return boolean $result result from SQL query
             */
            public static function update($item){
                $dbh = Database::connect();

                $query = "UPDATE `" . self::$table . "` SET" . "\r\n";

                $id=$item['id'];
                unset($item['id']);
                $fields = array_keys($item);
                $item['id']=$id;
                unset($id);

                foreach($fields as $field)
                {
                    $query .= $field . " = :".$field . "," . "\r\n";
                }
                $query  = substr($query, 0, strlen($query) -3) . "\r\n";
                $query .= "WHERE id = :id;";

                $sth = $dbh->prepare($query);

                foreach($item as $field => $value)
                {
                    $sth->bindParam(':' . $field, $item[$field]);
                }

                $result = $sth->execute();

                Database::disconnect();

                return $result;
            }

            /**
             * delete record
             * @param int $id
             * @return boolean $result result from SQL query
             */
            public static function delete($id){
                $dbh = Database::connect();

                $query = "DELETE FROM `" . self::$table . "` WHERE" . "\r\n"
                        . "id = :id";

                $sth = $dbh->prepare($query);
                $sth->bindParam(':id', $id, PDO::PARAM_INT);

                $result = $sth->execute();

                Database::disconnect();

                return $result;
            }
        }
