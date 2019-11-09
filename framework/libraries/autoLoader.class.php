<?php
namespace autoLoader;

class autoLoader {
    private $configPath = 'application/config/config.php';

    public function __construct()  {
        $this->init()->request()->autoLoadClasses()->load();
    }

    private function init () : self {
        $GLOBALS['config'] = include_once $this->configPath;

        session_start();

        return $this;
    }

    private function request () : self {
        $GLOBALS['CONTROLLER'] = isset($_REQUEST['c']) ? $_REQUEST['c'] : 'home';
        $GLOBALS['ACTION'] = isset($_REQUEST['p']) ? $_REQUEST['p'] : 'index';
        return $this;
    }

    private function load () : self {
        require_once(CONTROLLER_PATH . 'Controller.class.php');
        require_once(MYSQL_PATH);
        require_once(LIB_PATH . 'uploadImages.class.php');
        require_once(MODEL_PATH . 'Model.class.php');

        return $this;
    }

    private function autoLoadClasses(): self {
        spl_autoload_register(function ($fileName) {
            if (is_null($fileName)) return null;

            if (strpos($fileName, 'traits') !== false && file_exists(TRAIT_PATH . $fileName . '.trait.php')) {
                include_once(TRAIT_PATH . $fileName . '.trait.php');
            } elseif (strpos($fileName, 'interface') !== false && file_exists(FRAMEWORK_PATH . DS . $fileName  . '.interface.php')) {
                include_once(FRAMEWORK_PATH . DS . $fileName  . '.interface.php');
            } elseif (file_exists(MODEL_PATH . "$fileName.php")) {
                include (MODEL_PATH . "$fileName.php");
            } elseif (strpos($fileName, 'Model') !== false && file_exists(MODEL_PATH . "$fileName.class.php")) {
                include (MODEL_PATH . "$fileName.class.php");
            } elseif (strpos($fileName, 'Controller') !== false && file_exists(CONTROLLER_PATH . "$fileName.class.php")){
                include (CONTROLLER_PATH . "$fileName.class.php");
            }
        });

        return $this;
    }

    public function error404 () {
        echo include_once(VIEWS_PATH . 'base/404.html');
        die();
    }

    private function loadModel () {
        $currentModel = $GLOBALS['CONTROLLER'] . 'Model';
        if (!class_exists($currentModel)) return $this->error404();
        return new $currentModel();
    }

    public function run () {
        $controllerName = $GLOBALS['CONTROLLER'] . 'Controller';
        $action = $GLOBALS['ACTION'];

        if (!class_exists($controllerName)) return $this->error404();
        new $controllerName($this->loadModel(), $action);

        return $this;
    }
}