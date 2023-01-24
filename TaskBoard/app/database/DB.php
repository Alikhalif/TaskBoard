<?php

class DB
{
    static public function connect(){
        $db = new PDO("mysql:host=localhost;dbname=taskboard","root","");
        $db->exec("set names utf8");
        return $db;
    }
}