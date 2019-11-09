<?php
use Controller\Controller;
use traits\nav;
use traits\notifications;
use traits\session;

class userController extends Controller {
    use nav;
    use notifications;
    use session;

    public $templates = [
        'login' => 'user/login.php'
    ];

    public function __construct ($model, $action) {
        parent::__construct($model, $action);
    }

    public function loginAction () {
        return $this->loadViews($this->templates['login']);
    }

    public function loginPostAction (array $userInfo) {
        if (empty($userInfo)) {
           $this->model->redirect('/user/login');
        }
        $this->model->login($userInfo['username'], $userInfo['password']);
    }

    public function logoutAction () {
        $this->model->logout();
        $this->model->redirect('/user/login');
    }
}