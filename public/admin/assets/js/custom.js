$(document).ready(function () {
  // Theme Mode
  $(".toggle").click(function () {
    $(".toggle").toggleClass("bluest");
    $("body").toggleClass("bluest");
  });
  // Sidebar Menu
  const fstBtn = document.querySelectorAll(".nav-item");
  fstBtn.forEach((button) => {
    button.addEventListener("click", function () {
      fstBtn.forEach((btn) => {
        btn.classList.remove("active");
      });
      this.classList.add("active");
    });
  });
  // Close Side
  $(".CloseBtn").click(function () {
    $(".sidebar").toggleClass("minimize");
  });


  // data table js
  function eventFired(type) {
    let n = document.querySelectorAll('.customerLists');
    n.innerHTML +=
        '<div>' + type + ' event - ' + new Date().getTime() + '</div>';
    n.scrollTop = n.scrollHeight;
  }
 
  new DataTable('.customerList')
    .on('order.dt', () => eventFired('Order'))
    .on('search.dt', () => eventFired('Search'))
    .on('page.dt', () => eventFired('Page'));

});


