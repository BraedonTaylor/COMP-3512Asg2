<?php
require_once ("assign_2.classes.inc.php");
require_once ("index.inc.php");
try{
    $conn = DatabaseHelper::createConnection(array(DBCONNSTRING, DBUSER, DBPASS));
    $userGateway = new UserDB($conn);
    $userID = 5;
    $user = $userGateway->getUser($userID);
}catch (Exception $e) {
    die( $e->getMessage() );
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Home</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
        <script src="navbar.js"></script>
        <script src="home.js"></script>
    </head>
    <body>
<!--    Julianna's take on the hamburger nav bar. Based off of https://www.w3schools.com/howto/howto_js_mobile_navbar.asp -->
        <header class="topnav">
            <img class="logo" alt="logo" src="images/logo.png">
            <a class="icon"><i class="fa fa-bars"></i></a>
            <div id="navlinks" class="hidden">
                <a href="index.php">Home</a>
                <a href="about.html">About</a>
                <a href="list.php">Companies</a>
                <a class="login" href="portfolio.php">Portfolio</a>
                <a class="login" href="profile.php">Profile</a>
                <a class="login" href="favorites.php">Favorites</a>
                <a class="login" href="">Log Out</a>
            </div>
        </header>
        <main class="home-container">
            <h2 id="homeHeader">Stock Browser</h2>
            <div id="aboutBox" class="homeBox">About</div>
            <div id="companiesBox" class="homeBox">Companies</div>
            <?php if (isset($userID)) { ?>
                <div id="portfolioBox" class="homeBox">Portfolio</div>
                <div id="favoritesBox" class="homeBox">Favorites</div>
                <div id="profileBox" class="homeBox">Profile</div>
                <div id="logoutBox" class="homeBox">Logout</div>
            <?php } else { ?>
                <div id="loginBox" class="homeBox">Login</div>
                <div id="signupBox" class="homeBox">Sign up</div>
            <?php } ?>
        </main>
    </body>
</html>