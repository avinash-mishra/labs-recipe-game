<?php

namespace Tnt\Controller;

use Silex\Application;
use Silex\ControllerCollection;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function buildRouteDefinitions(ControllerCollection $collection)
    {
        $collection->get('/', DefaultController::class.':'.'index');

        return $collection;
    }

    public function index()
    {
        $result = 'Welcome to myTaste Recipe Game!';

        return new JsonResponse($result);
    }
}
