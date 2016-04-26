<?php

namespace ItbTest;
use Itb\Publication;

class PublicationTest extends \PHPUnit_Framework_TestCase
{
    public function testCanBeCreated()
    {
        // Arrange
        $publication = new Publication();

        // Act

        // Assert
        $this->assertNotNull($publication);
    }

    public function testGetIdAfterConstruction()
    {
        // Arrange
        $publication = new Publication();
        $publication->setId(5);
        $publication->setTitle("title");
        $publication->setAuthor("author");
        $publication->setURL("url.pdf");
        $expectedResult = 5;

        // Act
        $result = $publication->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetTitleAfterConstruction()
    {
        // Arrange
        $publication = new Publication();
        $publication->setId(5);
        $publication->setTitle("title");
        $publication->setAuthor("author");
        $publication->setURL("url.pdf");
        $expectedResult = "title";

        // Act
        $result = $publication->getTitle();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetAuthorAfterConstruction()
    {
        // Arrange
        $publication = new Publication();
        $publication->setId(5);
        $publication->setTitle("title");
        $publication->setAuthor("author");
        $publication->setURL("url.pdf");
        $expectedResult = "author";

        // Act
        $result = $publication->getAuthor();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetURLAfterConstruction()
    {
        // Arrange
        $publication = new Publication();
        $publication->setId(5);
        $publication->setTitle("title");
        $publication->setAuthor("author");
        $publication->setURL("url.pdf");
        $expectedResult = "url.pdf";

        // Act
        $result = $publication->getURL();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
}