<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    
         protected $tables = array("comment","contact","page","post","stage","trainer");
    
        public function __construct() {
            parent::__construct();
            
            //$result = $this->dbmanage->getUserAccess($this->session, $_POST);
            if ( !isset($this->session) ||
                 (strpos($this->router->fetch_method(), "ajax") === false && !in_array($this->router->fetch_method(), $this->session->userdata["access"][$this->router->fetch_class()])) ||
                 (strpos($this->router->fetch_method(), "ajax") === 0 && !in_array("modify", $this->session->userdata["access"][$this->router->fetch_class()])) ) {
                show_error("403 : Forbidden access", 403);
            } else {
                //$this->session->set_userdata(array("username" => $result['username'], "userid" => $this->session->userdata['userid'], 'logged_in' => true, 'access' => $result['access']));
                $this->data['session'] = $this->session->userdata;
            }
            $this->load = new Viewextend();
        }
    
	public function modify($table = "post")
	{
            $this->data['values'] = $this->dbmanage->getStructure($table); // exit();
	    $this->data['table'] = $table;
            $this->data['modifiable'] = $this->tables;
            $this->load->view($this->router->fetch_class() . "/" . $this->router->fetch_method(), $this->data);
	}
        
        public function index() {
            $this->load->view("admin/" . $this->router->fetch_method(), $this->data);
        }
        
        public function personal() {
            $this->data['user'] = $this->user->getUserInfos($this->session->userdata('userid'));
            $this->data['contact'] = $this->user->getContactInfos($this->session->userdata('userid'));
            $this->data['table']['user'] = $this->dbmanage->getStructure('user');
            $this->data['table']['contact'] = $this->dbmanage->getStructure('contact');
            $this->load->view($this->router->fetch_class() . "/" . $this->router->fetch_method(), $this->data);
        }
        
        public function ajaxremoveline() {
            $this->dbmanage->delete($_POST['table'], $_POST['id']);
        }
        
        public function access() {
            $a = $this->dbmanage->getPagesAccess();
            $this->data['pages'] = $a["pages"];
            unset($a['pages']);
            $this->data['users'] = $a;
            $this->load->view($this->router->fetch_class() . "/" . $this->router->fetch_method(), $this->data);
        }

        public function create() {
            $this->load->view($this->router->fetch_class() . "/" . $this->router->fetch_method(), $this->data);
        }
        
        public function ajaxaddline() {

            $table = $this->dbmanage->getStructure($_POST['table']);
            parse_str($_POST['datas'], $result);
            foreach($table['columns'] as $key => $res) {
                if ( strpos($res->Comment, "checkbox") !== false && !isset($result[$res->Field]) )
                    @$result[$res->Field] = 0;
                elseif ( strpos($res->Comment, "checkbox") !== false && $result[$res->Field] == "on" )
                    @$result[$res->Field] = 1;
            }
            $id = $this->dbmanage->insert($_POST['table'], $result);

            $this->data['values'] = $this->dbmanage->getStructure($_POST['table'], $id);
            $this->data['id'] = $id;
            $this->data['table'] = $_POST['table'];
            
            $this->load->view($this->router->fetch_class() . "/" . $this->router->fetch_method(), $this->data, false, true);

        }
        
        public function ajaxupdatevalue() {
            echo $this->dbmanage->update($_POST['id'],$_POST['table'],$_POST['field'],$_POST['value']);
        }
        
        public function ajaxmodifypersonalinfos() {
            parse_str($_POST['datas'], $result);
            $array = array("ranking" => $result['simple'] . " / " . $result['double'] . " / " . $result['mixte']);
            
            foreach($result as $field => $value) {
                if ( in_array($field, array("simple","double","mixte")))
                    continue;
                if ( $field == "birthdate" ) {
                    $xpl = explode("/", $value);
                    $array['birthdate'] = $xpl[2] . "-" . $xpl[1] . "-" . $xpl[0] . " 00:00:00";
                } else {
                    $array[$field] = $value;
                }
            }
            
            echo $this->dbmanage->update($_POST['id_contact'], $_POST['table'], $array);
        }
        
        public function ajaxmodifypassword() {
            $state = $this->dbmanage->update($_POST['id_user'], $_POST['table'], "password", f::getPasswordHash($_POST['newpass']));
            if ( $state == 1 )
                $this->session->sess_destroy();
            
            echo $state;
        }
        
        public function ajaxgrantaccess() {
            if ( $_POST['is_checked'] === "true" ) {
                $xpl = explode("/", $_POST['action']);
                $array = array("id_user" => $_POST['id_user'], "controller" => $xpl[0], "action" => $xpl[1]);
                //f::v($array);
                $this->dbmanage->insert("access", $array, false);
            } else {
                $this->dbmanage->delete_access($_POST['id_user'], $_POST['action']);
            }
        }
        
}