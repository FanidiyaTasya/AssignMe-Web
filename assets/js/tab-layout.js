function openTab(tabName) {
  var i;
  var tabContent = document.getElementsByClassName("tab-content");
  for (i = 0; i < tabContent.length; i++) {
      tabContent[i].style.display = "none";
  }

  var tabs = document.getElementsByClassName("tab");
  for (i = 0; i < tabs.length; i++) {
      tabs[i].classList.remove("active");
  }

  document.getElementById(tabName + "TabContent").style.display = "block";
  event.currentTarget.classList.add("active");
}