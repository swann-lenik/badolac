<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class admintable implements Iterator {
    
    private $cpt = 0;
    private $array = array("columns" => array(), "datas" => array());
    private $is_modifiable = false;
    
    function __construct($array) {
        $this->array = $array;
    }
    
    function current() {
        
    }
    
    function key() {
        
    }
    
    function next() {
        next($array['columns']);
    }
    
    function rewind() {
        $this->cpt = first($array['columns']);
    }
    
    function valid() {
        $this->modifiable = $this->current();
    }
    
}