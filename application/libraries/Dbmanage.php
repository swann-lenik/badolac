<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dbmanage {

	private $table_name;
	public $db_object;

	public function __construct($table_name = "post") {
		$this->setTableName($table_name);
		$this->db_object = &get_instance();
		$this->db_object->load->database();
	}
	
	public function setTableName($table_name) {
		$this->table_name = $table_name;
	}
	
	public function getTableName() {
		return $this->table_name;
	}
        
        public function query($query) {
            $this->db_object->db->query($query);
        }

        public function insert($table, $datas) {
            $this->db_object->db->insert($table, $datas);
            $this->db_object->db->select_max("id_" . $table);
            $query = $this->db_object->db->get($table);
            $result = $query->result();
            return $result[0]->{"id_" . $table};
        }
        
        public function delete($table, $id) {
            $this->db_object->db->where("id_" . $table, $id);
            $this->db_object->db->delete($table);
            return true;
        }
        
        public function update($id, $table, $field, $value) {
            $this->db_object->db->where("id_$table", $id);
            $this->db_object->db->select($field);
            $query = $this->db_object->db->get($table);
            $result = $query->result();
            
            if ( $result[0]->{$field} != $value ) {            
                $this->db_object->db->where("id_" . $table, $id);
                $this->db_object->db->update($table, array($field => $value));
                return 1;
            } else
                return 0;
        }

    public function getStructure($table_name, $id = 0)
    {
        $this->setTableName($table_name);
        $array = array("columns" => array(), "datas" => array());
        //var_dump("EXPLAIN `" . $this->getTableName() . "`");
        $result = $this->db_object->db->query("SHOW FULL COLUMNS FROM `" . $this->getTableName() . "`");
        foreach($result->result() as $res) {
                $array['columns'][$res->Field] = $res;
        }
        
        $query = "SELECT * FROM `" . $this->getTableName() . "`" . ((int)$id > 0 ? " WHERE id_" . $this->getTableName() . " = " . $id : "");
        $result = $this->db_object->db->query($query);
        foreach($result->result() as $res) {
                $array['datas'][$res->{"id_" . $table_name}] = $res;
        }        

        return $array;
    }
    
    public function getUserAccess($username, $password) {
        $array = array();
        $result = $this->db_object->db->query("SELECT a.controller, a.action, u.username, u.id_user FROM user u LEFT JOIN access a ON a.id_user = u.id_user WHERE u.username = \"" . $username . "\" AND u.password = \"" . $password . "\"");
        foreach($result->result() as $res) {
            $array["access"][$res->controller][] = $res->action;
        }
        $array["username"] = $res->username;
        $array["userid"] = $res->id_user;
        
        return $array;
    }
}
