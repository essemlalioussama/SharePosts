<?php
//load config

require_once 'config/config.php';


//load heplers

require_once 'helpers/url_helpers.php';
require_once 'helpers/session_helpers.php';

// load libraries

// require_once 'libraries/Core.php';
// require_once 'libraries/Controller.php';
// require_once 'libraries/Database.php';


// Autoload Core Libraries

spl_autoload_register(function($className){

    require_once 'libraries/'.$className.'.php';

}
);
