<?php

class Viewextend extends CI_Loader {
    
    protected function _ci_load($_ci_data)
    {
        ob_start();
        
        $temp = $_ci_data;
        $temp["_ci_view"] = "extends/header";
        parent::_ci_load($temp);

        parent::_ci_load($_ci_data);

        $temp["_ci_view"] = "extends/footer";
        parent::_ci_load($temp);

    }
   
}