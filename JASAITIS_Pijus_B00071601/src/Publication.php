<?php
/**
 * The Publication
 *
 * These are the basic functions to create and modify Publications within the database
 *
 * @package      Itb
 * @author       Pijus Jasaitis
 */

namespace Itb;

use Mattsmithdev\PdoCrud\DatabaseTable;

/**
 * Represents the Publication
 *
 * Class Publication
 * @package Itb
 */
class Publication extends DatabaseTable
{
    /**
     * The ID number of the publication
     *
     * @var int
     */
    private $id;
    /**
     * The String title of the publication
     *
     * @var String
     */
    private $title;
    /**
     * The String author of the publication
     *
     * @var String
     */
    private $author;
    /**
     * The URL to download the publication
     *
     * @var String
     */
    private $url;

    /**
     * Return the ID number of the publication
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the ID number of the publication
     *
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Return the title of the publication
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the title of the publication
     *
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Return the author of the publication
     *
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the author of the publication
     *
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * Set the URL of the publication
     *
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Return the URL of the publication
     *
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }
}