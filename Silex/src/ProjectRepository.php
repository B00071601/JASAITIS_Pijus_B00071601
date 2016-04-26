<?php

namespace Itb;

/**
 * Class BookRepository
 * @package Itb
 */
class ProjectRepository
{
    /**
     * An array of all projects
     *
     * @var array
     */
    private $projects;

    /**
     * ProjectRepository constructor
     */
    function __construct()
    {
        $p1 = new Project(1);
        $p1->setTitle('A study of difficulty');
        $p1->setAuthor('John Johns Johnson');
        $p1->setDeadline(2016-8-9);
        $p1->setStatus(1);
        $p1->setImage("p1.jpg");
        $this->addProject($p1);

        $p2 = new Project(2);
        $p2->setTitle('Relative speeds of study');
        $p2->setAuthor('Rex Regis, Frank Dumas');
        $p2->setDeadline(2015-12-11);
        $p2->setStatus(0);
        $p2->setImage("p2.jpg");
        $this->addProject($p2);

        $p3 = new Project(3);
        $p3->setTitle('Quickness in llamas');
        $p3->setAuthor('Margaret Jones');
        $p3->setDeadline(2017-1-2);
        $p3->setStatus(1);
        $p3->setImage("p3.jpg");
        $this->addProject($p3);
    }

    /**
     * Add a project to the repository
     *
     * @param Project $project
     */
    private function addProject(Project $project)
    {
        $id = $project->getId();

        $this->projects[$id] = $project;

    }

    /**
     * Return all projects
     *
     * @return array
     */
    public function getAllProjects()
    {
        return $this->projects;
    }

    /**
     * Return a single project by ID
     *
     * @param $id
     * @return null
     */
    public function getOneProject($id)
    {
        if(array_key_exists($id, $this->projects))
        {
            return $this->projects[$id];
        } else
        {
            return null;
        }
    }

}