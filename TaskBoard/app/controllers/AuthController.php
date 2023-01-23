<?php 
require_once(MODELS.'/authant.php');
class AuthController{
    public function user(){
        View::load('userRegister');
    }

    public function login(){
        View::load('userLogin');
    }

    public function addUser(){
        if(isset($_POST['register'])){

            // $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $_POST['nom']);
            // $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $_POST['email']);
            // $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $_POST['password']);

            if(!empty($_POST['nom']) && !empty($_POST['password']) && !empty($_FILES['image'])){

                $db = new Auth();
                $result = $db->checkName($_POST['nom']);
                
                if(empty($result)){

                    $filename = $_FILES['image']['name'];
                    $file_sur= 'uploads/'.$filename;
                    $file_tmp = $_FILES["image"]['tmp_name'];
                    move_uploaded_file($file_tmp,$file_sur);

                    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $data = array(
                        'name' => $_POST['nom'],
                        'pass' => $pass,
                        'imageU' => $filename
                    );

                    // print_r($_FILES);
                    // die(print_r($_POST));

                    
                    // print_r($result);

                
                    
                    $db = new Auth();
                    $r = $db->add($data);

                    header('location: '.BURL.'Auth/login');
                }
                else{
                    echo"<script language=\"javascript\">";
                    echo"alert('the name already exists, enter another name')";
                    echo"</script>";
                }

                
            }else{
                echo"<script language=\"javascript\">";
                echo"alert('All fields are mandatory')";
                echo"</script>";
            }

            
        }
    }

    public function loginUser(){
        if(isset($_POST['login'])){
            if(!empty($_POST['nom']) || !empty($_POST['password'])){
                $data = array(
                    'name' => $_POST['name'],
                    'pass' => $_POST['password']
                );

                $db = new Auth();
                $users = $db->logIn($data);

                if(password_verify($data['pass'], $users['password'])){
                    $_SESSION['user'] = $users['idUser'];
                    header('location: '.BURL.'Home/index');
                    // echo 'valied';
                }
                else {
                    
                    echo"<script language=\"javascript\">";
                    echo"alert('All fields are mandatory')";
                    echo"</script>";
                    header('location: '.BURL.'Auth/login');
                }
            }else{
                echo"<script language=\"javascript\">";
                echo"alert('All fields are mandatory')";
                echo"</script>";
                header('location: '.BURL.'Auth/login');
            }
        }
    }

    public function logout(){
        session_unset();
        session_destroy();
        header('location: '.BURL.'Home/index');
    }



}