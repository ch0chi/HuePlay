<?php

namespace App;



class HueApi {

    public function __construct(){

    }

    public function getUsername(){
        return getenv('HUE_API_USERNAME');
    }

    public function getHueAddress(){
        return getenv('HUE_BRIDGE_ADDRESS');
    }


}