<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        if ( isset($this->session) )
            $this->data['session'] = $this->session->userdata;
        
        $this->load = new Viewextend();
    }
    
    public function index($id_page) {
        $this->data['page'] = $this->pagedb->getPage($id_page);
        $this->load->view($this->router->fetch_class() . "/" . $this->router->fetch_method(), $this->data);
    }
    
}
    
