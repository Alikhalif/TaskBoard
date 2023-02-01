var updateWork = document.getElementsByClassName("Update-Work");
// var titlePop = document.querySelector(".title-popup"); 




// console.log(titlePop.type)
for(var i = 0; i < updateWork.length; i++){
    var button = updateWork[i];
    button.addEventListener("click", EditWork);
}

document.querySelector(".popup-update .close-btn").addEventListener("click", function(){
    document.querySelector(".popup-update").classList.remove("active");
});

// var id;

function EditWork(event){
    var button = event.target;
    var id = button.parentElement.parentElement.parentElement.parentElement.id;
    // console.log(id);
    var title = button.parentElement.parentElement.parentElement.parentElement.firstElementChild.firstElementChild.innerText;

    // console.log(title);
    document.querySelector(".title-popup").value = title;
    document.querySelector('.idWorks').value = id;

    console.log(document.querySelector('.idWorks').value);

    document.querySelector(".popup-update").classList.add("active");

    // newName = document.querySelector(".title-popup").value;
    // console.log(newName);
    
}

document.querySelector(".btn-update").addEventListener("click", clickUpdate);

    function clickUpdate(){

        // console.log();
        newName = document.querySelector(".title-popup").value;
        id = document.querySelector('.idWorks').value;
        console.log(newName)
        console.log(id)

        $.ajax({  
            url: "http://taskboard.com/Home/UpdateWorkSpace/", 
            type: "POST",
            data: { 
                id: id, 
                newName: newName, 
            },
            // success: function(response) {
            //     $('#mycontent').html(response);
            // }
            
        });
    }

    
/////////////////////////////////////////



