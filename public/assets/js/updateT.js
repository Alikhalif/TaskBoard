var updateTask = document.getElementsByClassName("Update-Task");


for(var i = 0; i < updateTask.length; i++){
    var button = updateTask[i];
    button.addEventListener("click", EditTask);
}

document.querySelector(".popup-UpdateTask .close-btn").addEventListener("click", function(){
    document.querySelector(".popup-UpdateTask").classList.remove("active");
});

function EditTask(event){
    var button = event.target;
    var id = button.parentElement.parentElement.id;
    var descT = button.parentElement.parentElement.parentElement.firstElementChild.innerText;
    var periodT = button.parentElement.parentElement.parentElement.childNodes[5].value;
    var deadlin = button.parentElement.parentElement.parentElement.childNodes[7].value;


    console.log(id)
    console.log(descT)
    console.log(periodT)
    console.log(deadlin)
    // console.log("ggrfg");

    document.querySelector(".tasknameU").value = descT;
    document.querySelector(".deadlinU").value = deadlin;
    document.querySelector(".periodU").value = periodT;
    document.querySelector(".idTasksU").value = id;



    document.querySelector(".popup-UpdateTask").classList.add("active")
    
}

// console.log(document.querySelector(".btnUpdateTask").addEventListener("click", clickUpdateT))

document.querySelector(".btnUpdateTask").addEventListener("click", clickUpdateT);

    function clickUpdateT(){

        desc = document.querySelector(".tasknameU").value;
        deadlin = document.querySelector(".deadlinU").value;
        periodT = document.querySelector(".periodU").value;
        id = document.querySelector(".idTasksU").value;
        console.log(id);
        console.log(desc);
        console.log(deadlin);
        console.log(periodT);
        

        $.ajax({  
            url: "http://taskboard.com/Home/UpdateTasks/", 
            type: "POST",
            data: { 
                id: id, 
                desc: desc, 
                deadlin: deadlin, 
                periodT: periodT
            },
            // success: function(response) {
            //     $('#mycontent').html(response);
            // }
            
        });
    }
