document.addEventListener("DOMContentLoaded", function(){
    function toggleNavbar() {
        let scrollPos = window.scrollY;
        let header = document.querySelector("#header");
    
        if (scrollPos > 50) {
            header.style.top = 0;
        } else {
            header.style.top = "-76px";
        }
    }
    
    window.addEventListener("scroll", toggleNavbar);
    
    // toggle menu
    let navbar = document.querySelector(".nav-list");
    let toggle = document.querySelector(".toggle");
    let iconToggle = document.querySelector(".toggle .fa-solid");
    let headerAndroid = document.getElementById('header-android');
    
    document.querySelector(".toggle").addEventListener("click", function () {
        console.log("berhasil")
        navbar.classList.toggle("active");
        if (iconToggle.classList[1] == "fa-bars") {
            iconToggle.classList.add("fa-times");
            iconToggle.classList.remove("fa-bars");
            iconToggle.style.transform = "rotate(180deg)";
            iconToggle.style.transition = "transform 0.5s ease";
            headerAndroid.style.display = "none"
        } else {
            iconToggle.classList.add("fa-bars");
            iconToggle.classList.remove("fa-times");
            iconToggle.style.transform = "rotate(0deg)";
            iconToggle.style.transition = "transform 0.5s ease";
            headerAndroid.style.display = "block"
        }
    });
    
    document.addEventListener("click", function (e) {
        if (!toggle.contains(e.target) && !navbar.contains(e.target)) {
            navbar.classList.remove("active");
            iconToggle.classList.add("fa-bars");
            iconToggle.classList.remove("fa-times");
            iconToggle.style.transform = "rotate(0deg)";
            iconToggle.style.transition = "transform 0.5s ease";
            headerAndroid.style.display = "block"
        }
    });
})