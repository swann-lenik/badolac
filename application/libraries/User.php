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
    
}