<?php

namespace ItbTest;
use Itb\Action;

class ActionTest extends \PHPUnit_Framework_TestCase
{
    public function testCanBeCreated()
    {
        // Arrange
        $action = new Action();

        // Act

        // Assert
        $this->assertNotNull($action);
    }

    public function testGetIdAfterConstruction()
    {
        // Arrange
        $action = new Action();
        $action->setId(4);
        $action->setDescription("description");
        $action->setImplementorId(4);
        $action->setDeadline(2000-01-01);
        $action->setStatus(1);
        $expectedResult = 4;

        // Act
        $result = $action->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetDescriptionAfterConstruction()
    {
        // Arrange
        $action = new Action();
        $action->setId(4);
        $action->setDescription("description");
        $action->setImplementorId(4);
        $action->setDeadline(2000-01-01);
        $action->setStatus(1);
        $expectedResult = "description";

        // Act
        $result = $action->getDescription();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetImplementorIdAfterConstruction()
    {
        // Arrange
        $action = new Action();
        $action->setId(4);
        $action->setDescription("description");
        $action->setImplementorId(4);
        $action->setDeadline(2000-01-01);
        $action->setStatus(1);
        $expectedResult = 4;

        // Act
        $result = $action->getImplementorId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetDeadlineAfterConstruction()
    {
        // Arrange
        $action = new Action();
        $action->setId(4);
        $action->setDescription("description");
        $action->setImplementorId(4);
        $action->setDeadline(2000-01-01);
        $action->setStatus(1);
        $expectedResult = 2000-01-01;

        // Act
        $result = $action->getDeadline();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetStatusAfterConstruction()
    {
        // Arrange
        $action = new Action();
        $action->setId(4);
        $action->setDescription("description");
        $action->setImplementorId(4);
        $action->setDeadline(2000-01-01);
        $action->setStatus(1);
        $expectedResult = 1;

        // Act
        $result = $action->getStatus();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    /*public function testGettingOneById()
    {
        // Arrange
        $action = new Action();
        $action->setId(4);
        $action->setDescription("description");
        $action->setImplementorId(4);
        $action->setDeadline(2000-01-01);
        $action->setStatus(1);
        $expectedResult = $action;

        // Act
        $result = $action->getOneById(4);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

	public function testAddingProjectToDatabase()
    {
        // Arrange
        $action = new Action();
        Action::addNewProjectToDatabase("description", 4, 2000-01-01, 1);
        $expectedResult = $action;

        // Act
        $result = $action->getOneById(4);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

	public function testUpdatingProjectInDatabase()
    {
        // Arrange
        $action = new Action();
        Action::addNewProjectToDatabase("description", 4, 2000-01-01, 1);
        Action::updateProject(4, "newDescription", 4, 2000-01-01, 1);
        $expectedResult = "newDescription";

        // Act
        $result = $action->getDescription();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }*/
}