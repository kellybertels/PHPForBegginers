<?php
/**
 * initialization
 * Register and autoload, start and resume the sessions
 */
spl_autoload_register(function($class){
require "classes/{$class}.php";

});

session_start();