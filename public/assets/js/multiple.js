var taskNumber = document.getElementById("number-task");
var taskInfo = document.getElementById("task-info");


taskNumber.addEventListener('input', function() {

    let i = 0;

    if (taskNumber.value !== "") {
        taskInfo.innerHTML = "";
        while(i < taskNumber.value){
            
            taskInfo.innerHTML +=`
            <p>Task ${i+2}</p>
            <div class="form-floating ">
                <input class="form-control" name="taskname${i+1}" type="text" placeholder="Task" />
                <label>Task</label>
            </div>
            <div class="form-floating ">
                <input class="form-control" name="deadlin${i+1}" type="date" placeholder="Deadline" />
                <label>Deadline</label>
            </div>
            <div class="form-floating ">
                <select class="form-control" name="list-period${i+1}" id="myselect">
                    <option value="To do">To do</option>
                    <option value="In progress">In progress</option>
                    <option value="Done">Done</option>
                </select>
                <label>Period</label>
            </div>
            <input id="e1-input" type="hidden" name="idWo" value="<?= $work['idW'] ?>">`
            
            i++
        } 
    } else {
        taskInfo.innerHTML = "";
    }
});