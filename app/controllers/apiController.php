<?php
include(MODELS.'/API.php');
class ApiController{
    public function data(){
        $db = new Apidata();
        $res['data'] = $db->set();
        View::load('myApi',$res);
    }
}