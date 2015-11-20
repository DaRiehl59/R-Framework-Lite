<?php
/**
 * Classe de controle des affectations des utilisateurs aux groupes
 *
 * @filesource controler/class/AffecterControler.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */

require_once 'kernel/Database.php';

require_once 'model/table/AffecterTable.php';
require_once 'model/table/UtilisateurTable.php';
require_once 'model/table/GroupeTable.php';

require_once 'view/class/AffecterViewer.php';

class AffecterControler {
    
    public static $link_name = "Affectation";
    public static $linked = "Affecté";
    public static $unlinked = "Non affecté";

    public static function link()
    {
        if(isset($_GET['id_utilisateur']))
        {
            /**
             * Récupération des informations de l'Utilisateur
             */
            $id_utilisateur = filter_input(INPUT_GET, 'id_utilisateur', FILTER_SANITIZE_NUMBER_INT);

            if(isset($_POST['btn_ajouter_x']))
            {
                $args = array(
                    'selected_unlinked_items' => array(
                        'filter' => FILTER_SANITIZE_NUMBER_INT,
                        'flags'  => FILTER_REQUIRE_ARRAY,
                       )
                );
                $filtered = filter_input_array(INPUT_POST, $args);

                if(! is_null($filtered['selected_unlinked_items']))
                {
                    foreach ($filtered['selected_unlinked_items'] as $id_groupe)
                    {
                        $item['id_utilisateur'] = $id_utilisateur;
                        $item['id_groupe'] = $id_groupe;
                        AffecterTable::insert($item);
                    }
                }
            }

            if(isset($_POST['btn_enlever_x']))
            {
                $args = array(
                    'selected_linked_items' => array(
                        'filter' => FILTER_SANITIZE_NUMBER_INT,
                        'flags'  => FILTER_REQUIRE_ARRAY,
                       )
                );
                $filtered = filter_input_array(INPUT_POST, $args);

                if(! is_null($filtered['selected_linked_items']))
                {
                    foreach ($filtered['selected_linked_items'] as $id_groupe)
                    {

                        $ids['id_utilisateur'] = $id_utilisateur;
                        $ids['id_groupe'] = $id_groupe;

                        AffecterTable::delete($ids);
                    }
                }
            }
            
            $itemname = "Utilisateur";
            $back_controler = "utilisateur";
            $item = UtilisateurTable::select_by_id($id_utilisateur);
            
            /**
             * Chargement des Groupes associés à cet Utilisateur
             */
            $classname = "groupe";
            $FK_name = "id_utilisateur";
            $FK_value = $id_utilisateur;
            
            $objects = AffecterTable::get_linked_items($classname, $FK_name, $FK_value);
            $linked_items = array();
            foreach($objects as $object)
            {
                $linked_items[$object->id] = $object->nom;
            }
            
            /**
             * Chargement des Groupes non associés à cet Utilisateur
             */
            $objects = AffecterTable::get_unlinked_items($classname, $FK_name, $FK_value);
            $unlinked_items = array();
            foreach($objects as $object)
            {
                $unlinked_items[$object->id] = $object->nom;
            }
        }
        
        if(isset($_GET['id_groupe']))
        {
            /**
             * Récupération des informations du Groupe
             */
            $id_groupe = filter_input(INPUT_GET, 'id_groupe', FILTER_SANITIZE_NUMBER_INT);
            
            if(isset($_POST['btn_ajouter_x']))
            {
                $args = array(
                    'selected_unlinked_items' => array(
                        'filter' => FILTER_SANITIZE_NUMBER_INT,
                        'flags'  => FILTER_REQUIRE_ARRAY,
                       )
                );
                $filtered = filter_input_array(INPUT_POST, $args);
                
                if(! is_null($filtered['selected_unlinked_items']))
                {
                    foreach ($filtered['selected_unlinked_items'] as $id_utilisateur)
                    {
                        $item['id_utilisateur'] = $id_utilisateur;
                        $item['id_groupe'] = $id_groupe;
                        AffecterTable::insert($item);
                    }
                }
            }

            if(isset($_POST['btn_enlever_x']))
            {
                $args = array(
                    'selected_linked_items' => array(
                        'filter' => FILTER_SANITIZE_NUMBER_INT,
                        'flags'  => FILTER_REQUIRE_ARRAY,
                       )
                );
                $filtered = filter_input_array(INPUT_POST, $args);

                if(! is_null($filtered['selected_linked_items']))
                {
                    foreach ($filtered['selected_linked_items'] as $id_utilisateur)
                    {

                        $ids['id_utilisateur'] = $id_utilisateur;
                        $ids['id_groupe'] = $id_groupe;

                        AffecterTable::delete($ids);
                    }
                }
            }

            $itemname = "Groupe";
            $back_controler = "groupe";
            $item = GroupeTable::select_by_id($id_groupe);
            
            /**
             * Chargement des Utilisateurs associés à ce Groupe
             */
            $classname = "utilisateur";
            $FK_name = "id_groupe";
            $FK_value = $id_groupe;
            
            $objects = AffecterTable::get_linked_items($classname, $FK_name, $FK_value);
            $linked_items = array();
            foreach($objects as $object)
            {
                $str=(empty($object->prenom) || empty($object->nom))?"":" ";
                $linked_items[$object->id] = $object->pseudo." (".$object->prenom.$str.$object->nom.")";
            }
            
            /**
             * Chargement des Utilisateurs non associés à ce Groupe
             */
            $objects = AffecterTable::get_unlinked_items($classname, $FK_name, $FK_value);
            $unlinked_items = array();
            foreach($objects as $object)
            {
                $str=(empty($object->prenom) || empty($object->nom))?"":" ";
                $unlinked_items[$object->id] = $object->pseudo." (".$object->prenom.$str.$object->nom.")";
            }
        }

        AffecterViewer::link($itemname, $FK_name, $item, $linked_items, $unlinked_items, $back_controler);
    }
}
?>