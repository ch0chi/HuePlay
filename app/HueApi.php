<?php

namespace App;

use GuzzleHttp\Client;


class HueApi {

    protected $client;

    public function __construct(){
        $this->client = new Client(['base_uri' => $this->getBaseUri()]);
    }

    public function getBaseUri(){
        return $this->getHueAddress() . "api/" . $this->getUsername() . '/';
    }

    public function getUsername(){
        return getenv('HUE_API_USERNAME');
    }

    public function getHueAddress(){
        return getenv('HUE_BRIDGE_ADDRESS');
    }

    public function get($endpoint){
        $res = $this->client->get($endpoint);
        return $res;
    }

    public function post($endpoint,$data,$method='POST'){
        $res = $this->client->post($endpoint,['json'=>$data]);
        return $res;
    }


}