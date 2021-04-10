<?php
require_once ("assign_2.classes.inc.php");
require_once ("profile.inc.php");
session_start();
try{
//    setting up connection to database and retrieving data for logged-in user
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
<!-- Nav bar based off of https://www.w3schools.com/howto/howto_js_topnav_responsive.asp -->
        <header class="topnav">
            <img class="logo" alt="logo" src="images/logo.png">
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
            <h2>PROFILE</h2>
            <div class="img">
                <img id="profile" alt="profile picture" src="https://randomuser.me/api/portraits/women/<?= $userID?>.jpg">
            </div>
            <div class="profile">
                <!-- Creating the profile based on retrieved user data -->
                <strong>Name: </strong><span><?= $user["firstname"] . " " . $user["lastname"]?></span>
                <strong>Email: </strong><span><?= $user["email"]?></span>
                <strong>City: </strong><span><?= $user["city"]?></span>
                <strong>Country: </strong><span><?= $user["country"]?></span>
            </div>
        </main>
    </body>
</html>