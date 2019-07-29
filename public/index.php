<?php require '../vendor/autoload.php';

// instantiate the App object
include(__DIR__ . '/../src/settings.php');
require_once(APP_BASE . '/src/App.php');
$app = new Pearler\App();

// Get container
$container = $app->getContainer();

// Add route callbacks
require_once(APP_BASE . '/src/routes.php');

// Run application
$app->run();
