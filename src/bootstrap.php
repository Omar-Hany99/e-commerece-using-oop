<?php
define('APP_ROOT', dirname(__FILE__, 2));                // Root directory
//require APP_ROOT . '/src/functions.php';
require APP_ROOT . '/config/config.php';
require APP_ROOT . '/vendor/autoload.php';               // Autoload libraries


$cms = new \App\Cms\CMS($dsn, $username, $password);              // Create CMS object
unset($dsn, $username, $password);                       // Remove database config data