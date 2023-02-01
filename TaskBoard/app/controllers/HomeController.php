<?php

class HomeController
{
    public function index(){
        View::load('home');
    }

    public function ex(){
        View::load('exemple');
    }

    public function project(){
        $db = new Task();
        $data['projects'] = $db->AllProjetct();
        View::load('projects', $data);
    }

    public function addProject(){
        if(isset($_POST['AddWork'])){
            if(isset($_SESSION['user'])){
                if(!empty($_POST['nomproject'])){

                    $db = new Task();
                    $result = $db->checkNamePro($_POST['nomproject']);
                    
                    if(empty($result)){
    
                        $data = array(
                            'name' => $_POST['nomproject'],
                            'idUser' => $_SESSION['user'],
                        );
    
                        // print_r($_FILES);
                        // die(print_r($_POST));
    
                        
                        // print_r($result);
    
                    
                        
                        $db = new Task();
                        $r = $db->addWork($data);
                        if($r === "ok"){
                            Message::set("success","Added successfully");
                        }
    
                        header('location: '.BURL.'Home/project');
                    }
                    else{
                        Message::set("error","the name already exists, enter another name");
                        header('location: '.BURL.'Home/project');
                    }
    
                    
                }else{
                    Message::set("error","All fields are mandatory");
                    header('location: '.BURL.'Home/project');
                }
            }else{
                header('location: '.BURL.'Auth/login');
            }
            

            
        }
    }


    public function EnterProject($id){
        $db = new Task();
        $data = [
            "work" => $db->getPro($id),
            "tasks" => $db->getAllTask($id),

            "countTo" => $db->countTodo($id),
            "countProgress" => $db->countInProgress($id),
            "countDone" => $db->countDone($id)
        ];

        // die(print_r($db->countTodo()));

        // $myProjects['work'] = $db->getPro($id);

        // $dbt = new Task();
        // $myTasks['tasks'] = $dbt->getAllTask();



        View::load('tasks',$data);
    }

    public function AddTask(){
        if(isset($_SESSION['user'])){
            if(isset($_POST['btnaddTask'])){
                $idw = $_POST['idWo'];
                if(!empty($_POST['taskname']) && !empty($_POST['list-period']) && !empty($_POST['deadlin'])){

                    $data = array(
                        'nameT' => $_POST['taskname'],
                        'userId' => $_SESSION['user'],
                        'period' => $_POST['list-period'],
                        'idWo' => $idw,
                        'deadlin' => $_POST['deadlin']
                    );
    
                    $db = new Task();
                    $db->addTask($data);
                }else{
                    Message::set("error","Please fill in all fields");
                }
            }
        }
        
        header('location: '.BURL.'Home/EnterProject/'.$idw);
    }


    public function UpdatePeriod(){
        // if(isset($_POST['idtt'])){
            // die(print_r($_POST['idtt']));
            // $id  = (int)($_POST['idTask']);
            // die("success");

            // die(print_r($_POST));

            $data = array(
                'idTask' => $_POST['idtt'],
                // 'periodT' => $_POST['periodT'],
                'periodView' => $_POST['periodvv'],
            );

            
            // die(print_r($data));
    
            $db = new Task();
            $db->UpdatePer($data);
            // $idw = $_POST['idWo'];
            // header('location: '.BURL.'Home/UpdatePeriod/');
        // }
        
    }

    public function deleteTask($id){
        $dbt = new Task();
        $row = $dbt->getTask($id);

        $idwor = $row['idWs'];
        $db = new Task();
        $db->deleteT($id);
        
        header('location: '.BURL.'Home/EnterProject/'.$idwor);
    }

    // search
    public function searchTask(){
        // if(isset($_POST['search'])){
            $data = array(
                'myinpt' => $_POST['myinpt'],
            );

            $db = new Task();
            $res['taskSearch'] = $db->searchT($data);
            die(print_r($res));

            // View::load('tasks',$res);
        // }
    }


    public function deletePro($id){
        $db = new Task();
        $db->deletP($id);
        header('location: '.BURL.'Home/project/');
    }


    public function addMultipleTask($idw){
        if(isset($_POST['btnaddMuTask'])){
            // $idw = $_POST['idWo'];

            // die(print_r($idw));
            // if(!empty($_POST['taskname'.$i]) && !empty($_POST['list-period'.$i]) && !empty($_POST['deadlin'.$i]) && !empty($data['userId']) && !empty($data['idWo'])){

                $i = 0;
                while($i <= $_POST['number-task']){
                    
                    if(!empty($_POST['taskname'.$i]) && !empty($_POST['list-period'.$i]) && !empty($_POST['deadlin'.$i])){
                        $data = array(
                            'nameT' => $_POST['taskname'.$i],
                            'userId' => $_SESSION['user'],
                            'period' => $_POST['list-period'.$i],
                            'idWo' => $idw,
                            'deadlin' => $_POST['deadlin'.$i]
                        );

                        $db = new Task();
                        $res = $db->addMultipleTask($data);

                    }
                    
                    $i++;
                }

                if($res === "ok"){
                    Message::set("success","dded successfully");
                }
                
            
            header('location: '.BURL.'Home/EnterProject/'.$idw);
        }
    }

    public function UpdateWorkSpace(){
        if(!empty($_POST['newName'])){
            $data = array(
                'id' => $_POST['id'],
                'newName' => $_POST['newName']
            );

            $db = new Task();
            $db->UpdateWorkspase($data);
        }else{
            Message::set("error","All fields are mandatory");
        }

    }


    public function UpdateTasks(){
        // if(isset($_POST['id'])){

            $data = array(
                'idu' => $_POST['id'],
                'descru' => $_POST['desc'],
                'deadlinu' => $_POST['deadlin'],
                'periodTu' => $_POST['periodT']
            );

            $db = new Task();
            $result = $db->UpdateTas($data);
            print_r($result) ;
        // }
    }

    



}

