<?php 

class SessionController {
    private $session;

    public function __construct() {
        $this->session = new UsersModels();
    }

    public function login($user, $pass) {
        return $this->session->validate_user($user, $pass);
    }

    public function __destruct () {

    }

    
}

?>