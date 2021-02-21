<?php

namespace App\Http\Client;
use App\Http\Helpers\Helpers;

class Client{
    
    protected $key;
    protected $data;

    public function __construct($key, $data)
    {
        Helpers::$key  = md5($key);    
        Helpers::$data = $data;
    }

    public function process(){
        return Helpers::curlConnect();
    } 
}