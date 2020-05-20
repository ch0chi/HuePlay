<?php


namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\HueApi;
use Dotenv\Dotenv;
class HueApiTest extends TestCase{


    private $hueApi;

    protected function setUp() :void
    {
        $dotenv = Dotenv::createImmutable("./");
        $dotenv->load();
        $this->hueApi = new HueApi();

    }

    public function testUsernameIsSet(): void {
        $username = $this->hueApi->getUsername();
        $this->assertNotEmpty($username);
    }

    public function testHueApiAddressIsSet(): void {
        $url = $this->hueApi->getHueAddress();
        $this->assertNotEmpty($url);
    }

    public function testCanGetBaseUri(): void{
        $baseUri = $this->hueApi->getBaseUri();
        var_dump($baseUri);
    }

    public function testCanConnectToApi(){
        $endpoint = "api";
        $data = ["devicetype"=>"playground#iphone michael"];
        $res = $this->hueApi->post($endpoint,$data);
        var_dump($res->getBody()->getContents());
    }
}