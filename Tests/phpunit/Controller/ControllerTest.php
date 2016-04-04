<?php

namespace Creios\Creiwork\Controller;

use Creios\Creiwork\Responses\JsonResponse;
use Creios\Creiwork\Responses\RedirectResponse;
use Creios\Creiwork\Responses\TemplateResponse;
use DI\Container;
use DI\ContainerBuilder;
use PHPUnit_Framework_TestCase;

class ControllerTest extends PHPUnit_Framework_TestCase
{

    /** @var Container */
    protected $container;

    public function setUp()
    {
        $containerBuilder = new ContainerBuilder();
        $containerBuilder->addDefinitions('App/di-config.php');
        $this->container = $containerBuilder->build();
    }

    public function testIndex()
    {
        /** @var \Creios\Creiwork\Controller\Controller $controller */
        $controller = $this->container->get('Creios\Creiwork\Controller\Controller');
        $this->assertEquals(new JsonResponse(['title' => 'index']), $controller->index());
    }

    public function testTemplate()
    {
        /** @var \Creios\Creiwork\Controller\Controller $controller */
        $controller = $this->container->get('Creios\Creiwork\Controller\Controller');
        $this->assertEquals(new TemplateResponse('index', ['name' => 'tim']), $controller->template());
    }

    public function testRedirect()
    {
        /** @var \Creios\Creiwork\Controller\Controller $controller */
        $controller = $this->container->get('Creios\Creiwork\Controller\Controller');
        $this->assertEquals(new RedirectResponse('index'), $controller->redirect());
    }
}
