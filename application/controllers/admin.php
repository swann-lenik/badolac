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
    
        public function __construct() {
            parent::__construct();
            
            $result = $this->dbmanage->getUserAccess("Swann","20e11e85");
            //var_dump($result);
            if ( empty($result) )
                echo "Login / MDP invalide";
            elseif ( !in_array($this->router->fetch_method(), $result["access"][$this->router->fetch_class()]) ) {
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
        
}