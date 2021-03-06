<?php

class Stagedb extends Dbmanage {
        
    public function __construct() {
        parent::__construct();
        $this->setTableName("post");
    }
    
    public function getStages($past = false) {
        $array = array();
        
        $this->db_object->db->order_by("s.date_start", "DESC");
        $this->db_object->db->group_by("s.id_stage");
        $this->db_object->db->join("participe p", "p.id_stage = s.id_stage", "left");
        $this->db_object->db->select("s.*, COUNT(p.id_contact) AS cpt");
        if ( $past == false )
            $this->db_object->db->where("date_start >=", date("Y-m-d"));
        $result = $this->db_object->db->get("stage s");
        foreach($result->result() as $res) {
            $array[$res->id_stage] = $res;
        }
        
        return $array;
    }
    
    public function getSubscriptions($id_user) {
        $array = array();
        $this->db_object->db->select("p.id_stage");
        $this->db_object->db->join("participe p", "p.id_contact = u.id_contact", "left");
        $this->db_object->db->where("u.id_user", $id_user);
        $result = $this->db_object->db->get("user u");
        foreach($result->result() as $r)
            $array[$r->id_stage] = $r->id_stage;
        
        return $array;
    }
    
}
