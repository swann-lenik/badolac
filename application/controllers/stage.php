<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stage extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        if ( isset($this->session) )
            $this->data['session'] = $this->session->userdata;
        
        $this->load = new Viewextend();
    }
    
    public function index() {
        
        $this->data['stages'] = $this->stagedb->getStages();
        $this->load->view($this->router->fetch_class() . "/" . $this->router->fetch_method(), $this->data);
    }
    
    public function trainer() {
        $this->data['trainers'] = $this->user->getTrainers();
        $this->load->view($this->router->fetch_class() . "/" . $this->router->fetch_method(), $this->data);
    }
}
    
