# Base MVC
Basic MVC pattern for building web pages.
```
application
  - config
      - config.php
  - controllers
      - Controller.class.php
  - models
      - Model.class.php
  - views
framework
  - interfaces
      - controllerInterface.interface.php
  - libraries
      - autoLoader.class.php
  - traits
      - loader.trait.php
      - nav.trait.php
      - notifications.trait.php
      - request.trait.php
public
  - css
  - images
  - js
  - uploads
.htaccess
index.php
InstallSql.sql

```
** config.php

```
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', getcwd() . DS);
define('DOMEIN', 'http://localhost/');

define('APPLICATION_PATH', ROOT . 'application' . DS);
define('CONTROLLER_PATH', APPLICATION_PATH . 'controllers' . DS);
define('MODEL_PATH', APPLICATION_PATH . 'models' . DS);
define('VIEWS_PATH', APPLICATION_PATH . 'views' . DS);

define('FRAMEWORK_PATH', ROOT  . 'framework' . DS);
define('INTERFACE_PATH', FRAMEWORK_PATH . 'interfaces' . DS);
define('LIB_PATH', FRAMEWORK_PATH . 'libraries' . DS);
define('TRAIT_PATH', FRAMEWORK_PATH . DS);

define('PUBLIC_PATH', DOMEIN . 'public' . DS);
define('UPLOADS_FOLDER_PATH', ROOT  . 'public' . DS . 'uploads' . DS);
define('CSS_PATH', PUBLIC_PATH . 'css' . DS);
define('IMAGES_PATH', PUBLIC_PATH . 'images' . DS);
define('JS_PATH', PUBLIC_PATH . 'js' . DS);
define('UPLOADS_PATH', PUBLIC_PATH . 'uploads' . DS);

define('MYSQL_PATH', LIB_PATH . 'mysql.class.php');

define('DB_HOST', 'localhost');
define('DB_NAME', 'booking');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
```
  

   

