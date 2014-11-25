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
}
