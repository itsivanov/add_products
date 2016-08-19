<?php
include_once 'config.php';

spl_autoload_register('autoloader');

$app = new AppController;
$app->getContent();
