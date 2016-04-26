<?php

namespace ItbTest;
use Itb\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testCanBeCreated()
    {
        // Arrange
        $user = new User();

        // Act

        // Assert
        $this->assertNotNull($user);
    }

    public function testGetUsernameAfterConstruction()
    {
        // Arrange
        $user = new User();
        $user->setUsername("name");
        $user->setPassword("pass");
        $user->setRole(User::ROLE_USER);
        $expectedResult = "name";

        // Act
        $result = $user->getUsername();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetPasswordAfterConstruction()
    {
        // Arrange
        $user = new User();
        $user->setUsername("name");
        $user->setPassword("pass");
        $user->setRole(User::ROLE_USER);
        $expectedResult = $user->getPassword();

        // Act
        $result = $user->getPassword();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetRoleAfterConstruction()
    {
        // Arrange
        $user = new User();
        $user->setUsername("name");
        $user->setPassword("pass");
        $user->setRole(User::ROLE_USER);
        $expectedResult = User::ROLE_USER;

        // Act
        $result = $user->getRole();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetProjectIdAfterConstruction()
    {
        // Arrange
        $user = new User();
        $user->setUsername("name");
        $user->setPassword("pass");
        $user->setRole(User::ROLE_USER);
        $user->setProjectId(3);
        $user->setSupervisorId(2);
        $expectedResult = 3;

        // Act
        $result = $user->getProjectId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

	public function testGetSupervisorIdAfterConstruction()
	{
		// Arrange
		$user = new User();
		$user->setUsername("name");
		$user->setPassword("pass");
		$user->setRole(User::ROLE_USER);
		$user->setProjectId(3);
		$user->setSupervisorId(2);
		$expectedResult = 2;

		// Act
		$result = $user->getSupervisorId();

		// Assert
		$this->assertEquals($expectedResult, $result);
    }

	public function testGetImageAfterConstruction()
	{
		// Arrange
		$user = new User();
		$user->setUsername("name");
		$user->setPassword("pass");
		$user->setRole(User::ROLE_USER);
		$user->setImage("img.jpg");
		$expectedResult = "img.jpg";

		// Act
		$result = $user->getImage();

		// Assert
		$this->assertEquals($expectedResult, $result);
    }

	/*public function testFindingMatchingUsernameAndPassword()
	{
		// Arrange
		$user = new User();
		$user->setUsername("name");
		$user->setPassword("pass");
		$user->setRole(User::ROLE_USER);
		$expectedResult = false;

		// Act
		$result = $user->canFindMatchingUsernameAndPassword("name", "pass");

		// Assert
		$this->assertEquals($expectedResult, $result);
    }

	public function testFindingMatchingUsernameAndRole()
	{
		// Arrange
		$user = new User();
		$user->setUsername("name");
		$user->setPassword("pass");
		$user->setRole(User::ROLE_USER);
		$expectedResult = User::ROLE_USER;

		// Act
		$result = $user->canFindMatchingUsernameAndRole("name");

		// Assert
		$this->assertEquals($expectedResult, $result);
    }

	public function testGettingOneByUsername()
	{
		// Arrange
		$user = new User();
		$user->setUsername("name");
		$user->setPassword("pass");
		$user->setRole(User::ROLE_USER);
		$expectedResult = $user;

		// Act
		$result = $user->getOneByUsername("name");

		// Assert
		$this->assertEquals($expectedResult, $result);
    }

	public function testAddingNewUserToDatabase()
	{
		// Arrange
		$user = new User();
		User::addNewUserToDatabase("name", "pass", User::ROLE_USER, "3", "2");
		$expectedResult = $user;

		// Act
		$result = $user->getOneByUsername("name");

		// Assert
		$this->assertEquals($expectedResult, $result);
    }

	public function testRemovingUserFromDatabase()
	{
		// Arrange
		$user = new User();
		User::addNewUserToDatabase("name", "pass", User::ROLE_USER, "3", "2");
		$id = $user->getId();
		$user->removeUserFromDatabase("name", $id);
		$expectedResult = $user;

		// Act
		$result = $user->getOneByUsername("name");

		// Assert
		$this->assertEquals($expectedResult, $result);
    }

	public function testUpdatingUserInDatabase()
	{
		// Arrange
		$user = new User();
		User::addNewUserToDatabase("name", "pass", User::ROLE_USER, "3", "2");
		User::updateUser("name", "newName", "pass", User::ROLE_USER, "3", "2");
		$expectedResult = "newName";

		// Act
		$result = $user->getUsername();

		// Assert
		$this->assertEquals($expectedResult, $result);
    }*/
}