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

        public function insert($table, $datas, $return = true) {
            $this->db_object->db->insert($table, $datas);
            
            if ( $return ) {
                $this->db_object->db->select_max("id_" . $table);
                $query = $this->db_object->db->get($table);
                $result = $query->result();
                return $result[0]->{"id_" . $table};
            } else
                return 0;
        }
        
        public function delete($table, $id) {
            $this->db_object->db->where("id_" . $table, $id);
            $this->db_object->db->delete($table);
            return true;
        }
        
        public function delete_access($id_user, $action) {
            $this->db_object->db->where("id_user", $id_user);
            $this->db_object->db->where("controller", substr($action, 0, strpos($action, "/")));
            $this->db_object->db->where("action", substr($action, strpos($action, "/")+1));
            $this->db_object->db->delete("access");
        }
        
        public function update($id, $table, $field, $value = 0) {
            if ( $value === 0 && is_array($field) ) {
                $this->db_object->db->where("id_" . $table, $id);
                $this->db_object->db->update($table, $field);   
                return 1;
            } else {
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
    
    public function getUserAccess($session, $access) {
        $message = "";
        if (empty($access))
            return null;
        
        if ( !empty($session->userdata['username']) )
            return array("status" => 1, "message" => $session->userdata);
        
        $array = array();
        if ( empty($access['username']) || empty($access['userpass']) )
            return $array;

        /*
         * LOGIN INEXISTANT
         */
        $this->db_object->db->select("username");
        $this->db_object->db->where("username", $access['username']);
        $result = $this->db_object->db->get("user");
        if ( empty($result->result()) ) {
            return array("status" => 0, "message" => "Identifiant inconnu");
        }
        
        /*
         * MOT DE PASSE ERRONE
         */
        $this->db_object->db->select("username");
        $this->db_object->db->where("username", $access['username']);
        $this->db_object->db->where("password", $access['userpass']);
        $result = $this->db_object->db->get("user");
        if ( empty($result->result()) ) {
            return array("status" => 0, "message" => "Mot de passe incorrect pour cet identifiant");
        }
        
        /*
         * COMPTE INACTIF
         */
        $this->db_object->db->select("active");
        $this->db_object->db->where("username", $access['username']);
        $this->db_object->db->where("password", $access['userpass']);
        $result = $this->db_object->db->get("user");
        if ( empty($result->result()) ) {
            return array("status" => 0, "message" => "Compte inactif ! Un mail vous a été envoyé lors de votre inscription contenant un lien d'activation. Merci de cliquer dessus !");
        }
        
        $result = $this->db_object->db->query("SELECT a.controller, a.action, u.username, u.id_user FROM user u LEFT JOIN access a ON a.id_user = u.id_user WHERE u.username = \"" . $access['username'] . "\" AND u.password = \"" . $access['userpass'] . "\"");
        foreach($result->result() as $res) {
            $array["access"][$res->controller][] = $res->action;
            $array["username"] = $res->username;
            $array["userid"] = $res->id_user;
        }
        
        return array("status" => 1, "message" => $array);
    }
    
    public function getPagesAccess() {
        $array['pages'] = array("admin" => array("create","access","modify","personal","index"));
        $result = $this->db_object->db->query("SELECT a.controller, a.action, u.username, u.id_user FROM user u LEFT JOIN access a ON a.id_user = u.id_user ORDER BY u.username ASC");
        foreach($result->result() as $res) {
            $array[$res->username]['id'] = $res->id_user;
            $array[$res->username]['pages'][$res->controller][$res->action] = $res->action;
        }
        return $array;
    }
    
    public function activate($id, $token) {
        $this->db_object->db->where("id_user", $id);
        $this->db_object->db->where("password", $token);
        $result = $this->db_object->db->get("user");
        
        if ( !empty($result->result()) ) {
            $this->update($id, "user", "active", 1);
            return true;
        } else
            return false;
    }
}
