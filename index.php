<?php
session_start();

require('vendor/autoload.php');

define('BASE_URL', __DIR__);

$app = new CarTec\App();
$app->run();