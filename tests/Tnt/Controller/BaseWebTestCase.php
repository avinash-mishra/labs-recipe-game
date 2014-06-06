<?php

namespace Tests\Tnt\Controller;

use Silex\Application;
use Silex\ExceptionHandler;
use Silex\WebTestCase;

class BaseWebTestCase extends WebTestCase
{
    /**
     * @inheritdoc
     */
    public function createApplication()
    {
        $this->app = require __DIR__ . '/../../../src/app.php';

        $this->enableDebug();
        $this->disableExceptionHandler();

        return $this->app;
    }

    private function enableDebug()
    {
        return $this->app['debug'] = true;
    }

    private function disableExceptionHandler()
    {
        $this->getExceptionHandler()->disable();
    }

    /**
     * @return ExceptionHandler
     */
    private function getExceptionHandler()
    {
        return $this->app['exception_handler'];
    }

    public function getApplication()
    {
        return $this->app;
    }
}
