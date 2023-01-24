<?php
    class Auth
    {
        public function add($data){
            $db = DB::connect()->prepare("INSERT INTO user(name, password, image) VALUES (:nom, :pass, :image)");
            $db->bindParam(':nom',$data['name']);
            $db->bindParam(':pass',$data['pass']);
            $db->bindParam(':image',$data['imageU']);
           
            $db->execute();
        }

        public function logIn($data){
            $db = DB::connect()->prepare("SELECT * FROM user WHERE name = ? ");
            $db->execute([$data['name']]);
            $users = $db->fetch();
            return $users;
            
        }

        public function checkName($data){
            $db = DB::connect()->prepare("SELECT * FROM user WHERE name = ? ");
            $db->execute([$data]);
            $username = $db->fetch();
            return $username;
        }


        
    }