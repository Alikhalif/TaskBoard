$(document).on("click", ".edit-btn", (e)=>{
    let taskId = parseInt(e.target.closest(".task-box").id);
    $("#update-modal").removeClass("hidden");
    $("#update-modal").addClass("flex");
    $("#update-modal").css("background-color", "#0000008a");
    $(".close-update-form").click(function() {
        $("#update-modal").removeClass("flex");
        $("#update-modal").addClass("hidden");
    });
    console.log(taskId);
    getTask(taskId);
    // console.log(taskId);
    $(".update-task-form").submit((e)=>{
        e.preventDefault();
        let taskTitleValue = $("#u-task-title").val();
        let taskDescValue = $("#u-task-description").val();
        let taskStatus = $("#u-lists option:selected").attr("value");
        let dueDateValue = $("#u-date-picker").val();
        // console.log(columnId);
        // eslint-disable-next-line jquery/no-ajax
        $.ajax({
            url: "http://localhost/task-board/public/home/updateTask",
            type: "post",
            data: {
                task_title: taskTitleValue,
                task_description: taskDescValue,
                end_date: dueDateValue,
                task_status: taskStatus,
                task_id: taskId
            },
            success: function (responce, status) {
                console.log(responce, status);
                if(status === "success" && responce) {
                    $("#update-modal").removeClass("flex");
                    $("#update-modal").addClass("hidden");
                    getAllTasks();
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
        taskId = "";
    });
});
