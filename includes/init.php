<?php
/**
 * initialization
 * Register and autoload, start and resume the sessions
 */
spl_autoload_register(function($class){
require dirname(__DIR__) . "/classes/{$class}.php";

});

session_start();
require dirname(__DIR__) . '/config.php';
