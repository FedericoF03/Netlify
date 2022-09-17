<?php 

class Autoload {
    
    public function __construct() {
        
    spl_autoload_register(function($class_name) {
            
        $controllers_path = './Controllers/' . $class_name . '.php';
        $models_path = './Models/' . $class_name . '.php';
            
        if (file_exists($controllers_path))  require_once($controllers_path);  
        if (file_exists($models_path))       require_once($models_path);     
        });
        
    }

    public function __destruct() {

    }
}

?>