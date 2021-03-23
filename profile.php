<?php
require_once ("assign_2.classes.inc.php");
require_once ("profile.inc.php");
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
        <title>Profile</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="profile.css">
        <script src="navbar.js"></script>
    </head>
    <body>
<!--    My take on the hamburger nav bar. Based off of https://www.w3schools.com/howto/howto_js_mobile_navbar.asp -->
        <header class="topnav">
            <img class="logo" alt="logo">
            <a class="icon"><i class="fa fa-bars"></i></a>
            <div id="navlinks" class="hidden">
                <a href="index.php">Home</a>
                <a href="about.html">About</a>
                <a href="list.php">Companies</a>
                <a class="login" href="portfolio.php">Portfolio</a>
                <a class="login active" href="profile.php">Profile</a>
                <a class="login" href="favourites.php">Favourites</a>
                <a class="login" href="">Log Out</a>
            </div>
        </header>
        <main class="profile-container">
            <div class="img">
                <img id="profile" alt="profile picture" src="https://randomuser.me/api/portraits/women/<?= $userID?>.jpg">
            </div>
            <div class="profile">
                <strong>Name: </strong><span><?= $user["firstname"] . " " . $user["lastname"]?></span>
                <strong>Email: </strong><span><?= $user["email"]?></span>
                <strong>City: </strong><span><?= $user["city"]?></span>
                <strong>Country: </strong><span><?= $user["country"]?></span>
            </div>
        </main>
    </body>
</html>
