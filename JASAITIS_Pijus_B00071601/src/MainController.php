<?php
/**
 * The Main Controller
 *
 * These are the basic functions to control and handle most of the processes in the site
 *
 * @package      Itb
 * @author       Pijus Jasaitis
 */

namespace Itb;

/**
 * Represents the Main Controller of the site
 *
 * Class MainController
 * @package Itb
 */
class MainController
{
    /**
     * Process the /index action (Log out user)
     */
    public function indexAction()
    {
        require __DIR__ . '/../templates/index.php';

        if(isset($_SESSION['isLoggedIn'])) {
            if ($_SESSION["isLoggedIn"] == 1) {
                Print "<p>Log out successful.</p>";
            }
        }

        require_once __DIR__ . '/../templates/loginForm.php';

    }

    /**
     * Process the /login action
     */
    public function processLoginAction()
    {
        //Default to not logged in
        $isLoggedIn = false;

        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        //Search for username
        $isLoggedIn = User::canFindMatchingUsernameAndPassword($username, $password);
        $isRole = User::canFindMatchingUsernameAndRole($username);

        //Log in actions
        if($isLoggedIn){
            if($isRole == 2)
            {
                $_SESSION["isLoggedIn"]=$isLoggedIn;
                $_SESSION["role"]=$isRole;
                $_SESSION['hasLoggedIn']="yes";
                $this->nav();
            }
            else
            {
                $_SESSION["isLoggedIn"]=$isLoggedIn;
                $_SESSION["role"]=$isRole;
                $_SESSION['hasLoggedIn']="yes";
                $this->nav();
            }
            require_once __DIR__ . '/../templates/loginSuccess.php';
        } else {
            $message = 'Incorrect login, try again.';
            require_once __DIR__ . '/../templates/message.php';
        }
    }

    /**
     * Process the /list action
     */
    public function listAction()
    {
        $this->nav();
        $actions = Action::getAll();

        if(isset($_SESSION['isLoggedIn'])) {
            if ($_SESSION["isLoggedIn"] == 1) {
                require __DIR__ . '/../templates/actions/list.php';
            }
        }
        else {
            require __DIR__ . '/../templates/actions/list.php';
        }
    }

    /**
     * Forget the session
     */
    public function forgetSession()
    {

        $this->indexAction();
        $this->killSession();
    }

    /**
     * Kill the session
     */
    public function killSession()
    {
        $_SESSION = [];
        session_destroy();
    }

    /**
     * Display the main nav bar
     */
    public function nav()
    {
        if(isset($_SESSION['role'])){
            if($_SESSION["isLoggedIn"]==1 && $_SESSION["role"]==2){
                print "<img src='/public/images/adm.jpg' alt='Admin'>";
                include '../templates/include/admin.php';
            } else if ($_SESSION["isLoggedIn"]==1 && $_SESSION["role"]==1){
                print "<img src='/public/images/usr.jpg' alt='User'>";
                include '../templates/include/user.php';
            }
            else if ($_SESSION["isLoggedIn"]==1 && $_SESSION["role"]==0){
                print "<img src='/public/images/mem.jpg' alt='Member'>";
                include '../templates/include/member.php';
            }
            else {
                print "An error occurred!";
            }
        } else{
            print "<img src='/public/images/vis.jpg' alt='Visitor'>";
            include '../templates/include/visitor.php';
        }
    }

    /**
     * Display the secured nav bar
     */
    public function secureNav()
    {
        if(isset($_SESSION['isLoggedIn']) && isset($_SESSION['role'])){
            if($_SESSION["isLoggedIn"]==1 && $_SESSION["role"]==2){
                print "<p>Admin</p>";
                include '../templates/include/admin.php';
            } else if ($_SESSION["isLoggedIn"]==1 && $_SESSION["role"]==1){
                print "<p>User</p>";
                include '../templates/include/user.php';
                print "test";
            } else{
                print "<p>Something went wrong.</p>";
                print "<p>Please attempt to log in.</p>";
                print '<h4><a href="index.php?action=killSession">Back to Login.</a></h4>';

            }
        } else{
            print "<p>Please log in.</p>";
            print '<h4></h4><a href="index.php?action=killSession">Back to Login.</a></h4>';
        }
    }

