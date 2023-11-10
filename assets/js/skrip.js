// const classForm = document.getElementById('class-form');
// const classCreationForm = document.getElementById('class-creation-form');
// const createClassButton = document.getElementById('create-class-button');
// const classBoxContainer = document.getElementById('class-box-container');

// // Tambahkan event listener untuk tombol "Buat Kelas"
// createClassButton.addEventListener('click', function () {
//     // Ambil nilai dari inputan
//     const className = document.getElementById('class-name').value;
//     const subjectName = document.getElementById('subject-name').value;
//     const classDescription = document.getElementById('class-description').value;

//     // Buat elemen kotak baru
//     const newClassBox = document.createElement('div');
//     newClassBox.classList.add('class-box');
    
//     // Isi elemen kotak dengan informasi kelas
//     newClassBox.innerHTML = `
//         <p><strong>Nama Kelas:</strong> ${className}</p>
//         <p><strong>Nama Pelajaran:</strong> ${subjectName}</p>
//         <p><strong>Deskripsi:</strong> ${classDescription}</p>
//     `;

//     // Sisipkan elemen kotak baru ke dalam container
//     classBoxContainer.appendChild(newClassBox);

//     // Reset inputan formulir
//     document.getElementById('class-name').value = '';
//     document.getElementById('subject-name').value = '';
//     document.getElementById('class-description').value = '';
// });  