<?php

namespace Creios\Creiwork\Controller;

use Creios\Creiwork\Responses\JsonResponse;
use Creios\Creiwork\Responses\RedirectResponse;
use Creios\Creiwork\Responses\TemplateResponse;
use Monolog\Logger;
use PHPUnit_Framework_TestCase;

/**
 * Class ControllerTest
 * @package Creios\Creiwork\Controller
 */
class ControllerTest extends PHPUnit_Framework_TestCase
{

    /**
     * @return Controller
     */
    public function testControllerConstruct()
    {
        $streamHandlerMock = $this->getMockBuilder('Monolog\Handler\StreamHandler')
            ->setConstructorArgs([__DIR__ . '/test.log', Logger::INFO])
            ->getMock();
        /** @var Logger $loggerMock */
        $loggerMock = $this->getMockBuilder('Monolog\Logger')->setConstructorArgs([$streamHandlerMock])->getMock();
        return new Controller($loggerMock);
    }

    /**
     * @depends testControllerConstruct
     * @param Controller $controller
     */
    public function testIndex(Controller $controller)
    {
        $this->assertEquals(new JsonResponse(['title' => 'index']), $controller->index());
    }

    /**
     * @depends testControllerConstruct
     * @param Controller $controller
     */
    public function testTemplate(Controller $controller)
    {
        $this->assertEquals(new TemplateResponse('index', ['name' => 'tim']), $controller->template());
    }

    /**
     * @depends testControllerConstruct
     * @param Controller $controller
     */
    public function testRedirect(Controller $controller)
    {
        $this->assertEquals(new RedirectResponse('index'), $controller->redirect());
    }

}
