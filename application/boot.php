<?php

define('PROCESS_INIT_TIME', time());

define('BASE_PATH',   __DIR__   . '/');
define('APP_PATH',    BASE_PATH . 'Terrier/');
define('CONFIG_PATH', BASE_PATH . 'config/');

spl_autoload_register(function($className) {
    $className = str_replace('\\', '/', $className);

    if ( file_exists(BASE_PATH . $className . '.php') ) {
        require_once(BASE_PATH . $className . '.php');
    }
});

$config = require(CONFIG_PATH . 'config.php');
\Terrier\Config::init($config);

\Terrier\Env::set('default_charset', 'UTF-8');

define('TEMPLATE_PATH', BASE_PATH . trim(\Terrier\Config::get('template_path', 'templates'), '/') . '/');
define('TMP_PATH',      BASE_PATH . trim(\Terrier\Config::get('tmp_path', 'tmp'), '/') . '/');