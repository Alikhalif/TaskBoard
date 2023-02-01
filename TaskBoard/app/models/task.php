<?php
    class Task
    {
        public function addWork($data){
            $db = DB::connect()->prepare("INSERT INTO workspace(titleW, idU) VALUES (:title, :id)");
            $db->bindParam(':title',$data['name']);
            $db->bindParam(':id',$data['idUser']);
           
            if($db->execute()){
                return "ok";
            }else {
                return "error";
            }
        }

        public function checkNamePro($data){
            $user = $_SESSION['user'];
            $db = DB::connect()->prepare("SELECT * FROM workspace WHERE titleW = ? AND idU = ?");
            $db->execute([$data,$user]);
            $username = $db->fetch();
            return $username;
        }

        public function AllProjetct(){
            $user = $_SESSION['user'];
            $db = DB::connect()->prepare("SELECT * FROM workspace WHERE idU = ?");
            $db->execute([$user]);
            $username = $db->fetchAll();
            return $username;
        }

        public function getPro($id){
            $db = DB::connect()->prepare("SELECT * FROM workspace WHERE idW = :id");
            $db->bindParam(':id', $id);
            $db->execute();
            $res = $db->fetch();
            return $res;
        }

        public function addTask($data){
            $db = DB::connect()->prepare("INSERT INTO task(descriptionT, period, idWs, idUs, deadline) VALUES (:nameT, :period, :idWo, :userId, :deadlin)");
            $db->bindParam(':nameT',$data['nameT']);
            $db->bindParam(':period',$data['period']);
            $db->bindParam(':idWo',$data['idWo']);
            $db->bindParam(':userId',$data['userId']);
            $db->bindParam(':deadlin',$data['deadlin']);
           
            if($db->execute()){
                return "ok";
            }
        }

        public function getAllTask($id){
            $db = DB::connect()->prepare("SELECT * FROM task WHERE idWs = ? order by deadline desc");
            $db->execute([$id]);
            $tasks = $db->fetchAll();
            return $tasks;
        }

        public function UpdatePer($data){
            
            $db = DB::connect()->prepare("UPDATE task SET period = :periodView WHERE idT= :id;");
            $db->bindParam(':id',$data['idTask']);
            $db->bindParam(':periodView',$data['periodView']);
            if($db->execute()){
                return "ok";
            }            
        }        

        public function getTask($id){
            $db = DB::connect()->prepare("SELECT * FROM task WHERE idT = ? ");
            $db->execute([$id]);
            $tasks = $db->fetch();
            return $tasks;
        }

        public function deleteT($id){
            $db = DB::connect()->prepare("DELETE FROM task WHERE idT = ?");
            if($db->execute([$id])){
                return "ok";
            }
        }

        

        public function deletP($id){
            $db = DB::connect()->prepare("DELETE FROM workspace WHERE idW = :id");
            $db->bindParam(':id',$id);
            if($db->execute()){
                return "ok";
            }
            
        }

        public function addMultipleTask($data){
            $db = DB::connect()->prepare("INSERT INTO task(descriptionT, period, idWs, idUs, deadline) VALUES (:nameT, :period, :idWo, :userId, :deadlin)");
            $db->bindParam(':nameT',$data['nameT']);
            $db->bindParam(':period',$data['period']);
            $db->bindParam(':idWo',$data['idWo']);
            $db->bindParam(':userId',$data['userId']);
            $db->bindParam(':deadlin',$data['deadlin']);
           
            if($db->execute()){
                return "ok";
            }else{
                return "error";
            }
        }

        public function searchT($data){
            $db = DB::connect()->prepare("SELECT * FROM task WHERE descriptionT like :myinpt");
            $db->bindParam(':myinpt',$data['myinpt']);
            $db->execute();
            $res = $db->fetchAll();
            return $res;
        }

        public function countTodo($id){
            $per = 'To do';
            $db = DB::connect()->prepare("SELECT count(*) FROM task WHERE period = :per AND idWs = :id");
            $db->bindParam(':per',$per);
            $db->bindParam(':id',$id);
            $db->execute();
            $res = $db->fetch();
            return $res;
        }
        
        public function countInProgress($id){
            $per = 'In progress';
            $db = DB::connect()->prepare("SELECT count(*) FROM task WHERE period = :per AND idWs = :id");
            $db->bindParam(':per',$per);
            $db->bindParam(':id',$id);
            $db->execute();
            $res = $db->fetch();
            return $res;
        }

        public function countDone($id){
            $per = 'Done';
            $db = DB::connect()->prepare("SELECT count(*) FROM task WHERE period = :per AND idWs = :id");
            $db->bindParam(':per',$per);
            $db->bindParam(':id',$id);
            $db->execute();
            $res = $db->fetch();
            return $res;
        }

        public function UpdateWorkspase($data){
            $db = DB::connect()->prepare("UPDATE workspace SET titleW = :newName WHERE idW= :id;");
            $db->bindParam(':id',$data['id']);
            $db->bindParam(':newName',$data['newName']);
            $db->execute();
        }

        public function UpdateTas($data){
            $db = DB::connect()->prepare("UPDATE task SET descriptionT = :descr, period = :periodT, deadline = :deadlin WHERE idT= :id;");
            $db->bindParam(':id',$data['idu']);
            $db->bindParam(':descr',$data['descru']);
            $db->bindParam(':deadlin',$data['deadlinu']);
            $db->bindParam(':periodT',$data['periodTu']);
            // print_r($data);
            if($db->execute()){
                return "ok";
            }
                
        }
        
    }