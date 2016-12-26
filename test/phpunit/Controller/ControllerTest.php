<?php

namespace Creios\Creiwork\Controller;

use Aura\Session\SegmentInterface;
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
    /** @var Controller */
    private $controller;
    /** @var \PHPUnit_Framework_MockObject_MockObject|ServerRequestInterface */
    private $serverRequestMock;
    /** @var \PHPUnit_Framework_MockObject_MockObject|Logger */
    private $loggerMock;
    /** @var \PHPUnit_Framework_MockObject_MockObject|SegmentInterface */
    private $sessionMock;

    public function setUp()
    {
        $this->serverRequestMock = $this->getMock(ServerRequestInterface::class);
        $this->loggerMock = $this->getMock(LoggerInterface::class);
        $this->sessionMock = $this->getMock(SegmentInterface::class);
        $this->controller = new Controller($this->serverRequestMock, $this->loggerMock, $this->sessionMock);
    }

    public function testIndex()
    {
        $this->assertEquals(new TemplateResult('index'), $this->controller->index());
    }

    public function testJson()
    {
        $this->assertEquals(new JsonResult(['index', 'title']), $this->controller->json());
    }

    public function testRedirect()
    {
        $this->assertEquals(new RedirectResult('/'), $this->controller->redirect());
    }

}
