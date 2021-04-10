document.addEventListener("DOMContentLoaded", function (){
    document.querySelector('#aboutBox').addEventListener('click', (e) => {
        window.location.href = "about.php";
    });

    document.querySelector('#companiesBox').addEventListener('click', (e) => {
        window.location.href = "companies.php";
    });

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
});