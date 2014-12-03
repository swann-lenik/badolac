<?php

class Pagedb extends Dbmanage {
        
    public function __construct() {
        parent::__construct();
        $this->setTableName("page");
    }
    
    public function getPage($id_page) {
        $array = array();
        
        $this->db_object->db->where("id_page", $id_page);
        $result = $this->db_object->db->get("page");
        $res = $result->result();
        return $res[0];
    }
    
}
