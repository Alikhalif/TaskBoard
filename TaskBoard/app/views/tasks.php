<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/assets/css/main.css">
    <!-- <script src="jquery-3.6.1.min.js"></script> -->
    <title>Tasks | TaskBoard</title>
</head>
<body>
    <?php include(VIEWS.'include/header.php') ?>

    <div class="nav-task row gap-3 mx-5 p-3">
        <div class="col-md-3 me-auto">
            <h1 class="text-lg-start text-center"><?= $work['titleW'] ?></h1>
        </div>

        <!-- add One task -->
        <div class="col-md-2 me-auto">
            <button id="e1-button" name="btnaddTask" class="plus-button border-0 rounded">Add task +</button>
        </div>

        <!-- add multiple -->
        <div class="col-md-2 me-auto">
            <button id="e2-button" name="btnaddTask" class="plus-button border-0 rounded">Add multiple +</button>
        </div>

        <div class="search-container col-md-3">
            <div class="d-flex" role="search">
                <input class="form-control me-2" id="srch" name="check" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" id="searchbtn" name="search" type="submit">Search</button>
            </div>
        </div>
    </div>

    
    
    <!-- <div>
        <p id="mycontent"></p>
    </div> -->

    <div class="container w-90 mi-auto overflow-auto min-vh-100" id="main-container">
        <!-- <div>
            <input type="text" id="npt">
            <button id="add">add</button>
        </div> -->
        <div class="d-flex flex-wrap flex-row justify-content-around gap-3 align-items-start" id="cards-container">

            <div id="e1" class="parent-card p-3 rounded-3 shadow">
                <span class="d-flex">
                    <h2 class="p-3" id="e1-h2">To do</h2>
                    <h2 class="p-3"> <?= $countTo[0] ?></h2>
                </span>
                <ul class="list mb-4" id="To do">
                    <?php foreach($tasks as $task){ 
                        if($task['period'] == 'To do' ){ ?>

                            <li draggable="true" class="box d-flex justify-content-between gap-2 mb-3 p-2 rounded-3">
                                <p class="item-title text-fix unselectable m-0"><?= $task['descriptionT'] ?></p>
                                <input type="hidden" name="idtask" value="<?= $task['idT'] ?>"> 
                                <input type="hidden" name="periodT" value="<?= $task['period'] ?>"> 
                                <!-- <input type="hidden" name="periodView" value="To do">  -->
                                <span>
                                    <i aria-hidden="true" class="fa fa-pencil"></i>
                                    <a href="<?= BURL.'Home/deleteTask/'.$task['idT'] ?>"><i aria-hidden="true" class="fa fa-trash"></i></a>
                                </span>
                            </li>
                    <?php }  
                    } ?>

                    <!-- <li class="box d-flex gap-2 mb-3 p-2 rounded-3">
                        <p class="item-title text-fix unselectable m-0">TTibhjhbljbmijônjôjnôj^kjdfbvisifvbsidfbljblT</p>
                        <span>
                            <i aria-hidden="true" class="fa fa-pencil"></i>
                            <i aria-hidden="true" class="fa fa-trash"></i>
                        </span>
                    </li>
                    <li class="box d-flex gap-2 mb-3 p-2 rounded-3">
                        <p class="item-title text-fix unselectable m-0">TTibhjhbljbmijônjôjnôj^kjdfbvisifvbsidfbljblT</p>
                        <span>
                            <i aria-hidden="true" class="fa fa-pencil"></i>
                            <i aria-hidden="true" class="fa fa-trash"></i>
                        </span>
                    </li> -->
                    
                </ul>
                <!-- <form action="" method="POST"> -->
                    <!-- <input id="e1-input" type="text" name="taskname" placeholder="Add Task..." class="border-0 border-bottom border-2 border-dark">
                    <input id="e1-input" type="hidden" name="idWo" value="<?= $work['idW'] ?>">
                    <input id="e1-input" type="hidden" name="period" value="To do">
                    <button id="e1-button" name="btnaddTask" class="plus-button border-0 rounded-circle">+</button> -->
                <!-- </form> -->
                
            </div>


            <div id="e1" class="parent-card p-3 rounded-3 shadow">

                <span class="d-flex">
                    <h2 class="p-3" id="e1-h2">In progress </h2>
                    <h2 class="p-3"> <?= $countProgress[0] ?></h2>
                </span>
                <ul class="list mb-4" id="In progress">

                    <?php foreach($tasks as $task){ 
                        if($task['period'] == 'In progress' ){ ?>
                            <!-- <input type="hidden" name="periodView" value="In progress">  -->

                            <li draggable="true" class="box d-flex justify-content-between gap-2 mb-3 p-2 rounded-3">
                                <p class="item-title text-fix unselectable m-0"><?= $task['descriptionT'] ?></p>
                                <input type="hidden" name="idtask" value="<?= $task['idT'] ?>"> 
                                <input type="hidden" name="periodT" value="<?= $task['period'] ?>"> 
                                <!-- <input type="hidden" name="periodView" value="In progress"> -->

                                <span>
                                    <i aria-hidden="true" class="fa fa-pencil"></i>
                                    <a href="<?= BURL.'Home/deleteTask/'.$task['idT'] ?>"><i aria-hidden="true" class="fa fa-trash"></i></a>
                                </span>
                            </li>
                    <?php }} ?>

                    <!-- <li class="box d-flex gap-2 mb-3 p-2 rounded-3">
                        <p class="item-title text-fix unselectable m-0">TTibhjhbljbmijônjôjnôj^kjdfbvisifvbsidfbljblT</p>
                        <span>
                            <i aria-hidden="true" class="fa fa-pencil"></i>
                            <i aria-hidden="true" class="fa fa-trash"></i>
                        </span>
                    </li> -->

                </ul>
                <!-- <form action="<?= BURL.'Home/AddTask' ?>" method="POST">
                    <input id="e1-input" type="text" name="taskname" placeholder="Add Task..." class="border-0 border-bottom border-2 border-dark">
                    <input id="e1-input" type="hidden" name="idWo" value="<?= $work['idW'] ?>">
                    <input id="e1-input" type="hidden" name="period" value="In progress">
                    <button id="e1-button" name="btnaddTask" class="plus-button border-0 rounded-circle">+</button>
                </form> -->
            </div>


            <div id="e1" class="parent-card p-3 rounded-3 shadow">
                <span class="d-flex">
                    <h2 class="p-3" id="e1-h2">Done </h2>
                    <h2 class="p-3"> <?= $countDone[0] ?></h2>
                </span>

                <ul class="list mb-4" id="Done">
                    
                    <?php foreach($tasks as $task){ 
                        if($task['period'] == 'Done' ){ ?>
                            <!-- <input type="hidden" name="periodView" value="Done">  -->

                            <li draggable="true" class="box d-flex justify-content-between gap-2 mb-3 p-2 rounded-3">
                                <p class="item-title text-fix unselectable m-0"><?= $task['descriptionT'] ?></p>
                                <input type="hidden" name="idtask" value="<?= $task['idT'] ?>"> 
                                <input type="hidden" name="periodT" value="<?= $task['period'] ?>"> 
                                <!-- <input type="hidden" name="periodView" value="Done"> -->

                                <span>
                                    <i aria-hidden="true" class="fa fa-pencil"></i>
                                    <a href="<?= BURL.'Home/deleteTask/'.$task['idT'] ?>"><i aria-hidden="true" class="fa fa-trash"></i></a>
                                </span>
                            </li>
                    <?php }} ?>

                    <!-- <li class="box d-flex gap-2 mb-3 p-2 rounded-3">
                        <p class="item-title text-fix unselectable m-0">TTibhjhbljbmijônjôjnôj^kjdfbvisifvbsidfbljblT</p>
                        <span>
                            <i aria-hidden="true" class="fa fa-pencil"></i>
                            <i aria-hidden="true" class="fa fa-trash"></i>
                        </span>
                    </li> -->
                </ul>
                <!-- <form action="<?= BURL.'Home/AddTask' ?>" method="POST">
                    <input id="e1-input" type="text" name="taskname" placeholder="Add Task..." class="border-0 border-bottom border-2 border-dark">
                    <input id="e1-input" type="hidden" name="idWo" value="<?= $work['idW'] ?>">
                    <input id="e1-input" type="hidden" name="period" value="Done">
                    <button id="e1-button" name="btnaddTask" class="plus-button border-0 rounded-circle">+</button>
                </form> -->
                </div>
        </div>


    </div>
    <!-- popup Add -->
    <!-- <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="section-header text-center pb-3">
                    <h2>Max number of guest is 6</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br> Debitis officiis omnis laboriosam quas.</p>
                </div>
            </div>
        </div>
    </div> -->
    
    


    <div class="popup">

        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-2">
                    <div class="card-header">
                        <div class="close-btn">&times;</div>
                        <h3 class="text-center font-weight-light my-4">Add Project</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= BURL.'Home/AddTask' ?>" method="POST">
                            
                            <div class="form-floating ">
                                <input class="form-control" name="taskname" type="text" placeholder="Add Task" />
                                <label>Task</label>
                            </div>
                            <div class="form-floating ">
                                <input class="form-control" name="deadlin" type="date" placeholder="Add Task" />
                                <label>Deadline</label>
                            </div>
                            <div class="form-floating ">
                                <select class="form-control" name="list-period" id="myselect">
                                    <option value="To do">To do</option>
                                    <option value="In progress">In progress</option>
                                    <option value="Done">Done</option>
                                </select>
                                <label>Period</label>
                            </div>
                            <input id="e1-input" type="hidden" name="idWo" value="<?= $work['idW'] ?>">


                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button type="submit" name="btnaddTask" class="btn btn-primary">Add</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- add multiple -->
    <div class="popup-multiple">

    <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-2">
                    <div class="card-header">
                        <div class="close-btn">&times;</div>
                        <h3 class="text-center font-weight-light my-4">Add Project</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= BURL.'Home/addMultipleTask/'.$work['idW'] ?>" method="POST">
                            <!-- number-task -->
                            <input class="form-control" id="number-task" name="number-task" type="number" placeholder="Number Task" /><br>

                            <div class="just-input">
                                <p>Task 1</p>
                                <div class="form-floating ">
                                    <input class="form-control" name="taskname<?=0?>" type="text" placeholder="Task" />
                                    <label>Task</label>
                                </div>
                                <div class="form-floating ">
                                    <input class="form-control" name="deadlin<?=0?>" type="date" placeholder="Deadline" />
                                    <label>Deadline</label>
                                </div>
                                <div class="form-floating ">
                                    <select class="form-control" name="list-period<?=0?>" id="myselect">
                                        <option value="To do">To do</option>
                                        <option value="In progress">In progress</option>
                                        <option value="Done">Done</option>
                                    </select>
                                    <label>Period</label>
                                </div>
                                <input id="e1-input" type="hidden" name="idWo" value="<?= $work['idW'] ?>">
                                    
                                    

                                    
                                <!-- task-info -->
                                <div id="task-info">

                                </div>
                            </div>
                            

                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button type="submit" name="btnaddMuTask" class="btn btn-primary">Add</button></div>
                            </div>

                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>

        const search = document.querySelector("#srch");
        const tasks = document.querySelectorAll(".list");

        search.addEventListener("keyup", myFunction);
        // search.addEventListener("keyup", () => {
        //     console.log("key")
        // });

        function myFunction(){
            var filter, i, j, txtValue;
            filter = search.value.toUpperCase();

            // Loop through all list items, and hide those who don't match the search query
            for(j = 0; j < tasks.length; j++) {
                let task = tasks[j].children;
                for (i = 0; i < task.length; i++) {
                    title = task[i].firstElementChild;
                    txtValue = title.textContent || title.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        task[i].style.display = "";
                    } else {
                        task[i].style.cssText = "display:none !important";
                    }
                }
            }
        }


        // var seachinput = document.querySelector('#srch');
        // const seachicon = document.querySelector('#searchbtn');
        // seachicon.addEventListener('click', () => {
        //     seachinput.style.display = "inline-block";
        // })

        // const search = document.querySelector("#srch");
        // let tasks = document.querySelector(".list");
        // let task = document.querySelector(".box");

        // let Names = document.querySelectorAll('.item-title');

        // // console.log(Names);

        // seachinput.addEventListener('input', (e) => {
        //     let filter = e.target.value;
        //     // console.log(filter);
        //     filter = filter.toUpperCase();
        //     for (let i = 0; i < Names.length; i++) {
        //         let a = Names[i].innerHTML || Names[i].textContent;
        //         a = a.toUpperCase();
        //         if (a.indexOf(filter) > -1) {
        //             Names[i].parentElement.style.display = "block";
        //         } else {
        //             Names[i].parentElement.style.display = "none";
        //         }
        //     }
        // })

        // console.log("hhhh");

        // search.addEventListener("keyup", function(){
        //     myinput = search.value;
        //     // console.log(myinput);

        //     $.ajax({  
        //         url: "http://taskboard.com/Home/searchTask/", 
        //         type: "POST",
        //         data: { 
        //             // idtt: idTask, 
        //             // periodtt: periodT, 
        //             myinpt: myinput, 
        //         },
        //         // success: function(response) {
        //         //     $('#mycontent').html(response);
        //         // }
                
        //     });
        // });

        // search.addEventListener("keyup", function(){
        
        //     var filter, i, j, txtValue;
        //     filter = search.value.toUpperCase();

        //     // console.log(filter);
        //     // console.log(tasks);
        //     // console.log(task);
        //     // Loop through all list items, and hide those who don't match the search query
        //     for(j = 0; j < tasks.length; j++) {
        //         let task = tasks[j].children;
        //         console.log(task);
        //         for (i = 0; i < task.length; i++) {
        //             title = task[i].firstElementChild;
        //             console.log();
        //             txtValue = title.textContent || title.innerText;
        //             if (txtValue.toUpperCase().indexOf(filter) > -1) {
        //                 tasks[i].style.display = "";
        //             } else {
        //                 tasks[i].style.display = "none";
        //             }
        //         }
        //     }
        // })



        

        

            // val = document.getElementById("srch").value;
            // console.log(val)
            // for(i in document.querySelectorAll(".list")){
            //     console.log(i);
            //     // for(y in document.querySelectorAll(".box").children[0].value){
            //     //     if(y == val){
            //     //         console.log("yes")
            //     //     }else{
            //     //         console.log("No");
            //     //     }
            //     // }

            // }



        
    </script>
    <script>
        document.querySelector("#e1-button").addEventListener("click", function(){
            document.querySelector(".popup").classList.add("active");
        });

        document.querySelector(".popup .close-btn").addEventListener("click", function(){
            document.querySelector(".popup").classList.remove("active");
        });

        document.querySelector("#e2-button").addEventListener("click", function(){
            document.querySelector(".popup-multiple").classList.add("active");
        });

        document.querySelector(".popup-multiple .close-btn").addEventListener("click", function(){
            document.querySelector(".popup-multiple").classList.remove("active");
        });

    </script>
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/count.js"></script>
    <script src="/assets/js/multiple.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>