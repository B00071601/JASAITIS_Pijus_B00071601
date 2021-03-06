<?php
/**
 * The Error Controller
 *
 * These are the basic functions to control and handle the error functions in the site
 *
 * @package      Itb
 * @author       Pijus Jasaitis
 */

namespace Itb;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Represents the Error Controller
 *
 * Class ErrorController
 * @package Itb
 */
class ErrorController
{
    /**
     * Handles errors on the site
     *
     * @param Application $app
     * @param $errorCode
     * @return mixed
     */
    public function errorAction(Application $app, $errorCode)
    {
        $argsArray = [];
        $templateName = '404';

        if (404 != $errorCode){
            $message = 'Sorry, something went wrong.';
            $message .= '<br>(ERROR CODE = ' . $errorCode . ')';

            $argsArray = array(
                'message' => $message
            );

            $templateName = 'error';

        }

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
}