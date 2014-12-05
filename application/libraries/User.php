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
    
    public function getContactID($id_user) {
        $array = array();
        $this->db_object->db->select("id_contact");
        $this->db_object->db->where("id_user", $id_user);
        $result = $this->db_object->db->get("user");
        foreach($result->result() as $res) {
            f::v($res);
            $array[$id_user] = $res->id_contact;
        }
        f::v($array);
        return $array[$id_user];
        
    }
    
    public function getContact($id_user) {
        $this->db_object->db->where("u.id_user", $id_user);
        $this->db_object->db->join("contact c", "c.id_contact = u.id_contact", "left");
        $this->db_object->db->select("c.*");
        $result = $this->db_object->db->get("user u");
        $r = $result->result();
        return $r[0];
    }
    
    public function getAge($id_user) {
        $result = $this->db_object->db->query("SELECT YEAR(CURRENT_TIMESTAMP) - YEAR(c.birthdate) - (DATE_FORMAT(CURRENT_TIMESTAMP, '%m%d') < DATE_FORMAT(c.birthdate, '%m%d')) as diff_years FROM `user` u LEFT JOIN contact c ON c.id_contact = u.id_contact WHERE u.id_user = $id_user");
        $r = $result->result();
        return $r[0]->diff_years;
        
    }
    
}