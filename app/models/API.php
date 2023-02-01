<?php
class Apidata{
    public function set(){
        header('Access-Control-Allow-Origin: *');

        header('Content-Type: application/json; charset=UTF-8');

        header("Access-Control-Allow-Methods: *");

        header("Access-Control-Max-Age: 3600");

        header("Access-Control-Allow-Headers: *");

        $data = ["name" => "Ali" , "website" => "http://localhost:5173/"];
        $JSON_data = json_encode($data);
        print_r($JSON_data);
        return $JSON_data;
    }
    
}
