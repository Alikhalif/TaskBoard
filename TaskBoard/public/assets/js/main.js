let input = document.getElementById('npt');
let btn = document.getElementById('add');
let list = document.querySelectorAll('.list');
let Animations = document.querySelectorAll('.parent-card');

let drag = null;

// btn.onclick = function(){
//     if(input.value != ''){
//         list[0].innerHTML += `


//             <li draggable="true" class="box d-flex gap-2 mb-3 p-2 rounded-3">
//                 <p class="item-title text-fix unselectable m-0">${input.value}</p>
//                 <span>
//                     <i aria-hidden="true" class="fa fa-pencil"></i>
//                     <i aria-hidden="true" class="fa fa-trash"></i>
//                 </span>
//             </li>
//         ` 
//     }
//     dragItem();
// }

// function dragItem(){

    let items = document.querySelectorAll('.box');
    items.forEach(item=>{

        item.addEventListener('dragstart', function(){
            drag = item;
            
        })

        item.addEventListener('dragend', function(){
            myTask = drag
            drag = null;
            idTask = myTask.children[1].value;
            // periodT = myTask.children[2].value;
            periodView = myTask.parentElement.id;
            // console.log(periodView);
            // console.log(typeof(periodView));
            console.log(idTask);
            console.log(periodView);
            // Ajax ////////////////

            // let content = document.getElementById("mycontent"); 

            $.ajax({  
                url: "http://taskboard.com/Home/UpdatePeriod/", 
                type: "POST",
                data: { 
                    idtt: idTask, 
                    // periodtt: periodT, 
                    periodvv: periodView, 
                },
                // success: function(response) {
                //     $('#mycontent').html(response);
                // }
                
            });

            ////////////////////////

            // console.log(idTask,periodT,periodView);
            // console.log(typeof(idTask));

            // idT = parseInt(idTask);
            // console.log(typeof(idT));

            // const formData = new FormData();
            // //formData.append("idTask", idTask);
            // // formData.append("periodT", periodT);
            // formData.append("periodView", periodView);

    

            // fetch(`http://taskboard.com/Home/UpdatePeriod/${idT}`, {
            //     method: 'POST',
            //     body: formData
            // }).then((res)=>{
            //     console.log(res.statusText);
            // })
            // .then((res)=>{
            //     try {
            //         console.log(res)
            //     } catch (error) {
            //         console.log(error)
            //     }
            // })
        });

        Animations.forEach(anim =>{
            anim.addEventListener('dragover', function(e){
                e.preventDefault();
                this.style.background = '#090';
                this.style.color = '#fff';
            })

            anim.addEventListener('dragleave', function(){
                this.style.background = '#d9dfe9';
                this.style.color = '#000';
            })


            anim.addEventListener('drop', function(){
                myAnim = anim.children[1]; 

                myAnim.append(drag);
                this.style.background = '#d9dfe9';
                this.style.color = '#000';
            })

        })
    })


// }

// dragItem();

// function showPopup(){
//     document.querySelector(".popup").classList.add("active");
    

// }

// function close(){
//     document.querySelector(".popup").classList.remove("active");
// }



// function myFunction() {
//     var input, filter, ul, li, a, i, txtValue;
    
//     input = document.getElementById("myInput");
//     filter = input.value.toUpperCase();
//     ul = document.getElementById("myUL");
//     li = ul.getElementsByTagName("li");
    
//     for (i = 0; i < li.length; i++) {
//         a = li[i].getElementsByTagName("a")[0];
//         txtValue = a.textContent || a.innerText;
//         if (txtValue.toUpperCase().indexOf(filter) > -1) {
//             li[i].style.display = "";
//         } else {
//             li[i].style.display = "none";
//         }
//     }
// }