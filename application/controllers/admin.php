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
            
            $result = $this->dbmanage->getUserAccess("Swann","20e11e85");
            //var_dump($result);
            if ( empty($result) )
                echo "Login / MDP invalide";
            elseif ( (strpos($this->router->fetch_method(), "ajax") === false && !in_array($this->router->fetch_method(), $result["access"][$this->router->fetch_class()])) ||
                     (strpos($this->router->fetch_method(), "ajax") === 0 && !in_array("modify", $result["access"][$this->router->fetch_class()])) ) {
                    
                    //&& !in_array("modify", $result["access"][$this->router->fetch_class()]) ) ) {
                /*header('HTTP/1.0 403 Forbidden');
                echo "Accès interdit !";*/
                show_error("403 Forbidden access", 403);
            } else {
                $this->session->set_userdata(array("username" => $result['username'], "userid" => $result['userid'], 'logged_in' => true, 'access' => $result['access']));
                $this->data['session'] = $this->session->userdata;
            }
            $this->load = new Viewextend();
        }
    
	public function modify($table = "post")
	{
            $this->data['values'] = $this->dbmanage->getStructure($table); // exit();
	    $this->data['table'] = $table;
            $this->data['modifiable'] = $this->tables;
            $this->load->view("admin/" . $this->router->fetch_method(), $this->data);
	}
        
        public function index() {
            $this->load->view("admin/" . $this->router->fetch_method(), $this->data);
        }
        
        public function personal() {
            $this->data['user'] = $this->user->getUserInfos($this->session->userdata('userid'));
            $this->data['contact'] = $this->user->getContactInfos($this->session->userdata('userid'));
            $this->load->view("admin/" . $this->router->fetch_method(), $this->data);
        }
        
        public function ajaxremoveline() {
            $this->dbmanage->delete($_POST['table'], $_POST['id']);
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
            
            $this->load->view("admin/" . $this->router->fetch_method(), $this->data, false, true);

        }
        
        public function ajaxupdatevalue() {
            echo $this->dbmanage->update($_POST['id'],$_POST['table'],$_POST['field'],$_POST['value']);
        }
        
        
}