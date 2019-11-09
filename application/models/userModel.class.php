<?php
use model\model;
use users\users;
use traits\notifications;

class userModel extends model {
    public $users;
    public $user;
    use notifications;

    public function __construct() {
        parent::__construct();
        $this->users = new users($this->db);
        //$this->setLoggedInUserInfo();
    }

    public function login (string $username, string $password) {
        $this->user = $this->users->getUserByUsername($username);
        if (!is_null($this->user) && $this->user->comparePassword($password)) {
            $this->redirect('/');
        } else {
            $this->setNotification('Username Or Password Incorrect.');
            $this->redirect('/user/login');
        }
    }

    public function logout () {
        $this->users->userLogout();
    }
}