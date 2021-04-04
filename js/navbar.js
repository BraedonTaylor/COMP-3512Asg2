document.addEventListener("DOMContentLoaded", function (){
    const menu = document.querySelector(".topnav .icon");
    menu.addEventListener("click", ()=>{
        document.querySelector("#navlinks").classList.toggle("hidden");
    });
});