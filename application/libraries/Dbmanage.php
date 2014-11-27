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

    public function getStructure($table_name)
    {
        $this->setTableName($table_name);
        $array = array("columns" => array(), "datas" => array());
        //var_dump("EXPLAIN `" . $this->getTableName() . "`");
        $result = $this->db_object->db->query("SHOW FULL COLUMNS FROM `" . $this->getTableName() . "`");
        foreach($result->result() as $res) {
                $array['columns'][$res->Field] = $res;
        }
        
        $result = $this->db_object->db->query("SELECT * FROM `" . $this->getTableName() . "`");
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
