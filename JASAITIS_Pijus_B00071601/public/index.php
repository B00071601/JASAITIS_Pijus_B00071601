<?php

/**
 * Autoloader setup
*
require_once __DIR__ . '/../app/setup.php';

/**
 * Route to controller class
*
use Itb\ControllerUtility;

//$app->get('/', ControllerUtility::controller('Itb', 'main/index'));

$app->error(function (\Exception $e, $code) use ($app) {
    $errorController = new Itb\ErrorController();
    return $errorController->errorAction($app, $code);
});

/**
 * Process the request
 *
$app->run();*/

print '
<!doctype html>
<html lang=\"en\">
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>B00071601 - Assignment</title>
</head>
';

session_start();

print "<img src='images/wel.jpg' alt='Welcome!'>";

print '<nav>';
print '<a href="index.php?action=homePage">Home</a>';
print '<a href="index.php?action=about">About Us</a>';
print '<a href="index.php?action=list">Projects</a>';
print '<a href="index.php?action=listUsers">Users</a>';
print '<a href="index.php?action=listPublications">Publications</a>';
print '</nav>';

print '<br><hr>';

require_once __DIR__ . '/../app/configDatabase.php';
require_once __DIR__ . '/../vendor/autoload.php';

use Itb\Action;

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

$mainController = new \Itb\MainController();
$publicationController = new \Itb\PublicationController();
$adminController = new \Itb\AdminController();
$UserController = new \Itb\UserController();

switch ($action) {
    case 'killSession';
        $mainController->forgetSession();
        break;

    case 'processLogin':
        $mainController->processLoginAction();
        break;

    case 'list';
        $mainController->listAction();
        break;

    case 'listPublications';
        $mainController->nav();
        $publicationController->listAction();
        break;

    case 'listUsers';
        $mainController->nav();
        $UserController->listAction();
        break;

    case 'homePage';
        $mainController->homePage();
        break;

    case 'about';
        $mainController->aboutPage();
        break;

    case 'registerPage';
        $mainController->registerPage();
        break;

    case 'processRegister';
        $mainController->processRegister();
        break;

    case 'addUser';
        $mainController->nav();
        $UserController->listAction();
        $adminController->addUser();
        break;

    case 'processAddUser';
        $mainController->nav();
        $adminController->processAddUser();
        $UserController->listAction();
        $adminController->addUser();
        break;

    case 'addProject';
        $mainController->listAction();
        $adminController->addProject();
        break;

    case 'processAddProject';
        $adminController->processAddProject();
        $mainController->listAction();
        $adminController->addProject();
        break;

    case 'removeUser';
        $mainController->nav();
        $UserController->listAction();
        $adminController->removeUser();
        break;

    case 'processRemoveUser';
        $mainController->nav();
        $adminController->processRemoveUser();
        $UserController->listAction();
        $adminController->removeUser();
        break;

    case 'updateUser';
        $mainController->nav();
        $UserController->listAction();
        $adminController->updateUser();
        break;

    case 'updateProject';
        $mainController->listAction();
        $adminController->updateProject();
        break;

    case 'processUpdateUser';
        $mainController->nav();
        $adminController->processUpdateUser();
        $UserController->listAction();
        $adminController->updateUser();
        break;

    case 'processUpdateProject';
        $adminController->processUpdateProject();
        $mainController->listAction();
        $adminController->updateProject();
        break;

    case 'profilePage';
        $mainController->nav();
        $mainController->showProfile();
        break;

    case 'processImageChange';
        $mainController->nav();
        $mainController->setNewImage();
        break;

    default:
        $mainController->indexAction();
}