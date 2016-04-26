<?php

namespace Itb;

/**
 * Class Project
 * @package Itb
 */
class Project
{
    /**
     * The ID of the project
     *
     * @var int
     */
    private $id;

    /**
     * The Title of the project
     *
     * @var String
     */
    private $title;

    /**
     * The author(s) of the project
     *
     * @var String
     */
    private $author;

    /**
     * The deadline of the project
     *
     * @var Date
     */
    private $deadline;

    /**
     * The status of the project
     *
     * @var int
     */
    private $status;

    /**
     * The image URL of the project
     *
     * @var String
     */
    private $image;

    /**
     * Project constructor with $id
     *
     * @param $id
     */
    function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the ID
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the title
     *
     * @return String
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the author
     *
     * @return String
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Get the deadline
     *
     * @return mixed
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * Get the status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the image URL
     *
     * @return String
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the ID
     *
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Set the Title
     *
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Set the author
     *
     * @param $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * Set the deadline
     *
     * @param $deadline
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;
    }

    /**
     * Set the status
     *
     * @param $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Set the image URL
     *
     * @param $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }
}