    /**
     * Display the home page
     */
    public function homePage()
    {
        $this->nav();
        if(isset($_SESSION['isLoggedIn'])) {
            if ($_SESSION["isLoggedIn"] == 1) {
                require_once __DIR__ . '/../templates/index.php';
            }
        }
        else {
            require_once __DIR__ . '/../templates/index.php';
            require_once __DIR__ . '/../templates/loginForm.php';
        }
    }

    /**
     * Display the about page
     */
    public function aboutPage()
    {
        $this->nav();
        require_once __DIR__ . '/../templates/about.php';
    }

    /**
     * Display the registration page
     */
    public function registerPage()
    {
        require_once __DIR__ . '/../templates/registerPage.php';
    }

    /**
     * Process the submitted form and register a new user
     */
    public function processRegister()
    {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $retypePassword = filter_input(INPUT_POST, 'retypePassword', FILTER_SANITIZE_STRING);
        $projectId = filter_input(INPUT_POST, 'projectId', FILTER_SANITIZE_STRING);
        $supervisorId = filter_input(INPUT_POST, 'supervisorId', FILTER_SANITIZE_STRING);

        if($password == $retypePassword) {
            if($username!=null) {
                $role=1;
                print "<p>Adding to database.</p>";
                User::addNewUserToDatabase($username, $password, $role, $projectId, $supervisorId);
            } else {
                print "<p>Username can not be empty.</p>";
                print '<h4><a href="index.php?action=registerPage">Back to Registration.</a></h4>';
            }

        } else {
            Print "<p>Passwords do not match.</p>";
            Print "<p>Please try again.</p>";
            print '<h4><a href="index.php?action=registerPage">Back to Registration.</a></h4>';
        }
    }

    /**
     * Show the user/member/administrator profile
     */
    public function showProfile()
    {
        if(isset($_SESSION['isLoggedIn']) && isset($_SESSION['role'])){
            if($_SESSION["isLoggedIn"]==1 && $_SESSION["role"]==2){
                print "<p>You are logged in as type: Admin</p>";
                include '../templates/include/adminProfile.php';
            } else if ($_SESSION["isLoggedIn"]==1 && $_SESSION["role"]==1){
                print "<p>You are logged in as type: User</p>";
                include '../templates/include/userProfile.php';
            }
            else if ($_SESSION["isLoggedIn"]==1 && $_SESSION["role"]==0){
                print "<p>You are logged in as type: Member</p>";
                include '../templates/include/memberProfile.php';
            } else{
                print "<p>Something went wrong.</p>";
                print "<p>Please attempt to log in.</p>";
                print '<h4><a href="index.php?action=killSession">Back to Login.</a></h4>';

            }
        } else{
            print "<p>Please log in.</p>";
            print '<a href="index.php?action=killSession">Back to Login.</a>';
        }
    }

    /**
     * Set a new profile picture on a user/member/administrator profile
     */
    public function setNewImage()
    {
        $image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);

            if($image!=null) {
                print "<p>Changing image.</p>";
                User::setImage($image);
                print '<h4><a href="index.php?action=profilePage">Back to Profile.</a></h4>';
            } else {
                print "<p>Image URL can not be empty.</p>";
                print '<h4><a href="index.php?action=profilePage">Back to Profile.</a></h4>';
            }

    }

    /**********************
     *     Silex/Twig     *
     **********************/

    /**
     * Silex /sList action
     *
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function sListAction(Request $request, Application $app)
    {
        $publications = new Publication();

        $argsArray = array(
            'books' => $publications->getAll()
        );

        $templateName = 'list';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    /**
     * Silex /show/$id action
     *
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return mixed
     */
    public function showAction(Request $request, Application $app, $id)
    {
        $publications = new Publication();

        $book = $publications->getOneById($id);

        $argsArray = array(
            'message' => 'No publication found with id: ' . $id
        );
        $templateName = 'error';

        if (null != $book){
            $argsArray = array(
                'book' => $book
            );

            $templateName = 'show';
        }

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
}