<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/core/App.php';
require_once __DIR__ . '/core/Controller.php';
require_once __DIR__ . '/core/Database.php';
$app = new App();
