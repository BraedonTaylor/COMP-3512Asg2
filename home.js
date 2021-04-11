document.addEventListener("DOMContentLoaded", function (){
    document.querySelector('#aboutBox').addEventListener('click', (e) => {
        window.location.href = "about.html";
    });

    document.querySelector('#companiesBox').addEventListener('click', (e) => {
        window.location.href = "list.php";
    });

    try {
        document.querySelector('#loginBox').addEventListener('click', (e) => {
            window.location.href = "login.php";
        });

        document.querySelector('#signupBox').addEventListener('click', (e) => {
            window.location.href = "construction.html";
        });
    } catch(error) {
        console.error(error.message);
    }
    
    try {
        document.querySelector('#portfolioBox').addEventListener('click', (e) => {
            window.location.href = "portfolio.php";
        });

        document.querySelector('#favoritesBox').addEventListener('click', (e) => {
            window.location.href = "favorites.php";
        });

        document.querySelector('#profileBox').addEventListener('click', (e) => {
            window.location.href = "profile.php";
        });

        document.querySelector('#logoutBox').addEventListener('click', (e) => {
            window.location.href = "logout.php";
        });
    } catch(error) {
        console.error(error.message);
    }
    
     
});