<?php

namespace Itb;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

use Itb\ProjectRepository;

class MainController
{
    /**
     * Action for route "/"
     *
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function indexAction(Request $request, Application $app)
    {
        $templateName = 'index';
        return $app['twig']->render($templateName . '.html.twig', []);
    }

    /**
     * Action for route "/list"
     *
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function listAction(Request $request, Application $app)
    {
        $projectRepository = new ProjectRepository();

        $argsArray = array
        (
            'projects' => $projectRepository->getAllProjects()
        );

        $templateName = 'list';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    /**
     * Action for route "/show/($id)"
     *
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return mixed
     */
    public function showAction(Request $request, Application $app, $id)
    {
        $projectRepository = new ProjectRepository();

        $project = $projectRepository->getOneProject($id);

        $argsArray = array
        (
            'message' => 'No project found with ID:' . $id
        );
        $templateName = 'error';

        if (null != $project)
        {
            $argsArray = array
            (
                'project' => $project
            );

            $templateName = 'show';
        }

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    /**
     * Action for "/show" with missing id
     *
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function showMissingIdAction(Request $request, Application $app)
    {
        $argsArray = array
        (
            'message' => 'Please provide an ID for the show page.'
        );

        $templateName = 'error';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

}