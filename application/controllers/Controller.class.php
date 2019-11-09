<?php
namespace Controller;
use traits\loader;
use traits\request;
use interfaces;

abstract class Controller implements interfaces\controllerInterface {
    use loader;
    use request;

    public $model;
    public $baseTemplates = [
        'header' => 'base/header.php',
        'footer' => 'base/footer.php',
        'error404' => 'base/404.html'
    ];

    public function __construct($model, $action) {
        $this->model = $model;
        $this->loadAction($action);
    }
    public function error404 () {
        $this->loadViews($this->baseTemplates['error404']);
    }
}