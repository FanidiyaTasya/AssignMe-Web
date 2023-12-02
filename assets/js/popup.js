// const openButton = document.getElementById('openButton');
// const closeButton = document.getElementById('closeButton');
// const popupMenu = document.getElementById('popupMenu');

// openButton.addEventListener('click', () => {
//     popupMenu.style.display = 'block';
// });

// closeButton.addEventListener('click', () => {
//     popupMenu.style.display = 'none';
// });

// autofocus
$(document).ready(function () {
    $('#buatKelasModal').on('shown.bs.modal', function () {
        $('#classname').focus();
    });
    $('#buatTugasModal').on('shown.bs.modal', function () {
        $('#taskname').focus();
    });
    $('#buatMateriModal').on('shown.bs.modal', function () {
        $('#materiname').focus();
    });
});


// edit kelas
$(document).ready(function () {
    $('.editKelasModalLink').on('click', function () {
        var classId = $(this).data('class-id');
        var className = $(this).data('classname');
        var subject = $(this).data('subject');
        var description = $(this).data('description');

        $('#editKelasModal #classId').val(classId);
        $('#editKelasModal #classname').val(className);
        $('#editKelasModal #subject').val(subject);
        $('#editKelasModal #description').val(description);
    });
});

// hapus kelas
$('.deleteClassBtn').click(function() {
    var classId = $(this).data('class-id');
    var userId = $(this).data('user-id');

    console.log('classId:', classId);
    console.log('userId:', userId);

    $('#deleteClassId').val(classId);
    $('#deleteUserId').val(userId);
});

// edit tugas
$(document).ready(function () {
    $('.editTugasModalLink').on('click', function () {
        var taskId = $(this).data('task-id');
        var taskName = $(this).data('taskname');
        var taskDesc = $(this).data('taskdesc');
        var dueDate = $(this).data('deadline');
        var attachment = $(this).data('attachment');
        
        console.log("Task ID:", taskId);
        console.log("Task Name:", taskName);
        console.log("Task Description:", taskDesc);
        console.log("Due Date:", dueDate);
        console.log("Attachment:", attachment);


        $('#editTugasModal #taskId').val(taskId);
        $('#editTugasModal #taskname').val(taskName);
        $('#editTugasModal #taskdesc').val(taskDesc);
        $('#editTugasModal #deadline').val(dueDate);
        $('#editTugasModal #attachment').val(attachment);
    });
});

//hapus tugas
$('.deleteTaskBtn').click(function() {
    var taskId = $(this).data('task-id');
    console.log('taskId:', taskId);
    $('#deleteTaskId').val(taskId);
});

// edit materi
$(document).ready(function () {
    $('.editMateriModalLink').on('click', function () {
        var materialId = $(this).data('material-id');
        var materialName = $(this).data('materiname');
        var materialDesc = $(this).data('desc');
        var attachment = $(this).data('attachment');
        
        console.log("Material ID:", materialId);
        console.log("Material Name:", materialName);
        console.log("Description:", materialDesc);
        console.log("Attachment:", attachment);


        $('#editMateriModal #materialId').val(materialId);
        $('#editMateriModal #materiname').val(materialName);
        $('#editMateriModal #desc').val(materialDesc);
        $('#editMateriModal #attachment').val(attachment);
    });
});

//hapus materi
$('.deleteMateriBtn').click(function() {
    var materialId = $(this).data('material-id');
    console.log('materialId:', materialId);
    $('#deleteMaterialId').val(materialId);
});