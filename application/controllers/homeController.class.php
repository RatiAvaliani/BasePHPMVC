<?php
use Controller\Controller;
use traits\nav;
use traits\session;

class homeController extends Controller {
    use nav;
    use session;

    public $templates = [
        'home' => 'home/home.php',
        'approved' => 'application/approved.php'
    ];

    public function __construct ($model, $action) {
        parent::__construct($model, $action);
    }

    public function indexAction () {
        return $this->loadViews($this->templates['home']);
    }
}