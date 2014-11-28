<?php

class Viewextend extends CI_Loader {
    
    protected function _ci_load($_ci_data, $light = false)
    {
        ob_start();
        
        if ( $light === false ) {
            $temp = $_ci_data;
            $temp["_ci_view"] = "extends/header";
            parent::_ci_load($temp);
        }

        parent::_ci_load($_ci_data);

        if ( $light === false ) {
            $temp["_ci_view"] = "extends/footer";
            parent::_ci_load($temp);
        }

    }
   
    public function view($view, $vars = array(), $return = FALSE, $light = FALSE)
    {
        $data = array('_ci_view' => $view, '_ci_vars' => parent::_ci_object_to_array($vars), '_ci_return' => $return);
        return self::_ci_load($data, $light);
    }
   
}