// script.js
const openButton = document.getElementById('openButton');
const closeButton = document.getElementById('closeButton');
const popupMenu = document.getElementById('popupMenu');

openButton.addEventListener('click', () => {
    popupMenu.style.display = 'block';
});

closeButton.addEventListener('click', () => {
    popupMenu.style.display = 'none';
});

