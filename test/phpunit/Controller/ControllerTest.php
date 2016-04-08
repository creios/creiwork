<?php

namespace Creios\Creiwork\Controller;

use Creios\Creiwork\Framework\Result\JsonResult;
use Creios\Creiwork\Framework\Result\RedirectResult;
use Creios\Creiwork\Framework\Result\TemplateResult;
use Monolog\Logger;
use PHPUnit_Framework_TestCase;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;

/**
 * Class ControllerTest
 * @package Creios\Creiwork\Controller
 */
class ControllerTest extends PHPUnit_Framework_TestCase
{
    /** @var \PHPUnit_Framework_MockObject_MockObject|ServerRequestInterface */
    private $serverRequestMock;
    /** @var \PHPUnit_Framework_MockObject_MockObject|Logger */
    private $loggerMock;

    public function setUp()
    {
        $this->serverRequestMock = $this->getMock(ServerRequestInterface::class);
        $this->loggerMock = $this->getMock(LoggerInterface::class);
    }

    /**
     * @return Controller
     */
    public function testControllerConstruct()
    {
        return new Controller($this->serverRequestMock, $this->loggerMock);
    }

    /**
     * @depends testControllerConstruct
     * @param Controller $controller
     */
    public function testIndex(Controller $controller)
    {
        $this->assertEquals(new TemplateResult('index', []), $controller->index());
    }

    /**
     * @depends testControllerConstruct
     * @param Controller $controller
     */
    public function testJson(Controller $controller)
    {
        $this->assertEquals(new JsonResult(['index', 'title']), $controller->json());
    }

    /**
     * @depends testControllerConstruct
     * @param Controller $controller
     */
    public function testRedirect(Controller $controller)
    {
        $this->assertEquals(new RedirectResult('index'), $controller->redirect());
    }

}
