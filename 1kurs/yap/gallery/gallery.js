window.addEventListener("DOMContentLoaded", () => {
    var all = document.querySelectorAll(".gallery img");
   
    if (all.length>0) { for (let img of all) {
      img.onclick = () => img.classList.toggle("full");
    }}
  });