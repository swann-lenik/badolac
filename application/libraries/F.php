<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class F {
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
    
}