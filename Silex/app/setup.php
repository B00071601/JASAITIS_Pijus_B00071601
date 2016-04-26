<?php
/**
 * Autoloader & other functions
 */
require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Template path
 */
$myTemplatesPath = __DIR__ . '/../templates';

/**
 * Twig setup
 */
$loader = new Twig_Loader_Filesystem($myTemplatesPath);
$twig = new Twig_Environment($loader);

/**
 * Silex setup
 */
$app = new Silex\Application();

/**
 * Twig & Silex integration
 */
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => $myTemplatesPath
));
