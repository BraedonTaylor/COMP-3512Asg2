<?php
require_once("portfolio.inc.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>COMP3512 Assignment 2</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">
    <link rel="stylesheet" href="css/stylePort.css">
    <script src="js/navbar.js"></script>
</head>

<body>
    <main class="container">
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
        <p id="spacer"></p>
        <div class="box">
            <p id="portHeader">My Portfolio</p>
            <div id="stockView">
                <?php
                tableBuilder($portfolio);
                ?>
            </div>
            <?php
            totalPortfolio($portfolio);
            ?>
        </div>
    </main>
</body>

</html>