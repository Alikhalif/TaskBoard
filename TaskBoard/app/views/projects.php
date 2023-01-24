<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/main.css">
    <title>Projects | TaskBoard</title>
</head>
<body>
    <?php include(VIEWS.'include/header.php') ?>
    
    <div class="d-flex justify-content-between p-5">
        <h2>Projects</h2>
        <button href="" id="e1-button" class="plus-link border-0 rounded-circle">+</button>
    </div>

        <div class="projects w-90 m-auto p-md-4">
            <div class="mx-auto">
                <div class="row gap-3 m-auto">
                    <?php foreach($projects as $pro){ ?>
                        
                        <!-- <a href="<?= BURL.'Home/EnterProject/'.$pro['idW'] ?>" method="POST" class="mx-auto card-project p-1 rounded-2 shadow col-md-6"> -->
                            <div class="myBoxs mx-auto" id="<?= $pro['idW'] ?>">

                                <div class="card-project mx-auto  p-1 rounded-2 shadow col-md-6">
                                    <h3 class="title-project" name="title" data-target="title"><?= $pro['titleW'] ?></h3>
                                </div>

                                <div class="overlay rounded-2">
                                    <span class="content">
                                        <a href="<?= BURL.'Home/EnterProject/'.$pro['idW'] ?>" ><i class="ri-login-box-line"></i></a>
                                        <a href="#" class="Update-Work" id="updateWork" data-id="<?= $d['idW']; ?>"><i aria-hidden="true" class="fa fa-pencil"></i></a>
                                        <a href="<?= BURL.'Home/deletePro/'.$pro['idW'] ?>"><i aria-hidden="true" class="fa fa-trash"></i></a>
                                    </span>
                                </div>

                            </div>
                            
                        <!-- </a> -->
                    <?php } ?>
                </div>
            </div>
            
        </div>
        
    
    

    <div class="popup">

        <div class="row justify-content-center">
            <div class="col-12 col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-2">
                    <div class="card-header">
                        <div class="close-btn">&times;</div>
                        <h3 class="text-center font-weight-light my-4">Add Project</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= BURL.'Home/addProject' ?>" method="POST">
                            
                            <div class="form-floating ">
                                <input class="form-control" name="nomproject" type="text" placeholder="Add Project" />
                                <label>Add Project</label>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button type="submit" name="AddWork" class="btn btn-primary">Add</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="popup-update">

        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-2">
                    <div class="card-header">
                        <div class="close-btn">&times;</div>
                        <h3 class="text-center font-weight-light my-4">Add Project</h3>
                    </div>
                    <div class="card-body">
                        <!-- <form action="<?= BURL.'Home/addProject' ?>" method="POST"> -->
                            <input type="hidden" class="idWorks">
                            
                            <div class="form-floating ">
                                <input class="title-popup form-control"  name="nomproject" type="text" placeholder="Add Project" />
                                <label>Add Project</label>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button type="submit" name="AddWork" class="btn btn-primary btn-update">Add</button></div>
                            </div>
                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script>
        // aff popup
        document.querySelector("#e1-button").addEventListener("click", function(){
            document.querySelector(".popup").classList.add("active");
        });

        document.querySelector(".popup .close-btn").addEventListener("click", function(){
            document.querySelector(".popup").classList.remove("active");
        });

        

            
        

    </script>

  
    <script src="/assets/js/jquery-3.6.3.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
    <script src="/assets/js/update.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>