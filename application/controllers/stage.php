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
        $this->data['subs'] = $this->stagedb->getSubscriptions($this->session->userdata('userid'));
        $this->load->view($this->router->fetch_class() . "/" . $this->router->fetch_method(), $this->data);
    }
    
    public function trainer() {
        $this->data['trainers'] = $this->user->getTrainers();
        $this->load->view($this->router->fetch_class() . "/" . $this->router->fetch_method(), $this->data);
    }
    
    public function ajaxsubscribe() {
        $id_contact = $this->user->getContactID($this->session->userdata('userid'));
        $this->dbmanage->insert("participe", array("id_contact" => $id_contact, "id_stage" => $_POST['id_stage']),false);
    }

    public function ajaxunsubscribe() {
        $id_contact = $this->user->getContactID($this->session->userdata('userid'));
        $this->dbmanage->query("DELETE FROM participe WHERE id_contact = $id_contact AND id_stage = " . $_POST['id_stage']);
    }

}
    
