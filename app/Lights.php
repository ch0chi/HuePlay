<?php

namespace App;
use App\HueApi;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;
class Lights extends HueApi {


    protected $lights;

    public function __construct() {
        parent::__construct();
    }

    public function getLights(){
        $endpoint = "lights";
        $lights = false;
        try{
            $res = $this->client->get($endpoint);
            $lights = json_decode($res->getBody()->getContents(),true);
        }
        catch(ClientException $e){
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                $lights = Psr7\str($e->getResponse());
            }
        }
        return $lights;
    }
}