const openButton = document.getElementById('openButton');
const closeButton = document.getElementById('closeButton');
const popupMenu = document.getElementById('popupMenu');

openButton.addEventListener('click', () => {
    popupMenu.style.display = 'block';
});

closeButton.addEventListener('click', () => {
    popupMenu.style.display = 'none';
});

// tampil kelas
// console.log('listItem');
// $(document).ready(function() {
//     $('.class-link').click(function(e) {
//         e.preventDefault();

//         var classId = $(this).data('class-id');
//         var form = $('<form action="Class.php" method="post"><input type="hidden" name="classId" value="' + classId + '"></form>');
//         $('body').append(form);
//         form.submit();

//         return false;
//     });
// });

// edit kelas
