<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front extends CI_Controller {

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
            
            $result = $this->dbmanage->getUserInfos("Swann","20e11e85");
            //var_dump($result);
            if ( empty($result) )
                echo "Login / MDP invalide";
            elseif ( !in_array($this->router->fetch_method(), $result[key($result)][$this->router->fetch_class()]) ) {
                /*header('HTTP/1.0 403 Forbidden');
                echo "Accès interdit !";*/
                show_error("403 Forbidden access", 403);
            } else {
                $this->session->set_userdata(array("username" => key($result), 'logged_in' => true, 'access' => $result));
                $this->data['session'] = $this->session->userdata;
                /*var_dump($this->session->userdata);
                exit();*/
            }
            $this->load = new Viewextend();

            //exit();
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
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
