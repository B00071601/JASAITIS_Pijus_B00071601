<?php
/**
 * The Publication Controller
 *
 * These are the basic functions to control and handle Publication processes in the site
 *
 * @package      Itb
 * @author       Pijus Jasaitis
 */

namespace Itb;

/**
 * Represents the Publication Controller
 *
 * Class PublicationController
 * @package Itb
 */
class PublicationController
{
    /**
     * Handles the /list action
     */
    public function listAction()
    {
        $publications = Publication::getAll();
        if(isset($_SESSION['isLoggedIn'])) {
            if ($_SESSION["isLoggedIn"] == 1) {
                require_once __DIR__ . '/../templates/publications/list.php';
            }
        }
        else {
            require_once __DIR__ . '/../templates/publications/list.php';
        }
    }
}