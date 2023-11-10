// const openButton = document.getElementById('openButton');
// const closeButton = document.getElementById('closeButton');
// const popupMenu = document.getElementById('popupMenu');

// openButton.addEventListener('click', () => {
//     popupMenu.style.display = 'block';
// });

// closeButton.addEventListener('click', () => {
//     popupMenu.style.display = 'none';
// });

// tampil kelas
console.log('listItem');
$(document).ready(function() {
    $('.class-link').click(function(e) {
        e.preventDefault();

        var classId = $(this).data('class-id');
        var form = $('<form action="Class.php" method="post"><input type="hidden" name="classId" value="' + classId + '"></form>');
        $('body').append(form);
        form.submit();

        return false;
    });
});

// edit kelas
document.addEventListener('DOMContentLoaded', function () {
    const editLinks = document.querySelectorAll('.editKelasModalLink');
    const classIdInput = document.getElementById('classId');
    const classNameInput = document.getElementById('classname');
    const subjectInput = document.getElementById('subject');
    const descriptionInput = document.getElementById('description');
    const editForm = document.getElementById('formEditClass'); 
    editLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault();

            const listItem = event.target.closest('li');
            const classId = listItem.dataset.classId;
            const classname = listItem.dataset.classname;
            const subject = listItem.dataset.subject;
            const description = listItem.dataset.description;

            editForm.setAttribute('data-editing-class-id', classId);
            console.log(listItem);

            classIdInput.value = classId;
            classNameInput.value = classname;
            subjectInput.value = subject;
            descriptionInput.value = description;
        });
    });
});