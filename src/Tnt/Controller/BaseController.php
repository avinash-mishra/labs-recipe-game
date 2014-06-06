<?php

namespace Tnt\Controller;

use Doctrine\ORM\EntityManager;
use Silex\Application;
use Silex\ControllerCollection;
use Silex\ControllerProviderInterface;
use Tnt\Entity\Blog;
use Tnt\Entity\BlogRepository;
use Tnt\Entity\Site;
use Tnt\Entity\SiteFactory;
use Tnt\Entity\SiteRepository;

abstract class BaseController implements ControllerProviderInterface
{
    /** @var Application */
    protected $container;

    /**
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->container = $app;
    }

    /**
     * Returns routes to connect to the given application.
     *
     * @param Application $app An Application instance
     *
     * @return ControllerCollection A ControllerCollection instance
     */
    public function connect(Application $app)
    {
        $collection = $this->getControllerCollection($app);

        $collection = $this->buildRouteDefinitions($collection);

        return $collection;
    }

    /**
     * @param ControllerCollection $collection
     * @return ControllerCollection
     */
    abstract public function buildRouteDefinitions(ControllerCollection $collection);

    /**
     * @param Application $app
     * @return ControllerCollection
     */
    private function getControllerCollection(Application $app)
    {
        return $app['controllers_factory'];
    }

    /**
     * @return EntityManager
     */
    protected function getEntityManager()
    {
        return $this->container['orm.em'];
    }
}
