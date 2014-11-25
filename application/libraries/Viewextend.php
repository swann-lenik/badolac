<?php

class Viewextend extends CI_Loader {
    
    protected function _ci_load($_ci_data)
    {
        ob_start();
        if ( !empty($_ci_data['_ci_view']) ) {
            include_once(APPPATH . "views/extends/header.php");
        }
        
        parent::_ci_load($_ci_data);

        if ( !empty($_ci_data['_ci_view']) ) {
            include_once(APPPATH . "views/extends/footer.php");            
        }
    }
   
}