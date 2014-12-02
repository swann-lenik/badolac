<?php

class News extends Dbmanage {
        
    public function __construct() {
        parent::__construct();
        $this->setTableName("post");
    }
    
    public function getPosts($limit = 3) {
        $array = array();
        
        $this->db_object->db->order_by("post.date_upd", "DESC");
        $this->db_object->db->group_by("post.id_post");
        $this->db_object->db->join("comment", "comment.id_post = post.id_post", "left");
        $this->db_object->db->join("user", "user.id_user = post.author", "left");
        $this->db_object->db->join("contact", "user.id_contact = contact.id_contact", "left");
        $this->db_object->db->select("post.*, contact.lastname, contact.firstname, COUNT(comment.id_comment) AS cpt");
        $result = $this->db_object->db->get("post", $limit, 0);
        foreach($result->result() as $res) {
            $array[$res->id_post] = $res;
        }
        
        return $array;
    }
    
}
