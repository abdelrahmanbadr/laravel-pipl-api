<?php

namespace Tests;

use Abdelrahman_badr\Pipl\Pipl;
use GuzzleHttp\ClientInterface;
use Mockery;
use PHPUnit\Framework\TestCase;
use Exception;

/**
 * Class PiplTest
 * @package Tests
 */
class PiplTest extends TestCase
{
    /**
     * @var ClientInterface
     */
    protected $clientMock;

    public function setUp()
    {
        parent::setUp();
        $this->clientMock = Mockery::mock(ClientInterface::class);
    }

    public function tearDown()
    {
        Mockery::close();
    }

    public function testPipleSearch()
    {
        $expectedResponse = "OK";
        $this->clientMock->shouldReceive('getBody')->andReturn(json_encode($expectedResponse));
        $this->clientMock->shouldReceive('get')
            ->with("http://api.pipl.com/search/?key=&name=john")
            ->andReturn($this->clientMock);
        $pipl = new Pipl($this->clientMock);
        $actualResponse = $pipl->search(["name" => "john"]);
        $this->assertEquals($expectedResponse, $actualResponse);
    }

    public function testPipleSearchThrowException()
    {
        $this->expectException(Exception::class);
        $pipl = new Pipl($this->clientMock);
        $pipl->search([]);
    }
}