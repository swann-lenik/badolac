<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        if ( isset($this->session) )
            $this->data['session'] = $this->session->userdata;
        
        $this->load = new Viewextend();
    }
    
    public function index() {
        $this->load->view($this->router->fetch_class() . "/" . $this->router->fetch_method(), $this->data);
    }
    
    public function create() {
        $this->load->view($this->router->fetch_class() . "/" . $this->router->fetch_method(), $this->data);
    }
    
    public function connect() {
        if ( !isset($this->session->userdata['access']) && !empty($_POST['username']) && !empty($_POST['userpass'] ) ) {
            $password = f::getPasswordHash($_POST['userpass']);
            $result = $this->dbmanage->getUserAccess(null, array("username" => $_POST['username'], "userpass" => $password));

            if ( $result['status'] == 1 ) {
                $this->session->set_userdata(array("username" => $result['message']['username'], "userid" => $result['message']['userid'], 'logged_in' => true, 'access' => $result['message']['access']));        
                header("location: " . $_SERVER['HTTP_REFERER']);
            } else {
                $this->session->sess_destroy();
                $this->data['message'] = $result['message'];
                $this->load->view($this->router->fetch_class() . "/" . $this->router->fetch_method(), $this->data);
            }
        } else {
            //f::v($this->session);
            header("location: " . URL . "index.php/index/index");
        }

    }
    
    public function disconnect() {
        $this->session->sess_destroy();
        if ( strpos($_SERVER['HTTP_REFERER'], "/admin/") === false )
            header("location: " . $_SERVER['HTTP_REFERER']);
        else
            header("location: " . URL . "index.php/index");
    }
    
    public function ajaxnewcontact() {
       parse_str($_POST['datas'], $result);
       echo "<pre>";
       f::v($result);

       $xpl = explode("/", $result['birthdate']);
       $dt = new DateTime($xpl[2] . "-" . $xpl[1] . "-" . $xpl[0]);

       $contact = array("lastname" => $result['lastname'],
                        "firstname" => $result['firstname'],
                        "mail" => $result['mail'],
                        "phone" => $result['phone'],
                        "address_1" => $result['address_1'],
                        "address_2" => $result['address_2'],
                        "zipcode" => $result['zipcode'],
                        "city" => $result['city'],
                        "country" => $result['country'],
                        "licence" => $result['licence'],
                        "club" => $result['club'],
                        "sexe" => $result['sexe'],
                        "ranking" => $result['simple'] . " / " . $result['double'] . " / " . $result['mixte'],
                        "birthdate" => $dt->format("Y-m-d H:i:s")
                        );
       $id_contact = $this->dbmanage->insert("contact", $contact);
       $user = array("username" => $result['username'],
                     "password" => f::getPasswordHash($result['new_password_1']),
                     "mail" => $result['mail'],
                     "id_contact" => $id_contact);
       $id_user = $this->dbmanage->insert("user", $user);
       $this->dbmanage->insert("access", array("id_user" => $id_user, "controller" => "admin", action => "index"), false);
       $this->dbmanage->insert("access", array("id_user" => $id_user, "controller" => "admin", action => "personal"), false);
       
       //if ( admin == false )
       
       return 1;
    }
    
    public function activate($id, $token) {
        $this->data['activated'] = $this->dbmanage->activate($id, $token);
        $this->load->view($this->router->fetch_class() . "/" . $this->router->fetch_method(), $this->data);
    }

    
}