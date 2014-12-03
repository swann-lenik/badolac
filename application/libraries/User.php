<?php

class User extends Dbmanage {
    
    public function getUserInfos($id_user = 0) {
        $result = $this->db_object->db->query("SELECT * FROM user WHERE id_user = " . $id_user);
        return $result->result();
        
    }

    public function getContactInfos($id_user = 0) {
        $result = $this->db_object->db->query("SELECT c.* FROM user u LEFT JOIN contact c ON c.id_contact = u.id_contact WHERE u.id_user = " . $id_user);
        return $result->result();
        
    }
    
    public function getUsers() {
        $array = array();
        $this->db_object->db->select("id_user, username");
        $this->db_object->db->where("active", 1);
        $result = $this->db_object->db->get("user");
        foreach($result->result() as $res)
            $array[$res->id_user] = $res->username;
        
        return $array;
    }
    
    public function getTrainers() {
        $array = array();
        $this->db_object->db->where("active", 1);
        $result = $this->db_object->db->get("trainer");
        foreach($result->result() as $res)
            $array[$res->id_trainer] = $res;
        
        return $array;
        
    }
    
}