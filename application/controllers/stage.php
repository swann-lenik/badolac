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
    
    public function subscribe($id_stage) {
        if ( empty($this->session->userdata('userid')) )
            show_error("403 : Forbidden access", 403);
        
        $this->data['id_stage'] = $id_stage;
        $this->data['contact'] = $this->user->getContact($this->session->userdata('userid'));
        $this->data['age'] = $this->user->getAge($this->session->userdata('userid'));
        $this->load->view($this->router->fetch_class() . "/" . $this->router->fetch_method(), $this->data);
    }

    public function ajaxsubscribe() {
        //f::v($_POST);
        if ( $_POST['is_minor'] == 1) {
            parse_str($_POST['datas'], $sanitaire);

            foreach(array("diphterie","tetanos","polio","bcg","hepatite_b","rubeole","coqueluche","autre_1","autre_2","autre_3") as $a) {
                $dt['vaccins'][$a] = !empty($sanitaire[$a]) ? $sanitaire['date_' . $a] : "";
            }
            foreach(array("has_varicelle","has_angine","has_rrhumatisme","has_scarlatine","has_otite","has_rubeole","has_coqueluche","has_rougeole","has_oreillons") as $a) {
                $dt['disease'][$a] = isset($sanitaire[$a]) ? 1 : 0;
            }
            foreach(array("asthme","aliment","medicament","autre","conduite") as $a) {
                $dt['allergies']["allergie_" . $a] = isset($sanitaire["allergie_" . $a]) ? $sanitaire["allergie_" . $a] : 0;
            }
            $dt['health_difficulties'] = $sanitaire["health_difficulties"];
            foreach(array("lit","fille","parent") as $a) {
                $dt['recommandations']["reco_" . $a] = isset($sanitaire["allergie_" . $a]) ? $sanitaire["allergie_" . $a] : "";
            }
            foreach(array("lastname","firstname","phone","cell_phone","address_1","address_2","zipcode","city","secu","lastname_dr","firstname_dr","phone_dr","has_cmu","has_pec_100") as $a) {
                $dt['legal_responsible'][$a] = isset($sanitaire[$a]) ? $sanitaire[$a] : "";
            }
            $dt['signature_name'] = $sanitaire['validation_name'];
            $dt['validated'] = isset($sanitaire['validation_finale']) ? 1 : 0;
            
            echo "<pre>";
            f::v($dt);
            echo "</pre>";

            //f::v(serialize($dt['disease']));
            //f::v(serialize($dt['vaccins']));
        }
        //$id_contact = $this->user->getContactID($this->session->userdata('userid'));
        //$this->dbmanage->insert("participe", array("id_contact" => $id_contact, "id_stage" => $_POST['id_stage']),false);
    }
    
    public function ajaxunsubscribe() {
        $id_contact = $this->user->getContactID($this->session->userdata('userid'));
        $this->dbmanage->query("DELETE FROM participe WHERE id_contact = $id_contact AND id_stage = " . $_POST['id_stage']);
    }

}
    
