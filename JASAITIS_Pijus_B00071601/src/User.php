<?php
/**
 * The User
 *
 * These are the basic functions to create and modify Users within the database
 *
 * @package      Itb
 * @author       Pijus Jasaitis
 */

namespace Itb;

use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

/**
 * Represents the User
 *
 * Class User
 * @package Itb
 */
class User extends DatabaseTable
{
    /**
     * The member constant
     */
    const ROLE_MEMBER = 0;
    /**
     * The user constant
     */
    const ROLE_USER = 1;
    /**
     * The admin constant
     */
    const ROLE_ADMIN = 2;

    /**
     * The ID number of the user
     *
     * @var int
     */
    private $id;
    /**
     * The username of the user
     *
     * @var String
     */
    private $username;
    /**
     * The (to be hashed) password of the user
     *
     * @var String
     */
    private $password;
    /**
     * The constant role of the user
     *
     * @var int
     */
    private $role;
    /**
     * The ID number of the project assigned to the user
     *
     * @var int
     */
    private $projectId;
    /**
     * The ID number of the supervisor assigned to the user
     *
     * @var int
     */
    private $supervisorId;
    /**
     * The URL to the image assigned to the user
     *
     * @var String
     */
    private $image;

    /**
     * Return the ID number of the user
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the ID number of the user
     *
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Return the username of the user
     *
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the username of the user
     *
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Return the password of the user
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Return the role of the user
     *
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the role of the user
     *
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * Return the project ID of the user
     *
     * @return mixed
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * Set the project ID of the user
     *
     * @param mixed $projectId
     */
    public function setProjectId($projectId)
    {
        if($projectId != "" && $projectId != 0) {
            $this->projectId = $projectId;
        }
        else{
            $this->projectId = null;
        }
    }

    /**
     * Return the supervisor ID of the user
     *
     * @return mixed
     */
    public function getSupervisorId()
    {
        return $this->supervisorId;
    }

    /**
     * Set the supervisor ID of the user
     *
     * @param mixed $supervisorId
     */
    public function setSupervisorId($supervisorId)
    {
        if($supervisorId != "" && $supervisorId != 0) {
            $this->supervisorId = $supervisorId;
        }
        else{
            $this->supervisorId = null;
        }
    }

    /**
     * Return the image URL of the user
     *
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the image URL of the user
     *
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * Set the username of the user and hash it
     *
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $this->password = $hashedPassword;
    }

    /**
     * Search database for matching username and password
     *
     * @param $username
     * @param $password
     *
     * @return bool
     */
    public static function canFindMatchingUsernameAndPassword($username, $password)
    {
        $user = User::getOneByUsername($username);

        if(null == $user){
            return false;
        }

        $hashedStoredPassword = $user->getPassword();

        return password_verify($password, $hashedStoredPassword);
    }

    /**
     * Search database for matching username and role
     *
     * @param $username
     *
     * @return mixed|null
     */
    public static function canFindMatchingUsernameAndRole($username)
    {
        $user = User::getOneByUsername($username);
        if($user != null) {
            return $user -> getRole();
        } else{
            return null;
        }
    }

    /**
     * Get user by username
     *
     * @param $username
     *
     * @return mixed|null
     */
    public static function getOneByUsername($username)
	{
		$db = new DatabaseManager();
		$connection = $db->getDbh();

		$sql = 'SELECT * FROM users WHERE username=:username';
		$statement = $connection->prepare($sql);
		$statement->bindParam(':username', $username, \PDO::PARAM_STR);
		$statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
		$statement->execute();

		if ($object = $statement->fetch()) {
			return $object;
		} else {
			return null;
		}
	}

    /**
     * Add a new user to the database with provided parameters
     *
     * @param $username
     * @param $password
     * @param $role
     * @param $projectId
     * @param $supervisorId
     */
    public static function addNewUserToDatabase($username, $password, $role, $projectId, $supervisorId)
    {
        $user = new User();
        $isOnDatabase = User::getOneByUsername($username);
        if($isOnDatabase==null) {
            $user->setUsername("$username");
            $user->setPassword("$password");
            $user->setProjectId("$projectId");
            $user->setSupervisorId("$supervisorId");
            $user->setImage("https://cdn0.vox-cdn.com/images/verge/default-avatar.v9899025.gif");
            if($role==2) {
                $user->setRole(User::ROLE_ADMIN);
                print "<p>New administrator added.</p>";
            } else if($role==1){
                $user->setRole(User::ROLE_USER);
                print "<p>New user added.</p>";
            }
            else {
                $user->setRole(User::ROLE_MEMBER);
                print "<p>New member added.</p>";
            }
            User::insert($user);
        } else {
            Print "<p>The user already exists.</p>";
        }
    }

    /**
     * Remove a user from the database with the provided parameters
     *
     * @param $username
     * @param $id
     */
    public static function removeUserFromDatabase($username, $id)
    {
        $isOnDatabase = User::getOneByUsername($username);
        if($isOnDatabase!=null) {
            $db = new DatabaseManager();
            $connection = $db->getDbh();

            $sql = 'DELETE FROM users WHERE username=:username AND id=:id';
            $statement = $connection->prepare($sql);
            $statement->bindParam(':username', $username, \PDO::PARAM_STR);
            $statement->bindParam('id', $id, \PDO::PARAM_STR);
            $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
            $statement->execute();

            print "<p>User removed.</p>";
        }
        else {
            print "<p>No user named ".$username." exists.</p>";
        }
    }

    /**
     * Update a user in the database with provided parameters
     *
     * @param $target
     * @param $username
     * @param $password
     * @param $role
     * @param $projectId
     * @param $supervisorId
     */
    public static function updateUser($target, $username, $password, $role, $projectId, $supervisorId)
    {
        $isOnDatabase = User::getOneByUsername($target);
        if($isOnDatabase!=null) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $password=$hashedPassword;
            $db = new DatabaseManager();
            $connection = $db->getDbh();
            $sql = 'UPDATE users SET username=:username, password=:password, role=:role, supervisorId=:supervisorId, projectId=:projectId WHERE username=:target';
            $statement = $connection->prepare($sql);
            $statement->bindParam(':target', $target, \PDO::PARAM_STR);
            $statement->bindParam(':username', $username, \PDO::PARAM_STR);
            $statement->bindParam(':password', $password, \PDO::PARAM_STR);
            $statement->bindParam(':role', $role, \PDO::PARAM_STR);
            $statement->bindValue(':projectId', $projectId, \PDO::PARAM_STR);
            $statement->bindValue(':supervisorId', $supervisorId, \PDO::PARAM_STR);
            $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
            $statement->execute();

            print "<p>User updated.</p>";
        } else {
            print "<p>No user named ".$target." exists.</p>";
        }
    }


}