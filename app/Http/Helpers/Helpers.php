<?php

namespace App\Http\Helpers;

class Helpers{

    public static $url = "http://localhost:8001/v1/process-form";
    public static $key;
    public static $data;

    public static function curlConnect(){
        try{
            $ch = curl_init(self::$url);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            
            $data['post_data'] = json_encode(
                array(
                    'key'  => self::$key,
                    'data' => self::$data
                )
            );

            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            $output = curl_exec($ch);
            curl_close($ch);

            return $output;

        }catch(\Exception $e){
           print_r($e->getMessage());die;
           return false;
        }
    }
}