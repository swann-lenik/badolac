<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class F {
    
    private static $db_object;
    
    public function __construct() {
        $this->db_object = new Dbmanage();
    }
    
    public static function getDb() {
        return self::$db_object;
    }
    
    public static function v($str) {
        var_dump($str);
    }

    public static function p($str) {
        print($str);
    }

    public static function pr($str) {
        print_r($str);
    }
    
    public static function getPasswordHash($password) {
        return md5(SEPARATOR . SALTED_WITH . SEPARATOR . $password . SEPARATOR);
    }
    
    public static function getMenu() {
        self::$db_object = new Dbmanage();
        $menu = array();
        
        $result = self::$db_object->db_object->db->query("SELECT * FROM menu");
        foreach($result->result() as $r) {
            if ( $r->id_parent == 0 ) 
                $menu[$r->id_menu]['item'] = $r;
            else
                $menu[$r->id_parent]['children'][$r->id_menu] = $r;
        }
        return $menu;
    }
    
}