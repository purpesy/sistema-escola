<?php

// definindo uma constante, sempre que eu usar urlbase vai ser esse url
define('URL_BASE', 'http/localhost/sistema-escola/public/');
// config database
define('DB_HOST', 'smpsistema.com.br');
define('DB_NAME', 'u283879542_lucas_s');
define('DB_USER', 'u283879542_lucas_s');
define('DB_PASS', '_Tipi@03');
//config email
define('EMAIL_HOST', 'smpsistema.com.br');
define('EMAIL_PORT', '465');
define('EMAIL_USER', '');
define('EMAIL_PASS', '');
// sistema carregamento automatico de class
spl_autoload_register(function($class){
    if(file_exists('../app/controllers/'. $class . '.php')){
        require_once '../app/controllers/'. $class . '.php';
    }

    if(file_exists('../app/models/'. $class . '.php')){
        require_once '../app/models/'. $class . '.php';
    }

    if(file_exists('../routes/'. $class . '.php')){
        require_once '../routes/'. $class . '.php';
    }
});
