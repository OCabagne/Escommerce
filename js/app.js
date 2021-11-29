   const navToggle = document.querySelector(".nav-toggle");
   const navMenu = document.querySelector(".nav-colapsada-vertical");
   const navUl = document.querySelector(".nav-ul");

   navToggle.addEventListener("click", () => {
       navMenu.classList.toggle("nav-menu-visible");
       //navUl.classList.toggle("nav-borde");

       if (navMenu.classList.contains("nav-menu-visible")) {
           navToggle.setAttribute("aria-label", "Cerrar menú");
       } else {
           navToggle.setAttribute("aria-label", "Abrir menú");
       }
   })