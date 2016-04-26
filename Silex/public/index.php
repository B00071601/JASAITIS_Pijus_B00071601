<?php
/**
 * Autoloader
 */
require_once __DIR__ . '/../app/setup.php';

/**
 * Use the controller utility
 */
use Itb\ControllerUtility;

$app->get('/',          ControllerUtility::controller('Itb', 'main/index'));
$app->get('/list',      ControllerUtility::controller('Itb', 'main/list'));
$app->get('/show/{id}', ControllerUtility::controller('Itb', 'main/show'));
$app->get('/show/', ControllerUtility::controller('Itb', 'main/showMissingIsbn'));

$app->error(function (\Exception $e, $code) use ($app)
{
    $errorController = new Itb\ErrorController();
    return $errorController->errorAction($app, $code);
});

/**
 * Run the application
 */
$app->run();

