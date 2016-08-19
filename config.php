<?php
define('PATH', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);
define('PATH_ROOT', $_SERVER['DOCUMENT_ROOT']);


/**
 * Автоматически подключает классы с именем $className
 *
 * @return void
 **/
function autoloader($className) {
    include_once PATH_ROOT . DS . 'app' . DS . 'objects' . DS . $className . '.php';
}
