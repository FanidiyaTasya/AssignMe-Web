// const openButton = document.getElementById('openButton');
// const closeButton = document.getElementById('closeButton');
// const popupMenu = document.getElementById('popupMenu');

// openButton.addEventListener('click', () => {
//     popupMenu.style.display = 'block';
// });

// closeButton.addEventListener('click', () => {
//     popupMenu.style.display = 'none';
// });

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