// Function to open a tab
function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  
  // Hide all tab content
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  
  // Remove the "active" class from all tab links
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  
  // Show the specific tab content and mark the link as active
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";

  // Store the active tab in local storage
  localStorage.setItem('activeTab', tabName);
}

// Call openTab when the page loads to show the appropriate tab (e.g., ClassWork)
document.addEventListener('DOMContentLoaded', function () {
  const activeTab = localStorage.getItem('activeTab');
  if (activeTab) {
    openTab({ currentTarget: document.querySelector('[onclick*="' + activeTab + '"]') }, activeTab);
  }
});

