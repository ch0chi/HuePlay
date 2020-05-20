<?php


namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\HueApi;
use App\Lights;
use Dotenv\Dotenv;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;
class LightsTest extends TestCase{

    private $hueApi;

    protected function setUp() :void
    {
        $dotenv = Dotenv::createImmutable("./");
        $dotenv->load();
        $this->hueApi = new HueApi();
    }

    public function testCanGetLights(){
        $lights = new Lights();
        $allLights = $lights->getLights();
        foreach($allLights as $light){
            $this->assertArrayNotHasKey("error",$light);
        }

    }

}